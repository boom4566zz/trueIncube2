<?php $msg = "Sign UP"; ?>
<?php include 'include/inc-css.php'; ?>
<?php include 'include/inc-nav-login.php'; ?>
<style>
  label {
    color: #aaa
  }

  .form-check {
    margin-top: 68%;
    margin-right: 70%;
  }

  h1 {
    color: #EA1C24
  }

  button {
    background-color: #EA1C24
  }
</style>

<?php

if (isset($_SESSION["user"])) {
  header("location:index.php");
}

include("include/DB.php");
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['displayname']) && isset($_POST['phone']) && isset($_POST['university']) && isset($_POST['graduated']) && isset($_POST['confirmpassword'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $dname = $_POST['displayname'];
  $phone = $_POST['phone'];
  $university = $_POST['university'];
  $graduated = $_POST['graduated'];
  $conf_pass = $_POST['confirmpassword'];

  $tb_signin = "signin";
  $tb_member_profile = "member_profile";

  $sql_signin = "INSERT INTO $tb_signin(`email`,`password`) 
      VALUES ('$email','$pass')";

  $sql_member_profile = "INSERT INTO $tb_member_profile(`disname`,`university`,`phone_num`,`email`) 
		VALUES ('$dname','$university','$phone','$email')";


  mysqli_query($conn, $sql_signin);
  mysqli_query($conn, $sql_member_profile);

  header("location:login.php");
}
?>

<body id="page-top">

  <h1 style="margin-top:170px; margin-bottom: 60px; text-align: center;" class=""> SIGN UP </h1>
  <div class="intro route bg-image" style="background-image: url(#fff)">
    <!-- <div class="overlay-itro"></div> -->
    <div class="intro-content display-table">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
        <div class="container">
          <div class="row">
            <div class="col"></div>
            <div class="col">
              <form action="" method="post" role="form" class="contactForm">
                <div id="errormessage"></div>
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="text" class="form-control" name="displayname" id="displayname" placeholder="Display name" required />
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required />
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="tel" class="form-control" name="phone" id="phone" placeholder="Mobile phone" required />
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <select name="university" id="university" class="form-control" required>
                        <option disable selected>- โปรดเลือกสถานศึกษาของคุณ -</option>
                        <option>สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง</option>
                        <option>มหาวิทยาลัยเชียงใหม่</option>
                        <option>มหาวิทยาลัยมหิดล</option>
                        <option>มหาวิทยาลัยธรรมศาสตร์</option>
                        <option>มหาวิทยาลัยศรีนครินทรวิโรฒ</option>
                        <option>มหาวิทยาลัยเทคโนโลยีมหานคร</option>
                        <option>มหาวิทยาลัยเกษตรศาสตร์</option>
                        <option>จุฬาลงกรณ์มหาวิทยาลัย</option>
                        <option>มหาวิทยาลัยขอนแก่น</option>
                        <option>มหาวิทยาลัยอัสสัมชัญ</option>

                      </select>
                      <div class="validation"></div>

                    </div>

                  </div>

                  <div class="form-group">
                    <div style="margin-right: 50px" class="col-md-12 mb-3">
                      <input type="checkbox" class="form-check-input" name="graduated" id="dropdownCheck">
                      <label class="form-check-label" for="dropdownCheck">
                        Graduated
                      </label>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required />
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm password" required />
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <button type="submit" style="background-color: #EB232A" id="signup" class="button button-a btn-lg w-100">Sign up</button>

                  </div>
                </div>


            </div>
            <div class="col">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>
  <?php include 'include/inc-js.php'; ?>

  <script>
    $(signup).click(function(e) {

      var password = $("#password").val();
      var confirmPassword = $("#confirmpassword").val();

      if (password != confirmPassword) {
        e.preventDefault();
        alert('confirm password not match');
      }


    });
  </script>
</body>