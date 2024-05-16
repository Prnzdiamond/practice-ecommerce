<?php
include('db.inc.php');
include('../functions/functions.php');
if(isset($_POST['reg_user'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $user_name = $_POST['user_ref_name'];
    $user_gender = $_POST['user_gender'];
    $password = $_POST['user_passw0rd'];
    $hash_pwd = password_hash($password,PASSWORD_ARGON2ID);
    $password2 = $_POST['user_passw0rd2'];
    $user_ip = getIPAddress();
    $user_image = $_FILES['user_image'];
    $user_image_path = "../users/users-image/$user_name/";
   if(empty($first_name) or empty($last_name) or empty($email_address) or empty($user_name) or empty($user_gender)or empty($password) or empty($password2) or empty($user_image)){
        echo"<script>window.open('../user-register.php?error=fillallField','_self')</script>";
   }
   if($password != $password2){
       echo"<script>window.open('../user-register.php?error=passwordnoMatch','_self')</script>";
    }
    
    
    $user_login_query = "select * from  users_db where email_address = ?";
    $inti_db = mysqli_stmt_init($dbConnection);
    mysqli_stmt_prepare($inti_db,$user_login_query);
    mysqli_stmt_bind_param($inti_db,"s",$email_address);
    mysqli_stmt_execute($inti_db);
    $data_retrieved = mysqli_stmt_get_result($inti_db);
    if($data_retrieved->num_rows == 0){
        if($user_image['error'] == 0){
            $user_image_full_name = $user_image['name'];
            $user_image_tmp_name = $user_image['tmp_name'];
            $user_image_arr = explode(".",$user_image_full_name);
            $user_image_ext = end($user_image_arr);
            $user_new_img_nm = $user_name;
            $user_img_nm_path =$user_new_img_nm.".".$user_image_ext;
            if(mkdir("../users/users-image/$user_name")){
            if(move_uploaded_file($user_image_tmp_name,$user_image_path.$user_img_nm_path)){
                $create_new_user_query = "INSERT INTO `users_db` (`user_ip`,`users_ref_name`, `first_name`, `last_name`, `email_address`, `user_gender`, `user_passw0rd`, `user_image`) VALUES ( ?,?, ?, ?, ?, ?, ?, ?)";
                $init_stmt = mysqli_stmt_init($dbConnection);
                $prep_stmt = mysqli_stmt_prepare($init_stmt,$create_new_user_query);
                $bind_stmt_param = mysqli_stmt_bind_param($init_stmt,"ssssssss",$user_ip,$user_name,$first_name, $last_name,$email_address,$user_gender, $hash_pwd,$user_img_nm_path);
                if(mysqli_stmt_execute($init_stmt)){
                    echo"<script>window.open('../log-in.php?error=regsucess','_self')</script>";
                }else{
                     echo"<script>window.open('../user-register.php?error=unknow','_self')</script>";
                }
                
            }else{
                 echo"<script>window.open('../user-register.php?error=movefile_fail','_self')</script>";
            }
        }
        else{
            echo"<script>window.open('../user-register.php?error=createdir_fail','_self')</script>";
        }
            
            
            
            
        }
        else{
            echo"<script>window.open('../user-register.php?error=uploadValidimage','_self')</script>";
        }
        
        
        
    }

    else{
        echo"<script>window.open('../user-register.php?error=userExist','_self')</script>";
   }

}
else{
     echo"<script>window.open('../index.php?error=wrongUrl','_self')</script>";
}
