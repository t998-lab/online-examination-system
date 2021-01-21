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

    public function readById($id)
        {
            $query  = "SELECT * FROM student WHERE st_id=$id";
            $result = $this->performQuery($query);
            return    $this->fetchAll($result);
        }
    public function delete($id)
    {
        $query  = "DELETE FROM student WHERE st_id={$id}";
        $result = $this->performQuery($query);
    }

    public function edit($id)
    {
      $query = "UPDATE student SET st_name     = '$this->st_name',
                     	st_email                 = '$this->st_email',
                     st_mobile                 = '$this->st_mobile'
                     WHERE st_id               =  $id";
      $this->performQuery($query);

    }

}
$c = new student();
?>
