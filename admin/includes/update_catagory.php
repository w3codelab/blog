      <form action="" method="post">
                            <div class="form-group" >
                               <label for="cat-title">Update Catagories </label>
                               <?php
                                if(isset($_GET['update'])){
                                    $cat_id = $_GET['update'];
                                    $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                                    $update_categories = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($update_categories))
                                    {
                                    $cat_id = $row['cat_id']; 
                                    $cat_title  = $row['cat_title'];
                                ?>
                                 <input value="<?php if(isset($cat_title)){echo $cat_title; } ?>" class="form-control" type="text" name="cat_title" >  
                               <?php } } ?>
                               
                                
                               <?php ///////////Update Query
                                if(isset($_POST['update_catagory'])){
                                    $the_cat_title = $_POST['cat_title'];
                                    $query = "UPDATE  categories SET cat_title= '{$the_cat_title }' WHERE cat_id = {$cat_id} ";
                                    $update_category_query = mysqli_query($connection,$query);
                                 if(!$update_category_query){
                                     die("Quary Failed" . mysqli_error($connection));
                                 }
    
                                }   
                                
                                ?>
                               
                               
                               
                                
                            </div>
                            <div class="form-group" >
                                <input class="btn btn-primary" type="submit" name="update_catagory" value="Update Catagory" >
                            </div>
                             
                         </form>