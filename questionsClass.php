<?php

require_once('db_connection.php'); //here

class Question extends dbconnection{

	public $question;
	public $mark;
	public $image;
	public $exam_id;

	public $one;
	public $two;
	public $three;
	public $four;
	public $correct;
	public $type;
	public $question_id;
	public $radio;

	public $one1;
	public $two1;
	public $correct1;

//create

	public function create(){
		$query    = "INSERT INTO question(q_text, q_mark, q_image, exam_id)
				        VALUES('$this->question','$this->mark','$this->image','$this->exam_id')";
		$this->performQuery($query);

    //to get the last Q_id for options
		$query1   = "SELECT * FROM question order by q_id desc limit 1";
		$result   = $this->performQuery($query1);
		$row      = $this->fetchAll($result);
		$ID       = $row [0]['q_id'];
		if ($this->type=="true or false") {
			$this->addOptionTF($ID);
		}
		else{
			$this->addOption($ID);
		}
	}

	public function addOption($id){
		$query    = "INSERT INTO options(option1, option2, option3, option4,
			                       type, correct_op, question_id,exam_id)
				         VALUES('$this->one','$this->two','$this->three','$this->four',
					              '$this->type','$this->correct','$id','$this->exam_id')";
		$this->performQuery($query);
	}

	public function addOptionTF($id){
		$query    = "INSERT INTO options(option1, option2,type, correct_op,
			                               question_id,exam_id)
				         VALUES('$this->one1','$this->two1','$this->type',
									      '$this->correct1','$id','$this->exam_id')";
		 $this->performQuery($query);
	}

	public function addStHistory($st_id,$examID,$date,$array1){
		$examMark = 0;

		$TakeExamNum="UPDATE exam SET tekenNum=tekenNum+1 WHERE exam_id=$examID";
		$this->performQuery($TakeExamNum);


		$query    = "INSERT INTO student_history(st_id, exam_id, exam_date)
								 VALUES('$st_id','$examID','$date')";
		$this->performQuery($query);

		$query1   = "SELECT * FROM student_history order by h_id desc limit 1";
		$result   = $this->performQuery($query1);
		$row      = $this->fetchAll($result);
		$ID       = $row [0]['h_id'];
		$exam_id=$row [0]['exam_id'];
		$query1   = "SELECT * FROM exam where exam_id= $exam_id";
		$result   = $this->performQuery($query1);
		$row      = $this->fetchAll($result);
		$cat_id=$row[0]['cat_id'];
		$takeCatNum="UPDATE category SET tekenNum=tekenNum+1 WHERE cat_id=$cat_id";
		$this->performQuery($takeCatNum);
		$this->addExamDetail($examID,$ID,$array1);
	}

	public function addExamDetail($examID,$ID,$array1){
		$test = 0;
		foreach ($array1 as $key => $value) {
			$query    = "INSERT INTO h_details(h_id, q_id, st_answer)
									 VALUES('$ID','$key','$value')";
			$this->performQuery($query);

			$query1       = "SELECT * FROM h_details order by h_deatails_id  desc limit 1";
			$result1      = $this->performQuery($query1);
			$row1         = $this->fetchAll($result1);
			$h_detail_id  = $row1 [0]['h_deatails_id'];

			$query2      = "SELECT correct_op from options where question_id = $key";
			$result2     = $this->performQuery($query2);
			$row2        = $this->fetchAll($result2);
			$correct_option  = $row2 [0]['correct_op'];

			$query3      ="UPDATE h_details SET correct_op = '$correct_option'
			               WHERE  h_deatails_id = $h_detail_id";
			$result3     = $this->performQuery($query3);

			$QMark      = $this->readById($key);
			$mark       = $QMark[0]['q_mark'];//exam mark
			if ($value==$correct_option){
			$marks = $marks +$mark; //result of student for the select query below
			$query3      ="UPDATE student_history SET result = result+$mark
										 WHERE  h_id = $ID";
			$this->performQuery($query3);
		}//end if
	}//end foreach
	//
     $q ="SELECT exam_mark from exam where exam_id =$examID";
		 $r  = $this->performQuery($q);
		 $d  = $this->fetchAll($r);
		 $q_m = $d[0]['exam_mark'];//question's full mark

						if(($q_m/2)<=$marks){
						$q1      ="UPDATE exam SET pass =pass+1
													 WHERE  exam_id = $examID";
						$r1    = $this->performQuery($q1);}
						else {
						if($q_m>$marks) {
							$q2      ="UPDATE exam SET fail =fail+1
														 WHERE  exam_id = $examID";
							$r2    = $this->performQuery($q2);
						}}

	echo "<script>window.location ='exam-result.php?h_id=$ID';</script>";
	}

	 public function readResult($h_id){
		 $query   = "SELECT student_history.* ,exam.exam_name,exam.exam_mark
                 FROM student_history INNER JOIN exam
								 ON exam.exam_id = student_history.exam_id
		             WHERE h_id=$h_id";
 		 $result  = $this->performQuery($query);
		 return $this->fetchAll($result);


	 }

	 public function readQuestions($h_id){
		 $query   = "SELECT h_details.* ,question.q_text,question.q_image
									FROM h_details INNER JOIN question
								 ON question.q_id = h_details.q_id
								 WHERE h_id=$h_id";
			 $result  = $this->performQuery($query);
			 return $this->fetchAll($result);
	 }


	// Read

	public function readAll(){
		$query    =  "SELECT * FROM question";
		$result   =  $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query    =  "SELECT * FROM question WHERE q_id = $id";
		$result   =  $this->performQuery($query);
		return $this->fetchAll($result);
	}

	public function readOptionById($id){
		$query    = "SELECT * FROM options WHERE question_id = $id";
		$result   = $this->performQuery($query);
		return $this->fetchAll($result);
	}

	public function readMarkById($id){
	$query    =  "SELECT * FROM exam WHERE exam_id = $id";
	$result   =  $this->performQuery($query);
	return $this->fetchAll($result);
}
public function readQ($id){
		$query    =  "SELECT * FROM question WHERE exam_id = $id";
		$result   =  $this->performQuery($query);
		return $this->fetchAll($result);
	}

	public function readQByExamId($id){
		$query    =  "SELECT * FROM question WHERE exam_id = $id ORDER BY RAND()";
		$result   =  $this->performQuery($query);
		return $this->fetchAll($result);
	}

// Update

	public function update($id){
		$query = "UPDATE question SET q_text    = '$this->question',
								   q_mark                   = '$this->mark',
								   q_image                  = '$this->image',
									 exam_id                  = '$this->exam_id'
								   WHERE q_id               =  $id";
		$this->performQuery($query);?>
	  <script>window.location='questions.php?id=<?php echo $this->exam_id?>'</script>;

<?php
	}

	public function editOption($id){
		$query = "UPDATE options SET option1     =  '$this->one',
									 option2                   = '$this->two',
									 option3                   = '$this->three',
									 option4                   = '$this->four',
									 type                      = '$this->type',
									 correct_op                = '$this->correct',
									 exam_id                   = '$this->exam_id',
									 question_id               = '$this->question_id'
									 WHERE 	question_id        =  $id";
		 $this->performQuery($query);
	}

	public function editOptionTF($id){
		$query = "UPDATE options SET option1     =  '$this->one1',
									 option2                   = '$this->two1',
									 option3                   = ' ',
									 option4                   = ' ',
									 type                      = '$this->type1',
									 correct_op                = '$this->correct1',
									 exam_id                   = '$this->exam_id1',
									 question_id               = '$this->question_id'
									 WHERE question_id         =  $id";
		$this->performQuery($query);
	}

	//delete

	public function delete($id){
		$query  =  "DELETE FROM question WHERE q_id = $id";
		$this->performQuery($query);
	}

	//sum

	public function sum($id){
		$query  =   "SELECT SUM(q_mark) AS sum FROM question where exam_id = $id";
		$result =   $this->performQuery($query);
		$sum    = $this->fetchAll($result);
		return $sum;
}
}
$x = new Question();

?>
