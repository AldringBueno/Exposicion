<?php
session_start();
?>
<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Buscar Alumno</title>
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
				<div class="container">
					<div><h4><b><font color="#1b5e20">Filtrar Búsqueda</font></b></h4>
					<form method="post">
						<div class="row">
							<div class="col s3">
								<select name="filtrar" id="filtrar">
							   		<option value="num_cont">Número de Control</option>
							   		<option value="nombre">Nombre</option>
							    </select>
							</div>
							<div class="col s5">
	          					<input id="buscar_alumno" name="buscar_alumno" type="text">
	        				</div>
							<div class="col s4" style="margin-top:0.5em">
		        				<button class="btn waves-effect waves-light green darken-4" type="submit">Buscar
								    <i class="material-icons right">search</i>
								</button>
							</div>
						</div>
        			</form>

    			<?php
					error_reporting( error_reporting() & ~E_NOTICE );

					$filtrar = $_REQUEST['filtrar'];
					$buscar_alumno = $_REQUEST['buscar_alumno'];

					$link=mysqli_connect("localhost", "root", "root","act_extra") OR DIE ("Error: No es posible establecer la conexión");

					if ($filtrar == 'num_cont'){
						$sql = "SELECT * FROM alumnos WHERE ".$filtrar."='".$buscar_alumno."'";
					}else if($filtrar == 'nombre'){
						$sql = "SELECT * FROM alumnos WHERE ".$filtrar." LIKE '%".$buscar_alumno."%'";
					}else{
						$sql = "SELECT * FROM alumnos";
					}
					$result = mysqli_query($link, $sql);
					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_array($result)){
							$modal = 1;
				?>
				<div class="row">
					<ul class="collapsible popout" data-collapsible="accordion">
					    <li>
					      <div class="collapsible-header"><i class="material-icons">perm_identity</i>
					      	<div class="col s8"><b><?php echo $row['nombre']." ".$row['ap_paterno']." ".$row['ap_materno'];?></b></div>
					      	<div class="col s3"><b><?php echo $row['semestre']." ".$row['carrera'];?></b></div></div>
							
							<div class="collapsible-body">
								<p>
									<table class="highlight">
								        <thead>
								          <tr>
								              <th><br>Campos<br><br></th>
								              <th><br>Información<br><br></th>
								          </tr>
								        </thead>

								        <tbody>
								          <tr>
								            <td><b><br>Actividad:</b><br><br></td>
								            <td><br><?php echo $row['actividad'];?><br><br></td>
								          </tr>
								          <tr>
								            <td><b><br>Número de Control: </b><br><br></td>
								            <td><br><?php echo $row['num_cont'];?><br><br></td>
								          </tr>
								          <tr>
								            <td><b><br>Semestre y Carrera: </b><br><br></td>
								            <td><br><?php echo $row['semestre']." ".$row['carrera'];?><br><br></td>
								          </tr>
								          <tr>
								            <td><b><br>Telefono: </b><br><br></td>
								            <td><br><?php echo $row['tel'];?></td>
								          </tr>
								        </tbody>
								      </table>
								      <center>
								      	<div class="row">
								      		<!--FORMULARIO EDITAR ALUMNO-->
								      		<div class="col s12">
										      	<form action="editar_alumno.php" method="post">
													<input id="id" name="id" type="hidden" value="<?php echo $row['id']?>">
													<center><button class="btn waves-effect waves-light green darken-4" type="submit">EDITAR ALUMNO
														    <i class="material-icons right">settings</i>
														</button></center>
												</form>
											</div>

								      		<!--FORMULARIO PARA CREAR CONSTANCIA-->
														<!--Ventana modal-->
														<div><br><br><br><br>
															<div class="container">
																	<center><h4><font color="#1b5e20"><b>Periodo</b></font></h4></center>
																<form action="constancia.php" method="post">
																	<input id="id" name="id" type="hidden" value="<?php echo $row['id']?>">
																<div class="input-field col s6">
																	<label>De:</label><br>
																	<select id="DeMes" name="DeMes" required>
															            <option value="enero">Enero</option>
															            <option value="febrero">Febrero</option>
															            <option value="marzo">Marzo</option>
															            <option value="abril">Abril</option>
															            <option value="mayo">Mayo</option>
															            <option value="junio">Junio</option>
															            <option value="jlio">Julio</option>
															            <option value="agosto">Agosto</option>
															            <option value="septiembre">Septiembre</option>
															            <option value="octubre">Octubre</option>
															            <option value="noviembre">Noviembre</option>
															            <option value="diciembre">Diciembre</option>
															        </select>
															    </div><br>
																<div class="input-field col s6">
																	<select id="DeAno" name="DeAno" required>
																		<?php 
																			date_default_timezone_set('America/Mexico_City');
       																		$year = date('Y');
       																		$aux = $year - 6;
       																		while($year>=$aux){
																		?>
																				<option value="<?php echo $aux; ?>"><?php echo $aux; ?></option>
																		<?php
																		$aux+=1;
																			}
																		?>
															        </select>
																</div>

																<div class="input-field col s6">
																	<label>Al:</label><br>
																	<select id="AlMes" name="AlMes" required>
															            <option value="enero">Enero</option>
															            <option value="febrero">Febrero</option>
															            <option value="marzo">Marzo</option>
															            <option value="abril">Abril</option>
															            <option value="mayo">Mayo</option>
															            <option value="junio">Junio</option>
															            <option value="julio">Julio</option>
															            <option value="agosto">Agosto</option>
															            <option value="septiembre">Septiembre</option>
															            <option value="octubre">Octubre</option>
															            <option value="noviembre">Noviembre</option>
															            <option value="diciembre">Diciembre</option>
															        </select>
															    </div>
																<div class="input-field col s6"><br>
																	<select id="AlAno" name="AlAno" required>
																		<?php 
																			date_default_timezone_set('America/Mexico_City');
       																		$year = date('Y');
       																		$aux = $year - 6;
       																		while($year>=$aux){
																		?>
																				<option value="<?php echo $aux; ?>"><?php echo $aux; ?></option>
																		<?php
																		$aux+=1;
																			}
																		?>
															        </select>
																</div>
																<button class="btn green darken-4 waves-effect waves-light" type="submit">CREAR CONSTANCIA</button>
																</form>
															</div>
														</div>
														<!--Fin de la vetana modal-->
												</div>
								      </center>
							    </p>
							</div>
						</li>
					</ul>
				</div>
				<?php
				$modal += 1;
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
			$('.modal-trigger').leanModal();
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

