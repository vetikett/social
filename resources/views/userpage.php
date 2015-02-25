<?php
require_once('header.php');
?>
<div class="u_content">
    <div class="up_info">
        <img class="up_img" src="../../imgs/viktormeidal.png">
        <div class="up_content">
            <p class="up_username">ViktorMeidal</p>
            <div class="up_currstatus">It's a medical term. When a patient gets difficult you quone them.</div>
            <div class="up_newstatus">Write a new quone!</div>
            <p class="userinfo">I det här texblocket tänkte jag att man kan ha en liten bio om sig själv. I det här texblocket tänkte jag att man kan ha en liten bio om sig själv. I det här texblocket tänkte jag att man kan ha en liten bio om sig själv.</p>
        </div>
    </div>
    <div class="up_edit">
        <div class="edit_content">
            <p><a class="chgpass">Change image</a></p>
            <p><a class="chgpass">Change password</a></p>
            <p><a class="chgpass">Change e-mail</a></p>
        </div>
    </div>
    <div class="up_friendlist">
        <h2>ViktorMeidal's friends:</h2>
        <?php $result = $stm->fetchAll();
        foreach($result as $row) {
        ?>
        <div class="singlefriend">
            <div class="friend_img">
                <img class="friend_img" src="../../imgs/thomasringqvist.png">
            </div>
            <div class="friend_name">
                <span class="up_sf_name"><a href="userpage.php?userid=5">ThomasRingqvistasdsa</a></span>
                <img class="friendsmessimg" src="../../imgs/mess_icon_nohover.png" onmouseover="messh(this);" onmouseout="messoh(this);" alt="Skicka meddelande!" title="Skicka meddelande!">
            </div>
            <div class="add_delete_friend"><i class="fa fa-plus-square fa-2x"></i></div>
        </div>
        <!--
        <div class="singlefriend">
            <div class="friend_img">
                <img class="friend_img" src="../../imgs/thomasringqvist.png">
            </div>
            <div class="friend_name">
                <span class="up_sf_name"><a href="userpage.php?userid=5">ThomasRingqvistasdsa</a></span>
                <img class="friendsmessimg" src="../../imgs/mess_icon_nohover.png" onmouseover="messh(this);" onmouseout="messoh(this);" alt="Skicka meddelande!" title="Skicka meddelande!">
            </div>
            <div class="add_delete_friend"><i class="fa fa-plus-square fa-2x"></i></div>
        </div>
        <div class="singlefriend">
            <div class="friend_img">
                <img class="friend_img" src="../../imgs/thomasringqvist.png">
            </div>
            <div class="friend_name">
                <span class="up_sf_name"><a href="userpage.php?userid=5">ThomasRingqvistasdsa</a></span>
                <img class="friendsmessimg" src="../../imgs/mess_icon_nohover.png" onmouseover="messh(this);" onmouseout="messoh(this);" alt="Skicka meddelande!" title="Skicka meddelande!">
            </div>
            <div class="add_delete_friend"><i class="fa fa-minus-square fa-2x"></i></div>
        </div>
        <div class="singlefriend">
            <div class="friend_img">
                <img class="friend_img" src="../../imgs/thomasringqvist.png">
            </div>
            <div class="friend_name">
                <span class="up_sf_name"><a href="userpage.php?userid=5">ThomasRingqvistasdsa</a></span>
                <img class="friendsmessimg" src="../../imgs/mess_icon_nohover.png" onmouseover="messh(this);" onmouseout="messoh(this);" alt="Skicka meddelande!" title="Skicka meddelande!">
            </div>
            <div class="add_delete_friend"><i class="fa fa-minus-square fa-2x"></i></div>
        </div>
        <div class="singlefriend">
            <div class="friend_img">
                <img class="friend_img" src="../../imgs/thomasringqvist.png">
            </div>
            <div class="friend_name">
                <span class="up_sf_name"><a href="userpage.php?userid=5">ThomasRingqvistasdsa</a></span>
                <img class="friendsmessimg" src="../../imgs/mess_icon_nohover.png" onmouseover="messh(this);" onmouseout="messoh(this);" alt="Skicka meddelande!" title="Skicka meddelande!">
            </div>
            <div class="add_delete_friend"><i class="fa fa-plus-square fa-2x"></i></div>
        </div>
        <div class="singlefriend">
            <div class="friend_img">
                <img class="friend_img" src="../../imgs/thomasringqvist.png">
            </div>
            <div class="friend_name">
                <span class="up_sf_name"><a href="userpage.php?userid=5">ThomasRingqvistasdsa</a></span>
                <img class="friendsmessimg" src="../../imgs/mess_icon_nohover.png" onmouseover="messh(this);" onmouseout="messoh(this);" alt="Skicka meddelande!" title="Skicka meddelande!">
            </div>
            <div class="add_delete_friend"><i class="fa fa-minus-square fa-2x"></i></div>
        </div> -->
    </div>
</div>
<?php
require_once('footer.php');
?>
