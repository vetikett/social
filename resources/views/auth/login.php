
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
        <ul class="ulleft">
            <a href="http://localhost/social/"><li>Quone</li></a>
        </ul>
        <ul class="ulright">
        </ul>
    </header>

    <div class="content">
    <div class="opener_logo">
        <h1 class="op_logo">Quone</h1>
    </div>
    <div class="op_downer">
        <span>Medical term. When a patient gets difficult you have to quone them.</span>
    </div>
    <div class="opener_forms">
        <form action="postLogin" method="post">
            <h2 style="text-align: center;padding:0 10px;">Log in:</h2>
            <label for="email">E-mail:</label><br />
            <input type="email" name="email" id="email" placeholder="E-mail" class="open_input"><br />
            <label for="password">Password:</label><br />
            <input type="password" name="password" id="password" placeholder="Password" class="open_input"><br />
            <input type="submit" name="login" id="loginbtn" value="Log in">
        </form>
        <h2 class="lr_divider padder"><span>OR</span></h2>
        <h2 style="text-align: center;padding:0 10px;">Register:</h2>
        <label for="username">Username:</label><br />
        <input type="text" id="username" placeholder="Username" class="open_input"><br />
        <label for="username">E-mail:</label><br />
        <input type="text" id="username" placeholder="Username" class="open_input"><br />
        <label for="password">Password:</label><br />
        <input type="text" id="password" placeholder="Password" class="open_input"><br />
        <input type="button" id="loginbtn" value="Log in">
    </div>

</div>
<?php
require_once('resources/views/footer.php');
?>
