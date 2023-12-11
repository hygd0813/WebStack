<?php
$this->need('header.php');
?>
<?php $this->need('sidebar.php'); ?>  
<br>
    <div class="main-content"> 
	<?php if ($this->options->isSearch == '1'): ?>
    <?php $this->need('list_search.php'); ?> 
	<?php
endif; ?> 
    <div class="col-mb-12 col-8"   style="min-height: 300px;" id="main" role="main"> 
        <h4 class="text-gray not-select"><i class="linecons-tag" style="margin-right: 7px;" id="搜索结果"></i>
        <?php $this->archiveTitle(array('category' => _t('分类 %s 下的网站'), 'search' => _t('搜索到<red> %s </red>的网站'), 'tag' => _t('标签 %s 下的网站'), 'author' => _t('%s 发布的网站')), '', ''); ?></h4>
        <?php if ($this->have()): ?>
    	<?php while ($this->next()): ?>
    	 
    	 
	<?php $this->widget('Widget_Metas_Category_List')->to($posts); ?>    
	 
    <div class="col-sm-3">
	<?php if ($this->options->isLink == '1'): ?>
	<!--开启内页-->
    <a href="<?php $this->permalink() ?>" title="<?php $this->title(); ?>" >
	<div class="xe-widget xe-conversations box2 label-info"  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php $this->permalink() ?>"> 
    <div class="xe-comment-entry">
          <span class="xe-user-img">
            <img src="<?php if ($this->fields->logo == null): {
                    echo $this->options->link_icon . $this->fields->url . $this->options->link_icon_end;
                } else: {
                        echo $this->fields->logo;
                    }
                endif; ?>"  
             class="img-circle" width="42" alt="<?php $this->title(); ?>">
          </span>
	<div class="xe-comment">
          <span class="xe-user-name overflowClip_1">
              <strong><?php $this->title(); ?></strong>
          </span>
            <p class="overflowClip_2" style="margin-top:5px;"><?php echo $this->fields->text; ?></p> 
     </div>
     </div>
     </div>
     </a>
     <?php
            endif; ?>
     <?php if ($this->options->isLink == '0'): ?>
     <!--关闭内页-->
      <div class="xe-widget xe-conversations box2 label-info" onclick="window.open('<?php echo $this->fields->url; ?>', '_blank')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo $this->fields->url; ?>">
    <div class="xe-comment-entry">
          <a class="xe-user-img">
            <img src="<?php if ($this->fields->logo == null): {
                        echo $this->options->link_icon . $this->fields->url . $this->options->link_icon_end;
                    } else: {
                            echo $this->fields->logo;
                        }
                    endif; ?>"  
             class="img-circle" width="32">
          </a>
	<div class="xe-comment">
          <a class="xe-user-name overflowClip_1">
              <strong><?php $this->title(); ?></strong>
          </a>
            <p class="overflowClip_2"><?php echo $this->fields->text; ?></p> 
     </div>
     </div> 
     </div>
     <?php
                endif; ?>
     </div>  
    		 
    	<?php
            endwhile; ?>
        <?php
        else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php
        endif; ?>


        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </div><!-- end #main -->
      
     
<?php $this->need('footer.php'); ?>  