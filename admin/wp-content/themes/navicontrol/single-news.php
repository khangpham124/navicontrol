<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/navicontrol/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
</head>

<body id="news" class="subpage">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="head_Sub">
	<h2><?php echo ${'title_news_'.$langweb} ?></h2>
	<ul class="bread">
		<li><a href="<?php echo APP_URL; ?>"><?php echo ${'title_home_'.$langweb} ?></a></li>
		<li><?php echo ${'title_news_'.$langweb} ?></li>
	</ul>
</div>

<div class="maxW">
	<?php
		$thumg_img = get_post_thumbnail_id($post->ID);
		$thumb_url = wp_get_attachment_image_src($thumg_img,'full');
		$title_vn = $post->post_title;
		$title_en = get_field('cf_title_eng');
		$desc_vn = $post->post_content;
		$desc_en = get_field('cf_content_eng');
	?>
	<p class="thumbNews"><img src="<?php echo $thumb_url[0]; ?>" class="" alt=""></p>
	<p class="titleDetail"><?php echo ${'title_'.$langweb} ?></p>
	<div class="newsContent"><?php echo ${'desc_'.$langweb} ?></div>


	<?php
		$prev_post = get_previous_post();
		$next_post = get_next_post();
	?>
	<ul class="naviPage">
		<li class="prev">
		<?php if (!empty( $prev_post )): ?>
			<a href="<?php echo APP_URL; ?>news/<?php echo $prev_post->post_name; ?>"><?php echo ${'btn_prev_'.$langweb} ?></a>
		<?php endif; ?>
		</li>
		<li><a href="<?php echo APP_URL; ?>news/"><?php echo ${'btn_list_'.$langweb} ?></a></li>
		<li class="next">
		<?php if (!empty( $next_post )): ?>
			<a href="<?php echo APP_URL; ?>news/<?php echo $next_post->post_name; ?>"><?php echo ${'btn_next_'.$langweb} ?></a>
		<?php endif; ?>
		</li>
	</ul>
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