<!doctype html>
<html lang="en">
  <head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-12FEP7SRN3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-12FEP7SRN3');
</script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <title>Contact</title>
    <style>
      body {
        font-family: 'Times New Roman', Times, serif;
      font-size:large;
          /* background-image: url("./images/bg.png"); */
          background-color: #f1f1f1;
      }
      
      .container {
          max-width: 500px;
          margin: 50px auto;
          background-color: #fff;
          padding: 20px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          align-items: center;
      }
      
      h1 {
          text-align: center;
      }
      
      .form-group {
          margin-bottom: 20px;
      }
      
      .form-group label {
        font-family: 'Times New Roman', Times, serif;
      font-size:large;
          display: block;
          font-weight: bold;
          margin-bottom: 5px;
      }
      
      .form-group input,
      .form-group textarea {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 4px;
      }
      
      .form-group textarea {
          height: 100px;
      }
      
      .form-group button {
          display: block;
          width: 100%;
          padding: 10px;
          border: none;
          background-color: rgb(230,104,59);
          color: #fff;
          cursor: pointer;
          border-radius: 4px;
      }
      
      .form-group button:hover {
          background-color: rgb(59,174,209);
      }
  </style>
  </head>
  <body>
  <div class="sticky-top">
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#" ><span style="font-size: 2rem;"></span><img src="./images/Logo2.png" style="width: 45px; height: 45px;border-radius: 66px;" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                <span style="font-family: 'Times New Roman', Times, serif;" >VS Restaurant</span></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="padding-left: 60%;font-family: 'Times New Roman', Times, serif;
      font-size:large;">
                <div class="navbar-nav">
                  <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                  <a class="nav-link active" href="./about.php">About</a>
                  <a class="nav-link active" href="./menu.php">Menu</a>
                  <a class="nav-link active" href="./services.php">Services</a>
                  <a class="nav-link active" href="./book_table.php">Reservation</a>
                  <a class="nav-link active" href="./contact.php">Contact</a>
                  <a class="nav-link active" href="./cart.php">
    <i class="fas fa-shopping-cart" style="position: relative;">
      <span id="cart-badge" style="
        position: absolute;
        top: -10px;
        right: -10px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 12px;
        display: none;">0</span>
    </i>
  </a>
                </div>
              </div>
            </div>
          </nav>
    </div>
      <!-- <div class="container-contactdiv" style="background-color:#333;color: #fff;
      padding: 20px;text-align: center;height: 20%;width: 100%">
        <h3 style='color:#f7ae31'><center>&emsp;<b>"Contact Details"</h3><hr> -->


            
            <div class="container">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <h1>Contact Me</h1>
              <form id="contactForm" action="contact_details.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Send Message</button>
                </div>
            </form>
        </div> </div>
        
        <script>
            document.getElementById('contactForm').addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent form submission
                var form = event.target;
                var name = form.elements['name'].value;
                var email = form.elements['email'].value;
                var message = form.elements['message'].value;
    
                var mailtoLink = 'mailto:30vishalyadav@gmail.com' +
                    '?subject=' + encodeURIComponent('Contact Form Submission') +
                    '&body=' + encodeURIComponent('Name: ' + name + '\n\nEmail: ' + email + '\n\nMessage: ' + message);
    
                window.location.href = mailtoLink;
            });
        </script>
             
          </div>
        </div>
    </div>
    <br>
    <div>
     <footer style="background-color:#130e0e;color: #fff;padding: 20px;text-align: center;height: 20%;width: 100%">
       <h6>@Copyright 2023 Vishal Yadav</h6>
 
      </footer>
    </div>
    <script>
    function updateCartBadge() {
    fetch('get_cart_count.php')
        .then(response => response.json())
        .then(data => {
            const cartBadge = document.getElementById('cart-badge');
            const itemCount = data.itemCount;
            if (itemCount > 0) {
                cartBadge.style.display = 'inline';
                cartBadge.textContent = itemCount;
            } else {
                cartBadge.style.display = 'none';
            }
        })
        .catch(error => console.error('Error fetching cart count:', error));
}

// Call the function initially and after every item is added to the cart
updateCartBadge();
</script> 
       

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>