<?php
/**
 * 一款复古主题
 *
 * @package HotelPaintings
 * @author Ryan
 * @version 1.0
 * @link https://xiamp.net
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div id="welcome">
    <h1 class="text-[1.5em] md:text-[2em] lg:text-[2.5em] py-4">Welcome to my blog!</h1>
    <img class="w-full" src="<?php echo getPicUrl('index.png'); ?>"/>
    <p class="my-4">I hope you enjoy your time here!</p>
</div>
<div id="recent-posts">
    <h2 class="my-4">Recent Posts</h2>
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
</div>
<?php if ($this->getCurrentPage() === 1): ?>
    <div class="page-navigator">
        <?php if ($this->getCurrentPage() !== getContentsTotalPage($this)): ?>
            <?php $this->pageLink('» more posts', 'next'); ?>
        <?php endif; ?>
    </div>
<?php else: ?>
    <?php $this->pageNav('» ' . _t('prev'), _t('next') . ' «'); ?>
<?php endif; ?>
<?php $this->need('footer.php'); ?>
