
  <?php $msg="Login"; ?>
  <?php include 'include/inc-css.php'; ?>
  <?php include 'include/inc-nav-Member_profile.php';

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
  a{color: #EA1C24;}
  h1{color: #EA1C24;}
  .chackboxmargin{margin-left: -20px}

  </style>

<body id="page-top">

<h1 style="margin-top:350px; margin-bottom: 60px; text-align: center;"  class="" >  CHANGE PASSWORD </h1>
<div class="intro route bg-image" style="background-image: url(#fff)">
    <!-- <div class="overlay-itro"></div> -->
    <div class="intro-content display-table">
      <div class = "wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">


      
        <div class="container">

        
        <div class="row">
            <div class="col"></div>
              <div class="col">
          <form action="" method="post" role="form" class="contactForm" >
          <div id="errormessage"></div>
          <div class="row">

            <div class="col-md-12 mb-3">
              <div class="form-group">
                <input type="text" class="form-control" name="new password" id="new password" placeholder="New password" required  />
                <div class="validation"></div>
              </div>
            </div>




            <div class="col-md-12 mb-3">
              <div class="form-group">
                <input type="text" class="form-control" name="confirm new password" id="confirm new password" placeholder="Confirm new password" required  />
                <div class="validation"></div>
              </div>
            </div>


 

            <div class="col">
              <button type="submit" style="background-color: #EB232A" class="button button-a btn-lg w-100">Save</button>
            </div>

            
            <div class="col">
              <button type="submit" style="background-color: #EB232A" class="button button-a btn-lg w-100">Cancel</button>
            </div>

          </div>
        </form>

          </div>
          <div class="col">
            <div class="col ">
             
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>
  <?php include 'include/inc-js.php'; ?>
</body>