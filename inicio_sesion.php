
<?php
session_start();

$_SESSION["idalmacen"]=$_POST['txtidalmacen'];




			header('Location: personal.php');


?>