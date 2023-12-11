<footer class="main-footer sticky footer-type-1">
                <div class="footer-inner">
				    <!--友情链接-->
				    <?php if($this->options->zmki_footer_links == '0'): ?>
				    <div class="links_zmki zmki_footer_mar">
					<span>友情链接:</span> 
					<?php Links_Plugin::output(); ?>  
					</div>
					<br>
					<?php endif; ?>
				 
				    <!-- div class="zmki_footer_mar">
					
<a href="<?php $this->options->siteUrl();?>sitemap.xml">站点地图</a> 
 <?php if($this->options->bdtongji): ?>&nbsp;&nbsp;<a href="<?php $this->options->bdtongji();?>" rel="nofollow" target="_blank">站点统计</a><?php endif; ?>                     
 <?php $this->widget('Widget_Contents_Page_List')->parse('&nbsp;&nbsp;<a href="{permalink}">{title}</a>'); ?>                
                     </div --> 
                  	 <div class="zmki_footer_mar">
                    &copy; <?php echo date('Y'); ?>&nbsp;&nbsp;<?php $this->options->zmki_r(); ?>	                      
<?php if($this->options->zmki_icp): ?>&nbsp;&nbsp;<a href="https://beian.miit.gov.cn/" rel="nofollow" target="_blank"><?php $this->options->zmki_icp(); ?></a><?php endif; ?>
                    </div>
                     
                    <!--锚点-->
                    <div class="go-up">
                        <a href="#" rel="go-top">
                            <i class="fa-angle-up"></i>
                        </a>
                    </div> 
                    
                    <!--站点运行时间开始--> 
                    <div class="zmki_footer_mar">
					<script>
					(function(){
					    var bp = document.createElement('script');
					    var curProtocol = window.location.protocol.split(':')[0];
					    if (curProtocol === 'https') {
					        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
					    }
					    else {
					        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
					    }
					    var s = document.getElementsByTagName("script")[0];
					    s.parentNode.insertBefore(bp, s);
					})();
					 </script>		
					 <?php if($this->options->zmki_time_no == '1'): ?>
					                  站点已稳定运行：<SPAN id=span_dt_dt style="color: #2F889A;"></SPAN> 
					                  <script language=javascript>function show_date_time(){
					                    window.setTimeout("show_date_time()", 1000);
					                    BirthDay=new Date("<?php $this->options->zmki_time(); ?> ");
					                    today=new Date();
					                    timeold=(today.getTime()-BirthDay.getTime());
					                    sectimeold=timeold/1000
					                    secondsold=Math.floor(sectimeold);
					                    msPerDay=24*60*60*1000
					                    e_daysold=timeold/msPerDay
					                    daysold=Math.floor(e_daysold);
					                    e_hrsold=(e_daysold-daysold)*24;
					                    hrsold=Math.floor(e_hrsold);
					                    e_minsold=(e_hrsold-hrsold)*60;
					                    minsold=Math.floor((e_hrsold-hrsold)*60);
					                    seconds=Math.floor((e_minsold-minsold)*60);
					                    span_dt_dt.innerHTML='<font style=color:#C40000>'+daysold+'</font> 天 <font style=color:#C40000>'+hrsold+'</font> 时 <font style=color:#C40000>'+minsold+'</font> 分 <font style=color:#C40000>'+seconds+'</font> 秒';
					                    }show_date_time();</script> 
					                     <?php endif; ?> 
                    <!--站点运行时间结束-->
                    </div>
                </div>
            </footer>
        </div>
	</div>

<?php if ($this->options->themepjax == '1'):?>
<!-- pjax jquery --> 
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.js" type="text/javascript"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).pjax(
  'a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"],a[no-pjax]), a[href^="?"]',
  {
    container: '.sidebar-menu .board .main-footer',
    fragment: '.sidebar-menu .board .main-footer',
    timeout: 8000,
  };
)
</script>
<?php endif; ?>

<?php if ($this->is('index')): ?>
    <script type="text/javascript">
    var href = "";
    var pos = 0;
    $("a.smooth").click(function(e) {
        $("#main-menu li").each(function() {
            $(this).removeClass("active");
        });
        $(this).parent("li").addClass("active");
        e.preventDefault();
        href = $(this).attr("href");
        pos = $(href).position().top - 30;
        $("html,body").animate({
            scrollTop: pos
        }, 500);
    });
    </script>
<?php endif; ?>  
    <script src="<?php $this->options->themeUrl('js/index.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/zui.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/TweenMax.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/resizeable.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/joinable.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/xenon-api.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/xenon-toggles.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/xenon-custom.js'); ?>"></script>
    <script type="text/javascript">
	 <!--//夜间模式-->    
    <?php if($this->options->zmki_ah == '1'): ?>  
(function(){
    if(document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") === ''){
        if(new Date().getHours() > 22 || new Date().getHours() < 6){
            document.body.classList.add('night');
            document.cookie = "night=1;path=/";
            console.log('夜间模式开启');
        }else{
            document.body.classList.remove('night');
            document.cookie = "night=0;path=/";
            console.log('夜间模式关闭');
        }
    }else{
        var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
        if(night == '0'){
            document.body.classList.remove('night');
        }else if(night == '1'){
            document.body.classList.add('night');
        }
    }
})();
//夜间模式切换
function switchNightMode(){
    var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
    if(night == '0'){
        document.body.classList.add('night');
        document.cookie = "night=1;path=/"
        console.log(' ');
    }else{
        document.body.classList.remove('night');
        document.cookie = "night=0;path=/"
        console.log(' ');
    }
}
<?php endif; ?> 
//全屏切换
//控制全屏
function enterfullscreen() { //进入全屏
  $("#fullscreen").html(" ");
  var docElm = document.documentElement;
  //W3C
  if(docElm.requestFullscreen) {
    docElm.requestFullscreen();
  }
  //FireFox
  else if(docElm.mozRequestFullScreen) {
    docElm.mozRequestFullScreen();
  }
  //Chrome等
  else if(docElm.webkitRequestFullScreen) {
    docElm.webkitRequestFullScreen();
  }
  //IE11
  else if(elem.msRequestFullscreen) {
    elem.msRequestFullscreen();
  }
}
function exitfullscreen() { //退出全屏
  $("#fullscreen").html(" ");
  if(document.exitFullscreen) {
    document.exitFullscreen();
  } else if(document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if(document.webkitCancelFullScreen) {
    document.webkitCancelFullScreen();
  } else if(document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}
 
var a = 0;
$('#fullscreen').on('click', function() {
  a++;
  a % 2 == 1 ? enterfullscreen() : exitfullscreen();
})
</script>
<!--统计代码-->
<?php $this->options->zmki_tongji(); ?>
<!--百度统计代码-->
 <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?76bfe89d3948e8de81935a6a232b2d8c";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
 </script>


<style>
	.fk_service_qrimg_site {
    width: 119px;
    height: 119px;
    float: left;
    margin: 12px 12px 5px 12px; 
    background-image: url(<?php $this->options->fk_zmki_gzhimg(); ?>);
    background-size: 100% 100%;
	} 
	span.title,.main-menu{
	font-size: <?php $this->options->menu_title(); ?>px;
	}
	.zmki_tianqi{
    width: 120px;
    height: 16px;
	}
	/*#he-plugin-simple div{*/
	/*width:auto!important;*/
	/*}*/
	
/*单栏*/
 <?php if($this->options->zmki_pcsl == '0'): ?>  
.col-sm-3 {width: 100%;}
 <?php endif; ?> 
/*双栏*/
 <?php if($this->options->zmki_pcsl == '1'): ?>  
.col-sm-3 {width: 50%;}
 <?php endif; ?>  
/*三栏*/
 <?php if($this->options->zmki_pcsl == '2'): ?>  
.col-sm-3 {width: 33%;}
 <?php endif; ?> 
/*四栏*/
 <?php if($this->options->zmki_pcsl == '3'): ?>  
.col-sm-3 {width: 25%;}
 <?php endif; ?> 
/*五栏*/
 <?php if($this->options->zmki_pcsl == '4'): ?>  
.col-sm-3 {width: 20%;}
 <?php endif; ?> 
/*六栏*/
 <?php if($this->options->zmki_pcsl == '5'): ?>  
.col-sm-3 {width: 16.6%;}
 <?php endif; ?> 
/*七栏*/
 <?php if($this->options->zmki_pcsl == '6'): ?>  
.col-sm-3 {width: 14.2%;}
 <?php endif; ?> 
/*八栏*/
 <?php if($this->options->zmki_pcsl == '7'): ?>  
.col-sm-3 {width: 12.5%;}
 <?php endif; ?> 

/*手机端双栏显示 常规尺寸*/
@media (max-width:768px) {  

<?php if($this->options->zmki_wapsl == '0'): ?>  	
.col-sm-3 { 
    width: 100%; 
}
<?php endif; ?> 

<?php if($this->options->zmki_wapsl == '1'): ?>  	
.col-sm-3 { 
    width: 50%;
    float: left;
} 
    .xe-widget.xe-conversations {
    position: relative;
    background: #fff;
    margin-bottom: 0px;
}
<?php endif; ?> 
<?php if($this->options->zmki_wapsl == '2'): ?>  	
 .col-sm-3{ 
    width: 33%;
    float: left;
    position: relative;
    min-height: 1px;
     padding-left: 1px!important; 
     padding-right: 1px!important;} 
<?php endif; ?>  
}
</style>

<script>
    /*将搜索输入框置顶*/
    (function($) {
        $.fn.fixDiv = function(options) {
            var defaultVal = {
                top : 10
            };
            var obj = $.extend(defaultVal, options);
            $this = this;
            var _top = $this.offset().top;
            var _left = $this.offset().left;
            $(window).scroll(function() {
                var _currentTop = $this.offset().top;
                var _scrollTop = $(document).scrollTop();
                if (_scrollTop > _top) {
                    $this.offset({
                        top : _scrollTop + obj.top,
                        left : _left
                    });
                } else {
                    $this.offset({
                        top : _top,
                        left : _left
                    });
                }
            });
            return $this;
        }
    })(jQuery);
    
    $(function() {
        $("#search_box").fixDiv({
            top : 0
        });

        $("#search_btn").click(highlight);
        $('#searchstr').keydown(function(e) {
            var key = e.which;
            if (key == 13) highlight();
        });

        var i = 0;
        var sCurText;
        function highlight() {
            clearSelection(); //清空上一次高亮显示的内容
            var flag = 0;
            var bStart = true;
            $('#tip').text('');
            $('#tip').hide();
            var searchText = $('#searchstr').val();
            var _searchTop = $('#searchstr').offset().top + 30;
            var _searchLeft = $('#searchstr').offset().left;
            if ($.trim(searchText) == "") {
                showTips("请输入关键字", _searchTop, 3, _searchLeft);
                return;
            }
            //查找匹配
            var searchText = $('#searchstr').val();
            var regExp = new RegExp(searchText, 'g');
            var content = $("#content").text();
            if (!regExp.test(content)) {
                showTips("没有找到", _searchTop, 3, _searchLeft);
                return;
            } else {
                if (sCurText != searchText) {
                    i = 0;
                    sCurText = searchText;
                }
            }
            //高亮显示
            $('p').each(function() {
                var html = $(this).html();
                var newHtml = html.replace(regExp, '<span class="highlight">' + searchText + '</span>');
                $(this).html(newHtml);
                flag = 1;
            });
            //定位并提示信息
            if (flag == 1) {
                if ($(".highlight").size() > 1) {
                    var _top = $(".highlight").eq(i).offset().top +
                    $(".highlight").eq(i).height();
                    var _tip = $(".highlight").eq(i).parent().find("strong").text();
                    if (_tip == "") {
                        _tip = $(".highlight").eq(i).parent().parent().find("strong").text();
                    }
                    var _left = $(".highlight").eq(i).offset().left;
                    var _tipWidth = $("#tip").width();
                    if (_left > $(document).width() - _tipWidth) {
                        _left = _left - _tipWidth;
                    }
                    $("#tip").html(_tip).show();
                    $("#tip").offset({
                        top : _top,
                        left : _left
                    });
                    $("#search_btn").val("查找下一个");
                } else {
                    var _top = $(".highlight").offset().top + $(".highlight").height();
                    var _tip = $(".highlight").parent().find("strong").text();
                    var _left = $(".highlight").offset().left;
                    $('#tip').show();
                    $("#tip").html(_tip).offset({
                        top : _top,
                        left : _left
                    });
                }
                $("html, body").animate({
                    scrollTop : _top - 50
                });
                i++;
                if (i > $(".highlight").size() - 1) {
                    i = 0;
                }
            }
        }
        function clearSelection() {
            $('p').each(function() {
                //找到所有highlight属性的元素；
                $(this).find('.highlight').each(function() {
                    $(this).replaceWith($(this).html()); //将他们的属性去掉；
                });
            });
        }
        var tipsDiv = '<div class="tipsClass"></div>';
        $('body').append(tipsDiv);
        function showTips(tips, height, time, left) {
            var windowWidth = document.documentElement.clientWidth;
            $('.tipsClass').text(tips);
            $('div.tipsClass').css({
                'top' : height + 'px',
                'left' : left + 'px',
                'position' : 'absolute',
                'padding' : '8px 6px',
                'background' : '#000000',
                'font-size' : 14 + 'px',
                'font-weight' : 900,
                'margin' : '0 auto',
                'text-align' : 'center',
                'width' : 'auto',
                'color' : '#fff',
                'border-radius' : '2px',
                'opacity' : '0.8',
                'box-shadow' : '0px 0px 10px #000',
                '-moz-box-shadow' : '0px 0px 10px #000',
                '-webkit-box-shadow' : '0px 0px 10px #000'
            }).show();
            setTimeout(function() {
                $('div.tipsClass').fadeOut();
            }, (time * 1000));
        }
    })          
</script>

<?php if($this->options->fk_zmki == '1'): ?>  
<div class="wapnone fk_service">
	<ul>
		<?php if($this->options->zmki_ah == '1'): ?>  
		<li class="fk_service_box fk_service_zmkiah" onclick="window.location.href='javascript:switchNightMode()'">
			<div class="fk_service_zmkiah_cont"> <span class="fk_service_triangle"></span>全新暗黑模式，夜间使用保护眼睛 </div>
		</li>
		 <?php endif; ?> 
		<!--li>
			<div class="fk_service_consult_cont1" style="display: none;"> <span class="fk_service_triangle"></span> 在线咨询 </div>
		</li>
		<li class="fk_service_box fk_service_consult">
			<div class="fk_service_consult_cont"> <span class="fk_service_triangle"></span>
				<div class="fk_service_consult_cont_top"> <span class="fk_service_hint"> <span class="fk_service_icon"></span>
						<span> 如遇问题，请联系站长 </span> </span> <span class="fk_service_button" onclick="window.open('https://wpa.qq.com/msgrd?v=3&uin=<?php $this->options->fk_zmki_qq(); ?>&site=qq&menu=yes')">QQ联系</span>
					<span class="fk_service_button" onclick="window.open('https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php $this->options->fk_zmki_email(); ?>')">在线邮件</span>
				</div> <span class="fk_service_phone"> QQ 请注明来意 ：<?php $this->options->fk_zmki_qq(); ?> </span> <span class="fk_service_check_site"> <span class="fk_service_icon"></span>
					<span onclick="window.open('<?php $this->options->fk_zmki_url(); ?>')">更多：<?php $this->options->fk_zmki_name(); ?></span> </span>
			</div>
		</li> 
		 < li class="fk_service_box fk_service_qr">
			<div class="fk_service_qr_cont"> <span class="fk_service_triangle"></span>
				<div class="fk_service_qrimg"> <span class="fk_service_qrimg_site"></span> 微信扫一扫关注 </div>
				<div class="fk_service_qrtext"><span><?php $this->options->fk_zmki_gzhtext(); ?></span></div>
			</div>
		</li -->
		<li class="fk_service_box fk_service_zmkiqp"  onclick="javascript:document.getElementById('fullscreen').click();" > 
		<div class="fk_service_zmkiqp_cont"> <span class="fk_service_triangle"></span>切换全屏</div>
		</li>
		<li class="fk_service_box fk_service_feedback" onclick="window.location.href='<?php $this->options->zmki_links(); ?>'">
			<div class="fk_service_feedback_cont"> <span class="fk_service_triangle"></span> 提交收录，站长收到留言后即刻处理！ </div>
		</li> 
		<li class="fk_service_box fk_service_upward " onclick="javascript:document.getElementById('01').click();" style="display: block;" >
				<a id="01" href="/#" rel="go-top" class="fk_service_box fk_service_upward ">1</a>
			<div class="fk_service_upward_cont"> <span class="fk_service_triangle"></span> <span> 返回顶部 </span> </div>
			<a class="to-top" style="cursor: pointer; position: fixed; right: 38px; bottom: 38px;" id="d41d8cd98f00b204e9800998ecf8427e" "><i class="icon-up-small"></i></a>
			</li>		 
			 <?php endif; ?>
</body>
</html>