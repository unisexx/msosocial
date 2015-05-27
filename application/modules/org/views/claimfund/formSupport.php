<link href="media/css/org/claimfundForm.css" rel="stylesheet" type="text/css" />

<div style="text-align:right;">
    <button class="btn" id="btn2list" onclick="memberList();">กลับไปหน้ารายการ</button>
</div>

<h4 style="margin-top:0; color:#393;" class="form-inline ">
  แบบฟอร์มการขอรับเงินสนับสนุนโครงการ 
  <?php echo form_dropdown(false, array(1 => 'กองทุนเด็กฯ', 2 => 'กองทุนส่งเสริมฯ', 3 => 'กองทุนป้องกันค้ามนุษย์ฯ'), $_GET['type'], 'class="form-control" onchange = "memberForm($(this).val());"'); ?>
</h4>


<form action="org/claimfund/saveSupport" method='post' enctype="multipart/form-data" >
<div class="dvSupport">
    <table class="tblForm">
        <tr>
            <th style="width: 250px;" >ปีงบประมาณ / จังหวัด</th>
            <td class="form-inline">
              <?php echo (date('Y')+543).' / '.$value['province_name']?>
              <input type="hidden" name='year_budget' value='<?php echo (date('Y')+543)?>' >
              <input type="hidden" name='province_id' value='<?php echo $value['province_code']?>' >
            </td>
        </tr>
        <tr>
            <th>ชื่อองค์กรที่เสนอขอรับเงินกองทุน</th>
            <td>
              <?php
                //  act_welfare_benefit_id = องค์กรสาธารณประโยชน์
                //  act_welfare_comm_id = องค์กรสวัสดิการชุมชน
                //  under_type_sub ประเภทหน่วยงาน
                //    1 = มูลนิธิ   
                //    2 = สมาคม
                //    3 = องค์กรภาคเอกชน
                $under_type_sub = $value['under_type_sub'];

                if(@$this->session->userdata('act_welfare_benefit_id')==true) {
                  $agency_type_id = 1;
                  switch ($under_type_sub) {
                    case 'มูลนิธิ':
                      $agency_sub_type = 1;
                      break;
                    case 'สมาคม':
                      $agency_sub_type = 2;
                      break;
                    case 'องค์กรภาคเอกชน':
                      $agency_sub_type = 3;
                      break;
                  }
                } else {
                  $agency_type_id = 2;
                    switch ($under_type_sub) {
                    case 'องค์กรสวัสดิการชุมชน':
                      $agency_sub_type = 4;
                      break;
                    case 'เครือข่าย':
                      $agency_sub_type = 5;
                      break;
                    }
                }

                echo $value['organ_name'].' ('.$value['under_type_sub'].')';
                echo form_hidden('agency_type_id',$agency_type_id);
                echo form_hidden('agency_sub_type',$agency_sub_type);
              ?>
            </td>
        </tr>
        <tr>
          <th>ระบบ / รูปแบบ<br />การขอรับเงินสนับสนุน</th>
          <td>
            <input type="radio" name="project_system" value="1"> ระบบปกติ
            <input type="radio" id="project_system_2" name="project_system" value="2"> ระบบกระจาย
        </td>
        <tr id="is_project_system_2" style="display: none;">
            <th>รูปแบบการขอรับการสนับสนุน</th>
            <td>
                <div>
                    <input type="radio" name="is_project_system_2" value="1"> เชิงประเด็น</div>
                <div>
                    <input type="radio" name="is_project_system_2" value="2"> เชิงพื้นที่</div>
            </td>
        </tr>
        <tr>
            <th>ชื่อโครงการ (ภาษาไทย)<span class="Txt_red_12"> *</span></th>
            <td>
                <input type="text" name="project_name" style="width:550px;" class="form-control" />
            </td>
        </tr>
        <tr>
            <th>ประเภทโครงการที่ขอรับเงินกองทุนฯ <span class="Txt_red_12">*</span></th>
            <td>
                <div class="boxOrgType1">
                    <div style="margin-bottom:10px;">
                        <input type="radio" class="radio-inline" name="project_type_id" value="1" /> โครงการใหม่ (โครงการที่ไม่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้น มาก่อน)
                    </div>

                    <div style="margin-bottom:10px;">
                        <input type="radio" class="radio-inline" name="project_type_id" value="2" /> โครงการที่ดำเนินงานมาแล้ว (โครงการที่ได้ดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นแล้ว โดยต้องมีทุนเพื่อใช้ในการดำเนินงานตามโครงการนี้อยู่แล้วบางส่วน ซึ่งต้องไม่น้อยกว่า 25%)
                    </div>

                    <div>
                        <input type="radio" class="radio-inline" name="project_type_id" value="3" /> ไม่ได้รับการสนับสนุนงบประมาณจากส่วนราชการและแหล่งทุนอื่นๆ หรือได้รับแต่ไม่เพียงพอ
                    </div>
                </div>


                <div class="boxOrgType2" style="display: none;" >
                    
                    <div style="margin-bottom:10px;">
                        <input type="radio" class="radio-inline" name="radio" value="1" /> โครงการรึเริ่มใหม่ (โครงการที่มีแนวคิดหรือนโยบายใหม่ ไม่เคยทำมาก่อน)
                    </div>
                    
                    <div style="margin-bottom:10px;">
                        <input type="radio" class="radio-inline" name="radio" value="1" /> ไม่สามารถของบประมาณปกติได้
                    </div>
                    
                    <div>
                        <input type="radio" class="radio-inline" name="radio" value="1" /> ได้รับแต่ไม่เพียงพอ (ได้รับงบประมาณปกติ
                        <input type="text" class="form-control" style="display: inline; width: 250px;" /> บาท)
                    </div>

                </div>

                <div style="margin-top:15px; margin-left:30px; display:none">
                    <p><span style="margin-right:20px;">
        <input name="input8" type="text" style="width:400px;" placeholder="ชื่อโครงการ (เดิม)" />
        <select name="select3">
          <option>ปีที่ดำเนินการ (เดิม)</option>
          <option>2557</option>
          <option>2556</option>
          </select>
        </span></p>
                    <p>แหล่งเงินสนับสนุน (เดิม) <span style="margin-right:20px; margin-left:10px;">
        <input type="radio" name="radio" id="radio16" value="radio" />
        จากกองทุน กสค. </span> <span>
          <input type="radio" name="radio" id="radio20" value="radio" />
          แหล่งอื่นๆ</span>
                        <input name="input8" type="text" style="width:250px;" placeholder="ระบุ" />
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <th>สาขาของโครงการที่ขอรับสนับสนุน <span class="Txt_red_12">*</span></th>
            <td>
                <?php foreach ($sectors as $num => $sector):?>
                <span style="display:inline-block; width:280px;"><input type="checkbox" class="checkbox-inline" name="project_sector_<?php echo $sector['id']?>" value="1" /> <?php echo $sector['title_normal']?> </span>
                <?php endforeach?>
                <span style="display:inline-block;"><input type="checkbox" class="checkbox-inline" name="project_sector_other" value="1" /> ด้านอื่นๆ ระบุ <input type="text" class="form-control" name="project_sector_other_title" style="display: inline; width: 200px;" /> </span></td>
        </tr>
        <tr>
            <th>กลุ่มเป้าหมาย <span class="Txt_red_12">*</span></th>
            <td id="project_target" ></td>
        </tr>
        <tr>
            <th>งบประมาณโครงการและแหล่งสนับสนุน(เฉพาะปีปัจจุบัน) <span class="Txt_red_12">*</span></th>
            <td>

              <div>
                  <div style="display: inline-block; width: 310px;">
                      งบประมาณทั้งโครงการ (เฉพาะปีปัจจุบัน)
                  </div>
                  <input type="number" id="budget_total" name="budget_total" class="num-format form-control" value="" readonly style="display:inline;width: 250px;" > บาท
              </div>

              <div>
                  <div style="display: inline-block; width: 310px;">
                      งบประมาณที่ขอรับการสนับสนุน
                  </div>
                  <input type="number" id="budget_request" class="num-format calculate-budget form-control" name="budget_request" value="" style="display:inline;width: 250px;" > บาท
                  <span class="note">* จะคำนวณเป็นขนาดโครงการ</span>
              </div>

              <div style="padding-left: 50px;">
                  งบประมาณที่ได้รับสมทบจากแหล่งอื่น

                  <div style="padding-left: 20px;">
                      <div style="display: inline-block; width: 240px;">
                          <input type="checkbox" id="budget_other_1" class="budget_other" name="has_budget_other_1" data-target="1" value="1"> หน่วยงานรัฐ
                      </div>
                      <input type="number" class="calculate-budget form-control" name="budget_other_1" value="" style="display: inline; width: 250px;" disabled > บาท
                  </div>

                  <div style="padding-left: 20px;">
                      <div style="display: inline-block; width: 240px;">
                          <input type="checkbox" id="budget_other_2" class="budget_other" name="has_budget_other_2" data-target="2" value="1"> หน่วยงานภาคเอกชน
                      </div>
                      <input type="number" class="calculate-budget form-control" name="budget_other_2" value="" style="display: inline; width: 250px;" disabled > บาท
                  </div>

                  <div style="padding-left: 20px;">
                      <input type="checkbox" id="has_budget_other_3" name="has_budget_other_3" value="1"> ท้องถิ่น

                      <div id="div_has_budget_other_3" style="padding-left: 40px;display:none;">
                          <div>
                              <div style="display: inline-block; width: 200px;">
                                  <input type="checkbox" id="has_budget_other_3_1" class="has_budget_other_3" name="has_budget_other_3_1" data-target="1" value="1"> องค์การบริหารส่วนจังหวัด
                              </div>
                              <input type="number" class="has_budget_other_3 calculate-budget form-control" name="budget_other_3_1" value="" style="display: inline; width: 250px;" disabled > บาท
                          </div>

                          <div>
                              <div style="display: inline-block; width: 200px;">
                                  <input type="checkbox" id="has_budget_other_3_2" class="has_budget_other_3" name="has_budget_other_3_2" data-target="2" value="1"> องค์การบริหารส่วนตำบล
                              </div>
                              <input type="number" class="has_budget_other_3 calculate-budget form-control" name="budget_other_3_2" value="" style="display: inline; width: 250px;" disabled > บาท
                          </div>

                          <div>
                              <div style="display: inline-block; width: 200px;">
                                  <input type="checkbox" id="has_budget_other_3_3" class="has_budget_other_3" name="has_budget_other_3_3" data-target="3" value="1"> องค์กรปกครองส่วนท้องถิ่น
                              </div>
                              <input type="number" class="has_budget_other_3 calculate-budget form-control" name="budget_other_3_3" value="" style="display: inline; width: 250px;" disabled > บาท
                          </div>

                          <div>
                              <div style="display: inline-block; width: 200px;">
                                  <input type="checkbox" id="has_budget_other_3_4" class="has_budget_other_3" name="has_budget_other_3_4" data-target="4" value="1"> เทศบาล
                              </div>
                              <input type="number" class="has_budget_other_3 calculate-budget form-control" name="budget_other_3_4" value="" style="display: inline; width: 250px;" disabled > บาท
                          </div>
                      </div>
                  </div>
              </div>

              <div>
                  <div style="display: inline-block; width: 310px;">
                      งบประมาณที่องค์กรสมทบเอง
                  </div>
                  <input type="text" class="calculate-budget form-control" name="organization_budget" value="" style="display: inline; width: 250px;" > บาท
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
</style>
<script type="text/javascript">

  function getOtherTarget() {
    var c = $("input[name=project_target_other]");
    
    $.get("org/claimfund/getOtherTarget", function(data) {
      $(data).insertBefore($("#last-project-target"));
    
      if(c.is(":checked")) {
        $(".project_target_other").attr("disabled",false);
      } else {
        $(".project_target_other").attr("disabled",true);
      }
    });
    
    formValidate();
    return false;
  }

  function formValidate() {

  }

  function calculateTotal() {
    var totalInput = $(".calculate-budget:enabled").length;
    var totalBudget = 0;
    var budget = 0;
    
    for (var i=0; i < totalInput; i++) {
      totalBudget += Number($(".calculate-budget:enabled").eq(i).val());      
    };
    
    $("#budget_total").val(totalBudget);
  }

  $(document).ready(function(){

    //  คลิกเลือก ระบบการขอรับเงินสนับสนุน 1= ระบบปกติ,2 = ระบบกระจาย
    $("input[name=project_system]").click(function() {
        var id = $(this).val();

        if (id=="2") {
            $("#is_project_system_2").show();
        } else {
            $("#is_project_system_2").hide();
            $("input[name=is_project_system_2]").attr("checked", false);
        }
    });

    //  คลิกเลือก ระบบการขอรับเงินสนับสนุน 1= ระบบปกติ,2 = ระบบกระจาย
    $("input[name=project_system]").click(function() {
        var id = $(this).val();

        if (id == "2") {
            $("#is_project_system_2").show();
        } else {
            $("#is_project_system_2").hide();
            $("input[name=is_project_system_2]").attr("checked", false);
        }

        //  กลุ่มเป้าหมาย
        $.get("org/claimfund/getTarget/" + id, function(data) {
            //  $("#project_target").html(ajaxLoader);

            setTimeout(function() {
                $("#project_target").html(data);
            }, 500)

        });

        formValidate();
    });

    //  งบประมาณทั้งโครงการ
    $(".calculate-budget").keyup(function() {
        calculateTotal();
    })

    //  คลิกกลุ่มเป้าหมายสำหรับกรอกจำนวน
    $("input.project_target[data-target]").live("click", function() {
      var c = $(this);
      var target = c.attr("data-target");
      var inp = $("input[data-target-number="+target+"]");
      
      if(c.is(":checked")) {
        inp.attr("disabled",false);
      } else {
        inp.attr("disabled",true);
      }
      
      formValidate();
    });
    
    //  คลิกกลุ่มเป้าหมายอื่นๆ (กรณีระบบปกติ)
    $("input[name=project_target_other]").live("click", function() {
      var c = $(this);
      
      if(c.is(":checked")) {
        $(".project_target_other").attr("disabled",false);
      } else {
        $(".project_target_other").attr("disabled",true);
      }
      
      formValidate();
    });

    //  งบประมาณที่ได้รับสมทบจากแหล่งอื่น
    $(".budget_other").click(function() {
        var c = $(this);
        var target = $(this).attr("data-target");
        var input = $("input[name=budget_other_" + target + "]");

        if (c.is(":checked")) {
            input.attr("disabled", false);
        } else {
            input.attr("disabled", true);
        }

        calculateTotal();
        formValidate();
    })

    //  งบประมาณที่ได้รับสมทบจากแหล่งอื่น -> ท้องถิ่น
    $("input[name=has_budget_other_3]").click(function() {
        var c = $(this);

        if (c.is(":checked")) {
            $("#div_has_budget_other_3").show();
        } else {
            $("#div_has_budget_other_3").hide();
            $("input.has_budget_other_3[type=checkbox]").attr("checked", false);
            $("input.has_budget_other_3[type=number]").attr("disabled", true);
        }

        calculateTotal();
        formValidate();
    });

    //  งบประมาณที่ได้รับสมทบจากแหล่งอื่น -> ท้องถิ่น -> องค์กร...
    $("input.has_budget_other_3[type=checkbox]").click(function() {
        var c = $(this);
        var target = c.attr("data-target");
        var t = $("input.has_budget_other_3[name=budget_other_3_" + target + "]");

        if (c.is(":checked")) {
            t.attr("disabled", false);
        } else {
            t.attr("disabled", true);
        }

        calculateTotal();
        formValidate();
    });

  });
</script>