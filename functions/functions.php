<?php
function getProducts()
{
    global $dbConnection;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $requestProd = 'select product_id, product_title,product_image1,product_desc,product_price from products order by rand(1) limit 0,6';
            $sendRequest = mysqli_query($dbConnection, $requestProd);
            if (mysqli_num_rows($sendRequest) > 0) {
                while ($prodDetails = mysqli_fetch_assoc($sendRequest)) {
                    $prod_id = $prodDetails['product_id'];
                    $prod_image1 = $prodDetails['product_image1'];
                    $prod_title = $prodDetails['product_title'];
                    $prod_desc = $prodDetails['product_desc'];
                    $product_price = $prodDetails['product_price'];
                    $product_price = floatval(str_replace(',','',$product_price));
                    echo "<div class='col-md-4'>
                <div class='card'>
                 <a href='./select-all.php?product_id=$prod_id'> <img
                    src='./images/product_images/$prod_image1'
                    class='card-img-top'
                    alt= '$prod_title'
                  /></a>
                  <div class='card-body'>
                    <h5 class='card-title'>$prod_title</h5>
                    <p class='card-text'>
                       $prod_desc
                      <p>Price:  <span>". number_format($product_price)."</span></p>
                    </p>
                    <a href='?prod_id=$prod_id' class='btn btn-info'>Add to cart</a>
                    <a href='./select-all.php?product_id=$prod_id' class='btn btn-secondary'>View more</a>
                  </div>
                </div>
              </div>";
                }
            } else {
                echo '<div class="text-center container"><h1 class= "text-center mt-5">No Products Are Available🥲</h1></div>';
            }
        }
    }

    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $requestProd = "select product_id, product_title,product_image1,product_desc,product_price from `products` where select_brandName='$brand_id' order by 1";
        $sendRequest = mysqli_query($dbConnection, $requestProd);
        if (mysqli_num_rows($sendRequest) > 0) {
            while ($prodDetails = mysqli_fetch_assoc($sendRequest)) {
                $prod_id = $prodDetails['product_id'];
                $prod_image1 = $prodDetails['product_image1'];
                $prod_title = $prodDetails['product_title'];
                $prod_desc = $prodDetails['product_desc'];
                $product_price = $prodDetails['product_price'];
                echo "<div class='col-md-4'z>
                <div class='card'>
                 <a href='./select-all.php?product_id=$prod_id'> <img
                    src='./images/product_images/$prod_image1'
                    class='card-img-top'
                    alt= '$prod_title'
                  /></a>
                  <div class='card-body'>
                    <h5 class='card-title'>$prod_title</h5>
                    <p class='card-text'>
                       $prod_desc
                       <p>Price:  <span>".number_format($product_price)."</span></p>
                    </p>
                    <a href='?prod_id=$prod_id' class='btn btn-info'>Add to cart</a>
                    <a href='./select-all.php?product_id=$prod_id' class='btn btn-secondary'>View more</a>
                  </div>
                </div>
              </div>";
            }
        } else {
            echo '<div class="text-center container"><h1 class= "text-center mt-5">This Brand Does not have any product 🚫</h1></div>';
        }
    }

    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $requestProd = "select product_id, product_title,product_image1,product_desc,product_price from `products` where 	select_category ='$category_id' order by 1";
        $sendRequest = mysqli_query($dbConnection, $requestProd);
        if (mysqli_num_rows($sendRequest) > 0) {
            while ($prodDetails = mysqli_fetch_assoc($sendRequest)) {
                $prod_id = $prodDetails['product_id'];
                $prod_image1 = $prodDetails['product_image1'];
                $prod_title = $prodDetails['product_title'];
                $prod_desc = $prodDetails['product_desc'];
                $product_price = $prodDetails['product_price'];
                echo "<div class='col-md-4'z>
                <div class='card'>
                 <a href='./select-all.php?product_id=$prod_id'> <img
                    src='./images/product_images/$prod_image1'
                    class='card-img-top'
                    alt= '$prod_title'
                  /></a>
                  <div class='card-body'>
                    <h5 class='card-title'>$prod_title</h5>
                    <p class='card-text'>
                       $prod_desc
                      <p>Price:  <span>".number_format($product_price)."</span></p>
                    </p>
                    <a href='?prod_id=$prod_id' class='btn btn-info'>Add to cart</a>
                    <a href='./select-all.php?product_id=$prod_id' class='btn btn-secondary'>View more</a>
                  </div>
                </div>
              </div>";
            }
        } else {
            echo '<div class="text-center container"><h1 class= "text-center mt-5">This Category Does not have any product 🚫</h1></div>';
        }
    }
}




function displayBrands()
{
    global $dbConnection;
    $printQuery = "select * from `brand` order by brand_ref asc";
    $sendQuery = mysqli_query($dbConnection, $printQuery);
    if (mysqli_num_rows($sendQuery) > 0) {
        while ($checkQuery = mysqli_fetch_assoc($sendQuery)) {
            $brand_title = $checkQuery['brand_ref'];
            $brand_id = $checkQuery['brand_id'];
            echo "<li class='nav-item mt-4 fs-5'><a href='index.php?brand=$brand_id' class='nav-list nav-link'>$brand_title</a></li>";
        }
    } else {
        echo '<h4>No brands Yet</h4>';
    }
}

function displayCat()
{
    global $dbConnection;
    $select_cat = "select * from `categories`";
    $sendQuery = mysqli_query($dbConnection, $select_cat);
    if (mysqli_num_rows($sendQuery) > 0) {
        while ($checkQuery = mysqli_fetch_assoc($sendQuery)) {
            $cat_title = $checkQuery['category_ref'];
            $cat_id = $checkQuery['category_id'];
            echo "<li class='nav-item mt-4 fs-5'><a href='index.php?category=$cat_id' class='nav-link nav-list'>$cat_title</a></li>";
        }
    } else {
        echo '<h4>No Categories Yet</h4>';
    }
}


function displayAdcontrol()
{
    if (isset($_GET['insert-cat'])) {
        include('insert-cat.php');
    }
    if (isset($_GET['insert-brand'])) {
        include('insert-brand.php');
    }
    if (isset($_GET['insert-prod'])) {
        include('insert_product.php');

        if ($_GET['insert-prod'] == 'error') {
            echo '<script>alert("fill all fields")</script>';
        }
        if ($_GET['insert-prod'] == 'sucess') {
            echo '<script>alert("product sucessfully added")</script>';
        }
    }
}


function getAllProducts()
{
    global $dbConnection;
    $requestProd = 'select product_id, product_title,product_image1,product_desc,product_price from products order by 1';
    $sendRequest = mysqli_query($dbConnection, $requestProd);
    if (mysqli_num_rows($sendRequest) > 0) {
        while ($prodDetails = mysqli_fetch_assoc($sendRequest)) {
            $prod_id = $prodDetails['product_id'];
            $prod_image1 = $prodDetails['product_image1'];
            $prod_title = $prodDetails['product_title'];
            $prod_desc = $prodDetails['product_desc'];
            $product_price = $prodDetails['product_price'];
            $product_price = floatval(str_replace(',','',$product_price));
            echo "<div class='col-md-4'>
                <div class='card'>
                 <a href='./select-all.php?product_id=$prod_id'> <img
                    src='./images/product_images/$prod_image1'
                    class='card-img-top'
                    alt= '$prod_title'
                  /></a>
                  <div class='card-body'>
                    <h5 class='card-title'>$prod_title</h5>
                    <p class='card-text'>
                       $prod_desc
                      <p>Price:  <span>". number_format($product_price) ."</span></p>
                    </p>
                    <a href='?prod_id=$prod_id' class='btn btn-info'>Add to cart</a>
                    <a href='./select-all.php?product_id=$prod_id' class='btn btn-secondary'>View more</a>
                  </div>
                </div>
              </div>";
        }
    } else {
        echo '<div class="text-center container"><h1 class= "text-center mt-5">No Products Are Available🥲</h1></div>';
    }
}

function searchFunc()
{
    global $dbConnection;
    $search_query = $_GET['search_query'];
    $search_queryWords = explode(" ", $search_query);
    $requestProd = "select product_id, product_title,product_image1,product_desc,product_price from products where product_key like '%$search_query%'";
    foreach ($search_queryWords as $search_keys) {
        $requestProd .= " or product_key like '%$search_keys%' ";
    }
    $requestProd .= "order by product_title asc";
    $sendRequest = mysqli_query($dbConnection, $requestProd);
    if (mysqli_num_rows($sendRequest) > 0) {
        while ($prodDetails = mysqli_fetch_assoc($sendRequest)) {
            $prod_id = $prodDetails['product_id'];
            $prod_image1 = $prodDetails['product_image1'];
            $prod_title = $prodDetails['product_title'];
            $prod_desc = $prodDetails['product_desc'];
            $product_price = $prodDetails['product_price'];
            echo "<div class='col-md-4'>
                <div class='card'>
                 <a href='./select-all.php?product_id=$prod_id'> <img
                    src='./images/product_images/$prod_image1'
                    class='card-img-top'
                    alt= '$prod_title'
                  /></a>
                  <div class='card-body'>
                    <h5 class='card-title'>$prod_title</h5>
                    <p class='card-text'>
                       $prod_desc
                      <p>Price:  <span>$product_price</span></p>
                    </p>
                    <a href='?prod_id=$prod_id' class='btn btn-info'>Add to cart</a>
                    <a href='./select-all.php?product_id=$prod_id' class='btn btn-secondary'>View more</a>
                  </div>
                </div>
              </div>";
        }
    } else {
        echo '<div class="text-center container"><h1 class= "text-center mt-5">No Products With that Keyword Available🥲</h1></div>';
    }
}


function prodDetails()
{
    global $dbConnection;
    $idProd = $_GET['product_id'];
    $requestProd = "select * from products where product_id = '$idProd' ";
    $sendRequest = mysqli_query($dbConnection, $requestProd);
    if (mysqli_num_rows($sendRequest) > 0) {
        while ($prodDetails = mysqli_fetch_assoc($sendRequest)) {
            $prod_id = $prodDetails['product_id'];
            $prod_image1 = $prodDetails['product_image1'];
            $prod_image2 = $prodDetails['product_image2'];
            $prod_image3 = $prodDetails['product_image3'];
            $category = $prodDetails['select_category'];
            $prod_title = $prodDetails['product_title'];
            $prod_desc = $prodDetails['product_desc'];
            $product_price = $prodDetails['product_price'];
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $select_cart = "select * from cart_details where users_id = $user_id and product_id = $prod_id";
                $send_cart = mysqli_query($dbConnection,$select_cart);
                if(mysqli_num_rows($send_cart) > 0){
                   $qty = mysqli_fetch_assoc($send_cart)['quantity'];
                }else{
                    $qty = 1;
                }
            }
            echo "
                  <div class='row'>
                    <div class='col-lg-5 col-md-6'>
                            <!-- Product Details Left -->
                                <div class='product-details-left'>
                                    <div class='product-details-images slider-navigation-1'>
                                        <div class='lg-image'>
                                            <a class='popup-img venobox vbox-item' href='images/product_images/$prod_image1' data-gall='myGallery'>
                                                <img src='images/product_images/$prod_image1' alt='product image'>
                                            </a>
                                        </div>
                                         <div class='lg-image'>
                                            <a class='popup-img venobox vbox-item' href='images/product_images/$prod_image2' data-gall='myGallery'>
                                                <img src='images/product_images/$prod_image2' alt='product image'>
                                            </a>
                                        </div>
                                         <div class='lg-image'>
                                            <a class='popup-img venobox vbox-item' href='images/product_images/$prod_image3' data-gall='myGallery'>
                                                <img src='images/product_images/$prod_image3' alt='product image'>
                                            </a>
                                        </div>
                                    </div>
                                    <div class='product-details-thumbs slider-thumbs-1 extra-photos'>                                        
                                        <div class='sm-image'><img src='images/product_images/$prod_image1' alt='product image thumb'></div>
                                        <div class='sm-image'><img src='images/product_images/$prod_image2' alt='product image thumb'></div>
                                        <div class='sm-image'><img src='images/product_images/$prod_image3' alt='product image thumb'></div>
                                    </div>
                                </div>
                                <!--// Product Details Left -->
                  </div>
                  <div class='col-lg-7 col-md-6'>
                            <div class='product-details-view-content pt-60'>
                                <div class='product-info'>
                                    <h2>$prod_title</h2>
                                    <span class='product-details-ref '>Reference: demo_15</span>
                                    <div class='price-box pt-20 mt-3'>
                                        <span class='new-price new-price-2'>#$product_price</span>
                                    </div>
                                    <div class='product-desc'>
                                        <p>
                                            <span>$prod_desc
                                            </span>
                                        </p>
                                    </div>
                                    <div class='single-add-to-cart'>
                                        <form action='' method='post' class='cart-quantity mb-5'>
                                            <div class='quantity'>
                                                <label>Quantity</label>
                                                <div class='cart-plus-minus'>
                                                    <input name='prod_qty' class='cart-plus-minus-box' value='$qty' type='text'>
                                                    <div class='dec qtybutton'><i class='fa fa-angle-down'></i></div>
                                                    <div class='inc qtybutton'><i class='fa fa-angle-up'></i></div>
                                                </div>
                                            </div>
                                            <input value='Add to cart' name='add-quantity' class='add-to-cart mt-3' type='submit'>
                                        </form>
                                    </div>
                                    <div class='product-additional-info pt-25'>
                                        <a class='wishlist-btn' href='wishlist.html'><i class='fa fa-heart-o'></i>Add to wishlist</a>
                                        <div class='product-social-sharing pt-25 mt-3'>
                                            <ul>
                                                <li class='facebook'><a href='#'><i class='fa fa-facebook'></i>Facebook</a></li>
                                                <li class='twitter'><a href='#'><i class='fa fa-twitter'></i>Twitter</a></li>
                                                <li class='google-plus'><a href='#'><i class='fa fa-google-plus'></i>Google +</a></li>
                                                <li class='instagram'><a href='#'><i class='fa fa-instagram'></i>Instagram</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class='block-reassurance'>
                                        <ul>
                                            <li>
                                                <div class='reassurance-item'>
                                                    <div class='reassurance-icon'>
                                                        <i class='fa fa-check-square-o'></i>
                                                    </div>
                                                    <p>Security policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class='reassurance-item'>
                                                    <div class='reassurance-icon'>
                                                        <i class='fa fa-truck'></i>
                                                    </div>
                                                    <p>Delivery policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class='reassurance-item'>
                                                    <div class='reassurance-icon'>
                                                        <i class='fa fa-exchange'></i>
                                                    </div>
                                                    <p> Return policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                  </div> 
                  </div>
          <!-- side nav  -->";
        }
    }
}


function prodCat()
{
    global $dbConnection;
    $idProd = $_GET['product_id'];
    $requestCat = "select select_category from products where product_id = '$idProd' ";
    $sendRequest = mysqli_query($dbConnection, $requestCat);
    $cat_id = mysqli_fetch_assoc($sendRequest)['select_category'];

    $requestProdbyCat = "select * from products where select_category ='$cat_id' order by 1";
    $send2request = mysqli_query($dbConnection, $requestProdbyCat);
    if (mysqli_num_rows($send2request) > 1) {
        while ($prodDetails = mysqli_fetch_assoc($send2request)) {
            $prod_id = $prodDetails['product_id'];
            $prod_image1 = $prodDetails['product_image1'];
            $prod_image2 = $prodDetails['product_image2'];
            $prod_image3 = $prodDetails['product_image3'];
            $category = $prodDetails['select_category'];
            $prod_title = $prodDetails['product_title'];
            $prod_desc = $prodDetails['product_desc'];
            $product_price = $prodDetails['product_price'];
            echo " <div class='col-lg-12'>
                                        <!-- single-product-wrap start -->
                                        <div class=''>
                                            <div class='product-image'>
                                                <a href='./select-all.php?product_id=$prod_id'>
                                                    <img src='images/product_images/$prod_image1' alt='Li's Product Image'>
                                                </a>
                                                <span class='sticker'>New</span>
                                            </div>
                                            <div class='product_desc'>
                                                <div class='product_desc_info'>
                                                    <div class='product-review'>
                                                        <h5 class='manufacturer'>
                                                            $prod_desc
                                                        </h5>
                                                    </div>
                                                    <h4><a class='product_name' href='select-all.php?$prod_id'>$prod_title</a></h4>
                                                    <div class='price-box'>
                                                        <span class='new-price'>#$product_price</span>
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                                <div class= 'cat-btn'>
                                                <a href='./select-all.php?product_id=$prod_id' class='btn btn-secondary'>View more</a>
                                                </div>
                                                </div>";
        }
    }
}

// get ip_adreesss of client 

function getIPAddress()
{

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    };
    return $ip;
}


function cart_func()
{
    global $dbConnection;
    $ip = getIPAddress();
    if (isset($_GET['prod_id'])) {
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            $prod_id = $_GET['prod_id'];
            $checkProd = "select * from `cart_details` where users_id = '$user_id' and  product_id = '$prod_id'";
            $sendRequest = mysqli_query($dbConnection, $checkProd);
            if (mysqli_num_rows($sendRequest) == 0) {
                $qty = 1;
                $insertProd = "insert into `cart_details` (users_id,product_id,quantity) values ('$user_id','$prod_id',$qty)";
                $sendRequest = mysqli_query($dbConnection, $insertProd);
            }
        }
        else{
            if(!isset($_SESSION['cart-items'])){
                $_SESSION['cart-items'] = array();
            }
             $prod_id = $_GET['prod_id'];
             $qty = 1;
             $_SESSION['cart-items'][$prod_id] = $qty;
        }
    }
}

function count_cart()
{
    global $dbConnection;
    $productQty = 0;

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $checkSum = "SELECT quantity FROM cart_details WHERE users_id = '$user_id'";
        $sendRequest = mysqli_query($dbConnection, $checkSum);

        while ($fetch = mysqli_fetch_assoc($sendRequest)) {
            $productQty += intval($fetch['quantity']);
        }
    } else {
        if (isset($_SESSION['cart-items'])) {
            $cartArr = $_SESSION['cart-items'];

            if (!empty($cartArr)) {
                foreach ($cartArr as $quantity) {
                    $productQty += intval($quantity);
                }
            }
        }
    }

    return $productQty;
}




function countTotalPrice()
{
    global $dbConnection;
    $productPrice = array();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $checkSum = "SELECT cd.product_id, cd.quantity, p.product_price 
                     FROM cart_details cd
                     JOIN products p ON cd.product_id = p.product_id
                     WHERE cd.users_id = '$user_id'";
        $sendRequest = mysqli_query($dbConnection, $checkSum);

        while ($fetch = mysqli_fetch_assoc($sendRequest)) {
            $qty = $fetch['quantity'];
            $prodPrice = $fetch['product_price'];
            $prodPricetoInt = floatval(str_replace(',', '', $prodPrice)) * $qty;
            $productPrice[] = $prodPricetoInt;
        }
    } elseif (isset($_SESSION['cart-items'])) {
        foreach ($_SESSION['cart-items'] as $key => $value) {
            $selectCat = "SELECT product_price FROM products WHERE product_id = $key";
            $send2Request = mysqli_query($dbConnection, $selectCat);
            $fetchPrice = mysqli_fetch_assoc($send2Request);
            $prodPrice = $fetchPrice['product_price'];
            $prodPricetoInt = floatval(str_replace(',', '', $prodPrice)) * $value;
            $productPrice[] = $prodPricetoInt;
        }
    }

    return array_sum($productPrice);
}




function updateqty()
{
    global $dbConnection;
    $ip = getIPAddress();
    if (isset($_POST['add-quantity'])) {
        $qty = $_POST['prod_qty'];
        $prod_id = $_GET['product_id'];
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            $checkProd = "select * from `cart_details` where users_id = '$user_id' and  product_id = '$prod_id'";
            $sendRequest = mysqli_query($dbConnection, $checkProd);
            if (mysqli_num_rows($sendRequest) == 0) {
                $insertProd = "insert into `cart_details` (users_id,product_id,quantity) values ('$user_id','$prod_id',$qty)";
                $sendRequest = mysqli_query($dbConnection, $insertProd);
            }else{
                $orqty = mysqli_fetch_assoc($sendRequest)['quantity'];
            $selectQuery ="Update cart_details  set quantity = $qty + $orqty where users_id = '$user_id' and product_id= '$prod_id'";
            $insertQuery = mysqli_query($dbConnection,$selectQuery);
            }
        }
        else{
             if(!isset($_SESSION['cart-items'])){
                $_SESSION['cart-items'] = array();

            }
         if(isset( $_SESSION['cart-items'][$prod_id])){
             $_SESSION['cart-items'][$prod_id] += $qty;
            }else{
                 $_SESSION['cart-items'][$prod_id] = $qty;
            }
        }
        echo"<script>window.open('./select-all.php?product_id=$prod_id','_self')</script>";
    }
    
    }




