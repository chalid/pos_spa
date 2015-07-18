<?php

/**
 * xmenu_breadcrumb.php
 *
 * @package     arch-php
 * @author      xinixman <xinixman@xinix.co.id>
 * @copyright   Copyright(c) 2012 PT Sagara Xinix Solusitama.  All Rights Reserved.
 *
 * Created on 2011/11/21 00:00:00
 *
 * This software is the proprietary information of PT Sagara Xinix Solusitama.
 *
 * History
 * =======
 * (dd/mm/yyyy hh:mm:ss) (author)
 * 2011/11/21 00:00:00   xinixman <xinixman@xinix.co.id>
 *
 *
 */

function _get_bc_uri($bc) {
    if (empty($bc['uri'])) {
        if (!empty($bc['children'])) {
            foreach ($bc['children'] as $child) {
                return _get_bc_uri($child);
            }
        } else {
            return '#';
        }
    }
    return $bc['uri'];
}
$count = count($breadcrumb);
$i = 0;
?>
<div id="breadcrumbs">
    <ul class="breadcrumb">
        <i class="icon-home"></i>
        <li>
            <a href="<?php echo ($self->home_url) ? site_url($self->home_url) : base_url() ?>"><?php echo l('Beranda') ?></a>
            <span class="divider">
                <i class="icon-angle-right"></i>
            </span>
        </li>
        <?php foreach ($breadcrumb as $bc): ?>
            <?php $bc_uri = _get_bc_uri($bc) ?>
            <li>
                <?php $i++ ?>
                <?php echo l($bc['title']) ?>
                <?php if($i != $count): ?>
                <span class="divider">
                    <i class="icon-angle-right"></i>
                </span>
                <?php endif ?>
            </li>
        <?php endforeach ?>
    </ul>
    <!-- <div id="nav-search">
        <form class="form-search">
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="input-small search-query" id="nav-search-input" autocomplete="off" />
                <i class="icon-search" id="nav-search-icon"></i>
            </span>
        </form>
    </div> -->
</div>
