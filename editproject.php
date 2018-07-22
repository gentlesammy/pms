<?php
    session_start();
    require('database/connect.php');

    if (isset($_SESSION['user'][0])) {
      // code...


    if (isset($_GET['projectid'])) {
      // code...
      $pro_id = $_GET['projectid'];

      $sql="SELECT * FROM project WHERE project.pro_id = {$pro_id}";
      $result=mysqli_query($conn, $sql);
    }else {
      header('location:index.php');
    }

  }else {
    // code...
    header('location:index.php');

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
      <?php  while ($edit_pro = mysqli_fetch_assoc($result)):?>

        <div class="container my-5 py-5">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-center mb-3">Edit Project details</h2>

              <form style="padding:20px;" action="process.php" method="POST" enctype="multipart/form-data" id="createprojectform">
                <div class="form-row">
                  <div class="form-group col-md-8">
                    <label for="inputname">NAME</label>
                    <input type="text" class="form-control" name="sname" id="sname" value="<?php echo $edit_pro['std_name'];?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputmatric">MATRIC NUMBER</label>
                    <input type="text" class="form-control" name="smatric" id="smatric" value="<?php echo $edit_pro['matric'];?>">
                  </div>
                </div>



                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputsession">SESSION (LAST YEAR)</label>
                    <input type="text" class="form-control" name="ssession" id="ssession" value="<?php echo $edit_pro['session'];?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputCATEGORY">PROJECT CATEGORY</label>
                    <?php
                      $sqlc = "SELECT * FROM `category`";
                      $cat=mysqli_query($conn, $sqlc);
                     ?>
                    <select id="scategory" class="form-control" name="scategory">
                      <?php while ($scategory=mysqli_fetch_assoc($cat)):?>
                        <option selected value="<?php echo $scategory['id']; ?>"><?php echo $scategory['cat_name'];?></option>
                      <?php endwhile;?>
                    </select>
                  </div>
                </div>




                <div class="form-group">
                  <label for="inputtitle">PROJECT TITLE</label>
                  <input type="text" class="form-control" name="stitle" id="stitle" value="<?php echo $edit_pro['title'];?>">
                </div>

                <div class="form-group">
                  <label for="inputabstract">PROJECT ABSTRACT</label>
                  <textarea class="form-control" id="sabstract" name="sabstract" rows="6"><?php echo $edit_pro['abstract'];?></textarea>
                </div>

                <div class="form-row">

                  <div class="form-group col-md-6">
                    <br>
                    <div class="custom-file mt-2">
                      <input type="file" class="custom-file-input" id="customFile sfile" name="sfile" value="<?php echo $edit_pro['file'];?>">
                      <label class="custom-file-label bg-primary" for="customFile">Upload Project file</label>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inputgrade">PROJECT RATING</label>
                    <select id="sgrade" class="form-control bg-primary" name="sgrade">
                      <option value="A">Grade A</option>
                      <option value="B">Grade B</option>
                      <option selected value="C">Grade C</option>
                      <option value="D">Grade D</option>
                      <option value="E">Grade E</option>
                      <option value="F">Grade F</option>
                    </select>
                  </div>
                </div>
                <input type="hidden" name="pro_id" value="<?php echo $pro_id;?>">
                <?php
                    $usernow=$_SESSION["user"][0];
                    $userowner=$edit_pro['user_id'];

                 ?>
                <?php if ($usernow==$userowner):?>
                <button type="submit" class="btn btn-primary" name="update_project" id="update_project">Update Project</button>
                <span><a href="index.php" class="btn btn-lg btn-primary">Cancel</a></span>
              <?php else: ?>
                <span><a href="index.php" class="btn btn-lg btn-primary">Cancel</a></span>
              <?php endif; ?>
              </form>


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









    <?php endwhile; ?>











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
