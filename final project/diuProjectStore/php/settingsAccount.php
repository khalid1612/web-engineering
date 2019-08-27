<?php

include_once 'Firestore.php';

$fireStore = new Firestore();

$id = $_SESSION['id'];

$settings = $fireStore->readDocument($fireStore->getCollectionSettings(),$id);

if (isset($_POST['update'])) {

    $data = [
        ['path' => 'notificationSound', 'value' => $_POST['notification_sound']],
        ['path' => 'postSound', 'value' => $_POST['post_sound']]
    ];

    if ($fireStore->updateDocument($fireStore->getCollectionSettings(),$id,$data)){
        header('Location: settings-account-settings.php');
    }else{
        echo "update failed";
    }

}