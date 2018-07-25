<?php
// 設定
require("./jphpmailer.php");
$script = "index.php";
$gtime = time();

// グローバル変数とサニタイジング
$action = htmlspecialchars($_POST['action']);
$from_page = htmlspecialchars($_POST['page']);
//お問い合わせフォーム内容
$reg_name = htmlspecialchars($_POST['name']);
$reg_address = htmlspecialchars($_POST['address']);
$reg_phone = htmlspecialchars($_POST['phone']);
$reg_mail = htmlspecialchars($_POST['mail']);
$reg_title = htmlspecialchars($_POST['title']);
$reg_content = htmlspecialchars($_POST['content']);
$reg_job = htmlspecialchars($_POST['job']);
$reg_file = htmlspecialchars($_POST['file']);
$reg_fileLocal = htmlspecialchars($_POST['fileLocal']);
$reg_file1=htmlspecialchars($_POST['file1']);

$reg_filename=htmlspecialchars($_POST['filename']);
$reg_filename1 = htmlspecialchars($_POST['filename1']);


$size=$_FILES["file1"]["size"];

if(isset($_FILES["file1"]["name"])) {
	if ($_FILES["file1"]["size"] < 2097152) {
	$parts1=pathinfo($_FILES["file1"]["name"]);
	$ext1=".".strtolower($parts1["extension"]);	
	$filename_f = strtolower($_FILES["file1"]["name"]);
	$attach_file1 = $parts1["filename"]."_".$reg_name."_".$reg_phone.$ext1;
	
	$filename1 = $attach_file1;
	$filename = strtolower($_FILES["file1"]["name"]);

	move_uploaded_file($_FILES["file1"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']."/projects/navicontrol/mailer/attachment_file/".$attach_file1);
	$linkFile="http://$_SERVER[HTTP_HOST]/projects/navicontrol/mailer/attachment_file/".$attach_file1;
	
	
	}
}

// 処理分岐
if($action == "confim"){
//======================================================================================== お問い合わせ確認画面



	html_header();

	$br_reg_content = nl2br($reg_content);
?>

<?php

	html_footer();

}elseif($action == "send"){
//========================================================================================== お問い合わせ確認画面



	$entry_time = gmdate("Y/m/d H:i:s",time()+9*3600);
	$entry_host = gethostbyaddr(getenv("REMOTE_ADDR"));
	$entry_ua = getenv("HTTP_USER_AGENT");


    $msgBody = "
    Họ tện: $reg_name
    Số điện thoại: $reg_phone
    Email: $reg_mail";
    
    if($from_page=='contact') {
    $msgBody .= "
    Địa chỉ: $reg_address
    Tiêu đề: $reg_title
    Nội dung :
    $reg_content
    ";
    }
    if($from_page=='career') {
    $msgBody .= "
    Vị trí ứng tuyển: $reg_job
    Link CV: $linkFile
    ";
    }
    $subject = "Mail from website NaviControl";
    $body = "
    $msgBody
    ";

	// メール送信
	mb_language("ja");
	mb_internal_encoding("UTF-8");
	
	$to = "teddycoder421@gmail.com";
	$from = "teddycoder421@gmail.com";
	$fromname = "Mail from website";


	//メール送信
	$email = new JPHPmailer();
	$email->addTo($to);
	//$email->addTo($toResearch);
	$email->setFrom($reg_mail, 'NaviControl System');
    $email->setSubject($subject);
    $email->CharSet = 'UTF-8';
	$email->setBody($body);

	if($email->Send()) {};
	header("Location: http://teddycoder.com/projects/navicontrol/succees/");
	exit;

}else{
//================================================================================================== 初期画面
	html_init("");
}

////////////////////////////////////////////////////////////////////////////// HTML初期画面
function html_init($err_msg){

	global $gtime, $script;
	global
		$reg_company,
		$reg_name,
		$reg_tel,
		$reg_fax,
		$reg_email,
		$reg_content,
		$reg_url;

	html_header();

	if($err_msg){
?>
<?php
	}
?>

<?php

	html_footer();

}

////////////////////////////////////////////////////////////////////////////// HTMLヘッダー
function html_header(){

?>
<?php echo'<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />

<title>お問い合わせ｜金型製作、製品開発ならニットー</title>
<meta name="description" content="製品開発を、設計から試作、量産までトータルサポート。プレス金型の設計製作やNC旋盤・マシニングセンタによる切削加工、CAD/CAMによる3D加工、治具設備の設計製作等、幅広く対応します。コストダウン、短納期での製作もご相談下さい。" />
<meta name="keywords" content="プレス金型,機械加工,板金加工,治具設備,コストダウン,短納期" />
<link rel="icon" href="img/favicon.ico" type="image/vnd.microsoft.icon" />
<link type="text/css" rel="stylesheet" href="css/exvalidation.css" />
<link type="text/css" rel="stylesheet" href="css/base.css" />

<!-- Anti spam part1: the contact form start -->
<style>
.hid_url {
	display: none;
}
</style>
<!-- Anti spam part1: the contact form end -->

<!-- FACE BOOK start -->
<meta property="og:title" content="お問い合わせ｜金型製作、製品開発ならニットー" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://nitto-i.com/contact/" />
<meta property="og:description" content="製品開発を、設計から試作、量産までトータルサポート。プレス金型の設計製作やNC旋盤・マシニングセンタによる切削加工、板金加工、CAD/CAMによる3D加工、治具設備の設計製作等、幅広く対応します。コストダウン、短納期での製作もご相談下さい。" />
<meta property="og:image" content="http://nitto-i.com/img/top/img_tb02.png" />
<!-- //FACE BOOK end -->


<script type="text/javascript" src="js/analytics.js"></script> 
</head>
<body id="contact">
<div id="headerWrap" class="clearfix"> 
  <!-- /header start -->
  <p class="logo"><a href="/"><img src="img/logo.png" width="162" height="36" alt="nitto"  class="opa" /></a></p>
  <h1>「プレス金型」「プレス・板金加工」「機械加工」「治工具・設備」から設計、試作、量産、コストダウン提案までワンストップで行います。</h1>
  <!-- /header end --> 
</div>

<!--Container-->
<div id="container" class="clearfix">
  <?php
	}

	////////////////////////////////////////////////////////////////////////////// HTMLフッター
	function html_footer(){
	?>
</div>
<!--/Container-->
<div id="footerWrap"> 
  <!-- /footer start -->
  <p id="copyright" class="fz10"><strong>Copyright© NITTO Co.,Ltd. All Rights Reserved.</strong></p>
  <!-- /footer end --> 
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script type="text/javascript" src="./js/common.js"></script> 
<script type="text/javascript" src="./js/ajaxzip3.js" charset="UTF-8"></script> 
<script type="text/javascript" src="./js/jquery.cookie.js"></script> 
<script type="text/javascript" src="./js/jquery.infieldlabel.js"></script> 
<script type="text/javascript" charset="utf-8">
	$(function(){ $("label").inFieldLabels(); });
</script> 

<script type="text/javascript">
	<!--
	
	function check(){
		var flag = 0;
		if(!document.form1.check1.checked){
			flag = 1;
		}
		if(flag){
			window.alert('「個人情報の取扱いに同意する」にチェックを入れて下さい');
			return false;
		}
		else{
			return true;
		}
	}
	// -->
</script> 

<script type="text/javascript">
	$(function(){
		$( "#file" ).change(function() { 
			if(!($('#file')[0].files[0].size < 2097152 && get_extension($('#file').val()) == 'jpg')) { // 2 MB (this size is in bytes)
					//Prevent default and display error
				alert("添付ファイルの上限は2MBになります。");
				$(this).attr("value","");
				e.preventDefault();
			}
		});
	});
</script>



<script type="text/javascript" src="./js/exvalidation.js"></script> 
<script type="text/javascript" src="./js/exchecker-ja.js"></script> 
<script type="text/javascript">
	$(function(){
	  $("form").exValidation({
	    rules: {
			type: "chkselect",
			corp: "chkrequired",
			content: "chkrequired",
			name: "chkrequired",
			email: "chkrequired chkemail",
			tel: "chkrequired chktel",
	    },
	    stepValidation: true,
	    scrollToErr: true,
	    errHoverHide: true
	  });
	});
</script> 



<script type="text/javascript" src="./js/jquery.gafunc.js"></script> 

<!-- Anti spam part2: clickable email address start --> 
<script type="text/javascript">
	$(function(){
		var address = "info" + "@" + "nitto-i.com";
		$("#mailContact").attr("href", "mailto:" + address);
		$("#mailContact").text(address);
	});
</script> 
<!-- Anti spam part2: clickable email address end -->

</body>
</html>
<?php
	exit;
}
?>