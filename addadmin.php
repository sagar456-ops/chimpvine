<?php
session_start();
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'sagar');
$id = $_POST['id'];
$password = $_POST['pass'];
$role = $_POST['role'];

$query = mysqli_query($con, "SELECT * FROM usertable WHERE id='$id'");
if (mysqli_num_rows($query) != 0) {

?> <script>
            alert('Admin Already exist');
            window.location.href = 'adminpanel.php?success';
      </script>
<?php
} else {
      $reg = " insert into admintable(id,password,role) values ('$id','$password', '$role')";
      mysqli_query($con, $reg);
?> <script>
            alert('Admin Added aucessfully');
            window.location.href = 'adminpanel.php?success';
      </script>
<?php
}
?>