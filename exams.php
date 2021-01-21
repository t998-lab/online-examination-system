<?php
include("exam_class.php");
include_once("questionsClass.php"); //here
include("includes/header.php");
$action = isset($_GET['action']) ? $_GET['action'] : 'dash';
if($action=='dash')
{
    if(isset($_POST['submit']))
    {
        $e->exam_name  = $_POST['exam_name'];
        $e->exam_desc  = $_POST['exam_desc'];
        $e->exam_mark  = $_POST['exam_mark'];
        $e->cat_id=$_POST['catID'];
        $e->create();
    }
?>
<div class="row">
                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Exams</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Exam</h3>
                                        </div>

                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Exam Name</label>
                                                <input  type="text" class="form-control" name="exam_name">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Description</label>
                                                <input  type="text" class="form-control"  name="exam_desc">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-1">Mark</label>
                                                <input  type="text" class="form-control"  name="exam_mark">
                                            </div>
                                            <label>Select Category</label>
                                            <select name="catID" class="custom-select mb-3">
                                              <?php
                                              foreach($c->read() as $row)
                                              {
                                                ?>
                                                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name']?></option>
                                                <?php
                                              }
                                              ?>
                                            </select>
                                            <div>
                                                <button id="payment-button" type="submit"  name="submit"class="btn btn-lg btn-primary btn-block">
                                                   Add
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                     <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>description</th>
                                                <th>Mark</th>
                                                <th>Category</th>
                                                <th>examinees</th>
                                                <th class='text-success'>Passed</th>
                                                <th class='text-danger'>Failed</th>
                                                <th>show</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if($e->read()){
                                            foreach($e->read() as $row)
                                            {
                                                $cat_id=$row['cat_id'];
                                                $category=$c->readById($cat_id);
                                                echo "<tr><td>{$row['exam_id']}</td><td>{$row['exam_name']}</td><td>{$row['exam_desc']}</td>";
                                                echo "<td class='text-primary'>{$row['exam_mark']}</td><td>".$category[0]['cat_name']."</td>";
                                                echo "<td>{$row['tekenNum']}</td>";
                                                echo "<td class='text-success'>{$row['pass']}</td>";
                                                echo "<td class='text-danger'>{$row['fail']}</td>";
                                                echo "<td><a href='questions.php?id={$row['exam_id']}' class='btn btn-sm btn-secondary'>Show</a></td>";
                                                echo "<td><a href='exams.php?action=edit&id=".$row['exam_id']."' class='btn btn-sm btn-primary'>Edit</a></td>";
                                                echo "<td><a href='exams.php?action=delete&id=".$row['exam_id']."' class='btn btn-sm btn-danger'>Delete</a></td></tr>";


                                            }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

<?php
}
elseif($action=='delete')
{
    $id=$_GET['id'];
    $e->delete($id);
    ?>
    <script type="text/javascript">
       window.location.href = 'exams.php';
    </script>
    <?php
}
elseif($action=='edit')
{
    $id=$_GET['id'];
    $data=$e->readById($id);
    if(isset($_POST['edit']))
    {
        $e->exam_name = $_POST['exam_name'];
        $e->exam_desc = $_POST['exam_desc'];
        $e->exam_mark = $_POST['exam_mark'];
        $e->cat_id=$_POST['catID'];
        $e->edit($id);
        ?>
        <script type="text/javascript">
         window.location.href = 'exams.php';
        </script>
        <?php
    }
    ?>
    <div class="row">
                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Exams</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Exam</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Exam Name</label>
                                                <input  type="text" class="form-control" name="exam_name"
                                                        value="<?php echo $data[0]['exam_name'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Description</label>
                                                <input  type="text" class="form-control"  name="exam_desc"
                                                value="<?php echo $data[0]['exam_desc'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Mark</label>
                                                <input  type="text" class="form-control"  name="exam_mark"
                                                value="<?php echo $data[0]['exam_mark'];?>">
                                            </div>
                                            <label>Category</label>
                                            <select name="catID" class="custom-select mb-3">
                                              <?php
                                              $selected_category=$c->readById($data[0]['cat_id']);
                                              echo "<option value=".$selected_category[0]['cat_id'].">".$selected_category[0]['cat_name']."</option>";
                                              foreach($c->read() as $row)
                                              {
                                                if($row['cat_id']==$selected_category[0]['cat_id'])
                                                continue;
                                                ?>
                                                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                                                <?php
                                              }
                                              ?>
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
    <?php
}
include("includes/footer.html");
?>
