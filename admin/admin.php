<?php
require_once '../load.php';

confirm_logged_in();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <title>Sport Check - Admin</title>
</head>
<body>
    <h2>Welcome <?php echo $_SESSION['user_name'];?></h2>
    <a href="admin_user.php">User Management</a><br>
    <a href="admin_edit.php">Content Management</a><br>
    <a href="admin_logout.php">Sign Out </a><br>
    <a href="../index.php">Back to Home Page </a><br>
<?php include '../templates/footer.php';?>
    
</body>
</html>