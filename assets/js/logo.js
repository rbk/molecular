// This code centers the logo over the site title text if customizer option is set
var theme_logo = function( ){

	var logo_container 	= document.querySelector('#logo');			
	var title 			= document.querySelector('#site-title-link span');
	var description 	= document.querySelector('#site-description span');
	
	function init( ){
		if( molecular_theme.center_logo && logo_container ){
			center_it();
			handle_resize();
		}
	}
	function center_it(){
		logo_container.style.width = get_larger_width( ) + 'px';
		logo_container.style.opacity = 1;
	}
	function handle_resize(){
		window.addEventListener('resize', function(event){
			center_it();
		});	
	}
	function get_larger_width( ){
		var width_1 = 0,
			width_2 = 0,
			largest = 0;

		if( title ){
			width_1 = title.clientWidth;
		}
		if( description ){
			width_2 = description.clientWidth;
		}
		return ( width_1 > width_2 ) ? width_1 : width_2;
	}
	init();
};
theme_logo();

