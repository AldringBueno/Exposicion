<?php

$servidor = "localhost";
$user = "root";
$pass = "root";
$db = "act_extra";

$link=mysqli_connect($servidor, $user, $pass,$db) OR DIE ("Error: No es posible establecer la conexión");

$nombre = $_POST['nombre'];
$primer_ap = $_POST['primer_ap'];
$segundo_ap = $_POST['segundo_ap'];
$telefono = $_POST['telefono'];
$num_cont = $_POST['num_cont'];
$semestre = $_POST['semestre'];
$carrera = $_POST['carrera'];
$actividad = $_POST['actividad'];

// attempt insert query execution
$sql = "INSERT INTO alumnos (nombre, ap_paterno, ap_materno, actividad, semestre, carrera, tel, num_cont) 
VALUES ('$nombre', '$primer_ap', '$segundo_ap', '$actividad', '$semestre', '$carrera', '$telefono', '$num_cont')";

if(mysqli_query($link, $sql)){
	header ("Location: agregar_alumno.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>