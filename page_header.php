<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="<?php $this->options->charset(); ?>">
<title><?php $this->archiveTitle(array(
 'category'  =>  _t('分类 %s 下的文章'),
 'search'    =>  _t('包含关键字 %s 的文章'),
 'tag'       =>  _t('标签 %s 下的文章'),
 'author'    =>  _t('%s 发布的文章')
 ), '', ' - '); ?><?php $this->options->title(); ?><?php if ($this->is('index')): ?><?php endif; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="copyright" content="webstack_1.1.0_www.80srz.com">
<link rel="shortcut icon" href="<?php $this->options->favicon(); ?>">
<link rel="apple-touch-icon" href="<?php $this->options->favicon(); ?>">  
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/fonts/linecons/css/linecons.css'); ?>"> 
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/font-awesome.min.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/xenon-core.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/xenon-components.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/xenon-skins.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/nav.css'); ?>">
<script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php $this->options->themeUrl('page/css/font-awesome.min.css'); ?>" type="text/css">
<link rel="stylesheet" href="<?php $this->options->themeUrl('page/css/style.css'); ?>" type="text/css">
<script src="<?php $this->options->themeUrl('page/js/jquery-2.2.4.min.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('page/js/zblogphp.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('page/js/c_html_js_add.js'); ?>" type="text/javascript"></script>
<meta property="og:type" content="article">
<meta property="og:image" content="">
<meta property="og:release_date" content="2023-11-24 15:38:30">
  <?php $this->header(); ?> 
<!--header 统计、广告代码	 --> 
<?php if($this->options->headertjcode): ?> <?php $this->options->headertjcode();?> <?php endif; ?>	  
</head> 
<body class="day page-body <?php echo($_COOKIE['night'] == '1' ? 'night' : ''); ?>">
    <!-- skin-white -->
<div class="page-container">