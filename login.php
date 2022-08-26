<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'sagar');
$id = $_POST['ID'];
$password = $_POST['password'];
$password = $_POST['password'];
$status = $_POST['status'];
$query =mysqli_query($con,"select * from usertable where id = '$id' and password = '$password' and status = 1");

if (mysqli_num_rows($query) != 0){
session_start();
$_SESSION['ID'] = $id;
header('location:main.php');
}
else
{
 header('location:index.php?error=invaliduid');
}
