<?php
class database
{
  private static $instance = NULl;
  public static function getInstance()
  {
    if (!isset(self::$instance)) {
      try {
        // $server         = "LOCALHOST";
        // $db_username    = "SYSTEM";
        // $db_password    = "123456";
        // $service_name   = "DB12C";
        // $sid            = "DB12C";
        // $port           = 1521;

        $server         = "LOCALHOST";
        $db_username    = "demo";
        $db_password    = "123456";
        $service_name   = "orcl";
        $sid            = "orcl";
        $port           = 1521;

        $dbtns          = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $server)(PORT = $port)) (CONNECT_DATA = (SERVICE_NAME = $service_name) (SID = $sid)))";

        //$this->dbh = new PDO("mysql:host=".$server.";dbname=".dbname, $db_username, $db_password);

        self::$instance = new PDO("oci:dbname=" . $dbtns . ";charset=utf8", $db_username, $db_password, array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES => false,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ));
      } catch (PDOException $ex) {
        echo ($ex->getMessage());
      }
    }
    return self::$instance; // trả về kết nối
  }
}