$(function () {
	
	
	//Afficher la fenetre modal pour edition de statut
	$('#myBtn').click(function(){
		$('#myModal').modal();
		});
		
	//Fermer la fenetre modal après click sur le bouton de sauvegarde des modifications
	$('#save').click(function(){
        $('#myModal').modal('toggle');
    });
    
    //envoyer donnée saisie au dispatcher ajax pour la mise  jour dans la base de donnée après soumission du formulaire formstatus

	$('#formstatus').submit(function (e){
		e.preventDefault();
		statut = $('#formstatus').find( "textarea[name='status']" ).val();
		$.post(
			'ajax_dispatcher.php',
			{
				action:'updateStatus',
				texte:statut,
			},
			function (data) {
				var userS=jQuery.parseJSON(data);
				//Mise à jour du satut en raffraichissant la zone concernée
				$('#statut_context').html('"'+userS.statut+'"');
				$('#notifications').notify("Status mis a jour","success");		
			},

		);
	});


	var functionUp = function(e) {
   	//...
   	e.preventDefault();
  		//formdata = new FormData($('form').get(0));
  		var fd = new FormData();    
		//fd.append( 'file', $('form')[0].files[0]);
		var data;

    	data = new FormData($('form').get(0));
    	//data.append('file', $('#file')[0].files[0]);
    	$('#profilUser > .img').html('<img width="40" class="img-circle col-sm-offset-3" src="images/loader.gif">');
		$.ajax({
    		url : "ajax_dispatcher.php?action=updatePhoto",
    		type: "POST",
    		data : data,
    		processData: false,
    		contentType: false,
    		success:function(data, textStatus, jqXHR){
    			var user=jQuery.parseJSON(data);
				var image;
				if (user.avatar!=null) {
					image='<img width="90" src="'+user.avatar+'" class="col-sm-offset-3 img-circle">';
				}
				else {
					image='<img width="90" src="images/user.png" class="col-sm-offset-3 img-circle">';
				}
				eleUser='<form id="formupload" ENCTYPE="multipart/form-data">'+
          			'<input type="file" id="upload-file" name="userImage">'+    
        			'</form>'+
					'<a href="#" id="upload"><span style="color: #587096;" class="glyphicon glyphicon-camera" ></span></a>'+
					$('#profilUser > .img').html(image);
					$('#navbarColor01 > ul > li > ul > #lip').html('<a href=""><img width="50" class="img-circle"src="'+user.avatar+'"></a>');
					$('#notifications').notify("Photo profil mis a jour","success");
			},
    		error: function(jqXHR, textStatus, errorThrown){
        		//if fails     
    		}
		});
	}


	$('#upload').on('click',function(e){
		e.preventDefault();
		$('#upload-file:hidden').trigger('click');
	});
	
	$('#upload-file').change(functionUp);
	$('#formphoto').submit(functionUp);


	var refresh_tchat=function () {
		
		$.ajax({
			url : "ajax_dispatcher.php?action=refreshChat",
			type: "POST",
			processData: false,
    		contentType: false,
    		success	  : function (data, textStatus, jqXHR) {
    			
    			var chatarray=jQuery.parseJSON(data);
    			
    			if (chatarray!=null) {
    				
    				//alert(chat);
    				//alert(chat.emetteur);
    				var i=chatarray.length;
    				//alert(chatarray.length);
    				for (j=i-1;j>=0;j--) {
    			
            		//alert(j + ": " + JSON.stringify(chatarray[j]));
            		var chat=chatarray[j];
            		var chap1='<li class="list-inline-item tmp"></li>';
            		var chatp='<div class="msj macro liL">'+
                        			'<div>'+
                        				'<ul class="avatar list-inline">'+
                        				'<li class="list-inline-item"><img class="img-circle" style="width:15%;" src="'+chat.emetteur.avatar+'" /></li>'+
                        				'<li class="list-inline-item em"><p><small>'+chat.post.date.date+'</small></p></li>'+
                        				'<li class="list-inline-item"><p><small>@'+chat.emetteur.identifiant+'</small></p></li>'+
                        				
                        			'</ul></div>'+
                            		'<div class="text text-l">'+
                                		'<p style="word-wrap:break-word;width:200px;">'+chat.post.texte+'</p>'+
                                		
                            		'</div>'+
                        		'</div>';
                  $('.chl').append(chap1);
						$('.chl > .tmp').html(chatp);
						$('.chl > .tmp').toggleClass('tmp');
						$('.chl').animate({scrollTop: 50000000000}, 'slow');
        			}
        			
    				
					}
    			
    		
    		},
    		error		  : function (data, textStatus, jqXHR) {}
			
		
		});
	
	
	}

	setInterval(refresh_tchat, 3000);
	
	$('#test').click(refresh_tchat);


	$('#chat').click(function(){
		$('#chatbox').css('display','inline');
		$('#maxi-chat').css('display','none');
		$('#minim-chat').css('display','inline');
		$('#chat_view').draggable({enabled:true});
		$('.chl').animate({scrollTop: 50000000000}, 'slow');
		
	
	});
	
	$('#minim-chat').click(function(){
		$('#chat_view').draggable({disabled:true});
		$('#chatbox').css({'width':'25%','bottom':'-498px','right':'15px','position':'fixed'});
		$('#maxi-chat').css('display','inline');
		$('#minim-chat').css('display','none');

	
	});
	
	$('#maxi-chat').click(function(){
		$('#chatbox').css({'margin-top':'0','width':'100%','float':'right','position':'absolute'});
		$('#maxi-chat').css('display','none');
		$('#minim-chat').css('display','inline');
		$('#chat_view').draggable({disabled:false});
	
	
	});
	
	$('#close-chat').click(function(){
		$('#chatbox').css('display','none');
		$('#chatbox').css({'margin-top':'0','width':'100%','position':'absolute'});
		
	
	});
	$('#Message').keyup(function () {
		if ($('#Message').val()!="") {
			$('#sendMessage').prop('disabled',false);
		}
		else {
			$('#sendMessage').prop('disabled',true);
		}
		
	});
	
	$('#formChat').submit(function (e){
			e.preventDefault();
			//$('.chl > .tmp').html('<strong>wait for few ms</strong><img width="40" class="img-circle col-sm-offset-3" src="images/loader.gif">');
			msg = $('#formChat').find( "textarea[name='msg']" ).val();
		$.post(
			'ajax_dispatcher.php',
			{
				action:'addMessage',
				texte:msg,
			},
			function (data) {
				//alert(data);
				var chat=jQuery.parseJSON(data);
				var chatp='<li class="list-inline-item">'+
                        		'<div class="msj macro liL">'+
                        			'<div>'+
                        				'<ul class="avatar list-inline">'+
                        				'<li class="list-inline-item"><img class="img-circle" style="width:15%;" src="'+chat.emetteur.avatar+'" /></li>'+
                        				'<li class="list-inline-item em"><p><small>'+chat.post.date.date+'</small></p></li>'+
                        				'<li class="list-inline-item"><p><small>@'+chat.emetteur.identifiant+'</small></p></li>'+
                        				
                        			'</ul></div>'+
                            		'<div class="text text-l">'+
                                		'<p style="word-wrap:break-word;width:200px;">'+chat.post.texte+'</p>'+
                                		
                            		'</div>'+
                        		'</div>'+
                   			'</li>';
            $('#Message').val("");
				
			},
		);
	} );

});
