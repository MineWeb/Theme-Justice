<?php $this->layout = 'twitch'; ?>
<div class="col-lg-7 col-lg-offset-1">
    <div class="embed-responsive center-block embed-responsive-16by9">
        <iframe src="https://player.twitch.tv/?channel=<?= $getpseudo ?>" frameborder="0" allowfullscreen="true" scrolling="no" height="378" width="620"></iframe>
    </div>
</div>
<div class="col-lg-3">
    <iframe frameborder="0" id="<?= $getpseudo ?>" src="https://www.twitch.tv/<?= $getpseudo ?>/chat?popout=" style="width:100%; height: 600px;"></iframe>
</div>
<br>