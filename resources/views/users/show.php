
    <h1>User with id: <?php echo $user->id; ?></h1>
    <p><?php echo $user->username;?></p>
    <p><?php echo $user->email;?></p>
    <p><?php echo $user->user_status;?></p>
    <p><?php echo $user->user_img;?></p>


    <?php
    session_start();
        $inlogged_user = $_SESSION['user'];
        echo $inlogged_user->id ;
        //var_dump($_SESSION['user']);


    if($_SESSION['user']) {
    // if the profile is mine, show edit button ?>

    <form method="post" action="../users/edit/<?php echo $user->id; ?>">
        <input type="hidden" name="id" value="<?php $user->id;?>" />
        <input type="submit" value="Edit Profile" name="send_id"/>
    </form>
    <?php } ?>

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
    </form>