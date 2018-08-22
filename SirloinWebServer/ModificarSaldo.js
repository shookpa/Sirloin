Ext.Loader.setPath('Ext.ux', 'extjs/examples/ux');
Ext.define('MyDesktop.ModificarSaldo', {
    extend: 'Ext.ux.desktop.Module',
    requires: [
        'Ext.tab.Panel',
        'Ext.chart.*',
        'Ext.layout.container.Fit',
        'Ext.fx.target.Sprite'
        
    ],
    id:'modificar-saldo',
    init : function(){
        this.launcher = {
            text: 'Modificar Saldo',
            id: 'launcher-modificar-saldo',
            iconCls:'tabs'
        }
        
    },
    createWindow : function(aplicacion, seleccion ){
// Ext.suspendLayouts();
// var desktop =this.app.getDesktop();
//    	console.debug("Ya entro donde queria createWindow");
    	var desktop =aplicacion.getDesktop();
        var win = desktop.getWindow('modificar-saldo');
        Ext.apply(Ext.form.VTypes, {
            fileUpload: function(val, field) {                              
                                var fileName = /^.*\.(gif|png|bmp|jpg|jpeg)$/i;
                                return fileName.test(val);
                          },                 
            fileUploadText: 'La foto debe ser con alguna de las siguientes extensiones: .gif,.png,.bmp,.jpg,.jpeg '
        });
        var panelSaldo = Ext.create('Ext.form.Panel', {
			title: '<center>Saldo del Cliente</center>',
			bodyStyle:'padding:5px',
			id:'panelSaldo',
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
		        	 	fieldLabel: 'Cliente',
		        	 	queryMode: 'local',
		        	 	xtype: 'textfield',	  
		        	 	allowBlank: false,
		        	 	readOnly:true,
		        	 	name: 'cliente',
		        	 	value: seleccion.nom_vip,
			            typeAhead: true,
			            tabIndex: 15,
			            anchor:'100%',
			            matchFieldWidth: false
		        	},
		        	{
		        	 	fieldLabel: 'Tarjeta',
		        	 	queryMode: 'local',
		        	 	xtype: 'textfield',	  
		        	 	allowBlank: false,
		        	 	readOnly:true,
		        	 	name: 'tarjeta',
		        	 	value: seleccion.num_vip,
			            typeAhead: true,
			            tabIndex: 17,
			            anchor:'100%',
			            matchFieldWidth: false
		        	},
			        {
		        	 	fieldLabel: 'Saldo de puntos',		            
		        		xtype: 'textfield',	   
		        	 	queryMode: 'local',
		        	 	allowBlank: false,
		        		value: seleccion.mon_vip,
		        		maskRe: /[0-9.]/,
		        	 	name: 'saldo',
			            typeAhead: true,
			            tabIndex: 19,
			            anchor:'100%',
			            matchFieldWidth: false
		        }],
			        buttons: [{
					    text: 'Guardar',
					    tabIndex: 21,
					    handler: function(btn) {
					    	formulario = this.up('form').getForm();
					    	
					    	panelForm = this.up('form');
					    	var datosFormulario = [{

		                    	 "pto_vip" :   				panelForm.items.get(0).items.get(0).items.get(2).getValue(),
		                    	 "id" :  				seleccion.id,
		                    	 "id_restaurante" :  				seleccion.id_restaurante,
		                    	 "num_vip" :  				seleccion.num_vip
		                    	 
		                    	
		                    	 
					    	}];
					    	if( formulario.isValid())
					    	{
					    		formulario.submit({
			                          waitMsg: 'Grabando en Base de Datos...',
			                          submitEmptyText: false, 
			                          params:{store_data: Ext.encode(datosFormulario)},
			                          url: 'php/saveFormModifyBalance.php',
			                          success: function(form, action){
//			                        	  var data = Ext.decode(action.response.responseText);
			                        	  Ext.getCmp('gridMovimientos').store.load();
			                        	  win.destroy();
			                        	 
			                          },
			                         failure: function(form, action){                           
			                             //
//			                        	 console.debug('entro al failure, form', form, ', action', action);
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
                id: 'modificar-saldo',
                title:'Modificar Saldo',
                width:550,
                height:300,
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
                        '&iquest;Est&aacute;s seguro que deseas cerrar la ventana de Modificar Saldo?',
                        function(btn) {
                            if (btn == 'yes')
                                me.destroy();
                        });
                },
                layout: 'fit',
                defaultType: 'container',
                items: panelSaldo
            }).show();    
            
            
        }
        return win;
    }
});