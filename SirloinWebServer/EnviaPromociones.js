Ext.Loader.setPath('Ext.ux', 'extjs/examples/ux');
Ext.define('MyDesktop.EnviaPromociones', {
    extend: 'Ext.ux.desktop.Module',
    requires: [
        'Ext.tab.Panel',
        'Ext.chart.*',
        'Ext.layout.container.Fit',
        'Ext.fx.target.Sprite'
        
    ],
    id:'envia-promociones',
    init : function(){
        this.launcher = {
            text: 'Envia Promociones',
            id: 'launcher-envia-promociones',
            iconCls:'tabs'
        }
        
    },
    createWindow : function(aplicacion, seleccion ){
// Ext.suspendLayouts();
// var desktop =this.app.getDesktop();
//    	console.debug("Ya entro donde queria createWindow");
    	var desktop =aplicacion.getDesktop();
    	  aplicacion.storeBoletines.load({
              params: {
              	tabla: 'boletines'
              }
          });
        var win = desktop.getWindow('envia-promociones');
        Ext.apply(Ext.form.VTypes, {
            fileUpload: function(val, field) {                              
                                var fileName = /^.*\.(gif|png|bmp|jpg|jpeg)$/i;
                                return fileName.test(val);
                          },                 
            fileUploadText: 'La foto debe ser con alguna de las siguientes extensiones: .gif,.png,.bmp,.jpg,.jpeg '
        });
        var panelPromociones = Ext.create('Ext.form.Panel', {
			title: '<center>Datos de la promoción</center>',
			bodyStyle:'padding:5px',
			id:'panelPromociones',
			border: false,
			anchor:'100%',			
			fieldDefaults: {
			    labelAlign: 'top',
			    msgTarget: 'side'
			},
			defaults: {
			    anchor: '100%'
			},	
			items: [{
			    layout:'column',
			    border:false,
			    items:[{
			        columnWidth:1,
			        border:false,
			        layout: 'anchor',
			        defaultType: 'textfield',
			        items: [{
			            fieldLabel: 'Boletin Base',
			            xtype : 'combobox',		
			            
			            name: 'boletin',	
			            queryMode: 'local',
			            typeAhead: true,
			            allowBlank: true,			            	
			            tabIndex: 17	,
			            anchor:'100%',
			            emptyText: 'Selecciona...',
			            displayField: 'asunto',
			            valueField: 'id',
			            forceSelection: false,
			            store: aplicacion.storeBoletines,
			            listeners : {
							select : function(combo, record) {
								aplicacion.storeBoletines2.load({
									params : {
										tabla : 'boletines',
										filtros : 'WHERE id=' + record[0].get('id')
									},
									callback : function(records, operation, success) {
										// DESPUES DE QUE ACABE DE CARGAR EL STORE, QUE MUESTRE LOS DATOS DEL BOLETIN
//										panelForm = this.up('form');
										panelPromociones.items.get(0).items.get(0).items.get(1).setValue(aplicacion.storeBoletines2.getAt('0').get('asunto'));
										panelPromociones.items.get(0).items.get(0).items.get(2).setValue(aplicacion.storeBoletines2.getAt('0').get('cuerpo'));
									}
								});								
							}
						}
			        },{
		        	 	fieldLabel: 'Asunto del correo',
		        	 	queryMode: 'local',
		        	 	xtype: 'textfield',	  
		        	 	allowBlank: false,
		        	 	 name: 'asunto',
			            typeAhead: true,
			            tabIndex: 15,
			            anchor:'100%',
			            matchFieldWidth: false
		        	},
			        {
		        	 	fieldLabel: 'Cuerpo del correo',		            
		        	 	xtype: 'htmleditor',	   
		        	 	queryMode: 'local',
		        	 	allowBlank: false,
		        	 	 name: 'cuerpo',
			            typeAhead: true,
			            tabIndex: 19,
			            anchor:'100%',
			            matchFieldWidth: false
		        }],
			        buttons: [{
					    text: 'Enviar Promocion',
					    tabIndex: 21,
					    handler: function(btn) {
					    	formulario = this.up('form').getForm();
					    	
					    	panelForm = this.up('form');
					    	var datosFormulario = [{

		                    	 "asunto" :   				panelForm.items.get(0).items.get(0).items.get(1).getValue(),		                    	 
		                    	 "cuerpo" :    				panelForm.items.get(0).items.get(0).items.get(2).getValue(), 
		                    	 "correos" :  				[{seleccion}] 			                    	 
		                    	
		                    	 
					    	}];
					    	if( formulario.isValid())
					    	{
					    		formulario.submit({
			                          waitMsg: 'Enviando boletin...',
			                          submitEmptyText: false, 
			                          params:{store_data: Ext.encode(datosFormulario)},
			                          url: 'php/saveFormSendPromotions.php',
			                          success: function(form, action){
			                        	  var data = Ext.decode(action.response.responseText);
			                        	  Ext.Msg.alert('Envio Exitoso', data.mensaje);
			                        	  win.destroy();
			                        	 
			                          },
			                         failure: function(form, action){                           
			                             //
			                        	 Ext.Msg.alert('Envio Fallido', "Existe un problema en el servidor de correo, favor de intentar mas tarde");
			                         }
			                    });
					    	}
					    	
					    }
			        }]
			        
			    }]
			}]
	    });
        if(!win){
            win = desktop.createWindow({
                id: 'envia-promociones',
                title:'Envia Promociones',
                width:550,
                height:400,
                modal:true,
                draggable:true,
                iconCls: 'tabs',
                animCollapse:false,
                border:false,
                constrainHeader:true,
                autoScroll:true,	
                onEsc: function() {
                    var me = this;
                    Ext.Msg.confirm(
                        'Confirmación de cerrado',
                        '&iquest;Est&aacute;s seguro que deseas cerrar la ventana de Envia Promociones?',
                        function(btn) {
                            if (btn == 'yes')
                                me.destroy();
                        });
                },
                layout: 'fit',
                defaultType: 'container',
                items: panelPromociones
            }).show();    
            
            
        }
        return win;
    }
});