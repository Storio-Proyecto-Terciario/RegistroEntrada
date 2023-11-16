<?php
class Conectar
{
	private static $ubicacion_de_la_BD; //ip del servidor donde se encuenra la db
	private static $nombre_del_usuario_de_BD;
	private static $contaseña_del_usuario_de_BD;
	private static $nombre_de_la_BD_del_sistema;

	public function __construct()
	{
		$this->ubicacion_de_la_BD = "localhost";
		$this->nombre_del_usuario_de_BD = "root";
		$this->contaseña_del_usuario_de_BD = "";
		$this->nombre_de_la_BD_del_sistema = "Proyecto";
	}
	public static function conexion()
	{


		$conexion = new mysqli(self::$ubicacion_de_la_BD, self::$nombre_del_usuario_de_BD , self::$contaseña_del_usuario_de_BD, self::$nombre_de_la_BD_del_sistema);
		if ($conexion->connect_errno) {

			echo "<p>Codigo de error: $conexion->connect_errno </p><br><br>";
			echo "<p>Error: $conexion->connect_error </p><br><br>";
			exit;
		}

		$conexion->query("SET NAMES 'utf8'");
		
		return $conexion;
	}
}
