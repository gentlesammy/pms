<?php
session_start();
include('database/connect.php');



//login code goes here
if (isset($_POST['loginbtn'])) {
  // code...
$username=mysqli_real_escape_string($conn, $_POST['username']);
$password=mysqli_real_escape_string($conn, $_POST['password']);

$sql="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password';";
$result=mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)>0) {
      while ($row=mysqli_fetch_assoc($result)){
        $user_id=$row['admin_id'];
        $name=$row['admin_name'];
        $title=$row['title'];
        $user= $title. ' '.$name;
      }
      $_SESSION['user'] = array();
      $_SESSION['user'][] = $user_id;
      $_SESSION['user'][] = $user;
      //header('location:admin.php');

  }else{

    //$_SESSION['errlogin']="Invalid login details!!!";
    echo "Invalid login details!!!";


  }

}





// &&&&&&&&&&&&&&&& create project form &&&&&&&&&&&&&&&&&//
if (isset($_POST['add_project'])){
  // code...
  $name       =   $_POST['sname'];
  $smatrici   =   str_replace(' ', '',$_POST['smatric']);
  $smatric    =   mb_strtolower($smatrici);
  $ssession   =   $_POST['ssession'];
  $scategory  =   $_POST['scategory'];
  $stitle     =   $_POST['stitle'];
  $sabstract  =   $_POST['sabstract'];
  $sfile      =   $_FILES['sfile'];
  $sgrade     =   $_POST['sgrade'];
  $suser      =   $_POST['suser'];

  $file_name      =   $sfile['name'];
  $file_type      =   $sfile['type'];
  $file_tmp_name  =   $sfile['tmp_name'];
  $file_error     =   $sfile['error'];
  $file_size      =   $sfile['size'];




  $sql="SELECT * FROM Project WHERE `matric`= '$smatric'";
  $result=mysqli_query($conn, $sql);

  $initialext=explode('.', $file_name);
  $ext=strtolower(end($initialext));
  $acceptedext  = ['pdf', 'doc', 'docx'];



  if (empty($name) || empty($smatric) || empty($ssession) || empty($scategory) || empty($stitle) || empty($sabstract) || empty($sfile) || empty($sgrade)) {
    // code...
    $_SESSION['msg']="all fields are required";
    header("location:index.php");

  }
  elseif (mysqli_num_rows($result)>0) {
    // code...
    $_SESSION['msg']="project already uploaded for this matric number!!!";
    header("location:index.php");
  }

  elseif (!in_array($ext, $acceptedext)){
    // code...
    $_SESSION['msg']="Invalid file format. Upload ms word or pdf version!!!";
    header("location:index.php");
  }

  elseif ($file_size>10000000){
    // code...
    $_SESSION['msg']="File size too large. Kindly compress the file!!!";
    header("location:index.php");
  }
  elseif ($file_error>0) {
    // code...
    $_SESSION['msg']="There is error uploading this file!!!" . " ". $file_name;
    header("location:index.php");
  }

  else{
    // final code goes here
    $fileNameNew  = str_replace(' ', '',$stitle).str_replace(' ', '',$smatric).".".$ext;
    $fileDestination='projects/'.$fileNameNew;

    $sql="INSERT INTO `project` (`cat_id`, `std_name`, `matric`, `session`, `cat_id`, `title`, `abstract`, `file`, `grade`, `accepted`, `user_id`, `time_added`)
    VALUES (NULL, '$name', '$smatric', '$ssession', '$scategory', '$stitle', '$sabstract', '$fileNameNew', '$sgrade', '1', '$suser', CURRENT_TIMESTAMP);";
    $result=mysqli_query($conn, $sql);
    if ($result) {
      // code...
      //move file
      move_uploaded_file($file_tmp_name, $fileDestination);
      $_SESSION['msg']="Project added to database successfully";
      header("location:index.php");
    }
  else{
    $_SESSION['msg']="project cannot be uploaded";
    header("location:index.php");
  }

}
}

//update project code
if (isset($_POST['update_project'])){
  // code...
  $name       =   $_POST['sname'];
  $smatrici   =   str_replace(' ', '',$_POST['smatric']);
  $smatric    =   mb_strtolower($smatrici);
  $ssession   =   $_POST['ssession'];
  $scategory  =   $_POST['scategory'];
  $stitle     =   $_POST['stitle'];
  $sabstract  =   $_POST['sabstract'];
  $sfile      =   $_FILES['sfile'];
  $sgrade     =   $_POST['sgrade'];
  $pro_id      =  $_POST['pro_id'];

  $file_name      =   $sfile['name'];
  $file_type      =   $sfile['type'];
  $file_tmp_name  =   $sfile['tmp_name'];
  $file_error     =   $sfile['error'];
  $file_size      =   $sfile['size'];




  $initialext=explode('.', $file_name);
  $ext=strtolower(end($initialext));
  $acceptedext  = ['pdf', 'doc', 'docx'];



  if (empty($name) || empty($smatric) || empty($ssession) || empty($scategory) || empty($stitle) || empty($sabstract) || empty($sfile) || empty($sgrade)) {
    // code...
    $_SESSION['msg']="all fields are required";
    header("location:editproject.php?projectid={$pro_id}");

  }
  elseif (!in_array($ext, $acceptedext)){
    // code...
    $_SESSION['msg']="Invalid file format. Upload ms word or pdf version!!!";
    header("location:editproject.php?projectid={$pro_id}");
  }

  elseif ($file_size>10000000){
    // code...
    $_SESSION['msg']="File size too large. Kindly compress the file!!!";
    header("location:editproject.php?projectid={$pro_id}");
  }
  elseif ($file_error>0) {
    // code...
    $_SESSION['msg']="There is error uploading this file!!!" . " ". $file_name;
    header("location:editproject.php?projectid={$pro_id}");
  }

  else{
    // final code goes here
    $fileNameNew  = str_replace(' ', '',$stitle).str_replace(' ', '',$smatric).".".$ext;
    $fileDestination='projects/'.$fileNameNew;

    $sql="UPDATE `project` SET `std_name` = '$name', `matric` = '$smatric', `session` = '$ssession', `cat_id` = '$scategory', `title` = '$stitle',
     `abstract` = '$sabstract', `file` = '$fileNameNew', `grade` = '$sgrade' WHERE `project`.`pro_id` = '$pro_id';";
    $result=mysqli_query($conn, $sql);
    if ($result) {
      // code...
      //move file
      move_uploaded_file($file_tmp_name, $fileDestination);
      $_SESSION['msg']="Project updated successfully";
      header("location:editproject.php?projectid={$pro_id}");
    }
  else{
    $_SESSION['msg']="project cannot be updated";
    header("location:editproject.php?projectid={$pro_id}");
  }

}
}


//create category form process
if (isset($_POST['Create_cat'])) {
  // code...
  $cat_name=mysqli_real_escape_string($conn, $_POST['cat_name']);
  $cat_des=mysqli_real_escape_string($conn, $_POST['cat_des']);

  if (empty($cat_name) || empty($cat_des) ) {
    echo "all fields are required";
  }else{
      $sql="INSERT INTO `category` (`cat_id`, `cat_name`, `description`) VALUES (NULL, '$cat_name', '$cat_des');";
      $result_cat=mysqli_query($conn, $sql);

      if ($result_cat) {
        echo "<p class='lead text-success'>Category created succesfully<p>";
      }

  }

} //category form ends hebrev


//category delete form starts here
  if (isset($_POST['delete_cat'])) {
    // code...
      $id= $_POST['cat_id'];
      $sql= "DELETE FROM `category` WHERE `category`.`cat_id` = $id;";
      $Delete=mysqli_query($conn, $sql);
      if ($Delete) {
        echo "<h1 class='text-center text-success'>Category deleted succesfully</h1>";
        header('location:index.php');
      }else{
          echo "<h1 class='text-center text-danger'>Category cannot be deleted </h1>";
          header('location:index.php');
      }

  }




//category delete form ends here






//logout code
if (isset($_POST['action'])) {
  // code...
  unset($_SESSION['user']);
}




 ?>
