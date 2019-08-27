<?php

include_once 'Firestore.php';

$fireStore = new Firestore();

$id = $_SESSION['id'];

$userDetails = $fireStore->readDocument($fireStore->getCollectionUsers(),$id);




if (isset($_POST['update'])){

    $data = [
        ['path' => 'nickName', 'value' => $_POST['nickName']],
        ['path' => 'website', 'value' => $_POST['website']],
        ['path' => 'birthday', 'value' => $_POST['datetimepicker']],
        ['path' => 'phone', 'value' => $_POST['phone']],
        ['path' => 'des', 'value' => $_POST['des']],
        ['path' => 'additional', 'value' => $_POST['additional']],
        ['path' => 'linkFb', 'value' => $_POST['fb']],
        ['path' => 'linkTwitter', 'value' => $_POST['twitter']],
        ['path' => 'linkGithub', 'value' => $_POST['github']],
        ['path' => 'linkLinkedin', 'value' => $_POST['linkedin']],
        ['path' => 'linkStack', 'value' => $_POST['stack']],
        ['path' => 'linkInstagram', 'value' => $_POST['instagram']]
    ];

    if ($fireStore->updateDocument($fireStore->getCollectionUsers(),$id,$data)){
        header('Location: settings-personal-info.php');
    }else{
        echo "update failed";
    }
}

