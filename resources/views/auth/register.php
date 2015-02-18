<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form action="postRegister" method="post">
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
        <label style="display: block;" for="re_password">
            password (again)
            <input name="re_password" type="password"/>
        </label>
        <input type="submit" name="register" value="Register"/>
    </form>

    <?php if(isset($errors) ) {
        foreach($errors as $error) {
            echo "<p>$error</p>";
        }
    } ?>

</body>
</html>