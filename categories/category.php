<?php
require "../includes/header.php";
require "../config/config.php";

?>


<?php 

if(isset($_GET['cat_id'])){
    $id = $_GET['cat_id'];

    $posts = $conn->query("SELECT posts.id AS id, posts.title AS title, posts.subtitle AS subtitle, posts.user_name AS user_name, posts.created_at AS created_at, posts.category_id AS category_id FROM `categories` JOIN `posts` ON categories.id = posts.category_id 
WHERE posts.category_id = '$id'");
$posts->execute();
$rows = $posts->fetchAll(PDO::FETCH_OBJ);
}
else{
    echo '404';
}




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




<?php
require "../includes/footer.php";

?>