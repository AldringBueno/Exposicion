<?php

$servidor = "localhost";
$user = "root";
$pass = "root";
$db = "act_extra";

$link=mysqli_connect($servidor, $user, $pass,$db) OR DIE ("Error: No es posible establecer la conexión");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$primer_ap = $_POST['primer_ap'];
$segundo_ap = $_POST['segundo_ap'];
$telefono = $_POST['telefono'];
$num_cont = $_POST['num_cont'];
$semestre = $_POST['semestre'];
$carrera = $_POST['carrera'];
$actividad = $_POST['actividad'];

// attempt insert query execution
$sql = "UPDATE alumnos SET nombre='$nombre', ap_paterno='$primer_ap', ap_materno='$segundo_ap', actividad='$actividad', semestre='$semestre', carrera='$carrera', tel='$telefono', num_cont='$num_cont' WHERE id='$id'";

if(mysqli_query($link, $sql)){
	header ("Location: buscar_alumno.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>