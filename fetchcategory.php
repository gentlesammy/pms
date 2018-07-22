<?php
  session_start();
  include('db.php');


 ?>


 <?php
       $sql="SELECT * FROM category";
       $result_cat=mysqli_query($conn, $sql);

  ?>
   <?php $sn = 1; ?>
 <div class="jumbotron bg-default my-5">
   <h1 class="display-5 text-center">Project Categories</h1>
   <hr class="m-y-md">
   <div class="deletereply_cat" id="deletereply_cat">

   </div>
     <table class="table table-striped table-dark">
       <thead>
         <tr>
           <th>S/n</th>
           <th>Category Name</th>
           <th>Description</th>
           <th>Action</th>
         </tr>
       </thead>

       <tbody>
         <?php
             while ($row=mysqli_fetch_assoc($result_cat)) {
               // code...

          ?>

         <tr>

           <td><?php echo $sn ++ ?></td>
           <td><?php echo $row['cat_name'];?></td>
           <td><?php echo $row['description'];?></td>
           <td class="text-center">
             <form class="cat_delete" action="process.php" method="post" id="cat_delete">
               <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $row['cat_id'];?>">
               <input type="submit" name="delete_cat" id="delete_cat" value="delete">
             </form>

           </td>

         </tr>

         <?php    } ?>
       </tbody>
     </table>

 </div>
