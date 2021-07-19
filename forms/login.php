<?php 
session_start();

if (isset($_SESSION['user'])) {
	header('Location: ../index.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <title>Asociados - Iniciar Sesion</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>
  <body>
  	<div class="container">
  		<div class="forms-container">
  			<div class="signin-signup">
  				<div id="frmLogin" class="sign-in-form">
  					<h2 class="title">Iniciar Sesion</h2>
  					<div class="input-field">
  						<i class="fas fa-user"></i>
  						<input type="text" placeholder="Usuario" id="txtUser" name="txtUser" />
  					</div>
  					<div class="input-field">
  						<i class="fas fa-lock"></i>
  						<input type="password" placeholder="Contraseña" id="txtPass" name="txtPass" /><br>
  						<div class="msj" style="font-size: 12px;color: #EB0E0E"></div>
  					</div><br>
  					<button class="btn solid" id="btnIniciarSesion" name="btnIniciarSesion">Iniciar Sesion</button>

  				</div>

  			</div>
  		</div>

      
    </div>
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/login.js"></script>

  </body>
</html>

<?php	
}


 ?>