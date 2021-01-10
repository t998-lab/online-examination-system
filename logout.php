<?php
include("admin_class.php");
$admin->logOut();
if(!$admin->isLogedIn())
{
    $admin->reDirect("login.php");
}
?>