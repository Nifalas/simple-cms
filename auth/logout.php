<?php


session_start();
session_unset();
session_destroy();

header("location: http://localhost/PHP/CMS/index.php");
