<?php
include('../includes/db.inc.php');
?>

<div class="container text-center">
    <h2>Insert Products</h2>


    <form action="insert_product.cd.php" method="post" class="ins-prod" enctype="multipart/form-data">
       <label for="product-title" class="form-label">Product Title</label>
       <input type="text" placeholder="Enter Product Title" name="product-title" id="product-title" class="">
       <label for="product-title" class="form-label">Product Description</label>
       <input type="text" placeholder="Enter Product Description" name="product-desc" id="product-desc" class="">
       <label for="product-title" class="form-label">Product Keyword</label>
       <input type="text" placeholder="Enter Product Keyword" name="product-key" id="product-key" class="">
<!-- bring category and brand from database -->
       <select name="select-cat" id="select-cat" class="">
        <option value="">select a category</option>
        <?php 
        $select_cat = 'select * from `categories`';
        $sendQuery = mysqli_query($dbConnection,$select_cat);
        if(mysqli_num_rows($sendQuery)> 0){
            while($checkQuery = mysqli_fetch_assoc($sendQuery)){
                echo "<option value='$checkQuery[category_id]'>$checkQuery[category_ref]</option>";

            }
        }else {
            echo "<option value=' '>No category yet</option>";
        }
        
        ?>
       </select>

       
       <select name="select-brand" id="select-brand" class="">
        <option value="">select a Brand</option>
        <?php 
        $select_brand = 'select * from `brand`';
        $sendQuery = mysqli_query($dbConnection,$select_brand);
        if(mysqli_num_rows($sendQuery)> 0){
            while($checkQuery = mysqli_fetch_assoc($sendQuery)){
                echo "<option value='$checkQuery[brand_id]'>$checkQuery[brand_ref]</option>";

            }
        }else {
            echo "<option value=' '>No Brand yet</option>";
        }
        ?>
       </select>

       <label for="product-image1" class="form-label">Product image1</label>
       <input type="file" accept="image/*"  name="product-image1" id="product-image1" class="">
       <label for="product-image2" class="form-label">Product image2</label>
       <input type="file" accept="image/*" name="product-image2" id="product-image2" class="">
       <label for="product-image3" class="form-label">Product image3</label>
       <input type="file" accept="image/*"  name="product-image3" id="product-image3" class="">

       <label for="product-price" class="form-label">Product Price</label>
       <input type="int" placeholder="Enter Product Price" name="product-price" id="product-price" class="">

     
       <input type="submit" value="Insert Products"  name="insert-prod" id="insert-prod" class=" bg-info">
    </form>
</div>