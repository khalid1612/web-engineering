<?php

include_once 'Firestore.php';

$fireStore = new Firestore();

$id = $_SESSION['id'];

$userInterest = $fireStore->readDocument($fireStore->getCollectionInterest(),$id);

if (isset($_POST['update'])) {
    $data = [
        ['path' => 'hobbies', 'value' => $_POST['hobbies']],
        ['path' => 'music', 'value' => $_POST['music']],
        ['path' => 'shows', 'value' => $_POST['shows']],
        ['path' => 'books', 'value' => $_POST['books']],
        ['path' => 'movies', 'value' => $_POST['movies']],
        ['path' => 'writers', 'value' => $_POST['writers']],
        ['path' => 'games', 'value' => $_POST['games']],
        ['path' => 'other', 'value' => $_POST['other']]
    ];

    if ($fireStore->updateDocument($fireStore->getCollectionInterest(), $id, $data)) {
        header('Location: settings-hobbies-and-interests.php');
    } else {
        echo "update failed";
    }
}