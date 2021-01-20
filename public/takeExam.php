<?php
include("include/header.php");
include("../questionsClass.php");
$array1=array();
$examID = $_GET['eid'];//get exam's real Id
?>

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                            <li class="breadcrumb-item active">Programing Exam</li>
                        </ol>
                        <div class="media mb-headings align-items-center">
                            <div class="media-body">
                                <h1 class="h2">Programing Exam</h1><br><br>
                            </div>
                        </div>
                           <form action="" method="post" enctype="multipart/form-data">
                                    <?php
                                     $variable=$x->readQByExamId($examID); //hh
                                     // if (is_array($variable) || is_object($variable)){
                                     if($variable){
                                     foreach ($variable as $question) {?>
                                       <div class="card mb-3 p-5">
                                      <div class="card-body">
                                        <p class="card-text"><small class="text-secondary"><?php echo $question['q_mark']." Marks"; ?></small></p>
                                        <?php if($question['q_image']!=null){
                                          echo "<img src='../images/{$question['q_image']}' class='card-img-top' height='400px' width='500px'>  ";
                                        } ?>
                                        <p class="card-text"><?php echo $question['q_text']; ?></p>
                                      </div>

                                  <?php
                                     $options =$x->readOptionById($question['q_id']);
                                     if ($options[0]['type']=='multiple') {?>
                                       <div class="form-check ml-3">
                                           <div class="radio">
                                               <label for="radios" class="form-check-label text-primary">
                                                   <input type="radio"  name="<?php echo $question['q_id']?>" value="<?php echo $options[0]['option1'];?>">
                                                   <?php echo $options[0]['option1'];?>
                                               </label>
                                           </div>
                                           <div class="radio">
                                               <label for="radios" class="form-check-label text-primary">
                                                   <input type="radio"  name="<?php echo $question['q_id']?>" value="<?php echo $options[0]['option2'];?>" >
                                                   <?php echo $options[0]['option2'];?>
                                               </label>
                                           </div>
                                           <div class="radio">
                                               <label for="radios" class="form-check-label text-primary">
                                                   <input type="radio"  name="<?php echo $question['q_id']?>" value="<?php echo $options[0]['option3'];?>" >
                                                   <?php echo $options[0]['option3'];?>
                                               </label>
                                           </div>
                                           <div class="radio">
                                               <label for="radios" class="form-check-label text-primary">
                                                   <input type="radio"  name="<?php echo $question['q_id']?>" value="<?php echo $options[0]['option4'];?>" >
                                                   <?php echo $options[0]['option4'];?>
                                               </label>
                                           </div>
                                       </div>
                                     <?php
                                      }
                                   else {?>

                                     <div class="form-check ml-3">
                                         <div class="radio">
                                             <label for="radios" class="form-check-label text-primary">
                                                 <input type="radio"  name="<?php echo $question['q_id']?>" value="<?php echo $options[0]['option1'];?>" >
                                                 <?php echo $options[0]['option1'];?>
                                             </label>
                                         </div>
                                         <div class="radio">
                                             <label for="radios" class="form-check-label text-primary">
                                                 <input type="radio"  name="<?php echo $question['q_id']?>" value="<?php echo $options[0]['option2'];?>" >
                                                 <?php echo $options[0]['option2'];?>
                                             </label>
                                         </div>
                                      </div>
                                   <?php }
                                   echo "</div>";
                                   $q = $question['q_id'];
                                   if (isset($_POST[$q])) {
                                     $array1[$q]=$_POST[$q];
                                   }
                                 }}?>
                                 <div class="text-center">
                                   <button id="submit_answers" type="submit"
                                   name="submit"class="btn btn-lg btn-success btn-block m-4 w-25">
                                      Submit Answers
                                   </button>
                                 </div></form>
                                 </div>

                                 <?php
                                 if (isset($_POST['submit'])) {
                                    date_default_timezone_set('Asia/Amman');
                                    $date       =date("Y-m-d");
                                    $st_id      = 1;//get student's real Id
                                    $x->addStHistory($st_id,$examID,$date,$array1);
                                 }
                                 ?>

                                  <div class="text-center col-md-12 float-right">
                                    <div class="copyright">
                                      <p>Copyright © 2020-2021. All rights reserved.</p>
                                     </div>
                                  </div>
                                </div>
                                <?php
                                include("include/side.php");
                                ?>
                              </div>
                            </div>
    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/dom-factory.js"></script>
    <script src="assets/vendor/material-design-kit.js"></script>

    <!-- App JS -->
    <script src="assets/js/app.js"></script>

    <!-- Highlight.js -->
    <script src="assets/js/hljs.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>

</body>

</html>
