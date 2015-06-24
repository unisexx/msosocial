<link href="media/css/org/claimfundForm.css" rel="stylesheet" type="text/css" />

<div style="text-align:right;">
    <button class="btn" id="btn2list" onclick="memberList();">กลับไปหน้ารายการ</button>
</div>

<h4 style="margin-top:0; color:#393;" class="form-inline ">
  แบบฟอร์มการขอรับเงินสนับสนุนโครงการ 
  <?php echo form_dropdown(false, array(1 => 'กองทุนเด็กฯ', 2 => 'กองทุนส่งเสริมฯ', 3 => 'กองทุนป้องกันค้ามนุษย์ฯ'), $_GET['type'], 'class="form-control" onchange = "memberForm($(this).val());"'); ?>
</h4>


<form action="#" enctype="multipart/form-data" >
<div class="dvSupport">
    <table class="tblForm">
        <tr>
            <th style="width: 250px;" >ปีงบประมาณ / จังหวัด</th>
            <td class="form-inline">
              <?php echo (date('Y')+543).' / '.$agency['province_name']?>
            </td>
        </tr>
        <tr>
            <th>ชื่อองค์กรที่เสนอขอรับเงินกองทุน</th>
            <td>
              <?php
                //  echo $agency['agency_type_title'].' ('.$agency['agency_sub_type_title'].')';
                echo $agency['organ_name'].' ('.$agency['agency_type_title'].')';
              ?>
            </td>
        </tr>
        <tr>
          <th>ระบบ / รูปแบบ<br />การขอรับเงินสนับสนุน</th>
          <td>
            <?php echo $value['project_system_name']?>
        </td>
        <tr id="is_project_system_2" <?php if(@$value['project_system']!=2) echo "style=\"display: none;\"";?> >
            <th>รูปแบบการขอรับการสนับสนุน</th>
            <td>
                <?php echo $value['is_project_system_2_name']?>
            </td>
        </tr>
        <tr>
            <th>ชื่อโครงการ (ภาษาไทย)<span class="Txt_red_12"> *</span></th>
            <td>
                <?php echo $value['project_name'];?>
            </td>
        </tr>
        <tr>
            <th>ประเภทโครงการที่ขอรับเงินกองทุนฯ <span class="Txt_red_12">*</span></th>
            <td>
              <?php echo $value['project_type_title']?>
            </td>
        </tr>
        <tr>
            <th>สาขาของโครงการที่ขอรับสนับสนุน <span class="Txt_red_12">*</span></th>
            <td>
                <?php
                  foreach ($csectors as $key => $csector) {
                    if(@$others==1) {
                      echo '<div>ด้านอื่นๆ : '.$csector['other_title'].'</div>';
                    } else {
                      echo '<div>'.$csector['fund_welfare_sector_title'].'</div>';
                    }
                  }
                ?>
        </tr>
        <tr>
            <th>กลุ่มเป้าหมาย <span class="Txt_red_12">*</span></th>
            <td>
              <?php foreach ($ctargets as $key => $target) {
                  echo '<div><span style="display: inline-block; width: 400px;" >'.$target['fund_welfare_target_title'].':</span> '.$target['target_number'].' คน</div>'; 
                }
              ?>
            </td>
        </tr>
        <tr>
            <th>งบประมาณโครงการและแหล่งสนับสนุน(เฉพาะปีปัจจุบัน) <span class="Txt_red_12">*</span></th>
            <td>

              <div>
                  <div style="display: inline-block; width: 310px;">
                      งบประมาณทั้งโครงการ (เฉพาะปีปัจจุบัน)
                  </div>
                  <?php echo number_format($value['budget_total'],0);?> บาท
              </div>

              <div>
                  <div style="display: inline-block; width: 310px;">
                      งบประมาณที่ขอรับการสนับสนุน
                  </div>
                  <?php echo number_format($value['budget_request'],0);?> บาท
                  <span class="note">* จะคำนวณเป็นขนาดโครงการ</span>
              </div>

              <div style="padding-left: 50px;">
                  งบประมาณที่ได้รับสมทบจากแหล่งอื่น

                  <div style="padding-left: 20px;">
                      <div style="display: inline-block; width: 240px;">
                          <input type="checkbox" id="budget_other_1" class="budget_other" name="has_budget_other_1" data-target="1" value="1" <?php if(@$value['has_budget_other_1']==1) echo 'checked'?> /> หน่วยงานรัฐ
                      </div>
                      <?php echo number_format($value['budget_other_1'],0);?> บาท
                  </div>

                  <?php if($value['has_budget_other_2']==1):?>
                  <div style="padding-left: 20px;">
                      <div style="display: inline-block; width: 240px;">
                          <?php echo number_format($value['budget_other_2'],0);?> บาท
                      </div>
                  </div>
                  <?php endif?>

                  <?php if($value['has_budget_other_3_1']==1 || $value['has_budget_other_3_2']==1 || $value['has_budget_other_3_3']==1 || $value['has_budget_other_3_4']==1):?>
                  <div style="padding-left: 20px;">
                      <input type="checkbox" id="has_budget_other_3" name="has_budget_other_3" value="1" <?php if(@$value['has_budget_other_3']==1) echo 'checked'?> /> ท้องถิ่น

                      <div id="div_has_budget_other_3" style="padding-left: 40px;<?php if(@$value['has_budget_other_3']!=1) echo 'display: none;'?>" >
                          <div>
                              <div style="display: inline-block; width: 200px;">
                                  <input type="checkbox" id="has_budget_other_3_1" class="has_budget_other_3" name="has_budget_other_3_1" data-target="1" value="1" <?php if(@$value['has_budget_other_3_1']==1) echo 'checked'?> > องค์การบริหารส่วนจังหวัด
                              </div>
                              <?php echo number_format($value['budget_other_3_1'],0);?> บาท
                          </div>

                          <div>
                              <div style="display: inline-block; width: 200px;">
                                  <input type="checkbox" id="has_budget_other_3_2" class="has_budget_other_3" name="has_budget_other_3_2" data-target="2" value="1" <?php if(@$value['has_budget_other_3_2']==1) echo 'checked'?> > องค์การบริหารส่วนตำบล
                              </div>
                              <?php echo number_format($value['budget_other_3_2'],0);?> บาท
                          </div>

                          <div>
                              <div style="display: inline-block; width: 200px;">
                                  <input type="checkbox" id="has_budget_other_3_3" class="has_budget_other_3" name="has_budget_other_3_3" data-target="3" value="1" <?php if(@$value['has_budget_other_3_3']==1) echo 'checked'?> > องค์กรปกครองส่วนท้องถิ่น
                              </div>
                              <?php echo number_format($value['budget_other_3_3'],0);?> บาท
                          </div>

                          <div>
                              <div style="display: inline-block; width: 200px;">
                                  <input type="checkbox" id="has_budget_other_3_4" class="has_budget_other_3" name="has_budget_other_3_4" data-target="4" value="1" <?php if(@$value['has_budget_other_3_4']==1) echo 'checked'?> > เทศบาล
                              </div>
                              <?php echo number_format($value['budget_other_3_4'],0);?> บาท
                          </div>
                      </div>
                  </div>
              </div>
              <?php endif?>

              <div>
                  <div style="display: inline-block; width: 310px;">
                      งบประมาณที่องค์กรสมทบเอง
                  </div>
                  <?php echo number_format($value['organization_budget'],0);?> บาท
              </div>

          </td>
        </tr>
        <tr style="display: none;" >
            <th>แนบไฟล์โครงการ</th>
            <td>
                <input type="file" name="file_path" />
            </td>
        </tr>
    </table>

    <div style="text-align:right;">
        <button type="submit" class="btn btn-primary">บันทึกส่งแบบฟอร์ม</button>
    </div>
</div>

</form>

<style type="text/css">
  input[type=number] {
    padding: 6px 2px;
    text-align: center;
  }
  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0;
  }
  #project_target span {
    margin: 2px 0;
  }
</style>