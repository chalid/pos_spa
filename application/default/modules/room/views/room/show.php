<?php $title = l((empty($id) ? 'Add %s' : 'Edit %s'), array(l(humanize(get_class($CI))))) ?>
<div class="clearfix"></div>

<form action="<?php echo current_url() ?>" method="post" class="ajaxform">
    <fieldset>
        <legend><?php echo $title ?></legend>
        <div>
            <label class="mandatory"><?php echo l('Name') ?></label>
            <input type="text" value="<?php echo set_value('name') ?>" name="name" placeholder="<?php echo l('Role name') ?>" />
        </div>
        <div>
            <label class="mandatory"><?php echo l('Floor') ?></label>
            <input type="text" value="<?php echo set_value('floor') ?>" name="floor" placeholder="<?php echo l('Floor') ?>" />
        </div>
        <div>
            <label class="mandatory"><?php echo l('Is main') ?></label>
            <?php echo xform_boolean('is_main') ?>
        </div>
    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
    </div>
</form>