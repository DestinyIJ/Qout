<?php 
    session_start();
    
    $user = $_SESSION["user"];
    $username = $_SESSION["user"]->username;

    if(isset($_GET['username'])) {
        $username = $_GET['username'];
    }

    $page = null;
    if($_SERVER['REQUEST_URI'] == "/") {
        $page = "Home";
    } else if($_SERVER['REQUEST_URI'] == "/about") {
        $page = "About";
    } else if(str_contains($_SERVER['REQUEST_URI'], '/profile')) {
        $page = $username . " | Profile";
    } else if($_SERVER['REQUEST_URI'] == "/edit-profile") {
        $page = "Edit Profile";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qout" | <?php echo $page ?></title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</head>