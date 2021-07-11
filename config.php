<?php
    require_once 'vendor/autoload.php';
    $google_client = new Google_Client();
    $google_client->setClientId('-'); // Add your google client id here
    $google_client->setClientSecret('-'); // Add your google client secret here
    $google_client->setRedirectUri('-'); // Add your main page / redirect url here
    $google_client->addScope('email');
    $google_client->addScope('profile');
    session_start();
?>