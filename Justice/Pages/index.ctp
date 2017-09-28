<article>
	<div class="panel panel-default">
		<div class="panel-heading"><h1 class="panel-title"><?= $page['title'] ?></h1></div>
		<div class="panel-body">
			<?php
			$doc = new DOMDocument();
			$doc->loadHTML($page['content']);
			echo $doc->saveHTML();
			?>
		</div>
		<div class="panel-footer">
			<?= $Lang->get('GLOBAL__UPDATED') ?> : <?= $Lang->date($page['updated']) ?> <?= $Lang->get('GLOBAL__BY') ?> <?= $page['author'] ?>
		</div>
	</div>
</article>