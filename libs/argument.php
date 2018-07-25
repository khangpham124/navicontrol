<?php
$pagename = str_replace(array('/', '.php', '?s='), '', $_SERVER['REQUEST_URI']);
$pagename = str_replace("wp", '', $_SERVER['REQUEST_URI']);
$pagename = $pagename ? $pagename : 'default';

switch ($pagename) {
    case "aboutus":
		$titlepage = "About us title";
		$desPage = "";
		$keyPage = "";
		$txtH1 = "H1 content for about us";
	break;
	 
    default:
		$titlepage = "CÔNG TY CỔ PHẦN GIÁM ĐỊNH NAM VIỆT";			
		$desPage = "Công ty cổ phần giám định Nam Việt, công ty giám định, kiểm định hàng đầu Việt Nam";
		$keyPage = "";
		$txtH1 = "Công ty cổ phần giám định Nam Việt, công ty giám định, kiểm định hàng đầu Việt Nam";
}

$menu_list_en = array('Home'=>'','About Us'=>'about/','Services'=>'services','Guide'=>'guide/','News'=>'news/','Career'=>'career/','Library'=>'library/');
$menu_list_vn = array('Trang chủ'=>'','Giới thiệu'=>'about/','Dịch vụ'=>'services','Hướng dẫn'=>'guide/','Tin tức'=>'news/','Tuyển dụng'=>'career/','Thư viện'=>'library/');

$title_home_vn = "Trang chủ";
$title_home_en = "Home";

$title_about_vn = "Giới thiệu";
$title_about_en = "About us";

$title_services_vn = "Dịch vụ";
$title_services_en = "Services";

$title_guide_vn = "Hướng dẫn";
$title_guide_en = "Guide";

$title_news_vn = "Tin tức";
$title_news_en = "News";

$title_career_vn = "Tuyển dụng";
$title_career_en = "Career";

$title_library_vn = "Thư viện";
$title_library_en = "Library";


$title_document_vn = "Tài liệu";
$title_document_en = "Document";

$title_contact_vn = "Liên hệ";
$title_contact_en = "Contact Us";

$title_contact_guide_vn = "Liên hệ";
$title_contact_guide_en = "Contact Us";

$title_search_vn = "Tìm kiếm";
$title_search_en = "Search";

$title_hour_vn = "thứ 2 - thứ 6 : 08:00(sáng)-17:00(chiều)";
$title_hour_en = "mon - fri : 08:00am-17:00pm";

// GUIDE PAGE

$guide_1_en = 'Some <span>Intruction<span>';
$guide_1_vn = 'Hướng dẫn <span>thủ tục giám định</span>';

$guide_2_en = 'Survey fee <span>& payment</span>';
$guide_2_vn = 'Phí giám định và <span>hình thức thanh toán</span>';

$guide_3_en = 'Flowchart of <span>an inspection service</span>';
$guide_3_vn = 'Các bước thực hiện chính <span>của vụ giám định</span>';


$txt_guide_contact_en = "NAVICONTROL<br>contacting / payment addresses";
$txt_guide_contact_vn = "Địa chỉ liên hệ/thanh toán<br>của NAVICONTROL";

$col_tbl_1_en ='No';
$col_tbl_2_en ='Description';
$col_tbl_3_en ='Responsible man';
$col_tbl_4_en ='Used file';
$col_tbl_5_en ='Note';

$col_tbl_1_vn ='Stt';
$col_tbl_2_vn ='Mô tả';
$col_tbl_3_vn ='Người chịu trách nhiệm';
$col_tbl_4_vn ='Tài liệu sử dụng';
$col_tbl_5_vn ='Ghi chú';

//NEWS PAGE
$btn_news_vn ='Xem thêm';
$btn_news_en ='continue reading';

$btn_prev_en = 'Prev';
$btn_prev_vn = 'Bài viết trước';

$btn_next_en = 'Next';
$btn_next_vn = 'Bài viết sau';

$btn_prev_en = 'Prev';
$btn_prev_vn = 'Bài viết trước';

$btn_list_en = 'back to list';
$btn_list_vn = 'Trở lại';

//CAREER PAGE
$btn_career_en = 'APPLY';
$btn_career_vn = 'Ứng tuyển';

$btn_top_en = 'TOP';
$btn_top_vn = 'Đầu trang';

//LIBRARY PAGE
$tab_photo_en = 'Photos';
$tab_photo_vn = 'Hình ảnh';

$tab_video_en = 'Videos';
$tab_video_vn = 'Video';

//CONTACT PAGE

$contact_tit_en = '<span>Get</span> in touch';
$contact_tit_vn = '<span>Liên</span> hệ';

$txt_contact_en = 'Don’t hesitate to contact with us for any kind of information';
$txt_contact_vn = 'Đừng ngần ngại liên hệ với chúng tôi để biết bất kỳ loại thông tin nào';

$pos_1_en = 'Director';
$pos_1_vn = 'Giám Đốc';

$pos_2_en = 'Deputy Director';
$pos_2_vn = 'Phó Giám Đốc';

$label_form_1_en = "Name";
$label_form_2_en = "Address";
$label_form_3_en = "Phone";
$label_form_4_en = "Subject";
$label_form_5_en = "Message";

$label_form_1_vn = "Họ tên";
$label_form_2_vn = "Địa chỉ";
$label_form_3_vn = "Số điện thoại";
$label_form_4_vn = "Tiêu đề";
$label_form_5_vn = "Nội dung";

$btn_reset_en = 'RESET';
$btn_reset_vn = 'XÓA';

$btn_submit_en = 'SUBMIT';
$btn_submit_vn = 'GỬI';

$post_info = get_post( 50 );
$com_add_vn = get_field('cf_address',$post_info->ID);
$com_add_en = get_field('cf_address_eng',$post_info->ID);

$com_acc_en = get_field('cf_account_eng',$post_info->ID);
$com_acc_vn = get_field('cf_account',$post_info->ID);

$com_vat_en = get_field('cf_vat_code_eng',$post_info->ID);
$com_vat_vn = get_field('cf_vat_code',$post_info->ID);

$com_hotline = get_field('cf_hotline',$post_info->ID);

$com_phone = get_field('cf_phone_number',$post_info->ID);
$com_fax = get_field('cf_fax',$post_info->ID);
$com_email = get_field('cf_email',$post_info->ID);

//CAREER PAGE


?>