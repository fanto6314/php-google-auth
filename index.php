<?php 
    include('config.php');

    $login_button = '';
    $br = '<br></br>';

    if ( isset( $_GET['code'] ) ) {
        $token = $google_client->fetchAccessTokenWithAuthCode( $_GET['code'] );
        if ( !isset( $token['error'] ) ) {
            $google_client->setAccessToken( $token['access_token'] );
            $_SESSION['access_token'] = $token['access_token'];
            $google_service = new Google_Service_Oauth2( $google_client );
            $data = $google_service->userinfo->get();
    
            if ( !empty( $data['id'] ) ) {
                $_SESSION['user_id'] = $data['id'];
            }
            if ( !empty( $data['given_name'] ) ) {
                $_SESSION['user_first_name'] = $data['given_name'];
            }
    
            if ( !empty( $data['email'] ) ) {
                $_SESSION['user_email_address'] = $data['email'];
            }
    
            if ( !empty( $data['picture'] ) ) {
                $_SESSION['user_image'] = $data['picture'];
            }
        }
    }

    if ( !isset( $_SESSION['access_token'] ) ) {
        $login_button = '<a href="'.$google_client->createAuthUrl().'">Login</a>';
    } else {
        $logout_button = '<a href="logout.php">Logout</a>';
        $profile_image = '<img src="'.$_SESSION['user_image'].'"> ';
        $profile_name  = '<a>'.$_SESSION['user_first_name'].'</a>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport' />
    <title>PHP Google Auth</title>
</head>
<body>
    <?php 
        if( $login_button == '' ){
            echo $profile_image;
            echo $br;
            echo $logout_button;
            echo $br;
            echo $profile_name;
        }
        else {
            echo $login_button;
        }
    ?>
</body>
</html>