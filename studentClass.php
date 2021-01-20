<?php
require("db_connection.php");

class student extends dbconnection {
    public $st_id;
    public $st_name;
    public $st_email;
    public $st_password;
    public $st_mobile;
    public $st_image;
    public $ed_level;

public function read()
    {
        $query  = "SELECT * FROM student";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function delete($id)
    {
        $query  = "DELETE FROM student WHERE st_id={$id}";
        $result = $this->performQuery($query);
    }

}
$c = new student();
?>