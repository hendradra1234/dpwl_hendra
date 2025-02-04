<?php
 include "config/connection.php";
 if (!isset($_SESSION)) {
    @session_start();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hendra | Clarisha</title>

    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="./vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method = "POST">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div>
                <input type = "submit" class="btn btn-danger submit" value="login" name="login"/>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>
                    <div class="profile_pic">
                      <img src="images/logo.webp" alt="..." class="img-circle profile_img">
                    </div> !st Bravo Airlift Command</h1>
                  <p>ISB Atma Luhur</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name = ="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" name = ="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name = ="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Airlift Command</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>


<?php
    if(isset($_POST['login']) == 'LOGIN'){ 
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
    if (empty($username) || empty($password))
    {
        echo "<script>alert('Username / Password Tidak Boleh Kosong')</script>";
        echo "<meta http-equiv='refresh' content='0 url = login.php'>";
    }
    else {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        if (!$sql) {
            // If the query failed, print the error
            echo("Query failed: " . mysqli_error($conn));
        } else {
          $result = mysqli_fetch_array($sql);
          if ($result[1])
          {
              $_SESSION['level'] = 'admin';
              $_SESSION['username'] = $username;
              echo " <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <h5><i class='icon fas fa-check'></i> Alert!</h5> LOGIN SUKSES
              </div>";
              echo "<meta http-equiv='refresh' content='0 url=index.php'>";
          } else {
          echo "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <h5><i class='icon fas fa-ban'></i> Alert!</h5>
              GAGAL.
              </div>";
          }
      }
    }
  }
?>