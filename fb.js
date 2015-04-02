function statusChangeCallback(response) {
	// console.log('statusChangeCallback');
	// console.log(response);

	// check status
	if (response.status === 'connected') {
		// logged in on app
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
		version	: 'v2.3'
	});

	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
};

function apiInfo() {
	FB.api('/me', function(response) {
	  console.log(response);
	});
}