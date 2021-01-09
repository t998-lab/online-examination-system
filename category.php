<?php
include("category_class.php");
include("includes/header.php");
$action = isset($_GET['action']) ? $_GET['action'] : 'dash';
if ($action == 'dash'){
    if(isset($_POST['submit']))
    {
        $c->cat_name  = $_POST['cat_name'];
        $c->cat_desc  = $_POST['cat_desc'];
        if(isset($_FILES['cat_img']['name']))
        {
        $c->cat_image = $_FILES['cat_img']['name'];
        $tmp          = $_FILES['cat_img']['tmp_name'];
        $path         = 'images/';
        move_uploaded_file($tmp,$path.$c->cat_image);
        }
        $c->create();
    }
?>
                        <div class="row">
                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Categories</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Category</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Category Name</label>
                                                <input  type="text" class="form-control" name="cat_name" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Description</label>
                                                <input  type="text" class="form-control"  name="cat_desc">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Image</label>
                                                <input  type="file" class="form-control"  name="cat_img">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit"  name="submit"class="btn btn-lg btn-info btn-block">
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
                                                <th>image</th>
                                                <th>show</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if($c->read()){
                                            foreach($c->read() as $row)
                                            {
                                                echo "<tr><td>{$row['cat_id']}</td><td>{$row['cat_name']}</td><td>{$row['cat_desc']}</td>";
                                                if($row['cat_image']!=null){
                                                echo "<td><img src='images/{$row['cat_image']}' width='100px' height='100px'></td>";
                                                }
                                                else{
                                                    echo "<td>{$row['cat_image']}</td>";
                                                }
                                                echo "<td><a href='category.php?action=show&id=".$row['cat_id']."' class='btn btn-secondary'>Show</a></td>";
                                                echo "<td><a href='category.php?action=edit&id=".$row['cat_id']."&&im=".$row['cat_image']."' class='btn btn-primary'>Edit</a></td>";
                                                echo "<td><a href='category.php?action=delete&id=".$row['cat_id']."' class='btn btn-danger'>Delete</a></td></tr>";
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
    $c->delete($id);
    ?>
    <script type="text/javascript">
       window.location.href = 'category.php';
    </script>
    <?php
}
elseif($action=='edit')
{
    $id=$_GET['id'];
    $data=$c->readById($id);
    if(isset($_POST['edit']))
    {
        $c->cat_name = $_POST['cat_name'];
        $c->cat_desc = $_POST['cat_desc'];
        if(($_FILES['cat_img']['name']))
        {   
            $c->cat_image = $_FILES['cat_img']['name'];
            $tmp          = $_FILES['cat_img']['tmp_name'];
            $path         = 'images/';
            move_uploaded_file($tmp,$path.$c->cat_image);
        }else{
            $image=$_GET['im'];
            $c->cat_image =$image;
        }
        $c->edit($id);
        ?>
        <script type="text/javascript">
         window.location.href = 'category.php';
        </script>
        <?php
    }
    ?>
    <div class="row">
                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Categories</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Category</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Category Name</label>
                                                <input  type="text" class="form-control" name="cat_name" value="<?php echo $data[0]['cat_name'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Description</label>
                                                <input  type="text" class="form-control"  name="cat_desc" value="<?php echo $data[0]['cat_desc'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Image</label>
                                                <input  type="file" class="form-control"  name="cat_img">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit"  name="edit" class="btn btn-lg btn-info btn-block">
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