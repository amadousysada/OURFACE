$(function () {
	
	var loadLastPost=function (msg) {
		
		var longDateFormat  = 'dd-MM-yyyy HH:mm:ss';
    	image="images/user.png";
    	if (msg.emetteur.avatar !=null) {
    		image=msg.emetteur.avatar;
    	}
    	postdiv='<div style="border:1px solid #A8A8A8;margin-top:15px;">'+
    					  '<div class="panel-heading">'+
    					  '<span class="row col-sm-4 col-md-4 col-lg-4" style="padding-right:10px;" >'+
    					  '<img class="img-circle" width="55" src="'+image+'" alt="profilImage" />'+
						  '<h4 class="">@'+msg.emetteur.nom+'</h4>'+
						  '</span>'+
						  '<span class="row">'+
						  '<h5 class="col-sm-8 col-md-8 col-lg-8"><span>Publié le</span> - <span>'+msg.post.date.date+'</span>'+
      				  '</span>'+
   					  '</div>'+
   					  '<div class="panel-body">'+
      				  '<span class="row col-sm-offset-3 col-md-offset-3 col-lg-offset-3">'+
      				  '<p class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2" style="word-wrap:break-word">'+msg.post.texte+'</p>'+
         			  '<img class="col-sm-offset-3 col-md-offset-3 col-lg-offset-3" width="300" class="" src="'+msg.post.image+'">'+
      				  '</span>'+
   					  '</div>'+
						  '</div>';
    	$('#postid').before(postdiv);
    	
	}


	$('#uploadimagePost').on('click',function (e) {
		e.preventDefault();
		$('#uploadimFile:hidden').trigger('click');
	});

	$('#uploadimFile').change(function () {
	
		if (this.files && this.files[0]) {
			var reader = new FileReader();
			reader.onload = imageIsLoaded;
			reader.readAsDataURL(this.files[0]);
		}
	
	});

	var imageIsLoaded=function (e) {
	//$('#message').css("display", "none");
		$('#imageUploaded').css("display", "block");
		$('#previewimg').attr('src', e.target.result);
	}


	$('.panel-google-plus > .panel-footer > .input-placeholder, .panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > button[type="reset"]').on('click', function(event) {
        var $panel = $(this).closest('.panel-google-plus');
            $comment = $panel.find('.panel-google-plus-comment');
            
        $comment.find('.btn:first-child').addClass('disabled');
        $comment.find('textarea').val('');
        $('#uploadimFile').replaceWith( $('#uploadimFile').val('').clone( true ) );
        			$('#previewimg').attr('src',"");
        
        $panel.toggleClass('panel-google-plus-show-comment');
        
        if ($panel.hasClass('panel-google-plus-show-comment')) {
            $comment.find('textarea').focus();
        }
   });
   $('.panel-google-plus-comment > .panel-google-plus-textarea > textarea').on('keyup', function(event) {
        var $comment = $(this).closest('.panel-google-plus-comment');
        
        $comment.find('button[type="submit"]').addClass('disabled');
        if ($(this).val().length >= 1) {
            $comment.find('button[type="submit"]').removeClass('disabled');
        }
   });
   $('.panel-google-plus-comment > .panel-google-plus-textarea > button[type="submit"]').on('click', function(e) {
   		
   		
			e.preventDefault();
   		var $panel = $(this).closest('.panel-google-plus');
         $comment = $panel.find('.panel-google-plus-comment');
         post=$comment.find('textarea').val();
         id=$('.panel-google-plus-comment > .panel-google-plus-textarea > button[type="submit"]').attr('id');
         var data;
         data = new FormData($('#formuploadPost').get(0));
         //$('#imageUploaded').html('<img width="40" class="img-circle col-sm-offset-3" src="images/loader.gif">');
        	$.ajax({
    			url : "ajax_dispatcher.php?action=addPost&texte="+post+"&id="+id,
    			type: "POST",
    			data : data,
    			processData: false,
    			contentType: false,
    			success:function(data, textStatus, jqXHR){
        			$comment.find('.btn:first-child').addClass('disabled');
        			$comment.find('textarea').val('');
        			$panel.toggleClass('panel-google-plus-show-comment');

        			var msg=jQuery.parseJSON(data);

        			loadLastPost(msg);
        			$('#uploadimFile').replaceWith( $('#uploadimFile').val('').clone( true ) );
        			$('#previewimg').attr('src',"");
        			$('#notifications').notify("Vous avez poste un nouveau message","success");
					
    			},
    			error: function(jqXHR, textStatus, errorThrown){
        	//if fails     
    			}
   		});
        
        
   });
   
   $('#postid > div > .panel-body > span > #likePost').on('click', function(e) {
   	
   		
			e.preventDefault();
			id=$(this).attr('name');
			//alert(id)

			$.post(
			'ajax_dispatcher.php',
			{
				action:'like',
				msgid:id,
			},
			function (data) {
				
				$('#postid > div > .panel-body > span > button[name="'+id+'"]').find('span').html(data);
				$('#postid > div > .panel-body > span > button[name="'+id+'"]').css('background-color','blue');
				$('#postid > div > .panel-body > span > button[name="'+id+'"]').attr('disabled', "disabled");
				$('#notifications').notify("Vous avez aime un post","info");
			},

			);
   
   
   });
   $('#postid > div > .panel-body > span > #sharePost').click(function(e) {
   	e.preventDefault();
			id=$(this).attr('name');
			idr=id.substring(1,id.length)
			

			$.post(
			'ajax_dispatcher.php',
			{
				action:'share',
				msgid:idr,
			},
			function (data) {
				
				$('#postid > div > .panel-body > span > button[name="'+id+'"]').find('span').html(data);
				$('#postid > div > .panel-body > span > button[name="'+id+'"]').css('background-color','blue');
				$('#postid > div > .panel-body > span > button[name="'+id+'"]').attr('disabled', "disabled");
				$('#notifications').notify("Vous avez partage un poste","success");
			},

			);
   		
   
   
   });

});
