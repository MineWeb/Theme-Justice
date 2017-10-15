<div class="header">
    <div class="container-fluid">
        <div class="col-lg-3 col-lg-offset-1 servstats">
            <div class="blackbox">
                <div class="server-ip"><i class="fa fa-check"></i> <?= $theme_config['ip'] ?></div>
            </div>
            <div class="blackbox">
                <span class="online">
									<?php if($banner_server): ?>
                    <?= $banner_server; ?>
									<?php else: ?>
									  <?= $Lang->get('SERVER__STATUS_OFF'); ?>
									<?php endif; ?>
                </span>
            </div>
        </div>
        <div class="col-lg-4">
            <center>
                <img class="img-responsive" src="<?= $theme_config['logo'] ?>">
            </center>
        </div>
        <div class="col-lg-3 servstats">
            <?php if(!$isConnected) { ?>
            <div class="blackbox">
                <img class="login-avatar avatar img-responsive" src="https://crafatar.com/avatars/Steve">
                <div class="login-username">Bienvenue, visiteur !</div>
            </div>
            <div class="quickbuttons">
                <div class="btn-group btn-group-justified">
                  <a href="#login" type="button" data-toggle="modal" class="btn btn-default"><?= $Lang->get('USER__LOGIN') ?></a>
                  <a href="#register" type="button" data-toggle="modal" class="btn btn-default"><?= $Lang->get('USER__REGISTER') ?></a>
                </div>
            </div>
            <?php } else { ?>
                <div class="blackbox">
                    <img class="login-avatar avatar img-responsive" src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false, $user['pseudo'], 64)) ?>">
                    <div class="login-username"><?= $user['pseudo'] ?></div>
                </div>
                <div class="quickbuttons">
                    <div class="btn-group btn-group-justified">
                        <?php if($Permissions->can('ACCESS_DASHBOARD')) { ?>
                        <a type="button" class="btn btn-default" href="<?= $this->Html->url(array('controller' => '', 'action' => 'index', 'plugin' => 'admin')) ?>"><i class="fa fa-cogs"></i></a>
                        <?php } ?>
                        <a href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>" type="button" class="btn btn-default"><i class="fa fa-user"></i></a>
                        <a href="#notifications_modal" data-toggle="modal" type="button" class="btn btn-default"><i class="fa fa-flag"></i><span class="notification-indicator"></span></a>
                        <a href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => null)) ?>" type="button" href="" class="btn btn-default"><i class="fa fa-power-off"></i></a>
                    </div>
                </div>
            <?php } ?>
        </div>
				<div class="col-lg-12">
					<?php if($theme_config['text-slide'] == 'true'): ?>
					<?php $search_slider = ClassRegistry::init('Slider')->find('all'); ?>
            <div class="textslide">
                <ul>
                   <?php $i = 0; foreach ($search_slider as $k => $v) { ?>
                      <li><p><?= $v['Slider']['subtitle']; ?></p></li>
                    <?php } ?>
                </ul>
            </div>
					<?php endif; ?>
        </div>
    </div>
</div>