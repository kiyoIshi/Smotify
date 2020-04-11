<?php
include("includes/config.php");

//session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
  header("Location: register.php");
}
?>

<head>
  <title>Welcome to Smotify!</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  

  <div id="nowPlayingBarContainer">

  </div>
</body>
</html>