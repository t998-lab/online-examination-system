<?php
include("include/header.php");
include("historyClass.php");
class CatDash extends dbconnection{
    public function readAllCat()
    {
        $query  = "SELECT * FROM category";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
}
$c=new CatDash();
$category=$c->readAllCat();

$readExam = $h->readById(1);
?>
        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <h1 class="h2">Dashboard</h1>

                        <div class="card border-left-3 border-left-primary card-2by1">
                            <div >
                                <div >
                                    <div>
                                    </div>
                                                                                                   </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <div class="flex">
                                            <h4 class="card-title">MY Exams</h4>
                                            <p class="card-subtitle">Score</p>
                                        </div>
                                        <div class="dropdown">
                                                                                    </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart" style="height: 319px;">
                                            <canvas id="topicIqChart" class="chart-canvas"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">Categories</h4>
                                                <p class="card-subtitle">All categories in the system</p>
                                            </div>
                                            <div class="media-right">
                                            </div>
                                        </div>
                                    </div>



                                    <ul class="list-group list-group-fit mb-0" style="z-index: initial;">


                                        <?php
                                        if($category){
                                            foreach($category as $row)
                                            {?>
                                        <li class="list-group-item" style="z-index: initial;">
                                            <div class="d-flex align-items-center">
                                                <?php echo '<a href="student-my-exam.php?id='.$row['cat_id'].'&n='.$row['cat_name'].'" class="avatar avatar-4by3 avatar-sm mr-3">';?>
                                                   <?php if($row['cat_image']!=null){?>
                                                    <img src="../images/<?php echo$row['cat_image'];?>" alt="course" class="avatar-img rounded">
                                                    <?php } else
                                                    {?>
                                                    <img src="assets/images/logo/primary.svg" alt="exam" class="avatar-img rounded">
                                                    <?php }?>
                                                </a>
                                                <div class="flex">
                                                    <?php echo '<a href="student-my-exam.php?id='.$row['cat_id'].'&n='.$row['cat_name'].'"class="text-body">'?><strong><?php echo $row['cat_name']; ?></strong></a>
                                                    <div class="d-flex align-items-center">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                           <?php }
                                        }
                                        ?>

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

    <!-- Chart.js Samples -->
    <script>
        (function() {
            'use strict';

            Charts.init()

            var earnings = []

            // Create a date range for the last 7 days
            var start = moment().subtract(6, 'days').format('YYYY-MM-DD') // 7 days ago
            var end = moment().format('YYYY-MM-DD') // today
            var range = moment.range(start, end)

            // Create the earnings graph data
            // Iterate the date range and assign a random ($) earnings value for each day
            range.by('days', function(moment) {
                earnings.push({
                    y: Math.floor(Math.random() * 200) + 15,
                    x: moment.toDate()
                })
            })

            var WeekIQChart = function(id, type = 'line', options = {}) {
                options = Chart.helpers.merge({
                    elements: {
                        point: {
                            pointStyle: 'circle',
                            radius: 4,
                            hoverRadius: 5,
                            backgroundColor: settings.colors.white,
                            borderColor: settings.colors.primary[500],
                            borderWidth: 2
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false
                            },
                            type: 'time',
                            distribution: 'series',
                            time: {
                                unit: 'day',
                                stepSize: 1,
                                autoSkip: false,
                                displayFormats: {
                                    day: 'dd'
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(a, e) {
                                var t = e.datasets[a.datasetIndex].label || "",
                                    o = a.yLabel,
                                    r = "";
                                return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">' + o + " points</span>"
                            }
                        }
                    }
                }, options)

                var data = {
                    datasets: [{
                        label: "Experience IQ",
                        data: earnings,
                        pointHoverBorderColor: settings.colors.success[400],
                        pointHoverBackgroundColor: settings.colors.white
                    }]
                }

                Charts.create(id, type, options, data)
            }

            var TopicIQChart = function(id, type = 'radar', options = {}) {
                options = Chart.helpers.merge({
                    elements: {
                        point: {
                            pointStyle: 'circle',
                            radius: 4,
                            hoverRadius: 5,
                            backgroundColor: settings.colors.white,
                            borderColor: settings.colors.primary[500],
                            borderWidth: 2
                        }
                    },
                    scale: {
                        ticks: {
                            display: false,
                            beginAtZero: true,
                            maxTicksLimit: 4
                        },
                        gridLines: {
                            color: settings.colors.gray[300]
                        },
                        angleLines: {
                            color: settings.colors.gray[300]
                        },
                        pointLabels: {
                            fontSize: 14
                        }
                    },
                    tooltips: {
                        callbacks: {
                            label: function(a, e) {
                                var t = e.datasets[a.datasetIndex].label || "",
                                    o = a.yLabel,
                                    r = "";
                                return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">' + o + " points</span>"
                            }
                        }
                    }
                }, options)

                var data = {
                  labels: [
                    <?php
                    foreach ($readExam as $key) {
                      echo " '{$key['exam_name']}'";
                      echo ",";

                    }
                    ?>
                  ],
                    datasets: [{
                        label: "Experience IQ",

                        data: [
                          <?php
                          foreach ($readExam as $value) {
                            echo " '{$value['result']}'";
                            echo ",";
                          }?>
                        ],

                        pointHoverBorderColor: settings.colors.success[400],
                        pointHoverBackgroundColor: settings.colors.white,
                        borderJoinStyle: 'bevel',
                        lineTension: .1
                    }]
                }

                Charts.create(id, type, options, data)
            }

            // Create Chart
            WeekIQChart('#iqChart')
            TopicIQChart('#topicIqChart')

        })()
    </script>

</body>

</html>
