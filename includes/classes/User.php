<?php

  class User {

    private $con;

    public function __construct($con, $username) {
      $this->con =$con;
      $this->username = $username;
    }

  }

?>