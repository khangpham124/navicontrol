<?php /* Template Name: Contact */
include($_SERVER["DOCUMENT_ROOT"] . "/projects/navicontrol/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
</head>

<body id="contact" class="subpage">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="head_Sub">
	<h2><?php echo ${'title_contact_'.$langweb} ?></h2>
	<ul class="bread">
		<li><a href="<?php echo APP_URL; ?>"><?php echo ${'title_home_'.$langweb} ?></a></li>
		<li><?php echo ${'title_contact_'.$langweb} ?></li>
	</ul>
</div>

<div class="maxW boxContact">
	<div class="flexBox flexBox--between flexBox--none">
		<div class="leftContact">
			<h3 class="h3_contact"><?php echo ${'contact_tit_'.$langweb} ?></h3>
			<p class="txtCont"><?php echo ${'txt_contact_'.$langweb} ?></p>
			<p class="infoCont">
			<?php echo ${'com_add_'.$langweb}; ?><br>
			<?php echo $com_email; ?><br>
			http://navicontrol.com.vn/<br>
			<?php echo $com_phone; ?><br>
			<?php echo $com_fax; ?>
			</p>
			<h4 class="h4_cont"><?php echo ${'pos_1_'.$langweb} ?></h4>
			<p class="txtPhone">0903.918.170 </p>
			<p class="txtmail"><a href="mailto:longnvc@navicontrol.com.vn">longnvc@navicontrol.com.vn</a></p>

			<h4 class="h4_cont"><?php echo ${'pos_2_'.$langweb} ?></h4>
			<p class="txtPhone">0909.105.666</p>
			<p class="txtmail"><a href="mailto:dcmtri@navicontrol.com.vn">dcmtri@navicontrol.com.vn</a></p>
		</div>
		<div class="rightContact">
			<form class="formBlock" method="post" id="ajaxform" action="<?php echo APP_URL; ?>mailer/">
				<label><?php echo ${'label_form_1_'.$langweb} ?><span>*</span></label>
				<input type="text" name="name" class="inputForm">
				<label><?php echo ${'label_form_2_'.$langweb} ?></label>
				<input type="text" name="address" class="inputForm">
				<label><?php echo ${'label_form_3_'.$langweb} ?><span>*</span></label>
				<input type="text" name="phone" class="inputForm">
				<label>Mail<span>*</span></label>
				<input type="email" name="mail" class="inputForm">
				<label><?php echo ${'label_form_4_'.$langweb} ?><span>*</span></label>
				<input type="text" name="title" class="inputForm">
				<label><?php echo ${'label_form_5_'.$langweb} ?><span>*</span></label>
				<textarea name="content"></textarea>
				<div class="btnForm">
					<input type="submit" class="btnSubmit" id="simple-post" name="submit" value="<?php echo ${'btn_submit_'.$langweb} ?>">
					<a href="" class="btnReset"><?php echo ${'btn_reset_'.$langweb} ?></a>
				</div>
				<input type="hidden" name="action" value="send">
				<input type="hidden" name="page" value="contact">
				<p id="simple-msg"></p>
			</form>
		</div>
	</div>
</div>
<div id="map"></div>


<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV7fW4OF5FqFFlLakpTOvf1Kuq_qHXcqY"></script>
<script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 16,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(10.795923, 106.733562), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType":"all","elementType":"geometry.fill","stylers":[{"weight":"2.00"}]},{"featureType":"all","elementType":"geometry.stroke","stylers":[{"color":"#9c9c9c"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#eeeeee"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#7b7b7b"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#c8d7d4"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#070707"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]}]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(10.795923, 106.733562),
                    map: map,
                });
            }
</script>

<script>
$(document).ready(function()
{
$("#simple-post").click(function()
{
	$("#ajaxform").submit(function(e)
	{
		$("#simple-msg").html("<p class='taC'><img src='<?php echo APP_URL ?>img/subpage/loading.gif'></p>");
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
			//$("#name").value='';	 
            window.location.href = '<?php echo APP_URL; ?>';
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#simple-msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	//STOP default action
	    e.unbind();
	});		
	//$("#ajaxform").submit(); //SUBMIT FORM
});
});
</script>

</body>
</html>	