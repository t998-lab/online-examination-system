<?php
include("questionsClass.php");
include("includes/header.php");

  $question_id   =  $_GET['id'];

  $row           =  $x->readById($question_id);
  $row_option    =  $x->readOptionById($question_id);

  if(isset($_POST['edit'])){

    $x->radio =$_POST['radios'];
    if ($x->radio=="option1") {
      $x->one         =  $_POST['firstChoice'];
      $x->two         =  $_POST['secondChoice'];
      $x->three       =  $_POST['thirdChoice'];
      $x->four        =  $_POST['fourthChoice'];
      $x->correct     =  $_POST['select_correct'];
      $x->type        = "multiple";
      $x->question_id = $question_id;
      $x->exam_id     = $row_option[0]['exam_id'];
      $x->editOption($question_id);
    }
    else {
      $x->one1        =  $_POST['first'];
      $x->two1        =  $_POST['second'];
      $x->correct1    =  $_POST['selectTF'];
      $x->type1       =  "true or false";
      $x->question_id = $question_id;
      $x->exam_id1    = $row_option[0]['exam_id'];
      $x->editOptionTF($question_id);
    }

  $x->question     =   $_POST['qusetion'];
  $x->mark         =   $_POST['marks'];
  $x->image        =   $_FILES['q_img']['name'];
  $tmpName         =   $_FILES['q_img']['tmp_name'];
  $path            =   'images/';
  move_uploaded_file($tmpName, $path.$x->image);
  $x->exam_id      = $row_option[0]['exam_id'];

  $x->update($question_id);
  }
  ?>

  <style>
  .input-group-text{
    width:170px;
  }
  .multipleQ1 , .trueFalse1{
    display: none;
  }
  </style>

  <div class="row">
                             <div class="col-lg-12">
                                  <div class="card">
                                      <div class="card-header">Edit Qusetion</div>
                                      <div class="card-body">
                                          <div class="card-title">
                                              <h3 class="text-center title-2">Edit Qusetion</h3>
                                          </div>
                                          <hr>
                                          <form action="" method="post" enctype="multipart/form-data">
                                              <div class="form-group">
                                                  <label class="control-label mb-1">Question</label>
                                                  <input  type="text" class="form-control" name="qusetion" value="<?php echo $row[0]['q_text'];?>">
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
                                                                  <input type="radio" id="radio11" name="radios" value="option1" class="form-check-input" required>Multiple Choice
                                                              </label>
                                                          </div>
                                                          <div class="radio">
                                                              <label for="radio2" class="form-check-label text-primary">
                                                                  <input type="radio" id="radio22" name="radios" value="option2" class="form-check-input">True/False
                                                              </label>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- multiple choices -->
                                              <div class="container multipleQ1">
                                                  <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                   <span class="input-group-text">First Choice</span>
                                                  </div>
                                                 <input type="text" class="form-control" name="firstChoice" value="<?php echo $row_option[0]['option1'];?>">
                                                </div>

                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                 <span class="input-group-text">Second Choice </span>
                                                </div>
                                               <input type="text" class="form-control" name="secondChoice" value="<?php echo $row_option[0]['option2'];?>">
                                              </div>

                                              <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                               <span class="input-group-text">Third Choice</span>
                                              </div>
                                             <input type="text" class="form-control" name="thirdChoice" value="<?php echo $row_option[0]['option3'];?>">
                                            </div>

                                            <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                             <span class="input-group-text">Fourth Choice</span>
                                            </div>
                                           <input type="text" class="form-control" name="fourthChoice" value="<?php echo $row_option[0]['option4'];?>">
                                          </div>

                                         <select class="btn btn-outline-secondary" name = "select_correct" id="select_correct">
                                           <option value=""> </option>
                                           <option class="dropdown-item">First Choice</option>
                                           <option class="dropdown-item">Second Choice</option>
                                           <option class="dropdown-item">Third Choice</option>
                                           <option class="dropdown-item">Fourth Choice</option>
                                         </select>
                                      </div>
                                      <!-- end of multiple choices -->

                                      <!-- true or false -->
                                      <div class="container trueFalse1">

                                      <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                       <span class="input-group-text">First Choice</span>
                                      </div>
                                      <input type="text" class="form-control" name="first" value="<?php echo $row_option[0]['option1'];?>">
                                      </div>

                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                         <span class="input-group-text">Second Choice</span>
                                        </div>
                                       <input type="text" class="form-control" name="second" value="<?php echo $row_option[0]['option2'];?>">
                                      </div>
                                      <select class="btn btn-outline-secondary" name="selectTF" id="selectTF">
                                        <option value=""> </option>
                                        <option class="item">T</option>
                                        <option class="item">F</option>
                                      </select>
                                      </div>
                                      <!-- end of true or false -->

                                                  <hr>
                                                  <label>Mark</label>
                                              <select name="marks" class="custom-select mb-3">
                                                <option selected><?php echo $row[0]['q_mark'];?></option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>

                                              </select>
                                              <div>
                                                  <button id="payment-button" type="submit"  name="edit"class="btn btn-lg btn-info btn-block">
                                                     Edit
                                                  </button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <?php include("includes/footer.html");?>

                          <script>

                          $("#radio11").click(function(){
                              $(".multipleQ1").css("display", "inline");
                              $(".trueFalse1").css("display", "none");
                              $("#selectTF").prop('required',false);
                              $("#select_correct").prop('required',true);

                            })

                            $("#radio22").click(function(){
                              $(".multipleQ1").css("display", "none");
                              $(".trueFalse1").css("display", "inline");
                              $("#select_correct").prop('required',false);
                              $("#selectTF").prop('required',true);

                            })

                          </script>
