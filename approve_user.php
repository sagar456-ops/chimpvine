<?php
include 'database.php';
if (isset($_POST['approve_btn'])) {
      $id = $_POST['approve_id'];

      $query = "update usertable set status ='1' where id = '$id'";
      $query_run = mysqli_query($con, $query);

      if ($query_run) {
?>
            <script>
                  alert('User approval is Given');
                  window.location.href = 'adminpanel.php?success';
            </script>
      <?php

      } else {
      ?>
            <script>
                  alert('Error');
                  window.location.href = 'adminpanel.php?success';
            </script>
<?php
      }
}
?>