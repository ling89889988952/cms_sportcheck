<?php
require_once '../load.php';

// Get the User_id, In order to avoid to delete the user
confirm_logged_in();
$id   = $_SESSION['user_id'];

// Query the User Information
$user_table ='tbl_user';
$getUser =  getAll($user_table);

if(!$getUser){
    $message = 'Failed to get user list';
}

// Delete User
if(isset($_GET['id'])){
    $user_id = $_GET['id'];

    if( $user_id != $id){
        $delete_result= deleteUser($user_id);

        if(!$delete_result){
            $message ='Failed to delete user';
        }
    }else{
       $message = 'You can not delete';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>User Management</title>
</head>
<body>
    <h2>Welcome <?php echo $_SESSION['user_name'];?></h2>
    <a href="admin_creatuser.php"> Create User </a><br>
    <a href="admin_editUser.php"> Edit User</a></br>
    <a href="admin.php">Back to Admin </a><br>

    <!-- here add the edit user and delete user function -->
    <?php echo !empty($message)? $message:'';?>
    <table>
    <form action="admin_user.php" method="POST">
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
        <?php while($users = $getUser->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
            <td><?php echo $users['user_id'];?></td>
            <td><?php echo $users['user_name'];?></td>
            <td><?php echo $users['user_email'];?></td>
            <td><button><a href="admin_user.php?id=<?php echo $users['user_id'];?>">Delete</a><bubtton></td>
            </tr>
        <?php endwhile;?>
        
        </tbody>
   </table>
   </form>
    <?php include '../templates/footer.php';?>

</body>


</html>