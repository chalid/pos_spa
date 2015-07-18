<div style="display: block;">
	<div id="user-profile-1" class="user-profile row-fluid">
		<div class="span4 center">
			<div>
				<span class="profile-picture">
					<img id="avatar" class="editable editable-click editable-empty" alt="Alex's Avatar" src="assets/avatars/profile-pic.jpg"></img>
				</span>

				<div class="space-4"></div>
				<div class="width-80 label label-info label-large arrowed-in arrowed-in-right">
					<div class="inline position-relative">
						<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
							<span class="white middle bigger-120"><?php echo $item['isbn'] ?>&nbsp;-&nbsp;<?php echo $item['name'] ?></span>
						</a>
					</div>
				</div>
			</div>
			<div class="hr hr12 dotted"></div>
		</div>
		<div class="span8">
			<div class="profile-user-info profile-user-info-striped">
				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('NO ISBN') ?></div>
					<div class="profile-info-value">
						<span><?php echo $item['isbn'] ?></span>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Name') ?></div>
					<div class="profile-info-value">
						<span><?php echo $item['name'] ?></span>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Deskription') ?></div>

					<div class="profile-info-value">
						<span><?php echo $item['description'] ?></span>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Tipe') ?></div>

					<div class="profile-info-value">
						<span><?php echo format_param_short($item['item_type'],'item_type') ?></span>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Kategori') ?></div>
					<div class="profile-info-value">
						<span><?php echo format_model_param($item['item_category_id'],'item_category') ?></span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Harga Dasar') ?></div>
					<div class="profile-info-value">
						<i class="icon-money light-orange bigger-110"></i>
						<span>Rp. <?php echo format_number($item['cost_price']) ?></span>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Harga Jual') ?></div>
					<div class="profile-info-value">
						<i class="icon-money light-orange bigger-110"></i>
						<span>Rp. <?php echo format_number($item['unit_price']) ?></span>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Komisi') ?></div>
					<div class="profile-info-value">
						<i class="icon-money light-orange bigger-110"></i>
						<span><?php echo format_number($item['commission']) ?> %</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>