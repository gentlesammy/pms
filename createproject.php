<h2 class="text-center mb-3">Add Project details</h2>
<form style="padding:20px;" action="process.php" method="POST" enctype="multipart/form-data" id="createprojectform">
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputname">NAME</label>
      <input type="text" class="form-control" name="sname" id="sname" placeholder="STUDENT NAME">
    </div>
    <div class="form-group col-md-4">
      <label for="inputmatric">MATRIC NUMBER</label>
      <input type="text" class="form-control" name="smatric" id="smatric" placeholder="CSC120304">
    </div>
  </div>



  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputsession">SESSION (LAST YEAR)</label>
      <input type="text" class="form-control" name="ssession" id="ssession" placeholder="eg 2017">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCATEGORY">PROJECT CATEGORY</label>
      <?php
        $sqlc = "SELECT * FROM `category`";
        $cat=mysqli_query($conn, $sqlc);
       ?>
      <select id="scategory" class="form-control" name="scategory">
        <?php while ($scategory=mysqli_fetch_assoc($cat)):?>
          <option selected value="<?php echo $scategory['id']; ?>"><?php echo $scategory['cat_name'];?></option>
        <?php endwhile;?>
      </select>
    </div>
  </div>




  <div class="form-group">
    <label for="inputtitle">PROJECT TITLE</label>
    <input type="text" class="form-control" name="stitle" id="stitle" placeholder="full title of project">
  </div>

  <div class="form-group">
    <label for="inputabstract">PROJECT ABSTRACT</label>
    <textarea class="form-control" id="sabstract" name="sabstract" rows="6"></textarea>
  </div>

  <div class="form-row">

    <div class="form-group col-md-6">
      <br>
      <div class="custom-file mt-2">
        <input type="file" class="custom-file-input" id="customFile sfile" name="sfile">
        <label class="custom-file-label bg-primary" for="customFile">Upload Project file</label>
      </div>
    </div>

    <div class="form-group col-md-6">
      <label for="inputgrade">PROJECT RATING</label>
      <select id="sgrade" class="form-control bg-primary" name="sgrade">
        <option value="A">Grade A</option>
        <option value="B">Grade B</option>
        <option selected value="C">Grade C</option>
        <option value="D">Grade D</option>
        <option value="E">Grade E</option>
        <option value="F">Grade F</option>
      </select>
    </div>
  </div>
  <input type="hidden" name="suser" value="<?php echo $_SESSION['user'][0];?>">
  <button type="submit" class="btn btn-primary" name="add_project" id="add_project">Add Project to Database</button>

</form>
