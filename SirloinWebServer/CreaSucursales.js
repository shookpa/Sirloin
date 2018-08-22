Ext.Loader.setPath('Ext.ux', 'extjs/examples/ux');
Ext.define('MyDesktop.CreaSucursales', {
	extend : 'Ext.ux.desktop.Module',
	requires : [ 'Ext.tab.Panel', 'Ext.chart.*', 'Ext.layout.container.Fit', 'Ext.fx.target.Sprite', 'Ext.selection.CheckboxModel' ],
	id : 'crear-sucursales',
	init : function() {
		this.launcher = {
			text : 'Crear Sucursales',
			id : 'launcher-crear-sucursales',
			iconCls : 'tabs'
		}
	},
	createWindow : function(aplicacion, registro) {
		// Ext.suspendLayouts();
		// var desktop =this.app.getDesktop();
		// console.debug("Ya entro donde queria createWindow");
		var storeEstados = aplicacion.deepCloneStore(aplicacion.storeEstados);
		var storeMunicipios = aplicacion.deepCloneStore(aplicacion.storeMunicipios);
		var storeColonias = aplicacion.deepCloneStore(aplicacion.storeColonias);
		var storeCiudades = aplicacion.deepCloneStore(aplicacion.storeCiudades);
		var storeCP = aplicacion.deepCloneStore(aplicacion.storeCP);
		
		
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
		var win = desktop.getWindow('crear-sucursales');
		var panelSucursales = Ext.create('Ext.form.Panel', {
			title : '<center>Crear Restaurante ' + '</center>',
			bodyStyle : 'padding:5px',
			id : 'panelSucursales',
			itemId : 'panelSucursales',
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
					columnWidth : .5,
					border : false,
					layout : 'anchor',
					defaultType : 'textfield',
					items : [ {
						fieldLabel : 'Nombre restaurante',
						tabIndex : 3,
						allowBlank : false,
						name : 'nombre_restaurante',
						anchor : '100%'
					}, {
						fieldLabel : 'C&oacute;digo Postal',
						name : 'cpCot',
						allowBlank : false,
						tabIndex : 17,
						// id: 'cpCot',
						anchor : '100%',
						maxLength : 5,
						enforceMaxLength : true,
						enableKeyEvents : true,
						listeners : {
							keyup : function(textfield, eventObjet) {
//								if (eventObjet.button == 12) { //se comenta para que no espere el enter
									if (this.getValue().length == 5) {
										storeEstados.load({
											params : {
												tabla : 'estados',
												filtros : 'INNER JOIN cp ON cp.id_estado = estados.id_estado WHERE cp.cp =' + this.getValue()
											},
											callback : function(records, operation, success) {
												// DESPUES DE QUE ACABE DE
												// PINTAR EL STORE DEL ESTADO
												// QUE PONGA EL PRIMER REGISTRO
												// EN EL COMBO
												// console.debug(storeEstados);
												panelSucursales.items.get(0).items.get(1).items.get(1).setValue(storeEstados.getAt('0').get('id_estado'));
												// SI ES DEL DISTRITO FEDERAL,
												// QUE CAMBIE LA ETIQUETA DE
												// MUNICIPIO A DELEGACIÓN:
												if (storeEstados.getAt('0').get('id_estado') == 9)
													panelSucursales.items.get(0).items.get(1).items.get(2).setFieldLabel('Delegaci&oacute;n');
												else
													panelSucursales.items.get(0).items.get(1).items.get(2).setFieldLabel('Municipio');
											},
										});
										storeMunicipios.load({
											params : {
												tabla : 'municipios',
												filtros : 'INNER JOIN cp ON cp.id_municipio = municipios.id_municipio WHERE cp.cp =' + this.getValue()
											},
											callback : function(records, operation, success) {
												// DESPUES DE QUE ACABE DE
												// PINTAR EL STORE DEL MUNICIPIO
												// QUE PONGA EL PRIMER REGISTRO
												// EN EL COMBO
												panelSucursales.items.get(0).items.get(1).items.get(2).clearValue();
												panelSucursales.items.get(0).items.get(1).items.get(2).setValue(storeMunicipios.getAt('0').get('id_municipio'));
											},
										});
										storeColonias.load({
											params : {
												tabla : 'colonias',
												filtros : 'INNER JOIN cp ON cp.id_cp = colonias.id_cp WHERE cp.cp =' + this.getValue() + ' ORDER BY colonia'
											},
											callback : function(records, operation, success) {
												panelSucursales.items.get(0).items.get(0).items.get(3).clearValue();
											}
										});
										storeCiudades.load({
											params : {
												tabla : 'ciudades',
												filtros : 'INNER JOIN cp ON cp.id_cp = ciudades.id_cp WHERE cp.cp=' + this.getValue()
											},
											callback : function(records, operation, success) {
												panelSucursales.items.get(0).items.get(0).items.get(2).setValue(storeCiudades.getAt('0').get('ciudad'));
											}
										});
									} else {
										// QUE DEJE LOS COMBOS DE ESTADO,
										// MUNICIPIO Y COLONIA CON SUS VALORES
										// POR DEFAULT
										storeEstados.load({
											params : {
												tabla : 'estados'
											}
										});
										storeMunicipios.load({
											params : {
												tabla : 'municipios',
												filtros : ' limit 0'
											}
										});
										storeColonias.load({
											params : {
												tabla : 'colonias',
												filtros : ' limit 0'
											}
										});
										// LIMPIAMOS LOS VALORES DE TODOS LOS
										// COMBOS
										panelSucursales.items.get(0).items.get(1).items.get(1).clearValue();
										panelSucursales.items.get(0).items.get(1).items.get(2).clearValue();
										panelSucursales.items.get(0).items.get(0).items.get(3).clearValue();
										panelSucursales.items.get(0).items.get(0).items.get(2).setValue('');
										panelSucursales.items.get(0).items.get(1).items.get(2).setFieldLabel('Municipio');
									}
//								}//se comenta para que no espere el enter
							}
						}
					}, {
						fieldLabel : 'Ciudad',
						name : 'ciudadCot',
						tabIndex : 19,
						// id: 'ciudadCot',
						anchor : '100%'
					}, {
						fieldLabel : 'Colonia',
						name : 'coloniaCot',
						xtype : 'combobox',
						// id: 'coloniaCot',
						tabIndex : 22,
						allowBlank : false,
						anchor : '100%',
						queryMode : 'local',
						typeAhead : true,
						matchFieldWidth : false,
						emptyText : 'Selecciona...',
						displayField : 'colonia',
						valueField : 'id_colonia',
						forceSelection : true,
						store : storeColonias,
						listeners : {
							select : function(combo, record) {
								storeCP.load({
									params : {
										tabla : 'colonias',
										filtros : 'INNER JOIN cp ON cp.id_cp = colonias.id_cp WHERE colonias.id_colonia=' + record[0].get('id_colonia')
									},
									callback : function(records, operation, success) {
										panelSucursales.items.get(0).items.get(0).items.get(1).setValue(storeCP.getAt('0').get('cp'));
										storeCiudades.load({
											params : {
												tabla : 'ciudades',
												filtros : 'INNER JOIN cp ON cp.id_cp = ciudades.id_cp WHERE cp.cp=' + panelSucursales.items.get(0).items.get(0).items.get(1).getValue()
											},
											callback : function(records, operation, success) {
												panelSucursales.items.get(0).items.get(0).items.get(2).setValue(storeCiudades.getAt('0').get('ciudad'));
											}
										});
									}
								});
							}
						}
					}, {
						fieldLabel : 'Numero Exterior',
						xtype : 'textfield',
						allowBlank : false,
						tabIndex : 25,
						name : 'numExtCot',
						// id: 'numExtCot',
						anchor : '100%'
					} ]
				}, {
					columnWidth : .5,
					border : false,
					layout : 'anchor',
					defaultType : 'textfield',
					items : [ {
						fieldLabel : 'Telefono',
						name : 'telefono',
						allowBlank : false,
						// queryMode: 'local',
						// maskRe: /[RS0-9]/,
						tabIndex : 7,
						anchor : '100%',
					// matchFieldWidth: false
					}, {
						fieldLabel : 'Estado',
						name : 'estadoCot',
						tabIndex : 18,
						// id: 'estadoCot',
						anchor : '100%',
						matchFieldWidth : false,
						emptyText : 'Selecciona...',
						xtype : 'combobox',
						displayField : 'estado',
						allowBlank : false,
						queryMode : 'local',
						typeAhead : true,
						valueField : 'id_estado',
						forceSelection : true,
						store : storeEstados,
						listeners : {
							select : function(combo, record) {
								storeMunicipios.load({
									params : {
										tabla : 'municipios',
										filtros : 'WHERE id_estado=' + record[0].get('id_estado') + ' ORDER BY municipio'
									}
								});
								panelSucursales.items.get(0).items.get(1).items.get(2).clearValue();
								panelSucursales.items.get(0).items.get(0).items.get(3).clearValue();
								panelSucursales.items.get(0).items.get(0).items.get(2).setValue('');
								panelSucursales.items.get(0).items.get(0).items.get(1).setValue('');
								// SI SELECCIONA EL DISTRITO FEDERAL, QUE CAMBIE
								// LA ETIQUETA DE MUNICIPIO A DELEGACIÓN:
								if (record[0].get('id_estado') == 9)
									panelSucursales.items.get(0).items.get(1).items.get(2).setFieldLabel('Delegaci&oacute;n');
								else
									panelSucursales.items.get(0).items.get(1).items.get(2).setFieldLabel('Municipio');
							}
						}
					}, {
						fieldLabel : 'Municipio',
						name : 'municipioCot',
						// id: 'municipioCot',
						tabIndex : 20,
						xtype : 'combobox',
						anchor : '100%',
						allowBlank : false,
						matchFieldWidth : false,
						emptyText : 'Selecciona...',
						queryMode : 'local',
						typeAhead : true,
						displayField : 'municipio',
						valueField : 'id_municipio',
						forceSelection : true,
						store : storeMunicipios,
						listeners : {
							select : function(combo, record) {
								storeColonias.load({
									params : {
										tabla : 'colonias',
										filtros : 'INNER JOIN cp ON cp.id_cp = colonias.id_cp WHERE cp.id_municipio=' + record[0].get('id_municipio') + ' ORDER BY colonia'
									},
									callback : function(records, operation, success) {
									// DESPUES DE QUE ACABE DE PINTAR EL
									// STORE DEL COLONIAS QUE PONGA EL
									// PRIMER REGISTRO EN EL COMBO
									// panelSucursales.items.get(0).items.get(0).items.get(3).setValue(storeColonias.getAt('0').get('id_colonia'));
									}
								});
								panelSucursales.items.get(0).items.get(0).items.get(3).clearValue();
								panelSucursales.items.get(0).items.get(0).items.get(2).setValue('');
								panelSucursales.items.get(0).items.get(0).items.get(1).setValue('');
							}
						}
					}, {
						fieldLabel : 'Nombre Calle',
						tabIndex : 24,
						allowBlank : false,
						xtype : 'textfield',
						name : 'calleCot',
						// id: 'calleCot',
						anchor : '100%'
					}, {
						fieldLabel : 'Numero Interior',
						xtype : 'textfield',
						tabIndex : 26,
						name : 'numIntCot',
						// id: 'numIntCot',
						anchor : '100%'
					}, {
						fieldLabel : 'URL Fija:',
						tabIndex : 9,
						// allowBlank : false,
						name : 'url_fija',
						anchor : '100%'
					} ],
				} ]
			} ]
		});
		Ext.require([ 'Ext.data.*', 'Ext.tip.QuickTipManager', 'Ext.window.MessageBox' ]);
		Ext.tip.QuickTipManager.init();
		if (!win) {
			win = desktop.createWindow({
				id : 'crear-sucursales',
				itemId : 'crear-sucursales',
				title : 'Crear Sucursales',
				width : 500,
				height : 400,
				modal : true,
				draggable : true,
				iconCls : 'tabs',
				animCollapse : false,
				border : false,
				constrainHeader : true,
				autoScroll : true,
				onEsc : function() {
					var me = this;
					Ext.Msg.confirm('Confirmación de cerrado', '&iquest;Est&aacute;s seguro que deseas cerrar la ventana de Crear Sucursales?', function(btn) {
						if (btn == 'yes')
							me.destroy();
					});
				},
				// layout : 'fit',
				defaultType : 'container',
				items : [ panelSucursales ],
				buttons : [ {
					text : 'Guardar',
					tabIndex : 20,
					handler : function(btn) {
						console.debug(this.up().up().items.get(0).getForm());
						formulario = this.up().up().items.get(0).getForm();
						panelForm = this.up().up().items.get(0);
						var s = selModel.getSelection();
						var datosFormulario = [ {
							"nombre_restaurante" : panelForm.items.get(0).items.get(0).items.get(0).getValue(),
							"telefono" : panelForm.items.get(0).items.get(1).items.get(0).getValue(),
							"estado" : panelForm.items.get(0).items.get(1).items.get(1).getValue(),
							"municipio" : panelForm.items.get(0).items.get(1).items.get(2).getValue(),
							"ciudad" : panelForm.items.get(0).items.get(0).items.get(2).getValue(),
							"colonia" : panelForm.items.get(0).items.get(0).items.get(3).getValue(),							
							"cp" : panelForm.items.get(0).items.get(0).items.get(1).getValue(),							
							"nombreCalle" : panelForm.items.get(0).items.get(1).items.get(3).getValue(),
							"numExt" : panelForm.items.get(0).items.get(0).items.get(4).getValue(),
							"numInt" : panelForm.items.get(0).items.get(1).items.get(4).getValue(),
							"url_fija" : panelForm.items.get(0).items.get(1).items.get(5).getValue()
						} ];
						if (formulario.isValid()) {
							// console.debug("veamos la seleccion",selected);
							formulario.submit({
								waitMsg : 'Grabando en Base de Datos...',
								submitEmptyText : false,
								url : 'php/saveFormCreateSuc.php',
								params : {
									store_data : Ext.encode(datosFormulario)
								},
								success : function(form, action) {
									var data = Ext.decode(action.response.responseText);
									Ext.Msg.show({
										title : 'Restaurante Almacenado',
										msg : 'Se guardo exitosamente el restaurante <b>' + panelForm.items.get(0).items.get(0).items.get(0).getValue() + '</b> ',
										buttons : Ext.Msg.OK,
										icon : Ext.Msg.INFO
									});
									win.destroy();
									// PARA QUE CARGUE NUEVAMENTE EL GRID
									// DESPUES DE GUARDAR
									try {
										Ext.getCmp('gridSucursales').store.load();
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