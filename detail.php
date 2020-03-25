<?php
require_once 'load.php';

if(isset($_GET['id'])){
    $id       = $_GET['id'];
    $tbl      = 'tbl_product';
    $col      = 'product_id';
    $getItem  = getSingleProduct($tbl,$col,$id);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Sport Check - Product</title>
</head>
<body>
    <?php include 'templates/header.php';?>
    <?php if(!is_string($getItem)):?>
        <?php while($row = $getItem->fetch(PDO::FETCH_ASSOC)):?>
            <image src="images/<?php echo $row['product_cover'];?>" alt="<?php echo $row['product_title'];?>">
            <h2>Product:<?php echo $row['product_title'];?></h2>
            <h4>Price: <?php echo $row['product_price'];?> </h4>
            <p> Detail: <?php echo $row['product_description'];?> </p>
            <p> Rate: <?php echo $row['product_rate'];?></p>
            <a href="index.php">Back</a>
        <?php endwhile;?>
    <?php endif;?>
    <?php include 'templates/footer.php';?>
</body>
</html>