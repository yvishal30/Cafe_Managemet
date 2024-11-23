<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Login Page</title>

    <style>
        body {
            margin-top: 120px ;
            background-image: url(./images/bg1.jpg);
        }

        .form-container{
            width: 100%;
            height: 100%;
        }

        form {
            border: 2px solid #333;
            padding: 20px; 
            border-radius: 10px; 
            max-width: 400px;
            margin: 20px auto; 
            background-color: #f9f9f9; 
        }

        .input-field{
            max-width: 380%;
            width: 100%;
            height: 55px;
            background-color: #f0f0f0;
            margin: 10px 0;
            border-radius: 55px;
            display: grid;
            grid-template-columns: 15% 85%;
            padding: 0 0.4rem;
            position: relative;
        }

        .input-field i {
            text-align: center;
            line-height: 55px;
            color: #2b2727;
            font-size: 1.5rem;
        }

        .input-field input {
            background: none;
            outline: none;
            border: none;
            line-height: 1;
            font-weight: 600;
            font-size: 1.2rem;
            color: #333;
        }

        .input-field input:placeholder-shown {
            color: #aaa;
            font-weight: 500;
        }

        .buttons {
            margin-top: 20px;
            padding-left: 140px;
        }

        .btn-group {
            padding-left: 90px;
            margin-bottom: 10px;
        }

        .social-text {
            padding: 0.7rem 0;
            padding-left: 75px;
        }

        .social-media {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .social-icon {
            height: 46px;
            width: 46px;
            border: 1px solid #333;
            margin: 0 0.45rem;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            color: #333;
            font-size: 1.3rem;
            border-radius: 50%;
            transition: all 0.5s;
        }

        .social-icon:hover {
            color: #20dbc2;
            border-color: #00bfa6;
        }
    </style>

    <script>
        function validateLoginForm(event) {
            event.preventDefault(); // Prevent form submission

            // Get form values
            const username = document.querySelector('input[name="username"]').value;
            const password = document.querySelector('input[name="password"]').value;

            // Username validation
            if (username.trim() === "") {
                alert("Username is required");
                return false;
            }

            // Password validation
            if (password.trim() === "") {
                alert("Password is required");
                return false;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long");
                return false;
            }

            // If all validations pass, submit the form
            // You can uncomment the line below to allow actual form submission.
            document.querySelector('form').submit();
        }
    </script>

  </head>
  <body>
    
    <div class="container">
      <div class="form-container">
        <form class="login" action="logindata.php" method="post" onsubmit="validateLoginForm(event)">
            <div class="btn-group" role="group" aria-label="Basic outlined" style="justify-content: center; align-items: center;">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btnradio1" onclick="Login_Page()">Login</label>
                <button type="button" class="btn btn-outline-primary" onclick="Register_Page()">Register</button>
            </div>

            <div class="input-field">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" name="username" placeholder="Username">
            </div>

            <div class="input-field">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" name="password" placeholder="Password">
            </div>

            <div class="buttons">
                <button type="submit" class="btn btn-success">Login</button>&nbsp;
                <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
            </div>

            <p class="social-text">or Login with Social Media</p>

            <div class="social-media">
                <a href="javascript:void(0)" class="social-icon" onclick="googleLogin()">
                    <i class="fa fa-google" aria-hidden="true"></i>
                </a>
                <a href="javascript:void(0)" class="social-icon" onclick="facebookLogin()">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="javascript:void(0)" class="social-icon" onclick="twitterLogin()">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
            </div>
        </form>
      </div>
    </div>

    <script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-auth.js"></script>

    <script>

        function Register_Page() {
            window.location.href = "register.php";
        }

        function Login_Page() {
            window.location.href = "login.php";
        }
    </script>

<?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo "<script>alert('Invalid credentials. Please try again.');</script>";
    }
    ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
  </body>
</html>
