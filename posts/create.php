<?php require "../includes/header.php";
require "../config/config.php";
?>


<?php

    $categories = $conn->query("SELECT * FROM categories");
    $categories->execute();
    $category = $categories->fetchAll(PDO::FETCH_OBJ);


if (isset($_POST['submit'])) {
    if ($_POST['title'] == '' or $_POST['subtitle'] == '' or $_POST['body'] == '' or $_POST['category_id'] == '') {
        echo 'Fill all fields before submiting!';
    } else {
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $body = $_POST['body'];
        $category_id = $_POST['category_id'];
        $img = $_FILES['img']['name'];
        $seoTitle = $_POST['seotitle'];
        $seoDesc = $_POST['seodesc'];
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['username'];


        $dir = 'images/' . basename($img);

        $insert = $conn->prepare("INSERT INTO posts (`title`, `subtitle`, `body`, `category_id`, `img`, `seotitle`, `seodesc`, `user_id`, `user_name`) VALUES (:title, :subtitle, :body, :category_id, :img, :seotitle, :seodesc, :user_id, :user_name)");

        $insert->execute([
            ':title' => $title,
            ':subtitle' => $subtitle,
            ':body' => $body,
            ':category_id' => $category_id,
            ':img' => $img,
            ':seotitle' => $seoTitle,
            ':seodesc' => $seoDesc,
            ':user_id' => $user_id,
            ':user_name' => $user_name,
        ]);

        if (move_uploaded_file($_FILES['img']['tmp_name'], $dir)) {
            header('location: http://localhost/PHP/CMS/index.php');
        }
    }
}






?>

<form method="POST" action="create.php" enctype="multipart/form-data">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />

    </div>

    <div class="form-outline mb-4">
        <input type="text" name="subtitle" id="form2Example1" class="form-control" placeholder="subtitle" />
    </div>

    <div class="form-outline mb-4">
        <textarea type="text" name="body" id="form2Example1" class="form-control" placeholder="body" rows="8"></textarea>
    </div>

    <div class="form-outline mb-4">
        <select class="form-select" name="category_id" aria-label="Default select example">
            <option selected>Category</option>
            <?php foreach($category as $cat) :  ?>
            <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>


    <div class="form-outline mb-4">
        <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
    </div>

    <div class="form-outline mb-4">
        <h2>SEO Settings</h2>
        <input type="text" name="seotitle" id="formSeoTitle" class="form-control" placeholder=" SEO Title" />
    </div>
    <div class="form-outline mb-4">
        <textarea type="text" name="seodesc" id="formSeoDesc" class="form-control" rows="3" placeholder="Meta Description"></textarea>
    </div>

    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


</form>

<h3>SERP simulator</h3>
<div id="serp-result">
<div>
    <span class="title-result"></span>
</div>
<div>
    <span class="desc-result"> </span>
</div>
</div>

<script>
const seoTitle = document.querySelector('#formSeoTitle'); 
const seoDesc = document.querySelector('#formSeoDesc'); 

const titleResult = document.querySelector('.title-result'); 
const descResult = document.querySelector('.desc-result'); 

seoTitle.addEventListener('keydown', ()=>{
    titleResult.innerHTML = seoTitle.value;
})
seoDesc.addEventListener('keydown', ()=>{
    descResult.innerHTML = seoDesc.value;
})
</script>


<?php require "../includes/footer.php" ?>