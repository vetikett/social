<?php
foreach($friend as $friends) {
    ?>
<div class="singlefriend">
    <div class="friend_img">
        <img class="friend_img" src="<?php $friends->user_img;?>">
    </div>
    <div class="friend_name">
        <span class="up_sf_name"><a href="userpage.php?userid=<?php $friends->id;?>"><?php $friends->username;?></a></span>
        <img class="friendsmessimg" src="../../imgs/mess_icon_nohover.png" onmouseover="messh(this);" onmouseout="messoh(this);" alt="Skicka meddelande!" title="Skicka meddelande!">
    </div>
    <div class="add_delete_friend"><i class="fa fa-plus-square fa-2x"></i></div>
</div>
<?php
}
?>