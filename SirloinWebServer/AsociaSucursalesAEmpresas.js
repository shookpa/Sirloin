Ext.Loader.setPath('Ext.ux', 'extjs/examples/ux');
Ext.define('MyDesktop.AsociaSucursalesAEmpresas', {
	extend : 'Ext.ux.desktop.Module',
	requires : [ 'Ext.tab.Panel', 'Ext.chart.*', 'Ext.layout.container.Fit', 'Ext.fx.target.Sprite', 'Ext.selection.CheckboxModel' ],
	id : 'crear-empresas',
	init : function() {
		this.launcher = {
			text : 'Asociar Sucursales a Empresas',
			id : 'launcher-asociar-sucursales',
			iconCls : 'tabs'
		}
	},
	createWindow : function(aplicacion, registro) {
		// Ext.suspendLayouts();
		// var desktop =this.app.getDesktop();
		// console.debug("Ya entro donde queria createWindow");
		var storeRestaurantes = aplicacion.deepCloneStore(aplicacion.storeRestaurantes);
		storeRestaurantes.load({
            params: {
            	tabla: 'cat_restaurantes',
            	filtros: 'WHERE id_restaurante NOT IN (SELECT DISTINCT id_rest FROM rel_empr_rest WHERE id_empr = '+registro.data.id+')'
            	
            }
        });  
		var desktop = aplicacion.getDesktop();
		var selModel = Ext.create('Ext.selection.CheckboxModel', {
			selType : 'checkboxmodel',
			showHeaderCheckbox : true,
			listeners : {
				selectionchange : function(sm, selections) {
				// grid4.down('#removeButton').setDisabled(selections.length ===
				// 0);
				}
			}
		});
		var win = desktop.getWindow('asociar-sucursales');
		var panelAsociarSucursales = Ext.create('Ext.form.Panel', {
			title : '<center>Asociar Sucursal a Empresa ' + '</center>',
			bodyStyle : 'padding:5px',
			id : 'panelAsociarSucursales',
			itemId : 'panelAsociarSucursales',
			border : false,
			// anchor : '100%',
			fieldDefaults : {
				labelAlign : 'top',
				msgTarget : 'side'
			},
			// defaults : {
			// anchor : '100%'
			// },
			items : [ {
				layout : 'column',
				border : false,
				items : [ {
					columnWidth : 1,
					border : false,
					layout : 'anchor',
					defaultType : 'textfield',
					items : [ {
						fieldLabel : 'Restaurante',
						name : 'restaurante',
						tabIndex : 18,
						// id: 'estadoCot',
						anchor : '100%',
						matchFieldWidth : false,
						emptyText : 'Selecciona...',
						xtype : 'combobox',
						displayField : 'nombre_restaurante',
						allowBlank : false,
						queryMode : 'local',
						typeAhead : true,
						valueField : 'id_restaurante',
						forceSelection : true,
						store : storeRestaurantes,
					} ]
				} ],
			} ]
		});
		
		
		Ext.require([ 'Ext.data.*', 'Ext.tip.QuickTipManager', 'Ext.window.MessageBox' ]);
		Ext.tip.QuickTipManager.init();
		
		if (!win) {
			win = desktop.createWindow({
				id : 'asociar-sucursales',
				itemId : 'asociar-sucursales',
				title : 'Asociar Sucursales a Empreas',
				width : 500,
				height : 150,
				modal : true,
				draggable : true,
				iconCls : 'tabs',
				animCollapse : false,
				border : false,
				constrainHeader : true,
				autoScroll : true,
				onEsc : function() {
					var me = this;
					Ext.Msg.confirm('Confirmación de cerrado', '&iquest;Est&aacute;s seguro que deseas cerrar la ventana de Asociar Sucursales?', function(btn) {
						if (btn == 'yes')
							me.destroy();
					});
				},
				// layout : 'fit',
				defaultType : 'container',
				items : [ panelAsociarSucursales
				],
				buttons : [ {
					text : 'Guardar',
					tabIndex : 20,
					handler : function(btn) {
						console.debug(this.up().up().items.get(0).getForm());
						formulario = this.up().up().items.get(0).getForm();
						panelForm = this.up().up().items.get(0);
						var s = selModel.getSelection();
						selected = [];
						Ext.each(s, function(item) {
							selected.push(item.data.id_restaurante);
						});
						var datosFormulario = [ {
							"id_rest" : panelForm.items.get(0).items.get(0).items.get(0).getValue(),
							"id_empr" : registro.data.id
							
						} ];
						if (formulario.isValid()) {
							// console.debug("veamos la seleccion",selected);
							formulario.submit({
								waitMsg : 'Grabando en Base de Datos...',
								submitEmptyText : false,
								url : 'php/saveFormAsocSucEmpr.php',
								params : {
									store_data : Ext.encode(datosFormulario)
								},
								success : function(form, action) {
									var data = Ext.decode(action.response.responseText);
									Ext.Msg.show({
										title : 'Empresa Almacenada',
										msg : 'Se asocio correctamente la sucursal',
										buttons : Ext.Msg.OK,
										icon : Ext.Msg.INFO
									});
									win.destroy();
									// PARA QUE CARGUE NUEVAMENTE EL GRID
									// DESPUES DE GUARDAR
									try {
										Ext.getCmp('gridEmpresas').store.load();
									} catch (exp) {}
								},
								failure : function(form, action) {
									//
									Ext.Msg.show({
										title : 'Problema al salvar',
										msg : 'Favor de intentar mas tarde',
										buttons : Ext.Msg.OK,
										icon : Ext.Msg.ERROR
									});
									// console.debug('entro al failure,
									// form', form, ', action', action);
								}
							});
						}
					}
				} ]
			}).show();
		}
		return win;
	}
});