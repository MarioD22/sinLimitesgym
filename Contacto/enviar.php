<?php
// Activamos la visibilidad de errores, esto nos sirve para encontrar errores en la ejecución.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *');

// -----------------------------------------------------------------------------
// VERIFICACION DE VARIABLES

// Comprobamos que exista el email donde queremos recibir el formulario.
if(!isset($_POST['destino'])){
	echo "Debe configurar el email de destino.";
	die();
}else if($_POST['destino'] == ''){
	echo "El email de destino no puede estar vacío.";
	die();
}

// Guardamos el email donde queremos recibir el formulario.
$email_to = $_POST['destino'];

// Asunto
$email_subject = "CRONOS - Prueba de formulario";


// Validamos los datos ingresados por el usuario
if(!isset($_POST['nombre']) ||
!isset($_POST['email']) ||
!isset($_POST['telefono']) ||
!isset($_POST['comentario'])) {

	echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
	echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
	die();
}

// -----------------------------------------------------------------------------
// CONSTRUCCION DEL EMAIL

// Armamos el cuerpo del mensaje
$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['nombre'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Teléfono: " . $_POST['telefono'] . "\n";
$email_message .= "Comentarios: " . $_POST['comentario'] . "\n\n";


// Preparamos el encabezado del email
$email_from = "no-reply@c2350127.ferozo.com";
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();


// Ahora se envía el e-mail usando la función mail() de PHP
// La función "mail()" devuelve "true" en caso de enviar, y "false" en caso de fallar.
if(mail($email_to, $email_subject, $email_message, $headers)){
	echo "¡El formulario se ha enviado a <b>".$email_to."</b>!";
}else{
	echo "No se pudo enviar el correo a <b>".$email_to."</b>!";
}
?>
