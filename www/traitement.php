<?php
ini_set("SMTP", "smtp.orange.fr"); 
ini_set("smtp_port", 465);

$msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement 
remplis :<br/><br/>";
$msg_ok = "Votre message a bien été envoyé.";
$message = $msg_erreur;
define ('MAIL_DESTINATAIRE','lea.livran@gmail.com'); // remplacer par votre email
define ('MAIL_SUJET','Message de Panoreyes');
 
if (empty ($_POST['nom'])) 
$message .= "Votre nom<br/>";
if (empty ($_POST['prenom'])) 
$message .= "Votre prenom<br/>";
if (empty ($_POST['email'])) 
$message .= "Votre mail<br/>";
if (empty ($_POST['contenu'])) 
$message .= "Votre message<br/>";
 
if (strlen ($message) > strlen ($msg_erreur)) {
   echo  $message; die ();
}
 
foreach($_POST as $index => $valeur) {
  $$index = stripslashes (trim ($valeur));
}
 
//Préparation de l'entête du mail:
$mail_entete  = "MIME-Version: 1.0\r\n";
$mail_entete .= "From: {$_POST['nom']} "
             ."<{$_POST['prenom']}>\r\n";
$mail_entete .= 'Reply-To: '.$_POST['email']."\r\n";
$mail_entete .= 'Content-Type: text/plain; charset="iso-8859-1"';
$mail_entete .= "\r\nContent-Transfer-Encoding: 8bit\r\n";
$mail_entete .= 'X-Mailer:PHP/' . phpversion ()."\r\n";
 
// préparation du corps du mail
$mail_corps  = "Message de : $nom $prenom\n";
$mail_corps .= "Adresse mail : $email\n";
$mail_corps .= $contenu;
 
$to      = 'baptmagntaville@hotmail.fr';
 $subject = 'the subject';
 $message = 'hello';
 $headers = 'From: blabla@example.com' . "\r\n" .
     'Reply-To: blibli@example.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

 

// envoi du mail
if (mail($to, $subject, $message, $headers)) {
  //Le mail est bien expédié
  echo  $msg_ok;
} else {
  //Le mail n'a pas été expédié
  echo  "Une erreur est survenue lors de l'envoi du formulaire par email";
}
 
?>