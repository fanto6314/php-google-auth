<?php
    include('config.php');
    $google_client->revokeToken(); // Deleting google token
    session_destroy(); // Deleting session data
    header('location:index.php'); // Redirecting to main page
?>
