<div class="topbar">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= $this->Html->url('/') ?>"><?= $website_name ?></a>
              </div>
              <div id="navbar" class="navbar-collapse collapse navbar-right">
                <ul class="nav navbar-nav navbar-right">
                    <li class="li-nav"><a href="<?= $this->Html->url('/') ?>"><?= $Lang->get('GLOBAL__HOME') ?></a></li>
                    <?php
                    if(!empty($nav)) {
                      $i = 0;
                      foreach ($nav as $key => $value) { ?>
                        <?php if(empty($value['Navbar']['submenu'])) { ?>
                          <li class="li-nav">
                              <a href="<?= $value['Navbar']['url'] ?>"><?= $value['Navbar']['name'] ?></a>
                          </li>
                        <?php } else { ?>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $value['Navbar']['name'] ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                            <?php
                            $submenu = json_decode($value['Navbar']['submenu']);
                            foreach ($submenu as $k => $v) {
                            ?>
                              <li><a href="<?= rawurldecode(rawurldecode($v)) ?>"<?= ($value['Navbar']['open_new_tab']) ? ' target="_blank"' : '' ?>><?= rawurldecode(str_replace('+', ' ', $k)) ?></a></li>
                            <?php } ?>
                            </ul>
                          </li>
                        <?php } ?>
                        <?php
                          $i++;
                        }
                      } ?>
                  </ul>
              </div>
            </div>
        </div>
    </nav>
</div>
