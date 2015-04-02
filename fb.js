function statusChangeCallback(response) {
	// console.log('statusChangeCallback');
	// console.log(response);

	// check status
	if (response.status === 'connected') {
		// logged in on app
		apiInfo();
		fbAjaxCallback();
	} else if (response.status === 'not_authorized') {
		// not logged in on app
	} else {
		// not logged in on facebook
	}
}

function checkLoginState() {
	FB.getLoginStatus(function (response) {
		statusChangeCallback(response);
	});
}

window.fbAsyncInit = function() {
	FB.init({
		appId	: '664654150308047',
		xfbml	: true,
		cookie	: true,
		version	: 'v2.3'
	});

	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
};

function apiInfo() {
	FB.api('/me', function(response) {
	  // console.log(response);
	  $('div#name').html(response.first_name);
	});
}

function fbAjax() {
	return $.ajax({
		url: 'http://localhost:8080/itp/fb-js-login-demo/fb-auth.php',
		type: 'GET',
		dataType: 'JSON',
	});
}

function fbAjaxCallback() {
	var ajax = fbAjax();

	ajax.done(function(response) {
		// console.log('ajax reponse: ', response);
		$('div#name').append('\'s favorite color is '+response.color+'!');
	});
}