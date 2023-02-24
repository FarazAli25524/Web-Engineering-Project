<?php
    require('top.inc.php');
    
    if(isset($_GET['type']) && $_GET['type'] != ""){
        $type = get_safe_value($conn, $_GET['type']);
        
        if($type == 'delete'){
            $id = get_safe_value($conn, $_GET['id']);
            $delete_status = "delete from orders where orders_id='$id'";
            mysqli_query($conn, $delete_status);
        }
    }
    
    $query = "select * from orders order by orders_name asc";
    $result = mysqli_query($conn, $query);
    
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Orders</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ID</th>
                                       <th>Name</th>
                                       <th>Order Placing Date</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $i = 1;
                                     while($row=mysqli_fetch_assoc($result)){
                                     ?>
                                    <tr>
                                       <td class="serial"><?php echo $i++;  ?></td>
                                       <td><?php echo $row['orders_id']?></td>
                                       <td><?php echo $row['orders_name']?></td>                                   
                                       <td><?php echo $row['orders_added_on']?></td>
                                       <td><?php
                                        echo "<a class='btn btn-sm ml-3' href='?type=delete&id=". $row['orders_id'] . "'>Delete</a>";
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
