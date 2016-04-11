<?php
session_start();
?>
<html >
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Iniciar Sesión</title>
		<link rel="stylesheet" href="css/materialize.min.css">
		<link rel="stylesheet" href="css/estilo-btn-input-field.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

		<style type="text/css">
			body {
	        	font-family: Georgia, "Times New Roman", serif;
	        	color: #fff;
	        	background-color: #81c784;
	        	background: url(images/body.jpg) no-repeat center center fixed;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
	      	}
	      	.btn{
				background-color: #81c784;
			}
			.btn:hover{
				background-color: #81c784;
			}	
		</style>
	</head>
	<body>
		<br>
		<br>
		<br>
		<br>
		<br>

<div class="container">
	<div class="container">
		<div class="container">
			<div class="card-panel teal darken-4">
<center>
				<?php
				if(isset($_SESSION['user'])){
					echo "<h1><font color='#fff'>Sesión iniciada</h1>";
					echo "<h4><br>" . $_SESSION['user'].", actualmente tienes una sesión iniciada.</font></h4>";
					?>
					<br>
					<br>
					<br>
					<button onclick="location.href='cerrarsesion.php';" class="btn waves-effect green darken-4" type="submit" name="entrar">Cerrar Sesión
						    <i class="material-icons right">power_settings_new</i>
						</button>
						<br>
						<br>

						<button onclick="location.href='sistema.php';" class="btn waves-effect green darken-4" type="submit" name="entrar">Ir al sistema
						    <i class="material-icons right">send</i>
						</button>
						<br>
						<br>
						<?php
				}else {
				?>

				<font color="#fff"><h2><b>Iniciar Sesión</b></h2></font>
				<div class="row">
					<form action="iniciar_sesion_2.php" class="pure-form" method="post">
						<div class="col s12" align="left">
							<i class="material-icons left">account_circle</i>
							<label><font color="#fff" size="4">Nombre de usuario:</font></label>
          					<input id="user" name="user" type="text">
          				</div>
          				<br><br><br><br><br>
          				<div class="col s12" align="left">
          					<i class="material-icons left">warning</i>
          					<label><font color="#fff" size="4">Contraseña:</font></label>
          					<input id="pass" name="pass" type="password">
        				</div>

        				<button class="green darken-4 btn waves-effect waves-light" type="submit" name="entrar">Entrar
						    <i class="material-icons right">perm_identity</i>
						</button>
					</form>
			<?php
				}
			?>

				</div>
				</center>
				</div>
			</div>
		</div>
	</div>
</div>
		<!--Adjuntando lo archivos js-->
		<script src="js/jquery.min.js"></script>
		<script src="js/materialize.min.js"></script>
	</body>
</html>

