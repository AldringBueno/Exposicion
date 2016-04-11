<?php
session_start();
?>
<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Agregar Alumno</title>
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
					<center><div><h5><b><font color="#1b5e20">Ingresa los datos que se indican</font></b></h5>
						<div><h7><b><font color="#1b5e20">Los campos con * son campos obligatorios</font></b></h7><br><br></center>
						<div class="container">
							<form action="insert_alumno.php" class="pure-form pure-form-stacked" method="post">
							    <fieldset>
							        <label for="nombre">Nombre(s)*:</label>
							        <input id="nombre" name="nombre" type="text" required>

							        <label for="primer_ap">Primer Apellido*:</label>
							        <input id="primer_ap" name="primer_ap" type="text" required>

							        <label for="segundo_ap">Segundo Apellido*:</label>
							        <input id="segundo_ap" name="segundo_ap" type="text" required>

							        <label for="num_cont">Número de Control:</label>
							        <input id="num_cont" name="num_cont" type="tel">

							        <label for="telefono">Telefono:</label>
							        <input id="telefono" name="telefono" type="tel">

							        <label for="semestre">Semestre*:</label>
							        <select id="semestre" name="semestre" required>
							        	<option disabled selected>Selecciona el Semestre</option>
							            <option value="1RO">1RO</option>
							            <option value="2DO">2DO</option>
							            <option value="3RO">3RO</option>
							            <option value="4TO">4TO</option>
							            <option value="5TO">5TO</option>
							            <option value="6TO">6TO</option>
							            <option value="7MO">7MO</option>
							            <option value="8VO">8VO</option>
							            <option value="9NO">9NO</option>
							            <option value="10MO">10MO</option>
							            <option value="11VO">11VO</option>
							            <option value="12VO">12VO</option>
							        </select>

							        <label for="carrera">Carrera*:</label>
							        <select id="carrera" name="carrera" required>
							        	<option disabled selected>Selecciona una Carrera</option>
							            <option value="ISC">Ing. Sistemas Computacionales</option>
							            <option value="IND">Ing. Industrial</option>
							            <option value="IGE">Ing. Gestión Empresarial</option>
							            <option value="IGEED">Ing. Gestión Empresarial Educación a Distancia</option>
							            <option value="IGEEDS">Ing. Gestión Empresarial Educación a Distancia sede Sain Alto</option>
							            <option value="MINAS">Técnico Superior en Minería</option>
							            <option value="INF">Ing. Informática</option>
							            <option value="ADMON">Lic. Administración</option>
							        </select>

							        <label for="actividad">Actividad*:</label>
							        <select id="actividad" name="actividad" required>
							        	<option disabled selected>Selecciona la Actividad</option>
							        	<?php
											error_reporting( error_reporting() & ~E_NOTICE );

											$link=mysqli_connect("localhost", "root", "root","act_extra") OR DIE ("Error: No es posible establecer la conexión");

											$sql = "SELECT * FROM actividades";

											$result = mysqli_query($link, $sql);
											if(mysqli_num_rows($result) > 0){
												while($row = mysqli_fetch_array($result)){
										?>
							            <option value="<?php echo $row['actividad'];?>"><?php echo $row['actividad'];?></option>
							            <?php
											}
										}
										?>
							        </select>
							        <br>
							        <center><button type="submit" class="green darken-4 pure-button pure-button-primary">Guardar Alumno</button><br><br></center>
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

