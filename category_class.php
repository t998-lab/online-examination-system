<?php
require_once("db_connection.php");//include once
class Category extends dbconnection {
    public $cat_id;
    public $cat_name;
    public $cat_desc;
    public $cat_image;
    public function create()
    {
        $query  = "INSERT INTO category(cat_name,cat_desc,cat_image)
                   VALUES('$this->cat_name','$this->cat_desc','$this->cat_image')";
        $this->performQuery($query);
    }
    public function read()
    {
        $query  = "SELECT * FROM category";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function readById($id)
    {
        $query  = "SELECT * FROM category WHERE cat_id={$id}";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function delete($id)
    {
        $query  = "DELETE FROM category WHERE cat_id={$id}";
        $result = $this->performQuery($query);
    }
    public function edit($id)
    {
        $query = "UPDATE category SET cat_name  = '$this->cat_name',
                                      cat_desc  = '$this->cat_desc',
                                      cat_image = '$this->cat_image'
                                      WHERE cat_id={$id}" ;
        $this->performQuery($query);
    }
}
$c = new Category();
?>
