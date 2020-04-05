<?php

function sanitizeFormPassword ($inputText) {
  $inputText = strip_tags($inputText);
  return inputText;
}

function sanitizeFormUsername ($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  return inputText;
}

function sanitizeFormString ($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  $inputText = ucfirst(strtolower($inputText));
  return inputText;
}

if(isset($_POST['resisterButton'])){
  //Register button was pressed"
  $username = sanitizeFormUsername($_POST['username']);
  $firsrname = sanitizeFormString($_POST['firstName']);
  $lastName = sanitizeFormString($_POST['lastNameame']);
  $email = sanitizeFormString($_POST['email']);
  $email2 = sanitizeFormString($_POST['email2']);
  $password = sanitizeFormPassword($_POST['password']);
  $password2 = sanitizeFormPassword($_POST['password2']);

 }

?>