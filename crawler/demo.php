<?php
require "connect.php";
require "modules.php";
require "simple_html_dom.php";

$html = file_get_html("http://dantri.com.vn/the-thao.htm");
// $html1 = file_get_html("https://dantri.com.vn/the-gioi.htm");
// $html2 = file_get_html("https://dantri.com.vn/xa-hoi.htm");
// $html3 = file_get_html("https://dantri.com.vn/kinh-doanh.htm");

crawl_all_post($html, 1, 1);
// crawl_all_post($html1, 2, 1);
// crawl_all_post($html2, 3, 1);
// crawl_all_post($html3, 4, 1);


// for ($i = 90; $i < 100; $i ++){
//     $url = file_get_html("http://dantri.com.vn/the-thao/"."trang-".$i.".htm");
//     crawl_all_post($url, 1, 1);
// }

// for ($i = 90; $i < 100; $i ++){
//     $url = file_get_html("http://dantri.com.vn/the-gioi/"."trang-".$i.".htm");
//     crawl_all_post($url, 2, 1);
// }

// for ($i = 90; $i < 100; $i ++){
//     $url = file_get_html("http://dantri.com.vn/xa-hoi/"."trang-".$i.".htm");
//     crawl_all_post($url, 3, 1);
// }

// for ($i = 90; $i < 100; $i ++){
//     $url = file_get_html("http://dantri.com.vn/kinh-doanh/"."trang-".$i.".htm");
//     crawl_all_post($url, 4, 1);
// }