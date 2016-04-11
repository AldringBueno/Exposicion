<?php
session_start();
?>
<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Agregar Usuario</title>
		<link rel="stylesheet" href="css/materialize.min.css">
		<link rel="stylesheet" href="css/estilo-btn-input-field.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		
		<ul id="lista_admin" class="dropdown-content">
		  <li><a href="agregar_alumno.php">Agregar Alumno</a></li>
		  <li><a href="buscar_alumno.php">Buscar Alumno</a></li>
		  <li><a href="actividades.php">Actividades</a></li>
      	  <li><a href="agregar_actividad.php">Agregar Actividad</a></li>
      	  <li><a href="usuarios.php">Usuarios</a></li>
		  <li><a href="cerrarsesion.php">Salir</a></li>
		</ul>
		
		<nav class="green darken-4">
		    <div class="nav-wrapper">
		      <ul id="nav-mobile" class="right hide-on-med-and-down">
		        <li><a href="sistema.php">Inicio</a></li>
		        
		        <li><a href="listas.php">Listas</a></li>
		        <li><a class="dropdown-button" href="#!" data-activates="lista_admin">
		        	<?php echo $_SESSION['user'] ?>
		        	<i class="material-icons right">arrow_drop_down</i></a></li>
		      </ul>
		    </div>
  		</nav>
  		<style>
  		body{
				background: url(images/body.jpg) no-repeat center center fixed;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;


				display: flex;
			    min-height: 100vh;
			    flex-direction: column;
				}
				main {
				    flex: 1 0 auto;
				  }
  		</style>
  	</head>
  	<main>
	<body>
			<div class="container white"><br>
					<!--Formulario de contacto-->
					<center><div><h5><b><font color="#1b5e20">Agregar un nuevo usuario</font></b></h5>
						<div><h7><b><font color="#1b5e20">Los campos con * son campos obligatorios</font></b></h7><br><br></center>
						<div class="container">
							<form action="insert_usuario.php" class="pure-form pure-form-stacked" method="post">
							    <fieldset>
							        <label for="usuario">Nombre de usuario*:</label>
							        <input id="usuario" name="usuario" type="text" required>

							        <label for="contra">Contraseña*:</label>
							        <input id="contra" name="contra" type="text" required>

							        <label for="tipo">Tipo de usuario*:</label>
							        <select id="tipo" name="tipo" required>
							            <option value="Normal">Normal</option>
							            <option value="Administrador">Administrador</option>
							        </select>

							        <label for="nombre">Nombre*:</label>
							        <input id="nombre" name="nombre" type="text" required>

							        <label for="carrera">Carrera*:</label>
							        <select id="carrera" name="carrera" required>
							        	<option disabled selected>Seleccione una opcion</option>
							            <option value="ISC">Ing. Sistemas Computacionales</option>
							            <option value="IND">Ing. Industrial</option>
							            <option value="IGE">Ing. Gestión Empresarial</option>
							            <option value="IGEED">Ing. Gestión Empresarial Educación a Distancia</option>
							            <option value="IGEEDS">Ing. Gestión Empresarial Educación a Distancia sede Sain Alto</option>
							            <option value="MINAS">Técnico Superior en Minería</option>
							            <option value="INF">Ing. Informática</option>
							            <option value="ADMON">Lic. Administración</option>
							            <option value="CPDC">Coordinadora de Promoción Deportiva y Cultural</option>
							            <option value="alumno">Alumno</option>
							        </select>

							        <label for="puesto">Puesto*:</label>
							        <input id="puesto" name="puesto" type="text" required>

							        <br>
							        <center><button type="submit" class="green darken-4 pure-button pure-button-primary">Guardar Usuario</button><br><br></center>
							    </fieldset>
							</form>
						</div>
					</div>
					<!--Fin del formulario de contacto-->
			<br></div>

			
</main>
<!--Pie de pagina-->
<footer class="page-footer green darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Contacto</h5>
                <p class="grey-text text-lighten-4">Av. Tecnológico 2000 Col. La Perla, Sombrerete Zacatecas.<br>Tels:<br>01 433 93 5 22 01 y 93 5 22 02</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <center>
                	<a href="https://www.facebook.com/Deportes-y-Cultura-ITSZO-673018056094238/?fref=ts"><img height="150" src="images/deportes.jpg"></a>
            	</center>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div align="right" class="container">
            © 2016 ITSZO All rights reserved.
		    Created by students of the race <a href="https://www.facebook.com/Sistemas-ITSZO-106636909366496/?fref=ts">ISC</a>
            </div>
          </div>
        </footer>

<!--Llamadas a los javascripts-->
		<script src="js/jquery.min.js"></script>
		<script src="js/materialize.min.js"></script>
		<script>
		$(document).ready(function(){
			$('.slider').slider({
				indicators: false
				});
		});
		</script>
	</body>
</html>

