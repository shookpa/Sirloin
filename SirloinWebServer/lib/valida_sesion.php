<?php
require_once 'sesion_usuario.php';
//VERIFICAMOS PRIMERO QUE YA HAYA ENTRADO A LA SESION:
if (empty ( $_SESSION ["s_iduser"] )) {
	echo '<script language="javascript">';
//	var_dump($_SESSION);
   echo 'alert ("Ingresa tus datos de acceso");';
   echo " location.replace('index.php');";
   echo "</script>";
 
}
//// LUEGO VERIFICAMOS EL TIEMPO DE SUS MOVIMIENTOS DENTRO DEL SISTEMA:
//$minutos_maximo = 120;
//$ahora = time ();
//$resta_seg = $ahora - $_SESSION ["s_ultimo_acceso"];
//$tiempo_max = 60 * $minutos_maximo;
//if ($_SESSION ["s_ultimo_acceso"]) {
//	if ($resta_seg > $tiempo_max) {
//		session_destroy ();
//	
//<script language="javascript">
//	  // alertPersonalizado('Satin','Despues de 120 minutos de inactividad, la sesion expira','error');
//		  alert ("Despues de 120 minutos de inactividad, la sesion expira");
//		   location.replace('index.php');
//	   </script>
//
//	}
//}
//$_SESSION ["s_ultimo_acceso"] = $ahora;



//ESTE MISMO ARCHIVO QUE DEVUELVA UN JSON CON LOS DATOS DEL USUARIO QUE ESTAN EN VARIABLES DE SESSION:
$arr[0]["s_user_name"]=utf8_encode($_SESSION["s_user_name"]);
$arr[0]["s_iduser"]=utf8_encode($_SESSION["s_iduser"]);
$arr[0]["s_permisos"]=utf8_encode($_SESSION["s_permisos"]);
//if (!isset( $_GET ["secure"] )) 
//	echo '{"success":true, "datos":'.json_encode($arr).'}';

?>