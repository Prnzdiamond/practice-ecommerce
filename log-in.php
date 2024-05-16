<?php
  include('includes/db.inc.php');            
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commorce  Practice</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container-fluid p-0 mt-5">
      <h3 class="text-center">Welcome Back</h3>
      <p class="text-center">
        please log in to continue shopping
      </p>
      <!-- third child -->
      <div class="container-fluid p-0">
        <!-- Products -->
        <div class="row p-3 d-flex justify-content-center align-items-center">
          <div class="col-lg-12 col-xl-6">
            <div class="row gy-2 d-flex justify-content-center align-items-center">
  <form method="post" action="./includes/logged-in.inc.php" >
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" autocomplete="off" id="user_email_id" name="user_email_id" class="form-control" />
    <label class="form-label" for="user_email_id">Email address</label>
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input autocomplete="off" type="password" id="user_passw0rd" name="user_passw0rd" class="form-control" />
    <label class="form-label" for="user_passw0rd">Password</label>
  </div>
  <?php
  if(isset($_GET['source'])){
     $source_file = $_GET['source'];?>
     <input type="hidden" autocomplete="off" id="source" name="source" value = "<?php echo $source_file ?>" class="form-control" />
 <?php }
  ?>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" name="rem_user" id="rem_user"  />
        <label class="form-check-label" for="rem_user"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <input type="submit" value="Sign in"  name="log_in_user" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="user-register.php">Register</a></p>
    <p>or sign in with:</p>
    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
      <i class="fa fa-facebook-f"></i>
    </button>

    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
      <i class="fa fa-google"></i>
    </button>

    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
      <i class="fa fa-twitter"></i>
    </button>

    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
      <i class="fa fa-github"></i>
    </button>
  </div>
</form>
            </div>
          </div>  
        </div>
      </div>
      <div class="text-center bg-info p-3">
        <p class="m-0">@2024 All Rights Reserved Diamond</p>
      </div>
    </div>
  </body>
  <script src="js/bootstrap.min.js"></script>
</html>
