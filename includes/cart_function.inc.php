<?php
session_start();
include("db.inc.php");
include('../functions/functions.php');
function updatecart (){
    global $dbConnection;
    $ip = getIPAddress();
    if(isset($_GET['update_cart'])){
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $qty = $_GET['quant'];
            $prod_id = $_GET['prod_id'];
            print_r($prod_id);
            for ($i=0; $i < count($prod_id) ; $i++) { 
                $update_query = "update cart_details set quantity = $qty[$i] where users_id = '$user_id' and product_id=$prod_id[$i]";
                $send_update_query = mysqli_query($dbConnection,$update_query);
                  echo "Update query: " . $update_query . "<br>";
                    if (!$send_update_query) {
                        echo "Error: " . mysqli_error($dbConnection) . "<br>";
                    } else {
                        echo "Update successful<br>";
                    }
            }
        }
        else{
            if(isset($_SESSION['cart-items'])){
                $qty = $_GET['quant'];
                $prod_id = $_GET['prod_id'];
                for ($i=0; $i < count($prod_id) ; $i++) { 
                    $_SESSION['cart-items'][$prod_id[$i]] = $qty[$i];
                }
            }
           
        }
        header( 'Location:../cart.php' ) ;  
    

  
}

}

updatecart();


function removeItem (){
    global $dbConnection;
    $ip = getIPAddress();
  if($_GET['removeitem']){
      if (isset($_SESSION['user_id'])){
         $user_id = $_SESSION['user_id'];
    $prod_id = $_GET['removeitem'];
    $delete_query = "delete from cart_details where users_id = '$user_id' and product_id = $prod_id";
    $send_delete_query = mysqli_query($dbConnection,$delete_query);
    header("location:../cart.php");
    exit;

  }
  else{
     if(isset($_SESSION['cart-items'])){
       $prod_id = $_GET['removeitem'];
       unset($_SESSION['cart-items'][$prod_id]); 
         header("location:../cart.php");
    exit;

     }
  }
}

}


removeItem();