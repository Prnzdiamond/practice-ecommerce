<?php
session_start();
  include('includes/db.inc.php');
  include('./functions/functions.php');
  cart_func();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commorce  Practice</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <img class="logo" src="images/banner/1_1.jpg" alt="" />
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
              </li>
              <li class="nav-item">
                <?php if(isset($_SESSION['user_id'])){?>
                   <a class="nav-link" href="./users/my-account.php">My Account</a>
               <?php
               }
               else{?>
                <a class="nav-link" href="user-register.php">Register</a>

             <?php  }?>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
             <li class="nav-item">
                <a class="nav-link" href="cart.php"
                  ><i class="fa fa-shopping-cart"><sup><?php echo count_cart()?></sup>/: <?php echo countTotalPrice() ?></i></a
                >
              </li>
            </ul>
            <form class="d-flex" method="get" action="index.php">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                name="search_query"
                aria-label="Search"
              />
              <input name="submit" class="btn btn-outline-success" type="submit" value="Search">

            </form>
          </div>
        </div>
      </nav>
      <!-- second child -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="#"> <?php if(isset($_SESSION['user_id'])){
              echo $_SESSION['username'];
              }else{
                echo "Guest";
              }
              ?></a>
          </li>
           <li class="nav-item">
            <?php if(isset($_SESSION['user_id'])){?>
              <a class="nav-link" href="./includes/logout.php">Logout</a>
              <?php }else{?>
                <a class="nav-link" href="log-in.php">Login</a>
             <?php }
              ?>
          </li>
        </ul>
      </nav>
      <h3 class="text-center">Hidden Store</h3>
      <p class="text-center">
        Shop at Diamond Store Quality Products Affordable Price
      </p>
      <!-- third child -->
      <div class="container-fluid p-0">
        <!-- Products -->
        <div class="row p-3 ">
          <div class="col-md-10 ">
            <div class="row gy-2">
              <?php
                    getAllProducts();
                    cart_func();
              ?>
            </div>
          </div>
          <!-- side nav  -->
          <div class="col-md-2 bg-secondary p-0 text-center">
            <ul class="navbar-nav me-auto p-0">
              <li class="nav-item bg-info fs-3 text-light">
                Delivery Brands
              </li>
               <ul class="navbar-nav text-light mt-3">
                <?php
                 displayBrands() 
                ?>
            </ul>
              <li class="nav-item bg-info fs-3 text-light">
                Categories
              </li>
               <ul class="navbar-nav text-light mt-3">
                <?php
                displayCat()
                ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="text-center bg-info p-3">
        <p class="m-0">@2024 All Rights Reserved Diamond</p>
      </div>
    </div>
  </body>
  <script src="js/bootstrap.min.js"></script>
</html>
