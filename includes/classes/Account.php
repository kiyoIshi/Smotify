<?php

  class Account {

    public function __construct() {

    }

    public function register() {
      $this->validateUserName($username);
      $this->validateFirstName($firstname);
      $this->validateLastName($lastname);
      $this->validateEmails($email, $email2);
      $this->validatePasswords($password, $password2);
    }

    private function validateUserName($un) {

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