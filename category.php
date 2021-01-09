<?php
include("includes/header.php");
?>

<div class="row">
                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Categories</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Category Info</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Category Name</label>
                                                <input  type="text" class="form-control" name="cat_name">
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
                                                   Save
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
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
<?php
include("includes/footer.html");
?>