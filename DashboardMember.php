<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <title> Dashboad</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php $msg = "Login"; ?>
  <?php include 'include/inc-css.php'; ?>
  <?php include 'include/inc-nav-Dashboad_personal.php'; ?>

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/custom_style.css">

  <?php

/*if (!isset($_SESSION["user"])) {



  if ($_SESSION["user"][1] == "admin") {
    $sql_signin = "SELECT * FROM `admin` WHERE username='" + $_SESSION["user"][0] + "'";
    $result_signin = mysqli_query($conn, $sql_signin);
  }

  if ($_SESSION["user"][1] == "user") {
    $sql_signin = "SELECT * FROM `signin` WHERE email='" + $_SESSION["user"][0] + "'";
    $result_signin = mysqli_query($conn, $sql_signin);
  } else {
    header("location:index.php");
  }
} */
  ?>




</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav style="margin-top: 50px" id="sidebar">
      <div class="p-4 pt-5">

        <ul class="list-unstyled components mb-5">


          <li>
            <a href="#">Dashboard</a>
          </li>

          <li>
            <a href="MemberStartupProfile.php">Startup</a>
          </li>

          <li>
            <a href="#">Company</a>
          </li>

          <li>
            <a href="#">Terms</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Page Content  -->
    <div style="margin-top: 50px" id="content" class="p-4 p-md-5">


      <h2 class="mb-4">Welcome to ...</h2>
      <h6 class="mb-4">Timeline</h6>
      <hr>
      <p>please complete your <a href="MemberProfile.php">personal profile</a> and <a href="MemberStartupProfile.php"> startup profile </a></p>

      <h6 class="mb-4">Overview</h6>
      <hr>
      <p>next activity : today</p>
      <p>activity name : <a href="#"> click to complete your personal profile</a> </p>
      <p>location : online</p>
    </div>


  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>