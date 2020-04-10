<?php
  ob_start();
  session_start();

  $timezone = date_default_timezone_set("Asia/Tokyo");

  $con = mysqli_connect("localhost", "root", "root", "smotify");

  if(mysqli_connect_errno()) {
    echo "Failed to connect: " .mysql_connect_errno();
  }

?>