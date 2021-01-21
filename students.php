<?php
include("studentClass.php");
include("includes/header.php");
$action = isset($_GET['action']) ? $_GET['action'] : 'dash';
if($action=='dash')
{
?>

                      <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">Manage students</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                               <th>Student Id</th>
                                               <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Image</th>
                                                <th>Education Level</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $data=$c->read();
                                             if($data)

                                            {
                                                foreach ($data as $row)
                                                {

                                                    echo "<tr>";
                                                    echo"<td>{$row['st_id']}</td>";
                                                    echo"<td>{$row['st_name']}</td>";
                                                    echo"<td>{$row['st_email']}</td>";
                                                    echo"<td>{$row['st_mobile']}</td>";
                                                    if($row['st_image']!=null)
                                                    {
                                                    echo"<td><img width='75px' height='75px' src='images/{$row['st_image']}'></td>";
                                                    }
                                                    else{
                                                    echo"<td></td>";
                                                    }
                                                    echo"<td>{$row['ed_level']}</td>";
                                                    echo "<td><a href='students.php?action=edit&id={$row['st_id']}' class='btn btn-primary'>Edit</a></td>";
                                                    echo "<td><a href='students.php?action=delete&id={$row['st_id']}' class='btn btn-danger'>Delete</a></td>";
                                                    echo "</tr>";
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
if($action=='delete')
{$id=$_GET['id'];
$c->delete($id);
?>
<script type="text/javascript">
window.location.href = 'students.php';
</script>
<?php
}

elseif($action=='edit')
{
    $id   = $_GET['id'];
    $data = $c->readById($id);
    if(isset($_POST['edit']))
    {
        $c->st_name    = $_POST['st_name'];
        $c->st_email   = $_POST['st_email'];
        $c->st_mobile  = $_POST['st_mobile'];
        $c->edit($id);
        ?>
            <script type='text/javascript'>
             window.location.href = 'students.php';
            </script>

        <?php
    }
    ?>
    <div class="row">
                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Students</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Student</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Student Name</label>
                                                <input  type="text" class="form-control" name="st_name"
                                                        value="<?php echo $data[0]['st_name'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Student Email</label>
                                                <input  type="text" class="form-control"  name="st_email"
                                                value="<?php echo $data[0]['st_email'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Student Mobile Number</label>
                                                <input  type="text" class="form-control"  name="st_mobile"
                                                value="<?php echo $data[0]['st_mobile'];?>">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit"  name="edit"class="btn btn-lg btn-info btn-block">
                                                   Edit Student Information
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
