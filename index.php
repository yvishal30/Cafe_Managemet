<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
    <title>Home Page</title>

    <style>
        /* .d-flex{
    background-image: url("./images/b1.jpg");
   height: 700px;
   width: 6000px;
} */
.body{
  font-family: 'Times New Roman', Times, serif;
      font-size:large;
}
.bg{
  background-image: url("./images/bg2.jpg");
  background-size: cover;
  max-width: 100%;
  height: 200%;
}
.content{
  width: 150px;
  padding: 3px;
  margin: 100px;
  
}

.main_content{
  padding-left: 10px;
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
<div class="bg">
<div class="d-flex">
<div class="content">

</div>
</div>

<div class="main_content" style="text-align: center;">

<centre>
  <h1 style="font-family: 'Times New Roman', Times, serif; font-weight: 600;color: #fff;">Welcome To <span style="color: #B03060;">VS Restaurant</span></h1>
  <h1 style="font-family: 'Times New Roman', Times, serif;font-weight: 600;color: #fff;">CAFE & RESTAURANT FOR <br>FRIENDS & FAMILY</h1>
  <br></br><h3 style="font-style: italic;color: #FFD700;">Newly Opened !!!</h3>
</centre>
  
</div>


    <br></br><br></br><br></br>
  </div>

  <div style="background-color:#e0ebeb;width:100%;height:50px;">
  
  </div>

    <div>
        <footer style="background-color:#130e0e;color: #fff;padding: 20px;text-align: center;height: 20%;width: 100%;margin-bottom: 0px;">
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