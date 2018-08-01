<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> Enviando - PHP </title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	</head>
	<body>
		<div id="contenedor">
			<h1>PHP</h1>
			<div class="cajas">
				<h3>Método POST</h3>
			</div>
			<div class="cajas">
				<?php  
				/*echo $_POST['nombre'];
				echo $_POST['clave'];
				echo $_POST['email'];*/

				$nombre=$_POST['nombre'];
				$email=$_POST['email'];
				$telefono=$_POST['telefono'];
				$mensaje=$_POST['mensaje'];

                if ($_POST['nombre']!=""){$nombre=$_POST['nombre'];}
				if ($_POST['email']!=""){$email=$_POST['email'];}
				if ($_POST['telefono']!=""){$telefono=$_POST['telefono'];}
				if ($_POST['mensaje']!=""){$mensaje=$_POST['mensaje'];}
				else{ echo "Debe completar todos los datos";
				}

                


				$destinatario="matiastresguerres@gmail.com";
				$asunto="Mensaje de One Publicidad";
				$msj="Nombre:".$nombre."<br>"."Email:".$email."<br>"."Telefono:".$telefono."<br>"."Mensaje:".$msj;

				$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
				$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				
				$cabeceras .= 'From: '.$nombre.' <'.$email.'>' . "\r\n";



				$envio=mail($destinatario,$asunto,$mensaje);
				if($envio==true){
					echo "Gracias por escribirnos, en breve nos comunicaremos con vos";
				}else{
					echo "Hubo un problema en el envio";
					echo $mensaje;
				}
				
				/* Envio de datos a MySQL */

				/*conexion - mysqli_connect (host, user, pass, db)*/

				$conexion=mysqli_connect("localhost","id5552735_onepublicidad","33911323","id5552735_onedb") or die ("Error de Conexion");

				/*consulta*/

				$consulta=mysqli_query($conexion,"INSERT INTO contactos VALUES (0,'$nombre','$email','$mensaje')");

				/*verificacion*/
				/*1 signo =, asigna*/
				/*2 signo =, comparan*/
				/*3 signo =, comparan valor y tipo de dato*/

				if($consulta===true){
					echo "dato ingresado";
				} else {
					echo "dato no ingresado";
				}

				/*cierre*/

				mysqli_free_result ($consulta); //memoria
                mysqli_close ($conexion); //cierra conexion

              
				?>

			</div>
		
	</body>
</html>