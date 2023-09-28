<?php
class Conectar
{

	public static function conexion()
	{
		$conexion = new mysqli("localhost", "root", "", "Proyecto");
		if ($conexion->connect_errno) {

			echo "<p>Codigo de error: $conexion->connect_errno </p><br><br>";
			echo "<p>Error: $conexion->connect_error </p><br><br>";
			exit;
		}

		$conexion->query("SET NAMES 'utf8'");
		
		return $conexion;
	}
}
