<?php
session_start();
include('../includes/db.inc.php');
 if(isset($_GET['confirm-pay'])){
     if(isset($_SESSION['invoice_number'])){
        $invoice_number = $_SESSION['invoice_number'];
     }else{
        $invoice_number = $_GET['inv'];
     }

         $payment_type = $_GET['payment_type'];
         $update_order_table = "UPDATE orders SET payment_status = 'received',payment_method = '$payment_type' WHERE invoice_no = '$invoice_number'";
         $update_order_table_query = mysqli_query($dbConnection, $update_order_table);
         if(!$update_order_table_query){
             die("Query Failed: " . mysqli_error($dbConnection));
            } else {
                if(isset($_SESSION['invoice_number'])){
                    unset($_SESSION['invoice_number']);
                }
                echo "<script>alert('Payment received');window.location.href='../users/my-account.php';</script>";
        }
}
else{
    echo"<script>window.open('../index.php','_self');</script>"; 
}