
<?php
include_once("include/header.php");
include_once("../db_connection.php");
class EditStudent extends dbconnection {
public function select($id)
{
  $query = "SELECT * from student WHERE st_id = $id";
  $result = $this->performQuery($query);
  return    $this->fetchAll($result);
}
public function update($id){
  $query = "UPDATE student SET st_name     = '$this->name',
                 st_email                  = '$this->email',
                 st_image                  = '$this->image'
                 WHERE st_id               =  $id";
  $this->performQuery($query);?>
  <script>window.location='student-dashboard.php';</script>
<?php }

public function password(){
  if($this->newPass!=NULL){
    $newPassword = sha1($this->newPass);
    if($this->password!=$newPassword)
      { $query = "UPDATE student SET st_password = '$newPassword'
                  WHERE st_id = 2";
        $this->performQuery($query);
         return true;}
    else {return false;}
   }
   else{return true;}
}
}
$st_id = $stSession;
$e=new EditStudent();
$select =$e->select($st_id);

if(isset($_POST['edit'])){
 $e->name      =  $_POST['name'];
 $e->email     =  $_POST['email'];
 $e->password  =  $select[0]['st_password'];
 $e->newPass   =  $_POST['newPass'];
 $e->password();

 if($_FILES['st_image']['name']){
   $e->image        =   $_FILES['st_image']['name'];
   $tmpName         =   $_FILES['st_image']['tmp_name'];
   $path            =   '../images/';
   move_uploaded_file($tmpName, $path.$e->image);
   }
 else{
   $e->image=$select[0]['st_image'];
 }
 if($e->password()==true){
 $e->update($st_id);
}
else{ $error = "Your new password is the same as your old password!";}
}
?>
        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                            <li class="breadcrumb-item active">My Account</li>
                        </ol>
                        <h1 class="h2">Edit Account</h1>


                        <div class="card">
                            <ul class="nav nav-tabs nav-tabs-card">
                                <li class="nav-item">
                                    <a class="nav-link active text-primary" href="#first" data-toggle="tab">Account</a>
                                </li>
                                                        </ul>
                            <div class="tab-content card-body">
                                <div class="tab-pane active" id="first">
                                  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label form-label">Full Name</label>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input id="name" type="text" class="form-control"
                                                         placeholder="Full Name" name="name" value="<?php echo $select[0]['st_name'];?>">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label form-label">Email</label>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="material-icons md-18 text-muted">mail</i>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="email" class="form-control"
                                                     placeholder="Email Address" name="email" value="<?php echo $select[0]['st_email'];?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-3 col-form-label form-label">Change Password</label>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="material-icons md-18 text-muted">lock</i>
                                                        </div>
                                                    </div>
                                                    <input type="password" id="password" class="form-control"
                                                     placeholder="Your password" name="password" value="<?php echo $select[0]['st_password'];?>"
                                                    readonly="readonly">

                                                </div>

                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="material-icons md-18 text-muted">lock</i>
                                                        </div>
                                                    </div>
                                                    <input type="password" id="password" class="form-control"
                                                     placeholder="Enter new password" name="newPass" value="">

                                                </div>
                                                <?php
                                                  if(isset($error)){
                                                      echo "<div class=' text-center col-md-12 float-right mt-3 mb-2' style='background:#FFDDDD;padding:1px'>".$error."</div>";
                                                  }
                                                 ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="avatar" class="col-sm-3 col-form-label form-label">Image</label>
                                            <div class="col-sm-9">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <div class="icon-block rounded">
                                                            <i><img name="st_image"class="material-icons text-muted-light md-36 w-100 h-100"
                                                                src="../images/<?php echo $select[0]['st_image'];?>" alt=""></i>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="custom-file" style="width: auto;">
                                                            <input type="file" name="st_image" id="avatar" class="custom-file-input">
                                                            <label for="avatar" class="custom-file-label">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-8 offset-sm-3">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <button type="submit" name="edit"class="btn btn-success w-100">
                                                           Save Changes
                                                        </button>
                                                    </div>
                                                    <div class="media-body pl-1">
                                                        <div class="custom-control custom-checkbox">
                                                                                                                  </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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


<?php include("include/side.php");?>



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


    <script>
    // to make the name of the image appear
    $(".custom-file-input").on("change", function() {
     var fileName = $(this).val().split("\\").pop();
     $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>



</body>

</html>
