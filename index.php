<?php
require "../CMS/includes/header.php";
require "../CMS/config/config.php";

?>

<?php

$posts = $conn->query("SELECT * FROM posts");
$posts->execute();
$rows = $posts->fetchAll(PDO::FETCH_OBJ);


$categories = $conn->query("SELECT * FROM categories");
$categories->execute();
$category = $categories->fetchAll(PDO::FETCH_OBJ);


?>

<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">

        <?php foreach ($rows as $row) : ?>
            <!-- Post preview-->
            <div class="post-preview">
                <!-- <img src="http://localhost/PHP/CMS/posts/images/<?php # echo $row->img 
                                                                        ?>" alt=""> -->
                <a href="http://localhost/PHP/CMS/posts/post.php?post_id=<?php echo $row->id ?>">
                    <h2 class="post-title"><?php echo $row->title ?></h2>
                </a>
                <h3 class="post-subtitle"><?php echo $row->subtitle ?></h3>

                <p class="post-meta">
                    Posted by
                    <a href="#!"><?php echo $row->user_name ?></a>
                    on <?php echo  date('d', strtotime($row->created_at)) . ' ' . date('M', strtotime($row->created_at))  . ', ' . date('Y', strtotime($row->created_at)); ?>
                    <!-- Set date to day/month/year -->
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
        <?php endforeach; ?>
        <!-- Pager-->



    </div>
</div>

<div class="row gx-4 gx-lg-5 justify-content-center">   

<p style="font-size:1.5em;font-weight:bold;">Categories</p>
<?php foreach ($category as $cat) : ?>

    <div class="col-md-6">
    <a href="http://localhost/PHP/CMS/categories/category.php?cat_id=<?php echo $cat->id ?>">
        <div class="alert alert-dark bg-dark text-center text-white" role="alert">
              <?php echo $cat->name; ?>
        </div>
        </a> 
    </div>

<?php endforeach; ?>
</div>

<?php
require "../CMS/includes/footer.php";

?>