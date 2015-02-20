<?php
// if no user, send to login
$_SESSION['user'] ? : header('location: ../auth/login'); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>All users</h1>
    <ul>
        <?php foreach($users as $user) {
            echo "<li>$user->username</li>";
        } ?>
    </ul>
</body>
</html>