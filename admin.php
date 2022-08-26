<html>
<?php
session_start();
if (isset($_GET['error'])) {
      if ($_GET['error'] == "invalidadminid") {
            echo "<font color='red'><p align='center'>Incorrect Credentials</p></font>";
      }
}
?>

<head>
      <style>
            html {
                  font-family: Arial, Helvetica, sans-serif;
                  ;
            }

            form {
                  width: 40%;
                  padding: 30px;
                  height: fit-content;
                  margin: 0 auto;
                  margin-top: 3%;
                  background-color: #f9f9f9
            }

            .form-control {
                  width: 100%;
                  padding: 12px;
                  margin: 8px 0;
                  display: inline-block;
                  border: 1px solid #ccc;
                  box-sizing: border-box;
            }

            button {
                  background-color: #a2b9bc;
                  color: black;
                  border: none;
                  cursor: pointer;
                  width: 30%;
                  margin: 5px auto;
                  padding: 8px;
                  box-shadow: 0px 5px 5px #ccc;
                  border-radius: 10px;
                  border-top: 1px solid #e9e9e9;
                  display: block;
                  text-align: center;
            }

            .signup {
                  background-color: blue;
                  margin-bottom: 20px;
            }

            .login-box {
                  align: left;
                  position: left;
                  top: 50%;
                  transform: translateY(-50%);
                  padding: 50px;
                  background-color: #fff;
                  box-shadow: 0px 5px 5px #ccc;
                  border-radius: 10px;
                  border-top: 1px solid #e9e9e9;
            }

            h4,
            h2,
            p {
                  text-align: center;
            }

            a {
                  text-decoration: none;
            }

            body {
                  background-color: #e8edf7;
            }
      </style>
</head>

<body>
      <form action="adminlogin.php" method="post">
            <h2>WELCOME ADMIN</h2>
            <div class="container">
                  <div class="container">
                        <label for="id"><b>Admin ID</b></label>
                        <input type="number" class="form-control" id="id" name="ID" placeholder="Enter Admin ID" required>
                        <span></span>
                        <label for="name"><b>Password</b</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                                    <span></span>
                                    <label for="id"><b>ROLE</b></label>
                                    <select class="form-control" name="role" id="role">
                                          <option value="" disabled selected>Select your Role</option>
                                          <option value="Admin">Admin</option>
                                          <option value="Super Admin">Super Admin</option>
                                    </select><br>
                                    <button type="submit">Login</button><br>
                                    <button onclick="goBack()">Go Back</button>

                                    <script>
                                          function goBack() {
                                                window.location.href = 'index.php?sucess';
                                          }
                                    </script>
                  </div>
      </form>
</body>

</html>