<?php 

$conexion = new mysqli('db', 'root', 'test', 'dbname');
//Imprimimos la informaicón de la conexión
print $conexion->server_info;
// comprobar conexión

if ($conexion->connect_error) {
  die("Fallo en conexión: " . $conexion->connect_error);
}
echo "Conexión correcta";

$conn = mysqli_connect('db', 'root', 'test', 'dbname');

// comprobar conexión
if (!$conn) {
  die("Fallo en conexión: " . mysqli_connect_error());
}
echo "Conexión correcta";

$servername = "db";
$username = "root";
$password = "test";

try {
  $conn = new PDO("mysql:host=$servername;dbname=dbname", $username, $password);
  //  Forzar excepciones
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conexión correcta";
} catch(PDOException $e) {
  echo "Fallo en conexión: " . $e->getMessage();
}
?>