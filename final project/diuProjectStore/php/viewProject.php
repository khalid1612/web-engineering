<?php

include_once 'Firestore.php';

$fireStore = new Firestore();
$projectId = $_GET['pId'];

$projectDetails = $fireStore->readDocument($fireStore->getCollectionProject(),$projectId);

$allCommentReply = array();

$getComments = $fireStore->readCommentReply($projectId);
array_push($allCommentReply,$getComments);

/*foreach ($allPosts as $key => $post){
    array_push($allCommentReply,$comments);
}*/
