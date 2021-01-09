<?php
include("category_class.php");
class Exam extends dbconnection {
    public $exam_id;
    public $exam_name;
    public $exam_desc;
    public $exam_mark;
    public $num_of_questions;
    public $cat_id;
    public function create()
    {
        $query  = "INSERT INTO exam(exam_name,exam_desc,exam_mark,cat_id)
                   VALUES('$this->exam_name','$this->exam_desc','$this->exam_mark','$this->cat_id')";
        $this->performQuery($query);
    }
    public function read()
    {
        $query  = "SELECT * FROM exam";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function readById($id)
    {
        $query  = "SELECT * FROM exam WHERE exam_id={$id}";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function delete($id)
    {
        $query  = "DELETE FROM exam WHERE exam_id={$id}";
        $result = $this->performQuery($query);
    }
    public function edit($id)
    {
        $query = "UPDATE exam SET exam_name  = '$this->exam_name',
                                  exam_desc  = '$this->exam_desc',
                                  exam_mark  = '$this->exam_mark',
                                  cat_id     = '$this->cat_id'
                                  WHERE exam_id={$id}" ;
        $this->performQuery($query);
    }
}
$e = new Exam();
?>