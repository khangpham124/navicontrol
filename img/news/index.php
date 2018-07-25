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
		<li>
			<p class="thumb"><img src="<?php echo APP_URL; ?>img/subpage/img_demo.jpg" class="" alt=""></p>
			<div class="overflow">
				<p class="title"><a href="">Giám định hàng hóa giúp Doanh nghiệp nâng cao vị thế trên thị trường</a></p>
				<div class="desc">
				Toàn cầu hóa và hội nhập kinh tế quốc tế đã trở thành xu thế khách quan chi phối sự phát triển kinh tế- xã hội của mỗi quốc gia cũng như quan hệ quốc tế. Việt Nam cũng đã tham gia ký kết nhiều Hiệp định Khu vực thương mại tự do- FTA với một số đối tác thương mại chính 
				</div>
				<a href="" class="more"><?php echo ${'btn_news_'.$langweb} ?></a>
			</div>
		</li>

		<li>
			<p class="thumb"><img src="<?php echo APP_URL; ?>img/subpage/img_demo.jpg" class="" alt=""></p>
			<div class="overflow">
				<p class="title"><a href="">Giám định hàng hóa giúp Doanh nghiệp nâng cao vị thế trên thị trường</a></p>
				<div class="desc">
				Toàn cầu hóa và hội nhập kinh tế quốc tế đã trở thành xu thế khách quan chi phối sự phát triển kinh tế- xã hội của mỗi quốc gia cũng như quan hệ quốc tế. Việt Nam cũng đã tham gia ký kết nhiều Hiệp định Khu vực thương mại tự do- FTA với một số đối tác thương mại chính 
				</div>
				<a href="" class="more">continue reading</a>
			</div>
		</li>


		<li>
			<p class="thumb"><img src="<?php echo APP_URL; ?>img/subpage/img_demo.jpg" class="" alt=""></p>
			<div class="overflow">
				<p class="title"><a href="">Giám định hàng hóa giúp Doanh nghiệp nâng cao vị thế trên thị trường</a></p>
				<div class="desc">
				Toàn cầu hóa và hội nhập kinh tế quốc tế đã trở thành xu thế khách quan chi phối sự phát triển kinh tế- xã hội của mỗi quốc gia cũng như quan hệ quốc tế. Việt Nam cũng đã tham gia ký kết nhiều Hiệp định Khu vực thương mại tự do- FTA với một số đối tác thương mại chính 
				</div>
				<a href="" class="more">continue reading</a>
			</div>
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