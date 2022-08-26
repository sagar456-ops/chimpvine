<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'sagar');
$id = $_POST['ID'];
$password = $_POST['password'];
$role = $_POST['role'];


$query =mysqli_query($con,"select * from admintable where id = '$id' and password = '$password' and role = '$role'");

if (mysqli_num_rows($query) != 0){
	$_SESSION['ID'] = $id;
	$_SESSION['role'] = $role;

header('location:adminpanel.php');
}
else{
	header('location:admin.php?error=invalidadminid');
}
