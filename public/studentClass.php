<?php
session_start();
include_once("../db_connection.php");
class student extends dbconnection{
    public $st_name;
    public $st_email;
    public $st_password;
    public $st_id;
    public $st_image;
    public $ed_level;
    public $st_mobile;
   
    public function login($st_email,$st_password)
    {
        $hashPassword = sha1($st_password);//encryption (by hash function)
            $query    = "SELECT * FROM student WHERE
                         st_email='$st_email'
                         AND st_password='$hashPassword'";
            $result = $this->performQuery($query);
            $data   = $this->fetchAll($result);
            if($data){
                 $_SESSION['st_id']=$data[0]['st_id'];
                 $_SESSION['st_image']=$data[0]['st_image'];
                 
                 return 1;
            }
            else{
                return 0;
            }
    }
    public function isLogedIn()
    {
            if($_SESSION['st_id'])
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
        unset($_SESSION['st_id']);
        unset($_SESSION['st_image']);
    }
    public function register($name,$email,$password,$confirm_pass,$mobile,$image,$Ed_level)
    {
        $query  = "select * FROM student WHERE st_email = '$email'";
        $result = $this->performQuery($query);
        $data   = $this->fetchAll($result);
        if($data){  
            $errorEmail="* Email Already Exists";
            return $errorEmail;
        }
        else{
        if($password!=$confirm_pass){
            $erroPass="* Password not match !";
            return $erroPass;
        }
        else{
            $password=sha1($password);
            $this->name=$name;
            $this->email=$email;
            $this->password=$password;
            $this->ed_level=$Ed_level;
            $this->st_mobile=$mobile;
            $this->st_image=$image;
            $this->ed_level=addcslashes($Ed_level,"'");
            $q = "INSERT INTO student(st_name,st_email,st_password,st_mobile,st_image,ed_level)
                    VALUES
                    ('{$this->name}','$this->email','$this->password',
                    '$this->st_mobile','$this->st_image','$this->ed_level')";
                    $this->performQuery($q);
                    return "your signed up successfully";
        }
        }
         
    }
    

}

$student=new student();




?>