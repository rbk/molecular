var menu_watcher = function( ){

	var small_menu = document.getElementById('small-navigation');
	var main_menu = document.getElementById('main-navigation');
	var search_field = document.querySelector('#form-container .search-field');
	
	var menu_items_width = 0;
	var menu_items = get_elements( '#top-nav-list > li' );
	if( menu_items ){
		for(var i=0; i<menu_items.length; i++){
			var width = menu_items[i].clientWidth
			menu_items_width = menu_items_width + width;
		}
	}

	function setMenu( ) {

		if( window.innerWidth < menu_items_width+80 ){
			addClass( document.body, 'mobile' );
		} else {
			removeClass( document.body, 'mobile' );
		}
		
	}
	function watchResize( ){
		window.addEventListener('resize', function(event){
			setMenu( );
		});		
	}
	function addMenuToggleEvents( ){

		document.getElementById('mobile-menu-open').addEventListener('click', function(event){
			toggleClass(document.body, 'menu-active');
		});
		document.getElementById('mobile-menu-close').addEventListener('click', function(event){
			removeClass(document.body, 'menu-active');
		});
		document.getElementById('search-open').addEventListener('click', function(event){
			
			addClass(document.body, 'menu-active');
			search_field.focus();
			search_field.value = '';
			
		});

	}

	function init( ){
		if( main_menu ) {
			setMenu();
			watchResize();
			addMenuToggleEvents();
		}
	}
	
	window.addEventListener('load', init, false);
	
}
menu_watcher();




