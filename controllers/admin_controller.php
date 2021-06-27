<?php
	require_once('controllers/base_controller.php');
	require_once('models/user.php');
	require_once('models/post.php');
	
	class AdminController extends BaseController
	{
		function __construct()
	  	{
      		$this->folder = 'admin';
	  		if($_SESSION['type']!=1)
	      		header('Location: ?controller=pages&action=index');
	  	}

	  	public function index(){
			$allPost = Post::getAllPost();
			$allUser = User::getAllUser();

			$data = array(
				"allPost" => $allPost,
				"allUser" => $allUser,

			);

	  		$this->render('index',$data,'views/layouts/adminLayout.php');
	  	}

	  	public function user(){
		    $allUser = User::getAllUser();

		    $data = array(
		      	"allUser" => $allUser,
		    );

		      $this-> render('user',$data,'views/layouts/adminLayout.php');
	  	}

	  	public function deleteUser(){
			$id = $_GET['id'];
			if(isset($id)){
				$result = User::deleteUserById($id);
			}
			header('Location: ?controller=admin&action=user');
		}

	  	public function post(){
		    $allPost = Post::getAllPost();
		    // $name =[];
		    // foreach ($allPost as $item){
      // 			$name[] = User::getUserById($item->Iduser);
    		// }

		    $data = array(
		    	// "name" => $name,
		      	"allPost" => $allPost,
		    );

		      $this-> render('post',$data,'views/layouts/adminLayout.php');
	  	}

	  	public function deletePost(){
		     $id = $_GET['id'];
		     if(isset($id)){
		       $result = Post::deletePostById($id);
		     }
		     header('Location: ?controller=admin&action=post');
		}

	  	public function error()
		{
		    $this->render('error');
  		}
	}
 ?>