<?php

include_once 'Firestore.php';

$fireStore = new Firestore();

$userId = $_SESSION['id'];

//$fireStore->singleSearch($fireStore->getCollectionProject(),"groupMember","array-contains","118000382826726422023");
$projects = $fireStore->singleSearch($fireStore->getCollectionProject(),"groupMember","array-contains",$userId);

//foreach ($projects as $project){
//    print_r($project);
//    //print_r("echo");
//}


