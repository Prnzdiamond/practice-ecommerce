<?php
  session_start();
  include('../includes/db.inc.php');
  include('../functions/functions.php');
   cart_func();
   $user_id = $_SESSION['user_id'];
                

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commorce Practice</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <img class="logo" src="../images/banner/1_1.jpg" alt="" />
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
              </li>
              <li class="nav-item">
               <?php if(isset($_SESSION['user_id'])){?>
                   <a class="nav-link" href="./my-account.php">My Account</a>
               <?php
               }
               else{?>
                <a class="nav-link" href="user-register.php">Register</a>

             <?php  }?>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
            <form class="d-flex" method="get" action="../index.php">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                name="search_query"
                aria-label="Search"
              />
              <input name="submit" class="btn btn-outline-success" type="submit" value="Search">

            </form>
          </div>
        </div>
      </nav>
      <!-- third child -->
      <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb mt-5">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="./users-image/<?php echo $_SESSION['username'].'/'.$_SESSION['image']?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $_SESSION['username']?></h4>
                          <li class="nav-item-prof">
                <a class ="prof-cart" href="../cart.php"
                  ><i class="fa fa-shopping-cart"><sup><?php count_cart()?></sup>/: <?php countTotalPrice() ?></i></a
                >
              </li>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                 <a href="./my-account.php?prof-dets">
                   <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" id="profile"><g fill="#200E32" transform="translate(3 2)"><ellipse cx="9" cy="5.556" opacity=".4" rx="5.625" ry="5.556"></ellipse><path d="M17.9902354,16.6757991 L17.9902354,16.6757991 C17.9953097,16.5967226 17.9953097,16.5174327 17.9902354,16.4383562 C17.9679741,16.1461262 17.885058,15.8607505 17.7461199,15.5981735 C17.1993012,14.5296804 15.6662559,14.0456621 14.3870907,13.7716895 C13.4744565,13.5817014 12.5471782,13.4595545 11.6139387,13.4063927 L10.6374767,13.3333333 L10.1980688,13.3333333 L9.6512501,13.3333333 L8.34279105,13.3333333 L7.79597234,13.3333333 L7.35656445,13.3333333 L6.38010248,13.4063927 C5.44686291,13.4595545 4.51958466,13.5817014 3.60695046,13.7716895 C2.32778527,14.0091324 0.794739971,14.5022831 0.247921264,15.5981735 C0.10898315,15.8607505 0.0260670984,16.1461262 0.00380576968,16.4383562 C-0.00126858989,16.5174327 -0.00126858989,16.5967226 0.00380576968,16.6757991 L0.00380576968,16.6757991 C-0.000879294659,16.7548861 -0.000879294659,16.834155 0.00380576968,16.913242 C0.0303656032,17.2029741 0.116574533,17.4851701 0.257685884,17.7442922 C0.804504591,18.8127854 2.33754989,19.2968037 3.61671508,19.5707763 C4.53104892,19.7518719 5.45762024,19.8739256 6.3898671,19.9360731 L7.36632907,20 L7.60067995,20 L7.80573696,20 L10.2078334,20 L10.4128904,20 L10.6472413,20 L11.6237033,19.9360731 C12.5559501,19.8739256 13.4825215,19.7518719 14.3968553,19.5707763 C15.6760205,19.3242009 17.2090658,18.8401826 17.7558845,17.7442922 C17.890425,17.4769528 17.9730826,17.1893744 18,16.8949772 C18.0012406,16.8218031 17.9979804,16.748623 17.9902354,16.6757991 Z"></path></g></svg></h6>
                    <span class="text-secondary">View profile Details</span>
                  </li>
                 </a>
                <a href="./my-account.php?pending_orders">
                     <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg id="SvgjsSvg1001" width="24" height="24" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><defs id="SvgjsDefs1002"></defs><g id="SvgjsG1008"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="m6.25,6c0-.414.336-.75.75-.75h8c.414,0,.75.336.75.75s-.336.75-.75.75H7c-.414,0-.75-.336-.75-.75Zm1.75,5.25h-1c-.414,0-.75.336-.75.75s.336.75.75.75h1c.414,0,.75-.336.75-.75s-.336-.75-.75-.75Zm-1-1.5h4c.414,0,.75-.336.75-.75s-.336-.75-.75-.75h-4c-.414,0-.75.336-.75.75s.336.75.75.75Zm9.955,5.5h-1.205v-1.285c0-.414-.336-.75-.75-.75s-.75.336-.75.75v2.035c0,.414.336.75.75.75h1.955c.414,0,.75-.336.75-.75s-.336-.75-.75-.75Zm3.795.75c0,3.17-2.579,5.75-5.75,5.75-1.199,0-2.313-.37-3.235-1h-5.765c-1.517,0-2.75-1.233-2.75-2.75V5c0-1.517,1.233-2.75,2.75-2.75h10c1.517,0,2.75,1.233,2.75,2.75v6.651c1.222,1.055,2,2.612,2,4.349Zm-14.75,3.25h4.261c-.637-.925-1.011-2.044-1.011-3.25,0-3.17,2.579-5.75,5.75-5.75.798,0,1.559.164,2.25.459v-5.709c0-.689-.561-1.25-1.25-1.25H6c-.689,0-1.25.561-1.25,1.25v13c0,.689.561,1.25,1.25,1.25Zm13.25-3.25c0-2.343-1.906-4.25-4.25-4.25s-4.25,1.907-4.25,4.25,1.906,4.25,4.25,4.25,4.25-1.907,4.25-4.25Z" fill="#000000" class="color000 svgShape"></path></svg></g></svg></h6>
                    <span class="text-secondary">Pending Orders</span>
                  </li>
                </a>
                <a href="./my-account.php?sucees_orders">
                     <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg id="SvgjsSvg1001" width="24" height="24" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><defs id="SvgjsDefs1002"></defs><g id="SvgjsG1008"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="m6.25,6c0-.414.336-.75.75-.75h8c.414,0,.75.336.75.75s-.336.75-.75.75H7c-.414,0-.75-.336-.75-.75Zm1.75,5.25h-1c-.414,0-.75.336-.75.75s.336.75.75.75h1c.414,0,.75-.336.75-.75s-.336-.75-.75-.75Zm-1-1.5h4c.414,0,.75-.336.75-.75s-.336-.75-.75-.75h-4c-.414,0-.75.336-.75.75s.336.75.75.75Zm9.955,5.5h-1.205v-1.285c0-.414-.336-.75-.75-.75s-.75.336-.75.75v2.035c0,.414.336.75.75.75h1.955c.414,0,.75-.336.75-.75s-.336-.75-.75-.75Zm3.795.75c0,3.17-2.579,5.75-5.75,5.75-1.199,0-2.313-.37-3.235-1h-5.765c-1.517,0-2.75-1.233-2.75-2.75V5c0-1.517,1.233-2.75,2.75-2.75h10c1.517,0,2.75,1.233,2.75,2.75v6.651c1.222,1.055,2,2.612,2,4.349Zm-14.75,3.25h4.261c-.637-.925-1.011-2.044-1.011-3.25,0-3.17,2.579-5.75,5.75-5.75.798,0,1.559.164,2.25.459v-5.709c0-.689-.561-1.25-1.25-1.25H6c-.689,0-1.25.561-1.25,1.25v13c0,.689.561,1.25,1.25,1.25Zm13.25-3.25c0-2.343-1.906-4.25-4.25-4.25s-4.25,1.907-4.25,4.25,1.906,4.25,4.25,4.25,4.25-1.907,4.25-4.25Z" fill="#000000" class="color000 svgShape"></path></svg></g></svg></h6>
                    <span class="text-secondary">Succesful Orders</span>
                  </li>
                </a>
                <a href="./my-account.php?edit-dets">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg id="SvgjsSvg1001" width="25" height="25" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><defs id="SvgjsDefs1002"></defs><g id="SvgjsG1008"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="25" height="25"><g data-name="Layer 21"><circle cx="13" cy="9" r="3" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="colorStroke000 svgStroke"></circle><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.51,26H15.93V24.41a3,3,0,0,1,.88-2.12l4.77-4.78a2,2,0,0,1,2.83,0h0a2,2,0,0,1,0,2.83l-4.78,4.78A3,3,0,0,1,17.51,26Z" class="colorStroke000 svgStroke"></path><line x1="23" x2="20.17" y1="21.76" y2="18.93" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="colorStroke000 svgStroke"></line><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16,16.45a10.44,10.44,0,0,0-8,.82,2,2,0,0,0,0,3.48A10.22,10.22,0,0,0,12,22" class="colorStroke000 svgStroke"></path></g></svg></g></svg></h6>
                    <span class="text-secondary">Edit Account Details</span>
                  </li>
                </a>
                 <a href="./my-account.php"> <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg id="SvgjsSvg1001" width="25" height="25" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><defs id="SvgjsDefs1002"></defs><g id="SvgjsG1008"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="25" height="25"><g data-name="Layer 21"><circle cx="13" cy="9" r="3" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="colorStroke000 svgStroke"></circle><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.51,26H15.93V24.41a3,3,0,0,1,.88-2.12l4.77-4.78a2,2,0,0,1,2.83,0h0a2,2,0,0,1,0,2.83l-4.78,4.78A3,3,0,0,1,17.51,26Z" class="colorStroke000 svgStroke"></path><line x1="23" x2="20.17" y1="21.76" y2="18.93" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="colorStroke000 svgStroke"></line><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16,16.45a10.44,10.44,0,0,0-8,.82,2,2,0,0,0,0,3.48A10.22,10.22,0,0,0,12,22" class="colorStroke000 svgStroke"></path></g></svg></g></svg></h6>
                    <span class="text-secondary">Account Settings</span>
                  </li></a>
                  <li class="list-group-item d-flex justify-content-center align-items-center flex-wrap">
                    <a href="../includes/logout.php"><h3 class="mb-0 align-self-center text-danger">Log-out</h3></a>
                    
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8 align-self-center">
              <?php if(isset($_GET['prof-dets'])){?>
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row ">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                       <?php echo $_SESSION['fname']." ".$_SESSION['lname']?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $_SESSION['mail']?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                       <?php echo $_SESSION['phone']?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        Bay Area, San Francisco, CA
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12">
                        <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                      </div>
                    </div>
                  </div>
                </div>
               <?php }
               if(isset($_GET['pending_orders'])){
                $sn = 0;
                $select_pending_orders = "select * from orders where user_id = $user_id and payment_status ='pending'";
                $send_pend_query = mysqli_query($dbConnection,$select_pending_orders);
                if (mysqli_num_rows($send_pend_query) == 0 ) {?>
                  <h2 class="text-center">You have no Pending Orders</h2>
                <?php }else{?>
                 <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-thumbnail">s/n</th>
                                                <th class="cart-product-name">Order Date</th>
                                                <th class="li-product-price">Payment Status</th>
                                                <th class="li-product-quantity">Quantity</th>
                                                <th class="li-product-subtotal">Invoice Number</th>
                                                <th class="li-product-remove">Total Amount</th>
                                                <th class="li-product-remove">Pay-Now</th>
                                            </tr>
                                        </thead>
                                        <?php 
                while($data_order = mysqli_fetch_assoc($send_pend_query)){
                  $sn += 1;
                  $date = $data_order['order_date'];
                  $pay_stat = $data_order['payment_status'];
                  $qty = $data_order['item_count'];
                  $inv_no =$data_order['invoice_no'];
                  $tot_amt = $data_order['total_amount'];?>
                     <tbody>
                       <tr>
                         <td class='li-product-thumbnail'><span><?php echo $sn ?></span></td>
                         <td class='li-product-name'><span><?php echo $date ?></span></td>
                         <td class='li-product-price'><span><?php echo $pay_stat ?></span></td>
                         <td class='quantity'>
                          <span><?php echo $qty ?></span> </td>
                           <td class='product-subtotal'><span><?php echo $inv_no ?></span></td>
                           <td class='li-product-remove'><span><?php echo number_format($tot_amt,2) ?></span></td>
                           <td class='li-product-remove'><a href="../pay/offline-payment.php?source=myaccount&inv=<?php echo $inv_no ?>">go to payment</a></td>
                          </tr>
                        </tbody>
                        <?php }?>
                      </table>
                    <?php } }?>
                     <?php 
               if(isset($_GET['sucees_orders'])){
                $sn = 0;
                $select_pending_orders = "select * from orders where user_id = $user_id and payment_status ='received'";
                $send_pend_query = mysqli_query($dbConnection,$select_pending_orders);
                if (mysqli_num_rows($send_pend_query) == 0 ) {?>
                  <h2 class="text-center">You have no Processed Orders</h2>
                <?php }else{?>
                 <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-thumbnail">s/n</th>
                                                <th class="cart-product-name">Order Date</th>
                                                <th class="li-product-price">Payment Status</th>
                                                <th class="li-product-quantity">Quantity</th>
                                                <th class="li-product-subtotal">Invoice Number</th>
                                                <th class="li-product-remove">Total Amount</th>
                                                <th class="li-product-remove">Pay-Now</th>
                                            </tr>
                                        </thead>
                                        <?php 
                while($data_order = mysqli_fetch_assoc($send_pend_query)){
                  $sn += 1;
                  $date = $data_order['order_date'];
                  $pay_stat = $data_order['payment_status'];
                  $qty = $data_order['item_count'];
                  $inv_no =$data_order['invoice_no'];
                  $tot_amt = $data_order['total_amount'];?>
                     <tbody>
                       <tr>
                         <td class='li-product-thumbnail'><span><?php echo $sn ?></span></td>
                         <td class='li-product-name'><span><?php echo $date ?></span></td>
                         <td class='li-product-price'><span><?php echo $pay_stat ?></span></td>
                         <td class='quantity'>
                          <span><?php echo $qty ?></span> </td>
                           <td class='product-subtotal'><span><?php echo $inv_no ?></span></td>
                           <td class='li-product-remove'><span><?php echo number_format($tot_amt,2) ?></span></td>
                           <td class='li-product-remove'><a href="?order_dets=<?php echo $inv_no ?>">View Order</a></td>
                          </tr>
                        </tbody>
                        <?php }?>
                      </table>
                    <?php  }}?>

                                         <?php 
               if(isset($_GET['order_dets'])){
                $inv = $_GET['order_dets'];
                $sn = 0;
                $select_pending_orders = "select * from order_items where invoice_no = '$inv'";
                $send_pend_query = mysqli_query($dbConnection,$select_pending_orders);
                if (mysqli_num_rows($send_pend_query) == 0 ) {?>
                  <h2 class="text-center">You have no Processed Orders</h2>
                <?php }else{?>
                 <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-thumbnail">s/n</th>
                                                <th class="cart-product-name">Product Name</th>
                                                <th class="li-product-quantity">Quantity</th>
                                                <th class="li-product-remove">Product Price</th>
                                                <th class="li-product-subtotal">Invoice Number</th>
                                            </tr>
                                        </thead>
                                        <?php 
                while($data_order = mysqli_fetch_assoc($send_pend_query)){
                  $sn += 1;
                  $prod_id = $data_order['product_id'];
                  $prod_qty = $data_order['quantity'];
                  $inv_no =$data_order['invoice_no'];
                  $select_prod ="select * from products where product_id = $prod_id";
                  $send_prod_query = mysqli_query($dbConnection,$select_prod);
                  while($data_prod = mysqli_fetch_assoc($send_prod_query)){
                    $prod_name = $data_prod['product_title'];
                    $prod_price = $data_prod['product_price'];
                  }
                  ;?>
                     <tbody>
                       <tr>
                         <td class='li-product-thumbnail'><span><?php echo $sn ?></span></td>
                         <td class='li-product-name'><span><?php echo $prod_name ?></span></td>
                         <td class='li-product-price'><span><?php echo $prod_qty ?></span></td>
                         <td class='li-product-remove'><span><?php echo number_format($prod_price,2) ?></span></td>
                         <td class='product-subtotal'><span><?php echo $inv_no ?></span></td>
                          </tr>
                        </tbody>
                        <?php }?>
                      </table>
                    <?php  }}?>
                    
                    <?php 
                    if(isset($_GET['edit-dets'])){?>
                    <div class="container">
						       <form action="update_prof.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">User Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" placeholder="John Doe" name="username">
								</div>
							</div>
              <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">First Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" placeholder="John Doe" name="firstname">
								</div>
							</div>
              <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Last Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" placeholder="John Doe" name="lastname">
								</div>
							</div>
              
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" placeholder="john@example.com" name="email">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" placeholder="(239) 816-9029" name="phone">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Image</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="file" name="image" class="form-control" value="Bay Area, San Francisco, CA">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" name="update-prof" class="btn btn-primary px-4" value="Save Changes">
								</div>
							</div>
						</div>
                   </form>
					</div>
				</div>
			</div>
		</div>
	</div>
                       
                   <?php }?>
                        
                        
                        
                      </div>       
                <div class="text-center bg-info p-3">
        <p class="m-0">@2024 All Rights Reserved Diamond</p>
      </div>
    </div>
  </body>
  <script src="js/bootstrap.min.js"></script>
</html>










