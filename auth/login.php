<?php
require "../includes/header.php";
require "../config/config.php";
?>

<?php

//check for the submit


//take the data


//write our query


// execute and then fetch


//do our rowCount


// to do our password_verifiy + redirect to index page

if (isset($_SESSION['username'])) {
    header("location: http://localhost/PHP/CMS/index.php");
}



if (isset($_POST['submit'])) {
    if ($_POST['email'] == '' or $_POST['password'] == '') {
        echo "fill login and password";
    } else {
        $email =  $_POST['email'];
        $password =  $_POST['password'];

        $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
        $login->execute();

        $row = $login->FETCH(PDO::FETCH_ASSOC);

        if ($login->rowCount() > 0) {
            if (password_verify($password, $row['mypassword'])) {


                $_SESSION['username'] = $row['username'];

                header('location: http://localhost/PHP/CMS/index.php');
            }
        }
    }
}


?>
<form method="POST" action="login.php">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

    </div>


    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />

    </div>



    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

    <!-- Register buttons -->
    <div class="text-center">
        <p>a new member? Create an acount<a href="register.php"> Register</a></p>



    </div>
</form>



<?php require "../includes/footer.php" ?>