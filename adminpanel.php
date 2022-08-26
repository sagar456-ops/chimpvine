<?php
include('database.php');
session_start();
?>
<header>

      <style>
            .logout {
                  transform: translateY(200%);
            }

            a {
                  text-decoration: none;
            }
      </style>
      <h1>WELCOME ADMIN</h1>
      <h2>You are logged in as <?php echo $_SESSION["role"]; ?></h2>
            <?php if ($_SESSION['role'] == 'Super Admin') : ?>
     
      <button id="myButton" onclick="location.href='update_admin_form.php'">Change Admin username or password</button>
<?php endif;?>


</header>
<script>
      document.getElementById("myButton").onclick = function() {
            location.href = "update_admin_form.php";
      };
</script>
<style>
      .btn_btn-primary_mb-2 {
            transform: translateY(5px);
            position: relative;
            background-color: #1E90FF;
            border: none;
            color: bkue;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;



      }

      button {
            transform: translatex(167%);
            position: relative;
            background-color: #e8edf7;
            border: none;
            color: bkue;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
      }

      html {
            scroll-behavior: smooth;
      }

      body {
            margin: 0;
            display: grid;
            grid-template-columns: min-content 1fr;
            font-family: system-ui, sans-serif;
      }

      header {
            grid-column: 1 / 3;
            background: #455A64;
            color: white;
            padding: 1%;
            text-align: center;
      }

      nav {
            white-space: nowrap;
            background: #37474F;
      }

      nav ul {
            list-style: none;
            margin: 0;
            padding: 50px;
      }

      /* Only stick if you can fit */
      @media (min-height: 300px) {
            nav ul {
                  position: sticky;

            }
      }

      nav ul li a {
            display: block;
            padding: 0.5rem 1rem;
            color: white;
            text-decoration: none;
      }

      nav ul li a.current {
            background: black;
      }

      main {
            padding-bottom: 50px;
      }

      section {
            padding: 2rem;
            margin: 0 0 2rem 0;
      }

      footer {
            grid-column: 1 / 3;
            background: #607D8B;
            padding: 5rem 1rem;
      }

      b {
            align-content: center;
      }
</style>
<nav>
      <ul>
            <hr>
            <li><a href="#section-1">Approve-Users</a></li>
            <hr>
            <li><a href="#section-2">View-Users</a></li>
            <hr>
            <li><a href="#section-3">Admin Data</a></li>
            <hr>
            <?php if ($_SESSION['role'] == 'Super Admin') : ?>

                  <li><a href="#section-4">Add Admin</a></li>
            <?php endif; ?>
            <?php
            if (isset($_SESSION['ID'])) {
            ?>
                  <button class="logout" id="myButton_1" onclick="location.href">LOGOUT</button>
            <?php } else {
                  header("location:admin.php");
            } ?></a>
            <script>
                  document.getElementById("myButton_1").onclick = function() {
                        location.href = "logout.php";
                  };
            </script>
</nav>

<main>
      <style>
            table {
                  width: 100%;
                  border-collapse: collapse;
                  left: 50px;
                  margin-left: auto;
                  margin-right: auto;
                  margin-top: 4%;
            }

            tr {
                  border-bottom: 1px #dddddd;
                  padding: 20px;
            }

            td {
                  border-bottom: 1px #dddddd;
                  padding: 20px;
            }

            tr:hover {
                  background-color: gray;
            }

            tr:nth-child(even) {
                  background-color: #f2f2f2;
            }

            tr:nth-child(odd) {
                  background-color: #dee2e6;
            }

            .btn_btn_danger {
                  transform: translateX(-20%);
            }

            .btn_btn_danger {
                  transition-duration: 0.2s;
            }

            .btn_btn_danger:hover {
                  background-color: #eed202;
                  color: black;
            }
      </style>


      <section id="section-1">
            Pending-Request
            <div>
                  <table>
                        <tr>
                              <td>ID</td>
                              <td>Password</td>
                              <td>Approve</td>
                              <td>Delete</td>
                              <td>Role</td>
                        </tr>
                        <tr>

                              <?php
                              $sql =  "SELECT * FROM `usertable` WHERE status = 0";
                              $result_set = mysqli_query($con, $sql) or die(mysqli_error($con));
                              while ($row = mysqli_fetch_array($result_set)) { ?>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['password'] ?> </td>



                                    </td>
                                    <td>
                                          <form action="approve_user.php" method="post">
                                                <input type="hidden" name="approve_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" name="approve_btn" class="btn_btn_danger btn btn-info">Approve</button>
                                          </form>
                                    </td>
                                    <td>
                                          <form action="delete_user.php" method="post">
                                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" name="delete_btn" class="btn_btn_danger btn btn-info">Delete</button>
                                          </form>
                                    </td>
                                    <td><?php echo $row['role'] ?> </td>
                        </tr>
                  <?php
                              }
                  ?>
                  </table>

      </section>

      <hr>
      <section id="section-2">
            Registered Users
            <table>
                  <tr>
                        <td>ID</td>
                        <td>Password</td>
                        <td>Role</td>

                  </tr>
                  <tr>
                        <?php
                        $sql =  "SELECT * FROM `usertable` WHERE status = 1";
                        $result_set = mysqli_query($con, $sql) or die(mysqli_error($con));
                        while ($row = mysqli_fetch_array($result_set)) { ?>
                              <td><?php echo $row['id'] ?></td>
                              <td><?php echo $row['password'] ?> </td>
                              <td><?php echo $row['role'] ?> </td>

                  </tr>
            <?php
                        }
            ?>
            </table>


      </section>
      <hr>

      <section id="section-3">
            Admins
            <?php if ($_SESSION['role'] == 'Super Admin') { ?>
                  <table>
                        <tr>
                              <td>ID</td>
                              <td>Password</td>
                              <td>Role</td>
                              <td>Delete</td>


                        </tr>
                        <tr>


                              <?php
                              $sql =  "SELECT * FROM `admintable` WHERE status = 0";
                              $result_set = mysqli_query($con, $sql) or die(mysqli_error($con));
                              while ($row = mysqli_fetch_array($result_set)) { ?>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['password'] ?> </td>
                                    <td><?php echo $row["role"] ?>
                                    <td>
                                          <form action="delete_admin.php" method="post">
                                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" name="delete_btn" class="btn_btn_danger btn btn-info">Delete</button>
                                          </form>
                                    </td>

                        </tr>
                  <?php
                              }
                  ?>
            <?php } else {
            ?>
                  <table>
                        <tr>
                              <td>ID</td>
                              <td>Role</td>
                              <td>Delete</td>


                        </tr>
                        <tr>
                              <?php
                              $sql =  "SELECT * FROM `admintable`";
                              $result_set = mysqli_query($con, $sql) or die(mysqli_error($con));
                              while ($row = mysqli_fetch_array($result_set)) { ?>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row["role"] ?>
                                    <td><?php echo "Privilege Denied For Admin"; ?></td>
                        </tr>
            <?php
                              }
                        }
            ?>
            <tr>
                  </table>
      </section>
      <hr>
              <?php if ($_SESSION['role'] == 'Super Admin') : ?>
      <section id="section-4">
            Add Admin
            <table>

                  <tr>
                        <td>Admin Id</td>
                        <td>Password</td>
                        <td>Role</td>
                        <td>ADD</td>
                  </tr>
                  <tr>

                        <form action="addadmin.php" method="post" class="form_1">
                              <td>
                                    <input type="Number" id="id" name="id" placeholder="Enter Admin id"><br>
                              </td>
                              <td>
                                    <input type="password" id="pass" name="pass" placeholder="Enter password"><br>
                              </td>
                              <td>

                                    <input type="text" id="role" name="role" placeholder="Enter Role">

                              </td>
                              <td>
                                    <button type="submit" name="update_btn" class="btn_btn_danger btn btn-info">ADD</button>
                        </form>

                        </td>


                        </form>
                  </tr>
                  </table>
      </section>
</main>
<?php endif ;?>