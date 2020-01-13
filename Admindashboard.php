<!doctype html>
<html lang="en">

<head>
  <title> Admin dashboard</title>
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
            <a href="#">Startup</a>
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



      <br>
      <h6 class="mb-4">filter</h6>
      <hr>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <select id="inputState" class="form-control" required>
              <option selected>start date </option>
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

        <div class="col">
          <div class="form-group">
            <select id="inputState" class="form-control" required>
              <option selected>end date </option>
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

        <div class="col">
          <div class="form-group">
            <select id="inputState" class="form-control" required>
              <option selected>group by... </option>
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

      </div>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">name</th>
            <th scope="col">surname</th>
            <th scope="col">email</th>
            <th scope="col">phone no.</th>
            <th scope="col">university</th>
            <th scope="col">register date</th>
            <th scope="col">complete %</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <!--<th scope="row">m_name</th>-->
            <td>m_name</td>
            <td>m_surname</td>
            <td>mail@xxxxx.com</td>
            <td>+66-89123-4567</td>
            <td>University 01</td>
            <td>22 dec 2019</td>
            <td>0</td>

          </tr>
          <tr>
            <td>m_name</td>
            <td>m_surname</td>
            <td>mail@xxxxx.com</td>
            <td>+66-89123-4567</td>
            <td>University 01</td>
            <td>22 dec 2019</td>
            <td>0</td>

          </tr>
          <tr>
            <td>m_name</td>
            <td>m_surname</td>
            <td>mail@xxxxx.com</td>
            <td>+66-89123-4567</td>
            <td>University 01</td>
            <td>22 dec 2019</td>
            <td>0</td>
          </tr>
          <tr>
            <td>m_name</td>
            <td>m_surname</td>
            <td>mail@xxxxx.com</td>
            <td>+66-89123-4567</td>
            <td>University 01</td>
            <td>22 dec 2019</td>
            <td>0</td>
          </tr>

        </tbody>
      </table>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>