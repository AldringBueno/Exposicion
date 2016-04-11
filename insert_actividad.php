<?php

$servidor = "localhost";
$user = "root";
$pass = "root";
$db = "act_extra";

$link=mysqli_connect($servidor, $user, $pass,$db) OR DIE ("Error: No es posible establecer la conexión");

$actividad = $_POST['actividad'];
$instructor = $_POST['instructor'];
$dias = $_POST['dias'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];

// attempt insert query execution
$sql = "INSERT INTO actividades (actividad, instructor, dias, hora, lugar) 
VALUES ('$actividad', '$instructor', '$dias', '$hora', '$lugar')";

if(mysqli_query($link, $sql)){
	header ("Location: agregar_actividad.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>