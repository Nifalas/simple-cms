<?php require "layouts/header.php"; ?>
<?php require "../config/config.php"; ?>

     <?php
     if (!isset($_SESSION['adminname'])) {
      header("location:http://localhost/PHP/CMS/admin-panel/admins/login-admins.php");
    }
     
    //admins number 
    $select_admins = $conn->query("SELECT COUNT(*) AS  admins_numbers FROM admins");
    $select_admins->execute();
    $admins = $select_admins->fetch(PDO::FETCH_OBJ); 

    // categories
    $select_cat = $conn->query("SELECT COUNT(*) AS  categories_numbers FROM categories");
    $select_cat->execute();
    $categories = $select_cat->fetch(PDO::FETCH_OBJ); 
    // posts
    $select_posts = $conn->query("SELECT COUNT(*) AS  posts_numbers FROM posts");
    $select_posts->execute();
    $posts = $select_posts->fetch(PDO::FETCH_OBJ); 


     ?>       
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Posts</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of posts: <?php echo $posts->posts_numbers; ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $categories->categories_numbers; ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $admins->admins_numbers; ?></p>
              
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->

<?php require "layouts/footer.php"; ?>