<?php

//nom de l'application
$nameApp = "monApplication";

// Inclusion des classes et librairies
require_once 'lib/core.php';
require_once $nameApp.'/controller/mainController.php';
session_start();
//action par défaut
$action = "index";

if(key_exists("action", $_REQUEST))
	$action =  $_REQUEST['action'];



$context = context::getInstance();
$context->init($nameApp);

$user = $_SESSION['user'] ;
if(!isset($user) || $user == NULL){
	$action = "login" ;
}

if($action=="logout") {
	$view=$context->executeAction($action, $_REQUEST);
	
	echo $nameApp."/view/login".$view.".php";
}

if($action=="addMessage") {
	$data=$context->executeAction($action, $_REQUEST);
	
	echo json_encode($data);
}

if($action=="addPost") {
	
	$data=$context->executeAction($action, $_REQUEST);
	
	echo json_encode($data);
}
if($action=='refreshProfilHost'){
	$view=$context->executeAction($action, $_REQUEST);
	echo json_encode($context->user);
}
if($action=="updateStatus") {

	$view =$context->executeAction($action, $_REQUEST);
	echo json_encode($view);

} 
if($action=="updatePhoto") {
	$view = $context->executeAction($action, $_REQUEST);
	echo json_encode($view);

}
if($action=="loadChat") {
	
  $data= $context->executeAction($action, $_REQUEST);

   echo json_encode($data);
	
}

if($action=="loadMessage") {
	
   $data = $context->executeAction($action, $_REQUEST);
   echo json_encode($data);
	
}

if($action=="QueryChat") {
	
   $data = $context->executeAction($action, $_REQUEST);
   echo json_encode($data);
	
}
if($action=="refreshChat") {
	
   $data = $context->executeAction($action, $_REQUEST);
   
   echo json_encode($data);
	
}

if($action=="loadLastPostImageTemp") {
	
	$chemin = $context->executeAction($action, $_REQUEST);
   echo $chemin;

}

if($action=="like") {
	$likes = $context->executeAction($action, $_REQUEST);
   echo $likes;

}

if($action=="share") {
	$post = $context->executeAction($action, $_REQUEST);
   echo $post;

}

?>