<?php
require_once('resources/views/header.php');
?>
<div class="content">
    <div class="opener_logo">
        <h1 class="op_logo">Quone</h1>
    </div>
    <div class="op_downer">
        <span>Medical term. When a patient gets difficult you have to quone them.</span>
    </div>
    <div class="opener_forms">
        <form action="auth/postLogin" method="post">
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
        <input type="email" id="email" placeholder="E-mail" class="open_input"><br />
        <label for="password">Password:</label><br />
        <input type="password" id="password" placeholder="Password" class="open_input"><br />
        <input type="button" id="loginbtn" value="Log in">
    </div>
</div>
<?php
require_once('footer.php');
?>
