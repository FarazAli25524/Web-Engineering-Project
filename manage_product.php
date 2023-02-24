<?php
    require('top.inc.php');
    $product_name='';
    $product_mrp='';
    $product_price='';
    $product_stock='';
    $product_shortdesc='';
    $product_longdesc='';
    $product_metatitle='';
    $product_metadesc='';
    $product_metakeyword='';
    $category_id='';
    $msg='';
    $id='';
    $image_required='required';
    if(isset($_GET['id']) && $_GET['id'] != ''){
      $image_required = ''; 
      $id = get_safe_value($conn, $_GET['id']);
      $result = mysqli_query($conn, "select * from product where product_id='$id'");
      $check=mysqli_num_rows($result);
      if($check > 0){
         $row = mysqli_fetch_assoc($result);
         $product_name=$row['product_name'];
         $product_mrp=$row['product_mrp'];
         $product_price=$row['product_price'];
         $product_stock=$row['product_stock'];
         $product_shortdesc=$row['product_shortdesc'];
         $product_longdesc=$row['product_longdesc'];
         $product_metatitle=$row['product_metatitle'];
         $product_metadesc=$row['product_metadesc'];
         $product_metakeyword=$row['product_metakeyword'];
         $category_id=$row['category_id'];
      }
      else{
         header('location: product.php');
         die();
      }
    }

    if(isset($_POST['submit'])){
      $product_name = get_safe_value($conn, $_POST['products_name']);
      $product_mrp = get_safe_value($conn, $_POST['products_mrp']);
      $product_price = get_safe_value($conn, $_POST['products_price']);
      $product_stock = get_safe_value($conn, $_POST['products_stock']);
      $product_shortdesc = get_safe_value($conn, $_POST['products_shortdesc']);
      $product_longdesc = get_safe_value($conn, $_POST['products_longdesc']);
      $product_metatitle = get_safe_value($conn, $_POST['products_metatitle']);
      $product_metadesc = get_safe_value($conn, $_POST['products_metadesc']);
      $product_metakeyword = get_safe_value($conn, $_POST['products_metakeyword']);
      $category_id = get_safe_value($conn, $_POST['category_id']);
      $result = mysqli_query($conn, "select * from product where product_name='$product_name'");
      $check=mysqli_num_rows($result);

      if($check > 0){
        
         if(isset($_GET['id']) && $_GET['id'] != ''){
            $getData = mysqli_fetch_assoc($result);
            if($id==$getData['id']){
                header('location: product.php');
                die();
            }else{
               $msg = "Product already exsist";
            }
         }
         else{
            $msg = "Product already exsist";
         }
      }
      
      if($_FILES['image']['type'] != '' && ($_FILES['image']['type'] != 'image/png' || $_FILES['image']['type'] != 'image/jpg' || $_FILES['image']['type'] != 'image/jped' || $_FILES['image']['type'] != 'image/webp')){
        $msg="Image format* png, jpeg, jpg, webp";
      }

      if($msg==''){
         if(isset($_GET['id']) && $_GET['id'] != ''){
            if($_FILES['image']['name'] != ''){
            $image = rand(101,909).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "Product/".$image);
            $update_image = "update product set product_name='$product_name', product_mrp='$product_mrp',
            product_price='$product_price', product_stock='$product_stock', product_image='$image',product_shortdesc='$product_shortdesc',
            product_longdesc='$product_longdesc', product_status='1', product_metatitle='$product_metatitle', product_metadesc='$product_metadesc',
            product_metakeyword='$product_metakeyword', category_id='$category_id' where product_id='$id'";
        }else{
            $update_image = "update product set product_name='$product_name', product_mrp='$product_mrp',
            product_price='$product_price', product_stock='$product_stock',product_shortdesc='$product_shortdesc',
            product_longdesc='$product_longdesc', product_status='1', product_metatitle='$product_metatitle', product_metadesc='$product_metadesc',
            product_metakeyword='$product_metakeyword', category_id='$category_id' where product_id='$id'";
        }
            $query =  mysqli_query($conn, $update_image);
         }
         else{
            $image = rand(101,909).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "Product/".$image);
            $query =  mysqli_query($conn, "insert into product
             (product_name, product_mrp, product_price, product_stock, product_image, product_shortdesc,
              product_longdesc, product_status, product_metatitle, product_metadesc, product_metakeyword,
              category_id) values ('$product_name', '$product_mrp', '$product_price', '$product_stock', '$image',
              '$product_shortdesc', '$product_longdesc', '1' , '$product_metatitle', '$product_metadesc', '$product_metakeyword', '$category_id')");
         } 
         header('location: product.php');
         die();
      }
    }

?>
   <div class="content pb-0">
      <div class="animated fadeIn">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header"><strong>Manage Product</strong></div>
                     <div class="card-body card-block">
                        <div class="form-group container">
                           <form action="" method="POST" enctype="multipart/form-data">
                              <label for="product" class=" form-control-label">Name</label>
                              <input type="text" name="products_name" id="product" placeholder="Product Name" class="form-control" value="<?php echo $product_name; ?>" required>
                              <label for="product" class=" form-control-label">MRP</label>
                              <input type="text" name="products_mrp" id="product" placeholder="Product MRP" class="form-control" value="<?php echo $product_mrp; ?>" required>
                              <label for="product" class=" form-control-label">Price</label>
                              <input type="text" name="products_price" id="product" placeholder="Product Price" class="form-control" value="<?php echo $product_price; ?>" required>
                              <label for="product" class=" form-control-label">Stock</label>
                              <input type="text" name="products_stock" id="product" placeholder="Product Quantity" class="form-control" value="<?php echo $product_stock; ?>" required>
                              <label for="product" class=" form-control-label">Image</label>
                              <input type="file" name="image" id="product" placeholder="Select Image" class="form-control"  <?php echo $image_required; ?>>
                              <label for="product" class=" form-control-label">Short Description</label>
                              <textarea type="text" name="products_shortdesc" id="product" placeholder="Product Short Description" class="form-control" required><?php echo $product_shortdesc; ?></textarea>
                              <label for="product" class=" form-control-label">Description</label>
                              <textarea type="text" name="products_longdesc" id="product" placeholder="Product Description" class="form-control" required><?php echo $product_longdesc; ?></textarea>
                              <label for="product" class=" form-control-label">Meta Title</label>
                              <textarea type="text" name="products_metatitle" id="product" placeholder="Product Meta Title" class="form-control" required><?php echo $product_metatitle; ?></textarea>
                              <label for="product" class=" form-control-label">Meta Description</label>
                              <textarea type="text" name="products_metadesc" id="product" placeholder="Product Meta Description" class="form-control" required><?php echo $product_metadesc; ?></textarea>
                              <label for="product" class=" form-control-label">Meta Keyword</label>
                              <textarea type="text" name="products_metakeyword" id="product" placeholder="Product Meta Keyword" class="form-control" required><?php echo $product_metakeyword; ?></textarea>
                             
                              <label for="category_product" class=" form-control-label">Category</label>
                              <select name="category_id" id="category_product" class="form-control">
                                <option >Select Category</option>
                                <?php 
                                    $res = mysqli_query($conn, "select category_id, category_name from category order by category_name asc");
                                    while($row=mysqli_fetch_assoc($res)){
                                        if($row['category_id']==$category_id){
                                            echo "<option selected value=".$row['category_id'].">".$row['category_name']."</option>";    
                                        }
                                        else{
                                            echo "<option value=".$row['category_id'].">".$row['category_name']."</option>";
                                        }    
                                    }
                                ?>
                              </select>
                              <?php echo $msg; ?>
                              <button type="submit" name="submit" class="btn btn-lg btn-info btn-block"><span>Insert</span></button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

<?php require('footer.inc.php');?>
