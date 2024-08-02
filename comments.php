<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
        <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php endif; ?>

    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>

            <h3 id="response"><?php _e('添加新评论'); ?></h3>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if ($this->user->hasLogin()): ?>
                    <p><?php _e('登录身份: '); ?><a
                            href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a
                            href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                    </p>
                <?php else: ?>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-1">
                        <p>
                            <label for="Nickname"
                                   class="block text-sm font-medium text-gray-700"><?php _e('称呼'); ?></label>
                            <input
                                type="text" id="Nickname" name="author"
                                class="mt-1 w-full border border-dotted border-gray-600 bg-white text-sm text-gray-700 shadow-sm"
                                value="<?php $this->remember('author'); ?>" placeholder="<?php _e("帅气的象拔蚌"); ?>"
                                required
                            />
                        </p>
                        <p>
                            <label for="mail"
                                   class="block text-sm font-medium text-gray-700 <?php if ($this->options->commentsRequireMail): ?>required<?php endif; ?>"><?php _e('邮箱'); ?></label>
                            <input
                                type="email" id="Mail" name="mail"
                                class="mt-1 w-full border border-dotted border-gray-600 bg-white text-sm text-gray-700 shadow-sm"
                                value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>
                                placeholder="<?php _e("xxx@qq.com"); ?>"
                            />
                        </p>
                        <p>
                            <label for="url"
                                   class="block text-sm font-medium text-gray-700 <?php if ($this->options->commentsRequireURL): ?>required<?php endif; ?>"><?php _e('网站'); ?></label>
                            <input
                                type="text" id="Url" name="url"
                                class="mt-1 w-full border border-dotted border-gray-600 bg-white text-sm text-gray-700 shadow-sm"
                                value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>
                                placeholder="<?php _e('http://'); ?>"
                            />
                        </p>
                    </div>
                <?php endif; ?>
                <textarea rows="8" cols="50" name="text" id="textarea" class="textarea"
                          required><?php $this->remember('text'); ?></textarea>
                <div id="comment-toolbar">
                    <button type="submit" class="comment-submit"><?php _e('提交评论'); ?></button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
