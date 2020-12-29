<div class="container">
    <div class="col-md-8">
        <!-- Main -->
        <?php if (!empty($search_news)) { ?>
            <?php foreach ($search_news as $k => $v) { ?>
                <div class="panel panel-default">
                    <div class="panel-heading" style="overflow: hidden;">
                        <?php if ($theme_config['thumbnews']) {
                            preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $v['News']['content'], $image);
                            if (!empty($image)) { ?>
                                <img class="img-responsive" src="<?= $image['src'] ?>" style="width:100%"></img>
                            <?php }
                        } ?>
                        <a style="white-space: nowrap;"
                           href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>">
                            <h1 class="panel-title"><i class="fa fa-newspaper-o"></i> <?= $v['News']['title']; ?></h1>
                        </a>
                    </div>
                    <div class="panel-body">
                        <p>
                            <?= cut($v['News']['content'], $theme_config['news_split']) ?>
                        </p>
                    </div>
                    <div class="panel-footer">
                        <i class="fa fa-calendar"></i> <?= $Lang->date($v['News']['created']); ?>
                        <i class="fa fa-comment"></i> <?= $v['News']['count_comments'] ?> <i
                                class="fa fa-thumbs-up"></i> <?= $v['News']['count_likes'] ?>
                        <a class="pull-right"
                           href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>"><i
                                    class="fa fa-plus-circle"></i> <?= $Lang->get('NEWS__READ_MORE') ?></a>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-lg-12"><h1><?= $Lang->get('NEWS__NONE_PUBLISHED') ?></h1></div>
        <?php } ?>
    </div>
    <div class="col-md-4">
        <?= $this->element('sidebar'); ?>
    </div>
</div>
<?= $Module->loadModules('home') ?>
