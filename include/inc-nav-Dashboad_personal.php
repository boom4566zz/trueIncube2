<?php


include("include/DB.php");

if (!isset($_SESSION["user"])) {

    header("location:index.php");
  
}

$sql = "SELECT * FROM member_profile WHERE email = '" . $_SESSION['user'][0] . "'";
$result = mysqli_query($conn, $sql);

$profile = mysqli_fetch_assoc($result); //get profile user
//var_dump($profile);

if (strlen($profile['avatar']) == 0) {
  $img_show = "images/M-placeholder-illustrations-vector.jpg";

}

if (!strlen($profile['avatar']) == 0) {
  $img_show = "imgsrc/" . $profile['avatar'];

}

?>




<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top " id="mainNav" style="background-color: #000000;">
<div class="container">
    <a class="navbar-brand js-scroll" href="index.php"><img height="30px" src="https://www.trueincube.com/assets/images/incube-logo.png"></a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
      aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a  class="nav-link js-scroll " href="#"> <img height="30px" src="include/envelope.png."></a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll" href="#"><img style="border-radius: 50%;" height="30px" width="30px" src="<?php echo $img_show; ?>" alt="Avatar"></a>
        </li>
        <div class="dropdown">
  <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  
</a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="MemberProfile.php">Proflie</a>
    <a class="dropdown-item" href="changePassword.php">Change password</a>
    <a class="dropdown-item" href="detroy.php">Logout</a>
  </div>
</div>
      </ul>
    </div>
  </div>
</nav>
