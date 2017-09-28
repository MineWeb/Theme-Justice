<?php
$c = $theme_config['nav-color'];
?>

<style>
.topbar {
  border-bottom-color: <?= $c ?>;
}

.navbar-nav a:hover, .navbar-nav a:focus {
  border-bottom-color: <?= $c ?>;
}

.quickbuttons a:hover {
    background-color: <?= $c ?>;
}

#loader {
	background-image: url(<?= $theme_config['gifloader']; ?>)
}
</style>