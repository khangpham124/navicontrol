<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/navicontrol/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
</head>

<body id="document" class="subpage">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="head_Sub">
	<h2><?php echo ${'title_document_'.$langweb} ?></h2>
	<ul class="bread">
		<li><a href="<?php echo APP_URL; ?>"><?php echo ${'title_home_'.$langweb} ?></a></li>
		<li><?php echo ${'title_document_'.$langweb} ?></li>
	</ul>
</div>

<div class="maxW">
	<ul class="lstDocumnet clearfix">
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts($query_string . '&orderby=post_date&order=desc&posts_per_page=10&paged=' . $paged); 
			if(have_posts()):while(have_posts()) : the_post();
			$title_vn = $post->post_title;
			$title_en = get_field('cf_title_eng');
			$thumb_img = get_post_thumbnail_id($post->ID);
			$thumb_url = wp_get_attachment_image_src($thumb_img,'full');
			$file = get_field('cf_file_upload');
		?>
		<li>
			<div class="wrap">
				<div class="thumb">
				<div class="over"><a href="<?php echo $file; ?>" target="_blank"><img src="<?php echo APP_URL ?>img/subpage/icon_down.svg"></a></div>
					<?php if($thumb_url[0]!='') { ?>
					<img src="<?php echo thumbCrop($thumb_url[0],630,440) ?>" alt="<?php echo ${'title_'.$langweb} ?>">
					<?php } else { ?>
					<img src="<?php echo APP_URL; ?>img/subpage/noImg.jpg" alt="<?php echo ${'title_'.$langweb} ?>">
					<?php } ?>
				</div>
				<p class="icon"><a href="<?php echo $file; ?>" target="_blank"><img src="<?php echo APP_URL ?>img/subpage/icon_down2.svg"></a></p>
				<p class="title matchHeight"><?php echo ${'title_'.$langweb} ?></p>
			</div>
		</li>
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

</body>
</html>	