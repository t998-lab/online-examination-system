<?php
if(!isset($_SESSION))
 {
     session_start();
 }
include_once("db_connection.php");
class Admin extends dbconnection{
    private $admin_name;
    private $admin_email;
    private $admin_password;
    private $admin_id;
    public function set($admin_id,$admin_name,$admin_email,$admin_password)
    {
        $this->admin_id=$admin_id;
        $this->admin_name=$admin_name;
        $this->admin_email=$admin_email;
        $this->admin_password=$admin_password;
    }
    public function getName()
    {
        return $this->admin_name;
    }
    public function getEmail()
    {
        return $this->admin_email;
    }
    public function getPassword()
    {
        return $this->admin_password;
    }
    public function login($admin_email,$admin_password)
    {
        $hashPassword = sha1($admin_password);//encryption (by hash function)
            $query    = "SELECT * FROM admin WHERE
                         admin_email='$admin_email'
                         AND admin_password='$hashPassword'";
            $result = $this->performQuery($query);
            $data   = $this->fetchAll($result);
            if($data){
                 $_SESSION['admin_id']=$data[0]['admin_id'];
                 $_SESSION['admin_email']=$data[0]['admin_email'];
                 $_SESSION['admin_name']=$data[0]['admin_name'];

                 return 1;
            }
            else{
                return 0;
            }
    }
    public function isLogedIn()
    {
            if($_SESSION['admin_id'])
            {
                return true;
            }
            else
            {
                return false;
            }
    }
    public function reDirect($url)
    {
        header("location:".$url);
    }
    public function logOut()
    {
        unset($_SESSION['admin_id']);
	unset($_SESSION['admin_email']);
        unset( $_SESSION['admin_name']);
    }


}
$admin=new Admin();

?>
