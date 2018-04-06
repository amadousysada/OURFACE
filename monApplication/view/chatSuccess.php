<div class="col-sm-3 hidden-xs panel panel-primary chatbox" id="chatbox">
	<div class="row panel-heading">
		<span class="chat-text">Ourface-Chat!</span>
		<div id="close-chat" >&times;</div>
		<div id="minim-chat" ><span class="minim-button">&minus;</span></div>
		<div id="maxi-chat" ><span class="maxi-button">&plus;</span></div>
	</div>
	<div class="row panel-body media-list">
			
		<ul id="zone_chat" class="list-inline chl" >
			
			
			<?php foreach($context->chats as $chat){
				if($chat->post->texte!="") {?>
					<li class="list-inline-item">
            			<div class="msj macro liL">
            				<div>
            					<ul class="avatar list-inline">
            						<li class="list-inline-item"><img class="img-circle" style="width:15%;" src="<?php echo ($user->avatar==null)?"images/user.png":$chat->emetteur->avatar; ?>" /></li>
            						<li class="list-inline-item em"><p><small><?php echo $chat->post->date->format(('d/m/Y')); ?></small></p></li>
            						<li class="list-inline-item"><p><small><?php echo ($chat->emetteur==null)?"":"@".$chat->emetteur->identifiant; ?></small></p></li>
            					</ul>
            				</div>
                			<div class="text text-l">
                    			<p style="word-wrap:break-word;width:200px;"><?php echo $chat->post->texte; ?></p>
                    		
                			</div>
            			</div>
       				</li>
			<?php }} ?>
		</ul>
				
	</div>
	<div class="row panel-footer">
		<form role="form" class="input-group" id="formChat" style="margin-top:0;">
			<input type="text" hidden="true" name="username" value="<?php echo $context->user->identifiant; ?>" />
			<input type="text" hidden="true" name="password" value="<?php echo $context->user->pass; ?>" />
			<textarea type="text" id="Message" name="msg" class="form-control" placeholder="Entrer Message" style="max-width:200px;max-height:95px;"></textarea>
			<span class="input-group-btn">
				<button class="btn btn-primary" type="submit" id="sendMessage" disabled="true">SEND</button>
			</span>
		</form>
	</div>
					
</div>