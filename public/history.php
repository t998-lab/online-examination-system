
<?php
include("include/header.php");
include("historyClass.php");
$readExam = $h->readById($stSession);//testtttt
?>
        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Exam History</li>
                        </ol>
                        <h1 class="h2">My Exam History</h1>


                        <div class="row">
                            <div class="col-lg-12">



                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">Exams</h4>
                                            </div>
                                            <div class="media-right">
                                            </div>
                                        </div>
                                    </div>



                                    <ul class="list-group list-group-fit mb-0" style="z-index: initial;">


                                          <?php
                                          if ($readExam) {


                                          foreach ($readExam as $key) {
                                          $ID = $key['h_id'];
                                            ?>
                                            <li class="list-group-item" style="z-index: initial;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex">
                                                      <a href="exam-result.php?h_id=<?php echo $ID?>" class="avatar avatar-4by3 avatar-sm mr-3">
                                                      <?php if ($key['cat_image']==NULL) {?>
                                                        <img src="assets/images/logo/primary.svg" alt="exam" class="avatar-img rounded">

                                                      <?php } else{?>

                                                          <img src="../images/<?php echo $key['cat_image'];?>" alt="exam" class="avatar-img rounded"><?php }?>
                                                        </a>
                                                        <a href="exam-result.php?h_id=<?php echo $ID?>" class="text-body"><strong class="text-primary"><?php echo $key['exam_name'];?></strong></a>
                                                        <span class="float-right"><?php echo $key['result'];?> </span>
                                                        <div class="d-flex align-items-center">
                                                                                                                </div>

                                                    </div>
                                                                                                                                                                                              </div>
                                            </li>

                                          <?php }}?>
                                          








                                    </ul>
                                </div>


                                <div >
                                    <div>
                                        <div >
                                                                                                                              </div>
                                    </div>

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






    <!-- Global Settings -->
    <script src="assets/js/settings.js"></script>

    <!-- Moment.js -->
    <script src="assets/vendor/moment.min.js"></script>
    <script src="assets/vendor/moment-range.min.js"></script>

    <!-- Chart.js -->
    <script src="assets/vendor/Chart.min.js"></script>

    <!-- UI Charts Page JS -->
    <script src="assets/js/chartjs-rounded-bar.js"></script>
    <script src="assets/js/chartjs.js"></script>


</body>

</html>
