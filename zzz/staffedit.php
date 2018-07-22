<?php
session_start();
function __autoLoad($class){
  require_once "classes/$class.php";
}

if (isset($_GET['staffid'])) {
  // code...
  $id = $_GET['staffid'];
  $useredit= new Users();
  $useredit->getSingleUser($id);

}
else {
  header('location:test.php');
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="" content="">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <!-- navbar goes here -->
    <section class="welcomej">
    <div class="jumbotron jumbotron-fluid ">
      <div class="container text-center">
        <h1 class="display-4">Project Management System</h1>
        <p class="lead">Management of students project made easier</p>
        <p class="detail">*Retrieve project   *Check Project allocation *Project Topic statistic *Project Topic Grouping ETC</p>
      </div>
    </div>
  </section>


      <form class="p-5 p-10 my-5" action="staffs.php" method="post" style="width:90%; margin: 0 auto; padding:10%;">
          <div class="form-group">
            <label for="staff_">Name</label>
            <input type="text" name="staff_name" id="staff_name" class="form-control" value="<?php echo $staff['name'] ?>">
          </div>

          <div class="form-group">
            <label for="Email">Staff Email</label>
            <input type="email" name="staff_email" id="staff_email" class="form-control" value="<?php echo $staff['email'] ?>">
          </div>

          <div class="form-group">
            <label for="post">post</label>
            <input type="text" name="staff_post" id="staff_post" class="form-control" value="<?php echo $staff[post] ?>">
          </div>

        <input type="submit" name="Create_staff" id="Create_staff" value="Create Staff" class="form-control btn-primary">
      </form>
      <div class="mt-5  text-center" id="reply_staff">

        <?php if(isset($_SESSION['result'])) {
          // code...
        ?>
          <h1 class="text-center text-danger mb-5 pb-5"> <?php echo $_SESSION['result']; ?></h1>
        <?php

        }
          unset($_SESSION['result']);

        ?>


      </div>


    <!-- footer goes here -->
    <section class="bottom">
    <div class="container">


      <p>ALL RIGHT RESERVED. COPYRIGHT (c) Dr. Mrs Adetuni</p>


    </div>
  </section>


    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
