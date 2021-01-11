<?php

require('db_connection.php');

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

	public function readQByExamId($id){
		$query    =  "SELECT * FROM question WHERE exam_id = $id";
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
		<script>window.location = 'exams.php';</script>
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
}
$x = new Question();

?>
