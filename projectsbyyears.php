<?php
session_start();
include('database/connect.php');


if (isset($_POST['yr_find'])) {
  // code...

  $year_select  =   $_POST['year_select'];

  $sql="SELECT * FROM ((admin INNER JOIN project ON admin.admin_id=project.user_id) INNER JOIN category ON category.cat_id=project.cat_id) WHERE (project.session = $year_select)";

  $category_select=mysqli_query($conn, $sql);
  $sn=1;
  ?>


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


    <?php while ($row=mysqli_fetch_assoc($category_select)):?>

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


<?php  }
?>
