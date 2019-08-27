<?php

include_once 'Firestore.php';

$fireStore = new Firestore();

$projectId = $_GET['pId'];

$userDetails = $fireStore->readCollection($fireStore->getCollectionUsers());
$project = $fireStore->readDocument($fireStore->getCollectionProject(),$projectId);

if (isset($_POST['startProject'])){


//INSERT HOBBIES AND INTERESTS
    $groupMember = $_POST['groupMember'];
    if ($groupMember == null){
        $groupMember = array();
    }

    $projectData = [
        ['path' => 'name', 'value' => $_POST['name']],
            ['path' => 'type', 'value' => $_POST['type']],
                ['path' => 'duration', 'value' => $_POST['duration']],
                    ['path' => 'member', 'value' => $_POST['member']],
                        ['path' => 'teacher', 'value' => $_POST['teacher']],
                            ['path' => 'groupMember', 'value' => $groupMember],
                                ['path' => 'description', 'value' => $_POST['description']],
                                    ['path' => 'links', 'value' => $_POST['links']],
                                        ['path' => 'progress', 'value' => $_POST['progress']]
    ];

    if ($fireStore->updateDocument($fireStore->getCollectionProject(),$projectId,$projectData)){
        header('Location: edit-project.php?pId='.$projectId);
    }else{
        echo "update failed";
    }
}