<?php
require_once 'load.php';

if(isset($_GET['filter'])){
    $arrays  = array(
        'tbl'    => 'tbl_product',
        'tbl2'   => 'tbl_categories',
        'tbl3'   => 'tbl_procate',
        'col'    => 'product_id',
        'col2'   => 'category_id',
        'col3'    => 'category_name',
        'filter' =>  $_GET['filter']
    );
    $getProducts  = getProductByFilter($arrays);
}else{
    $product_table = 'tbl_product';
    $getProducts   = getAll($product_table);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Sport Check</title>
</head>
<body>
    <h1>Welcome to Sport Check<h1>
    <?php include 'templates/header.php';?>
    <form method="get" action="search.php">
        <input type="text" name="keyword" placeholder="Search your product..." autocomplete="off">
        <button type="submit" name="sumbit">Search!</button>
    </form>

    <?php while($row = $getProducts->fetch(PDO::FETCH_ASSOC)):?>
    <div class="product-item">
            <img src="images/<?php echo $row['product_cover']; ?>" alt="<?php echo $row['product_title'];?>" width="300px"/>
            <h2><?php echo $row['product_title'];?></h2>
            <h4>Price: <?php echo $row['product_price'];?></h4>
            <a href="detail.php?id=<?php echo $row['product_id'];?>">Get More</a>     
        </div>
    <?php endwhile;?>
    <?php include 'templates/footer.php';?>
</body>
</html>