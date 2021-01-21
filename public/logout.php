<?php
include("studentClass.php");
$student->logOut();
if(!$student->isLogedIn())
{
    $student->reDirect("user-login.php");
}
?>