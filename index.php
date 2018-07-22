<?php
session_start();
require('database/connect.php');
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
    <title>PROJECT MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="datatables/css/dataTables.bootstrap.min.css">
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

    <!--login form goes here -->
    <?php if (!isset($_SESSION['user'])): ?>
    <section class="welcomef">
    <div class="container my-5">
      <div class="row">
        <div class="col-md-6">

            <form class="p-5" action="process.php" method="post" id="loginform">
              <h5 class="text-center">Enter Details</h5>
              <fieldset class="form-group">
                <label for="USERNAME">USERNAME</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="username">
              </fieldset>
              <fieldset class="form-group">
                <label for="password">PASSWORD</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password">
              </fieldset>
              <input type="submit" name="loginbtn" value="Login" class="btn btn-primary btn-block" id="loginbtn">
            </form>

            <div class="loginreply p-2 text-center text-danger" id="loginreply" style="font-size:1.5em; font-weight:400;">

            </div>
        </div>


        <div class="col-md-6">
          <img src="images/book.jpeg" alt="" class="img-fluid pl-5">
        </div>
      </div>
    </div>
  </section>
<?php else: ?>
  <!-- authenticated user code-->
<section class="welcomef">
<div class="container-fluid">
  <div class="row topheader">
    <div class="tophead mx-auto text-center">
      <h1 class="mb-2">WELCOME <strong><?php echo $_SESSION['user'][1];?></strong></h1>
      <button type="button" name="logout" class="btn  btn-primary" id="logout">LOGOUT</button>
    </div>
  </div>

  <br><br>
  <div class="row border">
  <div class="col-3 col-xs-12 p-5 navarea">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-one" role="tab" aria-controls="v-pills-profile" aria-selected="false">Add Project</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-two" role="tab" aria-controls="v-pills-settings" aria-selected="false">Project Category</a>
      <!--<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-three" role="tab" aria-controls="v-pills-messages" aria-selected="false">View Project Categories</a> -->
      <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-four" role="tab" aria-controls="v-pills-home" aria-selected="true">View All Projects</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-five" role="tab" aria-controls="v-pills-profile" aria-selected="false">Projects By Category</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-seven" role="tab" aria-controls="v-pills-settings" aria-selected="false">Project Search</a>
    </div>
  </div>
  <div class="col-9 col-xs-12  p-5 contentarea">
    <div class="tab-content" id="v-pills-tabContent">
      <!-- tab one begins-->
      <div class="tab-pane fade show active" id="v-pills-one" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <?php include('createproject.php');?>
      </div>

      <!-- tab two begins-->
      <div class="tab-pane fade" id="v-pills-two" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <h2 class="text-center">Add New Category</h2>
        <?php include('category.php'); ?>
      </div>
      <!-- tab three begins-->
      <div class="tab-pane fade" id="v-pills-three" role="tabpanel" aria-labelledby="v-pills-messages-tab">
        <?php include('projectsbyyear.php'); ?>
      </div>
      <!-- tab four begins-->
      <div class="tab-pane fade" id="v-pills-four" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <?php include"viewallprojects.php"; ?>
      </div>
      <!-- tab five begins-->
      <div class="tab-pane fade" id="v-pills-five" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <?php include("projectsbycategory.php"); ?>


      </div>
      <!-- tab six begins-->
      <div class="tab-pane fade" id="v-pills-six" role="tabpanel" aria-labelledby="v-pills-messages-tab">

        <?php include('projectsbyyear.php'); ?>

      </div>
      <!-- tab seven begins-->
      <div class="tab-pane fade" id="v-pills-seven" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <?php include('allprojectslisting.php');?>
      </div>
      <!-- tab nine if there is need begins-->
    </div>
    <div class="text-center mt-5 pt-5 projectreply" id="projectreply">
      <?php if(isset($_SESSION['msg'])):?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <h3><?php echo $_SESSION['msg']; ?></h3>
          <button type="button" class="close" id="closebtn" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php unset($_SESSION['msg']);?>
      <?php endif; ?>

    </div>
  </div>
</div>
</div>
</section>



<?php endif; ?>
    <!-- footer goes here -->
    <section class="bottom">
    <div class="container">


      <p>ALL RIGHT RESERVED. COPYRIGHT (c) Dr. Mrs Adetuni</p>


    </div>
  </section>

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="datatables/js/dataTables.bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/script.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#project_table').DataTable();
      });
    </script>

  </body>
</html>
