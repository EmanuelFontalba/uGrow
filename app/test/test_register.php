<html>
	<head><title>Test Register Users</title></head>
	<body>
		<?php
			include("../config/config.php");
			include("../class/Connexion.php");
			include("../config/query.php");
			include("../class/User.php");

			$user = new User();
			$user->register("Emanuel", "apellido", "ema", "mipass", "mimail", "30-9-1991", "ruta imagen", "mi descripcion", "calle judios 10");

			$user->register("Jopetas", "apellido", "ema", "mipass", "mimail", "30-9-1991", "ruta imagen", "mi descripcion", "calle judios 10");//no se tiene que guardar otra vez por el nombre de usuario

			$user->register("Emanuel", "apellido", "rafa", "mipass", "mimail", "30-9-1991", "ruta imagen", "mi descripcion", "calle judios 10");//si se tiene que guardar por el nombre de usuario

			$str = "hola";

			$uno = md5($str);
			$dos = md5($str);

			echo date('d-m-Y')."<br>";

			if($uno == $dos){
				echo "Codificación correcta"."<br>";
				echo $uno."<br>";
				echo $dos."<br>";
				echo "adios: ".md5("adios")."<br>";
				echo "mipass: ".md5("mipass")."<br>";
			}else{
				echo "Codificación incorrecta"."<br>";
				echo $uno."<br>";
				echo $dos."<br>";
			}
			echo "login correcto : ";
			if($user->login("ema", "mipass")){//pass correcta
				echo "logeado!"."<br>";
			}else{
				echo "usuario o contraseña incorrecta"."<br>";
			}

			echo "pass incorrecta : ";
			if($user->login("ema", "mipass1")){//pass incorrecta
				echo "logeado!"."<br>";
			}else{
				echo "usuario o contraseña incorrecta"."<br>";
			}

			echo "usuario incorrecto: ";
			if($user->login("emanue", "mipass")){//usuario incorrecto
				echo "logeado!"."<br>";
			}else{
				echo "usuario o contraseña incorrecta"."<br>";
			}

		?>
	</body>
</html>