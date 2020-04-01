<?php

function createUser($username,$password,$email){

    $pdo = Database::getInstance()->getConnection();  
    // check the $username whether exist or not in database
    $check_user_exist = 'SELECT * FROM tbl_user WHERE user_name = :username';
    $check_exist      = $pdo->prepare($check_user_exist);
    $check_exist->execute(
        array(
            ':username' =>$username,
        )
        ); 
    $row = $check_exist->fetch(PDO::FETCH_ASSOC);

    // The $username do not exist
    if (!$row){
    // encrypted the password, based on the post password
        $hash_password      = password_hash($password, PASSWORD_DEFAULT);
        $create_user_query  = 'INSERT INTO tbl_user (user_name, user_password, user_email, user_login_count)';
        $create_user_query .= ' VALUES(:username, :password, :email, :count)';
        $create_user_set    = $pdo->prepare($create_user_query);
        $create_user_result = $create_user_set ->execute(
            array(
                ':username'   =>  $username,
                ':password'   =>  $hash_password,
                ':email'      =>  $email,
                ':count'      =>  '0',
            )
            );


        if($create_user_result){                
            redirect_to('admin_user.php');

        } else{
            return 'error!';
        }
    
    }else{
    $message= 'The username is exist, please change your username';
    }
    return $message;
}

function getSingleUser($id){
    $pdo = Database::getInstance()->getConnection();  
    // TODO: execute the proper SQL query to fetch the user data 
    $find_user_data  = 'SELECT * FROM tbl_user WHERE user_id =:id';
    $query_user_data =  $pdo->prepare($find_user_data);
    $get_user_result = $query_user_data ->execute(
                        array(
                            ':id' =>$id,
                        )
                        );

    if($get_user_result){
        // TODO: if the execute is successful, return the user data
        // Otherwise, return an error messages
        return ($query_user_data);
        

    }else{
        return  "There have some problem";   
    }
}

function editUser($id,$password,$email){
    // TODO:Set the database connection
    $pdo = Database::getInstance()->getConnection();  
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    // TODO:Run the proper SQL query to update tbl_user with proper values
    $update_user_data   = 'UPDATE tbl_user SET user_password =:password, user_email = :email ,user_date = user_date, user_login_count =user_login_count+1 WHERE user_id =:id';
    $update_user_set    = $pdo->prepare($update_user_data);
    $update_user_result = $update_user_set->execute(
                array(
                ':id'         =>  $id,
                ':password'   =>  $password_hash,
                ':email'      =>  $email,
                )
                );
    
                if($update_user_result){
                    redirect_to('admin.php');
                }else{
                    return ' wrong';
                }
    
}


function deleteUser($user_id){
    // TODO: finish the function to delete the given user
    $pdo = Database::getInstance()->getConnection();
    $delete = 'DELETE FROM tbl_user WHERE user_id = :user_id';
    $deleteUser = $pdo->prepare($delete);
    $delete_User_Result = $deleteUser ->execute(
                    array(
                        ':user_id' =>$user_id,
                    )
                    );
    
    if($delete_User_Result && $deleteUser->rowCount() > 0){
        redirect_to('admin_user.php');
    }else{
        return ' ERROE';
    }
}