        <div class="sidebar-menu toggle-others fixed">
            <div class="sidebar-menu-inner">
                <header class="logo-env">
                    <!-- logo -->
                    <div class="logo">
                        <a href="<?php $this->options->siteUrl(); ?>" class="logo-expanded">
                            <img class="logo_size" src="<?php $this->options->Biglogo(); ?>" width="100%" alt="<?php $this->options->IndexName(); ?>" />
                        </a>
                        <a href="<?php $this->options->siteUrl(); ?>" class="logo-collapsed">
                            <img src="<?php $this->options->themeUrl('images/logo-collapsed@2x.png'); ?>" width="18px" alt="">
                        </a>
                    </div>
                    <div class="mobile-menu-toggle visible-xs">
                        <a href="#" data-toggle="mobile-menu">
                            <i class="fa-bars"></i>
                        </a>
                    </div>
                </header>
                <ul id="main-menu" class="main-menu">
<?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>  
<?php while ($categorys->next()): ?>  
    <?php if ($categorys->levels === 0): ?>  
        <?php $children = $categorys->getAllChildren($categorys->mid); ?>  
        <?php if (empty($children)) { ?>  
            <li>  
                <a href="<?php if ($this->is('index')): ?>#<?php echo $categorys->name(); ?> <?php else: ?> <?php echo $this->options->siteUrl(); ?>#<?php echo $categorys->name(); ?> <?php endif; ?>" class="smooth">  
                    <i class="fa fa-<?php $categorys->slug(); ?>"></i>  
                    <span class="title"><?php $categorys->name(); ?></span>  
                </a>  
            </li>  
        <?php } else { ?>  
            <li>  
                <a>  
                    <i class="fa fa-<?php $categorys->slug(); ?>"></i>  
                    <span class="title"><?php $categorys->name(); ?></span>  
                </a>  
                <ul>  
                    <?php foreach ($children as $mid): ?>  
                        <?php $child = $categorys->getCategory($mid); ?>  
                        <?php if ($child): ?>  
                            <li>  
                                <a href="<?php if ($this->is('index')): ?>#<?php echo $categorys->name(); ?> <?php else: ?> <?php echo $this->options->siteUrl(); ?>#<?php echo $categorys->name(); ?> <?php endif; ?>" class="smooth"><?php echo $child['name']; ?></a>  
                            </li>  
                        <?php endif; ?>  
                    <?php endforeach; ?>  
                </ul>  
            </li>  
        <?php } ?>  
    <?php endif; ?>  
<?php endwhile; ?>
<li><br></li>
                            <?php $this->widget('Widget_Contents_Page_List')->parse('<li><a href="{permalink}"> <i class="linecons-heart"></i><span class="smooth">{title}</span> <span class="label label-Primary pull-right hidden-collapsed">♥</span></a></li>'); ?> 
                            <div class="zmki_wap" style="position: sticky; bottom: 10px; display: flex; justify-content: space-between; padding:0px;">
                                <a href="<?php $this->options->adminUrl(); ?>" target="_blank" title="登陆后台"><i class="fa fa-cog" aria-hidden="true" /></i></a>
                                <a href="<?php $this->options->siteUrl();?>sitemap.xml" target="_blank" title="网站地图"><i class="fa fa-sitemap" aria-hidden="true" /></i></a>
                                <a href="https://github.com/hygd0813/WebStack" target="_blank" rel="nofollow" title="Github"><i class="fa fa-github" aria-hidden="true" /></i></a>
                                <a href="mailto:?subject=<?php $this->title() ?>&body=Check out this article: <?php $this->permalink() ?>" title="QQ邮箱"><i class="fa fa-envelope" aria-hidden="true" /></i></a>
                                <a href="<?php $this->options->bdtongji();?>" target="_blank" rel="nofollow" title="网站统计"><i class="fa fa-bar-chart" aria-hidden="true" /></i></a>
                            </div>                 
                </ul>
                
                <!-- ul class="zmki_wap zmki_set zmki_sety" style="position: relative; bottom: 0; display: flex; justify-content: space-between; padding: 0;">  
                    <li style="margin:10px 8px 20px 45px;font-size:16px;"><a href="<?php $this->options->adminUrl(); ?>" target="_blank"><i class="fa fa-cog" aria-hidden="true" /></i></a></li>  
                    <li style="margin:10px 8px 20px 8px;font-size:16px;"><a href="<?php $this->options->siteUrl();?>sitemap.xml" target="_blank"><i class="fa fa-sitemap" aria-hidden="true" /></i></a></li>
                    <li style="margin:10px 8px 20px 8px;font-size:16px;"><a href="https://github.com/hygd0813/WebStack" target="_blank" rel="nofollow"><i class="fa fa-github" aria-hidden="true" /></i></a></li> 
                    <li style="margin:10px 8px 20px 8px;font-size:16px;"><a href="mailto:?subject=<?php $this->title() ?>&body=Check out this article: <?php $this->permalink() ?>"><i class="fa fa-envelope" aria-hidden="true" /></i></a></li>
                    <li style="margin:10px 45px 20px 8px;font-size:16px;"><a href="<?php $this->options->bdtongji();?>" target="_blank" rel="nofollow"><i class="fa fa-bar-chart" aria-hidden="true" /></i></a></li> 
                </ -->
                         
            </div>
        </div>
        
        <!--顶部美化开始-->  
   <div class="board">
          <div class="left">
       <ul class="user-info-menu left-links list-inline list-unstyled">
            <li class="hidden-sm hidden-xs header_min_bar">
                <a href="#" data-toggle="sidebar"><i class="fa-bars" style="font-size:16px;"></i></a>
            </li>
     <li><span class="board-title zmki_wap_zsy1"><a href="<?php $this->options->siteUrl(); ?>" ><i class="fa fa-home  "></i>&nbsp;首页</a></span></li>
	 <li><span class="board-title"><a href="<?php $this->options->zmki_links(); ?>"><i class="fa fa-plus-square  " ></i>&nbsp;收录提交</a></span></li>
 	 <?php if ($this->options->zmki_myurl): ?>        
	 <li><span class="board-title "><a href="<?php $this->options->zmki_myurl(); ?>" target="_blank"><i class="fa fa-heart xiaotubiao  " style="color: #fb5962;"></i>&nbsp;<?php $this->options->zmki_myname(); ?></a></span></li>
 	 <?php endif; ?>        
     <?php if ($this->options->zmki_tianqi == '1'): ?>  
	 <li class="zmki_tianqi zmki_wap"><span class="zmki_wap" id="he-plugin-simple"></span></li>
     <?php endif; ?>
	 <?php if ($this->options->zmki_ah == '1'): ?>  
	 <li><div class="zmki_yldh zmki_wap_zsy2"  title="切换模式"><a href="javascript:switchNightMode()"  target="_self"><i class="fa fa-moon-o" aria-hidden="true" style="color:#ffb948;font-size:24px;"></i></a></div></li> 
	 <?php endif; ?>     
		  </ul>
       </div>

<script>
// 获取要操作的元素  
const headerMinBar = document.querySelector('.header_min_bar');  
const zmkiSet = document.querySelector('.zmki_sety');  
  
// 添加点击事件监听器  
headerMinBar.addEventListener('click', function() {  
  // 切换显示状态  
  zmkiSet.style.display = zmkiSet.style.display === 'none' ? 'block' : 'none';  
});
</script>


       <div class="right">
            <?php if ($this->user->hasLogin()) :?>
            <li>
                <a href="<?php $this->options->adminUrl(); ?>" target="_blank">后台 (<?php $this->user->screenName(); ?>)</a>  /  
                <a href="<?php $this->options->logoutUrl(); ?>"<?php if ($this->options->PjaxOption): ?> no-pjax<?php endif; ?>>退出</a>
            <?php else :?>
                <a href="<?php $this->options->adminUrl(); ?>" target="_blank">登录</a>  /  
                <a href="<?php $this->options->registerUrl(); ?>" target="_blank">注册</a>
            </li>
            <?php endif;?>
       </div>
   </div>
   	<li><a type="button" id="fullscreen" > </li> 
   	
<?php if ($this->options->zmki_tianqi == '1'): ?>  
<!--天气开始-->
<!--由于默认调用的免费版每分钟20次API调用限制，如有需求可前往知心天气官网购买服务配置-->
<script>
WIDGET = {
  "CONFIG": {
    "modules": "104",
    "background": "5",
    "tmpColor": "373E4A",
    "tmpSize": "14",
    "cityColor": "373E4A",
    "citySize": "14",
    "aqiColor": "373E4A",
    "aqiSize": "14",
    "weatherIconSize": "25",
    "alertIconSize": "20",
    "padding": "0px 0px 0px 0px",
    "shadow": "0",
    "language": "auto",
    "borderRadius": "7",
    "fixed": "false",
    "vertical": "center",
    "horizontal": "center",
    "key": "07516dfe756c4f0ca1710d083add02bd"
  }
}
</script>
<script 
<script src="https://widget.qweather.net/simple/static/js/he-simple-common.js?v=2.0"></script>
<!--天气结束--> 
<?php endif; ?>   	
   	<div class="main-content">  
	<!--顶部美化结束-->	  
	<!--顶部新增模块开始	-->
	 <?php if ($this->options->zmki_top_main == '1'): ?>  
	<div  class="wapnone zmki_top_main" style="display: flex;"> 
	  <div class="col-lg-4 wapnone ">
        <a class="colorful-card zmki_top_one"  target="_blank" href="<?php $this->options->zmki_top_main_one_url(); ?>">
          <i class="<?php $this->options->zmki_top_main_one_icon(); ?>"></i><?php $this->options->zmki_top_main_one_name(); ?></a>
      </div>
      <div class="col-lg-4 wapnone ">
        <a class="colorful-card zmki_top_two" target="_blank" href="<?php $this->options->zmki_top_main_two_url(); ?>">
          <i class="<?php $this->options->zmki_top_main_two_icon(); ?>"></i><?php $this->options->zmki_top_main_two_name(); ?></a>
      </div>
      <div class="col-lg-4 wapnone ">
        <a class="colorful-card zmki_top_three"  target="_blank" href="<?php $this->options->zmki_top_main_three_url(); ?>">
          <i class="<?php $this->options->zmki_top_main_three_icon(); ?>"></i><?php $this->options->zmki_top_main_three_name(); ?></a>
      </div>
	  <div class="col-lg-4 wapnone ">
        <a class="colorful-card zmki_top_four"  target="_blank" href="<?php $this->options->zmki_top_main_four_url(); ?>">
          <i class="<?php $this->options->zmki_top_main_four_icon(); ?>"></i><?php $this->options->zmki_top_main_four_name(); ?></a>
      </div> 
    </div>  
      <?php endif; ?>
	<?php if ($this->options->isSearch == '1'): ?>
    <?php $this->need('list_search.php'); ?> 
	<?php endif; ?> 