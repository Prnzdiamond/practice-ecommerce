<?php
session_start();
if(!isset($_SESSION['user_id'])){
     echo"<script>window.open('./log-in.php?source=checkout-page','_self')</script>";
}
  include('includes/db.inc.php');
  include('./functions/functions.php');
   cart_func();
                

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commorce Practice</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
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
      <form action="./includes/cart_checkout.inc.php">
          <div class="checkout-area pt-60 pb-30 mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <?php
                            $error;
                            if(isset($_SESSION['checkout_err'])){
                                $errors = $_SESSION['checkout_err'];
                                $formdata =$_SESSION['form-data'];
                                unset($_SESSION['checkout_err']);
                                unset($_SESSION['form-data']);
                            }
                             ?>
                                <div class="checkbox-form">
                                   <?php
                                             $user_id = $_SESSION['user_id'];
                                             $select_cart_items = "select * from cart_details where users_id = $user_id";
                                             $send_select_query = mysqli_query($dbConnection,$select_cart_items);
                                             if(mysqli_num_rows($send_select_query)>0){?>
                                    <h3>Billing Details</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>First Name <span class="required">*</span></label>
                                                <input value="<?php echo $_SESSION['fname'] ?>" disabled placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input  value="<?php echo $_SESSION['lname'] ?>" disabled placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Address <span class="required">*</span></label>
                                                <input name="full-address" placeholder="Street address" value="<?php echo htmlspecialchars($formdata['full-address'] ?? '')?>" type="text">
                                                <span  class="error text-danger" ><?php if(isset($errors['full-address'])){
                                               echo $errors['full-address']; 
                                               }?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <input  value="<?php echo htmlspecialchars($formdata['buildingType'] ?? '')?>" name="buildingType" placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Town / City <span class="required">*</span></label>
                                                <input  value="<?php echo htmlspecialchars($formdata['city'] ?? '')?>" name="city" type="text">
                                                <span  class="error text-danger" ><?php if(isset($errors['city'])){
                                               echo $errors['city']; 
                                               }?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>State / County <span class="required">*</span></label>
                                                <input  value="<?php echo htmlspecialchars($formdata['state'] ?? '')?>" name="state" placeholder="" type="text">
                                                <span  class="error text-danger" ><?php if(isset($errors['state'])){
                                               echo $errors['state']; 
                                               }?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Email Address <span class="required">*</span></label>
                                                <input  value="<?php echo $_SESSION['mail'] ?>" disabled placeholder="" type="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label name="label">Phone  <span class="required">*</span></label>
                                                <input  value="<?php echo $_SESSION['phone'] ?>" disabled type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Order Notes</label>
                                        <textarea id="checkout-mess" cols="30" rows="10"name="delivery_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                            </div>
            
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>
                                            <?php while($cart_dat = mysqli_fetch_assoc($send_select_query)){
                                                $product_id = $cart_dat['product_id'];
                                                $product_qty = $cart_dat['quantity'];
                                               $select_product_details = "select * from products where product_id= $product_id";
                                               $send_prod_det_query = mysqli_query($dbConnection,$select_product_details);
                                                 while($product_det = mysqli_fetch_assoc($send_prod_det_query)){
                                                    $product_title= $product_det['product_title'];
                                                    $product_price = $product_det['product_price'];
                                                      $prodPricetoInt = floatval(str_replace(',', '', $product_price))*$product_qty;
                                                    ?>
                                        <tbody>
                                            <tr class="cart_item">
                                              <td class="cart-product-name"><?php echo $product_title ?> <strong class="product-quantity"> × <?php echo $product_qty?></strong></td>
                                              <td class="cart-product-total"><span class="amount"><?php echo number_format($prodPricetoInt,2)?></span></td>  
                                            </tr><?php }}?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount"><?php echo number_format(countTotalPrice(),2)?></span></td>
                                            </tr>
                                             <tr class="cart-subtotal">
                                                <th>Delivery Fee</th>
                                                <?php
                                                if(countTotalPrice() > 100000){
                                                  $deliveryFee = 5000;
                                                }else{
                                                  $deliveryFee = 2500;
                                                }
                                                
                                                ?>
                                                <td><span class="amount"><?php echo number_format($deliveryFee,2) ?></span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount"><?php
                                                  $total_amount = countTotalPrice() + $deliveryFee;
                                                  $_SESSION['total_amount'] = $total_amount;
                                                 echo number_format($total_amount,2);
                                                 ?></span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                           <div class="card mb-4">
                                             <span   class="error text-danger" ><?php if(isset($errors['paymentType'])){
                                               echo $errors['paymentType']; 
                                               }?></span>
                                           </div>
                                          <div class="card mb-5">
                                            <div class="card-header" id="#payment-1">

                                              <h5 class="panel-title">
                                                <a  onclick="selectPayment(this)" class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Pay Offline.
                                                  </a>
                                                  <input type="hidden" value="" id="paymentType" name="paymentType">
                                              </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                              <div class="card-body ">
                                                <p>Make your payment directly into our bank account. or by cash when you get your delivery Please use your Order ID as the payment reference.</p>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="card mt-5">
                                            <div class="card-header" id="#payment-3">
                                              <h5 class="panel-title">
                                                <a  onclick="selectPayment(this)"class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  Online Payment
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Make your payment via trusted third party measures, Your order won’t be shipped until the funds have cleared in our account.</p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="order-button-payment">
                                            <input value="Place order" name="place-order" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                        else{
                          echo"<script>window.open('./index.php','_self')</script>";
                          exit();
                        }?>
                    </div>
                </div>
            </div>
            </form>
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
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script>
    var paymentType =document.getElementById("paymentType");
    console.log(paymentType);
    function selectPayment (element) {
        paymentType.value = element.textContent.trim().replace(/\s+/g,"");
        paymentType.value = paymentType.value.toLowerCase();
        console.log(paymentType.value);
    }
  </script>

</html>
