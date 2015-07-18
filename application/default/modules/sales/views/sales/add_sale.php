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
<form action="" method="post" class="ajaxform" enctype="multipart/form-data">
	<div class="page-content">
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->

				<div class="space-6"></div>

				<div class="row-fluid">
					<div class="span10 offset1">
						<div class="widget-box transparent invoice-box">
							<div class="widget-header widget-header-large">
								<h3 class="grey lighter pull-left position-relative">
									<i class="icon-leaf green"></i>
									<?php echo l('Add Sales') ?>
								</h3>

								<div class="widget-toolbar no-border invoice-info">
									<span class="invoice-info-label">Invoice:</span>
									<span class="red"><?php echo $_POST['invoice'] ?></span>

									<br />
									<span class="invoice-info-label">Date:</span>
									<span class="blue"><?php echo date('d-m-Y') ?></span>
								</div>

								<div class="widget-toolbar hidden-480">
									<a href="#">
										<i class="icon-print"></i>
									</a>
								</div>
							</div>

							<div class="widget-body">
								<div class="widget-main padding-24">
									<div class="row-fluid">
										<div class="row-fluid">
											<div class="span6">
												<div class="row-fluid">
													<div class="span12 label label-large label-info arrowed-in arrowed-right">
														<b>Therapis Info</b>
													</div>
												</div>

												<div class="row-fluid">
													<ul class="unstyled spaced">
														<li>
															<i class="icon-caret-right blue"></i>
															<?php echo l('Name') ?>&nbsp;:&nbsp;
															<b class="red">
																<?php echo format_model_param($_POST['employee_id'],'employee') ?>
															</b>

														</li>
														<li>
															<i class="icon-caret-right blue"></i>
															<?php echo l('Room') ?>&nbsp;:&nbsp;
															<b class="red">
																<?php echo format_model_param(format_model_param($_POST['booking_room_id'],'booking_room','','',array('room_id')),'room') ?>
															</b>
														</li>
														<li>
															<i class="icon-caret-right blue"></i>
															<?php echo l('Start Time') ?>&nbsp;:&nbsp;
															<b class="red">
																<?php echo format_short_datetime(format_model_param($_POST['booking_room_id'],'booking_room','','',array('start_date'))) ?>
															</b>
														</li>
														<li>
															<i class="icon-caret-right blue"></i>
															<?php echo l('End Time') ?>&nbsp;:&nbsp;
															<b class="red">
																<?php echo format_short_datetime(format_model_param($_POST['booking_room_id'],'booking_room','','',array('end_date'))) ?>
															</b>
														</li>
														<li>
															<i class="icon-caret-right blue"></i>
															<?php echo l('Booking No') ?>&nbsp;:&nbsp;
															<b class="red">
																<?php echo format_model_param($_POST['booking_room_id'],'booking_room','','',array('booking_no')) ?>
															</b>
														</li>
													</ul>
												</div>
											</div><!--/span-->

											<div class="span6">
												<div class="row-fluid">
													<div class="span12 label label-large label-success arrowed-in arrowed-right">
														<b>Customer Info</b>
													</div>
												</div>
												<div class="row-fluid">
													<ul class="unstyled spaced">
														<li>
															<i class="icon-caret-right green"></i>
															<?php echo l('Name') ?>&nbsp;:&nbsp;
															<b class="red">
																<?php echo format_model_param($_POST['customer_id'],'customer') ?>
															</b>
														</li>
														<li>
															<i class="icon-caret-right green"></i>
															<?php echo l('Phone') ?>&nbsp;:&nbsp;
															<b class="red">
																<?php echo format_model_param($_POST['customer_id'],'customer','','',array('phone')) ?>
															</b>
														</li>
														<li>
															<i class="icon-caret-right green"></i>
															<?php echo l('Email') ?>&nbsp;:&nbsp;
															<b class="red">
																<?php echo format_model_param($_POST['customer_id'],'customer','','',array('email')) ?>
															</b>
														</li>
													</ul>
												</div>
											</div><!--/span-->
										</div><!--row-->
										<div>
						                    <?php echo xform_anchor($CI->_get_uri('#add_bongkar'), '<i class="icons-anchor " style="color:white">' . l(' Add Items') . "</i>", 'role="button" class="btn btn-primary" data-toggle="modal"') ?>
						                </div>
										<div class="space"></div>
										<div class="row-fluid">
											<table class="table table-striped table-bordered">
												<thead>
													<tr>
														<th class="center"><?php echo l('No') ?></th>
														<th><?php echo l('Item') ?></th>
														<th><?php echo l('Price') ?></th>
														<th><?php echo l('Qty') ?></th>
														<th><?php echo l('Disc') ?></th>
														<th><?php echo l('Total') ?></th>
														<th>&nbsp;</th>
													</tr>
												</thead>
												<?php $no = 1 ?>
												<tbody>
													<?php foreach ($sales_items as $item):?>
														<tr>
															<td><?php echo $no ?></td>
															<td><?php echo format_model_param($item['item_id'],'item') ?></td>
															<td style="text-align:right"><?php echo format_number(format_model_param($item['item_id'],'item','','',array('unit_price'))) ?></td>
															<td style="text-align:right"><?php echo format_number($item['qty']) ?></td>
															<td style="text-align:right"><?php echo format_number($item['discount']) ?></td>
															<td style="text-align:right"><?php echo format_number($item['total']) ?></td>
															<td class="submenu">
						                                        <div class="submenu-container">
						                                            <span><a data-toggle="modal" data-remote="<?php echo site_url('sales/edit_item/' . $id . '/' . $item['id']) ?>" title="<?php echo l('Edit') ?>" class="open-myModal1 icon-edit" href="#edit_bongkar"></a></span>
						                                            <span><a class="grid-action" href="<?php echo site_url('sales/delete_item/' . $id . '/' . $item['id']) ?>" title="Trash"><i class="icon-trash"></i> </a></span>
						                                        </div>
						                                    </td>
						                                    <?php $no++ ?>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>

										<div class="hr hr8 hr-double hr-dotted"></div>

										<div class="row-fluid">
											<div class="span5 pull-right">
												<h4 class="pull-right">
													Total amount :
													<span class="red" style="font-size:25px">Rp.&nbsp;<?php echo format_number($total_sales) ?></span>
												</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-actions">
				    <a href="<?php echo site_url() ?>" class="btn btn-danger" data-class="back"><i class="icon-hand-left icon-white"></i> <?php echo l('Back') ?></a>
				    <input type="submit" value="Save" class="btn btn-success"/>
				</div>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div>
</form>
<div id="add_bongkar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><?php echo l('Add Items') ?></h3>
    </div>
    <form action="<?php echo site_url('sales/add_item/' . $id) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-body">
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
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <input type="submit" value="Submit" class="btn btn-success"/>
        </div>
    </form>
</div>
<div id="edit_bongkar" class="modal message hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--<form id="data_id" action="" method="post" class="ajaxform">-->
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3><?php echo l('Edit Sales Item') ?></h3>
    </div>
    <div class="modal-body">
    </div>
</div>