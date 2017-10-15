<?php $search_slider = ClassRegistry::init('Slider')->find('all'); ?>

<script>

$(function($) {
		$("#loader").fadeOut(1000);
    $(".header").vegas({
        slides: [
           <?php $i = 0; foreach ($search_slider as $k => $v) { ?>
              { src: "<?= $v['Slider']['url_img'] ?>" },
            <?php } ?>
        ],
        overlay: 'https://cdnjs.cloudflare.com/ajax/libs/vegas/2.3.1/overlays/'+'<?= $theme_config['vegas-overlay']; ?>'+'.png',
        transition: '<?= $theme_config['vegas-transition']; ?>',
    });
    $('.textslide').unslider({
        nav: false,
        arrows: false,
        autoplay: true,
        animation: '<?= $theme_config['unslider-animation']; ?>',
        animateHeight: false
    });
    <?php if($theme_config['particles-enabled'] == "true"): ?>
				particlesJS.load('particles-js', '/theme/Justice/css/particles.css', function() {
					console.log('callback - particles.js config loaded');
				});
    <?php endif; ?>	
		/* Particles compatibility */
		<?php if($theme_config['particles-compatibility'] == "true"): ?>
				$("#particles-js").css('pointer-events', "none");
		<?php endif; ?>
});

$(".login-avatar, .avatar").hide();

$("img:not([class~='noresp'])").addClass("img-responsive");
$(window).on('load', function(){
	
	/* Fade avatar */
	 $(".login-avatar, .avatar").each(function(i){
		 $(this).fadeIn(1000);
	 });
	
})
</script>