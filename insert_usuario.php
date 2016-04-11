<?php

$servidor = "localhost";
$user = "root";
$pass = "root";
$db = "act_extra";

$link=mysqli_connect($servidor, $user, $pass,$db) OR DIE ("Error: No es posible establecer la conexión");

$usuario = $_POST['usuario'];
$contra = $_POST['contra'];
$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$carrera = $_POST['carrera'];
$puesto = $_POST['puesto'];

// attempt insert query execution
$sql = "INSERT INTO usuarios (usuario, contra, tipo, nombre, carrera, puesto) 
VALUES ('$usuario', '$contra', '$tipo', '$nombre', '$carrera', '$puesto')";

if(mysqli_query($link, $sql)){
	header ("Location: usuarios.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>