<?php

include_once 'Firestore.php';

$fireStore = new Firestore();

$allPosts = $fireStore->readCollectionWithLimitOrder($fireStore->getCollectionPost(),50,"time");

$allCommentReply = array();

foreach ($allPosts as $key => $post){
    $comments = $fireStore->readCommentReply($post->id());
    array_push($allCommentReply,$comments);
}

/*
foreach ($allPosts as $key => $post){
    echo "<b>post details:</b> ".$post->id()." => ".$post['post']."</br>";

    if ($allCommentReply[$key] != false) {
        $comments = array();
        $replies = array();
        foreach ($allCommentReply[$key] as $item) {
            if ($item['type'] == 'comment'){
                array_push($comments,$item);
            }else{
                array_push($replies,$item);
            }
        }

        echo sizeof($comments);

        foreach ($comments as $comment){
            echo "<pre>";
            printf('Document data for document %s:' . PHP_EOL, $comment->id());
            print_r($comment->data());
            printf(PHP_EOL);
            echo "</pre>";

            foreach ($replies as $reply){
                if ($reply['from'] == $comment->id()){
                    echo "<pre>";
                    printf('Document data for document %s:' . PHP_EOL, $reply->id());
                    print_r($reply->data());
                    printf(PHP_EOL);
                    echo "</pre>";

                }
            }
        }
    }
}
*/

//}

