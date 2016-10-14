<?php


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$biblioteca = $_POST['biblioteca'];
$mensaje = $_POST['mensaje'];

	$mensaje = '<!doctype html>
	        <html>
	        <head>
	        <meta charset="UTF-8">
	        <title>Afiliación</title>
	        </head>
			<body>
				<table width="500px">
				<tr>
				<td>Nombre:</td><td>'.$nombre.'</td>
				</tr>
				<tr>
				<td>E-mail:</td><td>'.$email.'</td>
				</tr>
				<tr>
				<td>Tel:</td><td>'.$tel.'</td>
				</tr>
				<tr>
				<td>Mensaje:</td><td>'.$mensaje.'</td>
				</tr>
				</table>
			</body>
			</html>
		';
	$asunto = "Afiliación desde la página del Sistema de bibliotecas públicas de medellín.";
	$destinatario = $biblioteca;
	$destinatario_nombre = $biblioteca;

	require_once 'Mandrill.php';
	//-------------------
		try {
			$mandrill = new Mandrill('glfmbv2a9BorQMp2c_TvDA');
			$message = array(
			  'html' => $mensaje,
			  'text' => 'El contenido de este correo requiere de un cliente de correo compatible con HTML',
			  'subject' => $asunto,
			  'from_email' => 'afiliacion@sbpm.com',
			  'from_name' => 'SBPM',
			  'to' => array(
			    array(
			      'email' => $destinatario,
			      'name' => $destinatario_nombre
			    )
			  ),
			  'headers' => array('Reply-To' => 'afiliacion@sbpm.com'),
			  'important' => false,
			  'track_opens' => true,
			  'track_clicks' => true,
			  'auto_text' => null,
			  'auto_html' => null,
			  'inline_css' => null,
			  'url_strip_qs' => null,
			  'preserve_recipients' => null,
			);
			$async = false;
			$ip_pool = 'Main Pool';
			$send_at = null;
			$result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
		}catch(Mandrill_Error $e) {
			$resultado = "Error Mandrill: ";
			$cod_error = "EMA01";
			$ipprimax = $_SERVER["REMOTE_ADDR"];
			$ippsecux = $_SERVER["HTTP_X_FORWARDED_FOR"];
			$browser = $_SERVER["HTTP_USER_AGENT"];
			$detalles = "Nombres: ";
		}