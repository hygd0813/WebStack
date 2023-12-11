<?php 
//  判断是否是点赞的 POST 请求  
if (isset($_POST['agree'])) {  
    //  判断 POST 请求中的 cid 是否是本篇文章的 cid  
    if ($_POST['agree'] == $this->cid) {  
        //  调用点赞函数，传入文章的 cid，然后通过 exit 输出点赞数量  
        try {  
            $result = agree($this->cid);  
            if ($result === false) {  
                exit('点赞失败，请重试。');  
            } else {  
                exit('点赞成功！');  
            }  
        } catch (Exception $e) {  
            exit('点赞时发生错误：' . $e->getMessage());  
        }  
    } else {  
        exit('error');  
    }  
};  
  
//  判断是否是踩踏的 POST 请求  
if (isset($_POST['disagree'])) {  
    //  判断 POST 请求中的 cid 是否是本篇文章的 cid  
    if ($_POST['disagree'] == $this->cid) {  
        //  调用踩踏函数，传入文章的 cid，然后通过 exit 输出踩踏数量  
        try {  
            $result = disagree($this->cid);  
            if ($result === false) {  
                exit('踩踏失败，请重试。');  
            } else {  
                exit('踩踏成功！');  
            }  
        } catch (Exception $e) {  
            exit('踩踏时发生错误：' . $e->getMessage());  
        }  
    } else {  
        exit('error');  
    }  
}; 

if (!defined('__TYPECHO_ROOT_DIR__')) exit;    
?>
<?php $this->need('page_header.php'); ?>  
<?php $this->need('sidebar.php'); ?> 
 <div class="main-content" >
    <div id="mask"></div>
    <div class="breadnav">
        <div class="container bread">
            <?php $this->title() ?><i class="fa fa-angle-right"></i><?php $this->category('& '); ?><i class="fa fa-angle-right"></i><a title="首页" href="<?php $this->options->siteUrl();?>">首页</a>
        </div>
    </div>
    <div class="container"> 
        <div class="part">
            <div class="bar clearfix">
                <h1 class="tt">
                    <?php $this->title() ?> </h1>
                <div class="r-intro fr">
                    <span class="data fr">
                        <?php if($this->user->hasLogin()):?>
						<small class="info"><i class="fa fa-pencil-square-o"></i>&nbsp;<a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank">编辑</a></small>				  
                        <?php endif; ?>                     
                        <small class="info"><i class="fa fa-clock-o"></i>&nbsp;<?php $this->date('Y-n-j'); ?></small>
                        <small class="info"><i class="fa fa-eye"></i>&nbsp;<?php get_post_view($this) ?></small>
                    </span>
                </div>
            </div>
            <div class="items">
                <div class="row post-single">
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <div class="pic fl">
                            <div class="blur blur-layer" style="background: transparent url(<?php if($this->fields->logo == null):{echo $this->options->link_icon.$this->fields->url.$this->options->link_icon_end;}else:{echo $this->fields->logo;}endif;?>) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;animation: rotate 20s linear infinite;">
                            </div>
                            
                            <img class="img-cover" src="<?php if($this->fields->logo == null):{echo $this->options->link_icon.$this->fields->url.$this->options->link_icon_end;}else:{echo $this->fields->logo;}endif;?>"  
             class="img-circle" width="100" alt="《<?php $this->title() ?>》站点图标" title="《<?php $this->title() ?>》站点图标">
                        </div>
                        <div class="list">
                            <p>站点名称：<?php $this->title() ?></p>
                            <p class="cate">所属分类：<?php $this->category(','); ?></p>
                            <p class="tag">相关标签：
                            <span class="padding">
                            <?php $this->tags(' ', true, '暂无'); ?>
                            </span> 
                            </p>
                            <!--php判断-->
                            <?php 
                            $removeChar = ["https://", "http://", "/"];
                            $seourl = $this->fields->url;
                            $http_referer = str_replace($removeChar, "", $seourl);   
                            ?>
                            <p class="site">网址链接：<?php echo $http_referer; ?></p>              
                            <p class="seo">SEO查询：
                                <a rel="nofollow" href="https://www.aizhan.com/cha/<?php echo $http_referer; ?>" target="_blank"><i class="fa fa-bar-chart"></i>爱站网</a>
                                <!-- 站长网pc和wap的url不一样，需做判断 -->                            
                                <!--Wap-->
                                <a class="pcnone" rel="nofollow" href="https://mseo.chinaz.com/<?php echo $http_referer; ?>" target="_blank"><i class="fa fa-bar-chart"></i>站长工具</a> 
                                 <!--Pc-->
                                <a class="wapnone" rel="nofollow" href="http://seo.chinaz.com/<?php echo $http_referer; ?>" target="_blank"><i class="fa fa-bar-chart"></i>站长工具</a>  
                            </p>
                            <p style="display:inline;">站点评分：<div class="p_star product-star<?php getLikeStatus($this->cid); ?>"></div><a id="toggleIcon" style="margin-left:120px;" title="点击查看网址评级算法详情。"><i class="fa fa-question-circle-o" aria-hidden="true"/></i> = <?php getLikeStatus($this->cid); ?> / 10</a></p>
                        </div> 
                        <div id="floatingDiv" style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 999;">  
                             <h3>网址评级算法</h3>
                             <p><?php echo '1、网址评分 = round((round(点赞数 / (点赞数 + 踩踏数) * 400) + round(浏览热度评级 * 200) + 400)/ 100)，<br>即点赞、踩踏权重4分，浏览热度2分，基础分4分；';?></p>
                             <p><?php echo '2、网址等级满级为 10 分';?></p>
                             <h4>浏览热度评级算法</h4>
                             <p><?php echo '1、浏览数=0~1000；得分0；<br>2、浏览数=1000~2000；得分1；<br>3、浏览数=2000++；得分2；';?></p>  
                             <div style="display: flex;justify-content: center;align-items: center;"><button id="closeButton">关闭</button></div> 
                        </div>
                        <style>
                        #floatingDiv {  
  background-color: #f1f1f1;  
  border: 1px solid #ccc;  
  padding: 20px;  
  width: 400px;  
  box-shadow: 0 0 10px rgba(0,0,0,0.1);  
  transition: opacity 0.3s ease; 
  opacity: 0.7;  
}  
  
#closeButton {align: center;background-color:#98add3;color:red;}
#floatingDiv:hover {  
  opacity: 1;  
}
                        </style>
                        <script>
document.getElementById("toggleIcon").addEventListener("click", function() {  
  var floatingDiv = document.getElementById("floatingDiv");  
  if (floatingDiv.style.display === "none") {  
    floatingDiv.style.display = "block";  
  } else {  
    floatingDiv.style.display = "none";  
  }  
});  
  
document.getElementById("closeButton").addEventListener("click", function() {  
  document.getElementById("floatingDiv").style.display = "none";  
});  
  

                        </script>
                        <div class="list">
                            <?php $agree = $this->hidden?array('agree' => 0, 'recording' => true):agreeNum($this->cid); ?>  
                            <button <?php echo $agree['recording']?'disabled':''; ?> type="button" id="agree-btn" class="btn transition like-button" data-agreecid="<?php echo $this->cid; ?>"  data-agreeurl="<?php echo $this->permalink(); ?>">赞（ <span class="agree-num"><?php echo $agree['agree']; ?> </span>）<i class="fa fa-hand-o-up"></i></button>  
                            <?php $disagree = $this->hidden?array('disagree' => 0, 'disrecording' => true):disagreeNum($this->cid); ?>  
                            <button <?php echo $disagree['disrecording']?'disabled':''; ?> type="button" id="disagree-btn" class="btn transition dislike-button" data-disagreecid="<?php echo $this->cid; ?>" data-disagreeurl="<?php echo $this->permalink(); ?>">踩（ <span class="disagree-num"><?php echo $disagree['disagree']; ?></span> ）<i class="fa fa-hand-o-down"></i></button>
                            <button class="btn transition" ><a target="_blank" href="<?php $this->fields->url(); ?>" rel="external nofollow noopener noreferrer">点击查看&nbsp;<i class="fa fa-external-link"></i></a></button>
                        </div>  
 <script type="text/javascript">
//  点赞按钮点击
$('#agree-btn').on('click', function () {
  $('#agree-btn').get(0).disabled = true;  //  禁用点赞按钮
  $('#disagree-btn').get(0).disabled = true;  //  禁用踩踏按钮   
  //  发送 AJAX 请求
  $.ajax({
    //  请求方式 post
    type: 'post',
    //  url 获取点赞按钮的自定义 url 属性
    url: $('#agree-btn').attr('data-agreeurl'),
    //  发送的数据 cid，直接获取点赞按钮的 cid 属性
    data: 'agree=' + $('#agree-btn').attr('data-agreecid'),
    async: true,
    timeout: 3600,
    cache: false,
    //  请求成功的函数
    success: function (data) {
      var re = /\d/;  //  匹配数字的正则表达式
      //  匹配数字
      if (re.test(data)) {
        //  把点赞按钮中的点赞数量设置为传回的点赞数量
        $('#agree-btn .agree-num').html(data);
        // 在这里刷新页面，确保用户看到最新的数据  
       header("Location: " . $_SERVER["REQUEST_URI"]);  
       exit();            
      }
    },
    error: function () {
      //  如果请求出错就恢复点赞按钮
      $('#agree-btn').get(0).disabled = false;
      // 在这里刷新一次页面，避免用户看到错误状态的数据  
      header("Location: " . $_SERVER["REQUEST_URI"]);  
      exit();        
    },
  });  
});

//  踩踏按钮点击
$('#disagree-btn').on('click', function () {
  $('#disagree-btn').get(0).disabled = true;  //  禁用踩踏按钮 
  $('#agree-btn').get(0).disabled = true;  //  禁用点赞按钮  
  //  发送 AJAX 请求
  $.ajax({
    //  请求方式 post
    type: 'post',
    //  url 获取踩踏按钮的自定义 url 属性
    url: $('#disagree-btn').attr('data-disagreeurl'),
    //  发送的数据 cid，直接获取踩踏按钮的 cid 属性
    data: 'disagree=' + $('#disagree-btn').attr('data-disagreecid'),
    async: true,
    timeout: 3600,
    cache: false,
    //  请求成功的函数
    success: function (data) {
      var re = /\d/;  //  匹配数字的正则表达式
      //  匹配数字
      if (re.test(data)) {
        //  把踩踏按钮中的踩踏数量设置为传回的踩踏数量
        $('#disagree-btn .disagree-num').html(data);
        // 在这里刷新页面，确保用户看到最新的数据  
        header("Location: " . $_SERVER["REQUEST_URI"]);  
        exit();    
      }
    },
    error: function () {
      //  如果请求出错就恢复踩踏按钮
      $('#disagree-btn').get(0).disabled = false;    
    // 在这里刷新一次页面，避免用户看到错误状态的数据  
      header("Location: " . $_SERVER["REQUEST_URI"]);  
      exit();  
    },
  }); 
});
          
</script>                               
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <!-- 网站缩略图  -->
                      <img src="https://s0.wp.com/mshots/v1/<?php echo $this->fields->url;?>/?w=600&h=400" width="100%" height="auto" alt="《<?php $this->title() ?>》站点缩略图" title="《<?php $this->title() ?>》站点缩略图"/>
                    </div>
                </div>      
            </div>        
        </div>

        <?php if($this->options->zmki_postsads1): ?>
        <div class="part">
            <p class="tt"><span>广而告之</span></p>
            <div class="items">          
                    <!-- 广告位AD1  --><?php $this->options->zmki_postsads1(); ?>      
            </div>
        </div> 
       <?php endif; ?> 
        <div class="part">
            <p class="tt"><span>站点介绍</span></p>
            <div class="items">
                <div class="art-main art-main-content" style="padding:5px 0px;">
                    <table data-sort="sortDisabled">
                        <tbody width="100%">
                            <caption style="text-align:center;"><h2>网站 TDK 信息</h2></caption>
                            <tr class="Row" width="100%">
                                <?php  
                                // 获取网站HTML内容 
                                $htmlurl= $this->fields->url;
                                $html = file_get_contents($htmlurl);   
                                // 使用正则表达式提取TDK  
                                preg_match('/<title>(.*?)<\/title>/', $html, $matches);  
                                $title = $matches[1];  
                                preg_match('/<meta name="description" content="(.*?)"/', $html, $matches);  
                                $description = $matches[1];  
                                preg_match_all('/<meta name="keywords" content="(.*?)"/', $html, $matches);  
                                $keywords = $matches[1][0]; // 提取第一个关键词  
                                $webthemeurl = $this->options->themeUrl;
                                $webimgurl = $this->fields->url;
                                // 输出TDK信息  
                                echo "<td max-width='15%' valign='top' style='word-break: break-all; border-width: 1px; border-style: solid;'><b>网站名称</b></td>";
                                echo "<td width='60%' valign='top' style='word-break: break-all; border-width: 1px; border-style: solid;'>". $title . "</td>";
                                echo "<td width='25%' valign='middle' rowspan='4' colspan='1' style='word-break: break-all; border-width: 1px;border-style: solid;' align='center'><img src='" .$webthemeurl. "/qrcode.php?size=240&text=" .$webimgurl. "' width='160px' height='160px' alt='网址二维码'/><p>手机扫码查看</p></td>";
                                echo "</tr><tr>";
                                echo "<td max-width='15%' valign='top' style='word-break: break-all;  border-width: 1px; border-style: solid;'><b>网站关键字</b></td>";
                                echo "<td width='60%' valign='top' style='word-break: break-all; border-width: 1px; border-style: solid;'>" . $keywords . "</td>";
                                echo "</tr><tr>";
                                echo "<td max-width='15%' valign='top' style='word-break: break-all; border-width: 1px; border-style: solid;'><b>网站描述</b></td>";
                                echo " <td width='60%' valign='top' style='word-break: break-all; border-width: 1px; border-style: solid;'>" . $description . "</td>";
                                echo "</tr>";
                                ?>
                            <tr>
                                <td max-width="15%" valign="top" style="word-break: break-all; border-width: 1px; border-style: solid;"><b>网站评价</b></td>
                                <td width="60%" valign="top" style="word-break: break-all; border-width: 1px; border-style: solid;"><?php echo $this->fields->text;?></td>
                            </tr>
                        </tbody>
                    </table>
                    <span style="text-align:center;"><h2>网站详情介绍</h2></span>                    <div>
<?php    
$articleweb = $this->content();    
if ($this->content) {    
    echo ".$articleweb.";    
} else {    
    echo "博主太懒了，没给大家介绍！快联系他更新！";    
}    
?></div>
                </div>   
            </div>
        </div>
        <!-- 站点聚合文章 -->
        <?php if($this->fields->rssurl): ?>
        <div class="part">
            <p class="tt"><span>聚合文章</span></p>
            <div class="items">
                <div class="art-main-content">
<?php  
// 订阅源URL  
$rssUrl = $this->fields->rssurl;  
  
// 创建SimpleXML对象并加载订阅源  
$xml = simplexml_load_file($rssUrl);  
  
// 判断是RSS还是Atom  
$isRss = isset($xml->channel);  
$isAtom = isset($xml->{'feed'}) && isset($xml->{'feed'}->{'xmlns'}) && $xml->{'feed'}->{'xmlns'} == 'http://www.w3.org/2005/Atom';  
  
if (!$isRss && !$isAtom) {  
    // 无法识别feed格式  
    echo ('Unsupported feed format');  
}  
  
// 获取最新10篇文章列表  
$latestArticles = array();  
$count = 0;  
  
if ($isRss) {  
    foreach ($xml->channel->item as $article) {  
        $title = (string)$article->title;  
        $link = (string)$article->link;  
        $pubDate = (string)$article->pubDate;  
        $latestArticles[] = array('title' => $title, 'link' => $link, 'pubDate' => $pubDate);  
        $count++;  
        if ($count >= 10) {  
            break;  
        }  
    }  
} else if ($isAtom) {  
    foreach ($xml->{'feed'}->{'entry'} as $article) {  
        $title = (string)$article->{'title'};  
        $link = (string)$article->{'link'}['href'];  
        $pubDate = (string)$article->{'published'};  
        $latestArticles[] = array('title' => $title, 'link' => $link, 'pubDate' => $pubDate);  
        $count++;  
        if ($count >= 10) {  
            break;  
        }  
    }  
}  
  
// 输出最新10篇文章列表  
echo '<div class="row post-single post-single-list"><ul>';  
$rank = 1;  
foreach ($latestArticles as $article) {  
    // 假设原始的日期保存在名为 'pubDate' 的键中  
    $originalDate = $article['pubDate'];  
    // 使用 date 函数来格式化日期         
    $formattedDate = date('Y-m-d', strtotime($originalDate));        
    echo '<li class="col-xs-12 col-sm-12 col-md-6">';      
    echo '<i>'.$rank.'</i><span style="width:400px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; "><a href="' . $article['link'] . '" target="_blank" rel="nofollow">' . $article['title'] . '</a></span><span style="float:right;font-size:12px;margin:10px 0px 0 0;width:105px;"><a class="fa fa-clock-o"></a>&nbsp;' . $formattedDate . '</span>';       
    echo '</li>';   
    $rank++;     
}      
echo '</ul></div>';   
?>

             </div>  
            </div>
            </div>
       <?php endif; ?> 

        <?php if($this->options->zmki_postsads2): ?>
        <div class="part">
            <p class="tt"><span>广而告之</span></p>
            <div class="items">          
                    <!-- 广告位AD2  --><?php $this->options->zmki_postsads2(); ?>      
            </div>
        </div> 
       <?php endif; ?> 
   
         <div class="part related">
            <p class="tt"><span>热门站点</span></p>
            <div class="items">
                <div class="row">                   
    <?php $this->widget('Widget_Post_hot@hot', 'pageSize=20')->to($hot); ?>
    <?php while($hot->next()): ?>      
    <div class="col-sm-3">
	<?php if($this->options->isLink == '1'): ?>
	<!--开启内页-->
    <a href="<?php $hot->permalink() ?>" title="<?php $hot->title(); ?>" >
	<div class="xe-widget xe-conversations box2 label-info" title="<?php $hot->fields->url() ?>"> 
    <div class="xe-comment-entry">
          <span class="xe-user-img">
            <img src="<?php if($hot->fields->logo == null):{echo $hot->options->link_icon.$hot->fields->url.$hot->options->link_icon_end;}else:{echo $hot->fields->logo;}endif;?>"  
             class="img-circle" width="42" alt="<?php $hot->title(); ?>">
          </span>
	<div class="xe-comment">
          <span class="xe-user-name overflowClip_1">
              <strong><?php $hot->title(); ?></strong>
          </span>
            <p class="overflowClip_2" style="margin-top:5px;"><?php echo $hot->fields->text;?></p> 
     </div>
     </div>
     </div>
     </a>
     <?php endif; ?>
     <?php if($this->options->isLink == '0'): ?>
     <!--关闭内页-->
      <div class="xe-widget xe-conversations box2 label-info" onclick="window.open('<?php echo $hot->fields->url;?>', '_blank')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo $hot->fields->url;?>">
    <div class="xe-comment-entry">
          <a class="xe-user-img">
            <img src="<?php if($hot->fields->logo == null):{echo $hot->options->link_icon.$hot->fields->url.$hot->options->link_icon_end;}else:{echo $hot->fields->logo;}endif;?>"  
             class="img-circle" width="42">
          </a>
	<div class="xe-comment">
          <a class="xe-user-name overflowClip_1">
              <strong><?php $hot->title(); ?></strong>
          </a>
            <p class="overflowClip_2" style="margin-top:5px;"><?php echo $hot->fields->text;?></p> 
     </div>
     </div> 
     </div>
     <?php endif; ?>
     </div> 
    <?php endwhile; ?>    

                </div> 
            </div>
        </div>  
   
  <?php $this->need('comments.php'); ?>  
   
        <?php if($this->options->zmki_postsads3): ?>
        <div class="part">
            <p class="tt"><span>广而告之</span></p>
            <div class="items">          
                    <!-- 广告位AD3  --><?php $this->options->zmki_postsads3(); ?>      
            </div>
        </div> 
       <?php endif; ?>  
    </div> 
            <!-- Main Footer -->
 <?php $this->need('footer.php'); ?>
