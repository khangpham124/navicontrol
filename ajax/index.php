<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/navicontrol/app_config.php");
include(APP_PATH."admin/wp-load.php");

	if(!isset($_COOKIE['lang_web'])) {
		$langweb = 'vn';
	} else {
		$langweb = $_COOKIE['lang_web'];
	}
$more = $_GET['more'];
?>
<ul class="lstSev clearfix">
		<?php
			$param=array(
				'post_type' => 'services',
				'post_status' => 'publish',
				'order' => 'ASC',
				'posts_per_page' => '6',
				'offset' => $more
			);
			query_posts($param);
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
				<div class="title">
					<?php if($icon[0]!='') { ?>
					<img src="<?php echo thumbCrop($icon[0],50,50); ?>">
					<?php } ?>
					<p class="name matchHeight"><a href="<?php the_permalink(); ?>"><?php echo ${'title_'.$langweb} ?></a></p>
				</div>
			</div>
		</li>
		<?php endwhile;endif; ?>
</ul>