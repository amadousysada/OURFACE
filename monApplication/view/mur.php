<div class="panel panel-primary" style="margin:0 10px 0 10px;">
		<div class="panel-heading">
		</div>
		<div class="panel-body">
		
    		<div class="row" >
        <div class="col-sm-12">
            <div class="[ panel panel-default ] panel-google-plus" style="overflow-y:scroll;max-height:475px;" >
            			<div class="panel-footer">
                    		<div class="input-placeholder">Poster un message...</div>
                		</div>
                		<div class="panel-google-plus-comment">
                    		<img class="img-circle" width="55" src="<?php echo ($context->userHost->avatar==null)?"images/user.png":$context->userHost->avatar; ?>" alt="User Image" />
                    		<div class="panel-google-plus-textarea">
                        		<textarea rows="4"></textarea>
                        		<span id="imageUploaded">
                        			<img id="previewimg" width="420"   src="">
                        		</span>
                        		
                        		<button type="submit" id="<?php echo ($context->user->id);?>" class="[ btn btn-success disabled ]">Post</button>
                        		<button type="reset" class="[ btn btn-default ]">Annuler</button>
                        		
                        		<span><a href="#" id="uploadimagePost"><span class="glyphicon glyphicon-picture" ></span><strong>Photo/Video</strong></a></span>
                    				<form id="formuploadPost" ENCTYPE="multipart/form-data">
          								<input type="file" id="uploadimFile" style="display:none;" name="userImagePost">    
        								</form>
                    		</div>
                    		<div class="clearfix"></div>
                		</div>
                		<div id="postid">
                			<?php foreach($context->messages as $msg){ 
                			if($msg->emetteur!=null && $msg->post!=null) {?>
                			<div style="border:1px solid #A8A8A8;margin-top:15px;" >
                				<div class="panel-heading">
                					<span class="row col-sm-4 col-md-4 col-lg-4" style="padding-right:10px;" >
											<img class="img-circle" width="55" src="<?php echo ($msg->emetteur->avatar==null)?"images/user.png":filter_var($msg->emetteur->avatar, FILTER_SANITIZE_STRING);?>" alt="Mouse0270" />
											<h4 class="">@<?php echo filter_var($msg->emetteur->nom, FILTER_SANITIZE_STRING);?></h4>
                					</span>

                    				<span class="row">
                    					
                    					<?php if($msg->parent!=null && $msg->parent->identifiant!=$msg->emetteur->identifiant) {?>
                    								<h5 class="col-sm-8 col-md-8 col-lg-8"><strong>SHARED</strong> -from @<strong><?php echo filter_var($msg->parent->nom, FILTER_SANITIZE_STRING);?></strong> <span><?php echo $msg->post->date->format(('d-m-Y h:m:s')); ?></span>
                    							<?php
                    							}
                    							else {?>
                    							

                    					<h5 class="col-sm-8 col-md-8 col-lg-8"><span>Publié le</span> - <span><?php echo $msg->post->date->format(('d-m-Y h:m:s')); ?></span> 
                    					<?php } ?>
                    				</span>
                    				
                				</div>
                				<div class="panel-body">
                					<span class="row col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
                						<p class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2" style="word-wrap:break-word"><?php echo filter_var($msg->post->texte, FILTER_SANITIZE_STRING);?></p>
                            		<img class="col-sm-offset-3 col-md-offset-3 col-lg-offset-3" width="300" class="" src="<?php echo filter_var($msg->post->image, FILTER_SANITIZE_STRING)==null?"":filter_var($msg->post->image,FILTER_SANITIZE_STRING);?>">
                					</span>
                					<span class="row col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
	                						<button type="reset" name="P<?php echo ($msg->id);?>" class="[	btn btn-default ]" id="sharePost"><i class="fa fa-share" style="font-size:15px;color:#587096"></i>share</button>
                        				<button  type="reset" name="<?php echo ($msg->id);?>" class="[ btn btn-default ]" id="likePost">
                        					<i class="fa fa-thumbs-o-up" style="font-size:15px;color:#587096"></i>like
                        					<span style="background-color:#587096;margin-left:5px;font-size:15px;color:white">
                        						<?php 
                        							if($msg->aime>0) {
                        								echo $msg->aime;
                        								}
                        						?>
                        					</span>
                        				</button>
                					</span>
                				</div>
                			</div>
                		
                		<?php } }?>
                		</div>
                		
            </div>

    		</div>
			</div>
		</div>

</div>


	