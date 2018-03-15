function get_elements( arg ){
	var query = document.querySelectorAll( arg );
	if( query.length == 1 ){
		return query[0];
	} else {
		return query;
	}
}
function toggleClass( el, el_class ){
	if( el.className.match( el_class ) ){
		el.className = el.className.replace(el_class, '');
	} else {
		el.className = el.className + ' ' + el_class;
	}
}
function addClass( el, classname ){
	if( !el.className.match(classname) ){
		el.className = el.className + ' ' + classname;
	}
}
function removeClass( el, classname ){
	if( el.className.match(classname) ){
		el.className = el.className.replace(classname, '');
	}
}
function insertAfter(newNode, referenceNode) {
	referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}