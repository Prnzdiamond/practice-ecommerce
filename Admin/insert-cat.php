<?php 
   include("../includes/db.inc.php");
   if(isset($_POST['insert-cat-title'])){
    $catName = $_POST['category-title'];
    // check if category Exist
    $checkCat = "select * from `categories` where category_ref = '$catName'";
    $sendQuery = mysqli_query($dbConnection,$checkCat);
    if(mysqli_num_rows($sendQuery)> 0){
        echo "<script>alert('Category Already Exists')</script>";
    }else{
        // insert category
        $insertCat = "insert into `categories` (category_ref) values ('$catName')";
        $sendInsertQuery = mysqli_query($dbConnection,$insertCat);
        if($sendInsertQuery){
             echo "<script>alert('Category Added Sucessfully')</script>";
        }
    }
   }

?>

<h2 class="text-center mt-4 mb-4">
    Insert Category
</h2>
<form action="" method="post">
   <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">🧾</span>
  <input type="text" name="category-title" class="form-control p-4" placeholder="Insert Category" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mt-4 mb-3">
  <input name="insert-cat-title" type="submit" class="bg-info func-btn p" value="Insert" mt-3>
</div>
</form>