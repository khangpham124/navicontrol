<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/navicontrol/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="top">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->
<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->


<div id="sliderTop">
	<ul class="slider">
		<?php
			$wp_query = new WP_Query();
			$param = array (
			'posts_per_page' => '3',
			'post_type' => 'slider',
			'post_status' => 'publish',
			'order' => 'ASC',
			'paged' => $paged,
			);
			$wp_query->query($param);
			if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
			$title_slide_en = get_field('cf_title_eng');
			$title_slide_vn = $post->post_title;
			$content_slide_en = get_field('cf_content_eng');
			$content_slide_vn = $post->post_content;
			$imagePC = wp_get_attachment_image_src(get_field('cf_pc_image'),'full');
			$imageSP = wp_get_attachment_image_src(get_field('cf_sp_image'),'full');
		?>
		<li>
			<img src="<?php echo thumbCrop($imagePC[0],1920,0); ?>" class="pc imgPc" alt="">
			<img src="<?php echo thumbCrop($imageSP[0],640,727); ?>" class="sp" alt="">
			<div class="text">
				<h2><?php echo ${'title_slide_'.$langweb} ?></h2>
				<div class="desc"><?php echo ${'content_slide_'.$langweb} ?></div>
				<?php if(get_field('cf_link_image')!='') { ?>
					<a href="<?php echo get_field('cf_link_image'); ?>" class="btn">Learn more</a>
				<?php } ?>
			</div>
		</li>
		<?php endwhile;endif; ?>
	</ul>
</div>

<div class="wrap15">
	<section class="aboutTop wow fadeInUp">
		<h2 class="h2_page h2_page--white"><?php echo ${'title_about_'.$langweb} ?></h2>
		<div class="desc">
		We are pleased to send you our respectfull greetings on behalf of the Board of Management of NamViet Inspection Company (NAVICONTROL) on the occasion of our opening of the New Office at 4/6  no.3 St., Ward Binh An, 2 Dist, HCMC, Viet Nam.
		<br><br>
		By this occasion also, we, through this updated Website would like to introduce to you our scopes of business activity and should be very obliged if you could let us have your kind support and cooperation.
		</div>
	</section>


<h2 class="h2_page wow fadeInUp h2_page--top--service"><?php echo ${'title_services_'.$langweb} ?></h2>
<div class="textTop01 wow fadeInUp">
Supply inspection services of goods, material, machinery/equipment, sea-land means of transportation, means of cargo handling, consultancy, appraising the assets, real property … <br>
for purposes: sale/buying, on-hire/off-hire, delivering/receiving, technology transfer,<br>
customs’ clearance, balance of investment capital …
</div>

<ul class="lstSer flexBox flexBox--between flexBox--center flexBox--wrap">
	<?php
		$wp_query = new WP_Query();
		$param = array (
		'posts_per_page' => '7',
		'post_type' => 'services',
		'post_status' => 'publish',
		'order' => 'DESC',
		'meta_query' => array(
		array(
		'key' => 'cf_show_on_top',
		'value' => 'yes',
		'compare' => '='
		))
		);
		$wp_query->query($param);
		if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
		$icon = wp_get_attachment_image_src(get_field('cf_icon'),'full');
		$icon_w = wp_get_attachment_image_src(get_field('cf_icon_w'),'full');
		$title_ser_vn = $post->post_title;
		$title_ser_en = get_field('cf_title_eng');
	?>
	<li class="wow fadeInUp" data-wow-delay="0.3s">
		<p class="icon">
		<img src="<?php echo thumbCrop($icon[0],55,55); ?>" class="ori" alt="">
		<img src="<?php echo thumbCrop($icon_w[0],55,55); ?>" class="hover" alt="">
		</p>
		<p class="matchHeight"><a href="<?php the_permalink(); ?>"><?php echo ${'title_ser_'.$langweb} ?></a></p>
	</li>
	<?php endwhile;endif; ?>
	<li class="wow fadeInUp" data-wow-delay="1.2s">
		<p class="icon">	
		<img src="<?php echo APP_URL; ?>img/top/icon08.png" class="ori" alt="">
		<img src="<?php echo APP_URL; ?>img/top/icon08_w.png" class="hover" alt="">
		</p>
		<p class="matchHeight"><a href="<?php echo APP_URL; ?>services">View more</a></p>
	</li>
</ul>
</div>

<div class="flexBox flexBox--between flexBox--center flexBox--wrap">
	<div class="boxLink biggerlink wow fadeInLeft">
		<div class="wrap">
		<a href="<?php echo APP_URL ?>guide/"><img src="<?php echo APP_URL; ?>img/top/img01.jpg" class="" alt=""></a>
	</div>
		<div class="text">
			<h3 class="h2_page h2_page--white"><?php echo ${'title_guide_'.$langweb} ?></h3>
			<p class="desc">By the following information ways,<br>
clients are pleased to contact us<br>
for the first necessary news</p>
		</div>
	</div>

	<div class="boxLink biggerlink wow fadeInRight">
		<div class="wrap">
		<a href="<?php echo APP_URL ?>document/"><img src="<?php echo APP_URL; ?>img/top/img02.jpg" class="" alt=""></a>
		</div>
		<div class="text">
			<h3 class="h2_page h2_page--white"><?php echo ${'title_document_'.$langweb} ?></h3>
		</div>
	</div>
</div>	

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

<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->
<script src="<?php echo APP_URL; ?>common/js/slick.js"></script>
<script>
$('.slider').slick({
  dots: false,
  infinite: true,
  speed: 1100,
  autoplay: true,
  fade: true,
  autoplaySpeed: 3000,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 767,
      settings: {
				arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
				arrows: false,
        slidesToScroll: 1
      }
    }
  ]
});

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
</body>
</html>	