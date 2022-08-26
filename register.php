<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'sagar');
$id = $_POST['ID'];
$password = $_POST['password'];
$role = $_POST['role'];

$query = mysqli_query($con,"SELECT * FROM usertable WHERE id='$id'");
if (mysqli_num_rows($query) != 0)
{
    header('location:registerpage.php?error=already_exist');
}
else{
$reg = " insert into usertable(id,password,role) values ('$id','$password', '$role')";
mysqli_query($con,$reg);
header('location:index.php?error=sucess');
}

