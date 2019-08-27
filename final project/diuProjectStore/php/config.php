<?php
    session_start();
    require_once "GoogleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("105449576865-p35fck9eadhh632o287s7svroeqv6m78.apps.googleusercontent.com");
    $gClient->setClientSecret("WpGwVJA6SyWaDP9YYhgkqE7n");
    $gClient->setApplicationName("DIU Project Store");
    $gClient->setRedirectUri("http://localhost/diuProjectStore/php/g-callback.php");
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.me https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile");
?>
