<?php

include_once 'Firestore.php';

$fireStore = new Firestore();

//if ($_POST['postId'] != "") {
    /*$userId = $_SESSION['id'];
    $type = $_POST['type'];
    $mComment = $_POST['comment'];
    $postId = $_POST['postId'];
    $time = new Timestamp(new DateTime());*/

    //$userId = $_SESSION['id'];
    $type = "comment";
    //$mComment = $_POST['comment'];
    $postId = "o5FDEYZ0o9r4IHDS0ZeN";
    //$time = new Timestamp(new DateTime());



    $comment = "";
    $reply = "";

    if ($type == "comment"){
        print_r($fireStore->readComment($postId));
        print_r($fireStore->readReply($postId));
    }
    else if ($type == "reply"){
        $fireStore->updateDocument("post",$postId,$reply);
    }






//}
