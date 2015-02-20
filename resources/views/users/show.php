

    <h1>User with id: <?php echo $user->id;?></h1>

    <form method="post" action="../users/edit">
        <input type="hidden" name="id" value="<?php $user->id ?>" />
        <input type="submit" value="Edit Profile" name="send_id"/>
    </form>
