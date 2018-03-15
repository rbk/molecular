var setup_drop_downs = function( obj ){

	var caret;

	var items = document.querySelectorAll(obj.selector);

	function toggleClass( el, el_class ){
		if( el.className.match( el_class ) ){
			el.className = el.className.replace(el_class, '');
		} else {
			el.className = el.className + ' ' + el_class;
		}
	}
	function addClickEvent( element, caret ){
		caret.addEventListener('click', function(event){
			event.preventDefault();	

			var submenu = element.nextElementSibling;

			toggleClass(caret, 'fa-caret-down');
			toggleClass(caret, 'fa-caret-up');
			toggleClass(submenu, 'slideDown');
	
		});
	}
	
	for( var i=0; i<items.length; i++) {

		caret = document.createElement('i');
		caret.className = 'fa fa-caret-down caret';
		items[i].appendChild( caret );

		addClickEvent( items[i], caret );

	}

};

var wp_list_pages = 		'.page_item_has_children > a';
var custom_menu_sidebar = 	'.widget .menu-item-has-children > a';
var mobile_menu = 			'#menu-content-container .menu-item-has-children > a';

setup_drop_downs({
	selector: custom_menu_sidebar
});
setup_drop_downs({
	selector: mobile_menu
});

