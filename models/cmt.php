<?php
    class Cmt
    {
        public $Id;
        public $Iduser;
        public $Idpost;
        public $Noidung;

        function __construct($id, $iduser, $idpost, $noidung)
        {
            $this->Id = $id;
            $this->Iduser = $iduser;
            $this->Idpost = $idpost;
            $this->Noidung = $noidung;
        }

        static function getAllCmtByPostId($idpost) {
            $db = database::getInstance();
            $query = "SELECT * FROM ORCMT WHERE IDPOST = '$idpost'";

            $req = $db->query($query);
            
            $item = $req->fetchAll();

            return $item;
        }


        static function addCmt($iduser,$idpost,$noidung){
            $db = database::getInstance();;

            $query = "INSERT INTO ORCMT (ID, IDUSER, IDPOST, NOIDUNG) VALUES (ORCMT_SEQ.nextval ,'$iduser','$idpost','$noidung')";

            $req =  $db->query($query);

        }

        static function deleteCmtById($id){
            $db = database::getInstance();

            $query = "DELETE FROM ORCMT WHERE ID=$id";

        
            $req = $db->query($query);
        }
    }