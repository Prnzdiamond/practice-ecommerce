<?php
session_start();
include("./db.inc.php");
if(isset($_POST['log_in_user'])){
    $user_email = $_POST['user_email_id'];
    $user_pass = $_POST['user_passw0rd'];
   
   $user_login_query = "select * from  users_db where email_address = ?";
   $inti_db = mysqli_stmt_init($dbConnection);
   mysqli_stmt_prepare($inti_db,$user_login_query);
   mysqli_stmt_bind_param($inti_db,"s",$user_email);
   mysqli_stmt_execute($inti_db);
   $data_retrieved = mysqli_stmt_get_result($inti_db);
   if($data_retrieved->num_rows > 0){
     while($data = mysqli_fetch_assoc($data_retrieved)){
      $user_hashed_pass = $data['user_passw0rd'];
      if(password_verify($user_pass,$user_hashed_pass)){
        $_SESSION['user_id'] = $data['users_id'];
        $_SESSION['username'] = $data['users_ref_name'];
        $_SESSION['fname'] = $data['first_name'];
        $_SESSION['lname'] = $data['last_name'];
        $_SESSION['mail'] = $data['email_address'];
        $_SESSION['sex'] = $data['user_gender'];
        $_SESSION['pwd'] = $data['user_passw0rd'];
        $_SESSION['image'] = $data['user_image'];
        $_SESSION['phone']  =$data['user_phone_no'];
        if(isset($_SESSION['cart-items'])){
            foreach ($_SESSION['cart-items'] as $key => $value) {
                $user_id = $_SESSION['user_id'];
                $select_from_cart = "select * from cart_details where users_id = $user_id  and product_id = $key";
                $insert_select_query = mysqli_query($dbConnection,$select_from_cart);
                if(mysqli_num_rows($insert_select_query) >0){
                    $update_cart_qty = "update cart_details set quantity = $value where users_id = $user_id and product_id = $key";
                    $send_update_query = mysqli_query($dbConnection,$update_cart_qty);

                }else{
                    $insert_cart_frmArr = "insert into `cart_details` (`users_id`,`product_id`,`quantity`) values ($user_id,$key,$value)";
                    $send_insert_query = mysqli_query($dbConnection,$insert_cart_frmArr);
                    if(!$send_insert_query){
                       echo"<script>window.open('?error=errorretrievingCart','_self')</script>";
                    }
                }
            }
        }
        if($_POST['source'] == 'checkout-page' ){
                echo"<script>window.open('../checkout.php','_self')</script>";
        }else{
        echo"<script>window.open('../index.php?msg=loggedin','_self')</script>";
        }
      }
      else{
         echo"<script>window.open('../log-in.php?error=incorrectPwd','_self')</script>";
      }
   }
 

}
else {
    echo"<script>window.open('../log-in.php?error=userDoesNotExist','_self')</script>";
}
}
else{
    echo"<script>window.open('../index.php?error=wrongUrl','_self')</script>";
}
