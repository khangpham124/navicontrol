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
	<h2>Application</h2>
	<ul class="bread">
		<li><a href="<?php echo APP_URL; ?>"><?php echo ${'title_home_'.$langweb} ?></a></li>
		<li><?php echo ${'title_career_'.$langweb} ?></li>
		<li>Application</li>
	</ul>
</div>

<div class="maxW">
	<div class="formBlock">
		<p class="txtApp">Please fill out the information below. Our company will reply to you.</p>
		<p class="txtApp"><span>*</span> is required</p>
		<?php
			$job_title_en = get_field('cf_title_eng');
			$job_title_vn = $post->post_title;
		?>
		<form method="post" class="formApply" id="ajaxform" action="<?php echo APP_URL; ?>mailer/" name="form1" onsubmit="return check()" enctype="multipart/form-data">
			<label>Name<span>*</span></label>
			<input type="text" name="name" id="name" class="inputForm" require value="">
			<label>Phone<span>*</span></label>
			<input type="text" name="phone" id="phone" class="inputForm" require>
			<label>Mail<span>*</span></label>
			<input type="mail" name="mail" id="mail" class="inputForm" require>
			<label>Job Title<span>*</span></label>
			<input type="text" name="job" id="job" class="inputForm" readonly value="<?php echo ${'job_title_'.$langweb} ?>">
			<label>CV / Resume <span>*</span></label>
			<div class="upload-btn-wrapper">
			<button class="btn">Add file</button>
				<input type="file" name="file1" id="file" value="" />
			</div>
			<label>(*.doc, *.docx, *.pdf, *.png, *.jpg, *.xls, *.xml, *.ppt, *.pges - Less than 2MB)</label>
			<p class="taC">
				<input type="submit" name="submit"  class="btnSubmit" value="CONFIRM">
				<!-- <input type="image" src="img/btn02.png" onmouseover="this.src='img/btn02.png'" onmouseout="this.src='img/btn02.png'"  class="t20b20"/> -->
			</p>
			<input type="hidden" name="action" value="send">
			<input type="hidden" name="page" value="career">
			<p id="simple-msg"></p>
		</form>
	</div>
</div>

<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->
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