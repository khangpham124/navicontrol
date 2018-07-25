<!--Google Tag Manager-->
	
<!--End Google Tag Manager-->

<header id="header">
    <div class="flexBox flexBox--between flexBox--center headBar">
        <div class="left">
            <i class="fa fa-phone" aria-hidden="true"></i>0903918170
            <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo ${'title_hour_'.$langweb} ?>
        </div>
        <div class="right">
            <ul class="langBar">
                <li class="<?php if($langweb=='en') {?>active<?php } ?>"><a href="javascript:void(0)" data-attribute="en">English</a></li>
                <li class="<?php if($langweb=='vn') {?>active<?php } ?>"><a href="javascript:void(0)" data-attribute="vn">Vietnamese</a></li>
            </ul>
        </div>
    </div>
    <div class="headerInner flexBox flexBox--between flexBox--center header_<?php echo $langweb; ?>">
        <p id="logo"><a href="<?php echo APP_URL; ?>"><img src="<?php echo APP_URL ?>common/img/header/logo.svg"></a></p>
        <div class="rightHead flexBox flexBox--center">
            <ul class="gNavi flexBox flexBox--center">
                <?php
                $menulist = ${'menu_list_'.$langweb}; 
                foreach($menulist as $menus => $link) { 
                ?>						
                <li><a href="<?php echo APP_URL; ?><?php echo $link; ?>"><?php echo $menus; ?></a></li>
                <?php } ?>
                <li class="searchMenu"><a href="javascript:void(0)"><img src="<?php echo APP_URL ?>common/img/header/icon_loop.svg"></a></li>
            </ul>
            <a href="<?php echo APP_URL; ?>contact/" class="btnContact"><img src="<?php echo APP_URL ?>common/img/header/icon_mail.svg"><?php echo ${'title_contact_'.$langweb} ?></a>
        </div>
        <div class="sp">
            <a href="<?php echo APP_URL; ?>contact/" class="btnContact_sp"><img src="<?php echo APP_URL ?>common/img/header/btn_contact.jpg"></a>
            <button class="hamburger hamburger--collapse" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
            </button>
        </div>
    </div>
</header>

<div class="sp">
<div class="subMenu">
        <div class="infoSp">
            <i class="fa fa-phone" aria-hidden="true"></i>0903918170
            <i class="fa fa-clock-o" aria-hidden="true"></i>mon - fri : 08:00am-17:00pm
        </div>
        
        <ul class="langBar">
            <li class="<?php if($langweb=='en') {?>active<?php } ?>"><a href="javascript:void(0)" data-attribute="en">English</a></li>
            <li class="<?php if($langweb=='vn') {?>active<?php } ?>"><a href="javascript:void(0)" data-attribute="vn">Vietnamese</a></li>
        </ul>
    <ul class="menuList">
        <?php
        $menulist = ${'menu_list_'.$langweb}; 
        foreach($menulist as $menus => $link) { 
        ?>						
        <li><a href="<?php echo APP_URL; ?><?php echo $link; ?>"><?php echo $menus; ?></a></li>
        <?php } ?>
        <li class="searchMenu"><a href="javascript:void(0)"><img src="<?php echo APP_URL ?>common/img/header/icon_loop@w.svg" class=""></a></li>
    </ul>
</div>
</div>

<div class="searchPart">
    <div class="wrapSearch">
        <input type="text" name="search" placeholder="<?php echo ${'title_search_'.$langweb} ?>...">
        <button type="submit" class="submitBtn"><img src="<?php echo APP_URL ?>common/img/header/icon_loop@w.svg"></button>
    </div>
    <a href="javascript:void(0)" class="closeSearch"><img src="<?php echo APP_URL ?>common/img/header/btnClose.svg"></a>
</div>
