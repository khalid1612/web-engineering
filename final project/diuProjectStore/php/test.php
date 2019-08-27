<?php

require_once 'Firestore.php';

$fireStore = new Firestore();

session_start();

$allUsers = array();

$getAllUsers  = $fireStore->readCollection($fireStore->getCollectionUsers());

foreach ($getAllUsers as $user){
    $allUsers[] = array(
        'fullName' => $user['fullName'],
        'profilePic' => $user['profilePic'],
        'id' => $user->id()
    );
}

$_SESSION['allUsers'] = $allUsers;


$key = array_search("khalid2", array_column($allUsers, 'id'));

echo "<pre>";
print_r($_SESSION['allUsers'][$key]["fullName"]);
//echo $allUsers[$key];
echo "</pre>";

/*echo "<pre>";
printf(PHP_EOL);
print_r($allUsers);
printf(PHP_EOL);
echo "</pre>";*/

//print_r($_SESSION['allUsers']);


//$userData['id'] = '118000382826726422023';

//$data = [
//    'fullName' => 'khalid hassan',
//    'profilePic' => 'khalid hassan',
//    'email' => '55khalid442@gmail.com'
//];
//
/*$updateData = [
    ['path' => 'occupation', 'value' => "teacher"]
];*/


//print_r($fireStore->createDocumentAutoId("allProjects",$updateData));
//print_r($fireStore->updateDocument($fireStore->getCollectionUsers(),'168000382826726422023',$updateData));
//print_r($fireStore->deleteDocument($fireStore->getCollectionUsers(),"118000382826726422023"));

//$dataInterest = [
//    'hobbies' => "",
//    'music' => "",
//    'shows' => "",
//    'books' => "",
//    'movies' => "",
//    'writers' => "",
//    'games' => "",
//    'other' => ""
//];
//
//$fireStore->createDocument($fireStore->getCollectionInterest(),$userData['id'],$dataInterest);

//$data = [
//    'fullName' => "khalid4",
//    'email' => "khalid@diu.edu.bd",
//    'profilePic' => "khalid",
//    'nickName' => "hasan12",
//    'website' => "",
//    'birthday' => "",
//    'phone' => "",
//    'des' => "",
//    'additional' => "",
//    'linkFb' => "",
//    'linkTwitter' => "",
//    'linkGithub' => "",
//    'linkLinkedin' => "",
//    'linkStack' => "",
//    'linkInstagram' => ""
//
//];
//
//
//$fireStore->createDocument($fireStore->getCollectionUsers(),"178000382826726422023",$data);
