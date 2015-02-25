<?php
require_once('./././App/Controllers/FriendsController.php');
require_once('resources/views/header.php');

$query = new \App\Controllers\FriendsController();
$friendslist = $query->getFriends($user->id);
?>
<div class="u_content">
    <div class="up_info">
        <img class="up_img" src="../../<?php echo $user->user_img; ?>">
        <div class="up_content">
            <p class="up_username"><?php echo $user->username; ?></p>
            <div class="up_currstatus"><?php echo $user->user_status; ?></div>
            <div class="up_newstatus">Write a new quone!</div>
            <!-- <p class="userinfo">I det här texblocket tänkte jag att man kan ha en liten bio om sig själv. I det här texblocket tänkte jag att man kan ha en liten bio om sig själv. I det här texblocket tänkte jag att man kan ha en liten bio om sig själv.</p> -->
        </div>
    </div>
    <div class="up_edit">
        <?php
        if(($inlogged_user->id) == ($user->id)) {
        ?>
        <div class="edit_content">
            <p><a class="chgpass">Change image</a></p>
            <p><a class="chgpass">Change password</a></p>
            <p><a class="chgpass">Change e-mail</a></p>
        </div>
        <?php } ?>
    </div>
    <div class="up_friendlist">
        <h2><?php echo $user->username; ?>'s friends:</h2>
        <?php
            $query->showFriends($friendslist);
        ?>
<!-- <h1>User with id: <?php // echo $user->id; ?></h1>
    <p><?php // echo $user->username;?></p>
    <p><?php // echo $user->email;?></p>
    <p><?php // echo $user->user_status;?></p>
    <p><?php // echo $user->user_img;?></p>

    // if the profile is mine, show edit button ?>

    <form method="post" action="../users/edit/<?php echo $user->id; ?>">
        <input type="hidden" name="id" value="<?php $user->id;?>" />
        <input type="submit" value="Edit Profile" name="send_id"/>
    </form>


    <?php // if profile belongs to a friend, show status and remove friend button ?>

    <form method="post" action="/social/friends/removeFriend">
        <input type="hidden" name="user_id" value="<?php echo $inlogged_user->id ?>" />
        <input type="hidden" name="friend_id" value="<?php echo $user->id;?>" />
        <input type="submit" value="Remove friend" name="send_id"/>
    </form>

    <?php // if profile is not a friend, show username + image, and an add friend button ?>

    <form method="post" action="/social/friends/addFriend">
        <input type="hidden" name="user_id" value=" <?php echo $inlogged_user->id  ?>" />
        <input type="hidden" name="friend_id" value="<?php echo $user->id; ?>" />
        <input type="submit" value="Add Friend" name="send_id"/>
    </form>-->
    </div>
</div>
<?php
require_once('resources/views/footer.php');
?>