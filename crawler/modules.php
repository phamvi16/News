<?php
function crawl_all_post($html, $idcate, $iduser)
{
    $block = $html->find("div.container")[0];
    $newItems = $block->find("div.eplcheck");

    //$id = 0;

    if (isset($newItems) && count($newItems) > 1) {
        for ($i = 1; $i < count($newItems); $i++) {
            $newItem = $newItems[$i];

            //$id++;
            $title = $newItem->find("div.mr1 h2 a", 0)->title;
            $img = $newItem->find("a img", 0)->src;
            $href = 'http://dantri.com.vn' . $newItem->find("a", 0)->href;
            $noidung = $newItem->find("div.mr1 div.fon5", 0)->innerText();
            //$content = get_content($link);
            $day = get_day($href);

            //echo $title . '<br/>' . '<img src="' . $img . '"/><br/>' . $link . '<br/> mô tả:' . $mota . '<br/>';
            //echo $title . '<br/>';

            $post = array();
            //$post['id'] = $id;
            $post['idcate'] = $idcate;
            $post['iduser'] = $iduser;
            $post['title'] = $title;
            $post['img'] = $img;
            $post['href'] = $href;
            $post['noidung'] = $noidung;
            //$post['content'] = $content;
            $post['day'] = $day;

            insert_post($post);
        }
    }
}

function insert_post($post)
{
    //$id = $post['id'];
    $idcate = $post['idcate'];
    $iduser = $post['iduser'];
    $title = $post['title'];
    $img = $post['img'];
    $href = $post['href'];
    $noidung = $post['noidung'];
    //$content = $post['content'];
    $day = $post['day'];

    $db = database2::getInstance();

    if (check_tieude($post) == false){
        $sql = "INSERT INTO ORPOST (ID,IDUSER,IDCATE,TIEUDE,NOIDUNG,DAY,RATING,IMG,HREF) 
        VALUES (ORPOST_AUTO_INCR.nextval,1,'$idcate','$title','$noidung','$day',0,'$img','$href')";
        //$sql = "INSERT INTO ORCPOST (ID,NOIDUNG) VALUES ('${id}','${content}')";

        $st = $db->query($sql);
    } 
}

function get_content($link)
{
    $html = file_get_html($link);
    foreach ($html->find('div.fon34 ') as $element) {
        return $element;
    }
}

function get_day($link)
{
    $html = file_get_html($link);
    foreach ($html->find('div.box26 span.fr') as $element) {
        return $element->innerText();
    }
}

function check_tieude($post){

    $title = $post['title'];

    $db = database2::getInstance();

    $query = $db->prepare('select * from ORPOST');
    $query->execute();
    $item = $query->fetchAll();
    $count = false;
    foreach ($item as $t) {
        if ($t['TIEUDE'] == $title) {
            $count = true;
            break;
        }
    }
    return $count;
}
