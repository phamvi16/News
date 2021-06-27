<?php
require_once('controllers/base_controller.php');
require_once('models/user.php');

class UsersController extends BaseController
{
	function __construct()
	{
		$this->folder = 'users';
	}

	public function login()
	{
		if (!isset($_POST['txtLoginUser']) or !isset($_POST['txtLoginPass']))
			header('Location: ?controller=pages&action=index');

		$username = $_POST['txtLoginUser'];
		$password = $_POST['txtLoginPass'];

		$user = User::loginUser($username, $password);
		if (isset($user)) {
			foreach ($user as $item) {
				$_SESSION["userId"] = $item['ID'];
				$_SESSION["userName"] = $item['USERNAME'];
				$_SESSION["phone"] = $item['PHONE'];
				$_SESSION["diachi"] = $item['DIACHI'];
				$_SESSION["email"] = $item['EMAIL'];
				$_SESSION["displayName"] = $item['DISPLAYNAME'];
				$_SESSION["type"] = $item['QUYENHANG'];
			}
		}
		header('Location: ?controller=pages&action=index');
	}

	public function register()
	{
		if (!isset($_POST['txtUser']) || !isset($_POST["txtPass"]))
			header('Location: ?controller=pages&action=index');

		// $username = $_POST['txtUser'];

		$user = User::register($_POST['txtUser'], $_POST['txtDisplay'], $_POST['txtPhone'], $_POST['txtEmail'], $_POST['txtAddress'], $_POST['txtPass']);

		$user = User::loginUser($_POST['txtUser'], $_POST['txtPass']);
		if (isset($user)) {
			foreach ($user as $item) {
				$_SESSION["userId"] = $item['ID'];
				$_SESSION["userName"] = $item['USERNAME'];
				$_SESSION["phone"] = $item['PHONE'];
				$_SESSION["diachi"] = $item['DIACHI'];
				$_SESSION["email"] = $item['EMAIL'];
				$_SESSION["displayName"] = $item['DISPLAYNAME'];
				$_SESSION["type"] = $item['QUYENHANG'];
			}
		}

		header('Location: ?controller=pages&action=index');
	}

	public function updateUser()
	{
		if (!isset($_POST['txtEditUser']) || isset($_POST['txtEditAddress']))
			header('Location: ?controller=pages&action=index');


		$user = User::updateUser($_SESSION["userId"], $_POST['txtEditUser'], $_POST['txtEditDisplay'], $_POST['txtEditPhone'], $_POST['txtEditAddress'], $_POST['txtEditPass']);
		print_r($user);

		$users[] = User::getUserById($_SESSION["userId"]);

		if (isset($users)) {
			foreach ($users as $item) {
				$_SESSION["userId"] = $item['ID'];
				$_SESSION["userName"] = $item['USERNAME'];
				$_SESSION["phone"] = $item['PHONE'];
				$_SESSION["diachi"] = $item['DIACHI'];
				$_SESSION["email"] = $item['EMAIL'];
				$_SESSION["displayName"] = $item['DISPLAYNAME'];
				$_SESSION["type"] = $item['QUYENHANG'];
			}
		}

		// if(isset($user)){
		// 	$user = User::loginUser($user['username'],$user['password']);
		// }
		// return;

		// header('Location: ?controller=pages&action=index');
	}

	public function logout()
	{
		session_destroy();
		header('Location: ?controller=pages&action=index');
	}
}