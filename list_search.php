<section class="sousuo">
  <div class="search">
    <div class="search-box">
      <span class="search-icon" style="background: url(<?php $this->options->siteUrl();?>usr/themes/WebStack/images/home-search.png) 0px 0px; background-repeat:no-repeat; background-size: 100%; opacity: 1;width:30px;height: 30px;"></span>
      <input type="text" id="txt" class="search-input"  autocomplete="off"  placeholder="请输入关键字，按回车 / Enter 搜索">
      <button class="search-btn" id="search-btn"><i class="fa fa-search"></i></button>
    </div>
    <!-- 搜索热词 -->
    <div class="box search-hot-text" id="box" style="display: none;">
      <ul></ul>
    </div>
    <!-- 搜索引擎 -->
    <div class="search-engine" style="display: none;">
      <div class="search-engine-head">
        <strong class="search-engine-tit">选择您的默认搜索引擎：</strong>
        <div class="search-engine-tool">搜索热词： <span id="hot-btn"></span></div>
      </div>
      <ul class="search-engine-list search-engine-list_zmki_ul"> 
      </ul>
    </div>
   </div>
</section> 
<script src="<?php $this->options->themeUrl('js/js/index.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/js/zui.js'); ?>"></script>