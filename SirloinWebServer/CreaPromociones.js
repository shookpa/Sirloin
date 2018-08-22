Ext.Loader.setPath('Ext.ux', 'extjs/examples/ux');
Ext.define('MyDesktop.CreaPromociones', {
	extend : 'Ext.ux.desktop.Module',
	requires : [ 'Ext.tab.Panel', 'Ext.chart.*', 'Ext.layout.container.Fit', 'Ext.fx.target.Sprite' ],
	id : 'crear-promociones',
	init : function() {
		this.launcher = {
			text : 'Crear Promociones',
			id : 'launcher-crear-promociones',
			iconCls : 'tabs'
		}
	},
	createWindow : function(aplicacion) {
		// Ext.suspendLayouts();
		// var desktop =this.app.getDesktop();
		// console.debug("Ya entro donde queria createWindow");
		var desktop = aplicacion.getDesktop();
		var win = desktop.getWindow('crear-promociones');
		Ext.apply(Ext.form.VTypes, {
			fileUpload : function(val, field) {
				var fileName = /^.*\.(gif|png|bmp|jpg|jpeg)$/i;
				return fileName.test(val);
			},
			fileUploadText : 'La foto debe ser con alguna de las siguientes extensiones: .gif,.png,.bmp,.jpg,.jpeg '
		});
		var panelPromociones = Ext.create('Ext.form.Panel', {
			title : '<center>Datos de la Noticia</center>',
			bodyStyle : 'padding:5px',
			id : 'panelPromociones',
			border : false,
			anchor : '100%',
			fieldDefaults : {
				labelAlign : 'top',
				msgTarget : 'side'
			},
			defaults : {
				anchor : '100%'
			},
			items : [ {
				layout : 'column',
				border : false,
				items : [ {
					columnWidth : 1,
					border : false,
					layout : 'anchor',
					defaultType : 'textfield',
					items : [ {
						fieldLabel : 'Inicio vigencia',
						queryMode : 'local',
						xtype : 'datefield',
						format : 'Y-m-d',
						allowBlank : false,
						name : 'inicio_vigencia',
						typeAhead : true,
						tabIndex : 2,
						anchor : '100%',
						matchFieldWidth : false
					},{
						fieldLabel : 'Fecha de expiración',
						queryMode : 'local',
						xtype : 'datefield',
						allowBlank : false,
						format : 'Y-m-d',
						name : 'fecha_expiracion',
						typeAhead : true,
						tabIndex : 4,
						anchor : '100%',
						matchFieldWidth : false
					}, {
						fieldLabel : 'Foto de la promocion',
						xtype : 'filefield',
						queryMode : 'local',
						vtype : 'fileUpload',
						name : 'foto',
						typeAhead : true,
						tabIndex : 6,
						anchor : '100%',
						matchFieldWidth : false
					} ],
					buttons : [ {
						text : 'Guardar',
						tabIndex : 21,
						handler : function(btn) {
							formulario = this.up('form').getForm();
							panelForm = this.up('form');
							var datosFormulario = [ {
								"inicio_vigencia" : panelForm.items.get(0).items.get(0).items.get(0).getRawValue(),
								"fecha_expiracion" : panelForm.items.get(0).items.get(0).items.get(1).getRawValue(),
								"foto" : 			 panelForm.items.get(0).items.get(0).items.get(2).getValue()
							} ];
							if (formulario.isValid()) {
								formulario.submit({
									waitMsg : 'Grabando en Base de Datos...',
									submitEmptyText : false,
									params : {
										store_data : Ext.encode(datosFormulario)
									},
									url : 'php/saveFormCreatePromotions.php',
									success : function(form, action) {
										// var data =
										// Ext.decode(action.response.responseText);
										Ext.getCmp('gridPromociones').store.load();
										win.destroy();
									},
									failure : function(form, action) {
									//
									// console.debug('entro al failure, form',
									// form, ', action', action);
									}
								});
							}
						}
					} ]
				} ]
			} ]
		});
		if (!win) {
			win = desktop.createWindow({
				id : 'crear-promociones',
				title : 'Crear Promociones',
				width : 550,
				height : 300,
				modal : true,
				draggable : true,
				iconCls : 'tabs',
				animCollapse : false,
				border : false,
				constrainHeader : true,
				autoScroll : true,
				onEsc : function() {
					var me = this;
					Ext.Msg.confirm('Confirmación de cerrado', '&iquest;Est&aacute;s seguro que deseas cerrar la ventana de Crear Promociones?', function(btn) {
						if (btn == 'yes')
							me.destroy();
					});
				},
				layout : 'fit',
				defaultType : 'container',
				items : panelPromociones
			}).show();
		}
		return win;
	}
});