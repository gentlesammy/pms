<?php

class Users extends Dbhpdo{



      public function getAllUsers(){
        $sql="SELECT * FROM employee";
        $result=$this->connection()->query($sql);
        while ($row=$result->fetch()) {
          // code...
          $staffs[] = $row;
        }
        return $staffs;
      }

      public function saveUser($name,$email, $post){
          $sql="INSERT INTO employee(name, email, post) VALUES(:name, :email, :post)";
          $result=$this->connection()->prepare($sql);
          $result->execute(["name"=>$name, "email"=>$email, "post"=>$post]);
          if ($result) {
            // code...
          header("location:test.php");
          }
      }


      public function getSingleUser($id){
          $sql="SELECT * FROM employee WHERE id = :id";
          $result=$this->connection()->prepare($sql);
          $result->execute(['id'=>$id]);
          $staff=$result->fetch();

          return $staff; 

      }






}
