<?php class Database
{
    public $host = DBHOST;
    public $user = DBUSER;
    public $pass = DBPASS;
    public $dbname = DBNAME;

    public $link;
    public $error;

    public function __construct()
    {
     $this->connectDB()();   
    }
    public function connectDB()
    {
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);

        if (!$this->link) {
            $this->error=" Connection Fail ".$this->link->connect_error;
            return false;
        }
    }
}
