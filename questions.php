<?php
include("questionsClass.php");
include("includes/header.php");
$exam_id     =  $_GET['id'];
$exam_mark   =  $x->readMarkById($exam_id);
$sum = $x->sum($exam_id);

$action = isset($_GET['action']) ? $_GET['action'] : 'dash';
//main page
if ($action =='dash') {
if(isset($_POST['submit']))
{
$x->question   =   $_POST['qusetion'];
$x->mark       =   $_POST['marks'];
$x->image      =   $_FILES['q_img']['name'];
$tmpName       =   $_FILES['q_img']['tmp_name'];
$path          =   'images/';
move_uploaded_file($tmpName, $path.$x->image);
$x->exam_id    =    $exam_id;
//to check total questions mark with exam's full mark
if($exam_mark[0]['exam_mark']>=$sum[0]['sum']+$x->mark){

// type and options
$x->radio =$_POST['radios'];
if ($x->radio ==  "option1") {
  $x->one      =  $_POST['firstChoice'];
  $x->two      =  $_POST['secondChoice'];
  $x->three    =  $_POST['thirdChoice'];
  $x->four     =  $_POST['fourthChoice'];

  if ($_POST['select_correct']=='a'){
    $x->correct      =  $_POST['firstChoice'];
  }
  elseif ($_POST['select_correct']=='b'){
    $x->correct      =  $_POST['secondChoice'];
  }
  elseif ($_POST['select_correct']=='c'){
    $x->correct      =  $_POST['thirdChoice'];
  }
    elseif ($_POST['select_correct']=='d'){
      $x->correct      =  $_POST['fourthChoice'];
    }

  $x->type     = "multiple";
  $x->exam_id    =$exam_id;
}
else {
  $x->one1     =  $_POST['first'];
  $x->two1     =  $_POST['second'];
  $x->type     =  "true or false";

  if ($_POST['selectTF']=='e'){
    $x->correct1       =  $_POST['first'];
  }
  elseif ($_POST['selectTF']=='f'){
    $x->correct1      =  $_POST['second'];
  }
}
$x->create();
}
else{
 $error = "Cannot add this question!<br>Question marks are now more than exam's full mark!!!";
}
}
?>

<style>
.input-group-text{
  width:170px;
}
.multipleQ , .trueFalse{
  display: none;
}
td,th{
text-align: center;
}
</style>

<div class="row">


                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Qusetions</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Qusetion</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Question</label>
                                                <input  type="text" class="form-control" name="qusetion">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Image</label>
                                                <input  type="file" class="form-control"  name="q_img">
                                            </div>

                                            <hr>
                                            <div class="col col-md-3">
                                                    <label class=" form-control-label">Type</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label text-primary">
                                                                <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input" required>Multiple Choice
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label text-primary">
                                                                <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">True/False
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- multiple choices -->
                                            <div class="container multipleQ">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                 <span class="input-group-text">First Choice</span>
                                                </div>
                                               <input type="text" class="form-control" name="firstChoice">
                                              </div>

                                              <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                               <span class="input-group-text">Second Choice </span>
                                              </div>
                                             <input type="text" class="form-control" name="secondChoice">
                                            </div>

                                            <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                             <span class="input-group-text">Third Choice</span>
                                            </div>
                                           <input type="text" class="form-control" name="thirdChoice">
                                          </div>

                                          <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                           <span class="input-group-text">Fourth Choice</span>
                                          </div>
                                         <input type="text" class="form-control" name="fourthChoice">
                                        </div>

                                        <label>Correct Choice</label>
                                       <select class="btn btn-outline-secondary" name = "select_correct" id="select_correct">
                                         <option value=""> </option>
                                         <option value="a"class="dropdown-item">First Choice</option>
                                         <option value="b"class="dropdown-item">Second Choice</option>
                                         <option value="c"class="dropdown-item">Third Choice</option>
                                         <option value="d"class="dropdown-item">Fourth Choice</option>
                                       </select>
                                    </div>
                                    <!-- end of multiple choices -->

                                    <!-- true or false -->
                                    <div class="container trueFalse">

                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                     <span class="input-group-text">First Choice</span>
                                    </div>
                                    <input type="text" class="form-control" name="first" value="True" readonly="readonly">
                                    </div>

                                      <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                       <span class="input-group-text">Second Choice</span>
                                      </div>
                                     <input type="text" class="form-control" name="second" value="False" readonly="readonly">
                                    </div>
                                    <label>Correct Choice</label>
                                    <select class="btn btn-outline-secondary" name="selectTF" id="selectTF">
                                      <option value=""> </option>
                                      <option value="e" class="item">First Choice</option>
                                      <option value="f"class="item">Second Choice</option>
                                    </select>
                                    </div>
                                    <!-- end of true or false -->

                                                <hr>
                                            <label>Mark</label>
                                        <select name="marks" class="custom-select mb-3" required>
                                          <option selected disabled value="">Enter mark</option>

                                            <?php
                                            $option = 1;
                                            while($option<=$exam_mark[0]['exam_mark'])
                                            {
                                              echo"<option>{$option}</option>";
                                              $option++;
                                            }


                                            ?>
                                          </select>
                                            <?php
                                              if(isset($error)){
                                                  echo "<div style='background:#FFDDDD;padding:6px;margin-bottom:20px'>".$error."</div>";
                                              }
                                             ?>
                                            <div>
                                                <button id="payment-button" type="submit"  name="submit"class="btn btn-lg btn-primary btn-block">
                                                   Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- TOP CAMPAIGN-->
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">Qusetions</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                           <thead>
                                             <tr>
                                              <th>Question Id</th>
                                              <th>Question</th>
                                              <th>Image</th>
                                              <th>Options</th>
                                              <th>Mark</th>
                                              <th>Edit</th>
                                              <th>Delete</th>
                                             </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            if ($x->readQ($exam_id)) {
                                            foreach ($x->readQ($exam_id) as $row) {
                                              echo"<tr>";
                                              echo"<td>{$row['q_id']}</td>";
                                                  echo"<td>{$row['q_text']} </td>";
                                                  if($row['q_image']!=null){
                                                  echo"<td width ='200px'><img src ='images/{$row['q_image']}'
                                                           height='100' width='100'/> </td>";
                                                  }
                                                   else {
                                                     echo"<td> </td>";
                                                  }
                                                  $option = $x->readOptionById($row['q_id']);
                                                  echo"<td>{$option[0]['option1']}<br>{$option[0]['option2']}<br>
                                                           {$option[0]['option3']}<br>{$option[0]['option4']}
                                                       </td>";
                                                  echo"<td>{$row['q_mark']}</td>";
                                                  echo"<td><a href='editQuestion.php?id={$row['q_id']}&examID={$exam_id}' class='btn btn-primary'>Edit</td>";
                                                  echo"<td style='text-align:center'><a href='questions.php?action=delete&id={$row['q_id']}&examID={$exam_id}' class='btn btn-danger'>Delete</a></td>";
                                              echo"</tr>";
                                            }
                                          }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!--  END TOP CAMPAIGN-->

                                <?php
                                }
                                elseif($action=='delete') {
                                $id  = $_GET['id'];
                                $examID=$_GET['examID'];
                                $x->delete($id);
                                echo"<script>window.location ='questions.php?id=$examID';</script>";



}
include("includes/footer.html");
?>
<script>

$("#radio1").click(function(){
    $(".multipleQ").css("display", "inline");
    $(".trueFalse").css("display", "none");
    $("#selectTF").prop('required',false);
    $("#select_correct").prop('required',true);
  })

  $("#radio2").click(function(){
    $(".multipleQ").css("display", "none");
    $(".trueFalse").css("display", "inline");
    $("#select_correct").prop('required',false);
    $("#selectTF").prop('required',true);
  })

</script>
