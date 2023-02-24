<?php
    require('top.inc.php');
    
    if(isset($_GET['type']) && $_GET['type'] != ""){
        $type = get_safe_value($conn, $_GET['type']);
        if($type == 'status'){
            $operation = get_safe_value($conn, $_GET['operation']);
            $id = get_safe_value($conn, $_GET['id']);
            if($operation == 'active'){
                $status='1';
            }
            else{
                $status='0';
            }
            $update_status = "update product set product_status='$status' where product_id='$id'";
            mysqli_query($conn, $update_status);
        }

        if($type == 'delete'){
            $id = get_safe_value($conn, $_GET['id']);
            $delete_status = "delete from product where product_id='$id'";
            mysqli_query($conn, $delete_status);
        }
    }
    
    $query = "select product.*, category.category_name from product, category where product.category_id = category.category_id order by product_name asc";
    $result = mysqli_query($conn, $query);
    
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Products<a class="btn float-right" href="manage_product.php">Manage Product</a></h4>
                           
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ID</th>
                                       <th>Image</th>
                                       <th>Name</th>
                                       <th>Category</th>
                                       <th>MRP</th>
                                       <th>PRICE</th>
                                       <th>QTY</th>
                                       <th>Status / Edit / Delete</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $i = 1;
                                     while($row=mysqli_fetch_assoc($result)){
                                     ?>
                                    <tr>
                                       <td class="serial"><?php echo $i++;  ?></td>
                                       <td><?php echo $row['product_id']?></td>
                                       <td> <img src="Product/<?php echo $row['product_image']?>"/> </td>
                                       <td><?php echo $row['product_name']?></td>
                                       <td><?php echo $row['category_name']?></td>
                                       <td><?php echo $row['product_mrp']?></td>
                                       <td><?php echo $row['product_price']?></td>
                                       <td><?php echo $row['product_stock']?></td>
                                       <td><?php
                                        if($row['product_status']==1){
                                            echo "<a class='btn btn-sm' href='?type=status&operation=deactive&id=". $row['product_id'] . "'>&nbsp&nbsp Active &nbsp</a>";
                                        }
                                        else{
                                            echo "<a class='btn btn-sm' href='?type=status&operation=active&id=". $row['product_id'] . "'>Deactive</a>";
                                        }
                                        echo "<a class='btn btn-sm ml-3' href='manage_product.php?id=". $row['product_id'] . "'>Edit</a>";
                                        echo "<a class='btn btn-sm ml-3' href='?type=delete&id=". $row['product_id'] . "'>Delete</a>";
                                        ?></td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php require('footer.inc.php');?>
 