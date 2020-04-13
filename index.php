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

  <div id="mainContainer">

  <div id="topContainer">

    <?php include("includes/navBarContainer.php"); ?>

    <div id="mainViewContainer">
      <div id="mainContent">
        
      </div>
    </div>
  </div>

    <?php include("includes/nowPlayingBarContainer.php"); ?>
  </div>

</body>
</html>