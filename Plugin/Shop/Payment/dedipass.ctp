<div class="container">  
<div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title">
        <?= $Lang->get('SHOP__DEDIPASS_PAYMENT') ?>
      </h1>
    </div>
    <div class="panel-body">
      <div data-dedipass="<?= $dedipassPublicKey ?>">
        <div class="alert alert-info"><?= $Lang->get('GLOBAL__LOADING') ?>...</div>
      </div>
    </div>
  </div>
</div>
<script src="//api.dedipass.com/v1/pay.js"></script>
