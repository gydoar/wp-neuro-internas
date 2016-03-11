<?php 

  require("conexion.php");

  if(isset($_POST['boton'])){
        if($_POST['nombre'] == ''){
            $errors[1] = '<span class="error">Ingrese su nombre</span>';
        }else if($_POST['apellido'] == ''){
            $errors[2] = '<span class="error">Ingrese su apellido</span>';
        }else if($_POST['email'] == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email'])){
            $errors[3] = '<span class="error">Ingrese un email correcto</span>';
        }else if($_POST['telefono'] == ''){
            $errors[4] = '<span class="error">Ingrese un teléfono</span>';
        }else if($_POST['ciudad'] == ''){
            $errors[5] = '<span class="error">Ingrese una ciudad</span>';
        }else{
            $dest = "smjurgenklaric@gmail.com"; //Email de destino
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono']; //Asunto
            $ciudad = $_POST['ciudad'];
            $cuerpo = "Nombre: $nombre <br/> Apellido: $apellido <br/> Email: $email <br/> Teléfono: $telefono <br/> Ciudad: $ciudad"; //Cuerpo del mensaje

            //Cabeceras del correo
            $headers = "From: $nombre <$email>\r\n"; //Quien envia?
            $headers .= "X-Mailer: PHP5\n";
            $headers .= 'MIME-Version: 1.0' . "\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //

            //Cabeceras del correo
            $headers2 = "From: Jurgen Klaric <smjurgenklaric@gmail.com>\r\n"; //Quien envia?
            $headers2 .= "X-Mailer: PHP5\n";
            $headers2 .= 'MIME-Version: 1.0' . "\n";
            $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
 
            if(mail($dest,"Contacto landing Neuro Codificación",$cuerpo,$headers)){

            
              foreach($_POST AS $key => $value) { 
                $_POST[$key] = mysql_real_escape_string($value); 
              } 

              $sql = "INSERT INTO `cf` (`nombre`,`apellido`,`email`,`telefono`,`ciudad`) VALUES ('{$_POST['nombre']}','{$_POST['apellido']}','{$_POST['email']}','{$_POST['telefono']}','{$_POST['ciudad']}')";
                mysql_query($sql) or die(mysql_error());  

            
                $result = '<div class="result_ok">Tu información ha sido enviada correctamente</div>';
                // si el envio fue exitoso reseteamos lo que el usuario escribio:
                $_POST['nombre'] = '';
                $_POST['apellido'] = '';
                $_POST['email'] = '';
                $_POST['telefono'] = '';
                $_POST['ciudad'] = '';


                ob_start();

                require 'email.php';

                $template_1 = ob_get_contents();

                ob_end_clean();


              $envia = mail($email,"Su mensaje fue recibido!",$template_1,$headers2); 
              
            }else{
                $result = '<div class="result_fail">Hubo un error al enviar el mensaje </div>';
            }
        }
    }else if(isset($_POST['boton1'])){
        if($_POST['nombre1'] == ''){
            $errorss[6] = '<span class="error">Ingrese su nombre</span>';
        }else if($_POST['apellido1'] == ''){
            $errorss[7] = '<span class="error">Ingrese su apellido</span>';
        }else if($_POST['email1'] == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email1'])){
            $errorss[8] = '<span class="error">Ingrese un email correcto</span>';
        }else if($_POST['telefono1'] == ''){
            $errorss[9] = '<span class="error">Ingrese un teléfono</span>';
        }else if($_POST['ciudad1'] == ''){
            $errorss[10] = '<span class="error">Ingrese una ciudad</span>';
        }else{
            $dest = "smjurgenklaric@gmail.com"; //Email de destino
            $nombre = $_POST['nombre1'];
            $apellido = $_POST['apellido1'];
            $email = $_POST['email1'];
            $telefono = $_POST['telefono1']; //Asunto
            $ciudad = $_POST['ciudad1'];
            $cuerpo = "Nombre: $nombre <br/> Apellido: $apellido <br/> Email: $email <br/> Teléfono: $telefono <br/> Ciudad: $ciudad"; //Cuerpo del mensaje

            //Cabeceras del correo
            $headers = "From: $nombre <$email>\r\n"; //Quien envia?
            $headers .= "X-Mailer: PHP5\n";
            $headers .= 'MIME-Version: 1.0' . "\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //

            //Cabeceras del correo
            $headers2 = "From: Jurgen Klaric <smjurgenklaric@gmail.com>\r\n"; //Quien envia?
            $headers2 .= "X-Mailer: PHP5\n";
            $headers2 .= 'MIME-Version: 1.0' . "\n";
            $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
 
            if(mail($dest,"Contacto landing Neuro Codificación",$cuerpo,$headers)){

            
              foreach($_POST AS $key => $value) { 
                $_POST[$key] = mysql_real_escape_string($value); 
              } 

              $sql = "INSERT INTO `cf` (`nombre`,`apellido`,`email`,`telefono`,`ciudad`) VALUES ('{$_POST['nombre1']}','{$_POST['apellido1']}','{$_POST['email1']}','{$_POST['telefono1']}','{$_POST['ciudad1']}')";
                mysql_query($sql) or die(mysql_error());  

            
                $result = '<div class="result_ok">Tu información ha sido enviada correctamente</div>';
                // si el envio fue exitoso reseteamos lo que el usuario escribio:
                $_POST['nombre1'] = '';
                $_POST['apellido1'] = '';
                $_POST['email1'] = '';
                $_POST['telefono1'] = '';
                $_POST['ciudad1'] = '';


                ob_start();

                require 'email.php';

                $template_1 = ob_get_contents();

                ob_end_clean();


              $envia = mail($email,"Su mensaje fue recibido!",$template_1,$headers2); 
              
            }else{
                $result = '<div class="result_fail">Hubo un error al enviar el mensaje </div>';
            }
        }
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Tour Neurocodificación | Colombia</title>
  <meta name="description" content="Aprenderás cómo de-codificar y codificar científicamente discursos comerciales, ventas; y lo más importante tu mente, Tour Global.">
  <meta name="author" content="Celebrity Lab">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/library/css/normalize.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/library/css/skeleton.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/library/css/jquery.fancybox.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/library/css/jquery.fancybox-buttons.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/style.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="<?php bloginfo('template_url' ); ?>/library/img/favicon.png">

</head>
<body>
  <header>
    <div class="center" id="result">
      <?php if(isset($result)) { echo $result; } ?>
    </div>
    <div class="container">
      <div class="three columns logo">
        <h1><a href=""><img width="240px" src="<?php bloginfo('template_url' ); ?>/library/img/logo.png" alt=""></a></h1>
      </div>

      <div class="three columns datos-ciudad-header">
        <img src="<?php bloginfo('template_url' ); ?>/library/img/bandera-colombia.png" alt=""> <p>Medellín, <br><span>Colombia</span></p>
      </div>

      <div class="four columns offset-by-two datos-tel-header">
        <img width="50px" src="<?php bloginfo('template_url' ); ?>/library/img/icon-whatsapp.png" alt=""> <p>Separa tu cupo <br> <a href="tel: +1 (786) 805-0449"> +1 (786) 805-0449</a></p>
      </div>
    </div>

    <!-- Nav -->
    <div class="nav">
      <nav class="container">
        <ul>
          <li><a href="#docentes">DOCENTES</a></li>
          <li><a href="#programa">PROGRAMA</a></li>
          <li><a href="#certificacion">CERTIFICACIÓN</a></li>
          <li><a class="boton-ticket-header" href="#tickets">TICKETS</a></li>
        </ul>
      </nav>
    </div>
  </header>