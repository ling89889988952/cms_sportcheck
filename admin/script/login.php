<?php

function login($username, $password){

    $pdo = Database::getInstance()->getConnection();
    // check user existance
    $check_exist_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name = :username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username' =>$username,
        )
        ); 

    if ($user_set->fetchColumn()>0){
            $get_user_query = 'SELECT * FROM tbl_user WHERE user_name = :username';
            $get_user_query .= ' AND user_password = :password';
            $user_check = $pdo->prepare($get_user_query);
            $user_check->execute(
                array(
                    ':username'=>$username,
                    ':password'=>$password
                )
                );
                
            while($check_user = $user_check->fetch(PDO::FETCH_ASSOC)){
                    $id = $check_user['user_id'];
                    // logged in
                    $_SESSION['user_id'] = $id;
                    $_SESSION['user_name'] = $check_user['user_name'];
                }
    
                if(isset($id)){
                    $message = 'You just logged in !';

                     redirect_to('admin_editUser.php');
                    
                    
                }else{
                    // IF the password was been encrypted, vertify the password first
                    // and then check the password is right or wrong
                    // query the user array from the database
                    $query_password = 'SELECT * FROM tbl_user WHERE user_name = :username';
                    $password_get= $pdo->prepare($query_password );
                    $password_get->execute(
                    array(
                     ':username'=>$username,
                    )
                    );   
    
                    $found_user = $password_get->fetch(PDO::FETCH_ASSOC);
    

                    $password_hash = $found_user['user_password'];

                    if(password_verify($password, $password_hash)){
                        $message = "Your password is right";
    
                        $user_id = $found_user['user_id'];
                        $_SESSION['user_id'] = $user_id ;
                        $_SESSION['user_name'] = $found_user['user_name'];

                        $count_new = $found_user['user_login_count'];

                        if($count_new  == '0'){
                            redirect_to('admin_editUser.php');
                        }else{
                            redirect_to('admin.php');
                        }
                    }else{     
                    $message ='wrong password!';
                }
                }   


    

}else {
        $message ='User does not exist!';
    }

    return $message;  
     
}


function confirm_logged_in(){
    if(!isset($_SESSION['user_id'])){
        redirect_to('./index.php');
    }
}

function logout(){
    session_destroy();
    redirect_to('./index.php');
}