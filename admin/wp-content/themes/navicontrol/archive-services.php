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
	<ul class="bread">
		<li><a href="<?php echo APP_URL; ?>"><?php echo ${'title_home_'.$langweb} ?></a></li>
		<li><?php echo ${'title_services_'.$langweb} ?></li>
	</ul>
</div>

<div class="maxW serviceWrap">
	<ul class="lstSev clearfix">
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts($query_string . '&orderby=post_date&order=asc&posts_per_page=6&paged=' . $paged); 
			if(have_posts()):while(have_posts()) : the_post();
			$title_vn = $post->post_title;
			$title_en = get_field('cf_title_eng');
			$thumb_img = get_post_thumbnail_id($post->ID);
			$thumb_url = wp_get_attachment_image_src($thumb_img,'full');
			$icon = wp_get_attachment_image_src(get_field('cf_icon'),'full');
		?>
		<li class="biggerlink">
			<div class="wrap">
				<p class="thumb">
					<?php if($thumb_url[0]!='') { ?>
					<img src="<?php echo thumbCrop($thumb_url[0],630,440) ?>" alt="<?php echo ${'title_'.$langweb} ?>">
					<?php } else { ?>
					<img src="<?php echo APP_URL; ?>img/subpage/noImg.jpg" alt="<?php echo ${'title_'.$langweb} ?>">
					<?php } ?>
				</p>
				<div class="title matchHeight">
					<?php if($icon[0]!='') { ?>
					<img src="<?php echo thumbCrop($icon[0],50,50); ?>">
					<?php } ?>
					<p class="name"><a href="<?php the_permalink(); ?>"><?php echo ${'title_'.$langweb} ?></a></p>
				</div>
			</div>
		</li>
		<?php endwhile;endif; ?>
	</ul>
	<div id="moreBox"></div>
</div>
<p class="scrollmore" id="scrollmore"></p>
<div class="wrapLogo" id="wrapLogo">
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

<?php
	$count_posts = wp_count_posts('services');
	$total = $count_posts->publish;
	$lastPage = ceil(($total-6)/6);
?>
<script>
$(function(){
	var
		$win = $(window),
		$body = $('body'),
		innerHeight = $win.innerHeight(),
		scrollHeight = $(document).height();
		scrollTop = 0,
		loading = false
	;
	var j = 0;
	var i = 0;
	console.log(scrollHeight);
	$win.resize(function(){ innerHeight = $win.innerHeight()})
	$win.scroll(function(e){
		//if(loading) return;
		scrollTop = $win.scrollTop();
		console.log(scrollTop);
		if(scrollTop + innerHeight + 50 > scrollHeight){
			// loading = true;
			j++;
			if (j <= <?php echo $lastPage; ?>) {
				i = i + 6;
				$('<div id="moreBox' + i + '"><p class="scrollmore"><img src="<?php echo APP_URL ?>img/subpage/loading.gif"><span>Loading</span></p></div>').appendTo("#moreBox");
				var divappend = $('#moreBox' + i);
				$.ajax({
					url: 'http://teddycoder.com/projects/navicontrol/ajax/index.php?more=' + i,
					type: 'POST',
					cache: true,
					success: function (data) {
						divappend.html(data);
						// loading = false;
					}
				});
			}
		}
	})
});
</script>
</body>
</html>	