<?php
require_once '../load.php';
confirm_logged_in();

$category_table = 'tbl_categories';
$getCategory = getAll($category_table);

if(isset($_POST['submit'])){
    $product =  array(
        'cover'       => $_FILES['cover'],
        'title'       => trim($_POST['title']),
        'price'       => trim($_POST['price']),
        'rate'        => trim($_POST['rate']),
        'description' => trim($_POST['description']),
        'category'    => trim($_POST['cateList']),
    );
    $result  = addProduct($product);
    $message = $result;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Add Product</title>
</head>
<body>
<a href="admin.php">Back to Admin</a>
<h2>Add Content</h2>
<?php echo !empty($message)?$message:'';?>
    <form action="admin_addcontent.php" method="post" enctype="multipart/form-data">
        <label>Product Image:</label><br>
        <input type="file" name="cover" value=""><br><br>

        <label>Product Name:</label><br>
        <input type="text" name="title" value=""><br><br>

        <label>Product Price:</label><br>
        <input type="text" name="price" value=""><br><br>

        <label>Product Rate</label><br>
        <input type="text" name="rate" value=""><br><br>

        <label>Product Description:</label><br>
        <textarea name="description"></textarea><br><br>

        <label>Product Category:</label><br>
        <select name="cateList">
            <option>Please select a product category...</option>
            <?php while($categories = $getCategory->fetch(PDO::FETCH_ASSOC)):?>
            <option value="<?php echo $categories['category_id'];?>"><?php echo $categories['category_name'];?></option>
            <?php endwhile;?>
        </select><br><br>

        <button type="submit" name="submit">Add Product</button>

    </form>
    <?php include '../templates/footer.php';?>
</body>
</html>