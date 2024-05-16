<?php
session_start();

// Include database connection
  include('./db.inc.php');
  include("../functions/functions.php");

// Initialize an array to store error messages
$errors = [];
$formdata = $_GET;

print_r($formdata);
// Check if the form was submitted
if (isset($_GET['place-order'])) {
    // Validate address
    if (empty($_GET['full-address'])) {
        $errors['full-address'] = "Address is required.";
    }

    // Validate city
    if (empty($_GET['city'])) {
        $errors['city'] = "City is required.";
    }

    // Validate state
    if (empty($_GET['state'])) {
        $errors['state'] = "State is required.";
    }

    // Validate payment type
    if (empty($_GET['paymentType'])) {
        $errors['paymentType'] = "you have to select a Payment type.";
    }

    // If there are no errors, proceed with processing the form
    if (!empty($errors)) {
      $_SESSION['checkout_err'] =  $errors;
      $_SESSION['form-data'] = $formdata;
        echo"<script>window.open('../checkout.php','_self')</script>";
        exit();
    } else{
        // Process the form data and insert into the database
        $user_id = $_SESSION['user_id'];
        $total_amount = $_SESSION['total_amount'];
        $item_count = count_cart();
        unset($_SESSION['total_amount']);
        $homeAddress = mysqli_real_escape_string($dbConnection, $_GET['full-address']);
        $buildingType = mysqli_real_escape_string($dbConnection, $_GET['buildingType']);
        $city = mysqli_real_escape_string($dbConnection, $_GET['city']);
        $state = mysqli_real_escape_string($dbConnection, $_GET['state']);
        $deliveryNote = mysqli_real_escape_string($dbConnection, $_GET['delivery_note']);
        $paymentType = mysqli_real_escape_string($dbConnection, $_GET['paymentType']);
        echo $paymentType;
        $fullAddress = $buildingType." ".$homeAddress." ,".$city." ,".$state;

        $insert_orders = "INSERT INTO `orders`(`user_id`, `payment_type`, `total_amount`, `item_count`, `delivery_note`, `delivery_address`) VALUES ('$user_id','$paymentType','$total_amount','$item_count','$deliveryNote','$fullAddress')";
         $send_order_query = mysqli_query($dbConnection,$insert_orders);

         $order_id = mysqli_insert_id($dbConnection);
         $invoice_number = 'N0-'.str_pad($order_id."_".date('ymdhis'),30,uniqid($user_id."_"));
         $update_order_invoice = "update orders set invoice_no = '$invoice_number' where order_id = $order_id";
         $send_update = mysqli_query($dbConnection,$update_order_invoice);
         echo $invoice_number;

        //  send cart to ordered items;
        $select_cart_query = "select * from cart_details where users_id = $user_id";
        $send_select = mysqli_query($dbConnection,$select_cart_query);
        while($cart_det = mysqli_fetch_assoc($send_select)){
            $product_id = $cart_det['product_id'];
            $product_qty = $cart_det['quantity'];
            $select_product_price = "select product_price from products where product_id = $product_id";
            $send_prod_q = mysqli_query($dbConnection,$select_product_price);
            $prod_price = mysqli_fetch_assoc($send_prod_q)['product_price'];

            // insert values into _order_items_table
            $insert_order_item ="insert into order_items (order_id,product_id,users_id,invoice_no,quantity,price) values ('$order_id','$product_id','$user_id','$invoice_number','$product_qty','$prod_price')";
            $send_order_item_q = mysqli_query($dbConnection,$insert_order_item);
            if($send_order_item_q){
                $delete_cart = "delete from cart_details where users_id = $user_id and product_id = $product_id";
                $send_delete = mysqli_query($dbConnection,$delete_cart);
            }
        }
        if($_GET['paymentType'] == 'payoffline.'){
            $_SESSION['invoice_number'] = $invoice_number;
            echo "yes";
            header('Location:../pay/offline-payment.php?source=checkoutpage');
        }
        

}

}
