<ul class="<?php echo ($top) ? 'nav nav-list' : 'submenu' ?>">
    <?php foreach ($menus as $menu): ?>
    <li>
        <?php $href = (!empty($menu['uri'])) ? ($menu['uri'] === '/') ? base_url() : site_url($menu['uri']) : site_url(@$menu['children'][0]['uri']) ?>
        <?php $data_class = preg_replace('/[ _\/]+/', '-', strtolower($menu['title'])) ?>
            <a href="<?php echo $href ?>" <?php echo (empty($menu['children'])) ? '' : ' class="dropdown-toggle" ' ?>>
            <i class="<?php echo (!empty($menu['icon'])) ? $menu['icon'] : 'icon-double-angle-right' ?>"></i>
            <span><?php echo l($menu['title']) ?></span>
                <?php if (!empty($menu['children'])): ?>
                    <b class="dropdown-toggle"></b>
                <?php endif ?>
            </a>
            <?php if (!empty($menu['children'])): ?>
            <?php echo $self->_get_menu($menu['children']); ?>
        <?php endif ?>
    </li>
    <?php endforeach ?>
</ul>