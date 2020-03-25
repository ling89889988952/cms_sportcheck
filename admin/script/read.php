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