<?php
    require('top.inc.php');
    
    if(isset($_GET['type']) && $_GET['type'] != ""){
        $type = get_safe_value($conn, $_GET['type']);
        
        if($type == 'delete'){
            $id = get_safe_value($conn, $_GET['id']);
            $delete_status = "delete from user where user_id='$id'";
            mysqli_query($conn, $delete_status);
        }
    }
    
    $query = "select * from user order by user_name asc";
    $result = mysqli_query($conn, $query);
    
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Users</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Password</th>
                                       <th>Mobile Number</th>
                                       <th>Registration</th>
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
                                       <td><?php echo $row['user_id']?></td>
                                       <td><?php echo $row['user_name']?></td>
                                       <td><?php echo $row['user_email']?></td>
                                       <td><?php echo $row['user_password']?></td>
                                       <td><?php echo $row['user_mobile']?></td>
                                       <td><?php echo $row['user_added_on']?></td>
                                       <td><?php
                                        echo "<a class='btn btn-sm ml-3' href='?type=delete&id=". $row['user_id'] . "'>Delete</a>";
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
