<?php

    require_once 'vendor/autoload.php';
    use Google\Cloud\Firestore\FirestoreClient;

class Firestore
{
    protected $db;

    public function getCollectionUsers()
    {
        return 'users';
    }

    public function getCollectionInterest()
    {
        return 'interest';
    }

    public function getCollectionProject()
    {
        return 'allProjects';
    }

    public function getCollectionPost()
    {
        return 'post';
    }

    public function getCollectionSettings()
    {
        return 'settings';
    }

    public function getCommentReply()
    {
        return 'commentReply';
    }



    public function __construct()
    {
        $this->db = new FirestoreClient([
            'projectId' => 'diu-project-store'
        ]);
    }

    public function createDocumentCustomId($collection, $document, $data)
    {
        //if document already exists then do not crate or update

        $query = $this->db->collection($collection)->document($document);

        if ($query->snapshot()->exists()){
            return;
        }
        else if ($query->set($data)){
            return true;
        }else{
            return false;
        }

    }

    public function createDocumentAutoId($collection, $data)
    {
        //if document already exists then do not crate or update

        $query = $this->db->collection($collection)->add($data);

        if ($query){
            return true;
        }else{
            return false;
        }

    }

    public function readDocument($collection, $document)
    {
        try{
            $query = $this->db->collection($collection)->document($document);

            if ($query->snapshot()->exists()){
                return $query->snapshot()->data();
            }
            else{
                throw new Exception('Document are not exists');
            }
        }catch (Exception $exception){
            return $exception->getMessage();
        }
    }

    public function readCollection($collection)
    {
        $query = $this->db->collection($collection)->documents();

        if ($query->isEmpty()){
            return false;
        }else{
            return $query;
        }

    }

    public function readCommentReply($projectOrPostID)
    {
        $query = $this
            ->db
            ->collection($this->getCommentReply())
            ->where('projectOrPostID', '=', $projectOrPostID)
            ->documents();

        if ($query->isEmpty()){
            return false;
        }else{
            return $query;
        }
    }

    public function readCollectionWithLimitOrder($collection,$limit,$order)
    {
        $query = $this
            ->db
            ->collection($collection)
            ->orderBy($order, "desc")
            ->limit($limit)
            ->documents();

        if ($query->isEmpty()){
            return false;
        }else{
            return $query;
        }

    }

    public function readSubCollection($mainCollection,$document,$subCollection){
        $query = $this
            ->db
            ->collection($mainCollection)
            ->document($document)
            ->collection($subCollection)
            ->orderBy('time')
            ->documents();

        if ($query->isEmpty()){
            return false;
        }else{
            return $query;
        }
    }

    public function readSubSubCollection($mainCollection,$document,$subCollection,$subDocument,$subSubCollection){
        $query = $this
            ->db
            ->collection($mainCollection)
            ->document($document)
            ->collection($subCollection)
            ->document($subDocument)
            ->collection($subSubCollection)
            ->documents();

        if ($query->isEmpty()){
            return false;
        }else{
            return $query;
        }
    }

    public function updateDocument($collection, $document, $data)
    {
        if ($this->db->collection($collection)->document($document)->update($data)){
            return true;
        }
        else{
            return false;
        }

    }

    public function deleteDocument($collection, $document)
    {
        if ($this->db->collection($collection)->document($document)->delete()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteSubDocument($mainCollection,$document,$subCollection, $subDocument)
    {
        if ($this
            ->db
            ->collection($mainCollection)
            ->document($document)
            ->collection($subCollection)
            ->document($subDocument)
            ->delete()
        ){
            return true;
        }else{
            return false;
        }
    }

    public function deleteSubSubDocument($mainCollection,$document,$subCollection, $subDocument,$subSubCollection,$subSubDocument)
    {
        if ($this
            ->db
            ->collection($mainCollection)
            ->document($document)
            ->collection($subCollection)
            ->document($subDocument)
            ->collection($subSubCollection)
            ->document($subSubDocument)
            ->delete()
        ){
            return true;
        }else{
            return false;
        }
    }

    public function deleteCollection($collection)
{
    $documents = $this->db->collection($collection)->limit(1)->documents();

    while (!$documents->isEmpty()){
        foreach ($documents as $item){
            $item->reference()->delete();
        }
    }

    $documents = $this->db->collection($collection)->limit(1)->documents();
}

    public function deleteSubCollection($mainCollection,$document,$subCollection)
{
    $documents = $this
        ->db
        ->collection($mainCollection)
        ->document($document)
        ->collection($subCollection)
        ->limit(1)
        ->documents();

    while (!$documents->isEmpty()){
        foreach ($documents as $item){
            $item->reference()->delete();
        }
    }

    //$documents = $this->db->collection($collection)->limit(1)->documents();
}

    public function deleteSubSubCollection($mainCollection,$document,$subCollection,$subDocument,$subSubCollection)
{
    $documents = $this
        ->db
        ->collection($mainCollection)
        ->document($document)
        ->collection($subCollection)
        ->document($subDocument)
        ->collection($subSubCollection)
        ->limit(1)
        ->documents();

    while (!$documents->isEmpty()){
        foreach ($documents as $item){
            $item->reference()->delete();
        }
    }

    //$documents = $this->db->collection($collection)->limit(1)->documents();
}

    public function singleSearch($collection,$field,$operator,$value)
    {
        //$srcResult = [];
        //$query = $this->db->collection($collection)->where($field,$operator,$value)->documents()->rows();
        return $this->db->collection($collection)->where($field,$operator,$value)->documents()->rows();

//        foreach ($query as $item){
//            $a = $item->data();
//
//            print_r($a['name']);
//        }

//        if (!empty($query)){
//            foreach ($query as $item){
//                $srcResult[] = $item->data();
//            }
//        }
//
//        return $srcResult;

    }






///get every document
//foreach ($snapshot as $user) {
//printf('User: %s' . PHP_EOL, $user->id());
//printf('First: %s' . PHP_EOL, $user['first']);
//if (!empty($user['middle'])) {
//printf('Middle: %s' . PHP_EOL, $user['middle']);
//}
//printf('Last: %s' . PHP_EOL, $user['last']);
//printf('Born: %d' . PHP_EOL, $user['born']);
//printf(PHP_EOL);
//}
}