<html>

<head>
      <?php include("database.php"); ?> <body>

            <?php
            if ((isset($_POST)) && (!empty($_POST))) {
                  $id = mysqli_real_escape_string($con, $_POST['id']);
                  $password = mysqli_real_escape_string($con, $_POST['password']);
                 

                  $sql = "UPDATE admintable SET id = '" . $id . "', password='" . $password . "' WHERE status = 1";

                  $result = mysqli_query($con, $sql);
                  if (isset($result)) {
            ?> <script>
                              alert("Changed Sucessfully");
                              window.location = 'adminpanel.php';
                        </script>
                  <?php
                  } else {
                  ?>
                        <script>
                              alert("Error");
                              window.location = 'update_admin_form.php';
                        </script>
            <?php
                  }
            }

            ?>
            </body>

</html>