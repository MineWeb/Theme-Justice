<div class="">
  <div class="">
    <div class="col-md-12">
      <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><?= $Lang->get('STATUS_TITLE');?></h3>
          </div>
          <?php foreach ($servers as $k => $v){ ?>
          <?php $Query = file_get_contents('https://mcapi.ca/query/'.$v['Server']['ip'].'/motd'); $query = json_decode($Query); ?>
          <div class="panel panel-default">
            <div class="panel-heading"><?= $Lang->get('STATUS_TITLE_SERV');?> <?= $v["Server"]["name"]; ?></div>
            <div class="panel-body">
             <div class="col-sm-2">
              <?php if(!$query->{'htmlmotd'} == ''){?>
                <img src="https://mcapi.ca/query/<?= $v['Server']['ip']; ?>/icon">
              <?php }else{ ?>
                <img src="https://mcapi.ca/query/e/icon">
              <?php }?>
             </div>
             <div class="col-sm-10">
              <h4 style="position: relative; left: -90px;"><?= $v['Server']['ip']; ?> <?php if(!$query->{'htmlmotd'} == ''){ ?> // <?php echo $query->{'ping'}; ?> <?= $Lang->get('STATUS_SERV_PING');?><?php }?></h4>
                <?php if(!$query->{'htmlmotd'} == ''){ ?>
                  <h5 style="position: relative; left: -90px;"><?= $Lang->get('STATUS_SERV_MOTD');?>: <?= $query->{'htmlmotd'}; ?></h5>
                <?php }?>
              <?php if($query->{'htmlmotd'} == ''){ ?>
                <h5 style="color: red; position: relative; left: -90px;"><?= $Lang->get('STATUS_SERV_DISP_ERROR');?></h5>
              <?php }else{ ?>
                <h5 style="color: green; position: relative; left: -90px;"><?= $Lang->get('STATUS_SERV_DISP_SUCCESS');?></h5>
              <?php }?>
             </div>
            </div>
          </div>
          <?php }?>
          <hr>
          <div class="panel panel-default">
            <div class="panel-heading"><?= $Lang->get('STATUS_MOJANG');?></div>
            <div class="panel-body">
                <?php
                  if(!empty($json))
                  {
                    $result = json_decode($json, true);
                  }
                  foreach($result as $address)
                  {
                    $server = array_keys($address)[0];
                    switch($server)
                    {
                      case 'minecraft.net':  $server = 'Minecraft.net'; break;
                      case 'session.minecraft.net':  $server = 'Session.minecraft.net'; break;
                      case 'account.mojang.com':  $server = 'Account.mojang.com'; break;
                      case 'auth.mojang.com':  $server = 'Auth.mojang.com'; break;
                      case 'skins.minecraft.net':  $server = 'Skins.minecraft.net'; break;
                      case 'authserver.mojang.com':  $server = 'AuthServer.mojang.com'; break;
                      case 'sessionserver.mojang.com':  $server = 'SessionServer.mojang.com'; break;
                      case 'api.mojang.com':  $server = 'Api.mojang.com'; break;
                      case 'textures.minecraft.net':  $server = 'Textures.minecraft.net'; break;
                      case 'mojang.com':  $server = 'Mojang.com'; break;
                      default:       $server = 'Error'; break;
                    }
                    $icons = array_values($address)[0];
                    switch($icons)
                    {
                      
                      case 'green':  $icons = 'glyphicon glyphicon-ok'; break;
                      case 'red':    $icons = 'glyphicon glyphicon-remove'; break; //Do nothing, red is good
                      case 'yellow': $icons = 'glyphicon glyphicon-warning-sign'; break; //Do nothing, yellow is good
                      default:       $icons = 'glyphicon glyphicon-remove'; break; //Something went wrong, assume it's down
                    }
                    $colour = array_values($address)[0];
                    switch($colour)
                    {
                      case 'green':  $colour = 'green'; $alert = 'success'; break;
                      case 'red':    $colour = 'red'; $alert = 'danger'; break; //Do nothing, red is good
                      case 'yellow': $colour = 'yellow'; $alert = 'warning'; break; //Do nothing, yellow is good
                      default:       $colour = 'red'; $alert = 'danger'; break; //Something went wrong, assume it's down
                    }
                    echo '<div class="col-sm-6">';
                    echo '<div class="alert alert-'.$alert.'">';
                    echo '<i style="color: '.$colour.';" class="'.$icons.'"></i> ';
                    echo $server;
                    echo '</div>';
                    echo '</div>';
                   }
                ?>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
