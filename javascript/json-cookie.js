
function bake_cookie(name, value) {
	var cookie = [name, '=', encodeURIComponent(JSON.stringify(value)), '; domain=.', window.location.host.toString(), '; path=/;'].join('');
	document.cookie = cookie;
}


function read_cookie(name) {
	var result = document.cookie.match(new RegExp(name + '=([^;]+)'));
	result && (result = JSON.parse(decodeURIComponent(result[1])));
	return result;
}