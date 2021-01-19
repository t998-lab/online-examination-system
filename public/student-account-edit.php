
<?php
include("include/header.php");
        ?>
        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                            <li class="breadcrumb-item active">Edit Account</li>
                        </ol>
                        <h1 class="h2">Edit Account</h1>

                        <div class="card">
                            <ul class="nav nav-tabs nav-tabs-card">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#first" data-toggle="tab">Account</a>
                                </li>
                                                        </ul>
                            <div class="tab-content card-body">
                                <div class="tab-pane active" id="first">
                                    <form action="#" class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="avatar" class="col-sm-3 col-form-label form-label">Avatar</label>
                                            <div class="col-sm-9">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <div class="icon-block rounded">
                                                            <i class="material-icons text-muted-light md-36">photo</i>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="custom-file" style="width: auto;">
                                                            <input type="file" id="avatar" class="custom-file-input">
                                                            <label for="avatar" class="custom-file-label">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label form-label">Full Name</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control" placeholder="First Name" value="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="Last Name" value="">
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
                                                    <input type="text" id="email" class="form-control" placeholder="Email Address" value="" >
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
                                                    <input type="password" id="password" class="form-control" placeholder="Enter new password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-8 offset-sm-3">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <a href="#" class="btn btn-success">Save Changes</a>
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








</body>

</html>