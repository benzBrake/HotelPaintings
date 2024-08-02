<?php

use Typecho\Common;
use Utils\Helper;

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点 LOGO 地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO')
    );

    $form->addInput($logoUrl);

    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'sidebarBlock',
        [
            'ShowRecentPosts' => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory' => _t('显示分类'),
            'ShowArchive' => _t('显示归档'),
            'ShowOther' => _t('显示其它杂项')
        ],
        ['ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'],
        _t('侧边栏显示')
    );

    $form->addInput($sidebarBlock->multiMode());
}

/**
 * 获取静态资源URL
 *
 * @param string $uri 资源 URI
 * @return string
 */
function getStaticUrl(string $uri = ''): string
{
    return Common::url('assets/dist/' . ltrim($uri, '/') . Helper::options()->themeUrl);
}

/**
 * 获取CSS资源URL
 *
 * @param string $file 文件名
 * @return string
 */
function getCssUrl(string $file = ''): string
{
    return Common::url('assets/dist/css/' . ltrim($file, '/'), Helper::options()->themeUrl);
}

function getJsUrl(string $file = ''): string
{
    return Common::url('assets/dist/js/' . ltrim($file, '/'), Helper::options()->themeUrl);
}

function getPicUrl(string $file = ''): string
{
    return Common::url('assets/images/' . ltrim($file, '/'), Helper::options()->themeUrl);
}

function getContentsTotalPage($archive): int
{
    $num = ceil($archive->getTotal() / Helper::options()->pageSize);
    if ($num < 1) $num = 1;
    return $num;
}

/*
function themeFields($layout)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点LOGO地址'),
        _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO')
    );
    $layout->addItem($logoUrl);
}
*/
