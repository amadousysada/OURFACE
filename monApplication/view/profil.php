<div class="panel panel-primary" style="max-width:200px;">
		<div class="panel-heading">
		</div>
		<div class="panel-body" id="profilUser">
			<div class="row img">
				<img width="90" src="<?php echo ($context->user->avatar==null)?"images/user.png":$context->user->avatar; ?>" id="profiler" class="col-sm-offset-3 img-circle" style="position:relative;" >
				<?php if($context->user->id==$context->userHost->id) {?>
					<form id="formupload" ENCTYPE="multipart/form-data">
          			<input type="file" id="upload-file" name="userImage">    
        			</form>
					<a href="#" id="upload"><span style="color: #587096;" class="glyphicon glyphicon-camera" ></span></a>
				<?php } ?>
			</div>
  			<!-- Modal -->
  			<div id="modaldialog"  class="modal dialog" role="dialog">
    			<div class="modal-dialog">
    
      			<!-- Modal contenu-->
      			<div class="modal-content">
     
	  					<div class="modal-header">
        					<button type="button" class="close" data-dismiss="modal">&times;</button>
        					<h4 class="modal-title">Changer image de profil</h4>
      				</div>
      				<div class="modal-body">
           				<form role="form" id="formphoto">
        						<input id="urlprofil" name="urlprofil" type="text" class="form-control" value="<?php echo $context->user->avatar;?>" placeholder="Fournir un chemin absolu !!"/>
     						</form>
      				</div>
      				<div class="modal-footer">
        					<button type="submit" id="uploadimageprofil" class="btn btn-default" >Save</button>
        					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      				</div>
	   				
      			</div>
      
    			</div>
  			</div>
			<!-- Fin Modal -->
			
			<div class="info row">
				<div >
					<h3 class="col-sm-offset-3"><?php echo $context->user->nom." ".$context->user->prenom;?></br></h3>
					<h4 class="col-sm-offset-1"><?php echo "Né(e) le : ".$context->user->date_de_naissance->format('d-m-Y');?></br></h4>
				    <h3 id="statut_context" class="text-center" style="font-family:Brush Script MT; ">"<?php echo $context->user->statut;?>"</h3>

				</div>
				
			</div>
			<?php if($context->user->id==$context->userHost->id) {?>
 				<p class="text-center">
        			<a href="#" id="myBtn">
          			<span class="glyphicon glyphicon-edit">&nbsp;Modifier</span>
        			</a>
 				</p>
 			<?php } ?>
  <!-- Modal -->
  <div class="modal fade"  class="window" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal contenu-->
      <div class="modal-content">
     
	 <div class="myheader " >
           <a class="col-sm-offset-4" style="font-size:20px;text-decoration:none;" >Ajouter un statut</a> 
        </div>
	
        <div class="modal-body" >
          <form role="form" id="formstatus">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Statut</label>
              <textarea rows="4" cols="4" name="status" class="form-control"><?php echo $context->user->statut;?></textarea>
            </div>
          
              <button id="save" type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> Enregistrer</button>
          </form>
        </div>
	
        <div class="modal-footer">
           <button   class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
        </div>
      </div>
      
    </div>
  </div> 
		</div>
        </div>

	
