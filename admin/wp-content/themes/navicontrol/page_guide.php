<?php /* Template Name: Guide */
include($_SERVER["DOCUMENT_ROOT"] . "/projects/navicontrol/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
</head>

<body id="guide" class="subpage">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="head_Sub">
	<h2><?php echo ${'title_guide_'.$langweb} ?></h2>
	<ul class="bread">
		<li><a href="<?php echo APP_URL; ?>"><?php echo ${'title_home_'.$langweb} ?></a></li>
		<li><?php echo ${'title_guide_'.$langweb} ?></li>
	</ul>
</div>

<div class="maxW">
	<ul class="lstAnchor lstAnchor--3">
		<li><a href="#anchor1"><?php echo ${'guide_1_'.$langweb} ?></a></li>
		<li><a href="#anchor2"><?php echo ${'guide_2_'.$langweb} ?></a></li>
		<li><a href="#anchor3"><?php echo ${'guide_3_'.$langweb} ?></a></li>
	</ul>

	<h3 class="h2_page" id="anchor1"><?php echo ${'guide_1_'.$langweb} ?></h3>
	<?php
		$anchor_1_en = get_field('cf_anchor1_eng');
		$anchor_1_vn = get_field('cf_anchor1');
	?>
	<div class="txtGuide">
		<?php echo ${'anchor_1_'.$langweb} ?>
	</div>
</div>

<p class="imgGuide"><img src="<?php echo APP_URL; ?>img/subpage/img_guide.jpg" class="imgMax pc" alt="">
<img src="<?php echo APP_URL; ?>img/subpage/img_guide@sp.jpg" class="imgMax sp" alt="">
</p>
<div class="maxW">
	<h3 class="h2_page" id="anchor2"><?php echo ${'guide_2_'.$langweb} ?></h3>
	<div class="txtGuide">
	<?php 
	$text_fee_vn = get_field('cf_text_fee');
	$text_fee_en = get_field('cf_text_fee_eng');
	echo ${'text_fee_'.$langweb} ?>
	</div>
	<ul class="lstGuide">
		<?php
		while(has_sub_field('cf_list_free')):
			$item_en = get_sub_field('item_eng');
			$item_vn = get_sub_field('item');
		?>
		<li><?php echo ${'item_'.$langweb} ?></li>
		<?php endwhile; ?>
	</ul>
</div>

<div class="boxGuide">
	<div class="maxW">
		<div class="inner flexBox flexBox--center flexBox--between flexBox--none">
			<div class="left">
				<h5><?php echo ${'txt_guide_contact_'.$langweb} ?></h5>
				<p>
				<?php echo ${'com_add_'.$langweb}; ?><br>
				<?php echo ${'com_acc_'.$langweb}; ?><br>
				<?php echo ${'com_vat_'.$langweb}; ?>
				</p>
			</div>
			<div class="right">
				<p class="phoneNumb"><?php echo $com_hotline; ?></p>
				<a href="<?php echo APP_URL; ?>contact/" class="btnCont"><?php echo ${'title_contact_guide_'.$langweb} ?></a>
			</div>
		</div>
	</div>	
</div>

<div class="maxW">
	<h3 class="h2_page" id="anchor3"><?php echo ${'guide_3_'.$langweb} ?></h3>
	<div class="wrapTbl">
		<table class="tblGuide02">
			<thead>
				<tr>
					<td class="w1"><?php echo ${'col_tbl_1_'.$langweb} ?></td>
					<td class="w2"><?php echo ${'col_tbl_2_'.$langweb} ?></td>
					<td class="w3"><?php echo ${'col_tbl_3_'.$langweb} ?></td>
					<td class="w4"><?php echo ${'col_tbl_4_'.$langweb} ?></td>
					<td class="w5"><?php echo ${'col_tbl_5_'.$langweb} ?></td>
				</tr>
			</thead>
			<tbody>
				<?php if($langweb=='en') { ?>
					<?php	
						$i=0;
						while(has_sub_field('list_step_eng')):
						$i++;
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo get_sub_field('cf_desc'); ?></td>
						<td><?php echo get_sub_field('cf_responsible_man'); ?></td>
						<td><?php echo get_sub_field('cf_used_file'); ?></td>
						<td><?php echo get_sub_field('cf_note'); ?></td>
					</tr>
					<?php endwhile; ?>
				<?php } else { ?>
					<?php	
						$i=0;
						while(has_sub_field('list_step_vn')):
						$i++;
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo get_sub_field('cf_desc'); ?></td>
						<td><?php echo get_sub_field('cf_responsible_man'); ?></td>
						<td><?php echo get_sub_field('cf_used_file'); ?></td>
						<td><?php echo get_sub_field('cf_note'); ?></td>
					</tr>
					<?php endwhile; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
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