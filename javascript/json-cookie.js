
function bake_cookie(name, value) {
	var date = new Date();
	date.setFullYear(date.getFullYear()+1);
	var expires = "; expires=" + date.toGMTString();
	var cookie = [name, '=', encodeURIComponent(JSON.stringify(value)), expires,  '; domain=.', window.location.host.toString(), '; path=/~equipo3/web-store;', ''].join('');
	document.cookie = cookie;
}


function read_cookie(name) {
	var result = document.cookie.match(new RegExp(name + '=([^;]+)'));
	result && (result = JSON.parse(decodeURIComponent(result[1])));
	return result;
}