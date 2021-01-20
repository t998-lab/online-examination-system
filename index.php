<?php
require("db_connection.php");
class Dashboard extends dbconnection{
    
    public $numOfStudents;
    public $numOfCategories;
    public $numOfExmas;
    public function count($table)
    {
        $query="SELECT COUNT(*) FROM $table";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function readTopExams()
    {
        $query="SELECT exam_name,tekenNum FROM exam ORDER BY tekenNum DESC LIMIT 10";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function readTopCategory()
    {
        $query="SELECT cat_name,tekenNum FROM category ORDER BY tekenNum DESC LIMIT 3";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }

}
$d=new Dashboard();


include("includes/header.php");
?>

<div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Dashboard</h2>
                                </div>
                            </div>
                        </div>
<div class="row m-t-25">
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner p-2 pb-4">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="text">
                                                <h2>
                                                <?php $array=$d->count("student");
                                                $d->numOfStudents=$array[0]['COUNT(*)'];
                                                echo $d->numOfStudents;
                                                ?></h2>
                                                <span>Students</span>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner p-2 pb-4">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-table"></i>
                                            </div>
                                            <div class="text">
                                                <h2> <?php $array=$d->count("category");
                                                $d->numOfCategories=$array[0]['COUNT(*)'];
                                                echo $d->numOfCategories;
                                                ?></h2>
                                                <span>Categories</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                              <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner p-2 pb-4">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-tasks"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php $array=$d->count("exam");
                                                $d->numOfExams=$array[0]['COUNT(*)'];
                                                echo $d->numOfExams;
                                                ?></h2>
                                                <span>Exams</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                 
</div>
<div class="row">
<div class="col-lg-6">
                                <!-- TOP CAMPAIGN-->
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">Top 10 exams taken by students</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <tbody>
                                            <?php
                                            $topExams=$d->readTopExams();
                                            if($topExams){
                                            foreach($topExams as $row)
                                            {
                                                echo "<tr><td>{$row['exam_name']}</td><td>{$row['tekenNum']}</td></tr>";
                                            }}
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--  END TOP CAMPAIGN-->
                            </div>
<div class="col-lg-6">
                                <!-- TOP CAMPAIGN-->
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">Top 3 categories taken by students</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <tbody>
                                            <?php
                                            $topCat=$d->readTopCategory();
                                            if($topCat){
                                            foreach($topCat as $row)
                                            {
                                                echo "<tr><td>{$row['cat_name']}</td><td>{$row['tekenNum']}</td></tr>";
                                            }}
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--  END TOP CAMPAIGN-->
                            </div>
</div>
</div>
<?php
include("includes/footer.html");
?>