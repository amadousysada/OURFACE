<?php

/* AUTEUR SY AMADOU */


	class messageTable {

		public static function getMessages(){
			$em = dbconnection::getInstance()->getEntityManager() ;
			
			$messages = $em->getRepository('message')->findAll();
			
			return $messages;
		}
		
		public static function getMessageById($id){
			$em = dbconnection::getInstance()->getEntityManager() ;
			
			$message = $em->getRepository('message')->findOneById($id);
			
			return $message;
		}
		
		public static function addMessage($msg){
			$em = dbconnection::getInstance()->getEntityManager() ;
			$em->persist($msg);
			$em->flush();
		}
		
	}
?>