<div style="border:1px solid #A8A8A8;margin-top:15px;">
	<div class="panel-heading">
		<span class="row col-sm-4 col-md-4 col-lg-4" style="padding-right:10px;" >
			<img class="img-circle" width="55" src="<?php echo ($msg->emetteur->avatar==null)?"images/user.png":filter_var($msg->emetteur->avatar, FILTER_SANITIZE_STRING);?>" alt="Mouse0270" />
			<h4 class="">@<?php echo filter_var($context->msg->emetteur->nom, FILTER_SANITIZE_STRING);?></h4>
		</span>
		<span class="row">
			<h5 class="col-sm-8 col-md-8 col-lg-8"><span>Publié le</span> - <span><?php echo $context->msg->post->date->format(('d-m-Y h:m:s')); ?></span> 
      </span>
   </div>
   <div class="panel-body">
      <span class="row col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
      	<p class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2" style="word-wrap:break-word"><?php echo filter_var($context->msg->post->texte, FILTER_SANITIZE_STRING);?></p>
         <img class="col-sm-offset-3 col-md-offset-3 col-lg-offset-3" width="300" class="" src="<?php echo filter_var($user->avatar, FILTER_SANITIZE_STRING)==null?"":filter_var($msg->post->image,FILTER_SANITIZE_STRING);?>">
      </span>
   </div>
</div>