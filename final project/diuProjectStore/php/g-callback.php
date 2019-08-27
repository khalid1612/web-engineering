<?php

require_once "config.php";

if (isset($_SESSION['access_token'])){
    $gClient->setAccessToken($_SESSION['access_token']);
}
else
if (isset($_GET['code'])){
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
}
else{
    header('Location: ../login.php');
    exit();
}

$oAuth = new Google_Service_Oauth2($gClient);
$userData = $oAuth->userinfo_v2_me->get();



require_once 'Firestore.php';
$fireStore = new Firestore();

//INSERT NEW USER
$data = [
    'fullName' => $userData['givenName'],
    'email' => $userData['email'],
    'profilePic' => $userData['picture'],
    'nickName' => "",
    'website' => "",
    'birthday' => "",
    'phone' => "",
    'des' => "",
    'additional' => "",
    'linkFb' => "",
    'linkTwitter' => "",
    'linkGithub' => "",
    'linkLinkedin' => "",
    'linkStack' => "",
    'linkInstagram' => "",
    'occupation' => "",
    'semester' => "",
    'join' => "",
    'id' => "",
    'department' => ""
];


$fireStore->createDocumentCustomId($fireStore->getCollectionUsers(),$userData['id'],$data);


$settings = [
    'notificationSound' => "on",
    'postSound' => "on"
];

$fireStore->createDocumentCustomId($fireStore->getCollectionSettings(),$userData['id'],$settings);


//INSERT HOBBIES AND INTERESTS
$dataInterest = [
    'hobbies' => "",
    'music' => "",
    'shows' => "",
    'books' => "",
    'movies' => "",
    'writers' => "",
    'games' => "",
    'other' => ""
];

$fireStore->createDocumentCustomId($fireStore->getCollectionInterest(),$userData['id'],$dataInterest);


session_start();
$_SESSION['id'] = $userData['id'];
//echo $_SESSION['givenName'] = $userData['givenName'].'<br>';
//echo $_SESSION['googleProfilePic'] = $userData['picture'].'<br>';
//echo $_SESSION['email'] = $userData['email'].'<br>';

header('Location: ../index.php');
exit();

