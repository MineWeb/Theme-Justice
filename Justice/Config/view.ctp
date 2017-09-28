<?php
$form_input = array('title' => $Lang->get('THEME__UPLOAD_LOGO'));

if(isset($config['logo']) && $config['logo']) {
  $form_input['img'] = $config['logo'];
  $form_input['filename'] = 'theme_logo.png';
}

echo $this->Html->script('admin/tinymce/tinymce.min.js');
?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $Lang->get('THEME__CUSTOMIZATION') ?></h3>
        </div>
        <div class="box-body">

          <form method="post" enctype="multipart/form-data" data-ajax="false">

            <div class="col-md-6">
							<h1>Options générales</h1>
              <div class="form-group">
                <label>Limite d'affichage d'une news</label>
								<p>La longueur maximale d'une news quand elle est affichée sur l'accueil.</p>
								<p>La valeur par défaut est <code>2000</code>.
								Mettez <code>-1</code> pour afficher la news en entier !</p>
                <input type="text" class="form-control" name="news_split" value="<?= $config['news_split'] ?>">
              </div>
							<div class="form-group">
                <label><?= $Lang->get('THEME__FAVICON_URL') ?></label>
                <input type="text" class="form-control" name="favicon_url" value="<?= $config['favicon_url'] ?>">
              </div>
							<div class="form-group">
								<label>IP du serveur affichée</label>
								<p>Entrez votre IP ou un message personnalisé.</p>
								<p>Attention, lorsque votre serveur sera éteint, le message sera celui configuré dans la personnalisation du langage.</p>
								<script type="text/javascript">
									tinymce.init({
											selector: "#ip",
											height : 100,
											width : '100%',
											language : 'fr_FR',
											plugins: "textcolor code image link",
											toolbar: "fontselect bold italic link image forecolor alignleft aligncenter alignright alignjustify cut copy paste bullist numlist code"
									 });
									</script>
									<textarea class="form-control" id="ip" name="ip" cols="30" rows="10"><?= $config['ip']; ?></textarea>
							</div>
							<div class="form-group">
								<label>Conditions d'utilisation</label>
								<p>Entrez ici l'URL de vos conditions d'utilisation qui devront être acceptées lors de l'inscription.</p>
								<p>Laissez vide pour désactiver.</p>
								<input type="text" class="form-control" name="cgu_register" placeholder="Désactivé" value="<?= $config['cgu_register'] ?>">
							</div>
							<div class="form-group">
									<label>Identifiant du serveur Discord</label>
									<p>Pour ajouter un widget Discord. L'identifiant se trouve dans <a target="_blank" href="http://i.imgur.com/Kog0FLk.png">ce menu</a>.</p>
									<input type="text" class="form-control" name="discordId" value="<?= $config['discordId'] ?>">
							</div>
							<div class="form-group">
									<label>Meilleurs voteurs</label>
									<p>Affiche les 3 meilleurs voteurs ainsi qu'un lien vers la page de vote.</p>
									<select name="vote-sidebar" class="form-control">
											<option value="false"<?= ($theme_config['vote-sidebar'] == "false") ? ' selected' : '' ?>>Non</option>
											<option value="true"<?= ($theme_config['vote-sidebar'] == "true") ? ' selected' : '' ?>>Oui</option>
									</select>
							</div>
							<div class="form-group">
									<label>Footer</label>
									<p>Insérez ici le message du footer, tout en bas de la page.</p>
									<script type="text/javascript">
									tinymce.init({
											selector: "#footer_text",
											height : 100,
											width : '100%',
											language : 'fr_FR',
											plugins: "textcolor code image link",
											toolbar: "fontselect bold italic link image forecolor alignleft aligncenter alignright alignjustify cut copy paste bullist numlist code"
									 });
									</script>
									<textarea class="form-control" id="footer_text" name="footer_text" cols="30" rows="10"><?= $config['footer_text']; ?></textarea>
							</div>
							<h1>Avancé</h1>
							<div class="form-group">
							<label>HTML Supplémentaire de la sidebar</label>
							<p>Ajoutez ici votre propre HTML à ajouter en bas de la sidebar. Utile pour des widgets Twitter ou TeamSpeak.</p>
									<script type="text/javascript">
									tinymce.init({
											selector: "#sidebar_code",
											height : 100,
											width : '100%',
											language : 'fr_FR',
											plugins: "textcolor code image link",
											toolbar: "fontselect bold italic link image forecolor alignleft aligncenter alignright alignjustify cut copy paste bullist numlist code"
									 });
									</script>
									<textarea class="form-control" id="sidebar_code" name="sidebar_code" cols="30" rows="10"><?= $config['sidebar_code']; ?></textarea>
							</div>
							<div class="form-group">
									<label>Compatibilité des particules</label>
									<p>Corrige les problèmes de clic sur certains éléments présents dans certains plugins (forum par exemple). L'interaction avec les particules sera désactivée.</p>
									<select name="particles-compatibility" class="form-control">
										<option value="true"<?= ($theme_config['particles-compatibility'] == "true") ? ' selected' : '' ?>>Oui</option>
									  <option value="false"<?= ($theme_config['particles-compatibility'] == "false") ? ' selected' : '' ?>>Non</option>
									</select>
							</div>
				    </div>

            <div class="col-md-6">
							<h1>Option visuelles</h1>
							<small>Pensez à rafraîchir le cache de votre navigateur quand vous changez le logo (Ctrl+F5).</small>
							<?= $this->element('form.input.upload.img', $form_input) ?>
              <div class="form-group">
									<label>Couleur de navigation</label>
									<small>Couleur générale de la navigation</small>
									<select name="nav-color" class="form-control">
										<option value="#ba2222"<?= ($theme_config['nav-color'] == "#ba2222") ? ' selected' : '' ?>>Rouge</option>
										<option value="#0f1bab"<?= ($theme_config['nav-color'] == "#0f1bab") ? ' selected' : '' ?>>Bleu foncé</option>
											<option value="#129cc5"<?= ($theme_config['nav-color'] == "#129cc5") ? ' selected' : '' ?>>Bleu cyan</option>
											<option value="#c54c12"<?= ($theme_config['nav-color'] == "#c54c12") ? ' selected' : '' ?>>Orange</option>
											<option value="#c5b712"<?= ($theme_config['nav-color'] == "#c5b712") ? ' selected' : '' ?>>Jaune</option>
											<option value="#9112c5"<?= ($theme_config['nav-color'] == "#9112c5") ? ' selected' : '' ?>>Violet</option>
											<option value="#3ec512"<?= ($theme_config['nav-color'] == "#3ec512") ? ' selected' : '' ?>>Vert clair</option>
											<option value="#175f00"<?= ($theme_config['nav-color'] == "#175f00") ? ' selected' : '' ?>>Vert foncé</option>
									</select>
							</div>
							<div class="form-group">
									<label>Activer le texte du Header</label>
									<p>Affiche ou non le sous-titre défini sur un Slider.</p>
									<select name="text-slide" class="form-control">
										<option value="true"<?= ($theme_config['text-slide'] == "true") ? ' selected' : '' ?>>Oui</option>
									  <option value="false"<?= ($theme_config['text-slide'] == "false") ? ' selected' : '' ?>>Non</option>
									</select>
							</div>
							<div class="form-group">
									<label>Animation du texte du Header</label>
									<select name="unslider-animation" class="form-control">
										<option value="horizontal"<?= ($theme_config['unslider-animation'] == "horizontal") ? ' selected' : '' ?>>Horizontal</option>
									<option value="vertical"<?= ($theme_config['unslider-animation'] == "vertical") ? ' selected' : '' ?>>Vertical</option>
									</select>
							</div>
							<div class="form-group">
									<label>Overlay du slider</label>
									<small><a href="http://vegas.jaysalvat.com/documentation/settings/#overlays">Liste des overlays</a></small>
									<select name="vegas-overlay" class="form-control">
										<option value="false"<?= ($theme_config['vegas-overlay'] == "false") ? ' selected' : '' ?>>Aucun</option>
										<option value="01"<?= ($theme_config['vegas-overlay'] == "01") ? ' selected' : '' ?>>N°1</option>
											<option value="02"<?= ($theme_config['vegas-overlay'] == "02") ? ' selected' : '' ?>>N°2</option>
											<option value="03"<?= ($theme_config['vegas-overlay'] == "03") ? ' selected' : '' ?>>N°3</option>
											<option value="04"<?= ($theme_config['vegas-overlay'] == "04") ? ' selected' : '' ?>>N°4</option>
											<option value="05"<?= ($theme_config['vegas-overlay'] == "05") ? ' selected' : '' ?>>N°5</option>
											<option value="06"<?= ($theme_config['vegas-overlay'] == "06") ? ' selected' : '' ?>>N°6</option>
											<option value="07"<?= ($theme_config['vegas-overlay'] == "07") ? ' selected' : '' ?>>N°7</option>
											<option value="08"<?= ($theme_config['vegas-overlay'] == "09") ? ' selected' : '' ?>>N°8</option>
											<option value="09"<?= ($theme_config['vegas-overlay'] == "09") ? ' selected' : '' ?>>N°9</option>
									</select>
							</div>
							<div class="form-group">
									<label>Animation du slider</label>
									<small><a href="http://vegas.jaysalvat.com/documentation/transitions/">Liste des animations</a></small>
									<select name="vegas-transition" class="form-control">
										<option value="fade"<?= ($theme_config['vegas-transition'] == "fade") ? ' selected' : '' ?>>fade</option>
										<option value="fade2"<?= ($theme_config['vegas-transition'] == "fade2") ? ' selected' : '' ?>>fade2</option>
										<option value="slideLeft"<?= ($theme_config['vegas-transition'] == "slideLeft") ? ' selected' : '' ?>>slideLeft</option>
										<option value="slideLeft2"<?= ($theme_config['vegas-transition'] == "slideLeft2") ? ' selected' : '' ?>>slideLeft2</option>
										<option value="slideRight"<?= ($theme_config['vegas-transition'] == "slideRight") ? ' selected' : '' ?>>slideRight</option>
										<option value="slideRight2"<?= ($theme_config['vegas-transition'] == "slideRight2") ? ' selected' : '' ?>>slideRight2</option>
										<option value="slideUp"<?= ($theme_config['vegas-transition'] == "slideUp") ? ' selected' : '' ?>>slideUp</option>
										<option value="slideUp2"<?= ($theme_config['vegas-transition'] == "slideUp2") ? ' selected' : '' ?>>slideUp2</option>
										<option value="slideDown"<?= ($theme_config['vegas-transition'] == "slideDown") ? ' selected' : '' ?>>slideDown</option>
										<option value="slideDown2"<?= ($theme_config['vegas-transition'] == "slideDown2") ? ' selected' : '' ?>>slideDown2</option>
										<option value="zoomIn"<?= ($theme_config['vegas-transition'] == "zoomIn") ? ' selected' : '' ?>>zoomIn</option>
										<option value="zoomIn2"<?= ($theme_config['vegas-transition'] == "zoomIn2") ? ' selected' : '' ?>>zoomIn2</option>
										<option value="zoomOut"<?= ($theme_config['vegas-transition'] == "zoomOut") ? ' selected' : '' ?>>zoomOut</option>
										<option value="zoomOut2"<?= ($theme_config['vegas-transition'] == "zoomOut2") ? ' selected' : '' ?>>zoomOut2</option>
										<option value="swirlLeft"<?= ($theme_config['vegas-transition'] == "swirlLeft") ? ' selected' : '' ?>>swirlLeft</option>
										<option value="swirlLeft2"<?= ($theme_config['vegas-transition'] == "swirlLeft2") ? ' selected' : '' ?>>swirlLeft2</option>
										<option value="swirlRight"<?= ($theme_config['vegas-transition'] == "swirlRight") ? ' selected' : '' ?>>swirlRight</option>
										<option value="swirlRight2"<?= ($theme_config['vegas-transition'] == "swirlRight2") ? ' selected' : '' ?>>swirlRight2</option>
										<option value="burn"<?= ($theme_config['vegas-transition'] == "burn") ? ' selected' : '' ?>>burn</option>
										<option value="burn2"<?= ($theme_config['vegas-transition'] == "burn2") ? ' selected' : '' ?>>burn2</option>
										<option value="blur"<?= ($theme_config['vegas-transition'] == "blur") ? ' selected' : '' ?>>blur</option>
										<option value="blur2"<?= ($theme_config['vegas-transition'] == "blur2") ? ' selected' : '' ?>>blur2</option>
										<option value="flash"<?= ($theme_config['vegas-transition'] == "flash") ? ' selected' : '' ?>>flash</option>
										<option value="flash2"<?= ($theme_config['vegas-transition'] == "flash2") ? ' selected' : '' ?>>flash2</option>
									</select>
							</div>
							<div class="form-group">
									<label>Particules</label>
									<p>Activer ou non les particules.</p>
									<p>Vous pouvez créer vos propres particules <a href="http://vincentgarreau.com/particles.js/">ICI</a>.</p>
									<p>Une fois que vous avez terminé, cliquez sur "Download current config (json)", et collez le contenu du fichier téléchargé dans le fichier "particles.css". Vous pouvez accéder au fichier "particles.css" dans "Modifier les fichiers (CSS)", dans la liste des thèmes.</p>
									<select name="particles-enabled" class="form-control">
											<option value="false"<?= ($theme_config['particles-enabled'] == "false") ? ' selected' : '' ?>>Non</option>
											<option value="true"<?= ($theme_config['particles-enabled'] == "true") ? ' selected' : '' ?>>Oui</option>
									</select>
							</div>
							<div class="form-group">
									<label>Activer le loader</label>
									<p>Affiche ou non le loader pendant le chargement de la page. Désactivez-le en cas de problème de chargement de la page.</p>
									<select name="loader" class="form-control">
										<option value="true"<?= ($theme_config['loader'] == "true") ? ' selected' : '' ?>>Oui</option>
									  <option value="false"<?= ($theme_config['loader'] == "false") ? ' selected' : '' ?>>Non</option>
									</select>
							</div>
							<div class="form-group">
									<label>Afficher les statistiques</label>
									<p>Les statistiques (Visites du jour, Visites totales, Nombre d'inscrits du jour, Nombre d'inscrits total) s'afficheront sur la sidebar.</p>
									<select name="sidebar-stats" class="form-control">
										<option value="true"<?= ($theme_config['sidebar-stats'] == "true") ? ' selected' : '' ?>>Oui</option>
									  <option value="false"<?= ($theme_config['sidebar-stats'] == "false") ? ' selected' : '' ?>>Non</option>
									</select>
							</div>
							<div class="form-group">
									<label>Gif du loader</label>
									<p>Entrez le gif qui sera affiché sur le loader ici</p>
									<textarea class="form-control" name="gifloader" type="text" placeholder="URL ou base64"><?= $config['gifloader']; ?></textarea>
							</div>
              <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">

              <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
              <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>" type="button" class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>

            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
