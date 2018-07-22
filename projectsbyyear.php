<?php


    $currentuser=$_SESSION['user'][0];
    $sql="SELECT * FROM ((admin INNER JOIN project ON admin.admin_id=project.user_id) INNER JOIN category ON category.cat_id=project.cat_id) WHERE project.user_id = $currentuser";


    $projects_list=mysqli_query($conn, $sql);
    $number=mysqli_num_rows($projects_list);
    $sn=1;
 ?>


 <h2 class="text-center my-3">PROJECT GROUPING BY YEAR</h2>

 <form class=" my-5" action="projectsbyyears.php" method="post" id="yrProGrp">
 <div class="form-row pt-3 px-3">
   <div class="form-group col-md-8">
     <select class="form-control" name="year_select" id="year_select">
       <option value="">SELECT YEAR TO SEARCH</option>
       <?php while($row=mysqli_fetch_assoc($projects_list)):?>
          <option value="<?php echo $row['session'];?>"><?php  echo $row['session'] ?></option>
      <?php endwhile;?>
     </select>
   </div>
   <div class="form-group col-md-4">
     <input type="submit" name="yr_find" value="Search" class="btn btn-primary  form-control" id="yr_find">
   </div>
 </div>
</form>

 <div class="jumbotron text-center p-5 bg-primary border-primary" id="pro_by_yr">

 </div>
