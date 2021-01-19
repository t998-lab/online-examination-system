<?php
include("../db_connection.php");
class History extends dbconnection {

public function readById($id)
{
    $query  = "SELECT category.cat_image,student_history.h_id,
               student_history.result,student_history.exam_id,
               exam.exam_name from student_history
               INNER JOIN exam
               ON exam.exam_id =student_history.exam_id
               INNER JOIN category
               ON exam.cat_id = category.cat_id
               WHERE student_history.h_id
               IN(SELECT MAX(h_id) from student_history group by exam_id)
               AND st_id =$id";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
}

}

$h = new History();

?>
