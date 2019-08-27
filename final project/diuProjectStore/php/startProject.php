<?php

include_once 'Firestore.php';

$fireStore = new Firestore();

$userDetails = $fireStore->readCollection($fireStore->getCollectionUsers());

if (isset($_POST['startProject'])){


//INSERT HOBBIES AND INTERESTS
    $groupMember = $_POST['groupMember'];
    if ($groupMember == null){
        $groupMember = array();
    }
    array_push($groupMember,$_SESSION['id']);

    $projectData = [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'duration' => $_POST['duration'],
        'member' => $_POST['member'],
        'teacher' => $_POST['teacher'],
        'groupMember' => $groupMember,
        'description' => $_POST['description'],
        'finish' => $_POST['datetimepicker'],
        'links' => '',
        'progress' => 0
    ];

    if ($fireStore->createDocumentAutoId($fireStore->getCollectionProject(),$projectData)){
        header('Location: project-list.php');
    }else{
        echo "update failed";
    }
}