<?php

  class Account {

    private $errorArray;

    public function __construct() {
      $this->errorArray = array();
    }

    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
      $this->validateUserName($un);
      $this->validateFirstName($fn);
      $this->validateLastName($ln);
      $this->validateEmails($em, $ema2);
      $this->validatePasswords($pw, $pw2);
    }

    private function validateUserName($un) {
      if(strlen($un) > 25 || strlen($un) < 5){
        array_push($this->errorArray, "Your username must be between 5 and 25 characters");
        return;
      }

      //TODO: check if username exists
    }
    
    private validateFirstName($un) {
      
    }
    
    private validateLasrName($un) {
      
    }
    
    private validateEmails($un) {
      
    }
    
    private validatePasswords($un) {
      
    }

  }

?>