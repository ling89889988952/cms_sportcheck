<?php
require_once '../load.php';
confirm_logged_in();

$product_table ='tbl_product';
$getProduct =  getAll($product_table);
// $getColumn  =  getColumn($product_table);

// $getColumn_Reslut = $getColumn ->fetchColumn();


if(!$getProduct){
    $message = 'Failed to get the content';
} 


if(isset($_GET['id'])){
    $product_id = $_GET['id'];

    if($product_id){
        $delete_product = deleteProduct($product_id);

        if(!$delete_product){
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
    <title>Content Management</title>
</head>
<body>
    <a href="admin_addcontent.php">Add Content</a><br>
    <a href="admin.php">Back to Admin</a>
    <h2>Content Management</h2>
    <?php echo !empty($message)? $message:'';?>
    <table>
    <form action="admin_edit.php" method="POST">
        <thead>
            <tr>
                <th>Product_id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Rate</th>
                <th>Description</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
        <?php while($products = $getProduct->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $products['product_id'];?></td>
                <td><img src="../images/<?php echo $products['product_cover'];?>" alt="product picture" width="200px"></td>
                <td><?php echo $products['product_title'];?></td>
                <td><?php echo $products['product_price'];?></td>
                <td><?php echo $products['product_rate'];?></td>
                <td><?php echo $products['product_description'];?></td>
                <td><button><a href="admin_update.php?id=<?php echo $products['product_id'];?>">Update</a></button></td>
                <td><button><a href="admin_edit.php?id=<?php echo$products['product_id'];?>">Delete</a></button></td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>
    <?php include '../templates/footer.php';?>
</body>
</html>