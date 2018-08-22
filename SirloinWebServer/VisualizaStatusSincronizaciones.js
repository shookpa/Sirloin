/*!
 * Ext JS Library 4.0
 * Copyright(c) 2006-2011 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */
Ext.Loader.setPath('Ext.ux', 'extjs/examples/ux');
Ext
		.define(
				'MyDesktop.VisualizaStatusSincronizaciones',
				{
					extend : 'Ext.ux.desktop.Module',

					requires : [ 'Ext.data.ArrayStore', 'Ext.util.Format',
							'Ext.ux.RowExpander', 'Ext.grid.Panel',
							'Ext.QuickTips', 'Ext.grid.RowNumberer' ],

					id : 'visualiza-status-sincronizaciones',
					init : function() {
						this.launcher = {
							text : 'Visualiza Status Sincronizaciones',
							id : 'launcher-visualiza-status-sincronizaciones',
							iconCls : 'dollars_16'
						};
					},

					createWindow : function() {
						// Ext.suspendLayouts();
						var desktop = this.app.getDesktop();
						var app = this.app;
						

						var win = desktop
								.getWindow('visualiza-status-sincronizaciones');
						Ext.define('Writer.Grid', {
							extend : 'Ext.grid.Panel',
							alias : 'widget.writergrid',
							requires : [

							'Ext.form.field.Text', 'Ext.toolbar.TextItem' ],
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

									columns : [

									{
										header : 'Restaurante',

										width : 150,
										dataIndex : 'restaurante'

									}, {
										header : 'Fecha Ultima Sincronización',
										width : 170,

										dataIndex : 'ultima_fecha'

									} ]
								});
								this.callParent();
								this.getSelectionModel().on('selectionchange',
										this.onSelectChange, this);
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
						Ext.define('Writer.Tarifa', {
							extend : 'Ext.data.Model',
							fields : [ 'restaurante', 'ultima_fecha' ]

						});
						Ext.require([ 'Ext.data.*', 'Ext.tip.QuickTipManager',
								'Ext.window.MessageBox' ]);

						Ext.tip.QuickTipManager.init();
						var store = Ext
								.create(
										'Ext.data.Store',
										{
											model : 'Writer.Tarifa',
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
													read : 'php/catalogos.php/statussincronizaciones/view',
													destroy : 'php/catalogos.php/statussincronizaciones/destroy'
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
													exception : function(proxy,
															response, operation) {
														Ext.MessageBox
																.show({
																	title : 'REMOTE EXCEPTION',
																	msg : operation
																			.getError(),
																	icon : Ext.MessageBox.ERROR,
																	buttons : Ext.Msg.OK
																});
													}

												}
											}

										});

						if (!win) {
							win = desktop
									.createWindow(
											{
												id : 'visualiza-status-sincronizaciones',
												title : 'Visualiza Status Sincronizaciones',
												width : 350,
												height : 250,
												layout : 'fit',
												iconCls : 'dollars_16',
												animCollapse : false,
												constrainHeader : true,
												autoScroll : true,
												items : [ {
													autoScroll : true,
													itemId : 'grid-visualiza-status-sincronizaciones',
													id : 'grid-visualiza-status-sincronizaciones',
													xtype : 'writergrid',
													store : store
												} ]
											}).show();
							window.restore();
						}
						// Ext.resumeLayouts(true);
						// window.restore();
						// window.toFront();
						return win;

					}

				});
