<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>



<?php
    $posts = $conn->query("SELECT posts.id AS id, posts.title AS title, posts.user_name AS user_name, categories.name AS name, posts.status AS status FROM `categories` JOIN `posts` ON categories.id = posts.category_id");
    $posts->execute();
    $rows = $posts->fetchAll(PDO::FETCH_OBJ);
?>



          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Posts</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">category</th>
                    <th scope="col">user</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                    <th scope="col">See post</th>
                  </tr>
                </thead>
                <tbody>
<?php  foreach($rows as $row): ?>
                  <tr>
                    <th scope="row"><?php echo $row->id; ?></th>
                    <td><?php echo $row->title; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->user_name; ?></td>
                    <?php if($row->status == 0):  ?>
                     <td><a href="status-posts.php?status=<?php echo $row->status; ?>&id=<?php echo $row->id; ?>" class="btn btn-danger text-center ">Hidden</a></td>
                     <?php else: ?>
                      <td><a href="status-posts.php?status=<?php echo $row->status; ?>&id=<?php echo $row->id; ?>" class="btn btn-succes text-center ">Active</a></td>
                      <?php endif; ?>


                     <td><a href="delete-posts.php?po_id=<?php echo $row->id; ?>" class="btn btn-danger  text-center ">delete</a></td>
                     <td><a href="http://localhost/PHP/CMS/posts/post.php?post_id=<?php echo $row->id; ?>" class="btn btn-info  text-center ">Go to</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



  </div>
  <?php require "../layouts/footer.php"; ?>