<?php 
session_start();

if (isset($_SESSION['user'])) {
	header('Location: view/dashboard.php');
}else{
	header('Location: forms/login.php');
}


?>