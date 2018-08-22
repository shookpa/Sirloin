<?php
/**
 * sendEmail This function uses the mailing service from mailRelay
 * @param unknown $rcpt
 * @param unknown $body
 * @param unknown $subject
 */
function sendEmail($rcpt, $body, $subject) {
	$curl = curl_init ( 'https://programadepuntos-vip.ip-zone.com/ccm/admin/api/version/2/&type=json' );
	
	$postData = array (
			'function' => 'sendMail',
			'apiKey' => 'wmVxnabEgOCkABo5oKMnGcLTBpEhev2QYOEBofGL',
			'subject' => $subject,
			'html' => $body,
			'mailboxFromId' => 1,
			'mailboxReplyId' => 1,
			'mailboxReportId' => 1,
			'packageId' => 6,
			'emails' => $rcpt 
	);
	
	$post = http_build_query ( $postData );
	
	curl_setopt ( $curl, CURLOPT_POST, true );
	curl_setopt ( $curl, CURLOPT_POSTFIELDS, $post );
	curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
	
	$json = curl_exec ( $curl );
	if ($json === false) {
		die ( 'Request failed with error: ' . curl_error ( $curl ) );
	}
	
	$result = json_decode ( $json );
	return $result;
	if ($result->status == 0) {
		die ( 'Bad status returned. Error: ' . $result->error );
	}
}

// Create rcpt array to send emails to 2 rcpts
// $rcpt = array (
// array (
// 'name' => 'Jorge Centeno',
// 'email' => 'jorge.centeno@cc-datweb.com.mx'
// ),
// array (
// 'name' => "Ricardo Vargas Gomez",
// 'email' => 'ricardo.vargas@itprotec.com.mx'
// ),
// array (
// 'name' => "Ricardo Vargas Gomez",
// 'email' => 'rickvago@live.com.mx'
// ),
// array (
// 'name' => "Ricardo Vargas Gomez",
// 'email' => 'rickmar_98@yahoo.com'
// ),
// array (
// 'name' => "Miguel Angel Jaime Cruz",
// 'email' => 'angel.jaime@itprotec.com.mx'
// ),
// array (
// 'name' => "Miguel Angel Jaime Cruz",
// 'email' => 'jc_legn@hotmail.com'
// ),
// array (
// 'name' => "Miguel Angel Jaime Cruz",
// 'email' => 'soporte@itprotec.com.mx'
// ),
// array (
// 'name' => "Miguel Angel Jaime Cruz",
// 'email' => 'jclegn@gmail.com'
// )
// );

?>