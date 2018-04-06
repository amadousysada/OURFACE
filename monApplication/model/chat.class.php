<?php

//AUTEUR =GADIGBE KOSSI GABY

	/**
	* @Entity
	* @Table(name="fredouil.chat")
	*/

class chat{

	/**
	* @Id @Column(type="integer")
	* @GeneratedValue
	*/
	public $id;


	/**
	* @OnetoOne(targetEntity="post",fetch="EAGER")
	* @JoinColumn(name="post", referencedColumnName ="id")
	*/
	public $post;
	
	
	/**
	* @ManytoOne(targetEntity="utilisateur",fetch="EAGER")
	* @JoinColumn(name="emetteur", referencedColumnName ="id")
	*/
	public $emetteur;



}

?>