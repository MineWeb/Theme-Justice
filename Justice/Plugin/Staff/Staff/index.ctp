<h1><?= $Lang->get("STAFF") ?></h1>
<?php foreach($staff as $k=>$v): $v = current($v); ?>
		<div class="col-md-6 col-sm-6">
			<div class="box-image-text blog">
					<div class="content">
							<h4><?= $v['user'] ?> - <?= $v['rank'] ?></h4>
							<img src="https://visage.surgeplay.com/bust/144/<?= $v['user'] ?>" alt="" width="144" height="144" /><br />
							<p class="author-category"><?= $v['description'] ?></p>
					</div>
			</div>
	</div>
<?php endforeach; ?>