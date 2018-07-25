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
	<ul class="lstNews">
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts($query_string . '&orderby=post_date&order=desc&posts_per_page=6&paged=' . $paged); 
			if(have_posts()):while(have_posts()) : the_post();
			$thumg_img = get_post_thumbnail_id($post->ID);
			$thumb_url = wp_get_attachment_image_src($thumg_img,'full');
			$title_vn = $post->post_title;
			$title_en = get_field('cf_title_eng');
			$desc_vn = $post->post_content;
			$desc_en = get_field('cf_content_eng');
		?>	
		<li>
			<p class="thumb"><img src="<?php echo thumbCrop($thumb_url[0],600,415); ?>" class="" alt=""></p>
			<div class="overflow">
				<p class="title"><a href="<?php the_permalink(); ?>"><?php echo ${'title_'.$langweb} ?></a></p>
				<div class="desc">
				<?php
					$content = ${'desc_'.$langweb};
					$text= strip_tags($content, '<br />');
					if(mb_strlen($text)>200) { 
					$desc= mb_substr($text,0,200) ; 
					echo $desc ;
					} else {echo $text;}
				?>
				</div>
				<a href="<?php the_permalink(); ?>" class="more"><?php echo ${'btn_news_'.$langweb} ?></a>
			</div>
		</li>
	<?php endwhile; endif; ?>
	</ul>
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
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