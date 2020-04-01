<?php
require_once '../load.php';

confirm_logged_in();

$id   = $_SESSION['user_id'];
$user = getSingleUser($id);

if(is_string($user)){
    $message = $user;
}

if(isset($_POST['submit'])){
    $password = trim($_POST['password']);
    $email    = trim($_POST['email']);
    $message = editUser($id,$password,$email);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>User Management - Change Password</title>
</head>
<body>
<h2>Edit User</h2>
    <p>Please change your password and email. Thanks!</p>
    <?php echo !empty($message)? $message:'';?>

    <form action="admin_editUser.php" method="post">
        <?php while($info = $user->fetch(PDO::FETCH_ASSOC)):?>

        <label>UserName</label>
        <input type="text" name="username" value="<?php echo $info['user_name'];?>" readonly><br><br>

        <label>Password:</label>
        <input type="text" name="password" value="<?php echo $info['user_password'];?>"><br><br>

        <label>Email</label>
        <input type="text" name="email" value="<?php echo $info['user_email'];?>"><br><br>
        <?php endwhile;?>

        <button type="submit" name="submit">Edit Account</button>
    </form>
<?php include '../templates/footer.php';?>
</body>
</html>