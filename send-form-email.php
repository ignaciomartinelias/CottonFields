<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "imelias@live.com";
    $email_subject = "Contacto via Pagina Web Cotton Fields";
 
    function died($error) {
        // your error code can go here
        echo "Lo sentimos, hubo un error al enviar el formulario de contacto. ";
        echo "Por favor vuelva atras e intente nuevamente.<br /><br />";
        die();
    }
 
     
 
    $full_name = $_POST['nombre']; // required
    $email = $_POST['email']; // required
    $telefono = $_POST['telefono']; // not required
    $tipo = $_POST['tipo']; // required
    $mensaje = $_POST['mensaje']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'La direccion de Email introducida no es Valida.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Datos del Cliente.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Nombre: ".clean_string($nombre)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Telefono: ".clean_string($telefono)."\n";
    $email_message .= "Tipo: ".clean_string($tipo)."\n";
    $email_message .= "Mensaje: ".clean_string($mensaje)."\n";
 
// create email headers
$headers = 'DFrome: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

}
?>