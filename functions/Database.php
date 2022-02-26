<?php

class Database{

    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db = 'wordpress_todo';

public function connect(){

  try {
    $db = new mysqli($this->servername, $this->username, $this->password, $this->db);
   
    if ($db->connect_error) {
       return false;
    }else{
       return $db;
    }

  } catch (\Throwable $e) {
      $response = array(
          "status" => false,
          "msg" => $e->getMessage()
      );
      return $response['status'];
  }

}

}