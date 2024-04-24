<?php
  include 'header.php';
  $db = new Database();
  $uid = $_GET['id'];

  $query = "SELECT * FROM table_users WHERE id = $uid";
  $data = $db->select($query)->fetch_assoc();
  if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $course = $_POST['course'];
    # code...
    if ($name == ""|| $roll == ""|| $course == "") {
      $error = "<div class = 'alert-danger'>Field must not be empty</div>";
      # code...
    }
    else{
      $query = "UPDATE table_users
      SET
      name = '$name',
      roll = '$roll',
      course = '$course',
      where id = $uid";
      $update = $db->update($query);
    }
  }
  if (isset($_POST['delete'])) {
    $id = $_GET['uid'];
    $sql = "DELETE FROM table_users WHERE id = $uid";
    $delete_data = $db->delete($sql);
   
}
?>
<div class="card-body">
<form action="" method="POST">
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Name:</label>
    <input type="text" class="form-control" value="<?php echo $data['name'];?>" id="name" placeholder="Enter Name" name="name">
  </div>
  <div class="mb-3">
    <label for="Roll" class="form-label">roll:</label>
    <input type="text" class="form-control" value="<?php echo $data['roll'];?>" id="roll" placeholder="Enter roll" name="roll">
  </div>
  <div class="mb-3">
    <label for="course" class="form-label">Course:</label>
    <input type="text" class="form-control" value="<?php echo $data['course'];?>" id="course" placeholder="Enter Course" name="course">
  </div>
 
  <button type="submit" name="update" class="btn btn-primary">Update</button>
  <button type="submit" name="delete" class="btn btn-primary">Delete</button>
  <a href="index.php" class="btn btn-primary">Go Back</a>
</form>
</div>
<?php
    include 'footer.php';
?>