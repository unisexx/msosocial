<?php foreach ($variable as $key => $value):?>
<span style="display: inline-block; margin: 2px 0; width: 49%;" >
		<input type="checkbox" class="project_target checkbox" name="project_target_<?php echo $value["id"]?>" data-target="<?php echo $value["id"]?>" value="1" style="display: inline;margin-right: 5px;" /><?php echo $value["title"]?>
		<input type="number" class="isnumeric form-control" name="project_target_number_<?php echo $value["id"]?>" data-target-number="<?php echo $value["id"]?>" value="" maxlength="3" style="display: inline;margin-left: 5px;width:30px;" disabled > คน
</span>
<?php endforeach?>

<?php if(@$other==1):?>
<hr />
<div style="width: 400px;display: inline-block;" >
	<input type="checkbox" class="project_target checkbox" name="project_target_other" value="1" style="display: inline;" /> อื่นๆ
	<input type="text" class="project_target_other form-control" name="project_target_other_title[]" value="" placeholder="ชื่อกลุ่มเป้าหมาย" style="display: inline; width: 150px;" disabled />
	<input type="number" class="project_target_other form-control" name="project_target_other_number[]" value="" style="display: inline; width: 60px;" disabled /> คน
</div>
<span id="last-project-target" ></span>
<button type="button" class="add-target" onclick="getOtherTarget();" ><img src="images/btn_addsubproject.png" /></button>
<?php endif?>