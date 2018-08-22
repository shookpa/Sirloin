Ext.Loader.setPath('Ext.ux', 'extjs/examples/ux');
Ext.define('MyDesktop.CreaBoletines', {
    extend: 'Ext.ux.desktop.Module',
    requires: [
        'Ext.tab.Panel',
        'Ext.chart.*',
        'Ext.layout.container.Fit',
        'Ext.fx.target.Sprite'
        
    ],
    id:'crea-boletines',
    init : function(){
        this.launcher = {
            text: 'Crea Boletines',
            id: 'launcher-crea-boletines',
            iconCls:'tabs'
        }
        
    },
    createWindow : function(aplicacion ){
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
        var panelCreaBoletines = Ext.create('Ext.form.Panel', {
			title: '<center>Datos del boletín</center>',
			bodyStyle:'padding:5px',
			id:'panelCreaBoletines',
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
					    text: 'Salvar Boletin',
					    tabIndex: 21,
					    handler: function(btn) {
					    	formulario = this.up('form').getForm();
					    	
					    	panelForm = this.up('form');
					    	var datosFormulario = [{

		                    	 "asunto" :   				panelForm.items.get(0).items.get(0).items.get(0).getValue(),		                    	 
		                    	 "cuerpo" :    				panelForm.items.get(0).items.get(0).items.get(1).getValue() 
		                    	  			                    	 
		                    	
		                    	 
					    	}];
					    	if( formulario.isValid())
					    	{
					    		formulario.submit({
			                          waitMsg: 'Salvando boletin...',
			                          submitEmptyText: false, 
			                          params:{store_data: Ext.encode(datosFormulario)},
			                          url: 'php/saveFormCreateBulletin.php',
			                          success: function(form, action){
			                        	  var data = Ext.decode(action.response.responseText);

			                        	  Ext.Msg.show({
												title : 'Boletin Almacenado',
												msg : data.mensaje,
												buttons : Ext.Msg.OK,
												icon : Ext.Msg.INFO
											});
											win.destroy();
											// PARA QUE CARGUE NUEVAMENTE EL GRID
											// DESPUES DE GUARDAR
											try {
												Ext.getCmp('gridBoletines').store.load();
											} catch (exp) {}
			                        	 
			                          },
			                         failure: function(form, action){                           
			                             //
			                        	 Ext.Msg.alert('Error', "Ya existe un boletin con el asunto: <b>"+panelForm.items.get(0).items.get(0).items.get(0).getValue()+"</b>, favor de verificar.");
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
                id: 'crea-boletines',
                title:'Crea Boletines',
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
                        '&iquest;Est&aacute;s seguro que deseas cerrar la ventana de Crea Boletines?',
                        function(btn) {
                            if (btn == 'yes')
                                me.destroy();
                        });
                },
                layout: 'fit',
                defaultType: 'container',
                items: panelCreaBoletines
            }).show();    
            
            
        }
        return win;
    }
});