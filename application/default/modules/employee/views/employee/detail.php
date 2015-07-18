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
							<span class="white middle bigger-120"><?php echo $employee['name'] ?></span>
						</a>
					</div>
				</div>
			</div>
			<div class="hr hr12 dotted"></div>
		</div>
		<div class="span8">
			<div class="profile-user-info profile-user-info-striped">
				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Name') ?></div>
					<div class="profile-info-value">
						<span class="editable editable-click" id="username"><?php echo $employee['name'] ?></span>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Phone') ?></div>

					<div class="profile-info-value">
						<i class="icon-phone light-orange bigger-110"></i>
						<span><?php echo $employee['phone'] ?></span>
						<!-- <span class="editable editable-click" id="city">Amsterdam</span> -->
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Gender') ?></div>

					<div class="profile-info-value">
						<i class="icon-venus-mars light-orange bigger-110"></i>
						<span><?php echo format_param_short($employee['gender'],'gender') ?></span>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Position') ?></div>
					<div class="profile-info-value">
						<i class="icon-flag light-orange bigger-110"></i>
						<span><?php echo format_model_param($employee['employee_position_id'],'employee_position') ?></span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Salary') ?></div>
					<div class="profile-info-value">
						<i class="icon-money light-orange bigger-110"></i>
						<span>Rp. <?php echo format_number($employee['salary']) ?></span>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"><?php echo l('Allowance') ?></div>
					<div class="profile-info-value">
						<i class="icon-money light-orange bigger-110"></i>
						<span>Rp. <?php echo format_number($employee['allowance']) ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>