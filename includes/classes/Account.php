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
    
    private function validateFirstName($fn) {
      if(strlen($fn) > 25 || strlen($fn) < 2){
        array_push($this->errorArray, "Your firstname must be between 2 and 25 characters");
        return;
      }
    }
    
    private function validateLastName($ln) {
      if(strlen($n) > 25 || strlen($ln) < 2){
        array_push($this->errorArray, "Your lastname must be between 2 and 25 characters");
        return;
      }
    }
    
    private function validateEmails($em, $em2) {
      if ($em != $em2) {
        array_push($this->errorArray, "Your emails doesn't match");
        return;
      }
      if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
        array_push($this->errorArray, "Email is invalid");
        return;
      }

      //TODO: check that username hasn't already been used
    }
    
    private validatePasswords($un) {
      
    }

  }

?>