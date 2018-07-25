<p id="pageTop"><img src="<?php echo APP_URL; ?>common/img/footer/totop.png" class="" alt=""></p>

<footer id="footer">
    <div class="footerInner flexBox flexBox--between">
        <div class="leftFoot">
            <p class="logoFoot"><img src="<?php echo APP_URL; ?>common/img/footer/logo_foot.svg" class="" alt=""></p>
            <p>
                4/6  no.3 St., Ward Binh An, Dist.2, HCMC, Viet Nam<br>
                Tel: 08.22531519 – 08.22531517<span class="txtFaxFoot">Fax: 08.62960188</span><br>
                Email: nvco@navicontrol.com.vn  
            </p>
        </div>
        <div class="rightFoot alignBot">
            <ul class="iconSocial">
                <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul> 
            <p class="copyright">© 2018 NaviControl. All Rights Reserved</p>
        </div>
    </div>
</footer>

<script src="<?php echo APP_URL; ?>common/js/jquery-1.8.3.min.js"></script>
<!--[if lt IE 9]><script src="<?php echo APP_URL; ?>common/js/html5shiv-printshiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="<?php echo APP_URL; ?>common/js/selectivizr.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/common.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/cookies.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/jquery.matchHeight.min.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/biggerlink.js"></script>
<script type="text/javascript">
    $(function(){
        $('.matchHeight').matchHeight();
        $('.biggerlink').biggerlink();
        
    });
</script>


<script src="<?php echo APP_URL; ?>common/js/wow.js"></script>
<script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
</script>
<script>
    var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};
    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
        }, false);
      });
    }
</script>