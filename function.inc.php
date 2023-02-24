<?php
    function pr($arr){
        echo '<pre>';
        print_r($arr);
    }

    function prx($arr){
        echo '<pre>';
        print_r($arr);
        die();
    }

    function get_safe_value($conn, $str){
        $str=trim($str);
        if($str != ''){
            return mysqli_real_escape_string($conn, $str);
        }
    }
    function get_category_title($conn, $cat_id=''){
        $query = "select category_name from category where category_id=$cat_id";
        $result = mysqli_query($conn, $query);
        
        $row = mysqli_fetch_assoc($result);
        $string = $row['category_name'];
        
        return $string;
    }

    function get_product($conn, $type='', $limit='', $cat_id='', $product_id=''){
        $product_query = "select * from product where product_status=1 ";
        
        if($cat_id!=''){
            $product_query.="and category_id=$cat_id ";
        }
        if($product_id!=''){
            $product_query.="and product_id=$product_id ";
        }
        if($type=='latest'){
            $product_query.=" order by product_id desc";
        }
        if($limit!=''){
            $product_query.=" limit $limit";
        }
        $result = mysqli_query($conn, $product_query);
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }
?>