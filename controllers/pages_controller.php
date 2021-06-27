<?php
require_once('controllers/base_controller.php');
require_once('models/post.php');
require_once('models/user.php');
require_once('models/cmt.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function index()
  {
    $allCate = Post::getAllCate();
    $allPost = Post::getAllPost(5);
    // $name = [];
    $nameCate = [];
    $user = [];
    foreach ($allPost as $item) {
      $user[] = User::getUserById($item['IDUSER']);
      $nameCate[] = Post::getCateById($item['IDCATE']);
    }

    $data = array(
      "allCate" => $allCate,
      "allPost" => $allPost,
      "user" => $user,
      "nameCate" => $nameCate,
    );

    $this->render('index', $data);
  }
  public function error()
  {
    $this->render('error');
  }

  public function allPost()
  {
    $idCate = $_GET['idCate'];
    $page = $_GET['page'];

    $limit = 6;
    if (array_key_exists('limit', $_GET)) {
      $limit = (int)$_GET['limit'];
    }

    $postData = Post::getPostByIdCate($idCate, $page, $limit);
    $post = $postData['data'];
    $nameCate = [];
    $nameCate[] = Post::getCateById($idCate);

    $data = array(
      "idCate" => $idCate,
      "post" => $post,
      "nameCate" => $nameCate,
      "page" => $page,
      "pageSize" => $limit,
      "total" => $postData["total"],
      "totalPages" => $postData["total_pages"],
    );

    $this->render('allPost', $data);
  }

  public function postDetail()
  {
    $id = $_GET['id'];
    // $post = [];
    $post = Post::getPostById($id);
    $cmt = Cmt::getAllCmtByPostId($id);
    $nameCate = [];
    $nameCmt = [];
    foreach ($cmt as $item2) {
      $nameCmt[] = User::getUserById($item2['IDUSER']);
    }
    foreach ($post as $item) {
      $nameCate[] = Post::getCateById($item['IDCATE']);
    }

    $data = array(
      "post" => $post,
      "cmt" => $cmt,
      "nameCate" => $nameCate,
      "nameCmt" => $nameCmt,
    );
    $this->render('postDetail', $data);
  }

  public function addCmt()
  {

    if (isset($_POST['txtCmt'])) {
      $id = $_SESSION["userId"];
      $idpost = $_GET["id"];

      $newCmt = Cmt::addCmt($id, $idpost, $_POST['txtCmt']);

      header('Location:?controller=pages&action=postDetail&id=' . $idpost);
    } else {
      $data = [];
      $this->render('postDetail', $data);
    }
  }

  public function deleteCmt()
  {
    $id = $_GET['id'];
    $idpost = $_GET['idpost'];
    if (isset($id)) {
      $result = Cmt::deleteCmtById($id);
    }
    header('Location:?controller=pages&action=postDetail&id=' . $idpost);
    // header('Location: ?controller=pages&action=index');
  }
}