<?php
// cái này thêm vào controller thì nhớ gi nó vào đây
// làm đi là s h làm trang home controller?
// làm cái view cho page/home kìa à từ từ
$controllers = array(
  'index' => ['index','error'],
  'pages' => ['index','error','allPost','postDetail','addCmt','deleteCmt'],
  'users' => ['login','logout','register','updateUser'],
  'admin' => ['index','user','post','deleteUser','deletePost'],
); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'pages';
  $action = 'error';
}

// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
include_once('controllers/' . $controller . '_controller.php');
// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
// user->home();
$controller->$action();
?>