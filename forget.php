
<?php $msg="Forget Password" ;?>
<?php include 'include/inc-nav-login.php'; ?>
<?php include 'include/inc-css.php'; 


if (isset($_SESSION["username"])){

}

if($_SESSION["user"][1]=="admin")
{
  $sql_signin = "SELECT * FROM `admin` WHERE username='"+$_SESSION["user"][0]+"'";
  $result_signin = mysqli_query($conn, $sql_signin);

}

if($_SESSION["user"][1]=="user")
{
  $sql_signin = "SELECT * FROM `signin` WHERE email='"+$_SESSION["user"][0]+"'";
  $result_signin = mysqli_query($conn, $sql_signin);

}
else{

}
?>
<style>

p{color: #aaa}
p.ex {display: inline;}
.buttoncolor{background-color: #EA1C24}
.intro{
  margin-top: 0%;
}
H1{color: #EA1C24}
</style>

<body id="page-top">

<div id="home" class="intro route bg-image  " style="background-image: url(#fff)">
    <!-- <div class="overlay-itro"></div> -->
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <div class="row">
            <div class="col"></div>
            <div class="col-4">
          <form action="" method="post" role="form" class="contactForm" >
          <div id="errormessage"></div>
          <div class="row">
          
            <div class="col-md-12 mb-3"> 
               <h1 style=" margin-top:140px;  margin-bottom: 60px; text-align: center;" class=""> FORGET PASSWORD</h1>
              <p>Please fill in email for receive link for reset password</p>
            </div>
            <div class="col-md-12 mb-3">
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required  />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-12">
              <button  type="submit" class="button button-a btn-lg w-100 buttoncolor ">Send</button>
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
