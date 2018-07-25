<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/navicontrol/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="services" class="subpage">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="head_Sub">
<h2><?php echo ${'title_services_'.$langweb} ?></h2>
<?php
	$title_vn = $post->post_title;
	$title_en = get_field('cf_title_eng');
	$content_vn = $post->post_content;
	$content_en = get_field('cf_content_eng');
	$thumb_img = get_post_thumbnail_id($post->ID);
	$thumb_url = wp_get_attachment_image_src($thumb_img,'full');
	$icon = wp_get_attachment_image_src(get_field('cf_icon'),'full');
?>
	<ul class="bread">
		<li><a href="<?php echo APP_URL; ?>"><?php echo ${'title_home_'.$langweb} ?></a></li>
		<li><a href="<?php echo APP_URL; ?>services"><?php echo ${'title_services_'.$langweb} ?></a></li>
		<li><?php echo ${'title_'.$langweb} ?></li>
	</ul>
</div>

<div class="maxW">
	<p class="thumbService"><img src="<?php echo $thumb_url[0]; ?>" class="" alt=""></p>
	<h3 class="titleService"><img src="<?php echo thumbCrop($icon[0],50,50); ?>"><span><?php echo ${'title_'.$langweb} ?></span></h3>
	<section class="serviceContent"><?php echo ${'content_'.$langweb} ?></section>
	<?php
		$prev_post = get_previous_post();
		$next_post = get_next_post();
	?>
	<ul class="naviPage">
		<li class="prev <?php if (empty( $prev_post )) { ?>no_post<?php } ?>">
		<?php if (!empty( $prev_post )): ?>
			<a href="<?php echo APP_URL; ?>services/<?php echo $prev_post->post_name; ?>"><?php echo ${'btn_prev_'.$langweb} ?></a>
		<?php endif; ?>
		</li>
		<li><a href="<?php echo APP_URL; ?>services/"><?php echo ${'btn_list_'.$langweb} ?></a></li>
		<li class="next <?php if (empty( $next_post )) { ?>no_post<?php } ?>">
		<?php if (!empty( $next_post )): ?>
			<a href="<?php echo APP_URL; ?>services/<?php echo $next_post->post_name; ?>"><?php echo ${'btn_next_'.$langweb} ?></a>
		<?php endif; ?>
		</li>
	</ul>
</div>

<div class="wrapLogo">
	<div class="maxW">
		<ul class="slideLogo">
		<?php
			$wp_query = new WP_Query();
			$param = array (
			'posts_per_page' => '-1',
			'post_type' => 'client',
			'post_status' => 'publish',
			'order' => 'DESC',
			'paged' => $paged,
			);
			$wp_query->query($param);
			if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
			$thumb_img = get_post_thumbnail_id($post->ID);
			$thumb_url = wp_get_attachment_image_src($thumb_img,'full');
		?>
		<li><img src="<?php echo thumbCrop($thumb_url[0],0,123); ?>" alt="<?php the_title(); ?>"></li>
		<?php endwhile;endif; ?>
		</ul>
	</div>
</div>

<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->
<script src="<?php echo APP_URL; ?>common/js/slick.js"></script>
<script>
	$('.slideLogo').slick({
			speed: 5000,
			autoplay: true,
			autoplaySpeed: 0,
			centerMode: true,
			cssEase: 'linear',
			slidesToShow: 1,
			slidesToScroll: 1,
			variableWidth: true,
			infinite: true,
			initialSlide: 1,
			arrows: false,
			buttons: false,
	});
</script>
<script>
$('.lstSev li').hide();
$(document).ready(function () {
	size_li = $(".lstSev li").size();
	x = 9;
	if(size_li>= 9) {
		$('.lstSev li:lt('+x+')').show(300);
		$(window).scroll(function() {
			var sT = $(window).scrollTop();
            var a = $('.scrollmore').offset().top;
            var toS = a - 400;
            if (sT > toS) {
                x = (x+8 <= size_li) ? x+8 : size_li;
                $('.lstSev li:lt('+x+')').show(300);
                $('.lstSev li:lt('+x+')').addClass('showItem');
                
			}
            size_li_show = $(".lstSev .showItem").size();
            if(size_li_show == 30 ) {
                $('.scrollmore').hide(200);
            }
		});	
	}
});
</script>
</body>
</html>	