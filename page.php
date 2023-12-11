<?php
/**
 * 关于
 * 
 * @package custom
 *
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
 <?php $this->need('page_header.php'); ?>   
 <?php $this->need('sidebar.php'); ?> 
 
<div class="main-content" >
<div id="mask"></div>
    <div class="breadnav">
        <div class="container bread">
            <?php $this->title() ?><i class="fa fa-angle-right"></i><a title="首页" href="<?php $this->options->siteUrl();?>">首页</a>
        </div>
    </div>
    <div class="container">    
        <div class="part">
            <div class="bar clearfix">
            <h1 class="tt text-gray"><span>#</span><?php $this->title(); ?></h1> 
                <div class="r-intro fr">
                    <span class="data fr">
                        <small class="info"><i class="fa fa-clock-o"></i><?php $this->date('Y-n-j'); ?></small>
                        <small class="info"><i class="fa fa-eye"></i><?php get_post_view($this) ?></small>
                        <!-- <small class="info"><i class="fa fa-user-o"></i><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></small> -->
                    </span>
                </div>          
            <div class="items">
                <div class="page-zmki"> 
                <?php $this->content(); ?> 
                </div>
            </div>        </div>
        </div>
 
        <?php if($this->options->zmki_postsads1): ?>
        <div class="part">
            <p class="tt"><span>广而告之</span></p>
            <div class="items">          
                    <!-- 广告位AD1  --><?php $this->options->zmki_postsads1(); ?>      
            </div>
        </div> 
       <?php endif; ?> 

  <?php $this->need('comments.php'); ?>   

    </div> 
         
        <?php if($this->options->zmki_postsads3): ?>
        <div class="part">
            <p class="tt"><span>广而告之</span></p>
            <div class="items">          
                    <!-- 广告位AD3  --><?php $this->options->zmki_postsads3(); ?>      
            </div>
        </div> 
       <?php endif; ?>  
    
        <!-- Main Footer -->
        <?php $this->need('footer.php'); ?>