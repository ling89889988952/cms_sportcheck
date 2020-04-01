<?php

function addProduct($product){
    // var_dump($product);
    // exit;
    try{
    $pdo = Database::getInstance()->getConnection();
    $cover          = $product['cover'];
    $upload_file    = pathinfo($cover['name']);
    $accepted_types = array('gif', 'jpg', 'jpe', 'png', 'jpeg', 'webp');
    if (!in_array($upload_file['extension'], $accepted_types)) {
        throw new Exception('wrong file type!');
    }

    $image_path = '../images/';

    $generated_name     = md5($upload_file['filename'] . time());
    $generated_filename = $generated_name . '.' . $upload_file['extension'];
    $targetpath         = $image_path . $generated_filename;

    if (!move_uploaded_file($cover['tmp_name'], $targetpath)) {
        throw new Exception('Failed to move uploaded file, check permission!');
    }


    // *** Optional *** 1hr - couple hours
    // If the upload file is a image, covert it to WebP

    $insert_product_query  = 'INSERT INTO  tbl_product (product_cover, product_title, product_price, product_description, product_rate)';
    $insert_product_query .= ' VALUE(:product_cover, :product_title, :product_price, :product_description, :product_rate)';

    $insert_product = $pdo->prepare($insert_product_query);
    $insert_product_result = $insert_product ->execute(
        array(
            ':product_cover'         => $generated_filename ,
            ':product_title'         => $product['title'],
            ':product_price'         => $product['price'],
            ':product_description'   => $product['description'],
            ':product_rate'          => $product['rate'],
            )
        );

        $last_uploaded_id = $pdo->lastInsertId();
        if ($insert_product_result && !empty($last_uploaded_id)) {
            $update_category_query = 'INSERT INTO tbl_procate(product_id, category_id) VALUES(:product_id, :category_id)';
            $update_category       = $pdo->prepare($update_category_query);

            $update_category_result = $update_category ->execute(
                array(
                    ':product_id' => $last_uploaded_id,
                    ':category_id'  => $product['category'],
                    )
                );   
        }
    // 5.If all of above works, redirect user to index.php
    redirect_to('admin.php');
    // Otherwise, return some error message
    }catch(Exception $e){
        $error = $e->getMessage();
        return $error;
    }
    
}

function showProduct($product_id){
        $pdo = Database::getInstance()->getConnection();
        $querySingle = "SELECT * FROM tbl_product p, tbl_categories c, tbl_procate h WHERE p.product_id = h.product_id AND c.category_id = h.category_id AND p.product_id = $product_id";
        $get_product_result = $pdo->query($querySingle);
        // var_dump($get_product_result);
        //  exit;            
    
        if($get_product_result ){
            // TODO: if the execute is successful, return the product data
            // Otherwise, return an error messages
            
            return $get_product_result;
            
    
        }else{
            return  "There have some problem";
        
        }
}

function editDetail($product_image,$product_edit,$product_id){
    $pdo = Database::getInstance()->getConnection();

    $update_detail_data   = 'UPDATE tbl_product SET product_cover =:cover, product_title=:title, product_price=:price, product_description=:description, product_rate=:rate WHERE product_id =:id';
    $update_detail_set    = $pdo->prepare($update_detail_data);
    $update_detail_result = $update_detail_set->execute(
                array(
                    ':cover'         => $product_image,
                    ':title'         => $product_edit['title'],
                    ':price'         => $product_edit['price'],
                    ':description'   => $product_edit['description'],
                    ':rate'          => $product_edit['rate'],
                    'id'             => $product_id,
                    )
                );
    
                if($update_detail_result){

                    $update_category     = 'UPDATE tbl_procate SET category_id =:category WHERE product_id =:id';
                    $update_category_set = $pdo->prepare($update_category);
        
                    $update_category_result = $update_category_set ->execute(
                        array(
                            'id'         => $product_id,
                            ':category'  => $product_edit['category'],
                            )
                        );   

                        if($update_category_result){
                            redirect_to('admin_edit.php');
                        }else{
                            return 'The category can not be update';
                        }
                }else{
                    return 'error';
                }


}


function editProduct($product_image,$product_edit,$product_id){
    // var_dump($product_image);
    // exit;
    try{
        $pdo = Database::getInstance()->getConnection();
        $cover          = $product_image;
        $upload_file    = pathinfo($cover['name']);
        $accepted_types = array('gif', 'jpg', 'jpe', 'png', 'jpeg', 'webp');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('wrong file type!');
        }

        $image_path = '../images/';

        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $targetpath         = $image_path . $generated_filename;

        if (!move_uploaded_file($cover['tmp_name'], $targetpath)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        $update_product_detail  = 'UPDATE tbl_product SET product_cover =:cover, product_title=:title, product_price=:price, product_description=:description, product_rate=:rate WHERE product_id =:id';
        $update_product_set     = $pdo->prepare($update_product_detail);
        $update_product_result  = $update_product_set  ->execute(
            array(
                ':cover'         => $generated_filename ,
                ':title'         => $product_edit['title'],
                ':price'         => $product_edit['price'],
                ':description'   => $product_edit['description'],
                ':rate'          => $product_edit['rate'],
                ':id'            => $product_id,

                )
            );

        if($update_product_result){
            $update_category     = 'UPDATE tbl_procate SET category_id =:category WHERE product_id =:id';
            $update_category_set = $pdo->prepare($update_category);

            $update_category_result = $update_category_set ->execute(
                array(
                    'id'         => $product_id,
                    ':category'  => $product_edit['category'],
                    )
                );   

                if($update_category_result){
                    redirect_to('admin_edit.php');
                }else{
                    return 'Please choose the category';
                }
        }
        }catch(Exception $e){
            $error = $e->getMessage();
            return $error;
        }
    
}


function deleteProduct($product_id){
        // TODO: finish the function to delete the given user
        $pdo = Database::getInstance()->getConnection();
        $delete = 'DELETE FROM tbl_product WHERE product_id = :product_id';
        $deleteProduct = $pdo->prepare($delete);
        $delete_Product_Result = $deleteProduct  ->execute(
                        array(
                            ':product_id' =>$product_id,
                        )
                        );
        
        if($delete_Product_Result && $deleteProduct->rowCount() > 0){
            $delete_category = 'DELETE FROM tbl_procate WHERE product_id = :product_id';
            $delete_category_set = $pdo->prepare($delete_category);
            $delete_category_result  = $delete_category_set -> execute(
                array(
                    ':product_id' =>$product_id,
                )
                );

                if($delete_category_result){

            redirect_to('admin_edit.php');
                }else{
                    return 'The category can not be delete';
                }
        }else{
            return ' ERROE';
        }
}



