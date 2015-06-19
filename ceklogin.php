<?php
error_reporting(0);
include 'fungsi.php';

$username =$_POST[username];
$password =$_POST[password];
ceklogin($username, $password);


