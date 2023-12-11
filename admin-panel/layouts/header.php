<?php session_start(); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
     <link href="http://localhost/PHP/CMS/admin-panel/styles/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="#">LOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
<?php if(isset($_SESSION['adminname'])) : ?> 
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link text-white" style="margin-left: 20px;" href="index.html">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admins/admins.html" style="margin-left: 20px;">Admins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categories-admins/show-categories.html" style="margin-left: 20px;">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="posts-admins/show-posts.html" style="margin-left: 20px;">Posts</a>
          </li>
          <?php endif; ?>
         <!--  <li class="nav-item">
            <a class="nav-link" href="#" style="margin-left: 20px;">Comments</a>
          </li> -->
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PHP/CMS/admin-panel/index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php if(!isset($_SESSION['adminname'])) : ?> 
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PHP/CMS/admin-panel/admins/login-admins.php">login
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php endif; ?>
          <?php if(isset($_SESSION['adminname'])) : ?> 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['adminname']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="http://localhost/PHP/CMS/admin-panel/admins/logout.php">Logout</a>
            </div>
          </li>
          <?php endif; ?>
                          
          
        </ul>
      </div>
    </div>
    </nav>
    <div class="container">