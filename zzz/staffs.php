<?php
session_start();
function __autoLoad($class){
  require_once "classes/$class.php";
}

if (isset($_POST['Create_staff'])) {
  // code...

  $name= $_POST['staff_name'];
  $email= $_POST['staff_email'];
  $post= $_POST['staff_post'];

  if(empty($name) || empty($email) || empty($post) ){
    // code...
    $_SESSION['result']="all fields are required";
    header("location:staff.php");

  }else {

    $newUser= new Users;
    $newUser->saveUser($name,$email, $post);


  }







}
