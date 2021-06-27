<?php
class Post
{
    public $Id;
    public $Iduser;
    public $Idcate;
    public $Tieude;
    public $Noidung;
    public $Day;
    public $Rating;

    function __construct($id, $iduser, $tieude, $noidung, $day, $rating)
    {
        $this->Id = $id;
        $this->Iduser = $iduser;
        $this->Tieude = $tieude;
        $this->Noidung = $noidung;
        $this->Day = $day;
        $this->Rating = $rating;
    }

    static function getAllPost($SL = NULL)
    {
        $list = [];
        $db = database::getInstance();
        $query = 'SELECT * FROM ORPOST ORDER BY DAY ASC';
        $req = $db->query($query);
        $item = $req->fetchAll();

        if (isset($SL)) {
            $numOffSet = sizeof($item) - $SL;
            $query .= " OFFSET $numOffSet ROWS FETCH NEXT $SL ROWS ONLY";
            $req = $db->query($query);
            $item = $req->fetchAll();
        } else {
            return $item;
        }

        return $item;
    }

    // static function getAllPost($SL = NULL) {
    //     $list = [];
    //     $db = database::getInstance();
    //     $query = 'SELECT * FROM ORPOST';

    //     if(isset($SL))
    //     $query .= " ";

    //     $req = $db->query($query);

    //     $item = $req->fetchAll();

    //     //$item = $req->fetchAll();

    //     return $item;
    // }

    static function getAllCate()
    {
        $list = [];
        $db = database::getInstance();
        $query = 'SELECT * FROM ORCATE';

        $req = $db->query($query);

        $item = $req->fetchAll();

        //$item = $req->fetchAll();

        return $item;
    }

    static function getCateById($id)
    {
        $db = database::getInstance();
        $query = "SELECT * FROM ORCATE WHERE ID='$id'";
        // print_r($query);return;
        $req = $db->query($query);

        $item = $req->fetch(PDO::FETCH_ASSOC);

        return $item;
    }

    static function getPostByIdCate($idcate, $page,  $limit)
    {
        $db = database::getInstance();

        $query = "SELECT * FROM ORPOST WHERE IDCATE='$idcate' ORDER BY DAY DESC";
        $req = $db->query($query);
        $item = $req->fetchAll();

        $total_result = sizeof($item);
        $total_pages = ceil($total_result / $limit);
        $start = ($page - 1) * $limit;

        $query .= " OFFSET $start ROWS FETCH NEXT $limit ROWS ONLY";
        $req2 = $db->query($query);
        $item2 = $req2->fetchAll();

        return array(
            'data' => $item2,
            'total' => $total_result,
            'total_pages' => $total_pages,
        );
    }

    // static function getPostByIdCate($idcate){
    //     $db = database::getInstance();
    //     $req = $db->query("SELECT * FROM ORPOST WHERE IDCATE='$idcate'");

    //     $item = $req->fetchAll();
    //     return $item;
    // }

    static function getPostById($id)
    {
        $db = database::getInstance();
        $req = $db->query("SELECT * FROM ORPOST WHERE ID='$id'");

        $item = $req->fetchAll();

        return $item;
    }

    static function deletePostById($id)
    {
        $db = database::getInstance();

        $query = "DELETE FROM ORPOST WHERE ID=$id";

        $req = $db->query($query);
    }
}