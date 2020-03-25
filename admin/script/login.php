<?php

function login($username,$password){
    $pdo = Database::getInstance()->getConnection();

    $check_user = 'SELECT COUNT(*) From tbl_user WHERE user_name=:username';
    $set_user = $pdo->prepare($check_user);
    $set_user->execute(
        array(
            ':username' => $username,
        )
        );

    if($set_user ->fetchColumn()>0){
        $get_user   = 'SELECT * FROM tbl_user WHERE user_name = :username';
        $get_user  .=  ' AND user_password = :password';
        $query_user = $pdo->prepare($get_user);
        $query_user->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
            );   

            while($found_user = $query_user->fetch(PDO::FETCH_ASSOC)){
                $id = $found_user['user_id'];
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $found_user['user_name'];
            }

            if(isset($id)){
                $message = 'Logged in';
                redirect_to('admin.php');
            }else{
                $message = 'You type wrong password';
            }
    }else{
        $message = 'User does not exit!';
    }

    return $message;

}


function confirm_logged_in(){
    if(!isset($_SESSION['user_id'])){
        redirect_to('./admin_login.php');
    }
}

function logout(){
    session_destroy();
    redirect_to('./admin_login.php');
}