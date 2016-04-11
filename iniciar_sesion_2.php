<?php
$enlace = mysqli_connect("localhost", "root", "root", "act_extra") OR DIE ("Error al crear la conexión");
$usuario = $_POST["user"];   
$password = $_POST["pass"];

$result = mysqli_query($enlace, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
//Validamos si el nombre del administrador existe en la base de datos o es correcto
if($row = mysqli_fetch_array($result)){    
  //Si el usuario es correcto ahora validamos su contraseña
  if($row["contra"] == $password){
      session_start();  
      //Almacenamos el nombre de usuario en una variable de sesión usuario
      $_SESSION['user'] = $usuario;  
      //Redireccionamos a la pagina: index.php
      header("Location: sistema.php");  
  }
  else{
    //En caso que la contraseña sea incorrecta enviamos un msj y redireccionamos a login.php
      ?>
        <script languaje="javascript">
          alert("Nombre de usuario y/o contraseña incorrecta");
          location.href = "iniciar_sesion.php";
        </script>
      <?php
 }
}
else
{
 //en caso que el nombre de administrador es incorrecto enviamos un msj y redireccionamos a login.php
?>
 <script languaje="javascript">
  alert("Nombre de usuario y/o contraseña incorrecta");
  location.href = "iniciar_sesion.php";
 </script>
<?php
}
//Mysql_free_result() se usa para liberar la memoria empleada al realizar una consulta
mysqli_free_result($result);
mysqli_close($enlace);
?>