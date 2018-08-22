Ext.Loader.setPath('Ext.ux', 'extjs/examples/ux');
Ext.define('CustomCheckbox', {
	extend : 'Ext.grid.column.CheckColumn',
	xtype : 'CustomCheckbox',
	renderer : function(value, meta, algo, algun, alguno, otro, ultimo) {
		var cssPrefix = Ext.baseCSSPrefix, cls = [ cssPrefix + 'grid-checkcolumn' ];
		if (this.disabled) {
			meta.tdCls += ' ' + this.disabledCls;
		}
		if (value && value == 1) {
			cls.push(cssPrefix + 'grid-checkcolumn-checked');
		}
		arCols = this.dataIndex.split("_");
		columna = eval("meta.record.data." + arCols[1]);
		// console.debug("Veamos que trae la
		// columna",columna);//.down(arCols[1]) .down("lbl_modulo")
		// DEPENDIENDO SI HAY FUNCIONALIDAD EN EL QUE ESTAMOS, LE PONEMOS O NO
		// LE PONEMOS CHECK:
		if (columna.trim() == "")
			return '';
		else
			return '<img class="' + cls.join(' ') + '" src="' + Ext.BLANK_IMAGE_URL + '"/>';
	}
});
//GUARDAMOS EN UN OBJETO LOS PERMISOS GUARDADOS EN EL sessionStorage:
var perm= JSON.parse(sessionStorage.permisos);
Ext.define('MyDesktop.PanelMercadotecnia', {
	extend : 'Ext.ux.desktop.Module',
	requires : [ 'Ext.data.ArrayStore', 'Ext.util.Format', 'Ext.ux.RowExpander', 'Ext.grid.Panel', 'Ext.QuickTips', 'Ext.grid.RowNumberer' ],
	id : 'panel-mercadotecnia',
	init : function() {
		this.launcher = {
			text : 'Mercadotecnia',
			id : 'launcher-panel-mercadotecnia',
			iconCls : 'web_management_16'
		};
	},
	createWindow : function() {
		Ext.suspendLayouts();
		var desktop = this.app.getDesktop();
		var app = this.app;
		var mesSeleccionado = new Date().getMonth() + 1;
		var anioSeleccionado = new Date().getFullYear();
		var win = desktop.getWindow('launcher-panel-mercadotecnia');
		Ext.require([ 'Ext.data.*', 'Ext.tip.QuickTipManager', 'Ext.window.MessageBox' ]);
		// Create the Row Expander.
		var expander = new Ext.grid.plugin.RowExpander({
			tpl : new Ext.Template('<div id="myrow-{Id}"></div>'),
			listeners : {
				'expandbody' : function(grid) {
					console.debug("veamos", record.get('Id'))
				}
			}
		});
		Ext.tip.QuickTipManager.init();
		// COMIENZA EL TEMA DE LOS Promociones:
		Ext.define('Writer.GridPromociones', {
			extend : 'Ext.grid.Panel',
			alias : 'widget.gridPromociones',
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
					dockedItems : [ {
						xtype : 'toolbar',
						items : [ {
							iconCls : 'add',
							text : 'Agregar Promocion',
							disabled: perm!=null && !perm.some(item => item.id_permiso == '2' && item.per_func5 == "1"),
							itemId : 'newPromocion',
							scope : this,
							handler : this.onNewPromocionClick
						}, {
							iconCls : 'remove',
							text : 'Eliminar Promocion',
							disabled: perm!=null && !perm.some(item => item.id_permiso == '2' && item.per_func6 == "1"),
							itemId : 'deletePromocion',
							scope : this,
							disabled : true,
							handler : this.onDeletePromocionClick
						} ]
					} ],
					columns : [ {
						text : 'ID',
						width : 80,
						sortable : true,
						resizable : false,
						draggable : false,
						hideable : false,
						menuDisabled : true,
						dataIndex : 'id'
					}, {
						header : 'Foto',
						width : 200,
						renderer : function(value) {
							return '<center><img src="images/promociones/' + value + '" alt="Image" height="80"></center>';
						},
						dataIndex : 'foto'
					}, {
						header : 'Nombre archivo Foto',
						width : 150,
						dataIndex : 'foto'
					}, {
						header : 'Fecha registro',
						width : 150,
						dataIndex : 'fecha_registro'
					}, {
						header : 'Inicio Vigencia',
						width : 150,
						dataIndex : 'inicio_vigencia'
					}, {
						header : 'Fecha expiracion',
						width : 150,
						dataIndex : 'fecha_expiracion'
					}
					// ,
					// {
					// header : 'Tarjeta',
					// width : 150,
					// dataIndex : 'user'
					// }
					]
				});
				this.callParent();
				this.getSelectionModel().on('selectionchange', this.onSelectChange, this);
				this.getView().on('expandbody', this.onExpandNestedGrid, this);
				this.getView().on('collapsebody', this.onCollapseNestedGrid, this);
			},
			onSelectChange : function(selModel, selections) {
				this.down('#deletePromocion').setDisabled(selections.length === 0);
			},
			onSync : function() {
				this.store.sync();
			},
			onDeletePromocionClick : function() {
				var selection = this.getView().getSelectionModel().getSelection()[0];
				Ext.Msg.confirm('Advertencia', '<center>&iquest;Seguro de eliminar el registro de <br /><b>' + selection.data.foto + '</b> ?</center>', function(btn) {
					if (btn == 'yes') {
						if (selection) {
							storePromociones.remove(selection);
						}
					} else {}
				});
			},
			onNewPromocionClick : function() {
				// var selection =
				// this.getView().getSelectionModel().getSelection()[0];
				// if (selection) {
				modCotizacion = new MyDesktop.CreaPromociones();
				var window = modCotizacion.createWindow(app, 1);
				window.show();
				// window.maximize();
				// }
			}
		});
		/**
		 * 
		 */
		Ext.define('Writer.Promociones', {
			extend : 'Ext.data.Model',
			fields : [ {
				name : 'id',
				type : 'int',
				useNull : true
			}, 'foto', 'fecha_registro','inicio_vigencia', 'fecha_expiracion' ]
		});
		var storePromociones = Ext.create('Ext.data.Store', {
			model : 'Writer.Promociones',
			autoLoad : true,
			sorters : [ {
				property : 'id',
				direction : 'DESC'
			} ],
			autoSync : true,
			autoScroll : true,
			proxy : {
				type : 'ajax',
				api : {
					read : 'php/catalogos.php/promociones/view',
					destroy : 'php/catalogos.php/promociones/destroy'
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
		// TERMINAN LAS PROMOCIONES
		// COMIENZA EL TEMA DE LOS BOLETINES:
		Ext.define('Writer.GridBoletines', {
			extend : 'Ext.grid.Panel',
			alias : 'widget.gridBoletines',
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
					dockedItems : [ {
						xtype : 'toolbar',
						items : [ {
							iconCls : 'add',
							text : 'Agregar Boletin',
							itemId : 'newBoletin',
							disabled: perm!=null && !perm.some(item => item.id_permiso == '2' && item.per_func1 == "1"),
							scope : this,
							handler : this.onNewBoletinClick
						}, {
							iconCls : 'edit',
							text : 'Modificar Boletin',
							itemId : 'editBoletin',
							disabled: perm!=null && !perm.some(item => item.id_permiso == '2' && item.per_func2 == "1"),
							scope : this,
							disabled : true,
							handler : this.onEditBoletinClick
						}, {
							iconCls : 'remove',
							text : 'Eliminar Boletin',
							disabled: perm!=null && !perm.some(item => item.id_permiso == '2' && item.per_func3 == "1"),
							itemId : 'deleteBoletin',
							scope : this,
							disabled : true,
							handler : this.onDeleteBoletinClick
						}, {
							iconCls : 'email_go',
							text : 'Enviar Boletin',
							disabled: perm!=null && !perm.some(item => item.id_permiso == '2' && item.per_func4 == "1"),
							itemId : 'sendBoletin',
							scope : this,
							handler : this.onSendBoletinClick
						} ]
					} ],
					columns : [ {
						text : 'ID',
						width : 50,
						sortable : true,
						resizable : false,
						draggable : false,
						hideable : false,
						menuDisabled : true,
						dataIndex : 'id'
					}, {
						header : 'Asunto',
						width : 300,
						dataIndex : 'asunto'
					}, {
						header : 'Cuerpo',
						width : 500,
						dataIndex : 'cuerpo'
					}, {
						header : 'Fecha de creación',
						width : 130,
						dataIndex : 'fecha_envio'
					} ]
				});
				this.callParent();
				this.getSelectionModel().on('selectionchange', this.onSelectChange, this);
				this.getView().on('expandbody', this.onExpandNestedGrid, this);
				this.getView().on('collapsebody', this.onCollapseNestedGrid, this);
			},
			onSelectChange : function(selModel, selections) {
				this.down('#deleteBoletin').setDisabled(selections.length === 0);
				// this.down('#editClient').setDisabled(selections.length ===
				// 0);
				// this.down('#newContact').setDisabled(selections.length ===
				// 0);
				// this.down('#enviar').setDisabled(selections.length
				// === 0);
				this.down('#editBoletin').setDisabled(selections.length === 0);
				// this.down('#createSolicitud').setDisabled(selections.length
				// === 0);
			},
			onSync : function() {
				this.store.sync();
			},
			onDeleteBoletinClick : function() {
				var selection = this.getView().getSelectionModel().getSelection()[0];
				Ext.Msg.confirm('Advertencia', '<center>&iquest;Seguro de eliminar el registro de <br /><b>' + selection.data.asunto + '</b> ?</center>', function(btn) {
					if (btn == 'yes') {
						if (selection) {
							storeBoletines.remove(selection);
						}
					} else {}
				});
			},
			onNewBoletinClick : function() {
				// var selection =
				// this.getView().getSelectionModel().getSelection()[0];
				// if (selection) {
				modCotizacion = new MyDesktop.CreaBoletines();
				var window = modCotizacion.createWindow(app, 1);
				window.show();
				// window.maximize();
				// }
			},
			onEditBoletinClick : function() {
				var selection = this.getView().getSelectionModel().getSelection()[0];
				if (selection) {
					solicitud = new MyDesktop.ModificaBoletines();
					var window = solicitud.createWindow(app, selection);
					window.show();
				}
			}// MyDesktop.AdministracionVIP()
			,
			onSendBoletinClick : function() {
				solicitud = new MyDesktop.AdministracionVIP2();
				var window = solicitud.createWindow(app);
				window.show();
//				window.maximize();
			}
		});
		/**
		 * 
		 */
		Ext.define('Writer.Boletines', {
			extend : 'Ext.data.Model',
			fields : [ {
				name : 'id',
				type : 'int',
				useNull : true
			}, 'asunto', 'cuerpo', 'fecha_envio' ]
		});
		var storeBoletines = Ext.create('Ext.data.Store', {
			model : 'Writer.Boletines',
			autoLoad : true,
			sorters : [ {
				property : 'id',
				direction : 'DESC'
			} ],
			autoSync : true,
			autoScroll : true,
			proxy : {
				type : 'ajax',
				api : {
					read : 'php/catalogos.php/boletines/view',
					destroy : 'php/catalogos.php/boletines/destroy'
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
		// TERMINAN LOS BOLETINES
		if (!win) {
			win = desktop.createWindow({
				id : 'panel-mercadotencia',
				title : 'Mercadotecnia',
				width : 740,
				height : 480,
				iconCls : 'operaciones',
				animCollapse : false,
				constrainHeader : true,
				layout : 'fit',
				layout : {
					type : 'vbox',
					align : 'stretch'
				},
				items : [ {
					xtype : 'tabpanel',
					activeTab : 0,
					bodyStyle : 'padding: 5px;',
					items : [ {
						title : 'Listado de Promociones',
						header : false,
						border : false,
						items : [ {
							itemId : 'gridPromociones',
							id : 'gridPromociones',
							xtype : 'gridPromociones',
							store : storePromociones
						} ]
					}, {
						title : 'Listado de Boletines',
						header : false,
						border : false,
						items : [ {
							itemId : 'gridBoletines',
							id : 'gridBoletines',
							xtype : 'gridBoletines',
							store : storeBoletines
						} ]
					} ]
				} ]
			});
		}
		Ext.resumeLayouts(true);
		return win;
	}
});
