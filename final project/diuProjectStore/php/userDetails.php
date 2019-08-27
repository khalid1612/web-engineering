<?php

    include_once 'Firestore.php';

    $fireStore = new Firestore();

    $allUsers = array();

    $getAllUsers  = $fireStore->readCollection($fireStore->getCollectionUsers());

    foreach ($getAllUsers as $user){
        $allUsers[] = array(
            'fullName' => $user['fullName'],
            'profilePic' => $user['profilePic'],
            'nickName' => $user['nickName'],
            'id' => $user->id()
        );
    }




    function getFullName($userID)
    {
        global $allUsers;
        return $allUsers[getUserDetails($userID)]["fullName"];
    }

    function getNickName($userID)
    {
        global $allUsers;
        return $allUsers[getUserDetails($userID)]["nickName"];
    }

    function getUserImg($userID)
    {
        global $allUsers;
        return $allUsers[getUserDetails($userID)]["profilePic"];
    }

    function getCurrentUserId()
    {
        return $_SESSION['id'];
    }

    function getUserDetails($userID)
    {
        global $allUsers;
        return $key = array_search($userID, array_column($allUsers, 'id'));
    }