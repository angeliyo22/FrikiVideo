<?php 


	function conectar($esRemota){

		if ($esRemota) {
			$servidor="...";
		}else{
			$servidor="localhost:3306";
		}

		//Variable que almacena el usuario que se conecta a mi Gestor de BD
		$usuario="debianBD";

		//Variable que almacena la contraseña del usuario que se conecta a mi Gestor de BD
		$contraseña="debianBD";

		//Variable que almacena el esquema de la BD
		$BD="tienda_online";

		$conectar=mysqli_connect($servidor,$usuario,$contraseña,$BD);


		if ($conectar) {
			return $conectar;
		}else{
			//Funcion que me indica el error cometido al intentar conectar
			echo "mysqli_connect_error()";
			exit;
		}
	}

 ?>
