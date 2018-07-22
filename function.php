<?php
  include("database/connect.php");
  function userAuth($username, $password){
    include("database/connect.php");
    $sql="SELECT * FROM admin WHERE `username` = '$username' AND `password` = '$password';";
    $result=mysqli_query($conn, $sql);
    $check=mysqli_num_rows($result);
    if($check<0){
      $reply = 1;
    }else{
      $reply= 0;
    }
    return $reply;
  }

  $username = 'mrsadetunji';
  $password = 'lecturer';


 $reply = userAuth($username, $password);
 echo $reply;

if ($reply==1) {
  // code...
  echo "you are logged in";
}else{
  echo "you are not logged in";

}
