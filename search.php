<?php
require_once 'load.php';


if(isset($_GET['keyword'])){
     $keyword = $_GET['keyword'];
     $result  = searchProduct($keyword);
    //  var_dump($result);
    //  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Sport Check - Search</title>
</head>
<body>
    <h1>Search Result<h1>

    <?php include 'templates/header.php';?>

    <form method="get" action="search.php">
        <input type="text" name="keyword" placeholder="Search your product..." autocomplete="off">
        <button type="submit" name="sumbit">Search!</button>
    </form>


    <?php while($results = $result->fetch(PDO::FETCH_ASSOC)):?>
    <div class="product-item">
        <img src="images/<?php echo $results['product_cover']; ?>" alt="<?php echo $results['product_title'];?>" width="200px"/>
        <h2><?php echo $results['product_title'];?></h2>
        <h4>Price: <?php echo $results['product_price'];?></h4>
        <a href="detail.php?id=<?php echo $results['product_id'];?>">Get More</a>     
    </div>
<?php endwhile;?>
<?php include 'templates/footer.php';?>
</body>
</html>

