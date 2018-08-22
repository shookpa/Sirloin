<?php
/*
 * use PHPMailer\PHPMailer\PHPMailer;
 * use PHPMailer\PHPMailer\Exception;
 *
 * require_once'lib/PHPMailer/Exception.php';
 * require_once'lib/PHPMailer/PHPMailer.php';
 * require_once'lib/PHPMailer/SMTP.php';
 */
// require_once 'lib/conexionMysql.php';

// $rsd=traedatosmysql("SELECT table_name AS tabla FROM information_schema.tables where table_schema='".$base."' AND table_name like 'clientes_rest%'");

// while (!$rsd->EOF)
// {
// echo "Veamos la tabla:".$rsd->fields["tabla"]."<br>";

// // var_dump($rsd);
// // echo "<br>";

// $rsd->MoveNext();
// }
// Get real path for our folder
// $rootPath = realpath('/var/www/html/sirloin/logs');
// var_dump($rootPath);
// $nombre_archivo="/var/www/html/sirloin/resources/logs.zip";
// if (touch($nombre_archivo)) {
// echo 'El momento de modificación de ' . $nombre_archivo . ' ha sido cambiada a la hora actual';
// } else {
// echo 'Lo siento, no se pudo cambiar el momento de modificación de ' . $nombre_archivo;
// }

// // // Initialize archive object
// $zip = new ZipArchive();
// if (!$zip->open($nombre_archivo, ZipArchive::CREATE | ZipArchive::OVERWRITE))
// die("Failed to create archive <br>");

// // Create recursive directory iterator
// /** @var SplFileInfo[] $files */
// $files = new RecursiveIteratorIterator(
// new RecursiveDirectoryIterator("/var/www/html/sirloin/logs/"),
// RecursiveIteratorIterator::LEAVES_ONLY
// );

// foreach ($files as $name => $file)
// {
// // Skip directories (they would be added automatically)
// if (!$file->isDir())
// {
// // Get real and relative path for current file
// $filePath = $file->getRealPath();
// $relativePath = substr($filePath, strlen($rootPath) + 1);
// echo "$filePath, $relativePath<br>";
// // Add current file to archive
// $zip->addFile($filePath, $relativePath);
// }
// }
// if (!$zip->status == ZipArchive::ER_OK)
// echo "Failed to write files to zip<br>";
// echo "<BR>se supone que todo ok<BR>". $zip->getStatusString();
// // Zip archive will be created only after closing object
// $zip->close();
// echo "TERMINO POR COMPLETO<BR>";
// $rcpt[0]["name"]="jorge Centeno";
// $rcpt[0]["email"]="jcenteno.ibm@gmail.com";
// $result=sendEmail($rcpt, "<html><body><img src='http://www.programadepuntos-vip.com/images/bienvenida.png' /></body></html>", "Bienvenido al programa de puntos");
/*
 * $mail = new PHPMailer(true); // Passing `true` enables exceptions
 * try {
 * //Server settings
 * $mail->SMTPDebug = 2; // Enable verbose debug output
 * $mail->isSMTP(); // Set mailer to use SMTP
 * $mail->Host = 'smtp.ip-zone.com'; // Specify main and backup SMTP servers mail.programadepuntos-vip.com
 * $mail->SMTPAuth = true; // Enable SMTP authentication
 * $mail->Username = 'programadepuntos-vip'; // SMTP username soporte@programadepuntos-vip.com
 * $mail->Password = 'b683853d'; // SMTP password
 * // $mail->SMTPSecure = 'tls'; // Enable TLS encryption,tls or `ssl` also accepted
 * $mail->Port = 2525; // TCP port to connect to
 *
 * //Recipients
 * // $mail->setFrom('soporte@programadepuntos-vip.com', 'Soporte Sirloin');
 * $mail->addAddress('jcenteno.ibm@gmail.com'); // Add a recipient
 * $mail->addAddress('webmaster@soft-webcosmos.com.mx'); // Name is optional
 * // $mail->addReplyTo('info@example.com', 'Information');
 * // $mail->addCC('cc@example.com');
 * // $mail->addBCC('bcc@example.com');
 *
 * //Attachments
 * // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
 * // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
 *
 * //Content
 * $mail->isHTML(true); // Set email format to HTML
 * $mail->Subject = 'Bienvenido al programa de puntos DESDE LOCAL';
 * $mail->Body = "<html><body><img src='http://www.programadepuntos-vip.com/images/bienvenida.png' /></body></html>";
 * $mail->AltBody = "Bienvenido al programa de puntos";
 *
 * $mail->send();
 * echo 'Message has been sent';
 * } catch (Exception $e) {
 * echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
 * }
 */
$numVip = $_GET ["num_vip"];
// AH"ORA VALIDAREMOS LOS RANDOS DEFINIDOS POR MOI DEL CORREO


echo "<CENTER><H1>";
if (substr ( $numVip, 0, 3 ) == "714")
	// AHORA VALIDAREMOS LOS RANDOS DEFINIDOS POR MOI DEL CORREO
	if ((substr ( $numVip, 4, 4 ) >= 300 && substr ( $numVip, 4, 4 ) <= 499) 
	|| (substr ( $numVip, 4, 4 ) >= 1300 && substr ( $numVip, 4, 4 ) <= 1399)
	|| (substr ( $numVip, 4, 4 ) >= 1400 && substr ( $numVip, 4, 4 ) <= 1499)
	|| (substr ( $numVip, 4, 4 ) >= 2300 && substr ( $numVip, 4, 4 ) <= 2499))
		echo "la tarjeta: $numVip SE DEBE CONTENER";
	else
		echo "la tarjeta: $numVip ES VALIDA";
else
	echo "la tarjeta: $numVip ES VALIDA";
echo "</H1></CENTER>";

echo "<br/> <br/> <br/> <br/><center><h2> LAS REGLAS DEL BLOQUEO:<br/> 4660 3020 0300 a la 0499 <br/>
4660 3020 1300 a la 1399<br/>
4660 3020 1400 a la 1499<br/>
4660 3020 2300 a la 2499 </h2></center>";

?>