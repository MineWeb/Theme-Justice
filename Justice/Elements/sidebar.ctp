
<?php if($title_for_layout == $Lang->get('SHOP__TITLE')){ ?>
  <!-- Sidebar -->
    <?php if($isConnected) { ?>
      <div class="panel panel-default">
        <div class="panel-heading"><h1 class="panel-title"><i class="fa fa-shopping-cart"></i> Mon compte</h1></div>
        <div class="panel-body">
          <p><?= $Lang->get('SHOP__MONEY_CURRENTLY') ?>: <?= $money ?> <?= $Configuration->getMoneyName(); ?></p>
          <?php if($Permissions->can('CREDIT_ACCOUNT')){ ?>
            <br>
            <a href="#" data-toggle="modal" data-target="#addmoney" class="btn btn-block btn-primary btn-lg"><?= $Lang->get('SHOP__ADD_MONEY') ?></a>
            <a href="#" data-toggle="modal" data-target="#cart-modal" class="btn btn-block btn-success btn-lg"><?= $Lang->get('SHOP__BUY_CART') ?></a>
          <?php } ?>
        </div>
      </div>
    <?php } else { ?>
      <div class="alert alert-danger"><?= $Lang->get('SHOP__BUY_ERROR_NEED_LOGIN') ?></div>
    <?php } ?>
<?php } if ($theme_config['vote-sidebar'] == "true"){ ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title uppercase text-centered">
            <i class="fa fa-star"></i> Meilleurs voteurs <i class="fa fa-star"></i>
        </h1>
    </div>
    <div class="panel-body">
        <?php $ranking = ClassRegistry::init('User')->find('all', array('limit' => '5', 'order' => 'vote desc')); ?>
        <?php $rank = 0; foreach ($ranking as $key => $value):
                $rank++;
        ?>
        <div class="media">
          <div class="media-left">
              <img class="noresp" src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/', 'plugin' => false)) ?>/<?= $value['User']['pseudo'] ?>/64" >
          </div>
          <div class="media-body">
            <h4 class="media-heading">#<?= $rank ?> - <?= $value['User']['pseudo'] ?></h4>
            <?= $value['User']['vote'] ?> votes
          </div>
        </div>
        <?php endforeach; ?>
        <hr>
        <p class="text-centered">Votez pour le serveur et recevez des récompenses !</p>
        <a class="btn btn-danger btn-block btn-custom uppercase" href="/vote">Voter</a>
    </div>
</div>

<?php }
if (!empty($findSocialButtons)){
  foreach ($findSocialButtons as $key => $value) {
    echo '<a target="_blank" class="btn btn-custom btn-default btn-block" style="background-color:'.$value['SocialButton']['color'].'" href="'.$value['SocialButton']['url'].'">';
    if(!empty($value['SocialButton']['img'])) {
      echo '<img class="img-responsive" src="'.$value['SocialButton']['img'].'">';
    }
    if(!empty($value['SocialButton']['title'])) {
      echo $value['SocialButton']['title'];
    }
    echo '</a>';
  }
    echo '<br>';
}
?>

<?php
if (!empty($skype_link) || !empty($youtube_link) || !empty($twitter_link) || !empty($facebook_link)){
  echo '<div class="panel panel-default"><div class="panel-heading"><h1 class="panel-title">Réseaux sociaux</h1></div><div class="panel-body">';
  if(!empty($skype_link)) {
    echo '<a href="'.$skype_link.'" target="_blank" class="btn btn-custom btn-block btn-warning"><i class="fa fa-skype"></i> Skype</h1></a>';
  }
  if(!empty($youtube_link)) {
    echo '<a href="'.$youtube_link.'" target="_blank" class="btn btn-custom btn-block btn-danger"><i class="fa fa-youtube"></i> Youtube</h1></a>';
  }
  if(!empty($twitter_link)) {
    echo '<a href="'.$twitter_link.'" target="_blank" class="btn btn-custom btn-block btn-info"><i class="fa fa-twitter"></i> Twitter</a>';
  }
  if(!empty($facebook_link)) {
    echo '<a href="'.$facebook_link.'" target="_blank" class="btn btn-custom btn-block btn-success"><i class="fa fa-facebook"></i> Facebook</a>';
  }
  echo '</div></div>';
}
?>
<?php if (isset($theme_config['discordId']) && $theme_config['discordId'] != ""){ ?>
    <iframe src="https://discordapp.com/widget?id=<?= $theme_config['discordId'] ?>&amp;theme=light" height="550" allowtransparency="true" frameborder="0" style="width:100%;"></iframe>
<?php } ?>
<?php if ($theme_config['sidebar-stats'] == "true"): ?>
	<?php $u = ClassRegistry::init('User'); ?>
	<?php $v = ClassRegistry::init('Visit'); ?>
	<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title uppercase">
            <i class="fa fa-bar-chart"></i> Statistiques
        </h1>
    </div>
    <div class="panel-body">
				<p><b>Inscrits:</b> <?= $u->find('count'); ?></p>
        <p><b>Nouveaux inscrits:</b> <?= $u->find('count', array('conditions' => array('created LIKE' => date('Y-m-d').'%'))); ?></p>
        <p><b>Visites du jour:</b> <?= $v->getVisitsByDay(date('Y-m-d'))['count']; ?></p>
        <p><b>Visites totales:</b> <?= $v->getVisitsCount(); ?></p>
    </div>
	</div>
<?php endif ?>
<?= $theme_config['sidebar_code']; ?>
