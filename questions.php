<?php
include("includes/header.php");
?>

<div class="row">
                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Qusetions</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Qusetion</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Question</label>
                                                <input  type="text" class="form-control" name="qusetion">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Image</label>
                                                <input  type="file" class="form-control"  name="q_img">
                                            </div>
                                            <hr>
                                            <div class="col col-md-3">
                                                    <label class=" form-control-label">Type</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label text-primary">
                                                                <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">True/False
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label text-primary">
                                                                <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">Multiple Choice
                                                            </label>
                                                        </div>
                                                        
                                                    </div>
                                                </div><hr>
                                                <label>Mark</label>
                                            <select name="marks" class="custom-select mb-3">
                                              <option>1</option>
                                            </select>
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
<!-- TOP CAMPAIGN-->
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">Qusetions</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <tbody>
                                                <tr>
                                                    <td>1. enter jjdjjdjjdjdjj jfhfhhf </td>
                                                    <td>choices ff</td>
                                                    <td>4/20</td>
                                                    <td>Edit</td>
                                                    <td>Delete</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--  END TOP CAMPAIGN-->

                     
<?php
include("includes/footer.html");
?>