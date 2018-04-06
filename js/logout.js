$(function () {
	
	$('#logout').click(function(){
		$.post(
			'ajax_dispatcher.php',
			{action:'logout'},
			function (data) {
				//alert(data);
				elem='<div id="templ" class="row col-sm-offset-3 col-sm-4"></div>';
				$('body .container > #templIndex').html(elem);
				$('.container > #templIndex > #templ').load(data);
				//$('.container > #templIndex > #form').toggleClass('TeLOut');;
				//$('body .container #notif h3').html("Vous etes Bien Deconnecte !");
				$('#notifications').notify("Vous etes Bien Deconnecte !","info");
				$('#navbarColor01').remove();
				
			},
		);
		
		
	});
});
