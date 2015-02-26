<?php
require_once('./././App/Controllers/StatusController.php');
require_once('resources/views/header.php');
?>
        <div class="content">
            <div class="friendslist"></div>
            <div class="statuses">
                <h1 class="contheader">Latest quones:</h1>
                <?php
                foreach ($stm as $statuses) {

                ?>
                <div class="singlestatus">
                    <a href="../user/show/<?php echo $statuses['0']; ?>"><img src="http://localhost/social/<?php echo $statuses['user_img']; ?>" alt="<?php echo $statuses['username']; ?>" title="<?php echo $statuses['username']; ?>"></a>
                    <div class="statuscont">
                        <div class="statustext">
                            <p class="statusupdate"><?php echo $statuses['user_status']; ?></p>
                        </div>
                        <div class="statusinfo">
                            <a href="../user/show/<?php echo $statuses['0']; ?>"><span class="statusuname">@<?php echo $statuses['username']; ?></span></a> - <span class="statustime"><?php echo date('H:i - d/m-Y', strtotime ($statuses['updated']));?></span>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
<?php
require_once('resources/views/footer.php');
?>