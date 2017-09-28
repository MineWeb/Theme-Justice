<h1><?= $Lang->get("DONATION") ?></h1>
<?= (empty($donations)) ? "<p>Il est impossible de faire un don pour le serveur actuellement.</p>" : "<h2>Cliquez sur le bouton Faire un don pour être redirigé sur Paypal. <br>Merci de votre soutien !</h2>"?>

<?php foreach($donations as $k=>$v): $v = current($v); ?>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input name="currency_code" type="hidden" value="EUR" />
        <input name="shipping" type="hidden" value="0.00" />
        <input name="tax" type="hidden" value="0.00" />
        <input name="return" type="hidden" value="#success" />
        <input name="cancel_return" type="hidden" value="#erreur" />
        <input name="cmd" type="hidden" value="_donations" />
        <input name="business" type="hidden" value="<?= $v['email'] ?>" />
        <input name="item_name" type="hidden" value="Dons" />
        <input name="no_note" type="hidden" value="1" />
        <input name="lc" type="hidden" value="FR" />
        <input name="bn" type="hidden" value="PP-BuyNowBF" />
        <input name="submit" src="https://www.paypalobjects.com/fr_XC/i/btn/btn_donate_LG.gif" type="image" style="text-align:center"/>
    </form>
<?php endforeach; ?>

