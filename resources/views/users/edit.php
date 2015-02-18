<?php $_SESSION['user'] ? : header('location: ../../auth/login'); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>user id: <?php echo $user['id'] ?></h1>
    <form action="../update/<?php echo $user['id'] ?>" method="post">
        <label style="display: block;" for="username">
            username
            <input name="username" type="username"/>
        </label>
        <label style="display: block;" for="email">
            email
            <input name="email" type="email"/>
        </label>
        <label style="display: block;" for="password">
            password
            <input name="password" type="password"/>
        </label>
        <label style="display: block;" for="re-password">
            password (again)
            <input name="re-password" type="re-password"/>
        </label>
        <input type="submit" name="register" value="update"/>
    </form>



</body>
</html>