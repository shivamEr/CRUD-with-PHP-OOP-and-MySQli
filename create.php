<?php
  include 'header.php';

  $db = new Database();
?>
<div class="card-body">
<form action="/action_page.php">
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">role:</label>
    <input type="text" class="form-control" id="role" placeholder="Enter role" name="role">
  </div>
  <div class="mb-3">
    <label for="course" class="form-label">Course:</label>
    <input type="text" class="form-control" id="course" placeholder="Course" name="course">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="index.php" class="btn btn-primary">Go Back</a>
</form>
</div>
<?php
    include 'footer.php';
?>