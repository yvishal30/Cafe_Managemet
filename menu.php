<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Menus</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


    <style>
      .body{font-family: 'Times New Roman', Times, serif;
      font-size:large;}
        .th,td{
        padding: 15px;
    }
    .order-panel {
    position: fixed;
    top: 0;
    right: -100%;
    width: 300px;
    height: 100%;
    background-color: #f8f9fa;
    padding: 20px;
    box-shadow: -2px 0 5px rgba(0,0,0,0.2);
    transition: right 0.3s ease;
    z-index: 1050;
}
.order-panel.open {
    right: 0;
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
    <div class="container">
        <table>
            <tr>
                <td>
                    <div class="card mb-3" style="width: 650px;">
                        <div class="row g-0" style="padding: 15px;">
                          <div class="col-md-4">
                            <img src="./images/p1.jpeg" class="img-fluid rounded-start" alt="..." style="border-radius: 500px;float: left;">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Wild Mushroom Arancini <span style="float: right;"><h4 style="color: red;">-------     ₹ 120</h4></span></h5>
                              <p class="card-text" style="color: gray;">Ricotta, goat cheese, beetroot and dateline.</p>
                              <button type="button" class="btn btn-primary" style="float: right;background-color: red;" onclick="openOrderPanel('Wild Mushroom Arancini', 120, './images/p1.jpeg')">Order</button>
                              </div>
                          </div>
                        </div>
                      </div>
                </td>

                <td>
                    <div class="card mb-3" style="width: 650px;">
                        <div class="row g-0" style="padding: 15px;">
                          <div class="col-md-4">
                            <img src="./images/p2.jpeg" class="img-fluid rounded-start" alt="..." style="border-radius: 500px;float: left;">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Honey Glazed Salmon <span style="float: right;"><h4 style="color: red;">-------     ₹ 280</h4></span></h5>
                              <p class="card-text" style="color: gray;">Ricotta, goat cheese, beetroot and dateline.</p>
                              <button type="button" class="btn btn-primary" style="float: right;background-color: red;" onclick="openOrderPanel('Honey Glazed Salmon', 280, './images/p2.jpeg')">Order</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="card mb-3" style="width: 650px;">
                        <div class="row g-0" style="padding: 15px;">
                          <div class="col-md-4">
                            <img src="./images/p3.jpeg" class="img-fluid rounded-start" alt="..." style="border-radius: 500px;float: left;">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">
                                Truffle Mushroom Risotto <span style="float: right;"><h4 style="color: red;">-------     ₹ 250</h4></span></h5>
                              <p class="card-text" style="color: gray;">Ricotta, goat cheese, beetroot and dateline.</p>
                              <button type="button" class="btn btn-primary" style="float: right;background-color: red;" onclick="openOrderPanel('Truffle Mushroom Risotto', 250, './images/p3.jpeg')">Order</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </td>

                <td>
                    <div class="card mb-3" style="width: 650px;">
                        <div class="row g-0" style="padding: 15px;">
                          <div class="col-md-4">
                            <img src="./images/p4.jpeg" class="img-fluid rounded-start" alt="..." style="border-radius: 500px;float: left;">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Mediterranean Quinoa Salad<span style="float: right;"><h4 style="color: red;">-------     ₹ 190</h4></span></h5>
                              <p class="card-text" style="color: gray;">Ricotta, goat cheese, beetroot and dateline.</p>
                              <button type="button" class="btn btn-primary" style="float: right;background-color: red;" onclick="openOrderPanel('Mediterranean Quinoa Salad', 190, './images/p4.jpeg')">Order</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="card mb-3" style="width: 650px;">
                        <div class="row g-0" style="padding: 15px;">
                          <div class="col-md-4">
                            <img src="./images/p5.jpeg" class="img-fluid rounded-start" alt="..." style="border-radius: 500px;float: left;">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Braised Short Ribs<span style="float: right;"><h4 style="color: red;">-------     ₹ 330</h4></span></h5>
                              <p class="card-text" style="color: gray;">Ricotta, goat cheese, beetroot and dateline.</p>
                              <button type="button" class="btn btn-primary" style="float: right;background-color: red;" onclick="openOrderPanel('Braised Short Ribs', 330, './images/p5.jpeg')">Order</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </td>

                <td>
                    <div class="card mb-3" style="width: 650px;">
                        <div class="row g-0" style="padding: 15px;">
                          <div class="col-md-4">
                            <img src="./images/p6.jpeg" class="img-fluid rounded-start" alt="..." style="border-radius: 500px;float: left;">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Roasted Vegetable Platter <span style="float: right;"><h4 style="color: red;">-------     ₹ 240</h4></span></h5>
                              <p class="card-text" style="color: gray;">Ricotta, goat cheese, beetroot and dateline.</p>
                              <button type="button" class="btn btn-primary" style="float: right;background-color: red;" onclick="openOrderPanel('Roasted Vegetable Platter', 240, './images/p6.jpeg')">Order</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="card mb-3" style="width: 650px;">
                        <div class="row g-0" style="padding: 15px;">
                          <div class="col-md-4">
                            <img src="./images/p7.jpeg" class="img-fluid rounded-start" alt="..." style="border-radius: 500px;float: left;">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Freshly Squeezed Juices<span style="float: right;"><h4 style="color: red;">-------     ₹ 210</h4></span></h5>
                              <p class="card-text" style="color: gray;">Ricotta, goat cheese, beetroot and dateline.</p>
                              <button type="button" class="btn btn-primary" style="float: right;background-color: red;" onclick="openOrderPanel('Freshly Squeezed Juices', 210, './images/p7.jpeg')">Order</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </td>

                <td>
                    <div class="card mb-3" style="width: 650px;">
                        <div class="row g-0" style="padding: 15px;">
                          <div class="col-md-4">
                            <img src="./images/p8.jpeg" class="img-fluid rounded-start" alt="..." style="border-radius: 500px;float: left;">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Roasted Meat Platter <span style="float: right;"><h4 style="color: red;">-------     ₹ 420</h4></span></h5>
                              <p class="card-text" style="color: gray;">Ricotta, goat cheese, beetroot and dateline.</p>
                              <button type="button" class="btn btn-primary" style="float: right;background-color: red;" onclick="openOrderPanel('Roasted Meat Platter', 420, './images/p8.jpeg')">Order</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </td>
            </tr>
            <!-- Order Slide Panel -->
        <div id="orderPanel" class="order-panel">
            <h2>Order Details</h2>
            <!-- Product Image -->
            <img id="productImage" src="" alt="Product Image" class="img-fluid" style="border-radius: 10px; margin-bottom: 10px; width: 100%; height: auto;">
            
            <!-- Product Name -->
            <h4 id="productNameDisplay"></h4>

            <form id="orderForm">
                <input type="hidden" id="productName" name="productName">
                <input type="hidden" id="productPrice" name="productPrice">
                <input type="hidden" id="productImageURL" name="productImageURL">

                <!-- Quantity Input -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" min="1" value="1" required onchange="updateTotalPrice()">
                </div>
                
                <!-- Total Price Display -->
                <div class="mb-3">
                    <label class="form-label">Total Price:</label>
                    <p id="totalPrice" style="font-weight: bold;">₹ 0</p>
                </div>
                
                <div class="d-flex justify-content-between mt-3">
    <button type="button" onclick="submitOrder()" class="btn btn-primary btn-submit" style="background-color: red">Submit Order</button>
    <button type="button" onclick="closeOrderPanel()" class="btn btn-secondary" style="background-color: grey">Close</button>
</div>
          </form>
        
    </div>


        </table>
    </div>

  

    <div>
    <footer style="background-color:#110f0f;color: #fff;padding: 20px;text-align: center;height: 20%;width: 100%;margin-bottom: 0px;">
        <p>Copyright &copy; 2024 VS Restaurant. All rights reserved.</p>
</footer>
</div>
    <!-- Optional JavaScript; choose one of the two! -->


    <script>
      // Function to open the order panel with product details
function openOrderPanel(productName, productPrice, productImageURL) {
    document.getElementById('productName').value = productName;
    document.getElementById('productPrice').value = productPrice;
    document.getElementById('productImageURL').value = productImageURL;

    // Display product details in the panel
    document.getElementById('productNameDisplay').textContent = productName;
    document.getElementById('productImage').src = productImageURL;
    document.getElementById('totalPrice').textContent = `₹ ${productPrice}`;

    // Reset quantity to 1
    document.getElementById('quantity').value = 1;

    document.getElementById('orderPanel').classList.add('open');
}

// Function to close the order panel
function closeOrderPanel() {
    document.getElementById('orderPanel').classList.remove('open');
}

// Function to update the total price based on quantity
function updateTotalPrice() {
    const productPrice = parseFloat(document.getElementById('productPrice').value);
    const quantity = parseInt(document.getElementById('quantity').value);
    const totalPrice = productPrice * quantity;
    document.getElementById('totalPrice').textContent = `₹ ${totalPrice}`;
}

// Update cart badge count
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

// Hook into the existing function for submitting an order
function submitOrder() {
    const quantity = document.getElementById('quantity').value;
    const productName = document.getElementById('productName').value;
    const productPrice = document.getElementById('productPrice').value;
    const productImageURL = document.getElementById('productImageURL').value;
    const totalPrice = productPrice * quantity;

    fetch('add_to_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ productName, productPrice, quantity, productImageURL, totalPrice })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        updateCartBadge(); // Update the badge after adding the item
        window.location.href = 'cart.php'; // Redirect to the cart page
    })
    .catch(error => console.error('Error:', error));
}



    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>