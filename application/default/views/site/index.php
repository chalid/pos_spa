<style type="text/css">

	#box {
		display: inline-block;
		width: 100px;
		height: 100px;
		float: left;
		margin: 10px 10px;
		position: relative;
		border-radius: 10px;
	}

	#box:after {
	  content: "\f236"; 
	  font-family: FontAwesome;
	  font-style: normal;
	  font-weight: normal;
	  text-decoration: inherit;
	  position: absolute;
	  font-size: 50px;
	  border: 1px solid smoke;
	  color: smoke;
	  top: 40%;
	  left: 20%;
	  z-index: 1;
	}
</style>
<script type="text/javascript">
    $(function() {
        $("#scan_cus").autocomplete('<?php echo site_url('rpc/customer_options') ?>', {
            dataType: 'json',
            minChars: 0,
            max: 100,
            delay: 10,
            selectFirst: true
        });

        $("#scan_cus").result(function(evt, row, value) {
            if (typeof(row) == 'undefined')
                return;
            $('#name').html(row['name']);
            $('#id').val(row['id']);
        });

        $("#scan_booking").autocomplete('<?php echo site_url('rpc/booking_options') ?>', {
            dataType: 'json',
            minChars: 0,
            max: 100,
            delay: 10,
            selectFirst: true
        });

        $("#scan_booking").result(function(evt, row, value) {
            if (typeof(row) == 'undefined')
                return;
            $('#booking_no').html(row['booking_no']);
            $('#customer').html(row['customer']);
            $('#employee').html(row['employee']);
            $('#id1').val(row['id']);
        });

        $('#member').hide();
	    $('#nonmember').hide();

	    $('select[name=customer_type]').change(function() {
	        if ($(this).val() == 1) {
	            $('#member').show();
	            $('#nonmember').hide();
	        } else if ($(this).val() == 2) {
	            $('#member').hide();
	            $('#nonmember').show();
	        } else {
	            $('#member').hide();
	            $('#nonmember').hide();          	
	        }
	    }).trigger('change');
    });
</script>
<div class="page-header position-relative">
	<h1>
		<?php echo l('Status Kamar ') ?>
		<small>
			<i class="icon-double-angle-right"></i>
			<?php echo l('Tanggal ') ?><?php echo $date ?>
		</small>
	</h1>
</div>
<div class="action-buttons btn-group">
	<?php echo xform_anchor(site_url('#add_bongkar'), '<i class="icons-anchor " style="color:white">' . l(' Add Reservation') . "</i>", 'role="button" class="btn btn-primary" data-toggle="modal"') ?>
	<?php echo xform_anchor(site_url('#add_pay'), '<i class="icons-calculator " style="color:white">' . l(' Add Payment') . "</i>", 'role="button" class="btn btn-primary" data-toggle="modal"') ?>
</div>
<div class="clearfix"></div>
<div class="row-fluid">
	<div class="span8">
		<?php foreach ($rooms as $room):?>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-header">
							<h5>Lantai <?php echo $room['floor'] ?></h5>

							<div class="widget-toolbar">
								<a href="#" data-action="settings">
									<i class="icon-cog"></i>
								</a>
								<a href="#" data-action="reload">
									<i class="icon-refresh"></i>
								</a>
								<a href="#" data-action="collapse">
									<i class="icon-chevron-up"></i>
								</a>
							</div>
						</div>
						<div class="widget-body">
							<div class="widget-main">
								<div class="row-fluid">
									<?php foreach ($room['room'] as $item): ?>
										<div id="box" style="background-color:<?php if($item['room_status'] == 0): ?>green <?php elseif($item['room_status'] == 1): ?>orange<?php else: ?>red<?php endif; ?>">
											<p style="text-align:center;color:white"><?php echo format_param_short($item['room_status'],'room_status') ?></p>
											<br><br>
											<p style="text-align:center;color:white;"><?php echo $item['name'] ?></p>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		<?php endforeach; ?>
	</div>
	<div class="span4">
		<div class="widget-box">
			<div class="widget-header">
				<h5>Teraphis Status</h5>

				<div class="widget-toolbar">
					<a href="#" data-action="settings">
						<i class="icon-cog"></i>
					</a>
					<a href="#" data-action="reload">
						<i class="icon-refresh"></i>
					</a>
					<a href="#" data-action="collapse">
						<i class="icon-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<table class="table table-striped table-bordered table-hover">
							<tr>
								<th><?php echo l('Name') ?></th>
								<th><?php echo l('Status') ?></th>
							</tr>
							<?php foreach ($therapis as $item): ?>
								<tr width="100%">
									<td width="80%"><?php echo $item['name'] ?></td>
									<td width="20%">
										<div class="visible-phone visible-desktop btn-group" style="text-align:center">
											<?php if($item['ts_status'] == 1): ?>
												<button class="btn btn-mini btn-success" disabled>
													<i class="icon-flag bigger-120"></i>
												</button>
											<?php else: ?>
												<button class="btn btn-mini btn-danger" disabled>
													<i class="icon-flag bigger-120"></i>
												</button>
											<?php endif; ?>
										</div>										
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="add_bongkar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><?php echo l('Add Order') ?></h3>
    </div>
    <form action="<?php echo site_url('room/order/') ?>" method="post" enctype="multipart/form-data" class="form-vertical">
        <div class="modal-body">
            <div class="row-fluid">
                <div class="span6">
                    <div>
                    	<label><?php echo l('Customer Type') ?></label>
                    	<?php echo xform_lookup('customer_type') ?>
                    </div>
                    <div id="member">
                    	<label><?php echo l('Name') ?></label>
                    	<input type="text" class="span12" value="<?php echo format_model_param(@$_POST['customer_id'], 'customer') ?>" id="scan_cus"/>
                		<input type="hidden" value="<?php echo @$_POST['customer_id'] ?>" name="customer_id" id="id"/>
                    </div>
                    <div id="nonmember">
                    	<div>
                    		<label><?php echo l('Name') ?></label>
                    		<input type="text" value="<?php echo set_value('name') ?>" name="name" placeholder="<?php echo l('Name') ?>" />
                    	</div>
                    	<div>
                    		<label><?php echo l('Phone') ?></label>
                    		<input type="text" value="<?php echo set_value('phone') ?>" name="phone" placeholder="<?php echo l('Phone') ?>" />
                    	</div>
                    	<div>
                    		<label><?php echo l('Email') ?></label>
                    		<input type="text" value="<?php echo set_value('email') ?>" name="email" placeholder="<?php echo l('Email') ?>" />
                    	</div>
                    	<div>
                    		<label><?php echo l('Gender') ?></label>
                    		<?php echo xform_lookup('gender') ?>
                    	</div>
                    </div>
                </div>
                <div class="span6">
                    <div>
                    	<label><?php echo l('Room') ?></label>
                    	<?php echo form_dropdown('room_id',$aroom_items) ?>
                    </div>
                    <div>
                    	<label><?php echo l('Therapis') ?></label>
                    	<?php echo form_dropdown('employee_id',$aemp_items) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <input type="submit" value="Submit" class="btn btn-success"/>
        </div>
    </form>
</div>
<div id="add_pay" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><?php echo l('Add Order') ?></h3>
    </div>
    <form action="<?php echo site_url('sales/order/') ?>" method="post" enctype="multipart/form-data" class="form-vertical">
        <div class="modal-body">
            <div class="row-fluid">
                <div class="span6">
                	<div>
                		<label><?php echo l('Booking No') ?></label>
                    	<input type="text" class="span12" value="<?php echo set_value('booking_no') ?>" id="scan_booking"/>
                		<input type="hidden" value="<?php echo @$_POST['booking_room_id'] ?>" name="booking_room_id" id="id1"/>
                	</div>
                	<div>
                		<label><?php echo l('Booking No') ?></label>
                		<span id="booking_no"></span>
                	</div>
                	<div>
                		<label><?php echo l('Customer Name') ?></label>
                		<span id="customer"></span>
                	</div>
                	<div>
                		<label><?php echo l('Employee Name') ?></label>
                		<span id="employee"></span>
                	</div>
                </div>
                <div class="6">
                	
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <input type="submit" value="Submit" class="btn btn-success"/>
        </div>
    </form>
</div>