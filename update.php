<?php
require_once "database.php";

$name = $age = $salary = "";
$name_err = $age_err = $salary_err = "";

if (isset($_POST["id"]) && !empty($_POST["id"])) {
      $id = $_POST["id"];

      $input_name = trim($_POST["name"]);
      if (empty($input_name)) {
            $name_err = "Please enter a name.";
      } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
            $name_err = "Please enter a valid name.";
      } else {
            $name = $input_name;
      }

      $input_age = trim($_POST["age"]);
      if (empty($input_age)) {
            $age_err = "Please enter an age.";
      } else {
            $age = $input_age;
      }

      $input_salary = trim($_POST["salary"]);
      if (empty($input_salary)) {
            $salary_err = "Please enter the salary amount.";
      } elseif (!ctype_digit($input_salary)) {
            $salary_err = "Please enter a positive integer value.";
      } else {
            $salary = $input_salary;
      }

      if (empty($name_err) && empty($age_err) && empty($salary_err)) {
            $sql = "UPDATE employees SET name=?, age=?, salary=? WHERE id=?";

            if ($stmt = mysqli_prepare($con, $sql)) {
                  mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_age, $param_salary, $param_id);

                  $param_name = $name;
                  $param_age = $age;
                  $param_salary = $salary;
                  $param_id = $id;

                  if (mysqli_stmt_execute($stmt)) {
                        header("location: main.php");
                        exit();
                  } else {
                        echo "Oops! Something went wrong. Please try again later.";
                  }
            }

            mysqli_stmt_close($stmt);
      }

      mysqli_close($con);
} else {
      if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
            $id =  trim($_GET["id"]);

            $sql = "SELECT * FROM employees WHERE id = ?";
            if ($stmt = mysqli_prepare($con, $sql)) {
                  mysqli_stmt_bind_param($stmt, "i", $param_id);

                  $param_id = $id;

                  if (mysqli_stmt_execute($stmt)) {
                        $result = mysqli_stmt_get_result($stmt);

                        if (mysqli_num_rows($result) == 1) {
                              /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                              $name = $row["name"];
                              $age = $row["age"];
                              $salary = $row["salary"];
                        } else {
                              header("location: error.php");
                              exit();
                        }
                  } else {
                        echo "Oops! Something went wrong. Please try again later.";
                  }
            }

            mysqli_stmt_close($stmt);

            mysqli_close($con);
      } else {
            header("location: error.php");
            exit();
      }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <title>Update Record</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <style>
            .wrapper {
                  width: 600px;
                  margin: 0 auto;
            }
      </style>
</head>

<body>
      <div class="wrapper">
            <div class="container-fluid">
                  <div class="row">
                        <div class="col-md-12">
                              <h2 class="mt-5">Update Record</h2>
                              <p>Please edit the input values and submit to update the employee record.</p>
                              <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                                    <div class="form-group">
                                          <label>Name</label>
                                          <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                                          <span class="invalid-feedback"><?php echo $name_err; ?></span>
                                    </div>
                                    <div class="form-group">
                                          <label>Address</label>
                                          <textarea name="age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>"><?php echo $age; ?></textarea>
                                          <span class="invalid-feedback"><?php echo $age_err; ?></span>
                                    </div>
                                    <div class="form-group">
                                          <label>Salary</label>
                                          <input type="text" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                                          <span class="invalid-feedback"><?php echo $salary_err; ?></span>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</body>

</html>