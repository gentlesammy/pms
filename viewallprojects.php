<?php
     //echo $_SESSION['user'][0];


     //$sql="SELECT * FROM (admin INNER JOIN project WHERE project.user_id = {$_SESSION['user'][0]}  AND admin.id=project.user_id)";
     $currentuser=$_SESSION['user'][0];
     $sql="SELECT * FROM ((admin INNER JOIN project ON admin.admin_id=project.user_id) INNER JOIN category ON category.cat_id=project.cat_id) WHERE project.user_id = $currentuser";


     $projects_list=mysqli_query($conn, $sql);
     $number=mysqli_num_rows($projects_list);
     $sn=1;



 ?>
 <h2 class="text-center">All Projects In Database </h2>
 <p class="text-center"> Total: <span><?php echo $number; ?></span> </p>
 <?php if (mysqli_num_rows($projects_list)>0):?>
 <table class="table table-striped table-responsive table-dark mt-5 text-center" id="viewalltable">
   <thead>
     <tr>
       <th>S/N</th>
       <th>Matric</th>
       <th>Title</th>
       <th>Category</th>
       <th>Session</th>

       <th>Grade</th>
       <th>Action</th>
     </tr>
   </thead>

   <tbody>


     <?php while ($row=mysqli_fetch_assoc($projects_list)): ?>

     <tr>
       <td class="align-middle"><?php echo $sn++; ?></td>
       <td class="align-middle"><?php echo mb_strtoupper($row['matric']); ?></td>
       <td class="align-middle"><?php echo $row['title'];?></td>
       <td class="align-middle"><?php echo $row['cat_name'];?></td>
       <td class="align-middle"><?php echo $row['session'];?></td>
       <td class="align-middle"><?php echo $row['grade'];?></td>
       <td class="align-middle"><a href="viewproject.php?projectid=<?php echo $row['pro_id'];?>" class="btn btn-sm btn-primary">View</a> &nbsp; <a href="editproject.php?projectid=<?php echo $row['pro_id'];?>" class="btn btn-sm btn-danger">Edit</a></td>
     </tr>


   <?php  endwhile; ?>
   </tbody>
 </table>
<?php else:?>

<h1 class="text-center text-danger">YOU have no project yet</h1>

<?php endif;?>
