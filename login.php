<?php
session_start();

/*if (isset($_SESSION["user"])){

header("location:index.php");
}*/
$msg = "Login"; ?>
<?php include 'include/inc-css.php'; ?>
<?php include 'include/inc-nav-login.php'; ?>
<style>
  p {
    color: #aaa
  }

  p.ex {
    display: inline;
  }

  a {
    color: #EA1C24;
  }

  h1 {
    color: #EA1C24;
  }
</style>
<?php

include("include/DB.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];


  $sql_signin = "SELECT * FROM `admin` WHERE username='$username' AND password='$password' ";
  $result_signin = mysqli_query($conn, $sql_signin);

  $sql_signin = "SELECT * FROM `signin` WHERE email='$username' AND password='$password'";
  $result_signin = mysqli_query($conn, $sql_signin);

  if ($result_admin->num_rows == 1) {
    $_SESSION["user"][] = $username;
    $_SESSION["user"][] = 'admin';
    header("location:Admindashboard.php");
  }

  $result_signin = mysqli_query($conn, $sql_signin);

  if ($result_signin->num_rows == 1) {

    $_SESSION["user"][] = $username;
    $_SESSION["user"][] = 'user';

    header("location:DashboardMember.php");
  }

 // echo "ไม่ผ่าน"; 
}
?>

<body id="page-top"></br></br></br></br>

  <h1 style="margin-top:170px; margin-bottom: 30px; text-align: center;" class=""> LOGIN </h1>
  <div id="home" class="intro route bg-image" style="background-image: url(#fff)">
    <!-- <div class="overlay-itro"></div> -->
    <div class="intro-content display-table">

      <div>
        <div class="container">
          <div class="row">
            <div class="col"></div>
            <div class="col">
              <form action="" method="post" role="form" class="contactForm">
                <div id="errormessage"></div>
                <div class="row">
                  <div class="col-md-12 mb-3">
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input class="form-control" name="username" id="username" placeholder="Username" required />
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required />
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" style="background-color: #EB232A" id="login" class="button button-a btn-lg w-100">Login</button>
                  </div>
                  <div class="col-md-12 mb-3">
                    <br><br>
                    <a href="forget.php">forget password</a>
                    <p class="ex">or</p>
                    <a href="signup.php">sign up</a>
                  </div>
                </div>
              </form>

            </div>
            <div class="col"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>
  <?php include 'include/inc-js.php'; ?>


</body>