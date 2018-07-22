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

    <!--login form goes here -->
    <?php if (!isset($_SESSION['user'][0])):?>
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

  <div class="row border pt-5">
    <?php
    if (isset($_GET['projectid'])):
      $pro_id=$_GET['projectid'];
      $sqlpro="SELECT * FROM ((admin INNER JOIN project ON admin.admin_id=project.user_id) INNER JOIN category ON category.cat_id=project.cat_id) WHERE project.pro_id = $pro_id";
      $pro_list=mysqli_query($conn, $sqlpro);

     ?>
     <?php while($row=mysqli_fetch_assoc($pro_list)):?>
    <div class="col-md-6">
      <div class="card" style="">
        <div class="card-header">
          <h1><?php echo mb_strtoupper($row['title']);?></h1>
        </div>
        <div class="card-body">
          <p class="lead"><strong>ABSTRACT</strong></p>
          <p><?php echo $row['abstract'];?></p>

        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card" style="">
        <div class="card-header">
          <h1>Project Details</h1>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">STUDENT NAME: <span><strong><?php echo mb_strtoupper($row['std_name']);?></strong></span></li>
            <li class="list-group-item">STUDENT MATRIC No.: <span><strong><?php echo mb_strtoupper($row['matric']);?></strong></span></li>
            <li class="list-group-item">SESSION: <span><strong><?php echo mb_strtoupper($row['session']);?></strong></span></li>
            <li class="list-group-item">CATEGORY: <span><strong><?php echo mb_strtoupper($row['cat_name']);?></strong></span></li>
            <li class="list-group-item">TITLE: <span><strong><?php echo mb_strtoupper($row['title']);?></strong></span></li>
            <li class="list-group-item">Grade: <span><strong><?php echo mb_strtoupper($row['grade']);?></strong></span></li>
            <?php list($date, $time)=explode(' ', $row['time_added']);
            ?>
            <li class="list-group-item">DATE UPLOADED: <span><strong><?php echo $date;?></strong></span></li>
          </ul>
        </div>
      </div>
        <div class="mt-5 text-center">
          <a href="projects/<?php echo $row['file'];?>" class="btn btn-lg btn-success">DOWNLOAD FILE</a>
          <a href="editproject.php?projectid=<?php echo $row['pro_id'];?>" class="btn btn-lg btn-primary">EDIT</a>
          <a href="index.php" class="btn btn-lg btn-primary">Back Home</a>
        </div>


    </div>
  <?php endwhile; ?>
    <?php else: ?>

      <div class="text-center">
        <h1 class="text-center text-warning" align="center">No post selected. <a href="index.php">Go back</a> and select a post</h1>
      </div>


  <?php endif; ?>
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
    <script src="js/popper.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
