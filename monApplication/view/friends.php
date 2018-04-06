
			<div class="panel panel-primary col-sm-12">
				<div class=" row panel-heading">
					FRIENDS
				</div>
				<div class="row panel-body" style="overflow-y: scroll;min-height: 200px;max-height: 400px;" id="friendslist">
					<ul class="media-list">
						<?php foreach ($context->users as $user) {?>
							
							<?php if ($user->id != $context->userHost->id) {?>

								<li>
									<!--  <a href="<?php echo ($user->id)?>"> -->
									<a href="monApplication.php?action=index&id=<?php echo ($user->id)?>">
									<img width="40" class="img-circle" src="<?php echo filter_var($user->avatar, FILTER_SANITIZE_STRING)==null?"images/user.png":filter_var($user->avatar,FILTER_SANITIZE_STRING);?>">
									<?php echo $user->nom." ".$user->prenom; ?>
									</a>
								</li>
								
							<?php } ?>
						<?php } ?>
					</ul>
				</div>
				<div class="panel-footer">
					
				</div>
			</div>     
