<?php 
class Database
{
    public $host = DBHOST;
    public $user = DBUSER;
    public $pass = DBPASS;
    public $dbname = DBNAME;

    public $link;
    public $error;

    public function __construct()
    {
     $this->connectDB();   
    }
    public function connectDB()
    {
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);

        if (!$this->link) {
            $this->error=" Connection Fail ".$this->link->connect_error;
            return false;
        }
    }

    public function insert($data){
        $insert_row = $this->link->query($data) or die($this->link->error.__LINE__);
        if ($insert_row) {
           header('location:index.php?msg='.urlencode('Data Successfully Inserted!'));
        }
        else {
            die('Error '.$this->link->errno .")".$this->link->error);
        }
    }
    public function select($data){
        $result = $this->link->query($data) or die($this->link->error.__LINE__);
        if ($result->num_rows > 0) {
           return $result;
        }
        else {
            return false;
        }
    }
    public function update($data){
        $update_row = $this->link->query($data) or die($this->link->error.__LINE__);
        if ($update_row) {
           header('location:index.php?msg='.urlencode('Data Updated Successfully!'));
        }
        else {
            die('Error'.$this->link->errno .")".$this->link->error);
        }
    }

    public function delete($data){
        $delete_row = $this->link->query($data) or die($this->link->error.__LINE__);
        if ($delete_row) {
           header('location:index.php?msg='.urlencode('Data Deleted Successfully!'));
        }
        else {
            die('Error'.$this->link->errno .")".$this->link->error);
        }
    }

}

?>

