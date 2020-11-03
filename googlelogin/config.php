<?php

/* Google App Client Id */
include('google/vendor/autoload.php');

$google_client = new Google_Client();

$google_client->setClientId('50472435839-5in0smmcrsu6ftc67d6nguomsou77qg4.apps.googleusercontent.com');

$google_client->setClientSecret('Z9lZY-mchMmN1L4kmGdsOrvW');

$google_client->setRedirectUri('http://plustor.ir/googlelogin/google_check.php');

$google_client->addScope('email');

$google_client->addScope('profile');

$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));

$google_client->setHttpClient($guzzleClient);
?>