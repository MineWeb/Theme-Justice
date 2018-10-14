<div class="container">
<!-- Post -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title">
        <i class="fa fa-newspaper-o"></i> <?= $news['News']['title'] ?>
      </h1>
    </div>
    <div class="panel-body">
        <?= $news['News']['content'] ?>
    </div>
    <div class="panel-footer">
      <img class="img-responsive" style="display:inline-block;" src="/API/get_head_skin/<?= $news['News']['author'] ?>/25" title="<?= $news['News']['author'] ?>"> <?= $Lang->get('GLOBAL__BY') ?> <?= $news['News']['author'] ?>, le <?= $Lang->date($news['News']['created']); ?>
    <button id="<?= $news['News']['id'] ?>" type="button" class="pull-right like btn btn-success<?= ($news['News']['liked']) ? ' active' : '' ?>"<?= (!$Permissions->can('LIKE_NEWS')) ? ' disabled' : '' ?>><?= $news['News']['count_likes'] ?> <i class="fa fa-thumbs-up"></i></button>
			<div class="clearfix"></div>
    </div>
  </div>
  <!-- Commentaires -->
    <div class="panel panel-default">
      <div class="panel-heading"><h1 class="panel-title"><i class="fa fa-comment"></i> <?= $Lang->get('NEWS__COMMENTS_TITLE') ?> (<?= sizeof($news['Comment']) ?>)</h1></div>
      <div class="panel-body">
        <div class="add-comment"></div>
        <?php foreach ($news['Comment'] as $k => $v) { ?>
          <div  class="comment" id="comment-<?= $v['id']?>">
            <h4>
              <img src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/')) ?>/<?= $v['author'] ?>/32" alt=""> <?= $v['author'] ?>
              <small> le <?= $Lang->date($v['created']); ?></small>
              <?php if($Permissions->can('DELETE_COMMENT') OR $Permissions->can('DELETE_HIS_COMMENT') AND $user['pseudo'] == $v['Comment']['author']) { ?>
                  <a id="<?= $v['id'] ?>" title="<?= $Lang->get('GLOBAL__DELETE') ?>" class="comment-delete btn btn-danger btn-sm"><icon class="fa fa-times"></icon></a>
              <?php } ?>
            </h4>
            <blockquote>
              <?= before_display($v['content']) ?>
            </blockquote>
          </div>
        <?php } ?>
        <?php if($Permissions->can('COMMENT_NEWS')) { ?>
            <hr>
            <center><a id="add-comment" href="#" data-toggle="modal" data-target="#postcomment" class="btn btn-success btn-lg"><?= $Lang->get('NEWS__COMMENT_TITLE') ?></a></center>
        <?php } ?>
      </div>
    </div>
<?= $Module->loadModules('news') ?>
<?php if($Permissions->can('COMMENT_NEWS')) { ?>
  <div class="modal fade" id="postcomment" tabindex="-1" role="dialog" aria-labelledby="postcommentLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="<?= $Lang->get('GLOBAL__CLOSE') ?>"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?= $Lang->get('NEWS__COMMENT_TITLE') ?></h4>
        </div>
        <form method="POST" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'news', 'action' => 'add_comment')) ?>" data-callback-function="addcomment" data-success-msg="false">
          <div class="modal-body">
            <div id="form-comment-fade-out">
              <div id="error-on-post"></div>
                <input name="news_id" value="<?= $news['News']['id'] ?>" type="hidden">
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="3"></textarea>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?= $Lang->get('GLOBAL__CLOSE') ?></button>
            <button type="submit" class="btn btn-success pull-right"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
<script type="text/javascript">
    $(".comment-delete").click(function() {
        comment_delete(this);
    });

    function comment_delete(e) {
      var inputs = {};
      var id = $(e).attr("id");
      inputs["id"] = id;
      inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
      $.post("<?= $this->Html->url(array('controller' => 'news', 'action' => 'ajax_comment_delete')) ?>", inputs, function(data) {
          if(data == 'true') {
            $('#comment-'+id).slideUp(500);
          } else {
            console.log(data);
          }
        });
    }

    function addcomment(data) {
      var d = new Date();
      var comment = '<h4><img src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/')) ?>/<?= $user['pseudo'] ?>/32" alt=""> <?= $user['pseudo']; ?><small>, à '+ d.getHours()+'h'+d.getMinutes()+'</small></h4><blockquote>'+data['content']+'</blockquote>';
      $('.add-comment').hide().html(comment).slideDown(1500);
      $('.add-comment').removeClass('add-comment');
      $('#postcomment').modal('hide');
      $('#add-comment').addClass('disabled');
    }
</script>
</div>
