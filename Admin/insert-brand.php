<?php
  include("../includes/db.inc.php");

  if(isset($_POST['insert-bran-title'])){
        $brandName = $_POST['brand-title'];
        // check if brand exists
        $checkBrand = "select * from `brand` where brand_ref = '$brandName'";
        $sendQuery = mysqli_query($dbConnection,$checkBrand);
        $checkQuery = mysqli_num_rows($sendQuery);
        if($checkQuery > 0){
            echo '<script>alert("Brand already Exixts")</script>';
        }else{
            // code to insert Brand
            $insertBrand = "insert into `brand` (brand_ref) values ('$brandName')";
            $sendInsertQuery = mysqli_query($dbConnection,$insertBrand);
            if($sendInsertQuery){}
             echo '<script>alert("Brand added Sucesfully")</script>';
      }
  }
?>



<h2 class="text-center mt-4 mb-4">
    Insert Brands
</h2>
<form action="" method="post">
   <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">🧾</span>
  <input name="brand-title" type="text" class="form-control p-4" placeholder="Insert Brands" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mt-4 mb-3">
  <input name="insert-bran-title" type="submit" class="bg-info func-btn p" value="Insert" mt-3>
</div>
</form>