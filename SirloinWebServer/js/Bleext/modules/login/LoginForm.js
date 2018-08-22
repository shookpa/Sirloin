/**
 * @class Bleext.modules.login.LoginForm
 * @extends Bleext.ui.Form
 * @autor Crysfel Villa
 * @date Sun Jul 10 17:10:52 CDT 2011
 *
 * Description
 *
 **/
Ext.define('ACField', {
    extend: 'Ext.form.field.Text',

    initComponent: function() {
        Ext.each(this.fieldSubTpl, function(oneTpl, idx, allItems) {
            if (Ext.isString(oneTpl)) {
                allItems[idx] = oneTpl.replace('autocomplete="off"', 'autocomplete="on"');
            }
        });
        this.callParent(arguments);
    }
});
Ext.define("Bleext.modules.login.LoginForm",{
	extend 			: "Bleext.abstract.Form",
	alias			: "loginform",
	id:"loginForm",
	forward			: true,

	initComponent	: function() {
		
		this.items = this.createLoginFields();
		this.fbar = this.createButtons();
        
		this.callParent();
	},
	
	createButtons		: function(){
		return [{
			text	: "Login",
			scope	: this,
			handler	: this.login
		}];
	},
	
	createLoginFields	: function(){
		return [{
			xtype	: "fieldcontainer",
			layout	: "hbox",
			defaultType : "textfield",
			width	: 350,
			items	: [
//					new ACField({
//					    xtype: 'textfield',
//					    name		: "username",
//						allowBlank	: false,
//						flex		: 1,
//						margins		: {right:3},
//						labelAlign	: "top",
//						msgTarget	: 'side',
//						fieldLabel	: "Usuario"
//						
//					}), 
//					new ACField({
//						labelAlign	: "top",
//						msgTarget	: 'side',
//						inputType	: 'password',
//						fieldLabel	: 'Password',
//						name		: 'password',	
//							allowBlank	: false,
//							flex		: 1,
//							margins		: {left:3, bottom:10},
//							listeners	: {
//								scope		: this,
//								specialkey	: function(f,e){
//									if (e.getKey() == e.ENTER) {
//										this.login();
//									}
//								}
//							}
//					})	   
			     	   
			     	   {
				labelAlign	: "top",
				msgTarget	: 'side',
				 hasFocus:true,
				value: Ext.util.Cookies.get("usuarioField"),
				fieldLabel	: "Usuario",
				listeners: {
			          afterrender: function(field) {
			        	  Ext.defer(function() {
			        	       field.focus(true, 100);
			        	   }, 1);
			            
			          }
			        },
				name		: "username",
				allowBlank	: false,
				flex		: 1,
				margins		: {right:3}
			},{
				labelAlign	: "top",
				msgTarget	: 'side',
				inputType	: 'password',
				value: Ext.util.Cookies.get("passwordField"),
				fieldLabel	: 'Password',
				listeners:{
			        afterrender:function(){
			        	  this.inputEl.set({
			                    'autocomplete': 'on'
			                });
			        }
			    },
				name		: 'password',
				allowBlank	: false,
				flex		: 1,
				margins		: {left:3, bottom:10},
				listeners	: {
					scope		: this,
					specialkey	: function(f,e){
						if (e.getKey() == e.ENTER) {
							this.login();
						}
					}
				}
			}
		]
		}];
	},
	
	login		: function(){
		if(this.getForm().isValid()){
			var values = this.getForm().getValues();
//			console.debug("la cookie de usuario antes de la asignacion:", Ext.util.Cookies.get("usuarioField"));
//			console.debug(this.items.get(0).items.get(0).getValue());
			var now = new Date();
			var expiry = new Date(now.getTime() + 365 * 24 * 60 * 60 * 1000);
			Ext.util.Cookies.set("usuarioField", this.items.get(0).items.get(0).getValue(), expiry);
			Ext.util.Cookies.set("passwordField", this.items.get(0).items.get(1).getValue(), expiry);
//			console.debug("la cookie de usuario despues de la asignacion:", Ext.util.Cookies.get("passwordField"));
			Bleext.Ajax.request({
				url		: "php/loginValidate.php",
				params	: values,
				el		: this.up("window").el,
				scope	: this,
				success	: this.onSuccess,
				failure	: this.onFailure
			});
		}
	},
	
	onSuccess	: function(data,response){
		
		if(data.success){
			if(this.forward){
				//GUARDAMOS EN EL SESSION STORAGE UN ARREGLO CON LOS PERMISOS QUE TENGA EL USUARIO
				
				
				document.location = Bleext.desktop.Constants.DESKTOP_HOME_URL;
			}else{
				var win = this.up("window");
				if(win){
					win.close();
				}
			}
			
		}
	},
	
	onFailure	: function(data,response){
		
		var passwrd = this.down("textfield[name=password]");
		console.debug(data.message);
		Ext.create("Ext.tip.ToolTip",{
			anchor		: "left",
			target		: passwrd.bodyEl,
			trackMouse	: false,
			html		: data.message,
			autoShow	: true
		});
		passwrd.markInvalid(data.message);
	}
});