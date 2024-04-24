<?php
include 'header.php';
?>
<?php
    $db = new Database();
    $sql = "SELECT * FROM table_users";
    $read = $db->select($sql);


    if (isset($_POST['delete'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM table_users WHERE id = $id";
        $delete_data = $db->delete($sql);
        # code...
    }
?>
                <div class="card-body">
                    <?php
                    if (isset($_GET['msg'])) {
                      echo  "<div class = 'alert alert-success><strong>Success:</string>".$_GET['msg']."</div> ";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Serial</th>
                            <th>Name</th>
                            <th>Roll no </th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        if($read){
                            $i=0;
                            while ($row = $read->fetch_assoc()) {
                               $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['roll']; ?></td>
                            <td><?php echo $row['course']; ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a>
                                <a href="?uid=<?php echo $row['id'];?>" <button class="btn btn-primary" type="submit" name="delete">Delete</button></a>
                            </td>
                        </tr>
                        <?php 
                            }
                        }
                        else{ ?>
                            <p>Data not found!</p>
                            
                            <?php } ?>
                       
                    </table>
                    <a href="create.php" class="btn btn-success">Create</a>
                </div>

<?php
    include 'footer.php';
?>
                