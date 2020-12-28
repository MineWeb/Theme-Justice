<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="MrSheepSheep, Eywek">

    <title><?= $seo_config['title'] ?></title>
    <link rel="icon" type="image/png" href="<?= $seo_config['favicon_url'] ?>"/>
    <meta name="title" content="<?= $seo_config['title'] ?>">
    <meta property="og:title" content="<?= $seo_config['title'] ?>">
    <meta name="description" content="<?= $seo_config['description'] ?>">
    <meta property="og:description" content="<?= $seo_config['description'] ?>">
    <meta property="og:image" content="<?= $seo_config['img_url'] ?>">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/css/unslider.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.3.1/vegas.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato|Oswald" rel="stylesheet">
    <?= $this->Html->css('justice.css'); ?>
		<?= $this->element('dynamic-css'); ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="particles-js"></div>
		<?php if($theme_config['loader'] == 'true'): ?>
			<div id="loader"></div>
		<?php endif; ?>
    <!-- Modals -->
    <?= $this->element('custom-modals') ?>
    <!-- Navbar -->
    <?= $this->element('navbar') ?>
    <!-- Header -->
    <?= $this->element('header') ?>

    <!-- Main body -->
    <div class="main-content">
				<?= $this->fetch('content') ?>
        <div class="container">
            <div class="text-centered copyright">
                Fièrement propulsé par <a href="http://mineweb.org/">Mineweb</a>.<br>
                Thème <a href="http://mineweb.org/market/theme/Justice">Justice</a> développé par MrSheepSheep.
                <br>
                <?= $theme_config['footer_text']; ?>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/js/unslider-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.3.1/vegas.min.js"></script>
    <?= $this->Html->script('particles.min.js'); ?>
    <?= $this->element('scripts'); ?>
    <?= $this->Html->script('app.js') ?>
    <?= $this->Html->script('form.js') ?>
    <?= $this->Html->script('notification.js') ?>
    <script>
    <?php if($isConnected) { ?>
      // Notifications
        var notification = new $.Notification({
          'url': {
            'get': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'getAll')) ?>',
            'clear': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clear', 'NOTIF_ID')) ?>',
            'clearAll': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clearAll')) ?>',
            'markAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAsSeen', 'NOTIF_ID')) ?>',
            'markAllAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAllAsSeen')) ?>'
          },
          'messages': {
            'markAsSeen': '<?= $Lang->get('NOTIFICATION__MARK_AS_SEEN') ?>',
            'notifiedBy': '<?= $Lang->get('NOTIFICATION__NOTIFIED_BY') ?>'
          }
        });
    <?php } ?>
    var LIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'like')) ?>";
    var DISLIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'dislike')) ?>";

    var LOADING_MSG = "<?= $Lang->get('GLOBAL__LOADING') ?>";
    var ERROR_MSG = "<?= $Lang->get('GLOBAL__ERROR') ?>";
    var INTERNAL_ERROR_MSG = "<?= $Lang->get('ERROR__INTERNAL_ERROR') ?>";
    var FORBIDDEN_ERROR_MSG = "<?= $Lang->get('ERROR__FORBIDDEN') ?>"
    var SUCCESS_MSG = "<?= $Lang->get('GLOBAL__SUCCESS') ?>";

    var CSRF_TOKEN = "<?= $csrfToken ?>";
    </script>

    <?php if(isset($google_analytics) && !empty($google_analytics)) { ?>
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '<?= $google_analytics ?>', 'auto');
        ga('send', 'pageview');
      </script>
    <?php } ?>
    <?= $configuration_end_code ?>
    <script type="text/javascript">
        window.cookieconsent_options = {"message":"Notre site utilise des cookies pour vous proposer la meilleure expérience possible.","dismiss":"Reçu !","learnMore":"En savoir plus","link":null,"theme":"dark-bottom"};
    </script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
</body>
<!-- Justice par MrSheepSheep. -->
</html>
