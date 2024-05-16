<?php
session_start();
  include('includes/db.inc.php');
  include('./functions/functions.php');


                

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
      <link rel='stylesheet' href='css/style.css'>
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
                   <a class="nav-link" href="my-account.php">My Account</a>
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
                  ><i class="fa fa-shopping-cart"></i></a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- second child -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
           <li class="nav-item">
            <a class="nav-link" href="#"><?php if(isset($_SESSION['user_id'])){
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
      <h3 class="text-center">Your  Cart</h3>
      <p class="text-center">
        Shop at Diamond Store Quality Products Affordable Price
      </p>
       <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                          <?php
                          $dbConnection;
                          $ip = getIPAddress();
                          if(isset($_SESSION['user_id'])){
                              $user_id = $_SESSION['user_id'];
                              $select_query = "select * from cart_details where users_id = '$user_id'";
                              $send_query = mysqli_query($dbConnection,$select_query);
                                if(mysqli_num_rows($send_query) > 0){?>
                            <form action="./includes/cart_function.inc.php" method="get">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-thumbnail">images</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="li-product-price">Unit Price</th>
                                                <th class="li-product-quantity">Quantity</th>
                                                <th class="li-product-subtotal">Total</th>
                                                <th class="li-product-remove">remove</th>
                                            </tr>
                                        </thead>
                                        <?php
                                          while($cartDetails = mysqli_fetch_assoc($send_query)){
                $prod_id = $cartDetails['product_id'];
                $qty = $cartDetails['quantity'];
                $select_cart_query = "select * from products where product_id = $prod_id";
                $insert_cart_query = mysqli_query($dbConnection,$select_cart_query);
                if(mysqli_num_rows($insert_cart_query) > 0){
                  while($cartItemsDetails = mysqli_fetch_assoc($insert_cart_query)){
                $prod_id = $cartItemsDetails['product_id'];
                $prod_image1 = $cartItemsDetails['product_image1'];
                $prod_image2 = $cartItemsDetails['product_image2'];
                $prod_image3 = $cartItemsDetails['product_image3'];
                $category = $cartItemsDetails['select_category'];
                $prod_title = $cartItemsDetails['product_title'];
                $prod_desc = $cartItemsDetails['product_desc'];
                $product_price = $cartItemsDetails['product_price'];
                $product_price =floatval(str_replace(',','',$product_price));
                $prod_total = $product_price*$qty;?>
              <tbody>
                             <tr>
                                <td class='li-product-thumbnail'><a href='#'><img class='' src='images/product_images/<?php echo$prod_image1?>' alt='Li's Product Image'></a></td>
                                <td class='li-product-name'><a href='#'><?php echo$prod_title ?></a></td>
                                <td class='li-product-price'><span class='amount'> #<?php echo number_format($product_price,2) ?></span></td>
                                <input name='prod_id[]' type='hidden' value='<?php echo$prod_id ?>'>
                                <td class='quantity'>
                                <label>Quantity</label>
                                <div class='cart-plus-minus'>
                                    <input class='cart-plus-minus-box'   name='quant[]' value='<?php echo$qty ?>'type='text'>
                                    <div class='dec qtybutton'><i class='fa fa-angle-down'></i></div>
                                    <div class='inc qtybutton'><i class='fa fa-angle-up'></i></div>
                                    </div>
                                </td>
                                <td class='product-subtotal'><span class='amount'>#<?php echo number_format($prod_total )?> </span></td>
                                <td class='li-product-remove'><a href='./includes/cart_function.inc.php?removeitem=<?php echo$prod_id ?>' ><i class='fa fa-times'></i></a></td>
                             </tr>
                          </tbody>
                          <?php }
                  }
                }?>
                  </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon2">
                                        <input class="button" name="update_cart" value="Update cart" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Total <span><?php echo number_format(countTotalPrice(),2) ?></span></li>
                                    </ul>
                                    <a href="./checkout.php" class="mb-3">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
             <?php }else{?>
              <h2 class="text-center" >There Are No items In your Cart Please continue Shopping</h2>
             <?php }
            }
            else{
                      if(isset($_SESSION['cart-items']) and !empty( $_SESSION["cart-items"])) { ?>
                        <form action="./includes/cart_function.inc.php" method="get">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-thumbnail">images</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="li-product-price">Unit Price</th>
                                                <th class="li-product-quantity">Quantity</th>
                                                <th class="li-product-subtotal">Total</th>
                                                <th class="li-product-remove">remove</th>
                                            </tr>
                                        </thead>
                          <?php   
                foreach ($_SESSION['cart-items'] as $key => $value) {
                $select_cart_query = "select * from products where product_id = $key";
                $insert_cart_query = mysqli_query($dbConnection,$select_cart_query);
                if(mysqli_num_rows($insert_cart_query) > 0){
                  while($cartItemsDetails = mysqli_fetch_assoc($insert_cart_query)){
                $prod_id = $cartItemsDetails['product_id'];
                $prod_image1 = $cartItemsDetails['product_image1'];
                $prod_image2 = $cartItemsDetails['product_image2'];
                $prod_image3 = $cartItemsDetails['product_image3'];
                $category = $cartItemsDetails['select_category'];
                $prod_title = $cartItemsDetails['product_title'];
                $prod_desc = $cartItemsDetails['product_desc'];
                $product_price = $cartItemsDetails['product_price'];
                $prod_total = floatval(str_replace(',','',$product_price))*$value;?>
                      <tbody>
                             <tr>
                                <td class='li-product-thumbnail'><a href='#'><img class='' src='images/product_images/<?php echo$prod_image1?>' alt='Li's Product Image'></a></td>
                                <td class='li-product-name'><a href='#'><?php echo$prod_title ?></a></td>
                                <td class='li-product-price'><span class='amount'> #<?php echo$product_price ?></span></td>
                                <input name='prod_id[]' type='hidden' value='<?php echo$prod_id ?>'>
                                <td class='quantity'>
                                <label>Quantity</label>
                                <div class='cart-plus-minus'>
                                    <input class='cart-plus-minus-box'   name='quant[]' value='<?php echo$value ?>'type='text'>
                                    <div class='dec qtybutton'><i class='fa fa-angle-down'></i></div>
                                    <div class='inc qtybutton'><i class='fa fa-angle-up'></i></div>
                                    </div>
                                </td>
                                <td class='product-subtotal'><span class='amount'>#<?php echo$prod_total ?> </span></td>
                                <td class='li-product-remove'><a href='./includes/cart_function.inc.php?removeitem=<?php echo$prod_id ?>' ><i class='fa fa-times'></i></a></td>
                             </tr>
                          </tbody>
                          <?php }
                        }
                      }?>
                      </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon2">
                                        <input class="button" name="update_cart" value="Update cart" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Total <span><?php countTotalPrice() ?></span></li>
                                    </ul>
                                    <a href="./checkout.php" class="mb-3">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                       <?php }
                         else{?>
              <h2 class="text-center">There Are No items In your Cart Please continue Shopping</h2>
             <?php }
                        }
                        ?>          
                        </div>
                    </div>
                </div>
            </div>

      <div class="text-center bg-info p-3">
        <p class="m-0">@2024 All Rights Reserved Diamond</p>
      </div>
    </div>
  </body>
   <script src='js/vendor/jquery-1.12.4.min.js'></script>
        <script src='js/vendor/popper.min.js'></script>
        <script src='js/bootstrap.min.js'></script>
        <script src='js/ajax-mail.js'></script>
        <script src='js/jquery.meanmenu.min.js'></script>
        <script src='js/wow.min.js'></script>
        <script src='js/slick.min.js'></script>
        <script src='js/owl.carousel.min.js'></script>
        <script src='js/jquery.magnific-popup.min.js'></script>
        <script src='js/isotope.pkgd.min.js'></script>
        <script src='js/imagesloaded.pkgd.min.js'></script>
        <script src='js/jquery.mixitup.min.js'></script>
        <script src='js/jquery.countdown.min.js'></script>
        <script src='js/jquery.counterup.min.js'></script>
        <script src='js/waypoints.min.js'></script>
        <script src='js/jquery.barrating.min.js'></script>
        <script src='js/jquery-ui.min.js'></script>
        <script src='js/venobox.min.js'></script>
        <script src='js/jquery.nice-select.min.js'></script>
        <script src='js/scrollUp.min.js'></script>
        <script src='js/main.js'></script>
   <script src='js/jquery.countdown.min.js'></script>
        <script src='js/jquery.counterup.min.js'></script>
  <script src="js/bootstrap.min.js"></script>
</html>
