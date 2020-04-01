<?php

function getAll($tbl){
    $pdo = Database::getInstance()->getConnection();
    $queryAll = ' SELECT * FROM '.$tbl;
    $results = $pdo->query($queryAll);

    if($results){
        return $results;
    }else{
        return 'There was a problem';
    }
}


function getProductByFilter($arrays){
    $pdo = Database::getInstance()->getConnection();

    $filterQuery = 'SELECT * FROM '.$arrays['tbl'].' AS t, '.$arrays['tbl2'].' AS t2, '.$arrays['tbl3']. ' AS t3 ';
    $filterQuery .= ' WHERE t.'.$arrays['col'].' = t3.'.$arrays['col'];
    $filterQuery .= ' AND t2.'.$arrays['col2'].' = t3.'.$arrays['col2'];
    $filterQuery .= ' AND t2.'.$arrays['col3'].' = "'.$arrays['filter'].'"';

    $results = $pdo->query($filterQuery);

    // echo $filterQuery;
    // exit;

    if($results){
        return $results;
    }else{
        return ' There was some problems';
    }
}


function getSingleProduct($tbl,$col,$id){
    $pdo = Database::getInstance()->getConnection();
    $querySingle = "SELECT * FROM $tbl WHERE $col = $id";
    $results = $pdo->query($querySingle);

    if($results){
        return $results;
    }else{
        return ' There was some problems';
}
}


function searchProduct($keyword){
    $pdo           = Database::getInstance()->getConnection();
    $search_get    = " SELECT * FROM tbl_product WHERE product_title LIKE '%" . $keyword .  "%' OR product_price LIKE '%" . $keyword ."%' OR product_rate LIKE '%" . $keyword ."%' OR product_description LIKE '%" . $keyword ."%'";
    $search_result = $pdo->query($search_get);
    // var_dump($search_result);
    // exit;
    
    if($search_result){
        return $search_result;
    }else{
        return 'The product does not exist!';
    }

}


function getColumn($tbl){
    $pdo = Database::getInstance()->getConnection();
    $queryColumn = ' SELECT COUNT(*) FROM '.$tbl;
    $results = $pdo->query($queryColumn);

    if($results){
        return $results;
    }else{
        return 'There was a problem';
    }
}