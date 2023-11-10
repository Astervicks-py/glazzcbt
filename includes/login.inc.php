<?php
require_once './classes.php';
require_once './config.php';
$user = new User();
$DB = new DB();
$username = strtolower(mysqli_real_escape_string($conn,$_POST['username']));
$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

// verification

if(!empty($username) && !empty($pwd)){

    $sql = "SELECT * FROM users WHERE username = ?" ;
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0){
            
            $row = mysqli_fetch_assoc($result);
            if($pwd == $row['password'])
            {
                    
                session_start();
                $_SESSION['id'] = $row['user_id'];
                echo "Login Successful";
            }else{
                echo "Incorrect Password";
            }
        }else{
            echo "Invalid Login Details";
        }
    }else{
        echo "something went wrong Check your internet conn";
    }
    
}else{
    echo "Empty slot detected";
}


