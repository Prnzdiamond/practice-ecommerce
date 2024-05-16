<?php
  session_start();
  include('../includes/db.inc.php');
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update-prof'])){
    $userName = mysqli_real_escape_string($dbConnection,$_POST['username']);
    $firstname = mysqli_real_escape_string($dbConnection,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($dbConnection,$_POST['lastname']);
    $email = mysqli_real_escape_string($dbConnection,$_POST['email']);
    $phone = mysqli_real_escape_string($dbConnection,$_POST['phone']);
    $image = $_FILES['image'];
    $user_id = $_SESSION['user_id'];
   

    if(!empty($userName)){
        $userOld = $_SESSION['username'];
        $old = "./users-image/$userOld";
        $new = "./users-image/$userName";
        if(rename($old,$new)){
            $update_user = "update users_db set users_ref_name = '$userName' where users_id =$user_id";
            $send_query = mysqli_query($dbConnection,$update_user);
            if($send_query){
                $_SESSION['username'] = $userName;
            }
        }
    }
    if(!empty($firstname)){
         $update_user = "update users_db set first_name = '$firstname' where users_id =$user_id";
            $send_query = mysqli_query($dbConnection,$update_user);
            if($send_query){
                $_SESSION['fname'] = $firstname;
            }
    }
    if(!empty($lastname)){
         $update_user = "update users_db set last_name = '$lastname' where users_id =$user_id";
            $send_query = mysqli_query($dbConnection,$update_user);
            if($send_query){
                $_SESSION['lname'] = $lastname;
            }
    }
    if(!empty($email)){
         $update_user = "update users_db set email_address = '$email' where users_id =$user_id";
            $send_query = mysqli_query($dbConnection,$update_user);
            if($send_query){
                $_SESSION['mail'] = $email;
            }
    }
    if(!empty($phone)){
         $update_user = "update users_db set user_phone_no = '$phone' where users_id =$user_id";
            $send_query = mysqli_query($dbConnection,$update_user);
            if($send_query){
                $_SESSION['phone'] = $phone;
            }
    }
    if(!$image['error'] > 0 ){
        $username = $_SESSION['username'];
        $image_name = $image['name'];
        $image_tmp_nm = $image['tmp_name'];
        $image_ext = explode(".",$image_name);
        $image_ext = end($image_ext);
        $image_new_name = $username.".".$image_ext;
        $path = "./users-image/$username/";
        if(move_uploaded_file($image_tmp_nm,$path.$image_new_name)){
         $update_user = "update users_db set user_image = '$image_new_name' where users_id =$user_id";
            $send_query = mysqli_query($dbConnection,$update_user);
            if($send_query){
                $_SESSION['image'] = $image_new_name;
            }
        }
    }
?>
 <script>
   window.open('./my-account.php?prof-dets',"_self");
 </script>


<?php } ?>
