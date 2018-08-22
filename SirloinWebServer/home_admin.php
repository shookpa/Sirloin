<?php 
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sirloin</title>

    <link rel="stylesheet" type="text/css" href="css/desktop.css" />
    
    <!-- GC -->

    <!-- <x-compile> -->
    <!-- <x-bootstrap> -->
    <?php 
    	require_once 'php/lib/sesion_usuario.php';
    	require_once 'php/lib/conexionMysql.php';
//    	require_once 'php/lib/bitacora.php';
//    	creaBitacora( 39, "", "");
//		if ($_GET["tema"]=="azul2")
//		{ 
//			echo  '<script type="text/javascript" src="extjs/examples/shared/include-ext.js"></script>';
//			echo  '<link rel="stylesheet" type="text/css" href="extjs/resources/integra-theme/integra-theme-all.css" />';
//		}
//		else
//			if ($_GET["tema"]=="azul3")
//			{
//				echo  '<script type="text/javascript" src="extjs/examples/shared/include-ext.js?theme=classic"></script>';
//				echo  '<link rel="stylesheet" type="text/css" href="extjs/resources/NewbridgeGreen-extjs-clifton-1.3-NO-SASS/NewbridgeGreen-extjs-clifton-1.3-NO-SASS/css/clifton-blue.css" />';
//			} 
//			else
//				echo  '<script type="text/javascript" src="extjs/examples/shared/include-ext.js?theme=classic"></script>';   
	
		echo  '<script type="text/javascript" src="extjs/examples/shared/include-ext.js?theme=classic"></script>';
		
		echo '<script type="text/javascript" src="extjs/locale/ext-lang-es.js"></script>';
		//POR SI SE REQUIERE HACER DEBUG:
//		echo  '<script type="text/javascript" src="extjs/ext-all-debug.js"></script>';
		
//		echo  '<link rel="stylesheet" type="text/css" href="extjs/resources/integra-theme/integra-theme-all.css" />';
//		echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>';
			
    ?>
<!--    <link rel="stylesheet" type="text/css" href="extjs/resources/css/ext-all-neptune-debug.css" />-->
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>-->
    <!-- </x-bootstrap> -->
    <script type="text/javascript">
    
//	    window.onbeforeunload = function (e) {
//	  	  var message = "¿Seguro de abandonar el sistema ?. Perderá todos los cambios no guardados.",
//	  	  e = e || window.event;
//	  	  // For IE and Firefox
//	  	  if (e) {
//	  	    e.returnValue = message;
//	  	  }
//	
//	  	  // For Safari
//	  	  return message;
//	  	};
    
        Ext.Loader.setPath({
            'Ext.ux.desktop': 'js',
            'Ux.feedback': 'js/ux/feedback/',
            MyDesktop: ''
        });
        Ext.require('MyDesktop.App');
        var myDesktopApp;
        Ext.onReady(function () {
            myDesktopApp = new MyDesktop.App();           
        });
       
       
    </script>
    <!-- </x-compile> -->
</head>

<body style="background-color:black"> 
<!-- <div class="copyright"> -->
<!--                                <span>Powered by<img src="images/logo_mas_rfid.png" class="col-4 col-lg-4"/></span> -->
<!--                     </div> -->
    <a href="http://www.rfid-solutions.com.mx/" target="_blank" alt="Powered by Soft-WebCosmos"
       id="poweredby"><div><span>Powered by Mas RFID</span></div></a>

</body>
</html>
<?php 
require_once 'php/lib/valida_sesion.php';	
?>
 <script type="text/javascript">
 /**
  * Session Monitor task, alerts the user that their session will expire in 60 seconds and provides
  * the options to continue working or logout.  If the count-down timer expires,  the user is automatically
  * logged out.
  */
 Ext.define('MyApp.widgets.SessionMonitor', {
   singleton: true,
   interval: 1000 * 10,  // run every 10 seconds.
   lastActive: null,
   maxInactive: 1000 * 60 * 15,  // 15 minutes of inactivity allowed; set it to 1 for testing.
   remaining: 0,
   ui: Ext.getBody(),

   /**
    * Dialog to display expiration message and count-down timer.
    */
   window: Ext.create('Ext.window.Window', {
     bodyPadding: 5,
     closable: false,
     closeAction: 'hide',
     modal: true,
     resizable: false,
     title: 'Alerta de fin de sesion',
     width: 325,
     items: [{
       xtype: 'container',
       frame: true,
       html: "La sesion caduca despues de 15 minutos de inactividad. Si tu sesion expira, cualquier dato no guardado se podra perder, y usted sera dirigido al formulario de inicio de sesion. </br></br>Si usted desea seguir en el sistema, presione el boton de Continuar Trabajando.</br></br>"    
     },{
       xtype: 'label',
       text: ''
     }],
     buttons: [{
       text: 'Continuar Trabajando',
       handler: function() {
         Ext.TaskManager.stop(MyApp.widgets.SessionMonitor.countDownTask);
         MyApp.widgets.SessionMonitor.window.hide();
         MyApp.widgets.SessionMonitor.start();
         // 'poke' the server-side to update your session.
         Ext.Ajax.request({
           url: 'php/lib/sesion_usuario.php'
         });
       }
     },{
       text: 'Salir',
       action: 'logout',
       handler: function() {
         Ext.TaskManager.stop(MyApp.widgets.SessionMonitor.countDownTask);
         MyApp.widgets.SessionMonitor.window.hide();
         location.href="finsesion.php";
         // find and invoke your app's "Logout" button.
//         Ext.ComponentQuery.query('#buttonLogout')[0].handler();
       }
     }]
   }),

  
   /**
    * Sets up a timer task to monitor for mousemove/keydown events and
    * a count-down timer task to be used by the 60 second count-down dialog.
    */
   constructor: function(config) {
// 	  console.debug("constructor");
     var me = this;
    
     // session monitor task
     this.sessionTask = {
       run: me.monitorUI,
       interval: me.interval,
       scope: me
     };

     // session timeout task, displays a 60 second countdown
     // message alerting user that their session is about to expire.
     this.countDownTask = {
       run: me.countDown,
       interval: 1000,
       scope: me
     };
   },
  
  
   /**
    * Simple method to register with the mousemove and keydown events.
    */
   captureActivity : function(eventObj, el, eventOptions) {
//       console.debug("captureActivity");
     this.lastActive = new Date();
   },


   /**
    *  Monitors the UI to determine if you've exceeded the inactivity threshold.
    */
   monitorUI : function() {
// 	  console.debug("monitorUI");
     var now = new Date();
     var inactive = (now - this.lastActive);
         
     if (inactive >= this.maxInactive) {
       this.stop();

       this.window.show();
       this.remaining = 60;  // seconds remaining.
       Ext.TaskManager.start(this.countDownTask);
     }
   },

  
   /**
    * Starts the session timer task and registers mouse/keyboard activity event monitors.
    */
   start : function() {
// 	  console.debug("start", Ext.getBody());
     this.lastActive = new Date();

     this.ui.on('mousemove', this.captureActivity, this);
     this.ui.on('keydown', this.captureActivity, this);
         
     Ext.TaskManager.start(this.sessionTask);
   },
  
   /**
    * Stops the session timer task and unregisters the mouse/keyboard activity event monitors.
    */
   stop: function() {
// 	  console.debug("stop");
     Ext.TaskManager.stop(this.sessionTask);
     this.ui.un('mousemove', this.captureActivity, this);  //  always wipe-up after yourself...
     this.ui.un('keydown', this.captureActivity, this);
   },
  
  
   /**
    * Countdown function updates the message label in the user dialog which displays
    * the seconds remaining prior to session expiration.  If the counter expires, you're logged out.
    */
   countDown: function() {
// 	  console.debug("countDown");
     this.window.down('label').update('La sesion expira en ' +  this.remaining + ' segundo' + ((this.remaining == 1) ? '.' : 's.') );
     
     --this.remaining;

     if (this.remaining < 0) {
       this.window.down('button[action="logout"]').handler();
     }
   }
  
 });
 MyApp.widgets.SessionMonitor.start();
</script>