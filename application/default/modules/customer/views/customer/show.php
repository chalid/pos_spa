<form action="<?php echo current_url() ?>" method="post" class="ajaxform form-horizontal">
    <fieldset>
        <div>
            <label><?php echo l('Nama Lengkap') ?></label>
            <input type="text" value="<?php echo set_value('name') ?>" required name="name" placeholder="<?php echo l('Nama Pegawai') ?>"/>
        </div>
        <div>
            <label><?php echo l('No Telp') ?></label>
        	<input type="text" value="<?php echo set_value('phone') ?>" name="phone" placeholder="<?php echo l('phone') ?>" />
        </div>
        <div>
            <label><?php echo l('Email') ?></label>
        	<input type="text" value="<?php echo set_value('email') ?>" name="email" placeholder="<?php echo l('Email') ?>" />
        </div>
        <div>
            <label><?php echo l('Facebook') ?></label>
        	<input type="text" value="<?php echo set_value('facebook') ?>" name="facebook" placeholder="<?php echo l('Facebook') ?>" />
        </div>
        <div>
            <label><?php echo l('Twitter') ?></label>
        	<input type="text" value="<?php echo set_value('twitter') ?>" name="twitter" placeholder="<?php echo l('Twitter') ?>" />
        </div>
        <div>
            <label><?php echo l('Jenis Kelamin') ?></label>
            <?php echo xform_lookup('gender') ?>
        </div>
        <div>
            <label><?php echo l('Customer Type') ?></label>
            <?php echo xform_lookup('customer_type') ?>
        </div>
    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn btn-danger"><?php echo l('Cancel') ?></a>
    </div>
</form>