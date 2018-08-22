Ext.Loader.setPath('Ext.ux', 'extjs/examples/ux');
Ext.define('CustomCheckbox', {
    extend: 'Ext.grid.column.CheckColumn',
    xtype: 'CustomCheckbox',
    renderer : function(value, meta, algo, algun, alguno, otro, ultimo) {
        var cssPrefix = Ext.baseCSSPrefix,
            cls = [cssPrefix + 'grid-checkcolumn'];

        if (this.disabled) {
            meta.tdCls += ' ' + this.disabledCls;
        }
        if (value && value==1) {
            cls.push(cssPrefix + 'grid-checkcolumn-checked');
        }
        arCols=this.dataIndex.split("_");
        columna= eval("meta.record.data."+arCols[1]);
//        console.debug("Veamos que trae la columna",columna);//.down(arCols[1]) .down("lbl_modulo") 
        //DEPENDIENDO SI HAY FUNCIONALIDAD EN EL QUE ESTAMOS, LE PONEMOS O NO LE PONEMOS CHECK:
        if(columna.trim()=="")
        	return '';
        else        	
        	return '<img class="' + cls.join(' ') + '" src="' + Ext.BLANK_IMAGE_URL + '"/>';
    }
});
//GUARDAMOS EN UN OBJETO LOS PERMISOS GUARDADOS EN EL sessionStorage:
var perm= JSON.parse(sessionStorage.permisos);
Ext.define('MyDesktop.AdministraUsuarios',
				{
					extend : 'Ext.ux.desktop.Module',
					requires : [ 'Ext.data.ArrayStore', 'Ext.util.Format',
							'Ext.ux.RowExpander', 'Ext.grid.Panel',
							'Ext.QuickTips', 'Ext.grid.RowNumberer' ],

					id : 'administra-usuarios',
					init : function() {
						this.launcher = {
							text : 'Administracion de los Usuarios',
							id : 'launcher-administra-usuarios',
							iconCls : 'web_management_16'
						};
					},

					createWindow : function() {
						Ext.suspendLayouts();
						var desktop = this.app.getDesktop();
						var app = this.app;
						var mesSeleccionado=new Date().getMonth()+1;
						var anioSeleccionado=new Date().getFullYear();
						var win = desktop.getWindow('launcher-administra-usuarios');
						Ext.require([ 'Ext.data.*', 'Ext.tip.QuickTipManager','Ext.window.MessageBox' ]);
						 // Create the Row Expander.
						var expander = new Ext.grid.plugin.RowExpander({
						     tpl : new Ext.Template('<div id="myrow-{Id}"></div>'),
						     listeners: {
						         'expandbody' : function(grid) {
						        	 console.debug("veamos",record.get('Id'))
						         }
						     }
						});						

						Ext.tip.QuickTipManager.init();
						// COMIENZA EL TEMA DE LAS Usuarios:
						Ext.define('Writer.GridUsuarios',{
											extend : 'Ext.grid.Panel',
											alias : 'widget.gridUsuarios',
											requires : [
											'Ext.form.field.Text',
													'Ext.toolbar.TextItem' ],
											initComponent : function() {
												Ext.apply(
																this,
																{
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
																		items : [
																				{
																					iconCls : 'add',
																					text : 'Agregar Usuario',
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func7 == "1"),
																					itemId : 'newUser',
																					scope : this,																					
																					handler : this.onNewUserClick
																				},
																				{
																					iconCls : 'edit',
																					text : 'Modificar Usuario',
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func8 == "1"),
																					itemId : 'editUser',
																					scope : this,
																					disabled:true,
																					handler : this.onEditUserClick
																				},
																				{
																					iconCls : 'remove',
																					text : 'Eliminar Usuario',
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func9 == "1"),
																					itemId : 'deleteUser',
																					scope : this,
																					disabled:true,
																					handler : this.onDeleteUserClick
																				} ]
																	}],
																	columns : [
																			{
																				text : 'ID',
																				width : 50,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'id'
																			},
																			{
																				header : 'Nombre',
																				width : 120,
																				dataIndex : 'nombre'
																			},
																			{
																				header : 'Apellido Paterno',
																				width : 120,
																				dataIndex : 'a_paterno'
																			},
																			{
																				header : 'Apellido Materno',
																				width : 120,
																				dataIndex : 'a_materno'
																			},
																			{
																				header : 'Email / Usuario',
																				width : 200,
																				dataIndex : 'email'			
																			},
																			{
																				header : 'Tipo de Usuario',
																				width : 200,
																				dataIndex : 'descTipo'
																			},
																			{
																				header : 'Telefono',
																				width : 120,
																				dataIndex : 'telefono'
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
												this.getSelectionModel().on(
														'selectionchange',
														this.onSelectChange,
														this);
												 this.getView().on('expandbody', this.onExpandNestedGrid, this);
									             this.getView().on('collapsebody', this.onCollapseNestedGrid, this);
											},
											onSelectChange : function(selModel,
													selections) {
												 this.down('#deleteUser').setDisabled(selections.length === 0);
// this.down('#editClient').setDisabled(selections.length === 0);
// this.down('#newContact').setDisabled(selections.length === 0);
												// this.down('#enviar').setDisabled(selections.length
												// === 0);
												 this.down('#editUser').setDisabled(selections.length
												 === 0);
												// this.down('#createSolicitud').setDisabled(selections.length
												// === 0);

											},
											onSync : function() {
												this.store.sync();
											},

											onDeleteUserClick : function() {
												var selection = this.getView()
														.getSelectionModel()
														.getSelection()[0];
												Ext.Msg.confirm(
																'Advertencia',
																'<center>&iquest;Seguro de eliminar el registro de <br /><b>'
																		+ selection.data.nombre
																	    + '</b> ?</center>',
																function(btn) {
																	if (btn == 'yes') {
																		if (selection) {
																			storeUsuarios.remove(selection);
																		}

																	} else {

																	}

																});

											},
											onNewUserClick : function() {
												// var selection =
												// this.getView().getSelectionModel().getSelection()[0];
												// if (selection) {
												modCotizacion = new MyDesktop.CreaUsuarios();

												var window = modCotizacion
														.createWindow(app, 1);
												window.show();
												// window.maximize();
												// }
											},
											onEditUserClick : function() {
												var selection = this.getView().getSelectionModel().getSelection()[0];
								                if (selection) {
								                	 solicitud = new MyDesktop.ModificaUsuarios();
								                	 var window = solicitud.createWindow(app, selection);
								                	 window.show();                	 
								                }
												
											}
																				
										});
						/**
						 * 
						 */
						Ext.define('Writer.Usuarios', {
							extend : 'Ext.data.Model',
							fields : [ {
								name : 'id',
								type : 'int',
								useNull : true
							}, 'nombre', 'a_paterno', 'a_materno', 'user', 'num_vip', 'password', 'email', 'telefono', 'cp', 'fecha_nac', 'genero',  'descTipo',
							{name:'tipoUser', type:'int'}, {name:'rol_user', type:'int'}, {name:'id_empresa', type:'int'} 
							]
												
						});
				
						
						var storeUsuarios = Ext.create('Ext.data.Store',
										{
											model : 'Writer.Usuarios',
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
													read : 'php/catalogos.php/usuarios/view',
													destroy : 'php/catalogos.php/usuarios/destroy'
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
						
						// TERMINAN LAS Usuarios
						// COMIENZA EL TEMA DE LAS Sucursales:
						Ext.define('Writer.GridSucursales',{
											extend : 'Ext.grid.Panel',
											alias : 'widget.gridSucursales',
											
											requires : [
											'Ext.form.field.Text',
													'Ext.toolbar.TextItem' ],
											initComponent : function() {
												Ext.apply(
																this,
																{
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
																		items : [
																				{
																					iconCls : 'add',
																					text : 'Agregar Sucursal',
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func1 == "1"),
																					itemId : 'newSuc',
																					scope : this,																					
																					handler : this.onNewSucClick
																				},
																				{
																					iconCls : 'edit',
																					text : 'Modificar Sucursal',																					
																					itemId : 'editSuc',
																					scope : this,
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func2 == "1"),
																					handler : this.onEditSucClick
																				},
																				{
																					iconCls : 'remove',
																					text : 'Eliminar Sucursal',
																					itemId : 'deleteSuc',
																					scope : this,
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func3 == "1"),
																					handler : this.onDeleteSucClick
																				} ]
																	}],
																	columns : [
																			{
																				text : 'ID',
																				width : 50,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'id'
																			},
																			{
																				header : 'Nombre Restaurant',
																				width : 250,
																				dataIndex : 'nombre_restaurante'
																			} , {
																				header : 'Estado',
																				width : 170,
																				dataIndex : 'estado'

																			} , {
																				header : 'Municipio',
																				width : 170,
																				dataIndex : 'municipio'

																			} , {
																				header : 'Colonia',
																				width : 170,
																				dataIndex : 'colonia'

																			} , {
																				header : 'Telefono',
																				width : 170,
																				dataIndex : 'telefono'

																			} , {
																				header : 'URL Fija',
																				width : 300,
																				dataIndex : 'url_fija'

																			}	 ]																	
																});
												this.callParent();
												this.getSelectionModel().on(
														'selectionchange',
														this.onSelectChange,
														this);
												 this.getView().on('expandbody', this.onExpandNestedGrid, this);
									             this.getView().on('collapsebody', this.onCollapseNestedGrid, this);
											},
											onSelectChange : function(selModel,
													selections) {
// this.down('#deleteSuc').setDisabled(selections.length === 0);
// this.down('#editSuc').setDisabled(selections.length === 0);


											},
											onSync : function() {
												this.store.sync();
											},

											onDeleteSucClick : function() {
												var selection = this.getView()
														.getSelectionModel()
														.getSelection()[0];
												Ext.Msg.confirm(
																'Advertencia',
																'<center>&iquest;Seguro de eliminar el registro de <br /><b>'
																		+ selection.data.nombre_restaurante
																	    + '</b> ?</center>',
																function(btn) {
																	if (btn == 'yes') {
																		if (selection) {
																			storeSucursales.remove(selection);
																		}

																	} else {

																	}

																});

											},
											onNewSucClick : function() {
												// var selection =
												// this.getView().getSelectionModel().getSelection()[0];
												// if (selection) {
												modCotizacion = new MyDesktop.CreaSucursales();

												var window = modCotizacion
														.createWindow(app, 1);
												window.show();
												// window.maximize();
												// }
											},
											onEditSucClick : function() {
												var selection = this.getView().getSelectionModel().getSelection()[0];
								                if (selection) {
								                	 solicitud = new MyDesktop.ModificaSucursales();
								                	 var window = solicitud.createWindow(app, selection);
								                	 window.show();                	 
								                }
												
											}
																				
										});
						/**
						 * 
						 */
						Ext.define('Writer.Sucursales', {
							extend : 'Ext.data.Model',
							fields : [ {
								name : 'id',
								type : 'int',
								useNull : true
							}, 'nombre_restaurante', 'direccion', 'telefono', 'url_fija' ,'estado','municipio','colonia','idestado', 'idmunicipio','idcolonia','nombreCalle','numExt','numInt','cp','ciudad'
						 
							]
												
						});
				
						
						var storeSucursales = Ext.create('Ext.data.Store',
										{
											model : 'Writer.Sucursales',
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
													read : 'php/catalogos.php/restaurantes/view',
													destroy : 'php/catalogos.php/restaurantes/destroy'
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
						
						// TERMINAN LAS Sucursales
						var rolSel=0;
						Ext.define('Writer.Permisos', {
							extend : 'Ext.data.Model',
							fields : [ {
								name : 'id',
								type : 'int',
								useNull : true
							}, 'modulo','func1','func2','func3','func4','func5','func6','func7','func8','func9','func10','func11','func12','func13','func13','func14','func15','func16','func17','func18',
							{name: 'per_modulo',type: 'bool'},{name: 'per_func1',type: 'bool'},{name: 'per_func2',type: 'bool'},{name: 'per_func3',type: 'bool'},
							{name: 'per_func4',type: 'bool'},{name: 'per_func5',type: 'bool'},{name: 'per_func6',type: 'bool'},{name: 'per_func7',type: 'bool'},{name: 'per_func8',type: 'bool'},{name: 'per_func9',type: 'bool'},
							{name: 'per_func10',type: 'bool'},{name: 'per_func11',type: 'bool'},{name: 'per_func12',type: 'bool'},{name: 'per_func13',type: 'bool'},{name: 'per_func13',type: 'bool'},{name: 'per_func14',type: 'bool'},{name: 'per_func15',type: 'bool'},
							{name: 'per_func16',type: 'bool'},{name: 'per_func17',type: 'bool'},{name: 'per_func18',type: 'bool'}
							]
												
						});
						var storePermisos = Ext.create('Ext.data.Store',
								{
									model : 'Writer.Permisos',
									autoLoad : true,

//									sorters : [ {
//										property : 'id',
//										direction : 'DESC'
//									} ],
									autoSync : true,
									autoScroll : true,
									proxy : {
										type : 'ajax',
										api : {
											read : 'php/catalogos.php/permisos/view/'+rolSel,
											destroy : 'php/catalogos.php/permisos/destroy',
											 update: 'php/catalogos.php/permisos/update',
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
						// COMIENZA EL TEMA DE LOS ROLES:
						Ext.define('Writer.GridRoles',{
											extend : 'Ext.grid.Panel',
											alias : 'widget.gridRoles',
											 height:200,
											requires : [
											'Ext.form.field.Text',
													'Ext.toolbar.TextItem' ],
											initComponent : function() {
												Ext.apply(
																this,
																{
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
																		items : [
																				{
																					iconCls : 'add',
																					text : 'Agregar Rol',
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func10 == "1"),
																					itemId : 'newSuc',
																					scope : this,																					
																					handler : this.onNewRolClick
																				},
//																				{
//																					iconCls : 'edit',
//																					text : 'Modificar Permisos',
//																					itemId : 'modifPermisos',
//																					scope : this,
//																					disabled:true,
//																					handler : this.onModifPermClick
//																				},
																				{
																					iconCls : 'edit',
																					text : 'Modificar Rol',
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func11 == "1"),
																					itemId : 'editRol',
																					scope : this,
																					disabled:true,
																					handler : this.onEditRolClick
																				},
																				{
																					iconCls : 'remove',
																					text : 'Eliminar Rol',
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func12 == "1"),
																					itemId : 'deleteRol',
																					scope : this,
																					disabled:true,
																					handler : this.onDeleteRolClick
																				} ]
																	}],
																	columns : [
																			{
																				text : 'ID',
																				width : 50,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'id'
																			},
																			{
																				header : 'Nombre Rol',
																				width : 250,
																				dataIndex : 'nombre_rol'
																			}]																	
																});
												this.callParent();
												this.getSelectionModel().on(
														'selectionchange',
														this.onSelectChange,
														this);
												 this.getView().on('expandbody', this.onExpandNestedGrid, this);
									             this.getView().on('collapsebody', this.onCollapseNestedGrid, this);
											},
											onSelectChange : function(selModel,
													selections) {
												 this.down('#editRol').setDisabled(selections.length === 0);
												 var selection = this.getView()
													.getSelectionModel()
													.getSelection()[0]
												 storePermisos.setProxy({
														type : 'ajax',
														api : {
															read : 'php/catalogos.php/permisos/view/'+ selection.data.id,
															update: 'php/catalogos.php/permisos/update'
															
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
													});
												 storePermisos.load();
// this.down('#editSuc').setDisabled(selections.length === 0);


											},
											onSync : function() {
												this.store.sync();
											},

											onDeleteRolClick : function() {
												var selection = this.getView()
														.getSelectionModel()
														.getSelection()[0];
												Ext.Msg.confirm(
																'Advertencia',
																'<center>&iquest;Seguro de eliminar el registro de <br /><b>'
																		+ selection.data.nombre_rol
																	    + '</b> ?</center>',
																function(btn) {
																	if (btn == 'yes') {
																		if (selection) {
																			storeRoles.remove(selection);
																		}

																	} else {

																	}

																});

											},
											onNewRolClick : function() {
												// var selection =
												// this.getView().getSelectionModel().getSelection()[0];
												// if (selection) {
												modCotizacion = new MyDesktop.CreaRoles();

												var window = modCotizacion
														.createWindow(app, 1);
												window.show();
												// window.maximize();
												// }
											},
											onEditRolClick : function() {
												var selection = this.getView().getSelectionModel().getSelection()[0];
								                if (selection) {
								                	 solicitud = new MyDesktop.ModificaRoles();
								                	 var window = solicitud.createWindow(app, selection);
								                	 window.show();                	 
								                }
												
											}
																				
										});
						/**
						 * 
						 */
						Ext.define('Writer.Roles', {
							extend : 'Ext.data.Model',
							fields : [ {
								name : 'id',
								type : 'int',
								useNull : true
							}, 'nombre_rol'
						 
							]
												
						});
				
						
						var storeRoles = Ext.create('Ext.data.Store',
										{
											model : 'Writer.Roles',
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
													read : 'php/catalogos.php/roles/view',
													destroy : 'php/catalogos.php/roles/destroy'
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
						
						// TERMINAN LOS ROLES
						// COMIENZA EL TEMA DE LOS PERMISOS:
						Ext.define('Writer.GridPermisos',{
											extend : 'Ext.grid.Panel',
											alias : 'widget.gridPermisos',
											 height:300,
											autoScroll:true,
											 requires: [
										            'Ext.grid.plugin.CellEditing',
										            'Ext.form.field.Text',
										            'Ext.toolbar.TextItem'
										        ],
											initComponent : function() {
												 var cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
									                 
									                 listeners: {
									                    
								 beforeEdit: function (e, eOpts)
								 {
								 console.debug('beforeEdit');
								 },
									                         edit: function (theEditor, e, eOpts) 
									                         { 
									                        	  console.debug('edit', e.newValues );
									                             //store.load();
									                         } ,
 validateedit: function (editor, e)
 {
									                         	
 console.debug('validateedit');
 }
									                 },
									                 clicksToMoveEditor: 1,
									                 autoCancel: false
									                     
									                   
									             });
									        	 this.editing = Ext.create('Ext.grid.plugin.CellEditing');
									        	 Ext.apply(
																this,
																{
																	xtype : 'array-grid',
																	stateful : true,

																	multiSelect : true,
																	stateId : 'stateGrid',
																	plugins: cellEditing,
																	viewConfig : {
																		stripeRows : true,
																		
																		enableTextSelection : true
																	},
// dockedItems : [ {
// xtype : 'toolbar',
// items : [
// {
// iconCls : 'add',
// text : 'Agregar Rol',
// itemId : 'newSuc',
// scope : this,
// handler : this.onNewRolClick
// },
// {
// iconCls : 'edit',
// text : 'Modificar Permisos',
// itemId : 'modifPermisos',
// scope : this,
// disabled:true,
// handler : this.onModifPermClick
// },
// {
// iconCls : 'edit',
// text : 'Modificar Rol',
// itemId : 'editRol',
// scope : this,
// disabled:true,
// handler : this.onEditRolClick
// },
// {
// iconCls : 'remove',
// text : 'Eliminar Rol',
// itemId : 'deleteRol',
// scope : this,
// disabled:true,
// handler : this.onDeleteRolClick
// } ]
// }],
																	columns : [
																			{
																				text : 'ID',
																				width : 50,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'id'
																			},
																			{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																			
																				column:"modulo",
																			
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_modulo',
																				itemId: 'chkModulo',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex);
															                        	
															                            console.debug(checked, rowIndex);
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			
																			{
																				header : 'Modulo',
																				width : 120,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				renderer : function(val,meta) {
																					 meta.style = "background-color:#003300;";
													                         		  return '<span style="color:' + '#FFFFFF' + ';"><b>'+val+'</b></span>';
																				},
																				data:"test",
																				dataIndex : 'modulo',																				
																				itemId: 'lbl_modulo',
																				id: 'lbl_modulo',
																			    chkLabel: 'Some content',     
																                
																			},{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func1',
																				itemId: 'chkFunc1',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func1'
																			},{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func2',
																				itemId: 'chkFunc2',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func2'
																			},
																			{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func3',
																				itemId: 'chkFunc3',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func3'
																			},{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func4',
																				itemId: 'chkFunc4',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func4'
																			},{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func5',
																				itemId: 'chkFunc5',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func5'
																			},{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func6',
																				itemId: 'chkFunc6',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func6'
																			},{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func7',
																				itemId: 'chkFunc7',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func7'
																			},{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func8',
																				itemId: 'chkFunc8',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func8'
																			},{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func9',
																				itemId: 'chkFunc9',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func9'
																			},{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func10',
																				itemId: 'chkFunc10',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func10'
																			},{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func11',
																				itemId: 'chkFunc11',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func11'
																			},{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func12',
																				itemId: 'chkFunc12',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func12'
																			},{																				
																				width : 20,
																				sortable : true,
																				resizable : false,
																				draggable : false,																				
																				hideable : false,																				
																				menuDisabled : true,
																				xtype: 'CustomCheckbox',
																				dataIndex : 'per_func13',
																				itemId: 'chkFunc13',
																				cls:'RemoveLine',
																				listeners: {
															                        beforecheckchange: function(checkcolumn, rowIndex, checked, eOpts) {
//															                            var row = this.getView().getRow(rowIndex),
//															                                record = this.getView().getRecord(row);
//															                            return false;
															                        }
															                    },
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func13'
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func14'
																			},
																			{
// header : 'Funcionalidad',
																				width : 125,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'func15'
																			}]																	
																});
												this.callParent();
												this.getSelectionModel().on(
														'selectionchange',
														this.onSelectChange,
														this);
												 this.getView().on('expandbody', this.onExpandNestedGrid, this);
									             this.getView().on('collapsebody', this.onCollapseNestedGrid, this);
											},
											onSelectChange : function(selModel,
													selections) {
// this.down('#modifPermisos').setDisabled(selections.length === 0);
//												this.down('#editRol').setDisabled(selections.length === 0);
												

											},
											onSync : function() {
												this.store.sync();
											},

										
											onEditRolClick : function() {
												var selection = this.getView().getSelectionModel().getSelection()[0];
								                if (selection) {
								                	 solicitud = new MyDesktop.ModificaRoles();
								                	 var window = solicitud.createWindow(app, selection);
								                	 window.show();                	 
								                }
												
											}
																				
										});
						/**
						 * 
						 */
						
				
						
						
						
						// TERMINAN LOS PERMISOS
						// COMIENZA EL TEMA DE LAS Empresas:
						Ext.define('Writer.GridEmpresas',{
											extend : 'Ext.grid.Panel',
											alias : 'widget.gridEmpresas',
											 plugins: [{
									                ptype: 'rowexpander',
									                rowBodyTpl : new Ext.XTemplate(
									                		"<div id='myrow-{id}' ></div>",

									                		)
									                
									            }],
									            onCollapseNestedGrid: function (rowNode, record, expandRow) {
									            	console.debug("listo ya quedo",record.get('id'));
									                var row = "myrow-" + record.get('id');
									            	Ext.fly(row).update('');

									            },
									            onExpandNestedGrid: function (rowNode, record, expandRow) {
									            	console.debug("listo ya quedo",record.get('id'));
									            	var idEmpresa = record.get('id');
									            	 
		            	 						    var dynamicStore = Ext.create('Ext.data.Store',
		            								{
		    											model : 'Writer.Sucursales',
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
		    													read : 'php/catalogos.php/restaurantes/view/'+idEmpresa,
		    													destroy : 'php/catalogos.php/restaurantes/delete'
		    													
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

		    										});// the new store for the
														// nested grid.
		            	 
		            	 						    // Use Id to give each grid
													// a unique identifier. The
													// Id is used in the row
													// expander tpl.
		            	 						    // and in the
													// grid.render("ID") method.
		            	 						    var row = "myrow-" + idEmpresa;
		            	 						    var id2 = "mygrid-" + idEmpresa;  
		            	 
		            	 						   // Create the nested grid.
		            	 						   var gridX = new Ext.grid.GridPanel({
		            	 						        store: dynamicStore,
		            	 						       viewConfig : {
															stripeRows : true,
															enableTextSelection : true
														},
														stateful : true,

														multiSelect : true,
														stateId : 'stateGrid',
														
		            	 						        columns: [
		            	 						        	{
																text : 'ID',
																width : 50,
																sortable : true,
																resizable : false,
																draggable : false,
																hideable : false,
																menuDisabled : true,
																dataIndex : 'id'
															},														
															{
																header : 'Nombre Restaurant',
																width : 250,
																dataIndex : 'nombre_restaurante'
															} , {
																header : 'Estado',
																width : 170,
																dataIndex : 'estado'

															} , {
																header : 'Municipio',
																width : 170,
																dataIndex : 'municipio'

															} , {
																header : 'Colonia',
																width : 170,
																dataIndex : 'colonia'

															} ,
															{
												                menuDisabled: true,
												                sortable: false,
												                header : 'Acciones',
												                xtype: 'actioncolumn',
												                width: 100,
												                items: [{
												                    iconCls: 'remove',
												                    tooltip: 'Eliminar Restaurante',
												                    handler: function(grid, rowIndex, colIndex) {
												                        var rec = grid.getStore().getAt(rowIndex);
												                        Ext.Msg.confirm(
																				'Advertencia',
																				'<center>&iquest;Seguro de eliminar el registro de <br /><b>'
																						+ rec.data.nombre_restaurante
																					    + '</b> ?</center>',
																				function(btn) {
																					if (btn == 'yes') {
																						if (rec) {
																							dynamicStore.remove(rec);
																						}

																					} else {

																					}

																				});
												                       // Ext.Msg.alert('Contacto',
																		// 'Contacto
																		// ' +
																		// rec);
												                    }
												                }]
												            }
		            	 						        ],
		            	 						        height: 120,
		            	 						        id: id2                  
		            	 						    });        
		            	 						   
		            	 						    // Render the grid to the
													// row expander
													// template(tpl).
		            	 						    gridX.render(row);
		            	 						    // gridX.getEl().swallowEvent([
													// 'mouseover', 'mousedown',
													// 'click', 'dblclick' ]);
									            	
									            	
									            	
									            },
											requires : [
											'Ext.form.field.Text',
													'Ext.toolbar.TextItem' ],
											initComponent : function() {
												Ext.apply(
																this,
																{
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
																		items : [
																				{
																					iconCls : 'add',
																					text : 'Agregar Empresa',
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func4 == "1"),
																					itemId : 'newEmp',
																					scope : this,																					
																					handler : this.onNewEmpClick
																				},
																				{
																					iconCls : 'add',
																					text : 'Asociar Sucursal',
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func5 == "1"),
																					itemId : 'asociaSuc',
																					disabled:true,
																					scope : this,																					
																					handler : this.onAsociaSucClick
																				},
																				{
																					iconCls : 'edit',
																					text : 'Modificar Empresa',
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func5 == "1"),
																					itemId : 'editEmp',
																					scope : this,
																					
																					handler : this.onEditEmpClick
																				},
																				{
																					iconCls : 'remove',
																					text : 'Eliminar Empresa',
																					disabled: perm!=null && !perm.some(item => item.id_permiso == '1' && item.per_func6 == "1"),
																					itemId : 'deleteEmp',
																					scope : this,																					
																					handler : this.onDeleteEmpClick
																				} ]
																	}],
																	columns : [
																			{
																				text : 'ID',
																				width : 50,
																				sortable : true,
																				resizable : false,
																				draggable : false,
																				hideable : false,
																				menuDisabled : true,
																				dataIndex : 'id'
																			},
																			{
																				header : 'Nombre Empresa',
																				width : 300,
																				dataIndex : 'nombre_empresa'
																			} , {
																				header : 'Estado',
																				width : 170,
																				dataIndex : 'estado'

																			} , {
																				header : 'Municipio',
																				width : 170,
																				dataIndex : 'municipio'

																			} , {
																				header : 'Colonia',
																				width : 170,
																				dataIndex : 'colonia'

																			} , {
																				header : 'Telefono',
																				width : 170,

																				dataIndex : 'telefono'

																			} ]																	
																});
												this.callParent();
												this.getSelectionModel().on(
														'selectionchange',
														this.onSelectChange,
														this);
												 this.getView().on('expandbody', this.onExpandNestedGrid, this);
									             this.getView().on('collapsebody', this.onCollapseNestedGrid, this);
											},
											onSelectChange : function(selModel,
													selections) {
												
// this.down('#deleteEmp').setDisabled(selections.length === 0);
// this.down('#editEmp').setDisabled(selections.length === 0);
												this.down('#asociaSuc').setDisabled(selections.length === 0);
												

											},
											onSync : function() {
												this.store.sync();
											},

											onDeleteEmpClick : function() {
												var selection = this.getView()
														.getSelectionModel()
														.getSelection()[0];
												Ext.Msg.confirm(
																'Advertencia',
																'<center>&iquest;Seguro de eliminar el registro de <br /><b>'
																		+ selection.data.nombre_empresa
																	    + '</b> ?</center>',
																function(btn) {
																	if (btn == 'yes') {
																		if (selection) {
																			storeEmpresas.remove(selection);
																		}

																	} else {

																	}

																});

											},
											onNewEmpClick : function() {
												// var selection =
												// this.getView().getSelectionModel().getSelection()[0];
												// if (selection) {
												modCotizacion = new MyDesktop.CreaEmpresas();

												var window = modCotizacion
														.createWindow(app, 1);
												window.show();
												// window.maximize();
												// }
											},
											onEditEmpClick : function() {
												var selection = this.getView().getSelectionModel().getSelection()[0];
								                if (selection) {
								                	 solicitud = new MyDesktop.ModificaEmpresas();
								                	 var window = solicitud.createWindow(app, selection);
								                	 window.show();                	 
								                }
												
											},
											onAsociaSucClick : function() {
												var selection = this.getView().getSelectionModel().getSelection()[0];
								                if (selection) {
								                	 solicitud = new MyDesktop.AsociaSucursalesAEmpresas();
								                	 var window = solicitud.createWindow(app, selection);
								                	 window.show();                	 
								                }												
											}
																				
										});
						/**
						 * 
						 */
						Ext.define('Writer.Empresas', {
							extend : 'Ext.data.Model',
							fields : [ {
								name : 'id',
								type : 'int',
								useNull : true
							}, 'nombre_empresa' ,'direccion', 'telefono', 'estado','municipio','colonia','idestado', 'idmunicipio','idcolonia','nombreCalle','numExt','numInt','cp','ciudad'
							]
												
						});
						
						
						var storeEmpresas = Ext.create('Ext.data.Store',
										{
											model : 'Writer.Empresas',
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
													read : 'php/catalogos.php/empresas/view',
													destroy : 'php/catalogos.php/empresas/destroy'
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
						
						// TERMINAN LAS Empresas
						if(!win){
				            win = desktop.createWindow({
				                id: 'administra-usuarios',
				                title:'Administraci&oacute;n de los Catalogos',
				                width:1100,
				                height:500,
				                iconCls: 'operaciones',
				                animCollapse:false,
				                constrainHeader:true,
				                layout: 'fit',
				                layout: {
				                    type: 'vbox',
				                    align: 'stretch'
				                },
				                items: [
				                        {
				                            xtype: 'tabpanel',
				                            activeTab:0,
				                            bodyStyle: 'padding: 5px;',
				                            items: [{
				                                title: 'Usuarios',
				                                header:false,                               
				                                border:false,
				                                items: [
				                    	                {
				                    	                    itemId: 'gridUsuarios',
				                    	                    id: 'gridUsuarios',
				                    	                    xtype: 'gridUsuarios',
				                    	                    store: storeUsuarios
				                    	                }]
				                            },{
				                                title: 'Empresas',
				                                header:false,                               
				                                border:false,
				                                items: [
				                    	                {
				                    	                    itemId: 'gridEmpresas',
				                    	                    id: 'gridEmpresas',
				                    	                    xtype: 'gridEmpresas',
				                    	                    store: storeEmpresas
				                    	                }]
				                            },{
				                                title: 'Sucursales',
				                                header:false,                               
				                                border:false,
				                                items: [
				                    	                {
				                    	                    itemId: 'gridSucursales',
				                    	                    id: 'gridSucursales',
				                    	                    xtype: 'gridSucursales',
				                    	                    store: storeSucursales
				                    	                }]
				                            },{
				                                title: 'Roles',
				                                header:false,                               
				                                border:false,
				                                items: [
				                    	                {
				                    	                    itemId: 'gridRoles',
				                    	                    id: 'gridRoles',
				                    	                    xtype: 'gridRoles',
				                    	                    store: storeRoles
				                    	                },{
				                    	                    itemId: 'gridPermisos',
				                    	                    id: 'gridPermisos',
				                    	                    xtype: 'gridPermisos',
				                    	                    store: storePermisos
				                    	                }]
				                            }]
				                        }
				                    ]
				                
				                
				            });
				        }
						
						Ext.resumeLayouts(true);
						return win;

					}

				});
