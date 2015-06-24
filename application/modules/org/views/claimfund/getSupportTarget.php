<?php if(@$fund==true):
	$value_other = 0;
	if(@$ctargets) {
		foreach ($ctargets as $key => $ctarget) {
			$xtarget[$ctarget["fund_welfare_target_id"]]["fund_welfare_target_id"] = $ctarget["fund_welfare_target_id"];
			$xtarget[$ctarget["fund_welfare_target_id"]]["fund_welfare_target_title"] = $ctarget["fund_welfare_target_title"];
			$xtarget[$ctarget["fund_welfare_target_id"]]["target_number"] = $ctarget["target_number"];
			
			if($ctarget["target_other"]==1) {
				$value_other = 1;
			}
		}
	}
	
	foreach ($variable as $key => $target):?>
		<span style="display:inline-block; width:49%;">
			<input type="checkbox" class="project_target checkbox" name="project_target_<?php echo $target["id"]?>" data-target="<?php echo $target["id"]?>" value="1" style="display: inline;" <?php if(@$xtarget[$target["id"]]) echo "checked"?> > <?php echo $target["title"]?> 
			<input type="text" class="isnumeric form-control" name="project_target_number_<?php echo $target["id"]?>" data-target-number="<?php echo $target["id"]?>" value="<?php echo @$xtarget[$target["id"]]["target_number"]?>" maxlength="3" style="display: inline;margin-left: 5px; width:30px; padding: 0; text-align: center;" <?php if(@!$xtarget[$target["id"]]) echo "disabled"?> > คน
		</span> 
	<?php endforeach;?>

	<?php if($other==1):?>
		<hr />
		<?php if($value_other==1):?>
			<input type="checkbox" class="project_target" name="project_target_other" value="1" checked /> อื่นๆ
			<?php $i=0;foreach ($ctargets as $key => $ctarget):?>
				<?php if($ctarget["target_other"]==1):$i++?>

					<?php if($i!=1):?>
						<div class="clear" ></div>
						<div style="width: 358px;display: inline-block;padding-left: 44px;" >
					<?php else:?>
						<div style="width: 400px;display: inline-block;" >
					<?php endif?>

						<input type="text" class="project_target_other form-control" name="project_target_other_title[]" value="<?php echo $ctarget["fund_welfare_target_title"]?>" placeholder="ชื่อกลุ่มเป้าหมาย" style="display: inline; width: 250px;" />
						<input type="number" class="project_target_other form-control" name="project_target_other_number[]" value="<?php echo $ctarget["target_number"]?>" maxlength="3" style="display: inline;margin-left: 5px;width:30px;" /> คน
					</div>
				<?php endif?>
			<?php endforeach?>
		<?php else:?>
		<input type="checkbox" class="project_target" name="project_target_other" value="1" value="" /> อื่นๆ
		<div style="width: 400px;display: inline-block;" >
			<input type="text" class="project_target_other form-control" name="project_target_other_title[]" value="" placeholder="ชื่อกลุ่มเป้าหมาย" style="display: inline; width: 250px;" disabled />
			<input type="number" class="project_target_other form-control" name="project_target_other_number[]" value="" style="display: inline; width: 60px;" disabled /> คน
		</div>
		<?php endif?>
		<span id="last-project-target" ></span>
		<button type="button" class="add-target" onclick="getOtherTarget();" ><img src="images/btn_addsubproject.png" /></button>
	<?php endif?>

<?php else:?>
	<?php foreach ($variable as $key => $value):?>
		<span style="display: inline-block; margin: 2px 0; width: 49%;" >
			<input type="checkbox" class="project_target checkbox" name="project_target_<?php echo $value["id"]?>" data-target="<?php echo $value["id"]?>" value="1" style="display: inline;margin-right: 5px;" /><?php echo $value["title"]?>
			<input type="number" class="isnumeric form-control" name="project_target_number_<?php echo $value["id"]?>" data-target-number="<?php echo $value["id"]?>" value="" maxlength="3" style="display: inline;margin-left: 5px;width:30px; padding: 0; text-align: center;" disabled > คน
		</span>
	<?php endforeach?>

	<?php if(@$other==1):?>
		<hr />
		<div style="width: 400px;display: inline-block;" >
			<input type="checkbox" class="project_target checkbox" name="project_target_other" value="1" style="display: inline;" /> อื่นๆ
			<input type="text" class="project_target_other form-control" name="project_target_other_title[]" value="" placeholder="ชื่อกลุ่มเป้าหมาย" style="display: inline; width: 250px;" disabled />
			<input type="number" class="project_target_other form-control" name="project_target_other_number[]" value="" maxlength="3" style="display: inline; width: 60px;" disabled /> คน
		</div>
		<span id="last-project-target" ></span>
		<button type="button" class="add-target" onclick="getOtherTarget();" ><img src="images/btn_addsubproject.png" /></button>
	<?php endif?>
<?php endif?>