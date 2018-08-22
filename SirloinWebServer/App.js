/*!
f * Ext JS Library 4.0
 * Copyright(c) 2006-2011 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */
Ext.define('Ext.form.field.Month', {
            extend: 'Ext.form.field.Date',
            alias: 'widget.monthfield',
            requires: ['Ext.picker.Month'],
            alternateClassName: ['Ext.form.MonthField', 'Ext.form.Month'],
            selectMonth: null,
            createPicker: function () {
                var me = this,
                    format = Ext.String.format;
                return Ext.create('Ext.picker.Month', {
                    pickerField: me,
                    ownerCt: me.ownerCt,
                    renderTo: document.body,
                    floating: true,
                    hidden: true,
                    
                	height :200, 
                    focusOnShow: true,
                    minDate: me.minValue,
                    maxDate: me.maxValue,
                    disabledDatesRE: me.disabledDatesRE,
                    disabledDatesText: me.disabledDatesText,
                    disabledDays: me.disabledDays,
                    disabledDaysText: me.disabledDaysText,
                    format: me.format,
                    showToday: me.showToday,
                    startDay: me.startDay,
                    minText: format(me.minText, me.formatDate(me.minValue)),
                    maxText: format(me.maxText, me.formatDate(me.maxValue)),
                    listeners: {
                        select: { scope: me, fn: me.onSelect },
                        monthdblclick: { scope: me, fn: me.onOKClick },
                        yeardblclick: { scope: me, fn: me.onOKClick },
                        OkClick: { scope: me, fn: me.onOKClick },
                        CancelClick: { scope: me, fn: me.onCancelClick }
                    },
                    keyNavConfig: {
                        esc: function () {
                            me.collapse();
                        }
                    }
                });
            },
            onCancelClick: function () {
                var me = this;
                me.selectMonth = null;
                me.collapse();
            },
            onOKClick: function () {
                var me = this;
                if (me.selectMonth) {
                    me.setValue(me.selectMonth);
                    me.fireEvent('select', me, me.selectMonth);
                }
                me.collapse();
            },
            onSelect: function (m, d) {
                var me = this;
                me.selectMonth = new Date((d[0] + 1) + '/1/' + d[1]);
            }
        });
//GUARDAMOS EN UN OBJETO LOS PERMISOS GUARDADOS EN EL sessionStorage:
var perm= JSON.parse(sessionStorage.permisos);

Ext.define('MyDesktop.App', {
    extend: 'Ext.ux.desktop.App',

    requires: [
        'Ext.window.MessageBox',        
        'Ext.ux.desktop.ShortcutModel',        
        'MyDesktop.AdministracionVIP',
        'MyDesktop.AdministracionVIP2',
        'MyDesktop.EnviaPromociones',
        'MyDesktop.CreaUsuarios',
        'MyDesktop.ModificaUsuarios',
        'MyDesktop.CreaPromociones',
        'MyDesktop.CreaBoletines',
        'MyDesktop.ModificaBoletines',
        'MyDesktop.PanelMercadotecnia',
        'MyDesktop.CreaSucursales',
        'MyDesktop.ModificaSucursales',
        'MyDesktop.CreaEmpresas',
        'MyDesktop.ModificaEmpresas',
        'MyDesktop.CreaRoles',
        'MyDesktop.ModificaRoles',
        'MyDesktop.AsociaSucursalesAEmpresas',
        'MyDesktop.AdministraUsuarios',
        'MyDesktop.ModificarSaldo',
        'MyDesktop.VisualizaStatusSincronizaciones' 

        
    ],

    init: function() {
        // custom logic before getXYZ methods get called...
    	
        this.callParent();
        this.cargaCombosAplicacion();
        if(sessionStorage.tipoUser=="3")
    	{
        	
      	  	//DESDE AQUI OCULTAMOS LOS MENUS A LOS QUE NO DEBE TENER ACCESO, DEBE ESTAR EN ORDEN DESCENDENTE:
      	  	if(!perm.some(item => item.id_permiso == '2' && item.per_modulo == "1"))
    		{
      		  // Mercadotecnia
      	  		this.getDesktop().shortcuts.remove( this.getDesktop().shortcuts.getAt(3));
      	  		this.getDesktop().taskbar.startMenu.menu.remove("launcher-panel-mercadotecnia");
    		}
      	  	if(!perm.some(item => item.id_permiso == '1' && item.per_modulo == "1"))
      	  	{ // Perfiles
    	  		this.getDesktop().shortcuts.remove( this.getDesktop().shortcuts.getAt(2)); 
    	  		this.getDesktop().taskbar.startMenu.menu.remove("launcher-administra-usuarios");
      	  	}
      	  	if(!perm.some(item => item.id_permiso == '3' && item.per_modulo == "1"))
    		{
      	  		// Reportes
      	  		this.getDesktop().shortcuts.remove( this.getDesktop().shortcuts.getAt(1));
      	  		this.getDesktop().taskbar.startMenu.menu.remove("launcher-panel-administracion");
    		}
    	}
        
        // now ready...
    },
    
      storeRestaurantes : null,
      storeTiposUsuario : null,
      storeUbicaciones : null,
      storeRoles : null,
      storeBoletines : null,
      storeEstados : null,
      storeColonias : null,
      storeCP: null,
      storeMunicipios : null,
      storeCiudades: null,
      storeBoletines2 : null,
// storePrivadas : null,
// storeMeses : null,
// storeTipoSeccion : null,
// storeTipoPago : null,
// storeTipoClasificado : null,
// storeTipoResidentes : null,
// storeStatusPago : null,
// storeColores : null,
// storeConceptosContables : null,
//    
      deepCloneStore: function (source) {
          var target = Ext.create ('Ext.data.Store', {
              model: source.model,
              proxy: source.proxy
          });

          Ext.each (source.getRange (), function (record) {
              var newRecordData = Ext.clone (record.copy().data);
              var model = new source.model (newRecordData, newRecordData.id);

              target.add (model);
          });

          return target;
      },
    cargaCombosAplicacion: function()
    {
    	
    	Ext.define('ModelRestaurantes', {
            extend: 'Ext.data.Model',
            fields: [
                {name:'id_restaurante', type:'int'},              
                {name:'nombre_restaurante', type:'string'}
            ]
        });
    	Ext.define('ModelBoletines', {
            extend: 'Ext.data.Model',
            fields: [
                {name:'id', type:'int'},              
                {name:'asunto', type:'string'},
                {name:'cuerpo', type:'string'}
            ]
        });
    	Ext.define('ModelTiposUsuario', {
            extend: 'Ext.data.Model',
            fields: [
                {name:'id', type:'int'},              
                {name:'descripcion', type:'string'}
            ]
        });
    	Ext.define('ModelRoles', {
            extend: 'Ext.data.Model',
            fields: [
                {name:'id_rol', type:'int'},              
                {name:'nombre_rol', type:'string'}
            ]
        });
    	
    	
        this.storeRestaurantes = Ext.create('Ext.data.Store', {
        	model: 'ModelRestaurantes',    
	        proxy: {	            
	            type: 'ajax',
	            url: 'php/cargaCombos.php',		            
	            reader: {
	                root: 'datos'
	            }
	        }
        });
        if(sessionStorage.tipoUser=="3")
    	{
        	this.storeRestaurantes.load({
                params: {
                	tabla: 'cat_restaurantes',
                	opcion1: 'id_restaurante:0-nombre_restaurante:Todos los restaurantes',
                	filtros: 'WHERE id_restaurante IN ('+sessionStorage.restaurantes+')'
                }
            });
    	}
        else
    	{
        	this.storeRestaurantes.load({
                params: {
                	opcion1: 'id_restaurante:0-nombre_restaurante:Todos los restaurantes',
                	tabla: 'cat_restaurantes'
                	
                }
            });
    	}
                
        
        
        this.storeUbicaciones = Ext.create('Ext.data.Store', {
        	model: 'ModelTiposUsuario',    
	        proxy: {	            
	            type: 'ajax',
	            url: 'php/cargaCombos.php',		            
	            reader: {
	                root: 'datos'
	            }
	        }
        });
        
        this.storeUbicaciones.load({
            params: {
            	tabla: 'cat_ubicaciones',
            	
            }
        });
        this.storeTiposUsuario = Ext.create('Ext.data.Store', {
        	model: 'ModelTiposUsuario',    
	        proxy: {	            
	            type: 'ajax',
	            url: 'php/cargaCombos.php',		            
	            reader: {
	                root: 'datos'
	            }
	        }
        });
        
        this.storeTiposUsuario.load({
            params: {
            	tabla: 'cat_tipos_usuario',
            	filtros: 'WHERE id IN (1,3)'
            }
        });      
        this.storeRoles = Ext.create('Ext.data.Store', {
        	model: 'ModelRoles',    
	        proxy: {	            
	            type: 'ajax',
	            url: 'php/cargaCombos.php',		            
	            reader: {
	                root: 'datos'
	            }
	        }
        });
        
        this.storeRoles.load({
            params: {
            	tabla: 'cat_roles',
            	filtros: 'WHERE status=1'
            }
        });      
        
        this.storeBoletines = Ext.create('Ext.data.Store', {
        	model: 'ModelBoletines',    
	        proxy: {	            
	            type: 'ajax',
	            url: 'php/cargaCombos.php',		            
	            reader: {
	                root: 'datos'
	            }
	        }
        });
        this.storeBoletines2 = Ext.create('Ext.data.Store', {
        	model: 'ModelBoletines',    
	        proxy: {	            
	            type: 'ajax',
	            url: 'php/cargaCombos.php',		            
	            reader: {
	                root: 'datos'
	            }
	        }
        });
        
        this.storeBoletines.load({
            params: {
            	tabla: 'boletines'
            }
        });
        Ext.define('ModelEstados', {
            extend: 'Ext.data.Model',
            fields: [
                {name:'id_estado', type:'int'},
                {name:'estado', type:'string'}
            ]
        });
        this.storeEstados = Ext.create('Ext.data.Store', {
        	model: 'ModelEstados',    
	        proxy: {	            
	            type: 'ajax',
	            url: 'php/cargaCombos.php',		            
	            reader: {
	                root: 'datos'
	            }
	        }
        });
        this.storeEstados.load({
            params: {
            	tabla: 'estados'
            }
        });
    	Ext.define('ModelMunicipios', {
			extend : 'Ext.data.Model',
			fields : [ {
				name : 'id_municipio',
				type : 'int'
			}, {
				name : 'municipio',
				type : 'string'
			} ]
		});
        this.storeMunicipios = Ext.create('Ext.data.Store', {
			model : 'ModelMunicipios',
			proxy : {
				type : 'ajax',
				url : 'php/cargaCombos.php',
				reader : {
					root : 'datos'
				}
			}
		});
		Ext.define('ModelColonias', {
			extend : 'Ext.data.Model',
			fields : [ {
				name : 'id_colonia',
				type : 'int'
			}, {
				name : 'colonia',
				type : 'string'
			} ]
		});
		this.storeColonias = Ext.create('Ext.data.Store', {
			model : 'ModelColonias',
			proxy : {
				type : 'ajax',
				url : 'php/cargaCombos.php',
				reader : {
					root : 'datos'
				}
			}
		});
		Ext.define('ModelCP', {
			extend : 'Ext.data.Model',
			fields : [ {
				name : 'id_cp',
				type : 'int'
			}, {
				name : 'cp',
				type : 'string'
			} ]
		});
		this.storeCP = Ext.create('Ext.data.Store', {
			model : 'ModelCP',
			proxy : {
				type : 'ajax',
				url : 'php/cargaCombos.php',
				reader : {
					root : 'datos'
				}
			}
		});
		Ext.define('ModelCiudades', {
			extend : 'Ext.data.Model',
			fields : [ {
				name : 'id_ciudad',
				type : 'int'
			}, {
				name : 'ciudad',
				type : 'string'
			} ]
		});
		this.storeCiudades = Ext.create('Ext.data.Store', {
			model : 'ModelCiudades',
			proxy : {
				type : 'ajax',
				url : 'php/cargaCombos.php',
				reader : {
					root : 'datos'
				}
			}
		});
         
    	 
    	 
    },
    getModules : function(){
    	 this.callParent();
    	  
    	  
    	  
        return [
        
// new MyDesktop.SystemStatus(),
            
// new MyDesktop.ModuloPagos(),
// new MyDesktop.RegistroIngresosEgresos(),
// new MyDesktop.AdministraPagina(),
            new MyDesktop.AdministracionVIP(),
            new MyDesktop.VisualizaStatusSincronizaciones(),
            new MyDesktop.AdministraUsuarios(),
            new MyDesktop.PanelMercadotecnia()
          
        ];
    },

    getDesktopConfig: function () {
        var me = this, ret = me.callParent();

        return Ext.apply(ret, {
            // cls: 'ux-desktop-black',

            contextMenuItems: [
                { }
            ],
            id:'escritorio',
            shortcuts: Ext.create('Ext.data.Store', {
                model: 'Ext.ux.desktop.ShortcutModel',
                data: [
                       { name: 'Status Sincronizacion', iconCls: 'sales_report_48', module: 'visualiza-status-sincronizaciones',id:'icon-visualiza-status-sincronizaciones' } ,           
// { name: 'Modulo de Pagos', iconCls: 'us_dollar_48', module:
// 'modulo-pagos',id:'icon-modulo-pagos' }, //OPCION 1
// { name: 'Registro de Ingresos y Egresos', iconCls: 'dollars_48', module:
// 'registro-ingresos-egresos',id:'icon-registro-ingresos-egresos' } , //OPCION
// 2
// { name: 'Administraci&oacute;n de la P&aacute;gina', iconCls:
// 'web_management_48', module: 'administra-pagina',id:'icon-administra-pagina'
// } , //OPCION 3
                         { name: 'Reportes VIP', iconCls: 'address_card_48', module: 'panel-administracion',id:'icon-panel-administracion' } ,  // OPCION
																																				// 4
                         { name: 'Perfiles', iconCls: 'accordion-shortcut', module: 'administra-usuarios',id:'icon-administra-usuarios' } ,  // OPCION
																																				// 4
                         { name: 'Mercadotecnia', iconCls: 'mercadotecnia', module: 'panel-mercadotecnia',id:'icon-panel-mercadotecnia' } ,  // OPCION
																																				// 4
// { name: 'Bitacora del sistema', iconCls: 'history_48', module:
// 'visualiza-bitacora',id:'icon-visualiza-bitacora' } //OPCION 5
                    
                ]
            }),

            wallpaper: 'wallpapers/blue.jpg',
            wallpaperStretch: false
        });
    },

    // config for the start menu
    getStartConfig : function() {
        var me = this, ret = me.callParent();
       

        
        return Ext.apply(ret, {
            title: 'Bienvenido ',
            iconCls: 'user',
            id: 'menuInicio',
            height: 300,
            toolConfig: {
                width: 100,
                items: [
                   // {
                   // text:'Settings',
                   // iconCls:'settings',
                   // handler: me.onSettings,
                   // scope: me
                   // },
// '-',
                    {
                        text:'Cerrar sesión',
                        iconCls:'logout',
                        handler: me.onLogout,
                        scope: me
                    }
                ]
            }
        });
    },
    
    getTaskbarConfig: function () {
        var ret = this.callParent();

        return Ext.apply(ret, {
            quickStart: [
              // { name: 'Accordion Window', iconCls: 'accordion', module:
				// 'acc-win' },
              // { name: 'Grid Window', iconCls: 'icon-grid', module:
				// 'grid-win' }
            ],
            trayItems: [
                { xtype: 'trayclock', flex: 1 }
            ]
        });
    },

    onLogout: function () {
        
        Ext.Msg.confirm(
                'Confirmación de cerrado',
                '&iquest;Est&aacute;s seguro que deseas abandonar la aplicaci&oacute;n?',
                function(btn) {
                    if (btn == 'yes')
                        location.href="finsesion.php";
                });
    },

    onSettings: function () {
        var dlg = new MyDesktop.Settings({
            desktop: this.desktop
        });
        dlg.show();
    }
});
