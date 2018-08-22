Ext.Loader.setPath('Ext.ux', 'extjs/examples/ux');
Ext.define('MyDesktop.CreaEmpresas', {
	extend : 'Ext.ux.desktop.Module',
	requires : [ 'Ext.tab.Panel', 'Ext.chart.*', 'Ext.layout.container.Fit', 'Ext.fx.target.Sprite', 'Ext.selection.CheckboxModel' ],
	id : 'crear-empresas',
	init : function() {
		this.launcher = {
			text : 'Crear Empresas',
			id : 'launcher-crear-empresas',
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
		var win = desktop.getWindow('crear-empresas');
		var panelEmpresas = Ext.create('Ext.form.Panel', {
			title : '<center>Crear Empresa ' + '</center>',
			bodyStyle : 'padding:5px',
			id : 'panelEmpresas',
			itemId : 'panelEmpresas',
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
						fieldLabel : 'Nombre Empresa',
						tabIndex : 3,
						allowBlank : false,
						name : 'nombre_empresa',
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
//								if (eventObjet.button == 12) {//se comenta para que no espere el enter
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
												panelEmpresas.items.get(0).items.get(1).items.get(1).setValue(storeEstados.getAt('0').get('id_estado'));
												// SI ES DEL DISTRITO FEDERAL,
												// QUE CAMBIE LA ETIQUETA DE
												// MUNICIPIO A DELEGACIÓN:
												if (storeEstados.getAt('0').get('id_estado') == 9)
													panelEmpresas.items.get(0).items.get(1).items.get(2).setFieldLabel('Delegaci&oacute;n');
												else
													panelEmpresas.items.get(0).items.get(1).items.get(2).setFieldLabel('Municipio');
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
												panelEmpresas.items.get(0).items.get(1).items.get(2).clearValue();
												panelEmpresas.items.get(0).items.get(1).items.get(2).setValue(storeMunicipios.getAt('0').get('id_municipio'));
											},
										});
										storeColonias.load({
											params : {
												tabla : 'colonias',
												filtros : 'INNER JOIN cp ON cp.id_cp = colonias.id_cp WHERE cp.cp =' + this.getValue() + ' ORDER BY colonia'
											},
											callback : function(records, operation, success) {
												panelEmpresas.items.get(0).items.get(0).items.get(3).clearValue();
											}
										});
										storeCiudades.load({
											params : {
												tabla : 'ciudades',
												filtros : 'INNER JOIN cp ON cp.id_cp = ciudades.id_cp WHERE cp.cp=' + this.getValue()
											},
											callback : function(records, operation, success) {
												panelEmpresas.items.get(0).items.get(0).items.get(2).setValue(storeCiudades.getAt('0').get('ciudad'));
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
										panelEmpresas.items.get(0).items.get(1).items.get(1).clearValue();
										panelEmpresas.items.get(0).items.get(1).items.get(2).clearValue();
										panelEmpresas.items.get(0).items.get(0).items.get(3).clearValue();
										
										panelEmpresas.items.get(0).items.get(0).items.get(2).setValue('');
										panelEmpresas.items.get(0).items.get(1).items.get(2).setFieldLabel('Municipio');
									}
//								}//este se comenta
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
										
										panelEmpresas.items.get(0).items.get(0).items.get(1).setValue(storeCP.getAt('0').get('cp'));
										storeCiudades.load({
											params : {
												tabla : 'ciudades',
												filtros : 'INNER JOIN cp ON cp.id_cp = ciudades.id_cp WHERE cp.cp=' + panelEmpresas.items.get(0).items.get(0).items.get(1).getValue()
											},
											callback : function(records, operation, success) {
												panelEmpresas.items.get(0).items.get(0).items.get(2).setValue(storeCiudades.getAt('0').get('ciudad'));
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
								panelEmpresas.items.get(0).items.get(1).items.get(2).clearValue();
								panelEmpresas.items.get(0).items.get(0).items.get(3).clearValue(); 
								panelEmpresas.items.get(0).items.get(0).items.get(2).setValue('');
								panelEmpresas.items.get(0).items.get(0).items.get(1).setValue('');
								// SI SELECCIONA EL DISTRITO FEDERAL, QUE CAMBIE
								// LA ETIQUETA DE MUNICIPIO A DELEGACIÓN:
								if (record[0].get('id_estado') == 9)
									panelEmpresas.items.get(0).items.get(1).items.get(2).setFieldLabel('Delegaci&oacute;n');
								else
									panelEmpresas.items.get(0).items.get(1).items.get(2).setFieldLabel('Municipio');
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
//										panelEmpresas.items.get(0).items.get(0).items.get(3).setValue(storeColonias.getAt('0').get('id_colonia'));
									}
								});
								panelEmpresas.items.get(0).items.get(0).items.get(3).clearValue();
								panelEmpresas.items.get(0).items.get(0).items.get(2).setValue('');
								panelEmpresas.items.get(0).items.get(0).items.get(1).setValue('');
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
					} ]
				}, ],
			} ]
		});
		Ext.define('Writer.Grid', {
			extend : 'Ext.grid.Panel',
			alias : 'widget.writergrid',
			requires : [ 'Ext.form.field.Text', 'Ext.toolbar.TextItem' ],
			initComponent : function() {
				Ext.apply(this, {
					xtype : 'array-grid',
					stateful : true,
					multiSelect : true,
					stateId : 'stateGrid',
					viewConfig : {
						stripeRows : true,
						enableTextSelection : true
					},
					columns : [ {
						header : 'ID',
						width : 50,
						dataIndex : 'id_restaurante'
					}, {
						header : 'Nombre Restaurante',
						width : 170,
						dataIndex : 'nombre_restaurante'
					}, {
						header : 'Direccion',
						width : 170,
						dataIndex : 'direccion'
					}, {
						header : 'Telefono',
						width : 170,
						dataIndex : 'telefono'
					} ]
				});
				this.callParent();
				this.getSelectionModel().on('selectionchange', this.onSelectChange, this);
			},
			onSelectChange : function(selModel, selections) {
			// this.down('#delete').setDisabled(selections.length
			// === 0);
			// this.down('#pdf').setDisabled(selections.length
			// === 0);
			// this.down('#enviar').setDisabled(selections.length
			// === 0);
			// this.down('#update').setDisabled(selections.length
			// === 0);
			// this.down('#createSolicitud').setDisabled(selections.length
			// === 0);
			},
			onSync : function() {
				this.store.sync();
			},
		});
		Ext.define('Writer.Restaurant', {
			extend : 'Ext.data.Model',
			fields : [ 'id_restaurante', 'nombre_restaurante', 'direccion', 'telefono' ]
		});
		Ext.require([ 'Ext.data.*', 'Ext.tip.QuickTipManager', 'Ext.window.MessageBox' ]);
		Ext.tip.QuickTipManager.init();
		var store = Ext.create('Ext.data.Store', {
			model : 'Writer.Restaurant',
			autoLoad : true,
			sorters : [ {
				property : 'id',
				direction : 'DESC'
			} ],
			autoSync : true,
			autoScroll : true,
			// listeners :
			// {
			// bulkremove :
			// function(store,records, indexes,
			// isMove, eOpts) {
			// console.debug("Ya estamos en el
			// remove event bulkremove 2");
			// task.delay(20000);
			// Ext.getCmp('grid-registro-ingresos-egresos').store.load();
			//														
			// }
			//												
			// },
			proxy : {
				type : 'ajax',
				api : {
					read : 'php/catalogos.php/restaurantes/view'
				},
				reader : {
					type : 'json',
					successProperty : 'success',
					root : 'data',
					messageProperty : 'message'
				},
				writer : {
					type : 'json',
					writeAllFields : false,
					root : 'data'
				},
				listeners : {
					exception : function(proxy, response, operation) {
						Ext.MessageBox.show({
							title : 'REMOTE EXCEPTION',
							msg : operation.getError(),
							icon : Ext.MessageBox.ERROR,
							buttons : Ext.Msg.OK
						});
					}
				}
			}
		});
		if (!win) {
			win = desktop.createWindow({
				id : 'crear-empresas',
				itemId : 'crear-empresas',
				title : 'Crear Empresas',
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
					Ext.Msg.confirm('Confirmación de cerrado', '&iquest;Est&aacute;s seguro que deseas cerrar la ventana de Crear Empresas?', function(btn) {
						if (btn == 'yes')
							me.destroy();
					});
				},
				// layout : 'fit',
				defaultType : 'container',
				items : [ panelEmpresas, 
//					{
//					autoScroll : true,
//					itemId : 'grid-visualiza-restaurantes',
//					id : 'grid-visualiza-restaurantes',
//					xtype : 'writergrid',
//					selModel : selModel,
//					store : store
//				}
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
							"nombre_empresa" : panelForm.items.get(0).items.get(0).items.get(0).getValue(),							
							"telefono" : panelForm.items.get(0).items.get(1).items.get(0).getValue(),
							"estado" : panelForm.items.get(0).items.get(1).items.get(1).getValue(),
							"municipio" : panelForm.items.get(0).items.get(1).items.get(2).getValue(),
							"ciudad" : panelForm.items.get(0).items.get(0).items.get(2).getValue(),
							"colonia" : panelForm.items.get(0).items.get(0).items.get(3).getValue(),							
							"cp" : panelForm.items.get(0).items.get(0).items.get(1).getValue(),							
							"nombreCalle" : panelForm.items.get(0).items.get(1).items.get(3).getValue(),
							"numExt" : panelForm.items.get(0).items.get(0).items.get(4).getValue(),
							"numInt" : panelForm.items.get(0).items.get(1).items.get(4).getValue(),
							"restaurantes" : selected
						} ];
						if (formulario.isValid()) {
							// console.debug("veamos la seleccion",selected);
							formulario.submit({
								waitMsg : 'Grabando en Base de Datos...',
								submitEmptyText : false,
								url : 'php/saveFormCreateEmpr.php',
								params : {
									store_data : Ext.encode(datosFormulario)
								},
								success : function(form, action) {
									var data = Ext.decode(action.response.responseText);
									Ext.Msg.show({
										title : 'Empresa Almacenada',
										msg : 'Se guardo exitosamente la empresa  <b>' + panelForm.items.get(0).items.get(0).items.get(0).getValue() + '</b> ',
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