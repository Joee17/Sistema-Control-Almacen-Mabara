<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="login.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="icon" href="favi.ico" type="image/png">

<!------ Include the above in your HEAD tag ---------->
<?php
	$error[1]="El usuario no esta activo.";
	$error[2]="Usuario o Contraseña incorrecto.";
	$error[3]="Ingrese Usuario";
	$error[4]="Ingrese Contraseña";
?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="logo.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="sesion.php" method="post" >
      <input type="text" id="login" class="fadeIn second" name="txtusuario" placeholder="usuario">
      <input type="password" id="password" class="fadeIn third" name="txtpassword" placeholder="contraseña">
      
      <input type="submit" class="fadeIn fourth" value="Ingresar">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
    <?php
	if(isset($_GET['e'])){
		echo $error[$_GET['e']];
	}
	?>
    </div>

  </div>
</div>