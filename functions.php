<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
    if ($check_info == '1') {
        echo '<font color=red>' . $message . '</font>';
        die;
    }
    if (!$_POST) {
        echo ' 
   <!--如果修改了主题名称，请修改下面的路径-->   
   <link href="/usr/themes/WebStack/css/bootstrap.min.css" rel="stylesheet">
   <script src="/usr/themes/WebStack/js/jquery.js"></script>
   <script src="/usr/themes/WebStack/js/bootstrap.min.js"></script>
<hr>
   <p class="active-tab"><strong><svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-project"></use></svg> typecho 导航主题webstack 荒野孤灯博客二开美化版</strong> <span></span></p>
   <p class="previous-tab"><strong><svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-chicken"></use></svg> 主题版本号: </strong>1.1.0 <span></span></p>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="home">
      <p>
      
      ';
    }
    if (!$_POST) {
        echo '
        </p>
   </div>
   <div class="tab-pane fade" id="ios">
      <p>
    ';
    }
    $str1 = explode('/themes/', Helper::options()->themeUrl);
    $str2 = explode('/', $str1[1]);
    $name = $str2[0];
    $db = Typecho_Db::get();
    $sjdq = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name));
    $ysj = $sjdq['value'];
    if (isset($_POST['type'])) {
        if ($_POST["type"] == "备份模板设置数据") {
            if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'))) {
                $update = $db->update('table.options')->rows(array('value' => $ysj))->where('name = ?', 'theme:' . $name . 'bf');
                $updateRows = $db->query($update);
                echo '<div class="tongzhi col-mb-12 home">备份已更新，请等待自动刷新！如果等不到请点击';
?>   
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
            } else {
                if ($ysj) {
                    $insert = $db->insert('table.options')->rows(array('name' => 'theme:' . $name . 'bf', 'user' => '0', 'value' => $ysj));
                    $insertId = $db->query($insert);
                    echo '<div class="tongzhi col-mb-12 home">备份完成，请等待自动刷新！如果等不到请点击';
?>   
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
                }
            }
        }
        if ($_POST["type"] == "还原模板设置数据") {
            if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'))) {
                $sjdub = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'));
                $bsj = $sjdub['value'];
                $update = $db->update('table.options')->rows(array('value' => $bsj))->where('name = ?', 'theme:' . $name);
                $updateRows = $db->query($update);
                echo '<div class="tongzhi col-mb-12 home">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
?>   
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
<?php
            } else {
                echo '<div class="tongzhi col-mb-12 home">没有模板备份数据，恢复不了哦！</div>';
            }
        }
        if ($_POST["type"] == "删除备份数据") {
            if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'))) {
                $delete = $db->delete('table.options')->where('name = ?', 'theme:' . $name . 'bf');
                $deletedRows = $db->query($delete);
                echo '<div class="tongzhi col-mb-12 home">删除成功，请等待自动刷新，如果等不到请点击';
?>   
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
            } else {
                echo '<div class="tongzhi col-mb-12 home">不用删了！备份不存在！！！</div>';
            }
        }
    }
    echo '<form class="protected home col-mb-12" action="?' . $name . 'bf" method="post">
<input type="submit" name="type" class="btn btn-s" value="备份模板设置数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板设置数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form><br>';
    if (!$_POST) {
        echo ' 
  </p>
   </div>
   <div class="tab-pane fade" id="ejb">
      <p>';
    }
    echo '
 ';
    if (!$_POST) {
        echo '      </p>
   </div>
</div>';
    }
    print <<<EOT
<style>
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: -5px;
    font-weight: 700;
}
.zmki_ht_about{
    margin:0px;
}
.zmki_ht_about a{ 
    color: #060606;
}
.zmki_ht_about_img{
    float:initial;
}
.zmki_ht_about img {
    float: initial;
    width: 50%;
    border-radius: 5px;
    box-shadow: 0 8px 10px -4px rgba(66, 172, 98, 0.34);
}
.zmki_ht_about_mian{
    width: 50%;
    float: right;
    padding:0px 0px 0px  20px ;
}
.zmki_ht_about_mian  h2 {
    color:#000;
    margin:0px;
}
.btn { 
    color:#000;
    padding: 0px 10px;
    border-radius: 4px;
    background-color: whitesmoke;
    box-shadow: 0 6px 7px -5px rgba(210, 210, 210, 0.6);
}
p{
    margin:15px 0px 10px 0px!important;
}
.zmki_aliico{
    width: 20px;
    float: initial;
    height: 20px;
    margin-bottom: -4px;
}
</style> 
<link rel="stylesheet" href="https://at.alicdn.com/t/font_1953461_6q2rg8z45q4.css">  
<script src="https://at.alicdn.com/t/font_1953461_6q2rg8z45q4.js"></script> 
<script>
   $(function(){
      $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      // Get the name of active tab
      var activeTab = $(e.target).text(); 
      // Get the name of previous tab
      var previousTab = $(e.relatedTarget).text(); 
      $(".active-tab span").html(activeTab);
      $(".previous-tab span").html(previousTab);
   });
});
</script>
EOT;
    echo '<hr>
<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-sound"></use></svg>
<span>已去除主题设置里画蛇添足的 自定义站点名称和后缀功能，如设置直接移步至</span>';
?>   
<a href="<?php Helper::options()->adminUrl('options-general.php'); ?>">设置 </a>即可
<img src="<?php ?> ">

<hr>
<?php
    // 大logo
    $Biglogo = new Typecho_Widget_Helper_Form_Element_Text('Biglogo', NULL, '/usr/themes/WebStack/images/logo@2x.png', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-edit"></use></svg> LOGO地址(必填)'), _t('logo地址，尺寸178*40'));
    $form->addInput($Biglogo);
    // favicon
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, '/favicon.ico', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-edit"></use></svg> Favicon'), _t('请输入favicon站标的Url(ico Png jpg)等图片格式均可，刷新浏览器缓存后生效'));
    $form->addInput($favicon);
    echo '<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-set"></use></svg> <b>提示：主题设置选择后回车可快捷保存</b><hr>';
    // 手机端每行显示数量
    $zmki_wapsl = new Typecho_Widget_Helper_Form_Element_Radio('zmki_wapsl', array('0' => _t('单栏'), '1' => _t('双栏'), '2' => _t('三栏')), '0', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-phone"></use></svg> 手机端栏目数量'), _t("选择相应的栏目数量,手机端每行将显示不同数量的布局。此功能可避免页面过于庸长，默认单栏，推荐双栏显示 <br>注意：如调整失效，请刷新请浏览器缓存"));
    $form->addInput($zmki_wapsl);
    // PC端每行显示数量
    $zmki_pcsl = new Typecho_Widget_Helper_Form_Element_Radio('zmki_pcsl', array('0' => _t('单栏'), '1' => _t('双栏'), '2' => _t('三栏'), '3' => _t('四栏'), '4' => _t('五栏'), '5' => _t('六栏'), '6' => _t('七栏'), '7' => _t('八栏')), '3', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-pc"></use></svg> PC端栏目数量'), _t("选择相应的栏目数量,PC每行将显示不同数量的布局。默认4栏，为美观考虑推荐设置4-6栏<br>注意：如调整失效，请刷新请浏览器缓存"));
    $form->addInput($zmki_pcsl);
    // 开启折叠
    $zmki_fold = new Typecho_Widget_Helper_Form_Element_Radio('zmki_fold', array('0' => _t('关闭折叠功能'), '1' => _t('开启折叠 默认展开(推荐)'), '2' => _t('开始折叠 强制全部折叠'),), '1', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-project"></use></svg> 开启折叠'), _t("关闭折叠功能则不加载相应功能代码，默认开启折叠，可以在分类描述一栏中添加1或任意内容即可对单个分类进行折叠<br>开启强制折叠则所有分类默认全部折叠"));
    $form->addInput($zmki_fold);
    // 开启内页
    $isLink = new Typecho_Widget_Helper_Form_Element_Radio('isLink', array('0' => _t('禁用'), '1' => _t('启用')), '0', _t('开启内页'), _t("(此功能预计下个版本添加，将新增内页功能)是否启用直接跳转"));
    $form->addInput($isLink);
    // Icon接口
    $link_icon = new Typecho_Widget_Helper_Form_Element_Text('link_icon', NULL, 'https://api.zmki.cn/i/ge.php?url=', _t('自动获取Icon api'), _t('自动获取icon，如链接logo
为空，则程序自动获取手动填写的Icon图标。此功能依赖于API接口<br>默认：https://api.zmki.cn/i/ge.php?url= <br>注意：此功能加载速度受限于api速度，如站点内容较大，可自建icon图片接口 <a href="https://www.80srz.com">自建icon图片接口教程</a>'));
    $form->addInput($link_icon);
    // Icon接口-图片处理
    $link_icon_end = new Typecho_Widget_Helper_Form_Element_Text('link_icon_end', NULL, '', _t('(高级功能)自动获取Icon后缀 图片处理'), _t('如API支持伪静态可使用此功能使icon api的URL设置成静态图片格式，方便CDN缓存<br>如https://api.zmki.cn/i/ge.php?url=www.k1v.cn<b style="color:red;">.jpg</b>'));
    $form->addInput($link_icon_end);
    // 左侧菜单栏 字体大小
    $menu_title = new Typecho_Widget_Helper_Form_Element_Text('menu_title', NULL, '13', _t('左侧菜单字体大小'), _t('请输入左侧菜单栏字体大小，如13 (纯数字即可) 不需要填px单位，留空则默认13 (13px)。此功能集成来源于用户定制功能'));
    $form->addInput($menu_title);
    // 天气开关
    $zmki_tianqi = new Typecho_Widget_Helper_Form_Element_Radio('zmki_tianqi', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('导航栏天气开关'), _t("是否开启导航栏天气插件，目前默认调用和风天气，如内网使用或担心影响页面加载速度可关闭此功能"));
    $form->addInput($zmki_tianqi);
    // 暗黑开关
    $zmki_ah = new Typecho_Widget_Helper_Form_Element_Radio('zmki_ah', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('暗黑模式开关'), _t("是否开启前台暗黑模式开关，开启后网站会在晚22点-早6点夜间自动开启黑暗模式; 请放心，此功能会保存cooke方便使用"));
    $form->addInput($zmki_ah);
    // 顶部模块
    $zmki_top_main = new Typecho_Widget_Helper_Form_Element_Radio('zmki_top_main', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-star"></use></svg> <span style="color: #608cee; margin-right:0px;">顶部</span><span style="color: #fb5962;margin-right:0px;">多色</span><span style="color: #fbb359;margin-right:0px;">模块</span><span style="color: #53bf6b;margin-right:0px;">开关</span>'), _t("是否开启网站顶部四项多色小模块"));
    $form->addInput($zmki_top_main);
    // echo '<img style="border: 0;height: 20px;margin-bottom: -2px;" src="https://a-oss.zmki.cn/2019/20190827-5d65409f3fbff.png">';
    // 顶部模块 蓝色 文字自定义
    $zmki_top_main_one_name = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_one_name', NULL, '配置手册', _t('<span style="color: #608cee; margin-right:0px;">蓝色模块文字</span>'), _t('输入顶部蓝色模块内的文字，默认 配置手册'));
    $form->addInput($zmki_top_main_one_name);
    $zmki_top_main_one_icon = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_one_icon', NULL, 'fa fa-safari', _t('<span style="color: #608cee; margin-right:0px;">蓝色模块</span>图标'), _t('可自定义蓝色模块内文字前的fontawesome图标，使用帮助请查看:<a href="https://www.zmki.cn/doc/33772.html">www.zmki.cn/doc/33772.html</a>，蓝色默认 fa fa-safari'));
    $form->addInput($zmki_top_main_one_icon);
    $zmki_top_main_one_url = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_one_url', NULL, 'https://www.zmki.cn/5366.html', _t('<span style="color: #608cee; margin-right:0px;">蓝色模块</span>跳转链接'), _t('输入蓝色模块跳转的链接,'));
    $form->addInput($zmki_top_main_one_url);
    // 顶部模块 红色 文字自定义
    $zmki_top_main_two_name = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_two_name', NULL, '向日葵全家桶', _t('<span style="color: #fb5962; margin-right:0px;">红色模块文字</span>'), _t('输入顶部红色模块内的文字，默认 向日葵全家桶'));
    $form->addInput($zmki_top_main_two_name);
    $zmki_top_main_two_icon = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_two_icon', NULL, 'fa fa-star', _t('<span style="color: #fb5962; margin-right:0px;">红色模块</span>图标'), _t('可自定义红色模块内文字前的fontawesome图标，使用帮助请查看:<a href="https://www.zmki.cn/doc/33772.html">www.zmki.cn/doc/33772.html</a>，红色默认 fa fa-star'));
    $form->addInput($zmki_top_main_two_icon);
    $zmki_top_main_two_url = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_two_url', NULL, 'https://www.k1v.cn', _t('<span style="color: #fb5962; margin-right:0px;">红色模块</span>跳转链接'), _t('输入红色模块跳转的链接,'));
    $form->addInput($zmki_top_main_two_url);
    // 顶部模块 黄色 文字自定义
    $zmki_top_main_three_name = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_three_name', NULL, '关于导航', _t('<span style="color: #fbb359; margin-right:0px;">黄色模块文字</span>'), _t('输入顶部黄色模块内的文字，默认 关于导航'));
    $form->addInput($zmki_top_main_three_name);
    $zmki_top_main_three_icon = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_three_icon', NULL, 'fa fa-registered', _t('<span style="color: #fbb359; margin-right:0px;">黄色模块</span>图标'), _t('可自定义黄色模块内文字前的fontawesome图标，使用帮助请查看:<a href="https://www.zmki.cn/doc/33772.html">www.zmki.cn/doc/33772.html</a>，黄色默认 fa fa-registered'));
    $form->addInput($zmki_top_main_three_icon);
    $zmki_top_main_three_url = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_three_url', NULL, 'https://tool.zmki.cn/index.php/about.html', _t('<span style="color: #fbb359; margin-right:0px;">黄色模块</span>跳转链接'), _t('输入黄色模块跳转的链接,'));
    $form->addInput($zmki_top_main_three_url);
    // 顶部模块 绿色 文字自定义
    $zmki_top_main_four_name = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_four_name', NULL, '更多主题', _t('<span style="color: #53bf6b; margin-right:0px;">绿色模块文字</span>'), _t('输入顶部绿色模块内的文字，默认 更多主题'));
    $form->addInput($zmki_top_main_four_name);
    $zmki_top_main_four_icon = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_four_icon', NULL, 'fa fa-diamond', _t('<span style="color: #53bf6b; margin-right:0px;">绿色模块</span>图标'), _t('可自定义绿色模块内文字前的fontawesome图标，使用帮助请查看:<a href="https://www.zmki.cn/doc/33772.html">www.zmki.cn/doc/33772.html</a>，绿色默认 fa fa-diamond'));
    $form->addInput($zmki_top_main_four_icon);
    $zmki_top_main_four_url = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_four_url', NULL, 'https://www.zmki.cn/', _t('<span style="color: #53bf6b; margin-right:0px;">绿色模块</span>跳转链接'), _t('输入绿色模块跳转的链接,'));
    $form->addInput($zmki_top_main_four_url);
    // 顶栏 钻芒博客 文字自定义
    $zmki_myname = new Typecho_Widget_Helper_Form_Element_Text('zmki_myname', NULL, '钻芒博客', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-prompt"></use></svg>  顶栏AD文字'), _t('输入你的首页顶栏收录提交右侧自定义文字，默认 钻芒博客'));
    $form->addInput($zmki_myname);
    // 顶栏 钻芒博客 链接自定义
    $zmki_myurl = new Typecho_Widget_Helper_Form_Element_Text('zmki_myurl', NULL, 'https://www.zmki.cn/', _t('顶栏AD链接'), _t('输入你的首页顶栏收录提交右侧文字调整的url，默认 https://www.zmki.cn/'));
    $form->addInput($zmki_myurl);
    $zmki_links = new Typecho_Widget_Helper_Form_Element_Text('zmki_links', NULL, '/links.html', _t('收录提交URL链接'), _t('默认访问/links.html  请前往管理-独立页面设置页面并填入内容，开启评论用做收录提交页，并返回此处填写链接'));
    $form->addInput($zmki_links);
    $Isabout = new Typecho_Widget_Helper_Form_Element_Text('Isabout', NULL, '/about.html', _t('关于我们URL链接'), _t('默认访问/about.html  与上一条同理'));
    $form->addInput($Isabout);
    $isSearch = new Typecho_Widget_Helper_Form_Element_Radio('isSearch', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-battery"></use></svg> 搜索功能'), _t("是否启用搜索"));
    $form->addInput($isSearch);
    // 右侧悬浮窗开启
    $fk_zmki = new Typecho_Widget_Helper_Form_Element_Radio('fk_zmki', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-position"></use></svg> 右侧悬浮窗'), _t("是否开启右侧悬浮窗"));
    $form->addInput($fk_zmki);
    //悬浮窗公众号
    $fk_zmki_gzhimg = new Typecho_Widget_Helper_Form_Element_Text('fk_zmki_gzhimg', NULL, '/usr/themes/WebStack/images/gzhimg.png', _t('悬浮窗内公众号图片url'), _t('悬浮窗内公众号图片，默认:/usr/themes/WebStack/images/gzhimg.png 正方形即可大小自适应，此功能需开启悬浮窗才会显示'));
    $form->addInput($fk_zmki_gzhimg);
    //悬浮窗公众号 描述
    $fk_zmki_gzhtext = new Typecho_Widget_Helper_Form_Element_Text('fk_zmki_gzhtext', NULL, '极客导航-很有范的导航站', _t('悬浮窗内公众号下描述自定义'), _t('悬浮窗内公众号图片下方自定义文字，默认极客导航-很有范的导航站，此功能需开启悬浮窗才会显示'));
    $form->addInput($fk_zmki_gzhtext);
    // 悬浮窗QQ
    $fk_zmki_qq = new Typecho_Widget_Helper_Form_Element_Text('fk_zmki_qq', NULL, '123456789', _t('悬浮窗QQ'), _t('输入右下角悬浮窗内的qq，默认 123456789 ，此功能需开启悬浮窗才会显示'));
    $form->addInput($fk_zmki_qq);
    // 悬浮窗email
    $fk_zmki_email = new Typecho_Widget_Helper_Form_Element_Text('fk_zmki_email', NULL, 'a@zmki.cn', _t('悬浮窗在线邮件'), _t('输入右下角悬浮窗内的qq，默认 a@zmki.cn ，此功能需开启悬浮窗才会显示'));
    $form->addInput($fk_zmki_email);
    // 悬浮窗链接名称
    $fk_zmki_name = new Typecho_Widget_Helper_Form_Element_Text('fk_zmki_name', NULL, '钻芒博客', _t('悬浮窗AD 更多 名称'), _t('输入右下角悬浮窗内的更多 后的自定义文字，默认 钻芒博客 ，此功能需开启悬浮窗才会显示'));
    $form->addInput($fk_zmki_name);
    // 悬浮窗链接
    $fk_zmki_url = new Typecho_Widget_Helper_Form_Element_Text('fk_zmki_url', NULL, 'https:www.zmki.cn/', _t('悬浮窗AD 更多 名称 超链接'), _t('输入右下角悬浮窗内AD的url，默认 https:www.zmki.cn/，此功能需开启悬浮窗才会显示'));
    $form->addInput($fk_zmki_url);
    // IPC备案号
    $zmki_icp = new Typecho_Widget_Helper_Form_Element_Text('zmki_icp', NULL, '豫ICP备12222222号', _t('ICP备案号'), _t('如果在国内已进行备案，可在此处填写icp备案号;如:豫ICP备12222222号。备案号超链接将会被跳转至工信部网站 '));
    $form->addInput($zmki_icp);
    // 是否开启网站运算时间
    $zmki_time_no = new Typecho_Widget_Helper_Form_Element_Radio('zmki_time_no', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('是否开启网站运算时间'), _t("选择开启即会在网站底部栏显示网站已运行时间。如开启请不要忘记设置下边的创建时间"));
    $form->addInput($zmki_time_no);
    // 网站运行时间
    $zmki_time = new Typecho_Widget_Helper_Form_Element_Text('zmki_time', NULL, '1/1/2019 11:13:14', _t('网站运行时间'), _t('默认: 1/1/2019 11:13:14  请按照前边的实例按格式填写创建时间，分别是月/日/年 时:分:秒 '));
    $form->addInput($zmki_time);
    // 统计代码
    $zmki_tongji = new Typecho_Widget_Helper_Form_Element_Text('zmki_tongji', NULL, ' ', _t('统计代码'), _t('body标签内，请放入CNZZ或百度统计代码'));
    $form->addInput($zmki_tongji);
    // 底部版权
    $zmki_r = new Typecho_Widget_Helper_Form_Element_Text('zmki_r', NULL, 'ZMKi', _t('网站底部版权'), _t('自定义底部版权，请保留前方作者链接。谢谢！默认 ZMKI'));
    $form->addInput($zmki_r);
    // 友情链接
    $zmki_footer_links = new Typecho_Widget_Helper_Form_Element_Radio('zmki_footer_links', array('1' => _t('禁用'), '0' => _t('启用')), '1', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-user-girl"></use></svg>  底部友情链接 <svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-user-boy"></use></svg>'), _t('是否开启底部友情链接, 如开启必须安装插件 否则首页报错。不使用关闭即可 插件下载:<a target="_blank" href="https://www.zmki.cn/doc/33774.html">点击下载配套插件</a>'));
    $form->addInput($zmki_footer_links);
 //   页底统计跳转 
    $bdtongji = new Typecho_Widget_Helper_Form_Element_Text('bdtongji', NULL, NULL, _t('网站统计跳转链接'), _t('页底 网站统计 跳转链接，到百度统计、cnzz申请。'));
    $form->addInput($bdtongji);	
 //  header 统计、广告代码	
    $headertjcode = new Typecho_Widget_Helper_Form_Element_Textarea('headertjcode', NULL, NULL, _t('header 统计、广告代码'), _t('header 统计、广告代码。'));
    $form->addInput($headertjcode);  
    // postsads1
    $zmki_postsads1 = new Typecho_Widget_Helper_Form_Element_Text('zmki_postsads1', NULL, ' ', _t('postsads1'), _t('postsads1，请放入广告代码1'));
    $form->addInput($zmki_postsads1);
    // postsads2
    $zmki_postsads2 = new Typecho_Widget_Helper_Form_Element_Text('zmki_postsads2', NULL, '', _t('postsads2'), _t('postsads2，请放入广告代码2'));
    $form->addInput($zmki_postsads2);
    // postsads3
    $zmki_postsads3 = new Typecho_Widget_Helper_Form_Element_Text('zmki_postsads3', NULL, '', _t('postsads3'), _t('postsads3，请放入广告代码3'));
    $form->addInput($zmki_postsads3);
}
//文章自定义字段
function themeFields($layout) {
    $url = new Typecho_Widget_Helper_Form_Element_Textarea('url', NULL, '', _t('跳转链接'), _t('请输入跳转URL,建议不用以 / 结尾。'));
    $rssurl = new Typecho_Widget_Helper_Form_Element_Textarea('rssurl', NULL, '', _t('订阅链接'), _t('请RSS订阅URL，没有则不填写！'));
    $text = new Typecho_Widget_Helper_Form_Element_Textarea('text', NULL, '', _t('链接评价'), _t('请输入你对网站的一些评语！'));
    $logo = new Typecho_Widget_Helper_Form_Element_Textarea('logo', NULL, '', _t('链接logo'), _t('请输入Logo URL链接，不填则自动API获取。'));
    $layout->addItem($url);
    $layout->addItem($rssurl);
    $layout->addItem($text);
    $layout->addItem($logo);
}
// 热门文章
class Widget_Post_hot extends Widget_Abstract_Contents {
    public function __construct($request, $response, $params = NULL) {
        parent::__construct($request, $response, $params);
        $this->parameter->setDefault(array('pageSize' => $this->options->commentsListSize, 'parentId' => 0, 'ignoreAuthor' => false));
    }
    public function execute() {
        $select = $this->select()->from('table.contents')->where("table.contents.password IS NULL OR table.contents.password = ''")->where('table.contents.status = ?', 'publish')->where('table.contents.created <= ?', time())->where('table.contents.type = ?', 'post')->limit($this->parameter->pageSize)->order('table.contents.views', Typecho_Db::SORT_DESC);
        $this->db->fetchAll($select, array($this, 'push'));
    }
}

/*
 * 无插件阅读数
*/
function get_post_view($archive) {
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
    }
    echo $row['views'];
}
/*
 * 文章赞踩功能
*/

function agreeNum($cid) {
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    
    //  判断点赞数量字段是否存在
    if (!array_key_exists('agree', $db->fetchRow($db->select()->from('table.contents')))) {
        //  在文章表中创建一个字段用来存储点赞数量
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `agree` INT(10) NOT NULL DEFAULT 1;');
    }
    //  查询出点赞数量
    $agree = $db->fetchRow($db->select('table.contents.agree')->from('table.contents')->where('cid = ?', $cid));
    //  获取记录点赞的 Cookie
    $AgreeRecording = Typecho_Cookie::get('typechoAgreeRecording');
    //  判断记录点赞的 Cookie 是否存在
    if (empty($AgreeRecording)) {
        //  如果不存在就写入 Cookie
        Typecho_Cookie::set('typechoAgreeRecording', json_encode(array(0)));
    }
    //  返回
    return array(
        //  点赞数量
        'agree' => $agree['agree'],
        //  文章是否点赞过
        'recording' => in_array($cid, json_decode(Typecho_Cookie::get('typechoAgreeRecording')))?true:false
    );
}

function agree($cid) {
    $db = Typecho_Db::get();
    //  根据文章的 `cid` 查询出点赞数量
    $agree = $db->fetchRow($db->select('table.contents.agree')->from('table.contents')->where('cid = ?', $cid));
    //  获取点赞记录的 Cookie
    $agreeRecording = Typecho_Cookie::get('typechoAgreeRecording');
    //  判断 Cookie 是否存在
    if (empty($agreeRecording)) {
        //  如果 cookie 不存在就创建 cookie
        Typecho_Cookie::set('typechoAgreeRecording', json_encode(array($cid)));
    }else {
        //  把 Cookie 的 JSON 字符串转换为 PHP 对象
        $agreeRecording = json_decode($agreeRecording);
        //  判断文章是否点赞过
        if (in_array($cid, $agreeRecording)) {
            //  如果当前文章的 cid 在 cookie 中就返回文章的赞数，不再往下执行
            return $agree['agree'];
        }
        //  添加点赞文章的 cid
        array_push($agreeRecording, $cid);
        //  保存 Cookie
        Typecho_Cookie::set('typechoAgreeRecording', json_encode($agreeRecording));
    }
    //  更新点赞字段，让点赞字段 +1
    $db->query($db->update('table.contents')->rows(array('agree' => (int)$agree['agree'] + 1))->where('cid = ?', $cid));
    //  查询出点赞数量
    $agree = $db->fetchRow($db->select('table.contents.agree')->from('table.contents')->where('cid = ?', $cid));
    //  返回点赞数量
    return $agree['agree'];
}


function disagreeNum($cid) {
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    
    //  判断踩踏数量字段是否存在
    if (!array_key_exists('disagree', $db->fetchRow($db->select()->from('table.contents')))) {
        //  在文章表中创建一个字段用来存储踩踏数量
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `disagree` INT(10) NOT NULL DEFAULT 1;');
    }
    //  查询出踩踏数量
    $disagree = $db->fetchRow($db->select('table.contents.disagree')->from('table.contents')->where('cid = ?', $cid));
    //  获取记录踩踏的 Cookie
    $DisagreeRecording = Typecho_Cookie::get('typechoDisagreeRecording');
    //  判断记录踩踏的 Cookie 是否存在
    if (empty($DisagreeRecording)) {
        //  如果不存在就写入 Cookie
        Typecho_Cookie::set('typechoDisagreeRecording', json_encode(array(0)));
    }
    //  返回
    return array(
        //  踩踏数量
        'disagree' => $disagree['disagree'],
        //  文章是否踩踏过
        'disrecording' => in_array($cid, json_decode(Typecho_Cookie::get('typechoDisagreeRecording')))?true:false
    );
}

function disagree($cid) {
    $db = Typecho_Db::get();
    //  根据文章的 `cid` 查询出踩踏数量
    $disagree = $db->fetchRow($db->select('table.contents.disagree')->from('table.contents')->where('cid = ?', $cid));
    //  获取踩踏记录的 Cookie
    $disagreeRecording = Typecho_Cookie::get('typechoDisagreeRecording');
    //  判断 Cookie 是否存在
    if (empty($disagreeRecording)) {
        //  如果 cookie 不存在就创建 cookie
        Typecho_Cookie::set('typechoDisagreeRecording', json_encode(array($cid)));
    }else {
        //  把 Cookie 的 JSON 字符串转换为 PHP 对象
        $disagreeRecording = json_decode($disagreeRecording);
        //  判断文章是否踩踏过
        if (in_array($cid, $disagreeRecording)) {
            //  如果当前文章的 cid 在 cookie 中就返回文章的赞数，不再往下执行
            return $disagree['disagree'];
        }
        //  添加踩踏文章的 cid
        array_push($disagreeRecording, $cid);
        //  保存 Cookie
        Typecho_Cookie::set('typechoDisagreeRecording', json_encode($disagreeRecording));
    }
    //  更新踩踏字段，让踩踏字段 +1
    $db->query($db->update('table.contents')->rows(array('disagree' => (int)$disagree['disagree'] + 1))->where('cid = ?', $cid));
    //  查询出踩踏数量
    $disagree = $db->fetchRow($db->select('table.contents.disagree')->from('table.contents')->where('cid = ?', $cid));
    //  返回踩踏数量
    return $disagree['disagree'];
}

/*
 * 文章评级
*/

function getLikeStatus($cid){
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('agree, disagree, views')->from('table.contents')->where('cid = ?', $cid));
    $agree = $rs['agree'];
    $disagree = $rs['disagree'];
    $views = $rs['views'];
    $views = 0; // 假设 $views 的值为 1200  
    $viewspf = 0; // 初始化 $viewspf 的值  
    if ($views >= 0 && $views <= 1000) {  
         $viewspf = 0.3; // 如果 $views 值在 0 至 1000 之间，则 $viewspf 为 0.3 
    } elseif ($views > 1000 && $views <= 2000) {  
         $viewspf = 0.6; // 如果 $views 值在 1000 至 2000 之间，则 $viewspf 为 0.6                             
    } elseif ($views > 2000) {  
         $viewspf = 0.9; // 如果 $views 值大于 2000，则 $viewspf 为 0.9  
    }
    if($agree > 0 || $disagree > 0){
        $total = $agree + $disagree;
        $WebLevels = round((round($agree / ($agree + $disagree) * 400) + round($viewspf * 200) + 400)/ 100);
        echo $WebLevels ;
    }
}

/**
* 自动添加tag标签
*/
Typecho_Plugin::factory('admin/write-post.php')->bottom = array('tagshelper', 'tagslist');
class tagshelper {
    public static function tagslist()
    {      
    $tag="";$taglist="";$i=0;//循环一次利用到两个位置
Typecho_Widget::widget('Widget_Metas_Tag_Cloud', 'sort=count&desc=1&limit=200')->to($tags);
while ($tags->next()) {
$tag=$tag."'".$tags->name."',";
$taglist=$taglist."<a id=".$i." onclick=\"$(\'#tags\').tokenInput(\'add\', {id: \'".$tags->name."\', tags: \'".$tags->name."\'});\">".$tags->name."</a>";
$i++;
}
?><style>.Posthelper a{cursor: pointer; padding: 0px 6px; margin: 2px 0;display: inline-block;border-radius: 2px;text-decoration: none;}
.Posthelper a:hover{background: #ccc;color: #fff;}.fullscreen #tab-files{right: 0;}/*解决全屏状态下鼠标放到附件上传按钮上导致的窗口抖动问题*/
</style>
<script>
  function chaall () {
   var html='';
 $("#file-list li .insert").each(function(){
   var t = $(this), p = t.parents('li');
   var file=t.text();
   var url= p.data('url');
   var isImage= p.data('image');
   if ($("input[name='markdown']").val()==1) {
   html = isImage ? html+'\n!['+file+'](' + url + ')\n':''+html+'';
   }else{
   html = isImage ? html+'<img src="' + url + '" alt="' + file + '" />\n':''+html+'';
   }
    });
   var textarea = $('#text');
   textarea.replaceSelection(html);return false;
    }
    function chaquan () {
   var html='';
 $("#file-list li .insert").each(function(){
   var t = $(this), p = t.parents('li');
   var file=t.text();
   var url= p.data('url');
   var isImage= p.data('image');
   if ($("input[name='markdown']").val()==1) {
   html = isImage ? html+'':html+'\n['+file+'](' + url + ')\n';
   }else{
   html = isImage ? html+'':html+'<a href="' + url + '"/>' + file + '</a>\n';
   }
    });
   var textarea = $('#text');
   textarea.replaceSelection(html);return false;
    }
function filter_method(text, badword){
    //获取文本输入框中的内容
    var value = text;
    var res = '';
    //遍历敏感词数组
    for(var i=0; i<badword.length; i++){
        var reg = new RegExp(badword[i],"g");
        //判断内容中是否包括敏感词        
        if (value.indexOf(badword[i]) > -1) {
            $('#tags').tokenInput('add', {id: badword[i], tags: badword[i]});
        }
    }
    return;
}
var badwords = [<?php echo $tag; ?>];
function chatag(){
var textarea=$('#text').val();
filter_method(textarea, badwords); 
}
  $(document).ready(function(){
    $('#file-list').after('<div class="Posthelper"><a class="w-100" onclick=\"chaall()\" style="background: #467B96;background-color: #3c6a81;text-align: center; padding: 5px 0; color: #fbfbfb; box-shadow: 0 1px 5px #ddd;">插入所有图片</a><a class="w-100" onclick=\"chaquan()\" style="background: #467B96;background-color: #3c6a81;text-align: center; padding: 5px 0; color: #fbfbfb; box-shadow: 0 1px 5px #ddd;">插入所有非图片附件</a></div>');
    $('#tags').after('<div style="margin-top: 35px;" class="Posthelper"><ul style="list-style: none;border: 1px solid #D9D9D6;padding: 6px 12px; max-height: 240px;overflow: auto;background-color: #FFF;border-radius: 2px;margin-bottom: 0;"><?php echo $taglist; ?></ul><a class="w-100" onclick=\"chatag()\" style="background: #467B96;background-color: #3c6a81;text-align: center; padding: 5px 0; color: #fbfbfb; box-shadow: 0 1px 5px #ddd;">检测内容插入标签</a></div>');
  }); 
  </script>
<?php
    }
}