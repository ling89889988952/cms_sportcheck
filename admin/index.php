<?php
require_once '../load.php';

if(isset($_POST['login'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(!empty($username) && !empty($password)){
        $message = login($username,$password);
    }else{
        $message = 'Please fill out the required field';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <title>Sport Check - Login</title>
</head>
<body>
    <h2>Login</h2>
    <p>Please fill the form below!</p>
    <?php echo !empty($message)?$message:'';?>
    <form action="index.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="">

        <label for="password">Password:</label>
        <input type="text" name="password" id="password" value="">

        <button name="login">Login</button>
    <form>
    <?php include '../templates/footer.php';?>
</body>
</html>