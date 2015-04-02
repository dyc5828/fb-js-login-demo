<?php
// require fb sdk
require_once __DIR__.'/fb-php-sdk/autoload.php';

// facebook namespace
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\GraphUser;

// set facebook app
FacebookSession::setDefaultApplication('664654150308047','11e5e8b58fae1f8b37cea0455bd474b9');

// get auth from js
$fb_js_helper = new FacebookJavaScriptLoginHelper();

try {
    // fb session auth

    // fb graph api

    // db auth
    // check id and verififed
    // if id found, return user
    // if id not found, create user then return created

} catch (FacebookRequestException $ex) {
	echo 'didnt get it';
	// fb session error
} catch (\Exception $ex) {
	echo 'what it?';
	// fb session failed
}