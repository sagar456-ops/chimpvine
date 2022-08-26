<!DOCTYPE html>
<html>

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

            body {
                  background-color: #e8edf7;
            }

            p {}
      </style>
      <title></title>
</head>

<body>


      <form class="admin" action="update_admin.php" method="POST" class="form-inline">
            <p>CHANGE ADMIN ID AND PASSWORD</p> <br>
            New ID <input type="text" name="id" id="id" class="form-control" placeholder="NEW ID" pattern="^[0-9]{3}$" required><br>
            <span></span><br>
            New Password<input type="password" id="password" name="password" class="form-control" placeholder="NEW PASSWORD" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required><br>
            <input type="checkbox" onclick="myFunction()">Show Password <br>
            <span></span>
            <button type="submit" name="Submit" value="Update" class="btn btn-primary mb-2">CHANGE</button>
      </form>
</body>
<script>
      function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                  x.type = "text";
            } else {
                  x.type = "password";
            }
      }
      let id = document.getElementById('id');
      let password = document.getElementById('password');


      let span = document.getElementsByTagName('span');

      id.onkeyup = function() {
            const regex = /^[0-9]{3}$/;
            if (regex.test(id.value)) {
                  span[0].innerText = "Your ID is valid";
                  span[0].style.color = 'Green';

            } else {
                  span[0].innerText = "**Invalid ";
                  span[0].style.color = 'Red';
            }
      }



      password.onkeyup = function() {
            const regexo = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
            if (regexo.test(password.value)) {
                  span[1].innerText = "Your password is valid";
                  span[1].style.color = 'Green';

            } else {
                  span[1].innerText = "**Your password must have one uppercase letter,lowercase letter and Number ";
                  span[1].style.color = 'Red';
            }
      }
</script>

</html>