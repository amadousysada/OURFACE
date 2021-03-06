<?php

/* AUTEUR SY AMADOU */

Use Doctrine\Common\Collections\ArrayCollection;
/** 
 *  @Entity
 *  @table(name="fredouil.utilisateur")
 */
class utilisateur{

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/** @Column(type="string", length=45) */ 
	public $identifiant;
		
	/** @Column(type="string", length=45) */ 
	public $pass;

	/** @Column(type="string", length=45) */ 
	public $nom;

	/** @Column(type="string", length=45) */ 
	public $prenom;

	/** @Column(type="string", length=100) */ 
	public $statut;

	/** @Column(type="string", length=200) */ 
	public $avatar;

	/** @Column(type="datetime", length=4000) */ 
	public $date_de_naissance;

	/**
	* @OneToMany(targetEntity="message",mappedBy="destinataire")
	* @OrderBy({"id"="DESC"})
	*/
	public $messages;
	
	
	public function __construct() {
        $this->messages = new ArrayCollection();

    }
	
}

?>
