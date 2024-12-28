<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <title>Book A Table</title>

    <style>
        
        .form{
            align-self: center;
            width: auto;
            height: auto;
            margin: 10px;
            padding: 20px;
            align-content: center;
            border-radius: 3%;
            box-shadow: 0 3 5px rgba(250, 251, 251, 0.999);
        }
        th, td {
  padding: 20px;
}

    .dropdown-item,.dropdown-menu{
        background-color: #243642;
        color: white;
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
    
    <!-- Reservation Messages -->
<?php if (isset($_GET['message'])): ?>
    <div class="alert alert-<?php echo $_GET['status'] === 'success' ? 'success' : 'danger'; ?> text-center" role="alert">
        <?php echo htmlspecialchars($_GET['message']); ?>
    </div>
<?php endif; ?>
    <div class="container" >
        <form class="form" action="process_reservation.php" method="post">
            <table style="background-color: black; color: white; font-family: fantasy;font-size: large;">
                <tr>
                    <td>
                        <labe>Number Of Guest</labe><br>
                        <select name="guests" class="form-select" style="width: 350px; height: 50px; background-color: #24272c; color: antiquewhite;">
              <option value="2">2 Persons</option>
              <option value="4">4 Persons</option>
              <option value="6">6 Persons</option>
              <option value="8">8 Persons</option>
            </select>
                    </td>

                    <td>
                        <label>Select Date</label><br>
            <input type="date" id="date" name="date" style="width:350px;height: 50px;background-color: #24272c; color: antiquewhite;">
                    </td>

                    <td>
                        <label>Time</label><br>
                        <input type="time" id="time" name="time" style="width: 350px; height: 50px;background-color: #24272c; color: antiquewhite;">
                    </td>
                </tr>
            
            <tr>
                <td>
                    <label>Your Name</label><br>
                    <input type="text" id="name" name="name" placeholder="Name" style="width:350px;height: 50px;background-color: #24272c; color: antiquewhite;">
                </td>

                <td>
                    <label>Email Address</label><br>
                    <input type="email" id="email" name="email" placeholder="Email Address" style="width: 350px; height: 50px;background-color: #24272c; color: antiquewhite;">
                </td>

                <td>
                    <label>Mobile Number</label><br>
                    <input type="tel" id="mobile" name="mobile" placeholder="Number" style="width:350px; height: 50px;background-color: #24272c; color: antiquewhite;">
                </td>
            </tr>

            <tr>
                <td colspan="8">
                    <label>Type Your Special Message</label><br>
                    <textarea id="message" name="message" style="width: 1140px; height:150px;background-color: #24272c; color: antiquewhite;" placeholder="Tell us your Special Message"></textarea>
                </td>
            </tr>

            <tr>
                <td colspan="8" align="center">
                <input type="submit" name="submit" id="bktable" value="Book Table" style="height: 50px; width: 300px;background-color: #d2221f; color: antiquewhite;">
            </td>
            </tr>

    </table>
        </form>
    </div>

    <div><br></br>
        <footer style="background-color:#110f0f;color: #fff;padding: 20px;text-align: center;height: 20%;width: 100%;margin-bottom: 0px;">
            <p>Copyright &copy; 2024 VS Restaurant. All rights reserved.</p>
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