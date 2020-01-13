<?php
session_start();
$msg = "Login";
?>

<?php include 'include/inc-css.php'; ?>
<?php include 'include/inc-nav-Member_profile.php'; ?>

<style>
  p {
    color: #000000
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
if (!isset($_SESSION["user"])) {
  header("location:index.php");
}

$startup_name = "";
include("include/DB.php");

$sql = "SELECT * FROM member_profile WHERE email = '" . $_SESSION['user'][0] . "'";

$result = mysqli_query($conn, $sql);

$profile = mysqli_fetch_assoc($result); //get profile user

$uid = $profile["id"];

$sql = "SELECT * FROM member_startup WHERE uid = '" . $uid . "'";
$result = mysqli_query($conn, $sql);

$attr = mysqli_fetch_assoc($result);

//var_dump($attr); 
$startup_name = $attr['startup_name']; //get value from proflie
$position = $attr['position'];
$servicecategory = $attr['service_category'];
$targetcustomer = $attr['target_customer'];
$fundingstage = $attr['funding_stage'];
$document_link = $attr['document_link'];
$video_link = $attr['vdo_link'];
$img_show = "imgsrc/" . $attr['logo'];


if (!isset($attr['service_category'])){

  $servicecategory = "Service category";
}
if (!isset($attr['target_customer'])){

  $targetcustomer = "Target customer";
}
if (!isset($attr['funding_stage'])){

  $fundingstage = "Funding state";
}

//&& isset($_POST['imagelogo'])

//var_dump($result);

$imgShow = "images/logoStartUP.png";

if ($result->num_rows <= 0) {

  $img_show = "images/logoStartUP.png";
}

else {
  $img_show = "imgsrc/" . $attr['logo'];
}


if (
  isset($_POST['startupname']) && isset($_POST['position']) && isset($_POST['servicecategory']) && isset($_POST['targetcustomer']) && isset($_POST['fundingstage'])
  && isset($_POST['documentlink']) && isset($_POST['videolink'])
) {

  if ($result->num_rows <= 0) {  //insert--------------------------------------->
    $ext = pathinfo(basename($_FILES['imagelogo']['name']), PATHINFO_EXTENSION); //เช็คนามสกุลไฟล์ ด้วยจะดึงชื่อไฟล์พร้อมนามสกุล มาเก็บไว้ใน ext
    $new_image_name = 'img_' . uniqid() . "." . $ext; // ชื่อไฟล์ใหม่ โดยไม่ซ้ำ ขึ้นต้นด้วย img_ 
    $image_path = "imgsrc/"; //ระบุที่อยูไฟล์ใหม่
    $upload_path = $image_path . $new_image_name;

    $success = move_uploaded_file($_FILES['imagelogo']['tmp_name'], $upload_path);
    if ($success == FALSE) {
      echo "ไม่สามารถอัปโหลดไฟล์ได้";
      exit();
    }

    $img = $new_image_name;

    //$img_def = "images/logoStartUP.png";  = "imgsrc/".$img;
    $sname = $_POST['startupname'];
    $position = $_POST['position'];
    $service_cate = $_POST['servicecategory'];
    $target_cus = $_POST['targetcustomer'];
    $funding_stage = $_POST['fundingstage'];
    $document = $_POST['documentlink'];
    $vdo = $_POST['videolink'];

    $tb_member_startup = "member_startup";

    $sql_member_startup = "INSERT INTO $tb_member_startup(`uid`,`logo`,`startup_name`,`position`,`service_category`,`target_customer`,`funding_stage`,`document_link`,`vdo_link`) 
		VALUES ('$uid','$img','$sname','$position','$service_cate','$target_cus','$funding_stage','$document','$vdo')";
    //var_dump($sql_member_startup);
    mysqli_query($conn, $sql_member_startup);
    
    $imgShow = "imgsrc/" . $img;
    header("location:DashboardMember.php");
  } 
  
  
  if  ($result->num_rows > 0)  {     ///update -------------------------------------->


    if (!isset($_FILES['imagelogo'])){
      $img_show = $imgNew = $attr['logo'];

    }
    else if (isset($_FILES['imagelogo'])){
      $ext = pathinfo(basename($_FILES['imagelogo']['name']), PATHINFO_EXTENSION); //เช็คนามสกุลไฟล์ ด้วยจะดึงชื่อไฟล์พร้อมนามสกุล มาเก็บไว้ใน ext
      $new_image_name = 'img_' . uniqid() . "." . $ext; // ชื่อไฟล์ใหม่ โดยไม่ซ้ำ ขึ้นต้นด้วย img_ 
      $image_path = "imgsrc/"; //ระบุที่อยูไฟล์ใหม่
      $upload_path = $image_path . $new_image_name;
  
      $success = move_uploaded_file($_FILES['imagelogo']['tmp_name'], $upload_path);
      if ($success == FALSE) {
        echo "ไม่สามารถอัปโหลดไฟล์ได้";
        exit();
      }
  
      $img_show = $new_image_name;
      
 
    }

    $sname = $_POST['startupname'];
    $position = $_POST['position'];
    $service_cate = $_POST['servicecategory'];
    $target_cus = $_POST['targetcustomer'];
    $funding_stage = $_POST['fundingstage'];
    $document = $_POST['documentlink'];
    $vdo = $_POST['videolink'];

    $tb_member_startup = "member_startup";

    $sql_update_member_startup = "UPDATE $tb_member_startup SET startup_name='$sname',position='$position',service_category='$service_cate',target_customer='$target_cus',
      funding_stage='$funding_stage',document_link='$document',vdo_link='$vdo',logo='$img_show' WHERE uid='$uid'";

    $resultl_update_member_startup = mysqli_query($conn, $sql_update_member_startup);
    //var_dump($resultl_update_member_startup);

    header("location:DashboardMember.php");
  }
}
?>

<body id="page-top">

  <h1 style="margin-top:170px; margin-bottom: 60px; text-align: center;" class=""> STARTUP </h1>
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
                      <img style="border-radius: 50%;" height="200px" src="<?php echo $img_show ?>" alt="logo">
                      <div class="validation"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="file" class="form-control-file" name="imagelogo" id="imagelogo" />
                        <div class="validation"></div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="text" class="form-control" name="startupname" id="startupname" placeholder="Startup name" value="<?php echo $startup_name; ?>" required />
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="position" class="form-control" name="position" id="position" value="<?php echo $position; ?>" placeholder="Position" required />
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <select id="inputState" class="form-control" name="servicecategory" required>
                        <option disable selected><?php echo $servicecategory; ?></option>
                        <option value="">Product Category *</option>
                        <option value="AI / Big Data / Machine Learning">AI / Big Data / Machine Learning</option>
                        <option value="Agriculture Tech/Food Tech">Agriculture Tech/Food Tech</option>
                        <option value="IoT &amp; Robotics">IoT &amp; Robotics</option>
                        <option value="Advertising &amp; Media Tech">Advertising &amp; Media Tech</option>
                        <option value="Logistics">Logistics</option>
                        <option value="Medical">Medical</option>
                        <option value="Fin Tech">Fin Tech</option>
                        <option value="Energy Tech">Energy Tech</option>

                      </select>
                      <div class="validation"></div>
                    </div>

                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <select id="inputState" class="form-control" name="targetcustomer" required>
                        <option disable selected> <?php echo $targetcustomer; ?> </option>
                        <option>University 2</option>
                        <option>University 3</option>
                        <option>University 4</option>
                        <option>University 5</option>
                        <option>University 6</option>
                        <option>University 7</option>
                        <option>University 8</option>
                        <option>University 9</option>
                        <option>University 10</option>

                      </select>
                      <div class="validation"></div>
                    </div>

                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <select id="inputState" class="form-control" name="fundingstage" required>
                        <option disable selected><?php echo $fundingstage; ?></option>
                        <option value="">Funding Stage *</option>
                        <option value="Pre-Seed (Less than 3 Million THB)">Pre-Seed (Less than 3 Million THB)</option>
                        <option value="Seed (3 Million THB)">Seed (3 Million THB)</option>
                        <option value="Pre Series A (3 Million - 30 Million THB">Pre Series A (3 Million - 30 Million THB</option>
                        <option value="Series A (30 Million THB)">Series A (30 Million THB)</option>
                        <option value="Above Series A (More than 30 Million THB)">Above Series A (More than 30 Million THB)</option>

                      </select>
                      <div class="validation"></div>
                    </div>

                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input class="form-control" name="documentlink" value="<?php echo $document_link; ?>" id="documentlink" placeholder="Document link" required />
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input class="form-control" name="videolink" id="videolink" value="<?php echo $video_link; ?>" placeholder="Video link / other social media" required />
                      <div class="validation"></div>
                    </div></br>
                  </div>

                  <div class="col">
                    <button type="submit" style="background-color: #EB232A" class="button button-a btn-lg w-100">Save</button>
                  </div>

                  <div class="col">
                   <button type="reset"  style="background-color: #EB232A" class="button button-a btn-lg w-100">Cancel</button>
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