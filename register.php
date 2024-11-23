<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Register Page</title>

    <style>
        body {
            margin-top: 120px ;
            background-image: url(./images/bg1.jpg);
        }
        .form-container{
            width: 100%;
            height: 100%;
        }

        form{
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

        .input-field input{
            background: none;
            outline: none;
            border: none;
            line-height: 1;
            font-weight: 600;
            font-size: 1.2rem;
            color: #333;
        }

        .buttons{
            margin: 20px;
            padding-left: 116px;
        }

        .social-media{
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
        function validateForm(event) {
            event.preventDefault();

            
            const username = document.querySelector('input[name="username"]').value;
            const email = document.querySelector('input[name="email"]').value;
            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="confirm-password"]').value;

            
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

            
            if (username.trim() === "") {
                alert("Username is required");
                return false;
            }
          
            if (!email.match(emailPattern)) {
                alert("Please enter a valid email address");
                return false;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Passwords do not match");
                return false;
            }

            alert("Form submitted successfully!");
            document.querySelector('form').submit();
        }
    </script>
    
  </head>
  <body>
    
    <div class="container">
    <div class="form-container">
    <form class="login" action="registerdata.php" method="post" onsubmit="validateForm(event)">
        <div class="btn-group" role="group" aria-label="Basic outlined" style="justify-content: center;align-items: center;padding-left: 100px;">
            <button type="button" class="btn btn-outline-primary" onclick="Login_Page()">Login</button>
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio1">Sign-Up</label>
        </div>

        <div class="input-field">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" name="username" placeholder="Username">
        </div>

        <div class="input-field">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <input type="email" name="email" placeholder="Email ID">
        </div>

        <div class="input-field">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" name="password" placeholder="Password">
        </div>

        <div class="input-field">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" name="confirm-password" placeholder="Confirm Password">
        </div>

        <div class="buttons">
            <button type="submit" class="btn btn-danger">Register</button>
        </div>

        <div class="social-media">
            <a href="#" class="social-icon">
                <i class="fa fa-google" aria-hidden="true"></i>
            </a>
            <a href="#" class="social-icon">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="#" class="social-icon">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
        </div>
    </form>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <script>
        function Login_Page(){
            window.location.href = "login.php";
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
