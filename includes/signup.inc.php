<?php
require_once './classes.php';
require_once './config.php';
$generate = new Generate();
$user = new User();
$DB = new DB();
$username = strtolower(mysqli_real_escape_string($conn,$_POST['username']));
$repeat_pwd = mysqli_real_escape_string($conn,$_POST['repeat_pwd']);
$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

// verification

if(!empty($username) && !empty($pwd) && !empty($repeat_pwd)){

    $sql = "SELECT * FROM users WHERE username = ?" ;
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) < 1){
            if($pwd == $repeat_pwd)
            {
                $gen = new Generate();
                $random = $gen->random(10,"mixed");
                $DB = new DB();
                

                $sql = "INSERT INTO users(user_id,username,password)
                VALUES(?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(mysqli_stmt_prepare($stmt,$sql)){
                    mysqli_stmt_bind_param($stmt,"sss",$random,$username,$pwd);
                    mysqli_stmt_execute($stmt);


                    /** Automatically Login in User After Signup */
                    $sql2 = "SELECT * FROM users WHERE username = ?";
                    $stmt2 = mysqli_stmt_init($conn);
                    if(mysqli_stmt_prepare($stmt2,$sql2)){
                        mysqli_stmt_bind_param($stmt2,"s",$username);
                        mysqli_stmt_execute($stmt2);
                        $result = mysqli_stmt_get_result($stmt2);
                        if(mysqli_num_rows($result) >= 1){
                            $row = mysqli_fetch_assoc($result);
                            session_start();
                            $_SESSION['id'] = $row['user_id'];
                            echo "Signup Successful";
                        }
                    }
                }else{
                    echo "something went wrong";
                }
            }else{
                echo "Passwords dont match";
            }
        }else{
            echo "Username has been taken";
        }
    }else{
        echo "something went wrong Check your internet conn";
    }
    
}else{
    echo "Empty slot detected";
}


