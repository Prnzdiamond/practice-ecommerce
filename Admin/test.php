<!-- <form action='' enctype='multipart/form-data' method='post'>
     <label for='product-image1' class='form-label'>Product image1</label>
       <input type='file' accept='image/*'  name='product-image1[]' id='product-image1' class=''>
       <label for='product-image2' class='form-label'>Product image2</label>
       <input type='file' accept='image/*' name='product-image1[]' id='product-image2' class=''>
       <label for='product-image3' class='form-label'>Product image3</label>
       <input type='file' accept='image/*'  name='product-image1[]' id='product-image3' class=''>
       <input type='submit' value='submit' name='submit'>
   </form>


       //<?php
       ///// if (isset($_POST['submit'])) {
           // $product_image1 = $_FILES['product-image1'];
            // foreach ($product_image1['name'] as $key => $value) {
              
    //$image1Name  = $product_image1['name'][$key];
   // $image1tmpname = $product_image1['tmp_name'][$key];
    //$image1Ext = explode('.',$image1Name);
   // $image1actExt = end($image1Ext);
   // $image1newNamendPAth = uniqid('',$image1Name ).'.'.$image1actExt;
            
             //   move_uploaded_file($image1tmpname,'./product_images/'.$image1Name);
        //
     //   }
   // }
       ?>/ -->






<?php
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve key and value from the form
    $key = $_POST['key'];
    $value = $_POST['value'];

    // Initialize session array if not already set
    if (!isset($_SESSION['myArray'])) {
        $_SESSION['myArray'] = array();
    }

    // Add key-value pair to the session array
    $_SESSION['myArray'][$key] = $value;
    print_r($_SESSION['myArray']);
}
?>

<!-- HTML Form -->
<form method='post' action='<?php echo htmlspecialchars($_SERVER[' PHP_SELF']); ?>'>
    Key: <input type='text' name='key'><br>
    Value: <input type='text' name='value'><br>
    <input type='submit' value='Add to Array'>
</form>



<form action='./includes/cart_function.inc.php' method='get'>
    <div class='table-content table-responsive'>
        <table class='table'>
            <thead>
                <tr>
                    <th class='li-product-thumbnail'>images</th>
                    <th class='cart-product-name'>Product</th>
                    <th class='li-product-price'>Unit Price</th>
                    <th class='li-product-quantity'>Quantity</th>
                    <th class='li-product-subtotal'>Total</th>
                    <th class='li-product-remove'>remove</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class='li-product-thumbnail'><a href='#'><img class='' src='images/product_images/$prod_image1'
                                alt='Li' s Product Image'></a></td>
                    <td class='li-product-name'><a href='#'>$prod_title</a></td>
                    <td class='li-product-price'><span class='amount'>#$product_price</span></td>
                    <input name='prod_id[]' type='hidden' value='$prod_id'>
                    <td class='quantity'>
                        <label>Quantity</label>
                        <div class='cart-plus-minus'>
                            <input class='cart-plus-minus-box' name='quant[]' value='$qty' type='text'>
                            <div class='dec qtybutton'><i class='fa fa-angle-down'></i></div>
                            <div class='inc qtybutton'><i class='fa fa-angle-up'></i></div>
                        </div>
                    </td>
                    <td class='product-subtotal'><span class='amount'>#$prod_total</span></td>
                    <td class='li-product-remove'><a href='./includes/cart_function.inc.php?removeitem=$prod_id'><i
                                class='fa fa-times'></i></a></td>
                </tr>
            </tbody>

        </table>
    </div>
    <div class='row'>
        <div class='col-12'>
            <div class='coupon-all'>
                <div class='coupon2'>
                    <input class='button' name='update_cart' value='Update cart' type='submit'>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-5 ml-auto'>
            <div class='cart-page-total'>
                <h2>Cart totals</h2>
                <ul>
                    <li>Total <span>
                            <?php countTotalPrice() ?>
                        </span></li>
                </ul>
                <a href='./checkout.php' class='mb-3'>Proceed to checkout</a>
            </div>
        </div>
    </div>
</form>