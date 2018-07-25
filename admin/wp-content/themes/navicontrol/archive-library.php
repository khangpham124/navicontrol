<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/navicontrol/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel='stylesheet' href='<?php echo APP_URL; ?>common/js/popup/plugins/combine/style.css' type='text/css' media='all'>
<link rel='stylesheet' href='<?php echo APP_URL; ?>common/js/popup/include/css/page-builder.css' type='text/css' media='all'>
</head>

<body id="library" class="subpage">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="head_Sub">
	<h2><?php echo ${'title_library_'.$langweb} ?></h2>
	<ul class="bread">
		<li><a href="<?php echo APP_URL; ?>"><?php echo ${'title_home_'.$langweb} ?></a></li>
		<li><?php echo ${'title_library_'.$langweb} ?></li>
	</ul>
</div>

<div class="maxW">
	<ul class="lstAnchor lstAnchor--2">
		<li><a href="<?php echo APP_URL; ?>library/" data-attribute="photos"><?php echo ${'tab_photo_'.$langweb} ?></a></li>
		<li><a href="<?php echo APP_URL; ?>librarycat/videos/" data-attribute="videos"><?php echo ${'tab_video_'.$langweb} ?></a></li>
	</ul>
	<div class="tabContent">
		<div class="tabBox" id="photos">
		<div class="gdlr-core-pbf-element">
				<div class="gdlr-core-gallery-item gdlr-core-item-pdb gdlr-core-gallery-item-style-grid ">
					<div class="gdlr-core-gallery-item-holder gdlr-core-js-2 libPhotos clearfix" data-layout="fitrows">
						<?php
							$wp_query = new WP_Query();
							$param=array(
							'post_type'=>'library',
							'order' => 'ASC',
							'posts_per_page' => '9',
							'paged' => $paged,
							'tax_query' => array(
							array(
							'taxonomy' => 'librarycat',
							'field' => 'slug',
							'terms' => 'photos'
							)
							)
							);
							$wp_query->query($param);
							if($wp_query->have_posts()):while($wp_query->have_posts()) : $wp_query->the_post();
							$thumb_img = get_post_thumbnail_id($post->ID);
							$thumb_url = wp_get_attachment_image_src($thumb_img,'full');
							$title_vn = $post->post_title;
					$title_en = get_field('cf_title_en');
						?>
						<div class="libItem">
							<div class="wrap">
								<div class="gdlr-core-gallery-list gdlr-core-media-image">
									<a class="gdlr-core-ilightbox gdlr-core-js " href="<?php echo $thumb_url[0]; ?>" data-ilightbox-group="gdlr-core-img-group-1">
									<img src="<?php echo thumbCrop($thumb_url[0],320,224); ?>" alt="" ><span class="gdlr-core-image-overlay "></span>
									<p class="title"><?php echo ${'title_'.$langweb} ?></p>
									</a>
								</div>
							</div>
						</div>
						<?php endwhile;endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	</div>
</div>

<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->
<div class="overlay"></div>
<div class="popVideo"></div>

<script type='text/javascript' src='<?php echo APP_URL; ?>common/js/popup/jquery/ui/effect.min.js'></script>
<script type='text/javascript' src='<?php echo APP_URL; ?>common/js/popup/plugins/combine/script.js'></script>
<script type='text/javascript' src='<?php echo APP_URL; ?>common/js/popup/include/js/page-builder.js'></script>
<script>
$(function() {
	$('#photos').show();
	$('.lstAnchor li:nth-child(1)').addClass('active');
	// $('.lstAnchor li').click(function() {
	// 	$('.lstAnchor li').removeClass('active');
	// 	var child = $(this).find('a');
	// 	$(this).addClass('active');
	// 	var showBox = child.attr('data-attribute');
	// 	//alert(showBox);
	// 	$('.tabBox').fadeOut(200);
	// 	$('#' + showBox).fadeIn(200);
	// });
    $(".youtube").each(function() {
        // Based on the YouTube ID, we can easily find the thumbnail image
        $(this).css('background-image', 'url(http://i.ytimg.com/vi/' + this.id + '/sddefault.jpg)');
        // Overlay the Play icon to make it look like a video player
		$(this).append($('<div/>', {'class': 'play'}));
	});
	$('.lstVideo li').click(function() {
		$('.overlay').fadeIn(300);
		$(".popVideo").fadeIn(300);
		elm = $(this);
		var video_id = elm.find('.youtube').attr('id');
		$(".popVideo").empty();
		$(".popVideo").append('<iframe width="100%" height="442" src="https://www.youtube.com/embed/'+video_id+'?autoplay=1&showinfo=0&rel=0&autohide=1&modestbranding=0" allowfullscreen=""></iframe>')
	});
	function closePop() {
		$('.overlay').fadeOut(300);
		$(".popVideo").fadeOut(300);
		$(".popVideo").empty();
	}
	$('.overlay').click(function() {
		closePop();
	});
 });
</script>
</body>
</html>	