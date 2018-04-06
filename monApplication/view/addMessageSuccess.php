<section class="panel panel-default">
    <header class="panel-heading">MON APPLI</header>
      <section class="panel-body">
        <p>showMessages</p>
      </section>
 
      <?php foreach($context->messages as $message) {?>
	<?php if($message->post!=null) {?>
	Message de <?php echo $message->destinataire->nom ?> (destinataire) : (nom) <?php echo $message->destinataire->nom ?> (prenom) <?php echo $message->destinataire->prenom ?> (identifiant) <?php echo $message->destinataire->identifiant ?> (date) 24-03-91</br>
	--><?php echo $message->post->texte;echo " ecrit par ".$message->emetteur->nom;echo " à destination de ".$message->destinataire->nom;if($message->parent!=null)echo " (le parent étant : ".$message->parent->nom.")" ?></br>

<?php
}}
?>
</section>