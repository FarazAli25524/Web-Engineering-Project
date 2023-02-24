<?php
    require('top.inc.php');
    $category='';
    $msg='';
    if(isset($_GET['id']) && $_GET['id'] != ''){
      $id = get_safe_value($conn, $_GET['id']);
      $result = mysqli_query($conn, "select * from category where category_id='$id'");
      $check=mysqli_num_rows($result);
      if($check > 0){
         $row = mysqli_fetch_assoc($result);
         $category=$row['category_name'];
      }
      else{
         header('location: categories.php');
         die();
      }
    }

    if(isset($_POST['submit'])){
      $category = get_safe_value($conn, $_POST['categories_name']);
      $result = mysqli_query($conn, "select * from category where category_name='$category'");
      $check=mysqli_num_rows($result);

      if($check > 0){
         if(isset($_GET['id']) && $_GET['id'] != ''){
            $getData = mysqli_fetch_assoc($result);
            if($id==$getData['id']){

            }else{
               $msg = "Category already exsist";
            }
         }
         else{
            $msg = "Category already exsist";
         }
      }
      
      if($msg==''){
         if(isset($_GET['id']) && $_GET['id'] != ''){
            $query =  mysqli_query($conn, "update category set category_name='$category' where category_id='$id'");
         }
         else{
            $query =  mysqli_query($conn, "insert into category (category_name, category_status) values ('$category', '0')");
         }
         header('location: categories.php');
         die();
      }
    }

?>
   <div class="content pb-0">
      <div class="animated fadeIn">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header"><strong>Manage Categories</strong></div>
                     <div class="card-body card-block">
                        <div class="form-group container">
                           <form action="" method="POST">
                              <label for="category" class=" form-control-label">Categories</label>
                              <input type="text" name="categories_name" id="category" placeholder="Category Name" class="form-control" value="<?php echo $category; ?>" required>
                              <label for="category" class=" form-control-label">Title</label>
                              <input type="text" name="categories_title" id="category" placeholder="Category Title (Optional)" class="form-control">
                              <label for="category" class=" form-control-label">Description</label>
                              <input type="text" name="categories_description" id="category" placeholder="Category Discription (Optional)" class="form-control">
                              <label for="category" class=" form-control-label">Meta Discription</label>
                              <input type="text" name="categories_meta_discription" id="category" placeholder="Category Meta Discription (Optional)" class="form-control">
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
