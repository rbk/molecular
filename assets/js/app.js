jQuery(document).ready(function($){


	$('#masthead input[type=search]').focus(function(){
		$('#masthead .search-form').addClass('focus');
	}).blur(function(){
		$('#masthead .search-form').removeClass('focus');
	});

	console.log( Object.keys( window ) );
	console.log( Object.keys( document ) );

});