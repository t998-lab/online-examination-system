<?php
require("db_connection.php");
$action = isset($_GET['action']) ? $_GET['action'] : 'student';
class student extends dbconnection {
    public $st_id;
    public $st_name;
    public $st_email;
    public $st_password;
    public $st_mobile;
    public $st_image;
    public $ed_level;
   /*  public function create()
   {
        $query  = "INSERT INTO student(st_name,st_email,st_password,st_mobile,st_image,ed_level)
                   VALUES('$this->st_name','$this->st_email','$this->st_password','$this->st_mobile,'$this->st_image','$this->ed_level')";
                           $this->performQuery($query);

    }*/
public function read()
    {
        $query  = "SELECT * FROM student";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function delete($id)
    {
        $query  = "DELETE FROM student WHERE st_id={$id}";
        $result = $this->performQuery($query);
    }

}
$c = new student();



include("includes/header.php");


?>


                     <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>IMAGE</th>
                                                <th>Education Level</th>
                                                <th>Block</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data=$c->read();
                                             if($data)

                                            {
                                                foreach ($data as $row) {

                                                    //echo "<td>{$row['pro_id']}</td>";
                                                    echo "<tr>";
                                                    echo"<td>{$row['st_id']}</td>";
                                                    echo"<td>{$row['st_name']}</td>";
                                                    echo"<td>{$row['st_email']}</td>";
                                                    
                                                    echo"<td>{$row['st_mobile']}</td>";
                                                    echo"<td>{$row['st_image']}</td>";
                                                    echo"<td>{$row['ed_level']}</td>";
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