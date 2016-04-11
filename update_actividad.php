<?php

$servidor = "localhost";
$user = "root";
$pass = "root";
$db = "act_extra";

$link=mysqli_connect($servidor, $user, $pass,$db) OR DIE ("Error: No es posible establecer la conexión");

$id = $_POST['id'];
$actividad = $_POST['actividad'];
$instructor = $_POST['instructor'];
$dias = $_POST['dias'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];

// attempt insert query execution
$sql = "UPDATE actividades SET actividad='$actividad', instructor='$instructor', dias='$dias', hora='$hora', lugar='$lugar' WHERE id='$id'";

if(mysqli_query($link, $sql)){
	header ("Location: actividades.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>