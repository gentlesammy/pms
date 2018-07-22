<?php

  function __autoLoad($class){
    require_once "classes/$class.php";
  }



 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <a href="staff.php" type="button" name="button" class="btn btn-primary btn-lg my-5 py-5 mx-5 px-5">Add Staff </a>
    <h1 class="mt-5 pt-5 pl-5 ml-5">STAFF LIST</h1>
    <table class="table table-responsive table_dark ml-2" width="70%" align="center">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Post</th>
          <th>Action</th>
        </tr>
        <tbody>
          <?php
              $staff=new Users();
              $stafflist = $staff->getAllUsers();
          ?>

          <?php foreach ($stafflist as $staff): ?>
            <tr align="center">
              <td><?php echo $staff['name']; ?></td>
              <td><?php echo $staff['email']; ?></td>
              <td><?php echo $staff['post']; ?></td>
              <td><a href="staffedit.php?staffid=<?php echo $staff['id']; ?>" class="btn btn-primary">Edit</a> &nbsp; <a href="#" class="btn btn-danger">Delete</a></td>
            </tr>
          <?php endforeach; ?>






        </tbody>
      </thead>
    </table>




    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
