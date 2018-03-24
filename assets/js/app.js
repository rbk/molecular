jQuery(document).ready(function($){
	$('#masthead input[type=search]').focus(function(){
		$('#masthead .search-form').addClass('focus');
	}).blur(function(){
		$('#masthead .search-form').removeClass('focus');
	});
});
