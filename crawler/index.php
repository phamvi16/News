<?php

require "connect.php";

  $str = file_get_contents('./data.json');
  $json = json_decode($str, true); 
  
  echo('1\n');

  foreach ($json as $data) {
    insert_post1($data);
  }

  echo('done');
  
function insert_post1($post)
{
    $userId = $post['userId'];
    $idcate = $post['cateId'];
    $title = $post['title'];
    $noidung = $post['content'];
    $img = $post['imgSrc'];
    $href = $post['href'];
    $day = $post['day'];

    $db = database2::getInstance();

        $sql = "INSERT INTO ORPOST (ID,IDUSER,IDCATE,TIEUDE,NOIDUNG,DAY,RATING,IMG,HREF) 
        VALUES (ORPOST_SEQ.nextval, '$userId', '$idcate','$title','$noidung','$day',0,'$img','$href')";
        $st = $db->query($sql);
  
}