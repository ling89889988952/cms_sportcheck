<?php

require_once '../load.php';

confirm_logged_in();
$id   = $_SESSION['user_id'];

$category_table = 'tbl_categories';
$getCategory = getAll($category_table);

$show_product = showProduct($_GET['id']);
$productinfo = $show_product ->fetch(PDO::FETCH_ASSOC);


if(isset($_POST['submit'])){
    $image  = $_FILES['cover'];
    $product_edit =  array(
        'title'       => trim($_POST['title']),
        'price'       => trim($_POST['price']),
        'rate'        => trim($_POST['rate']),
        'description' => trim($_POST['description']),
        'category'    => trim($_POST['cateList']),
    );
    
    $product_id = $_GET['id'];

    if($image['error'] == 4){
        $product_image = $productinfo['product_cover'];
        $result  = editDetail($product_image,$product_edit,$product_id);

    }else{
        $product_image = $_FILES['cover'];
        $result  = editProduct($product_image,$product_edit,$product_id);
    }

    $message = $result;
    
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Edit Product</title>
</head>
<body>
    <a href="admin_edit.php">Back to Content Mangement </a><br>
    <h2>Edit Product</h2>
    <?php echo !empty($message)? $message:'';?>
        <form action="admin_update.php?id=<?php echo $productinfo['product_id'];?>" method="post" enctype="multipart/form-data">
            <lable>ID:</label>
            <input type="text" name="id" value="<?php echo $productinfo['product_id'];?>" readonly><br><br>

            <img src="../images/<?php echo $productinfo['product_cover'];?>" alt="product image" width="50%"><br>
            <label>Change Image: </label>
            <input type="file" name="cover" value=""><br><br>

            <label>Name: </label>
            <input type="text" name="title" value="<?php echo $productinfo['product_title'];?>" style="width:50%"><br><br>

            <label>Product Category:</label><br>
            <select name="cateList">
            <option>Please select the product's category</option>
            <?php while($categories = $getCategory->fetch(PDO::FETCH_ASSOC)):?>
            <option value="<?php echo $categories['category_id'];?>"><?php echo $categories['category_name'];?></option>
            <?php endwhile;?>
        </select><br><br>

            <label>Price: </label>
            <input type="text" name="price" value="<?php echo $productinfo['product_price'];?>"><br><br>

            <label>Rate: </label>
            <input type="text" name="rate" value="<?php echo $productinfo['product_rate'];?>"><br><br>

            <label>Description: </label>
            <textarea type="text" name="description"><?php echo $productinfo['product_description'];?></textarea><br><br>

            <button type="submit" name="submit">Edit Account</button>
        </form>
</body>
</html>
