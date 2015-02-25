<?php
session_start();
if ($_SESSION['user']) {
    $inlogged_user = $_SESSION['user'];
}
else {
    header('location:../../auth/login');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Social site</title>
    <link href="../../css/stylesheet.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="../../js/functions.js"></script>
</head>
<body>
<div id="wrapper">
<header>
    <ul class="ulleft">
        <a href="home.php"><li>Quone</li></a>
    </ul>
    <ul class="ulright">
        <a href="../../conversations/index/<?php echo $inlogged_user->id ?>"><li>Messages</li></a>
        <a href="../../users/show/<?php echo $inlogged_user->id ?>"><li><div class="userimgheader"><img src="../../<?php echo $inlogged_user->user_img ?>"></div>My account</li></a>
        <a href="../../Auth/logout"><li>
            <?php
                if (!empty($_SESSION['user'])) {
                    echo "Sign out";
                }
                else {
                    echo "Sign in";
                }
            ?></li></a>
    </ul>
</header>
