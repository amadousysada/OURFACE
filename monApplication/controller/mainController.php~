<?php
/*
 * All doc on :
 * Toutes les actions disponibles dans l'application 
 *
 */

class mainController
{

	public static function helloWorld($request,$context)
	{
		$context->mavariable="hello world";
		return context::SUCCESS;
	}


	public static function index($request,$context)
	{
		$context->setLayout("layout");
		
		$context->chats = chatTable::getChats();
		$context->alert="success";
		$context->notification="Bonjour ". $context->getSessionAttribute('user')->nom;
		$context->userHost=$context->getSessionAttribute('user');
		$context->user=null;
		if(key_exists("id", $_REQUEST)){
			$context->user=utilisateurTable::getUserById($_REQUEST['id']);
		}
		else {
			$context->user=utilisateurTable::getUser($context->userHost);
			}
			
		
		$context->messages =$context->user->messages;
		$context->users=utilisateurTable::getUsers();
		
		$context->chatcount  = chatTable::getTotalChats();
		$context->setSessionAttribute('chatcount',$context->chatcount);
		
		return context::SUCCESS;
	}
	
	public static function login($request,$context)
	{
		$context->show='hidden';
		if(isset($_POST['username']) && isset($_POST['password'])){
	
			$utilisateur=utilisateurTable::getUserByLoginAndPass($_POST['username'],$_POST['password']);
			if ($utilisateur!=false) {
				
				# code...
		
				$context->setSessionAttribute('user',$utilisateur);
				$context->redirect("monApplication.php?action=index&id=$utilisateur->id");
				
				
			}
			else{
				$context->setLayout("login_layout");
				$context->show='';
				$context->alert="danger";
				$context->notification="Erreur d'authentification";
			}
			
		
		}
		else $context->setLayout("login_layout");
		return context::SUCCESS;
	}

	public static function  getChats($request,$context)
	{
		$context->chats = chatTable::getChats();
		return context::SUCCESS;
	}
	public static function  showMessage($request,$context)
	{
		$user=utilisateurTable::getUserById($_REQUEST['id']);
		$context->messages=$user->messages;
		$context->show='hidden';
		return context::SUCCESS;
	}
	
	public static function logout($request,$context) {
		
		session_destroy ();
		return context::SUCCESS;
		
	}
	
	public static function addMessage($request,$context) {
		
		$post=new post();
		$post->texte=$_POST['texte'];
		$post->date=new DateTime('NOW');
		postTable::addPost($post);
		$user=$_SESSION['user'];
		$chat=new chat();
		$chat->post=$post;
		$chat->emetteur=utilisateurTable::getUser($user);

		chatTable::addChat($chat);
		return $chat;
		
	}
	
	public static function addPost($request,$context) {
		
		$post=new post();
		$post->texte=$_REQUEST['texte'];
		$post->date=new DateTime('NOW');
		$post->image=null;
		
		if(is_array($_FILES)) {
			$path="/images/posts/";
			$tmp = $_FILES['userImagePost']['tmp_name'];
			$path = ".".$path.$_FILES['userImagePost']['name'];
			if(move_uploaded_file($tmp,$path)) {
				$post->image=$path;
			}
		}
		postTable::addPost($post);
		$usersender=$_SESSION['user'];
		$msg=new message();
		$msg->post=$post;
		$msg->emetteur=utilisateurTable::getUser($usersender);
		$msg->destinataire=utilisateurTable::getUserById($_REQUEST['id']);
		$msg->parent=utilisateurTable::getUser($usersender);

		messageTable::addMessage($msg);
		
		return $msg;
		
	}
	public static function refreshProfilHost($request,$context) {
		
		$id=$_POST['texte'];
		$context->user=utilisateurTable::getUserById($id);
		$context->messages =messageTable::getMessages();
		return context::SUCCESS;
		
	}
	
	public static function updateStatus($request,$context) {
		
		$userF=$_SESSION['user'];
		$user = utilisateurTable::getUser($userF);
		$usertext = $_POST['texte'];
    	$user->statut=$usertext;
		$_SESSION['user']->statut=
		utilisateurTable::updateUser($user);
	   $_SESSION['user']->statut=$user->statut;
	   return $user;
		
	}
	public static function updatePhoto($request,$context) {
		
		$userF=$_SESSION['user'];
		$path="/images/";
		if(is_array($_FILES)) {
			if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
				$tmp = $_FILES['userImage']['tmp_name'];
				$path = ".".$path.$_FILES['userImage']['name'];
				if(move_uploaded_file($tmp,$path)) {
					
					
					$user = utilisateurTable::getUser($userF);
					$user->avatar=$path;
					utilisateurTable::updateUser($user);
					$_SESSION['user']->avatar=$user->avatar;
				}
				
			}
		}
		
		return $user;
	

	}
	

	public static function loadChat($request,$context) {

		$chat=chatTable::getTotalChats();
		$data = array();
 		$data['premier'] = $chat;
		$data['deuxieme']=$context->getSessionAttribute('chatcount');
      $_SESSION['chatcount']=$data['premier'];
		return $data;
	
	}
	public static function refreshChat($request,$context) {
		$chats =null;
		$total=chatTable::getTotalChats();
		$totalav=$_SESSION['chatcount'];
      $_SESSION['chatcount']=$total;
      
      if(($total-$totalav)>0) {
      	$chats=chatTable::getLastChat($total-$totalav);
      	
      }
      
		return $chats;
	
	}
	

	public static function QueryChat($request,$context) {

		$nb = $_GET['nb'];
		$chat=new chat();
		$chat=chatTable::getLastChat();
		
		var_dump($chat);
		
		return $chat;
	}

	public static function loadMessage($request,$context) {
		$msg=messageTable::getMessageById($_REQUEST['id']);
		
		return $msg;
	}
	
	public static function like($request,$context) {
		$msg=messageTable::getMessageById($_POST['msgid']);
		
		$msg->aime=$msg->aime+1;
		messageTable::addMessage($msg);
		
		return $msg->aime;
	}
	
	public static function share($request,$context) {
		$msg=messageTable::getMessageById($_POST['msgid']);
		
		$usersender=$_SESSION['user'];
		$msgN=new message();
		$msgN->post=$msg->post;
		$msgN->emetteur=utilisateurTable::getUser($usersender);
		$msgN->destinataire=utilisateurTable::getUser($usersender);
		$msgN->parent=$msg->parent;


		messageTable::addMessage($msgN);
		
		return $msgN->parent->nom;
	}

}
?>