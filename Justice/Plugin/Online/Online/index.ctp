<div id="heading-breadcrumbs">
  <div class="">
    <div class="row">
      <div class="col-md-8">
          <h1><?= $Lang->get('ONLINE__TITLE') ?></h1>
      </div>	 
    </div>
  </div>
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<?php if($list != "NEED_SERVER_ON") { ?>
				<table class="table table-default dataTable">
						<thead>
								<tr>
										<th><?= $Lang->get('ONLINE__USER') ?></th>
								</tr>
						</thead>
						<tbody>
								<?php foreach ($list as $k => $v) { ?>
										<tr>
												<td><img width="30px;" src="<?= $this->Html->url('/API/get_head_skin/'.$v) ?>/30"> <?= $v ?></td>
										</tr>
								<?php } ?>
						</tbody>
				</table>
			<?php } else { ?>
					<div class="well">
							<div class="alert alert-danger"><?= $Lang->get('ONLINE__SERVER_OFF') ?></div>
					</div>
			<?php } ?>
	</div>
</div>