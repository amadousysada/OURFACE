<?php

/* AUTEUR SY AMADOU */

// Inclusion de la classe utilisateur
require_once "utilisateur.class.php";

class utilisateurTable {

  public static function getUserByLoginAndPass($login,$pass){
  	$em = dbconnection::getInstance()->getEntityManager() ;

	$user = $em->getRepository('utilisateur')->findOneBy(array('identifiant' => $login, 'pass' => sha1($pass)));
	
	return $user; 
  }
  
  public static function getUser($user){
  	$em = dbconnection::getInstance()->getEntityManager() ;

	$user = $em->getRepository('utilisateur')->findOneBy(array('identifiant' => $user->identifiant, 'pass' =>$user->pass));
	
	return $user; 
  }
  
  public static function getUsers(){
  	$em = dbconnection::getInstance()->getEntityManager() ;

	$users = $em->getRepository('utilisateur')->findAll();	
	
	return $users; 
  }
  
  public static function getUserById($id){
  		$em = dbconnection::getInstance()->getEntityManager() ;

		$user = $em->getRepository('utilisateur')->findOneById($id);	
	
		return $user; 
  }
  public static function updateUser($user){
    	$em = dbconnection::getInstance()->getEntityManager() ;
	 	$em->persist($user);
    	$em->flush();

   
	}

 
}

?>
