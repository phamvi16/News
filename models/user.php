<?php
class User
{
	public $id;
	public $displayname;
	public $username;
	public $password;
	public $phone;
	public $diachi;
	public $email;
	public $quyenhang;

	function __construct($id, $displayname, $username, $password, $phone, $diachi, $email, $quyenhang)
	{
		$this->id = $id;
		$this->displayname = $displayname;
		$this->username = $username;
		$this->password = $password;
		$this->phone = $phone;
		$this->diachi = $diachi;
		$this->email = $email;
		$this->quyenhang = $quyenhang;
	}

	static function loginUser($username, $password)
	{
		$db = database::getInstance();
		$query = "SELECT * FROM ORUSER where USERNAME = '$username' AND PASSWORD = '$password'";
		// echo $query;return;
		$req = $db->query($query);

		$item = $req->fetchAll();

		return $item;
	}

	static function register($username, $displayname, $phone, $email, $diachi, $password)
	{
		$db = database::getInstance();

		// $user = self::getUserByUsername($username);
		// if(isset($user)) return NULL;

		$query = "INSERT INTO ORUSER (ID, DISPLAYNAME, USERNAME, PASSWORD, PHONE, DIACHI, EMAIL, QUYENHANG) VALUES (ORUSER_SEQ.nextval,'$displayname','$username','$password','$phone','$diachi','$email',0)";
		// ('ORUSER_SEQ.nextval','$displayname','$username','$password','$phone','$diachi','$email',0)

		$req =  $db->query($query);
	}




	static function updateUser($id, $username, $displayname, $phone, $diachi, $password)
	{
		$db = database::getInstance();
		$query = "UPDATE ORUSER SET USERNAME = '$username',DISPLAYNAME ='$displayname',";
		if (isset($password) && trim($password) != "")
			$query .= "PASSWORD ='$password',";
		$query .= "PHONE='$phone',DIACHI='$diachi' WHERE ID = '$id' ";
		try {
			$db->query($query);
			return ['username' => $username, 'password' => $password];
		} catch (PDOException $Exception) {
			return null;
		}
	}

	// static function getUserByUsername($username){
	//     $db = database::getInstance();
	//     $req = $db->query("SELECT *FROM ORUSER WHERE USERNAME='$username'");

	//     $item = $req->fetchAll();

	// 	return $item;
	// }

	static function getUserById($id)
	{
		$db = database::getInstance();
		$query = "SELECT * FROM ORUSER WHERE ID='$id'";
		// print_r($query);return;
		$req = $db->query($query);

		$item = $req->fetch(PDO::FETCH_ASSOC);

		return $item;
	}

	static function getAllUser($SL = NULL)
	{
		$list = [];
		$db = database::getInstance();
		$query = 'SELECT * FROM ORUSER';
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

	static function deleteUserById($id)
	{
		$db = database::getInstance();

		$query = "DELETE FROM ORUSER WHERE ID=$id";

		$req = $db->query($query);
	}
}