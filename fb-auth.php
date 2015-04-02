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
    $fb_session = $fb_js_helper->getSession();
    // echo '<pre>'; var_dump($fb_session); echo "<hr/>";

    // fb graph api
    $fb_request = new FacebookRequest($fb_session, 'GET', '/me');
    $fb_response = $fb_request->execute();
    $fb_profile = $fb_response->getGraphObject(GraphUser::className());
    // echo '<pre>'; var_dump($fb_profile); echo "<hr/>";

    // access fb profile
    $fb_id = $fb_profile->getProperty('id');

    // db auth
    // check id and verififed
    // if id found, return user
    // if id not found, create user then return created
    $db_reponse = [
    	'id' => '832605520144931',
    	'color' => 'blue',
    ];
    
    if($fb_id == $db_reponse['id']) {
    	$json = json_encode($db_reponse);
    	echo $json;
    }

} catch (FacebookRequestException $ex) {
	echo 'didnt get it';
	// fb session error
} catch (\Exception $ex) {
	echo 'what it?';
	// fb session failed
}