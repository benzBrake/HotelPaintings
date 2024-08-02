<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <h3 class="archive-title"><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ], '', ''); ?></h3>
    <ul class="post-list">
        <?php if ($this->have()): ?>
            <?php while ($this->next()): ?>
                <li class="post relative" itemscope itemtype="http://schema.org/BlogPosting">
                    <a itemprop="url" href="<?php $this->permalink() ?>">
                        <span class="date"><?php $this->date('Y-m-d'); ?></span>
                        <span class="spliter">»</span>
                        <span class="title" itemprop="name headline"><?php $this->title() ?></span>
                    </a>
                </li>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="text-[2.5em]"><?php _e("They're in another queue!") ?></div>
        <?php endif; ?>
    </ul>
    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main -->
<?php $this->need('footer.php'); ?>
