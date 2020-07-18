<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="https://montesfiles.000webhostapp.com/vista/subidas/logocelosomontes2.png">
    <meta charset="UTF-8">
    <title>Confirmación de correo</title>
</head>
<?php 

    if((isset($_GET['nfbFNJksab763983ass5syta'])) && (isset($_GET['c96SKyd6a4srfD9AKkarf53B'])) && (isset($_GET['url']))){
        $nombre = $_GET['nfbFNJksab763983ass5syta'];
        $id = $_GET['c96SKyd6a4srfD9AKkarf53B'];
?>
    <body>

        <div class="offset-md-0 col-md-12" style="margin-bottom: 1em;"><center>
        <table style="box-shadow: 0px 0px 30px 1px black; margin-top: 1em; border-radius: 10px; border: none;">
            <tr>
                <td><img src="https://montesfiles.000webhostapp.com/vista/subidas/Bienvenid@.png" width="100%;" style="border-radius: 10px;"></td>
            </tr>
            <tr style="background-color: black; font-size: 2.1em;">
                <td>
                    <div style="text-align: center; color: white; margin-left: 10%; margin-right: 10%; margin-top: 1em; margin-bottom: 2em;">
                        <b><h1 style="color: white; font-size: 2em;">¡Te damos la bienvenida!</h1></b><br>
                        <p style="text-align: justify;">¡Hola <b><?php echo $nombre; ?></b>! Para poder iniciar en nuestro sitio web es necesario que confirmes que esta dirección de correo electrónico te pertenece.<br>Esto se hace con fines de seguridad de la cuenta y para asegurarnos que puedas recuperar tu contraseña en caso de perderla.</p><br>
                        <p><a href="confirmar_correo.php?c96SKyd6a4srfD9AKkarf53B=<?php echo $id; ?>" style="border-radius: 10px; padding: 0.5em; text-decoration: none; background: #ffffff; color: #000000;">Confirmar dirección</a></p>
                    </div>
                </td>
            </tr>
            <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
            <tr align="center" style="background-color: white;">
                <td align="center" style="display: inline-flex; align-items: center;">
                    &nbsp;<h6 style="margin-top: 3px; font-size: 2em;"><b>Disfruta de nuestros servicios</b></h6>&nbsp;&nbsp;&nbsp;
                    <a href="#"><img src="https://montesfiles.000webhostapp.com/vista/subidas/004-twitter-logo.png" alt="" style="width: 50px; max-width: 600px; height: auto; display: flex;"></a>
                    <a href="https://www.facebook.com/pages/Celulares-Oso-Montes/293767271095673" target="_blank"><img src="https://montesfiles.000webhostapp.com/vista/subidas/005-facebook.png" alt="" style="width: 50px; max-width: 600px; height: auto; display: block;"></a>
                    <a href="#"><img src="https://montesfiles.000webhostapp.com/vista/subidas/006-instagram-logo.png" alt="" style="width: 50px; max-width: 600px; height: auto; display: block;"></a>&nbsp;&nbsp;
                </td>
            </tr>
            <tr style="background-color: white; font-size: 1.7em;">
                <td align="center">
                    © Celulares Oso Montes <a href="https://goo.gl/maps/TdZT2ABoFKLCRBcCA" target="_blank" title="Abrir mapa"> Adolfo López Mateos #260, Amapa, Nay.</a>
                </td>
            </tr>
            <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        </table></center>
    </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    </html>
<?php      
    }
    else{
?>

    <body>

        <div class="offset-md-0 col-md-12" style="margin-bottom: 1em;"><center>
        <table style="box-shadow: 0px 0px 30px 1px black; margin-top: 1em; border-radius: 10px; border: none;">
            <tr>
                <td><img src="https://montesfiles.000webhostapp.com/vista/subidas/Bienvenid@.png" width="100%;" style="border-radius: 10px;"></td>
            </tr>
            <tr style="background-color: black; font-size: 2.1em;">
                <td>
                    <div style="text-align: center; color: white; margin-left: 10%; margin-right: 10%; margin-top: 1em; margin-bottom: 2em;">
                        <b><h1 style="color: white; font-size: 2em;">¡Ups ocurrió un error al procesar la página de confirmación!</h1></b><br>
                        <p style="text-align: center;">Porfavor comunícate con atención a cliente :(</p><br>
                    </div>
                </td>
            </tr>
            <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
            <tr align="center" style="background-color: white;">
                <td align="center" style="display: inline-flex; align-items: center;">
                    &nbsp;<h6 style="margin-top: 3px; font-size: 2em;"><b>Pronto podrás disfrutar de nuestros servicios</b></h6>&nbsp;&nbsp;&nbsp;
                    <a href="#"><img src="https://montesfiles.000webhostapp.com/vista/subidas/004-twitter-logo.png" alt="" style="width: 50px; max-width: 600px; height: auto; display: flex;"></a>
                    <a href="https://www.facebook.com/pages/Celulares-Oso-Montes/293767271095673" target="_blank"><img src="https://montesfiles.000webhostapp.com/vista/subidas/005-facebook.png" alt="" style="width: 50px; max-width: 600px; height: auto; display: block;"></a>
                    <a href="#"><img src="https://montesfiles.000webhostapp.com/vista/subidas/006-instagram-logo.png" alt="" style="width: 50px; max-width: 600px; height: auto; display: block;"></a>&nbsp;&nbsp;
                </td>
            </tr>
            <tr style="background-color: white; font-size: 1.7em;">
                <td align="center">
                    © Celulares Oso Montes <a href="https://goo.gl/maps/TdZT2ABoFKLCRBcCA" target="_blank" title="Abrir mapa"> Adolfo López Mateos #260, Amapa, Nay.</a>
                </td>
            </tr>
            <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        </table></center>
    </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    </html>
<?php
    }
?>