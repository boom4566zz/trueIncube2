<?php
session_start();
$msg = "Login";
?>

<?php include 'include/inc-css.php'; ?>
<?php include 'include/inc-nav-Member_profile.php'; ?>

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

  .chackboxmargin {
    margin-left: -20px
  }
</style>

<?php
if (!isset($_SESSION["user"])) {
  header("location:index.php");
}

include("include/DB.php");

$sql = "SELECT * FROM member_profile WHERE email = '" . $_SESSION['user'][0] . "'";
$result = mysqli_query($conn, $sql);

$profile = mysqli_fetch_assoc($result); //get profile user
//var_dump($profile);

$e_mail = $profile['email'];
$display_name = $profile['disname'];
$phonenum = $profile['phone_num'];
$fac = $profile['faculty'];
$grad = $profile['grad_level'];
$citizen_id = $profile['citizen_id'];
$ti_tle = $profile['title'];
$fname = $profile['fname'];
$lname = $profile['lname'];
$birth = $profile['birthday'];
$sexx = $profile['sex'];
$exp = $profile['work_exp'];
$true = $profile['truelap'];
$univer = $profile['university'];
$img_show = "imgsrc/" . $profile['avatar'];

//var_dump($result);
//var_dump($profile);

if (strlen($profile['university']) == 0) {
  $univer = "- โปรดเลือกสถานศึกษาของคุณ -";
}
if (strlen($profile['title']) == 0) {
  $ti_tle = "Title";
}
if (strlen($profile['sex']) == 0) {
  $sexx = "Sex";
}

if (strlen($profile['avatar']) == 0) {
  $img_show = "images/M-placeholder-illustrations-vector.jpg";
  echo $img_show;
}

if (!strlen($profile['avatar']) == 0) {
  $img_show = "imgsrc/" . $profile['avatar'];

}



$imgShow = "images/M-placeholder-illustrations-vector.jpg";

if ($result->num_rows <= 0) {
  $img_show = "images/M-placeholder-illustrations-vector.jpg";
}
if ($result->num_rows > 0) {
  



}

if (
  isset($_POST['displayname']) && isset($_POST['university']) && isset($_POST['otheruniversity']) && isset($_POST['faculty']) && isset($_POST['graduate'])
  && isset($_POST['citizenid']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phonenumber'])
  && isset($_POST['title']) && isset($_POST['birthday']) && isset($_POST['sex']) && isset($_POST['experience']) && isset($_POST['truelab'])
) {




  if ($result->num_rows <= 0) { //insert--------------------------------------->
    $ext = pathinfo(basename($_FILES['inputimage']['name']), PATHINFO_EXTENSION); //เช็คนามสกุลไฟล์ ด้วยจะดึงชื่อไฟล์พร้อมนามสกุล มาเก็บไว้ใน ext
    $new_image_name = 'img_' . uniqid() . "." . $ext; // ชื่อไฟล์ใหม่ โดยไม่ซ้ำ ขึ้นต้นด้วย img_ 
    $image_path = "imgsrc/"; //ระบุที่อยูไฟล์ใหม่
    $upload_path = $image_path . $new_image_name;

    $success = move_uploaded_file($_FILES['inputimage']['tmp_name'], $upload_path);
    if ($success == FALSE) {
      //   echo "ไม่สามารถอัปโหลดไฟล์ได้ ";
      exit();
    }

    $img = $new_image_name;


    $displayname = $_POST['displayname'];
    $university = $_POST['university'];
    $otheruniversity = $_POST['otheruniversity'];
    $faculty = $_POST['faculty'];
    $graduate = $_POST['graduate'];
    $citizenid = $_POST['citizenid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $title = $_POST['title'];
    $birthday = $_POST['birthday'];
    $sex = $_POST['sex'];
    $experience = $_POST['experience'];
    $truelab = $_POST['truelab'];



    $tb_member_profile = "member_profile";

    $sql_member_profile = "INSERT INTO $tb_member_profile(`email`,`disname`,`phone_num`,`faculty`,`grad_level`,`citizen_id`,`title`,`fname`,`lname`,`birthday`
  ,`sex`,`work_exp`,`truelap`,`university`) 
		VALUES ('$email','$displayname','$phonenumber','$faculty','$graduate','$citizenid','$title','$firstname','$lastname','$birthday','$sex'
    ,'$experience','$truelab','$university')";

    mysqli_query($conn, $sql_member_profile);

    $imgShow = "imgsrc/" . $img;

    header("location:DashboardMember.php");
    //----------------------------------------//

  }

  if ($result->num_rows > 0) {  //update--------------------------------------->


    if (isset($_FILES['inputimage']) && (strlen($_FILES['inputimage']['name']) > 0)) {

      var_dump($_FILES['inputimage']);
      $ext = pathinfo(basename($_FILES['inputimage']['name']), PATHINFO_EXTENSION); //เช็คนามสกุลไฟล์ ด้วยจะดึงชื่อไฟล์พร้อมนามสกุล มาเก็บไว้ใน ext
      $new_image_name = 'img_' . uniqid() . "." . $ext; // ชื่อไฟล์ใหม่ โดยไม่ซ้ำ ขึ้นต้นด้วย img_ 
      $image_path = "imgsrc/"; //ระบุที่อยูไฟล์ใหม่
      $upload_path = $image_path . $new_image_name;
      echo "gggg" . $img_show;
      $success = move_uploaded_file($_FILES['inputimage']['tmp_name'], $upload_path);
      if ($success == FALSE) {
        echo "ไม่สามารถอัปโหลดไฟล์ได้ C";
        exit();
      }

      $img_show = $new_image_name;
      // echo "cvvc" .  $img_show;
    } else {
      $img_show = $imgNew =  $profile['avatar'];
    }
    $displayname = $_POST['displayname'];
    $university = $_POST['university'];
    $otheruniversity = $_POST['otheruniversity'];
    $faculty = $_POST['faculty'];
    $graduate = $_POST['graduate'];
    $citizenid = $_POST['citizenid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $title = $_POST['title'];
    $birthday = $_POST['birthday'];
    $sex = $_POST['sex'];
    $experience = $_POST['experience'];
    $truelab = $_POST['truelab'];

    $tb_member_profile = "member_profile";



    $sql_update_member_profile = "UPDATE $tb_member_profile SET disname='$displayname',phone_num='$phonenumber',faculty='$faculty',grad_level='$graduate',citizen_id='$citizenid',title='$title',fname='$firstname',
    lname='$lastname',birthday='$birthday',sex='$sex',work_exp='$experience',truelap='$truelab',avatar='$img_show',university='$university' WHERE email='$email'";

    $resultl_update_member_profile = mysqli_query($conn, $sql_update_member_profile);
    var_dump($sql_update_member_profile);

    header("location:DashboardMember.php");
  }
}
?>

<body id="page-top">

  <h1 style="margin-top:170px; margin-bottom: 60px; text-align: center;" class=""> PROFILE </h1>
  <div class="intro route bg-image" style="background-image: url(#fff)">
    <!-- <div class="overlay-itro"></div> -->
    <div class="intro-content display-table">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">

        <div class="container">

          <div class="row">
            <div class="col"></div>
            <div class="col">
              <form action="" method="post" enctype="multipart/form-data" role="form" class="contactForm">
                <div id="errormessage"></div>
                <div class="row">

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <img style="border-radius: 50%;" height="200px" src="<?php echo $img_show; ?>" alt="Avatar">
                      <div class="validation"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="file" class="form-control-file" name="inputimage" id="inputimage" />
                        <div class="validation"></div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="text" class="form-control" name="displayname" id="displayname" value="<?php echo $display_name; ?>" placeholder="Display name" required />
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col col-lg-3">
                    <p style="color: black">Education</p>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <select id="university" class="form-control" name="university" required>
                        <option disable selected><?php echo $univer; ?></option>
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

                    <div class="col-lg-2">

                      <div class="form-check ">
                        <input class="form-check-input chackboxmargin" type="checkbox" id="autoSizingCheck2">
                        <label style="color: 606060 " class="form-check-label">
                          Graduated
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="text" class="form-control" name="otheruniversity" id="otheruniversity" placeholder="Other university" />
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input class="form-control" name="faculty" id="faculty" value="<?php echo $fac; ?>" placeholder="Faculty" required />
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input class="form-control" name="graduate" id="graduate" value="<?php echo $grad; ?>" placeholder="Graduate level" required />
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col col-lg-3">
                    <p style="color: black">Information</p>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input class="form-control" name="citizenid" id="citizenid" value="<?php echo $citizen_id; ?>" placeholder="Citizen ID (ระบุเลขบัตรประจำตัวประชาชน)" required />
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input class="form-control" name="firstname" id="firstname" value="<?php echo $fname; ?>" placeholder="First name" required />
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input class="form-control" name="lastname" id="lastname" value="<?php echo $lname; ?>" placeholder="Last name" required />
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" id="email" value="<?php echo $e_mail; ?>" placeholder="E-mail" readonly />
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input class="form-control" name="phonenumber" id="phonenumber" value="<?php echo $phonenum; ?>" placeholder="Mobile Phone Number" required />
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <select id="title" class="form-control" name="title" required>
                        <option disable selected><?php echo $ti_tle; ?> </option>
                        <option>นาย</option>
                        <option>นาง</option>
                        <option>นางสาว</option>
                      </select>
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="date" class="form-control" name="birthday" id="birthday" value="<?php echo $birth; ?>" placeholder="Birth of Date" required />
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <select id="sex" class="form-control" name="sex" required>
                        <option disable selected><?php echo $sexx; ?></option>
                        <option>ชาย</option>
                        <option>หญิง</option>
                      </select>
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col col-lg-3">
                    <p style="color: black">Experience</p>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <textarea class="form-control" name="experience" id="experience" rows="8" value="" placeholder="Work Experience"><?php echo $exp; ?></textarea>
                    </div>
                  </div>

                  <div class="col col-lg-3">
                    <p style="color: black">TrueLAB</p>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input class="form-control" name="truelab" id="truelab" value="<?php echo $true; ?>" placeholder="TrueLAB Menbership" required />
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