<?php
  $sql="SELECT * FROM ((admin INNER JOIN project ON admin.admin_id=project.user_id) INNER JOIN category ON category.cat_id=project.cat_id)";
  $projects_list=mysqli_query($conn, $sql);
  $number=mysqli_num_rows($projects_list);
  $sn=1;
 ?>


 <h2 class="text-center">All Projects In Database </h2>
 <p class="text-center"> Total: <span><?php echo $number; ?></span> </p>



          <table id="project_table" class="table table-striped table-bordered table-dark mt-5 ">
              <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Matric</th>

                    <th>Title</th>
                    <th>Category</th>
                    <th>Session</th>
                    <th>Grade</th>
                    <th>Uploaded By</th>
                  </tr>
              </thead>

              <tbody >

                  <?php while ($row=mysqli_fetch_assoc($projects_list)): ?>
                    <tr>
                      <td class="align-middle"><?php echo $sn++; ?></td>
                      <td class="align-middle"><?php echo mb_strtoupper($row['matric']); ?></td>
                      <td class="align-middle"><?php echo $row['title'];?></td>
                      <td class="align-middle"><?php echo $row['cat_name'];?></td>
                      <td class="align-middle"><?php echo $row['session'];?></td>
                      <td class="align-middle"><?php echo $row['grade'];?></td>
                      <td class="align-middle"><?php echo $row['admin_name'];?></td>
                    </tr>
                  <?php endwhile;?>

              </tbody>
          </table>
