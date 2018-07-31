<?php $search_slider = ClassRegistry::init('Slider')->find('all'); ?>
<script>

$(function($) {
    $("#loader").fadeOut(1000);
    $(".header").vegas({
        slides: [
            {
                src: "<?= $search_slider[0]['Slider']['url_img']; ?>",
                <?php if ($theme_config['slider-video'] != ""): ?>
                video: {
                    src: ['<?= $theme_config['slider-video']; ?>'],
                    loop: true,
                    mute: true,
                },
                delay: <?= $theme_config['slider-video-length']; ?> * 1000,
                <?php endif; ?>
            },
            <?php if ($theme_config['slider-video-loop'] != "true"): ?>
                <?php foreach (array_slice($search_slider, 1) as $k => $v) { ?>
                { src: "<?= $v['Slider']['url_img'] ?>" },
                <?php } ?>
            <?php endif; ?>
        ],
        overlay: 'https://cdnjs.cloudflare.com/ajax/libs/vegas/2.3.1/overlays/'+'<?= $theme_config['vegas-overlay']; ?>'+'.png',
        transition: '<?= $theme_config['vegas-transition']; ?>',
    });
    $('.textslide').unslider({
        nav: false,
        arrows: false,
        autoplay: true,
        animation: '<?= $theme_config['unslider-animation']; ?>',
			  delay: 5000,
        animateHeight: false
    });
    <?php if($theme_config['particles-enabled'] == "true"): ?>
    particlesJS.load('particles-js', '<?= $this->webroot; ?>theme/Justice/css/particles.css', function() {
        console.log('callback - particles.js config loaded');
    });
    <?php endif; ?>	
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