Ext.Loader.setPath('Ext.ux', 'extjs/examples/ux');
Ext.require([ 'Ext.grid.*', 'Ext.data.*', 'Ext.form.*', 'Ext.layout.*', 'Ext.tab.Panel', 'Ext.selection.CheckboxModel' ]);
/**
 * COMIENZO DE GRID
 */
var selModel = Ext.create('Ext.selection.CheckboxModel', {
	selType : 'checkboxmodel',
	showHeaderCheckbox : true,
	listeners : {
		selectionchange : function(sm, selections) {
		// grid4.down('#removeButton').setDisabled(selections.length === 0);
		}
	}
});
//GUARDAMOS EN UN OBJETO LOS PERMISOS GUARDADOS EN EL sessionStorage:
var perm= JSON.parse(sessionStorage.permisos);
Ext.define('Writer.Grid', {
	extend : 'Ext.grid.Panel',
	alias : 'widget.writergrid',
	requires : [ 'Ext.form.field.Text', 'Ext.toolbar.TextItem' ],
	initComponent : function() {
		Ext.apply(this, {
			frame : false,
			multiSelect : true,
			// selType : 'checkboxmodel',
			// dockedItems: [{
			// xtype: 'toolbar',
			// items: [{
			// iconCls: 'add',
			// text: 'Agregar',
			// scope: this,
			// handler: this.onAddClick
			// }, {
			// iconCls: 'remove',
			// text: 'Eliminar',
			// disabled: true,
			// itemId: 'delete',
			// scope: this,
			// handler: this.onDeleteClick
			// }]
			// }],
			columns : [ {
				text : 'ID',
				width : 40,
				sortable : true,
				resizable : false,
				draggable : false,
				hideable : false,
				menuDisabled : true,
				dataIndex : 'id'
			}, {
				header : 'Restaurante',
				width : 90,
				sortable : true,
				dataIndex : 'nombre_restaurante',
				field : {
					type : 'textfield'
				}
			}, {
				header : 'Numero VIP',
				width : 90,
				sortable : true,
				dataIndex : 'num_vip',
				field : {
					type : 'textfield'
				}
			}, {
				header : 'Nombre Cliente',
				width : 250,
				sortable : true,
				dataIndex : 'nom_vip',
				field : {
					type : 'textfield'
				}
			}, {
				header : 'Telefono Cliente',
				width : 100,
				sortable : true,
				dataIndex : 'tel_vip',
				field : {
					type : 'textfield'
				}
			}, {
				header : 'Email',
				width : 200,
				sortable : true,
				dataIndex : 'ema_vip',
				field : {
					type : 'textfield'
				}
			}, {
				header : 'Tipo Movimiento',
				width : 200,
				id: "tipo_movimiento_header",
				sortable : true,
				dataIndex : 'det_vip',
				field : {
					type : 'textfield'
				}
			}, {
				header : 'Fecha Movimiento',
				width : 120,
				id: "fecha_movimiento_header",
				sortable : true,
				dataIndex : 'fec_vip',
				field : {
					type : 'textfield'
				}
			}, {
				header : 'Monto Movimiento',
				width : 120,
				id: "monto_movimiento_header",
				renderer : Ext.util.Format.usMoney,
				sortable : true,
				dataIndex : 'mon_vip',
				field : {
					type : 'textfield'
				}
			} ]
		});
		this.callParent();
		this.getSelectionModel().on('selectionchange', this.onSelectChange, this);
	},
	onSelectChange : function(selModel, selections) {
//		console.debug("quiobolas", this.up().up().items.get(0).query(".button")[3]);
		console.debug("selections.length", selections.length);
		
//		Ext.getCmp('PanelReporteMovimientos').items.get(0).query(".button")[3]
		
		if(perm!=null )
		{
			this.up().up().down('#sendPromotion').setDisabled(selections.length === 0 || !perm.some(item => item.id_permiso == '3' && item.per_func5 == "1"));
			this.up().up().down('#modifyBalance').setDisabled(!(selections.length == 1) || !perm.some(item => item.id_permiso == '3' && item.per_func6 == "1"));
		}
		else
		{
			this.up().up().down('#sendPromotion').setDisabled(selections.length === 0);
			this.up().up().down('#modifyBalance').setDisabled(!(selections.length == 1));
		}
		
	},
	onSync : function() {
		storeGridMovs.sync();
	}
});
Ext.define('Model.Movimientos', {
	extend : 'Ext.data.Model',
	fields : [ {
		name : 'id',
		type : 'int',
		useNull : true
	}, 'mov_vip', 'num_vip', 'nom_vip', 'nombre_restaurante','id_restaurante', 'doc_vip', 'det_vip', 'fec_vip', 'ema_vip', 'tel_vip', 'mon_vip' ]
});
Ext.require([ 'Ext.data.*', 'Ext.tip.QuickTipManager', 'Ext.window.MessageBox' ]);
Ext.tip.QuickTipManager.init();
var storeGridMovs = Ext.create('Ext.data.Store', {
	model : 'Model.Movimientos',
	pageSize: 100,
	autoLoad : true,
	autoSync : true,
	autoScroll : true,
	proxy : {
		type : 'ajax',
		api : {
			read : 'php/catalogos.php/movimientos/view',
		},
		reader : {
			type : 'json',
			successProperty : 'success',
			root : 'data',
			totalProperty: 'total',
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
	},
});
/**
 * FIN DE GRID
 */
Ext.define('MyDesktop.AdministracionVIP2', {
	extend : 'Ext.ux.desktop.Module',
	requires : [ 'Ext.tab.Panel', 'Ext.chart.*', 'Ext.layout.container.Fit', 'Ext.fx.target.Sprite' ],
	id : 'panel-administracion2',
	init : function() {
		this.launcher = {
			text : 'Modulo Reportes VIP',
			id : 'launcher-panel-administracion2',
			iconCls : 'sales_report_16'
		}
	},
	createWindow : function(aplicacion) {
		if(this.app!=undefined && this.app!=null)
			var app = this.app;
		else
			var app = aplicacion;
		var desktop = app.getDesktop();
		var win = desktop.getWindow('panel-administracion2');
		var PanelReporteClientes = Ext.create('Ext.form.Panel', {
			title : '<center>Listado de Clientes VIP</center>',
			bodyStyle : 'padding:5px',
			id : 'PanelReporteClientes',
			border : false,
			anchor : '100%',
			fieldDefaults : {
				labelAlign : 'top',
				msgTarget : 'side'
			},
			layout : 'anchor',
			items : [ {
				border : false,
				defaults : {
					anchor : '100%'
				},
				layout : 'anchor',
				buttons : [ {
					text : 'Generar Reporte',
					tabIndex : 21,
					handler : function(btn) {
						formulario = this.up('form').getForm();
						panelForm = this.up('form');
						window.open("php/lib/export_excel_cli_vip_todos.php");
					}
				} ]
			} ]
		});
		var PanelReporteMovimientos = Ext.create('Ext.form.Panel', {
			title : '<center>Listado de Movimientos de Tarjetas VIP</center>',
			bodyStyle : 'padding:5px',
			id : 'PanelReporteMovimientos',
			border : false,
			anchor : '100%',
			fieldDefaults : {
				labelAlign : 'top',
				msgTarget : 'side'
			},
			layout : 'anchor',
			items : [ {
				border : false,
				defaults : {
					anchor : '100%'
				},
				layout : 'anchor',
				dockedItems : [ {
					xtype : 'toolbar',
					items : [ {
						// fieldLabel : 'Restaurante',
						xtype : 'combobox',
						itemId : 'restaurante',
						name : 'restaurante',
						queryMode : 'local',
						typeAhead : true,
						tabIndex : 13,
						labelWidth : 50,
						width: 190,
						emptyText : 'Seleccione un restaurante',
						displayField : 'nombre_restaurante',
						valueField : 'id_restaurante',
						forceSelection : true,
						store : app.storeRestaurantes
					}, {
						xtype : 'combobox',
						itemId : 'tipo_mov',
						name : 'tipo_mov',
						queryMode : 'local',
						typeAhead : true,
						width: 220,
						tabIndex : 14,
						labelWidth : 50,
						emptyText : 'Seleccione el tipo de movimiento',
						store : Ext.create('Ext.data.Store', {
							fields : [ 'movimiento' ],
							data : [ {
								"id" : 0,
								"movimiento" : "Todos los movimientos"
							}, {
								"id" : 1,
								"movimiento" : "Saldo utilizado (por compra del cliente)"
							}, {
								"id" : 2,
								"movimiento" : "Carga de saldo (por venta al cliente)"
							} ]
						}),
						displayField : 'movimiento',
						valueField : 'id',
						forceSelection : true
					}, {
						xtype : 'datefield',
						name : 'fecha1',
						itemId : 'fecha1',
//						allowBlank : false,
						width: 240,
						emptyText : 'Seleccione fecha de movimiento inicial',
						format : 'Y-m-d',
					// fieldLabel: 'Comienzo Movimientos:'
					}, {
						xtype : 'datefield',
						name : 'fecha2',
						itemId : 'fecha2',
//						allowBlank : false,
						width: 240,
						emptyText : 'Seleccione fecha de movimiento final',
						format : 'Y-m-d',
					},
					{
			            xtype      : 'fieldcontainer',
			            fieldLabel : '',
			            name : 'tipo_registro',
			            itemId: 'tipo_registro',
			            defaultType: 'radiofield',
			            defaults: {
			                flex: 1
			            },
			            layout: 'hbox',
			            items: [
			                {
			                    boxLabel  : 'Listado de movimientos&nbsp;&nbsp;&nbsp;',
			                    name      : 'tipo',
			                    disabled: perm!=null && !perm.some(item => item.id_permiso == '3' && item.per_func1 == "1"),
			                    inputValue: 'movs',
			                    itemId: 'tipo_registro_1',
			                    id        : 'tipo_registro_1'
			                }, {
			                    boxLabel  : 'Listado de tarjetas',
			                    itemId: 'tipo_registro_2',
			                    checked :true,
			                    disabled: perm!=null && !perm.some(item => item.id_permiso == '3' && item.per_func2 == "1"),
			                    name      : 'tipo',
			                    inputValue: 'tots',
			                    id        : 'tipo_registro_2'
			                }
			            ]
			        }]
				}, {
					xtype : 'toolbar',
					items : [ {
						xtype : 'textfield',
						name : 'montoMin',
						itemId : 'montoMin',
						width: 210,
						// allowBlank : false,
						maskRe : /[0-9\.]/,
						renderer : Ext.util.Format.numberRenderer('$ 000,000.'),
						enableKeyEvents : true,
						emptyText : 'Ingrese cantidad de compra mínima',
					// fieldLabel: 'Comienzo Movimientos:'
					}, {
						xtype : 'textfield',
						name : 'montoMax',
						width: 210,
						itemId : 'montoMax',
						// allowBlank : false,
						emptyText : 'Ingrese cantidad de compra máxima',
						maskRe : /[0-9\.]/,
						renderer : Ext.util.Format.numberRenderer('$ 000,000.'),
						enableKeyEvents : true,
					}, {
						xtype : 'textfield',
						name : 'tarjeta',
						width: 170,
						itemId : 'tarjeta',
						emptyText : 'Ingrese el número de tarjeta'
					}, {
						xtype : 'textfield',
						name : 'nombre',
						width: 180,
						itemId : 'nombre',
						emptyText : 'Ingrese el nombre del Cliente'
					}, {
						xtype : 'datefield',
						name : 'fechaNac',
						itemId : 'fechaNac',
						width: 245,
						format : 'Y-m-d',
						emptyText : 'Seleccione fecha de nacimiento (desde)'
					},{
						xtype : 'datefield',
						name : 'fechaNac2',
						width: 245,
						itemId : 'fechaNac2',
						format : 'Y-m-d',
						emptyText : 'Seleccione fecha de nacimiento (hasta)'
					}, {
						iconCls : 'icon-find1',
						text : 'Buscar',
						disabled: perm!=null && (!perm.some(item => item.id_permiso == '3' && item.per_func2 == "1") && perm.some(item => item.id_permiso == '3' && item.per_func1 == "1")),
						itemId : 'btnBuscar',
						scope : this,
						listeners : {
							click : function(textfield, eventObjet) {
								var rest = this.up().up().down('#restaurante').value;
								var fec1 = this.up().up().down('#fecha1').getRawValue();
								var fec2 = this.up().up().down('#fecha2').getRawValue();
								var tarjeta = this.up().up().down('#tarjeta').getRawValue();
								var montoMax = this.up().up().down('#montoMax').getRawValue();
								var montoMin = this.up().up().down('#montoMin').getRawValue();
								var nombre = this.up().up().down('#nombre').getRawValue();
								var fechaNac = this.up().up().down('#fechaNac').getRawValue();
								var fechaNac2 = this.up().up().down('#fechaNac2').getRawValue();
								var tipo_mov = this.up().up().down('#tipo_mov').value;
								var tipo_registro = this.up().up().down('#tipo_registro_1').getValue();
								if(tipo_registro)
								{ //MOSTRAREMOS ALGUNAS COLUMNAS DEPENDIENDO DEL TIPO DE REGISTRO A MOSTRAR
									Ext.getCmp("monto_movimiento_header").setText("Monto movimiento");
									Ext.getCmp("tipo_movimiento_header").setVisible(true);
									Ext.getCmp("fecha_movimiento_header").setVisible(true);
								}
								else
								{
									Ext.getCmp("monto_movimiento_header").setText("Saldo de puntos");
									
									Ext.getCmp("tipo_movimiento_header").setVisible(false);
									Ext.getCmp("fecha_movimiento_header").setVisible(false);
								}	
								
								
							
									storeGridMovs.setProxy({
										type : 'ajax',
										api : {
											read : 'php/catalogos.php/movimientos/search/fec1=' + fec1 + '&fec2=' + fec2 + '&rest=' + rest + '&tipomov=' + tipo_mov + "&tarjeta=" + tarjeta + "&montoMax=" + montoMax + "&montoMin=" + montoMin + "&nombre=" + nombre + "&fechaNac=" + fechaNac+"&fechaNac2=" + fechaNac2+"&tipoReg=" + tipo_registro,
										},
										reader : {
											type : 'json',
											successProperty : 'success',
											totalProperty: 'total',
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
									});
									storeGridMovs.load();
								
							}
						}
					//							                            
					} ]
				} ],
				items : [ {
					itemId : 'gridMovimientos',
					id : 'gridMovimientos',
					xtype : 'writergrid',
					selModel : selModel,
					height : 400,
					store : storeGridMovs,
					 dockedItems: [{
					        xtype: 'pagingtoolbar',
					        store: storeGridMovs,   // same store GridPanel is using
					        dock: 'bottom',
					        displayInfo: true
					    }]
				} ],
				buttons : [  {
					text : 'Enviar Promoción',
					tabIndex : 21,
					disabled:true,
					itemId : 'sendPromotion',
					handler : function(btn) {
						var s = selModel.getSelection();
						// And then you can iterate over the selected items,
						// e.g.:
						selected = [];
						Ext.each(s, function(item) {
							if(item.data.ema_vip!=null && item.data.ema_vip!="" && !selected.includes(item.data.ema_vip))
								selected.push(item.data.ema_vip);
						});
						console.debug(selected);
						modulo = new MyDesktop.EnviaPromociones();
						var window = modulo.createWindow(app, selected);
						window.show();
						// Ext.MessageBox.show({
						// title : 'ENVIO DE PROMOCIONES EN DESARROLLO',
						// msg : "Enviará correos a
						// "+selModel.getSelection().length+" clientes",
						// icon : Ext.MessageBox.INFO,
						// buttons : Ext.Msg.OK
						// });
						// formulario = this.up('form').getForm();
						// panelForm = this.up('form');
						// window.open("php/lib/export_excel_cli_vip_todos.php");
					}
				} ]
			} ]
		});
		
		if (!win) {
			win = desktop.createWindow({
				id : 'panel-administracion2',
				title : 'Modulo de Reportes tarjetas VIP',
				width :  1500,
				height :600,
				modal : true,
				draggable : true,
				iconCls : 'sales_report_16',
				animCollapse : false,
				border : false,
				constrainHeader : true,
				autoScroll : true,
				onEsc : function() {
					var me = this;
					Ext.Msg.confirm('Confirmación de cerrado', '&iquest;Est&aacute;s seguro que deseas cerrar el Panel?', function(btn) {
						if (btn == 'yes')
							me.destroy();
					});
				},
				layout : 'fit',
				defaultType : 'container',
				items : [ {
					xtype : 'tabpanel',
					activeTab : 0,
					bodyStyle : 'padding: 5px;',
					items : [ {
						title : 'Listado de Tarjetas VIP',
						header : false,
						border : false,
						items : [ PanelReporteMovimientos ]
					} ]
				} ]
			}).show();
		}
		return win;
	}
});