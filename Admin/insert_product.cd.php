<?php
include('../includes/db.inc.php');

if(isset($_POST['insert-prod'])){
    $product_title = $_POST['product-title'];
    $product_desc = $_POST['product-desc'];
    $product_key = $_POST['product-key'];

    $select_category = $_POST['select-cat'];
    $select_brandName = $_POST['select-brand'];


    $product_price = $_POST['product-price'];
    


    $product_image1 = $_FILES['product-image1'];
    $product_image2 = $_FILES['product-image2'];
    $product_image3 = $_FILES['product-image3'];


    $path = '../images/product_images/';

    $image1Name  = $product_image1['name'];
    $image1tmpname = $product_image1['tmp_name'];
    $image1Ext = explode(".",$image1Name);
    $image1actExt = end($image1Ext);
    $image1newNamendPAth = uniqid("",$image1Name ).".".$image1actExt;

    $image2Name  = $product_image2['name'];
    $image2tmpname = $product_image2['tmp_name'];
    $image2Ext = explode(".",$image2Name);
    $image2actExt = end($image2Ext);
    $image2newNamendPAth = uniqid("",$image2Name ).".".$image2actExt;

    $image3Name  = $product_image3['name'];
    $image3tmpname = $product_image3['tmp_name'];
    $image3Ext = explode(".",$image3Name);
    $image3actExt = end($image3Ext);
    $image3newNamendPAth = uniqid("",$image3Name ).".".$image3actExt;

    

    if($product_title == "" or $product_desc == "" or $product_key == "" or $select_category == " " or $select_brandName == "" or $product_price == "" or $product_image1['error'] > 0 or $product_image2['error'] > 0 or $product_image3['error'] > 0){
            echo'<script>alert("fill all fields")</script>';

            header("Location:index.php?insert-prod=error");
            exit;   
    }else {
       move_uploaded_file($image1tmpname,$path.$image1newNamendPAth);
        move_uploaded_file($image2tmpname,$path.$image2newNamendPAth);
        move_uploaded_file($image3tmpname,$path.$image3newNamendPAth);
            $insertProduct = "INSERT INTO `products` (product_title, product_desc, product_key, select_category, select_brandName, product_price, product_image1, product_image2, product_image3) VALUES ('$product_title', '$product_desc', '$product_key', '$select_category', '$select_brandName', '$product_price', '$image1newNamendPAth', '$image2newNamendPAth', '$image3newNamendPAth')";
            $sendInsertQuery= mysqli_query($dbConnection,$insertProduct);
            if($sendInsertQuery){
                
                 header("Location:index.php?insert-prod=sucess");
            
                 exit;   
            }
            else{
                 echo '<script>alert("something went wrong")</script>';

                 header("Location:index.php?insert-prod");
                 exit;
            }
        

    }
}

