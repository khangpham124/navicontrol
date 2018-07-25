<?php /* Template Name: About */
include($_SERVER["DOCUMENT_ROOT"] . "/projects/navicontrol/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
</head>

<body id="about" class="subpage">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="head_Sub">
	<h2><?php echo ${'title_about_'.$langweb} ?></h2>
	<ul class="bread">
		<li><a href="<?php echo APP_URL; ?>"><?php echo ${'title_home_'.$langweb} ?></a></li>
		<li><?php echo ${'title_about_'.$langweb} ?></li>
	</ul>
</div>

<div class="maxW">
	<div class="flexBox flexBox--between aboutBox">
		<p class="imgAbout"><img src="<?php echo APP_URL; ?>img/subpage/img_about1.jpg" class="" alt=""></p>
		<div class="descAbout">
			<?php
				$title_page_en = 'INTRODUCTION';
				$title_page_vn = '<span>Thư ngỏ</span> của Công ty Cổ phần Giám định Nam Việt';
				$title_sub_en = 'SCOPE OF ACTIVITY';
				$title_sub_vn = 'Lĩnh vực hoạt động';
				$text_intro_en = get_field('cf_text_intro_eng');
				$text_intro_vn = get_field('cf_text_intro');
				$cont_page_en = get_field('cf_content_eng');
				$cont_page_vn = $post->post_content;
			?>
			<p class="title"><?php echo ${'title_page_'.$langweb} ?></p>
			<?php echo ${'cont_page_'.$langweb} ?>
		</div>
	</div>
</div>

<div class="bgAbout">
	<div class="maxW">
		<h3><?php echo ${'title_sub_'.$langweb} ?></h3>
		<div class="desc"><?php echo ${'text_intro_'.$langweb} ?></div>
		<ul class="lstAbout flexBox flexBox--between flexBox--wrap">
			<?php
				$wp_query = new WP_Query();
				$param = array (
				'posts_per_page' => '-1',
				'post_type' => 'services',
				'post_status' => 'publish',
				'order' => 'ASC',
				);
				$wp_query->query($param);
				$numb_serv = count(get_posts($param));
				if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
				$service_name_vn = $post->post_title;
				$service_name_en = get_field('cf_title_eng');
			?>
			<li><span></span><a href="<?php the_permalink(); ?>"><?php echo ${'service_name_'.$langweb} ?></a></li>
			<?php endwhile;endif; ?>
		</ul>
	</div>
</div>
<?php wp_reset_query(); ?>
<div class="maxW imgSha">
	<?php
		while(has_sub_field('cf_image_certificate')):
		$image = wp_get_attachment_image_src(get_sub_field('img'),'full');
	?>
	<img src="<?php echo $image[0]; ?>" class="" alt="">
	<?php endwhile; ?>
</div>



<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->

</body>
</html>	