<style type="text/css">
    .grid { border: 1px solid #BBF; }
    .field_field { min-width:210px!important; }
    #field_grid td input.text,
    #field_grid td select { width: 100%; }
</style>

<script type="text/javascript">
    function addField() {
        var $row = $($('#template').html());
        $('#field_grid tbody').append($row);
        xn.helper.stylize($row);
        // $('#field_grid tr:last').clone().appendTo('#field_grid tbody');

        $('#field_grid').find("tr:nth-child(odd)").removeClass('even').removeClass('odd').addClass("odd");
        $('#field_grid').find("tr:nth-child(even)").removeClass('even').removeClass('odd').addClass("even");
    }

    function removeField($o) {
        if ($o.parents('tbody').find('tr').length <= 2) {
            addField();
        }
        $o.parents('tr').remove();
    }

    $('#add_field').live('click', function(evt) {
        addField();
        return evt.preventDefault(); 
    });

    $('.btn-remove').live('click', function(evt) {
        removeField($(this));
        return evt.preventDefault();
    });

    $('.btn-up').live('click', function(evt) {
        var current = $(this).parents('tr');
        current.prev().before(current);
        return evt.preventDefault();
    });

    $('.btn-down').live('click', function(evt) {
        var current = $(this).parents('tr');
        current.next().after(current);
        return evt.preventDefault();
    });

</script>
<script type="text/javascript">
    $(function() {
	    $("#item_emp").autocomplete('<?php echo site_url('rpc/item_options') ?>', {
	        dataType: 'json',
	        minChars: 0,
	        max: 100,
	        delay: 10,
	        selectFirst: true
	    });

	    $("#item_emp").result(function(evt, row, value) {
	        if (typeof(row) == 'undefined')
	            return;
	        $('#name').html(row['name']);
	        $('#id').val(row['id']);
	    });

        $('#bundling').hide();
	    $('#isbn').hide();

	    $('select[name=item_type]').change(function() {
	        if ($(this).val() == 0) {
	            $('#bundling').hide();
	        } else if ($(this).val() == 1) {
	            $('#bundling').show();
	        } else {
	            $('#bundling').hide();            	
	        }
	    }).trigger('change');
        $('select[name=no_type]').change(function() {
            if ($(this).val() == 1) {
                $('#isbn').show();
            } else {
                $('#isbn').hide();              
            }
        }).trigger('change');
	});	
</script>
<form action="<?php echo current_url() ?>" method="post" class="ajaxform form-horizontal">
    <fieldset>
        <div>
            <label><?php echo l('ISBN/Serial Number') ?></label>
            <?php if(empty($id)): ?>
                <select name="no_type" required class="span2">
                    <option value="" selected="selected">(Silahkan Pilih)</option>
                    <option value="0">Auto No</option>
                    <option value="1">Manual</option>
                </select>
                <input type="text" value="<?php echo set_value('isbn') ?>" name="isbn" placeholder="<?php echo l('ISBN/Item No') ?>" id="isbn"/>
            <?php else: ?>
                <input type="text" disabled value="<?php echo set_value('isbn') ?>" name="isbn" placeholder="<?php echo l('ISBN/Item No') ?>" />
            <?php endif; ?>
        </div>
        <div>
            <label><?php echo l('Name') ?></label>
            <input type="text" value="<?php echo set_value('name') ?>" name="name" required placeholder="<?php echo l('Item Name') ?>" />
        </div>
        <div>
            <label><?php echo l('Description') ?></label>
            <textarea name="description" cols="30" rows="2"><?php echo set_value('description') ?></textarea>
        </div>
        <div class="clearfix"></div>
        <div>
            <label><?php echo l('Category') ?></label>
            <?php echo xform_model_lookup('item_category_id') ?>
        </div>
        <div>
            <label><?php echo l('Cost Price') ?></label>
            <div class="input-prepend">
            	<span class="add-on">
            		<i>Rp</i>
            	</span>
            	<input type="number" value="<?php echo set_value('cost_price') ?>" required name="cost_price" placeholder="<?php echo l('Cost Price') ?>" />
            </div>
        </div>
        <div>
            <label><?php echo l('Unit Price') ?></label>
            <div class="input-prepend">
            	<span class="add-on">
            		<i>Rp</i>
            	</span>
            	<input type="number" value="<?php echo set_value('unit_price') ?>" required name="unit_price" placeholder="<?php echo l('Unit Price') ?>" />
        	</div>
        </div>
        <div>
            <label><?php echo l('Item Commission') ?></label>
            <div class="input-prepend">
            	<span class="add-on">
            		<i>%</i>
            	</span>
            	<input type="number" value="<?php echo set_value('commission') ?>" name="commission" placeholder="<?php echo l('Commission') ?>" />
        	</div>
        </div>
        <div>
            <label><?php echo l('Item Tax') ?></label>
            <div class="input-prepend">
                <span class="add-on">
                    <i>%</i>
                </span>
                <input type="text" value="<?php echo set_value('tax') ?>" name="tax" placeholder="<?php echo l('Tax') ?>" />
            </div>
        </div>
        <div>
            <label><?php echo l('Discount') ?></label>
            <div class="input-prepend">
                <span class="add-on">
                    <i>%</i>
                </span>
                <input type="text" value="<?php echo set_value('discount') ?>" name="discount" placeholder="<?php echo l('Discount') ?>" />
            </div>
        </div>
        <div>
            <label><?php echo l('Member Discount') ?></label>
            <div class="input-prepend">
                <span class="add-on">
                    <i>%</i>
                </span>
                <input type="text" value="<?php echo set_value('discount_member') ?>" name="discount_member" placeholder="<?php echo l('Member Discount') ?>" />
            </div>
        </div>
        <div>
            <label><?php echo l('Item Qty') ?></label>
            <div class="input-prepend">
                <span class="add-on">
                    <i>.</i>
                </span>
                <input type="number" value="<?php echo set_value('qty') ?>" name="qty" <?php if(!empty($id)): ?>disabled <?php endif; ?> placeholder="<?php echo l('Qty') ?>" />
            </div>
        </div>
        <div>
        	<label><?php echo l('Item Type') ?></label>
            <?php echo xform_lookup('item_type') ?>
        </div>
    </fieldset>
    <?php if(empty($id)): ?>
        <fieldset id="bundling">
            <legend><?php echo l('Fields') ?></legend>
            <table class="grid table table-hover table-striped table-condensed" id="field_grid">
                <tr>
                    <th><?php echo l('Name') ?></th>
                    <th><?php echo l('Qty') ?></th>
                    <th>&nbsp;</th>
                </tr>
                <?php if (!empty($_POST['item_id'])): ?>
                    <?php foreach ($_POST['item_id'] as $i => $field): ?>
                        <tr>
                            <td>
                                <?php echo form_dropdown('item_id[]', $item_options, $_POST['item_id'][$i], 'class="field_field"') ?>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $_POST['qty1'][$i] ?>" name="qty1[]" class="field_field"/>
                            </td>
                            <td>
                                <a href="#" class="btn-remove">Delete</a>
                                <a href="#" class="btn-up">Up</a>
                                <a href="#" class="btn-down">Down</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td>
                        	<?php echo form_dropdown('item_id[]', $item_options, '', 'class="field_field"') ?>
                        </td>
                        <td>
                            <input type="text" value="" name="qty1[]" class="field_field"/>
                        </td>
                        <td>
                            <a href="#" class="btn-remove">Delete</a>
                            <a href="#" class="btn-up">Up</a>
                            <a href="#" class="btn-down">Down</a>
                        </td>
                    </tr>
                <?php endif ?>
            </table>
            <a href="#" class="btn" id="add_field">Add Field</a>
        </fieldset>
    <?php endif; ?>
    <br>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn btn-danger"><?php echo l('Cancel') ?></a>
    </div>
</form>
<script type="text/template" id="template">
    <tr>
        <td>
        	<?php echo form_dropdown('item_id[]', $item_options, '', 'class="field_field"') ?>
        </td>
        <td>
            <input type="text" value="" name="qty1[]" class="field_field"/>
        </td>
        <td>
            <a href="#" class="btn-remove">Delete</a>
            <a href="#" class="btn-up">Up</a>
            <a href="#" class="btn-down">Down</a>
        </td>
    </tr>
</script>