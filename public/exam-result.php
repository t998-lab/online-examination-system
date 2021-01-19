<?php
include("include/header.php");
include("../questionsClass.php");
$h_id  = $_GET['h_id'];
$exam =$x->readResult($h_id);
$readQ = $x->readQuestions($h_id);
?>
<style>
#correct_op{
  color:green;
}
#st_answer_false{
  color:red;

}
#st_answer_true{
  color:green;
}
</style>

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                  <div class="container-fluid page__container">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                          <li class="breadcrumb-item active"><?php echo $exam[0]['exam_name']?> Exam</li>
                      </ol>
                      <h5 class="h5">Exam Date: <?php echo $exam[0]['exam_date']?></h5>
                      <div class="media mb-headings align-items-center">
                          <div class="media-body">
                              <h2 class="h2"><?php echo $exam[0]['exam_name']?> Exam</h2><br><br>
                            <h4 class="h4">Your Result: <?php echo $exam[0]['result']. "/" .$exam[0]['exam_mark']?> </h4><br><br>
                          </div>
                      </div>

                      <div class="container">
                        <div class="row">
                          <?php
                          $i=1;
                          foreach ($readQ as $row) {


                              ?>
                            <div class="col-12">
                            <p>Question <?php echo $i++; ?></p>
                            <div class="card img-fluid">
                             <?php if($row['q_image']!=NULL){
                            echo "<img class='card-img-top' src='../images/{$row['q_image']}'
                             alt='Card image' style='width:100%'>";}?>
                            <div class="card-img-overlay">
                            <p class="card-text"><?php echo $row['q_text']?></p>
                              <table>
                                <tr>
                                  <?php if($row['st_answer']==$row['correct_op']){
                                 echo "<td id='st_answer_true'> {$row['st_answer']}</td>";
                                  }
                                  else{
                                   echo"<td id='st_answer_false'>{$row['st_answer']}</td>";

                                 }?>
                                </tr>
                                <tr>
                                  <td id="correct_op"><?php echo $row['correct_op']?></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      <?php
                    }?>
                    </div>
                 </div>
              </div>
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
