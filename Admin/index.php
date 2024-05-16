<?php
  include('../includes/db.inc.php');
  include('../functions/functions.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commorce first Practice</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container-fluid admin-con p-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
          <img class="logo" src="../images/banner/1_1.jpg" alt="" />
          <button
            class="navbar-toggler admin-name"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            Agboifoh
          </button>
        </div>
      </nav>
      <!-- second child -->
      <h3 class="text-center">Hidden Store</h3>
      <p class="text-center">
        Shop at Diamond Store Quality Products Affordable Price
      </p>
      <!-- third child -->
      <div class="navbar-nav bg-secondary mb-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 p-3">
                   <img src="../images/team/2.png" alt="" class="adminpic">
                </div>
                <div class="col-md-9 adminbtn">
                  <div class="row gy-3 gx-2 adminbtnrow">
                    <div class="col-md-2"><button class="btn p-0  px-2 btn-primary"><a href="index.php?insert-prod" class="nav-link">Insert Products</a></button></div>
                    <div class="col-md-2"><button class="btn p-0  px-2 btn-primary"><a href="" class="nav-link">View Products</a></button></div>
                    <div class="col-md-2"><button class="btn p-0  px-2 btn-primary"><a href="index.php?insert-cat" class="nav-link">Insert Categories</a></button></div>
                    <div class="col-md-2"><button class="btn p-0  px-2 btn-primary"><a href="" class="nav-link">View Categories</a></button></div>
                    <div class="col-md-2"><button class="btn p-0  px-2 btn-primary"><a href="index.php?insert-brand" class="nav-link">Insert Brands</a></button></div>
                    <div class="col-md-2"><button class="btn p-0  px-2 btn-primary"><a href="" class="nav-link">View Brands</a></button></div>
                    <div class="col-md-2"><button class="btn p-0  px-2 btn-primary"><a href="" class="nav-link">All Orders</a></button></div>
                    <div class="col-md-2"><button class="btn p-0  px-2 btn-primary"><a href="" class="nav-link">All Payments</a></button></div>
                    <div class="col-md-2"><button class="btn p-0  px-2 btn-primary"><a href="" class="nav-link">List Users</a></button></div>
                    <div class="col-md-2"><button class="btn p-0  px-2 btn-primary"><a href="" class="nav-link">Logout</a></button></div>
                  </div>
                </div>
            </div>
        </div>
      </div>
      <!-- main page display -->
      <div class="container">
        <?php
         displayAdcontrol()
        
        ?>
      </div>
    </div>
    <div class="text-center bg-info p-3 footer">
        <p class="m-0 text-center">@2024 All Rights Reserved Diamond</p>
      </div>
  </body>
  <script src="js/bootstrap.min.js"></script>
</html>
