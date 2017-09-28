<div class="col-md-12">
	<div class="thumbnail">
		<div class="embed-responsive center-block embed-responsive-16by9">
				<iframe class="embed-responsive-item yt-embed-primary" src="<?= $video['Youtube']['url']; ?>" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
</div>
<?php foreach ($videos as $v): ?>
<div class="col-md-4">
	<div class="thumbnail">
				<iframe class="embed-responsive-item center-block" src="<?= $v['Youtube']['url']; ?>" frameborder="0" allowfullscreen></iframe>
	</div>
</div>
<?php endforeach; ?>
