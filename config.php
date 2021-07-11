<?php
    require_once 'vendor/autoload.php';
    $google_client = new Google_Client();
    $google_client->setClientId('55263042094-s2v86chg36feh2om3hpt7rpc3k3lf487.apps.googleusercontent.com'); // Add your google client id here
    $google_client->setClientSecret('uDUhXYMZoOJkDGPynxw9vXFJ'); // Add your google client secret here
    $google_client->setRedirectUri('http://localhost:3000'); // Add your main page / redirect url here
    $google_client->addScope('email');
    $google_client->addScope('profile');
    session_start();
?>