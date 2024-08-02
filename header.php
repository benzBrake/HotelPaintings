<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php echo getCssUrl('style.css'); ?>">

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body class="bg-defined">
<div
    class="container mx-auto w-[90%] max-w-[700px] my-4 md:my-8 lg:my-12 xl:my-16 outline outline-1 outline-black bg-white">
    <header id="header"
            class="clearfix relative px-[5%]"<?php if ($this->options->logoUrl): ?> logourl="<?php $this->options->logoUrl(); ?>"<?php endif; ?>>
        <ul id="nav-menu" class="clearfix py-2" role="navigation">
            <li class="menu-item <?php if ($this->is('index')): ?> current<?php endif; ?>">
                <a class="menu-link" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
            </li>
            <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
            <?php while ($pages->next()): ?>
                <li class="menu-item"><a
                        class="menu-link <?php if ($this->is('page', $pages->slug)): ?>current<?php endif; ?>"
                        href="<?php $pages->permalink(); ?>"
                        title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
    </header><!-- end #header -->
    <div id="body">


    
    
