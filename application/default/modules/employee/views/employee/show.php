<form action="<?php echo current_url() ?>" method="post" class="ajaxform form-horizontal">
    <fieldset>
        <div>
            <label><?php echo l('Nama Lengkap') ?></label>
            <input type="text" value="<?php echo set_value('name') ?>" name="name" placeholder="<?php echo l('Nama Pegawai') ?>"/>
        </div>
        <div>
            <label><?php echo l('Jenis Kelamin') ?></label>
            <?php echo xform_lookup('gender') ?>
        </div>
        <div>
            <label><?php echo l('No Telp') ?></label>
        	<input type="text" value="<?php echo set_value('phone') ?>" name="phone" placeholder="<?php echo l('phone') ?>" />
        </div>
        <div>
            <label><?php echo l('Jabatan') ?></label>
            <?php echo xform_model_lookup('employee_position_id')?>
        </div>
        <div>
            <label><?php echo l('Gaji') ?></label>
            <div class="input-prepend">
            	<span class="add-on">
            		<i>Rp</i>
            	</span>
            	<input type="number" value="<?php echo set_value('salary') ?>" required name="salary" placeholder="<?php echo l('Gaji') ?>" />
        	</div>
        </div>
        <div>
            <label><?php echo l('Tunjangan') ?></label>
            <div class="input-prepend">
            	<span class="add-on">
            		<i>Rp</i>
            	</span>
            	<input type="number" value="<?php echo set_value('allowance') ?>" name="allowance" placeholder="<?php echo l('Tunjangan') ?>" />
        	</div>
        </div>
    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn btn-danger"><?php echo l('Cancel') ?></a>
    </div>
</form>