<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title"><?= $Lang->get('BANLIST__TITLE') ?></h1>
	</div>
	<div class="panel-body">
		<?php if($list != "NEED_SERVER_ON") { ?>
			<table class="table table-bordered dataTable">
					<thead>
							<tr>
									<th><?= $Lang->get('BANLIST__USER') ?></th>
							</tr>
					</thead>
					<tbody>
							<?php foreach ($list as $k => $v) { ?>
									<tr>
					<td><?= $v ?></td>
									</tr>
							<?php } ?>
					</tbody>
			</table>
		<?php } else { ?>
				<div class="well">
						<div class="alert alert-danger"><?= $Lang->get('BANLIST__SERVER_OFF') ?></div>
				</div>
		<?php } ?>
	</div>
</div>
