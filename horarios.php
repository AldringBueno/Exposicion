<?php
session_start();
?>
<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Horarios</title>
		<link rel="stylesheet" href="css/materialize.min.css">
		<link rel="stylesheet" href="css/estilo-btn-input-field.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		
		<nav class="green darken-4">
		    <div class="nav-wrapper">
		      <ul id="nav-mobile" class="left hide-on-med-and-down">
		        <li><a href="principal.html">Página Principal</a></li>
		        <li><a href="horarios.php">Horarios</a></li>
		        <li><a href="galeria.html">Galeria</a></li>
		      	<li><a href="iniciar_sesion.php">Iniciar Sesión</a></li>
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
			<div class="white"><br>
				<center>
					<img src="images/itszo.jpg"><br><br><br>
				</center>

				<div class="row">

    			<?php
					error_reporting( error_reporting() & ~E_NOTICE );

					$link=mysqli_connect("localhost", "root", "root","act_extra") OR DIE ("Error: No es posible establecer la conexión");

					$sql = "SELECT * FROM actividades";

					$result = mysqli_query($link, $sql);
					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_array($result)){
				?>
				

					<div class="col s12 m4">
			          <div class="card green darken-4">
			            <div class="card-content white-text">
			            	<center>
			              	<span class="card-title"><b><?php echo $row['actividad'];?></b></span><br>
			              	<p><b>Instructor: </b><?php echo $row['instructor'];?><br>
			                <b>Días: </b><?php echo $row['dias'];?><br>
			                <b>Lugar: </b><?php echo $row['lugar'];?><br>
			                <b>Hora: </b><?php echo $row['hora'];?></p><br>
			              </center>
			            </div>
			          </div>
			        </div>
				
				<?php
					}
				}
				?>
				</div>
	<br><br></div>
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
			$('select').material_select();
			$('.datepicker').pickadate();
			$(document).ready(function(){
		    $('.collapsible').collapsible({
		      accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		    });
		  });
				});
		</script>
	</body>
</html>

