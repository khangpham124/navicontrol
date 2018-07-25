<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/navicontrol/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
</head>

<body id="career" class="subpage">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="head_Sub">
	<h2><?php echo ${'title_career_'.$langweb} ?></h2>
	<ul class="bread">
		<li><a href="<?php echo APP_URL; ?>"><?php echo ${'title_home_'.$langweb} ?></a></li>
		<li><?php echo ${'title_career_'.$langweb} ?></li>
	</ul>
</div>

<div class="maxW">
	<ul class="lstJobDesc flexBox flexBox--wrap flexBox--between flexBox--center">
		<?php
			$wp_query = new WP_Query();
			$param = array (
			'posts_per_page' => '-1',
			'post_type' => 'career',
			'post_status' => 'publish',
			'order' => 'DESC',
			'paged' => $paged,
			);
			$wp_query->query($param);
			if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
			$job_title_en = get_field('cf_title_eng');
			$job_title_vn = $post->post_title;
		?>
		<li><a href="#<?php echo $post->ID; ?>"><?php echo ${'job_title_'.$langweb} ?></a></li>
		<?php endwhile;endif; ?>
	</ul>

	<ul class="lstJob">
		<?php
			$wp_query = new WP_Query();
			$param = array (
			'posts_per_page' => '-1',
			'post_type' => 'career',
			'post_status' => 'publish',
			'order' => 'DESC',
			'paged' => $paged,
			);
			$wp_query->query($param);
			if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
			$job_title_en = get_field('cf_title_eng');
			$job_title_vn = $post->post_title;
		?>	
		<li id="<?php echo $post->ID; ?>">
			<h3 class="jobTitle"><?php echo ${'job_title_'.$langweb} ?></h3>
			<ul class="jobDesc">
				<?php if($langweb=='vn') { ?>
					<?php while(has_sub_field('job_desc')): ?>
					<li>
						<h4 class="jobHead"><?php echo get_sub_field('cf_head_skill'); ?></h4>
						<div class="jobContent">
						<?php echo get_sub_field('cf_skill_desc'); ?>
							<ol>
								<?php while(has_sub_field('cf_list_skill')): ?>
								<li><?php echo get_sub_field('item'); ?></li>
								<?php endwhile; ?>
							<ol>
						</div>
					</li>
					<?php endwhile; ?>
				<?php } else { ?>
					<?php while(has_sub_field('job_desc_eng')): ?>
						<li>
							<h4 class="jobHead"><?php echo get_sub_field('cf_head_skill'); ?></h4>
							<div class="jobContent">
							<?php echo get_sub_field('cf_skill_desc'); ?>
								<ol>
									<?php while(has_sub_field('cf_list_skill')): ?>
									<li><?php echo get_sub_field('item'); ?></li>
									<?php endwhile; ?>
								<ol>
							</div>
						</li>
					<?php endwhile; ?>	
				<?php } ?>
			</ul>
			<p class="jobNavi">
				<a href="<?php the_permalink(); ?>" class="btnApply"><?php echo ${'btn_career_'.$langweb} ?></a>
				<a href="#wrapper" class="topJob"><?php echo ${'btn_top_'.$langweb} ?></a>
			</p>
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