<script type="text/javascript">
    $(function() {
        $("#scan_item").autocomplete('<?php echo site_url('rpc/item_options') ?>', {
            dataType: 'json',
            minChars: 0,
            max: 100,
            delay: 10,
            selectFirst: true
        });

        $("#scan_item").result(function(evt, row, value) {
            if (typeof(row) == 'undefined')
                return;
            $('#name').html(row['name']);
            $('#price').html(row['unit_price']);
            $('#id').val(row['id']);
            $('#unit_price').val(row['unit_price']);
            $('#cost_price').val(row['cost_price']);
            $('#commission').val(row['commission']);
            $('#discount').val(row['discount']);
            $('#discount_member').val(row['discount_member']);

        });
    });
</script>
<form action="<?php echo current_url() ?>" method="post" class="ajaxform">
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="icon-bookmark"></i></span>
                <h5><?php echo l('Edit Sales Item') ?></h5>
            </div>
            <?php echo xlog($_POSTab) ?>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                	<div class="control-group">
						<label class="control-label" for="form-field-1"><?php echo l('Search Item') ?></label>
						<div class="controls">
							<input type="text" class="span12" value="<?php echo format_model_param(@$_POST['item_id'], 'item') ?>" id="scan_item"/>
                			<input type="hidden" value="<?php echo @$_POST['item_id'] ?>" name="item_id" id="id"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="form-field-1"><?php echo l('Item') ?></label>
						<div class="controls">
                			<span id="name"></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="form-field-1"><?php echo l('Unit Price') ?></label>
						<div class="controls">
                			<span id="price"></span>
                			<input type="hidden" value="<?php echo @$_POST['unit_price'] ?>" name="unit_price" id="unit_price"/>
                			<input type="hidden" value="<?php echo @$_POST['cost_price'] ?>" name="cost_price" id="cost_price"/>
                			<input type="hidden" value="<?php echo @$_POST['commission'] ?>" name="commission" id="commission"/>
                			<input type="hidden" value="<?php echo @$_POST['discount'] ?>" name="discount" id="discount"/>
                			<input type="hidden" value="<?php echo @$_POST['discount_member'] ?>" name="discount_member" id="discount_member"/>
						</div>
					</div>
	                <div class="control-group">
	                	<label class="control-label" for="form-field-1"><?php echo l('Qty') ?></label>
	                	<div class="controls">
	                		<input type="text" class="span12" name="qty" value="<?php echo set_value('qty') ?>" />
	                	</div>
	                </div>
                </div>
                </div>
                <div class="form-actions">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" value="Save" class="btn btn-success"/>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    $('button.close-edit_in').on('click', function() {
        location.href = location.href;
    });
</script>