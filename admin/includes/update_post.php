<?php     

if(isset($_GET['p_id'])){
  $the_post_id = $_GET['p_id'];
  
}
 $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
 $select_posts_by_id = mysqli_query($connection,$query);
  while($row = mysqli_fetch_assoc($select_posts_by_id)){
  $post_id = $row['post_id'];
  $post_category_id = $row['post_category_id'];
  $post_title = $row['post_title'];
  $post_author = $row['post_author'];
  $post_date = $row['post_date'];
  $post_image = $row['post_image'];
  $post_content = $row['post_content'];
  $post_tags = $row['post_tags'];
  $post_comment_count = $row['post_comment_count'];
  $post_status = $row['post_status'];
      }
 
if(isset($_POST['update_post'])){
     $post_category_id = $_POST['post_category_id'];
     $post_title =$_POST['title'];
     $post_author = $_POST['author'];
     $post_image = $_FILES['image']['name'];
     $post_image_temp = $_FILES['image']['tmp_name'];
     $post_content = $_POST['post_content'];
     $post_tags = $_POST['post_tags'];
     $post_comment_count = $_POST['comment_count'];
     $post_date = date('d-m-y');
     $post_status = $_POST['post_status'];
     
    move_uploaded_file($post_image_temp, "../images/$post_image");
//    $query = "UPDATE posts SET 
//    post_category_id = '{$post_category_id}', 
//    post_title = '{$post_title}', 
//    post_author = '{$post_author}', 
//    post_image = '{$post_image}', 
//    post_content = '{$post_category_id}', 
//    post_tags = '{$post_content}', 
//    post_comment_count = '{$post_comment_count}' 
//    post_date = now(), 
//    post_status = '{$post_status}', 
//    WHERE post_id= {$the_post_id}";

    
    $query = "UPDATE posts SET ";
    $query .="post_category_id = '{$post_category_id}', ";
    $query .="post_title = '{$post_title}', ";
    $query .="post_author = '{$post_author}', ";
    $query .="post_image = '{$post_image}', ";
    $query .="post_content = '{$post_content}', ";
    $query .="post_tags = '{$post_tags}', ";
    $query .="post_comment_count = '{$post_comment_count}' ";
    $query .="post_date = now(), ";
    $query .="post_status = '{$post_status}' ";
    $query .='WHERE post_id= {$the_post_id} ';
    $update_post_query = mysqli_query($connection,$query);
    confirmQuery($update_post_query); 
}

?>
  
  <form action="" method="post" enctype="multipart/form-data" class="form-group">
   <div class="form-group">
    <label for="title">Category Id</label>
      <input value="<?php echo $post_category_id;?>" type="text" class="form-control" name="post_category_id">
   </div>
   <div class="form-group">
     
      <label for="title">Post Title</label>
      <input value="<?php echo $post_title;?>" type="text" class="form-control" name="title">
       <select name="post_category" id="">
        <?php
         $query = "SELECT * FROM categories";
         $select_categories = mysqli_query($connection,$query);
         confirmQuery($select_categories);
         while($row = mysqli_fetch_assoc($select_categories))
          {
          $cat_id = $row['cat_id']; 
          $cat_title  = $row['cat_title'];
           echo "<option value='{$cat_id}'>{$cat_title}</option>"; 
             
          }
         ?>
     </select>
   </div>
    
    <div class="form-group">
      <label for="title">Post Author</label>
      <input value="<?php echo $post_author;?>" type="text" class="form-control" name="author">
   </div>
   <div class="form-group">
      <label for="post_image">Post Image</label>
      <img width="100" src="../images/<?php echo $post_image ?>" alt="">
   </div>
     <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea  class="form-control" name="post_content" id="" cols="30" rows="10">
       <?php echo $post_content; ?>
        </textarea>
    
   </div>
     <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input value="<?php echo $post_tags;?>" type="text" class="form-control" name="post_tags">
   </div>
   <div class="form-group">
      <label for="post_tags">Comment Count</label>
      <input value="<?php echo $post_comment_count;?>" type="text" class="form-control" name="comment_count">
   </div>
    <div class="form-group">
      <label for="post_status">Post Status</label>
      <input value="<?php echo $post_status;?>" type="text" class="form-control" name="post_status">
   </div>
    
  
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="update_post" value="Submit Post">
      
   </div>
    
</form>