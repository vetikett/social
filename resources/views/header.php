<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Social site</title>
    <link href="http://localhost/social/css/stylesheet.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="http://localhost/social/js/functions.js"></script>
</head>
<body>
<div id="wrapper">
<header>
    <?php
    if (!empty($_SESSION['user'])) {
    $inlogged_user = $_SESSION['user'];
    ?>
        <ul class="ulleft">
            <a href="http://localhost/social/status/"><li>Quone</li></a>
        </ul>
        <ul class="ulright">
            <a href="http://localhost/social/conversations"><li>Messages</li></a>
            <a href="http://localhost/social/user/"><li><div class="userimgheader"><img src="http://localhost/social/<?php echo $inlogged_user->user_img ?>"></div>My account</li></a>
            <a href="http://localhost/social/Auth/logout"><li><?php echo "Sign out"; ?></li></a>
    <?php
    }
    else {
    ?>
        <ul class="ulleft">
            <a href="http://localhost/social/"><li>Quone</li></a>
        </ul>
        <ul class="ulright">
        </ul>
    <?php } ?>
</header>
