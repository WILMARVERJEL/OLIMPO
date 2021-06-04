<?php
include_once 'librerias/user.php';
include_once 'librerias/user_session.php';

$userSession = new UserSession();
$user = new User();

 if(isset($_SESSION['user'])){
 	//echo "hay session";
 	$user->setUser($userSession->getCurrentUser());
 	include_once 'view/index.php';
 }else if (isset($_POST['email']) && isset($_POST['password'])){
 	//echo "validacion de login";
 	$userForm = $_POST['email'];
 	$passForm = $_POST['password'];

 	if($user->userExists($userForm, $passForm)){
 		//echo "Usuario Valido";
 		$userSession->setCurrentUser($userForm);
 		$user->setUser($userForm);
 		include_once 'view/index.php';
 	}else{
 		//echo "Email y/o Password Incorrecto";
 		$errorLogin = "Email y/o Password Incorrecto";
 		include_once 'view/login.php';	
 	}
 }else{
 	//echo "login";
 	include_once 'view/login.php'; 
 }
?>

