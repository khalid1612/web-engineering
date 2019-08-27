<?php

include_once 'Firestore.php';

$fireStore = new Firestore();

$id = $_SESSION['id'];

$userDetails = $fireStore->readDocument($fireStore->getCollectionUsers(),$id);




if (isset($_POST['update'])){

    $data = [
        ['path' => 'occupation', 'value' => $_POST['occupation']],
        ['path' => 'semester', 'value' => $_POST['semester']],
        ['path' => 'join', 'value' => $_POST['join']],
        ['path' => 'id', 'value' => $_POST['id']],
        ['path' => 'department', 'value' => $_POST['department']]
    ];

    if ($fireStore->updateDocument($fireStore->getCollectionUsers(),$id,$data)){
        header('Location: settings-varsity-info.php');
    }else{
        echo "update failed";
    }
}

