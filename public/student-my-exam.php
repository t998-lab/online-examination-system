<?php
include_once("../db_connection.php");
include("include/header.php");

class ExamStudent extends dbconnection
{
    public function AllExamByCatId($id)
    {
        $query  = "SELECT * FROM exam WHERE cat_id=$id";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
}
$name=$_GET['n'];
$cat_id=$_GET['id'];
$e=new ExamStudent();
$exam=$e->AllExamByCatId($cat_id);
?>


        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo $name;?></li>
                        </ol>
                        <div class="media mb-headings align-items-center">
                            <div class="media-body">
                                <h1 class="h2"><?php echo $name;?> Exams</h1><br><br>
                            </div>
                                                    </div>
                        <div class="card-columns">
                         <?php if($exam)
                         { foreach($exam as $row)
                         {
                         ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="media">
                                        <div class="media-left">
                                               
                                        </div>
                                        <div class="media-body">
                                            <h4 class="card-title m-0"><?php echo $row['exam_name'];?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <?php echo '<a href="takeExam.php?eid='.$row['exam_id'].'" class="btn btn-primary btn-sm">';?>Take Exam<i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                </div>
                            </div>
                           <?php
                         }
                         }
                            ?>

                            <div>
                                <div>
                                                                  </div>
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