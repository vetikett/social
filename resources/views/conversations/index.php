<?php
require_once('./././App/Controllers/ConversationsController.php');
require_once('resources/views/header.php');
$query = new \App\Controllers\ConversationsController();
?>
<div class="m_content">
    <div class="mess_friends">
        <h1>Your conversations:</h1>
        <input type="text" placeholder="Search..." class="searchfriendslist"><input type="submit" class="startconversation" value="Write">
        <?php
        $convid = $query->getMessageList($_SESSION['user']->id);
        ?>
    </div>
    <div class="mess_container">
        <?php
        if (!empty($stm)) {
        $recipient = $stm->fetchAll(PDO::FETCH_OBJ); ?>
            <h1>Messages with <?php echo $recipient[0]->username; ?></h1>
        <div class="m_c_content">
        <?php
        $counter = 0;
            foreach ($recipient as $message) {
            ?>
            <div class="sing_mess">
                <div class="sing_mess_img">
                    <a href="http://localhost/social/user/show/<?php echo $recipient[$counter]->sender_id; ?>"><img class="userimg" src="http://localhost/social/<?php echo $recipient[$counter]->user_img; ?>" alt="<?php echo $recipient[$counter]->sender_id; ?>" title="<?php echo $recipient[$counter]->sender_id; ?>"></a>
                </div>
                <div class="sing_mess_txt">
                    <span><?php echo $recipient[$counter]->message_text; ?></span><span class="message_sent">&nbsp;&nbsp;&nbsp;&nbsp;/ <?php echo date('H:i - d/m-Y', strtotime ($recipient[$counter]->created_at)); ?></span>
                </div>
                <div class="hr"></div>
            </div>
            <?php
                $counter++;
            }
        }
        else {
            ?>
            <h1>Messages</h1>
            <div class="m_c_content">
            <?php
        }
            ?>
        </div>
            <?php
            if (!empty($stm)) {
                ?>
                <form action="../sendMessage/<?php echo $recipient[0]->conversation_id; ?>" method="post">
                    <textarea name="message"></textarea>
                    <input type="submit" class="sendmess" name="sendmessage" value="Send message">
                </form>
            <?php
            }
            ?>
    </div>
</div>
<?php
require_once('resources/views/footer.php');
?>
