<?php
include("studentClass.php");
include("includes/header.php");
$action = isset($_GET['action']) ? $_GET['action'] : 'dash';


?>

                      <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">Qusetions</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                               <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>IMAGE</th>
                                                <th>Education Level</th>
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

                                                    //echo "<td>{$row['pro_id']}</td>";
                                                    echo "<tr>";
                                                    //echo"<td>{$row['st_id']}</td>";
                                                    echo"<td>{$row['st_name']}</td>";
                                                    echo"<td>{$row['st_email']}</td>";
                                                    echo"<td>{$row['st_mobile']}</td>";
                                                    if($row['st_image']!=null)
                                                    {
                                                    echo"<td><img width='50px' height='50px' src='images/{$row['st_image']}'></td>";
                                                    }
                                                    else{
                                                    echo"<td></td>";     
                                                    }
                                                    echo"<td>{$row['ed_level']}</td>";
                                                    echo "<th><a href='students.php?action=delete&id={$row['st_id']}' class='btn btn-danger'>Delete</a></th>";
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
if($action=='delete')
{$id=$_GET['id'];
$c->delete($id);
?>
<script type="text/javascript">
window.location.href = 'students.php';
</script>
<?php


}

include("includes/footer.html");

?> 