<?php
//AUTEUR =GADIGBE KOSSI GABY

	require_once "post.class.php";

	class postTable {

		public static function getPosts(){
			$em = dbconnection::getInstance()->getEntityManager() ;
			
			$posts = $em->getRepository('post')->findAll();
			
			return $posts;
		}
		public static function addPost($post){
  	$em = dbconnection::getInstance()->getEntityManager() ;
	//printf($chat->date->format(Y-m-d));
	$em->persist($post);
	$em->flush();	
	
  }
		
	}
?>