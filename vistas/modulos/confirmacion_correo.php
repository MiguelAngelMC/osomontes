<?php
// Envió el correo de confirmación de cuenta con PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vistas/PHPMailer/Exception.php';
require 'vistas/PHPMailer/PHPMailer.php';
require 'vistas/PHPMailer/SMTP.php';				

				// Instantiation and passing `true` enables exceptions
				$mail = new PHPMailer(true);

				try {
					    $mail->SMTPOptions = array(
							'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
							)
						);
				    //Server settings
				    $mail->SMTPDebug = 0;                      // Enable verbose debug output
				    $mail->isSMTP();                                            // Send using SMTP
				    $mail->Host       = 'smtp.gmail.com';						// Servidor SMTP de nuestro correo
				    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
				    $mail->Username   = 'soporteosomontes@gmail.com';			// Cuenta de correo a la que accederá PHPMailer
				    $mail->Password   = 'Oso,montes.123';                       // Contraseña de la cuenta
				    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

				    // Activo codificación utf-8
					$mail->CharSet = 'UTF-8';

				    //Recipients
				    $mail->setFrom('soporteosomontes@gmail.com', 'Equipo de soporte de Oso Montes'); // Cuenta que envía el correo
				    $mail->addAddress($correo, $nombre);					// Cuenta que recibirá el correo
				    //$mail->addAddress('ellen@example.com');					// Name is optional
				    //$mail->addReplyTo('info@example.com', 'Information');
				    //$mail->addCC('cc@example.com');
				    //$mail->addBCC('bcc@example.com');

				    // Attachments
				    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
				    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
				    $mail->AddEmbeddedImage('vistas/img/Bienvenid@.png', 'Bienvenid@');
				    $mail->AddEmbeddedImage('vistas/img/004-twitter-logo.png', 'twitter-logo');
				    $mail->AddEmbeddedImage('vistas/img/005-facebook.png', 'facebook-logo');
				    $mail->AddEmbeddedImage('vistas/img/006-instagram-logo.png', 'instagram-logo');

				    // Content
				    $mail->isHTML(true);															// Darle formato HTML al correo
				    $mail->Subject = '👋 Activa tu cuenta';										// Asunto del correo
				    $mail->Body = '<center>
				    <table style="margin-top: 1em; border-radius: 10px; border: none;">
				    	<tr>
				    		<td>
				    			<img src="cid:Bienvenid@" width="100%;" style="border-radius: 10px;">
				    		</td>
				    	</tr>
				    	<tr style="background-color: black;">
				    		<td>
				    			<div style="text-align: center; color: white; margin-left: 10%; margin-right: 10%; margin-top: 1em; margin-bottom: 1em;">
				    				<b><h3 style="color: white;">¡Te damos la bienvenida!</h3></b>
				    				<p style="text-align: justify;">¡Hola <b>'.$nombre.'</b>! Para poder iniciar en nuestro sitio web es necesario que confirmes que esta dirección de correo electrónico te pertenece.<br>Esto se hace con fines de seguridad de la cuenta y para asegurar que puedas recuperar tu contraseña en caso de perderla.</p><br>
				    				<p><a href="'.$url_pagina.'/vistas/modulos/confirmar_correo.php?c96SKyd6a4srfD9AKkarf53B='.$id.'" style="border-radius: 5px; padding: 0.5em; text-decoration: none; background: #ffffff; color: #000000;">Confirmar dirección</a></p>
				    			</div>
				    			<div style="color: white; margin-left: 10%; margin-right: 10%; margin-top: 3em; margin-bottom: 1em;">
					    				<p style="text-align: center; font-size: 0.8em;">Si no visualizas el mensaje correctamente <a href="
					    				'.$url_pagina.'/vistas/modulos/correo_bienvenida.php?nfbFNJksab763983ass5syta='.$nombre.'&c96SKyd6a4srfD9AKkarf53B='.$id.'&url='.$url_pagina.'">haz click aquí</a> para ver la versión web completa</p>
				    			</div>
				    		</td>
				    	</tr>
				    	<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
				    	<tr align="center" style="background-color: white;">
				    		<td align="center" style="display: inline-flex; align-items: center;">
				    			&nbsp;<h5 style="margin-top: 3px;"><b>Disfruta de nuestros servicios</b></h5>&nbsp;&nbsp;&nbsp;
				    			<a href=""><img src="cid:twitter-logo" alt="" style="width: 24px; max-width: 600px; height: auto; display: flex;"></a>
				    			<a href="https://www.facebook.com/pages/Celulares-Oso-Montes/293767271095673" target="_blank"><img src="cid:facebook-logo" alt="" style="width: 24px; max-width: 600px; height: auto; display: block;"></a>
				    			<a href=""><img src="cid:instagram-logo" alt="" style="width: 24px; max-width: 600px; height: auto; display: block;"></a>&nbsp;&nbsp;
				    		</td>
				    	</tr>
				    	<tr style="background-color: white;">
				    		<td align="center">
					        	© Celulares Oso Montes <a href="https://goo.gl/maps/TdZT2ABoFKLCRBcCA" target="_blank" title="Abrir mapa"> Adolfo López Mateos #260, Amapa, Nay.</a>
					        </td>
					    </tr>
					    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
					</table></center>';		// Cuerpo del mensaje
				    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';	// Mensaje alternativo sin HTML

				    if(!$mail->Send()){
				    	echo 'Ocurrió un error'.$mail->ErrorInfo;
					}
					else{
						echo 'El correo electrónico se envió con éxito';
					}
				}catch(Exception $e){
				    echo "El correo electrónico no pudo ser envíado. Mailer Error: {$mail->ErrorInfo}";
				}
?>