<?php

/* AUTEUR SY AMADOU */

	/**
	* @Entity
	* @table(name="fredouil.message") 
	*/
class message{
	/** 
	* @Id @Column(type="integer")
	* @GeneratedValue
	*/
	public $id;
	

	/**
	* @ManyToOne(targetEntity="utilisateur")
	* @JoinColumn(name="emetteur",referencedColumnName="id")
	*/
	public $emetteur;
	
	
	/**
	* @ManyToOne(targetEntity="utilisateur",inversedBy="messages")
	* @JoinColumn(name="destinataire",referencedColumnName="id")
	*/
	public $destinataire;


	/**
	* @ManyToOne(targetEntity="utilisateur")
	* @JoinColumn(name="parent",referencedColumnName="id")
	*/
   public $parent;


   /**
	* @ManyToOne(targetEntity="post")
	* @JoinColumn(name="post",referencedColumnName="id")
	* @OrderBy({"texte"="ASC"})
	*/
	
 	public $post;


 	/**
	* @Column(type="integer",nullable=true)
	*/
 	public $aime;
	
}

?>


