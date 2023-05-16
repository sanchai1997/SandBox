  <main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>บริหารจัดการบัญชีรอเปิดใชังานระบบ</h1>
                <nav>
                    <ol class="breadcrumb">
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- End Page Title -->

    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
						<div class="form-floating">
							<select class="form-select" name="FilterSchoolID" id="FilterSchoolID" aria-label="FilterSchoolID">
								<option value="" selected>ทั้งหมด</option>
								<option value="<?=$organize_code?>" <?php if($DefaultSchoolID == $organize_code){echo " selected";}?>><?=$organize_name_thai?></option>
								<?php
								foreach($Schools as $School){
								?>
								<option value="<?=$School->SchoolID;?>" <?php if($School->SchoolID == $DefaultSchoolID){echo " selected";}?>><?=$School->SchoolNameThai;?></option>
								<?php
								}
								?>
							</select>
						  <label for="SCHOOL_STATUS_CODE">หน่วยงาน</label>
						</div>						
						</h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title"></h5>
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: left;" scope="col">บัญชีผู้ใช้งาน</th>
                            <th style="text-align: left;" scope="col">ชื่อ นามสกุล</th>
                            <th style="text-align: left;" scope="col">สังกัดหน่วยงาน</th>
                            <th style="text-align: left;" scope="col">กลุ่มผู้ใช้งาน</th>
                            <th style="text-align: left;" scope="col">สถานะยืนยัน</th>
                            <th style="text-align: center;" scope="col">ปฏิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($UserRegisters as $UserRegister) {
                        ?>
                            <tr>
                                <td><?= $UserRegister['UserName']; ?></td>
                                <td><?= $UserRegister['UserFullName']; ?></td>
                                <td><?= $UserRegister['SchoolNameThai']; ?></td>
                                <td><?= $UserRegister['UserGroupName']; ?></td>
                                <td><?= $UserRegister['UserActivate']; ?></td>
                                <td style="text-align: center;">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-id="<?= $UserRegister['UserID']; ?>" data-name="<?= $UserRegister['UserFullName']; ?>" data-groupid="<?= $UserRegister['UserGroupID']; ?>" data-schoolid="<?= $UserRegister['UserSchoolID']; ?>" data-email="<?= $UserRegister['UserEmail']; ?>" data-birthdate="<?= $UserRegister['UserBirthDate']; ?>" data-phone="<?= $UserRegister['UserPhone']; ?>" data-type="<?= $UserRegister['UserType']; ?>" data-cardtype="<?= $UserRegister['UserCardType']; ?>" data-cardno="<?= $UserRegister['UserCardNo']; ?>" data-bs-target="#UserFRMModal"><i class=" bi bi-card-list"></i></button>
                                    &nbsp;
									<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-id="<?= $UserRegister['UserID']; ?>" data-name="<?= $UserRegister['UserFullName']; ?>" data-bs-target="#DeleteUserFRMModal" ><i class=" bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Recent Sales -->

  </main><!-- End #main -->
  
<!-- Begin Form Modal -->

	<div class="modal inmodal"  id="UserFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UserGroupFRMModalTitle">จัดการบัญชีรอเปิดใชังานระบบ</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
					<form class="row g-3" action="#" method="POST" name="UserForm" id="UserForm">
						<input type="hidden" id="FRM_UserID" name="FRM_UserID">
						<input type="hidden" id="FRM_UserBirthDate" name="FRM_UserBirthDate">
						<input type="hidden" id="FRM_UserType" name="FRM_UserType">
						<div class="col-md-12">
						  <div class="form-floating">
							<select class="form-select" aria-label="Default select example" id="FRM_UserSchoolID" name="FRM_UserSchoolID" disabled>
							  <option selected value="">เลือกหน่วยงาน</option>
								<option value="<?=$organize_code?>" <?php if($DefaultSchoolID == $organize_code){echo " selected";}?>><?=$organize_name_thai?></option>
								<?php
								foreach($Schools as $School){
								?>
								<option value="<?=$School->SchoolID;?>" <?php if($School->SchoolID == $DefaultSchoolID){echo " selected";}?>><?=$School->SchoolNameThai;?></option>
								<?php
								}
								?>							  
							</select>
							<label >หน่วยงาน<font color="red"> </font></label>
						  </div>
						</div>	
						<div class="col-md-12">
							<div class="form-floating">
							<input type="text" class="form-control" id="FRM_UserFullName" name="FRM_UserFullName" disabled>
							<label for="floatingName">ชื่อ นามสกุล<font color="red"> </font></label>
							</div>					
						</div>	
						<div class="col-md-6">
						  <div class="form-floating">
							<input type="email" class="form-control" id="FRM_UserEmail" name="FRM_UserEmail" disabled>
							<label >อีเมล์<font color="red"> </font></label>
						  </div>
						</div>
						<div class="col-md-6">
						  <div class="form-floating">
							<input type="text" class="form-control" id="FRM_UserPhone" name="FRM_UserPhone" disabled>
							<label >โทรศัพท์<font color="red"> </font></label>
						  </div>
						</div>							
						<div class="col-md-4">
						  <div class="form-floating">
							<select class="form-select" aria-label="Default select example" id="FRM_UserCardType" name="FRM_UserCardType" disabled>
								<option selected value="">กรุณาเลือก</option>
								<option value="StudentID">บัตรประจำตัวนักเรียน</option>
								<option value="CardID">บัตรประจำตัวประชาชน</option>
								<option value="Passport">หนังสือเดินทาง</option>
							</select>
							<label >ประเภทบัตร<font color="red"> </font></label>
						  </div>
						</div>	
						<div class="col-md-8">
						  <div class="form-floating">
							<input type="FRM_UserCardNo" class="form-control" id="FRM_UserCardNo" name="FRM_UserCardNo" disabled>
							<label >หมายเลขบัตร<font color="red"> </font></label>
						  </div>
						</div>						
						<div class="col-md-12">
						  <div class="form-floating">
							<select class="form-select" aria-label="Default select example" id="FRM_UserGroupID" name="FRM_UserGroupID" disabled>
							  <option selected value="">เลื่อกกลุ่มผู้ใช้</option>
								<?php
								foreach($UserGroups as $UserGroup){
								?>
								<option value="<?=$UserGroup['UGID'];?>"><?=$UserGroup['UGName'];?></option>
								<?php
								}
								?>							  
							</select>
							<label >กลุ่มผู้ใช้งาน<font color="red"> </font></label>
						  </div>
						</div>
						<div class="col-md-12">
							<div class="row">
							</div>						
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-10">
									<button type="button" class="btn btn-danger"  style="float: left;" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> ยกเลิกข้อมูล</button>
									<button type="button" id="btn-activate-user" name="btn-save-user" class="btn btn-primary" style="float: right;" onclick="activate_user()"><i class=" bi bi-save"></i> เปิดใชังานระบบ</button>					
								</div>
								<div class="col-md-1"></div>
							</div>
						</div>						
					</form>
                </div>
            </div>
        </div>
    </div>  

	<div class="modal fade"  id="DeleteUserFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูล</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
					<input type="hidden" id="DEL_UserID">
                </div>
                <div class="modal-body">
                    <h6>
                        <center>คุณต้องการลบข้อมูล <font color="red"><data id="DEL_UserName"></data></font> ใช่หรือไหม ?</center>
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> ยกเลิกข้อมูล</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="delete_record()"><i class="bi bi-person-dash"></i> ลบ</button>
                </div>
            </div>
        </div>
    </div>
	
	<div class="modal fade"  id="ActivateUserSuccessFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
					<input type="hidden" id="DEL_UserID">
                </div>
                <div class="modal-body">
                    <h6>
                        <center>เปิดการใช้งานผู้ใช้งาน<font color="green"><data id="ActivateUserName"></data></font> เรียบร้อย</center>
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-activate-user-success" name="btn-activate-user-success" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i>รับทราบ</button>
                </div>
            </div>
        </div>
    </div>	
	
<!-- End Form Modal -->	  

<script>

    $(document).ready(function(){	

		$("#FilterSchoolID").change(function () {
			window.location.href = '<?php echo base_url();?>Admin/Registers/' + $("#FilterSchoolID").val();	
		});

		$("#DeleteUserFRMModal").on('show.bs.modal', function (e) {
			var triggerLink = $(e.relatedTarget);
			var UserID = triggerLink.data("id");
			var UserName = triggerLink.data("name");
						
			$('#DEL_UserID').val(UserID);
			$('#DEL_UserName').text(UserName);
			
		});

		$("#UserFRMModal").on('show.bs.modal', function (e) {
			var triggerLink = $(e.relatedTarget);
			
			var UserSchoolID = triggerLink.data("schoolid");
			var UserGroupID = triggerLink.data("groupid");			
			var UserID = triggerLink.data("id");
			var UserFullName = triggerLink.data("name");
			var UserEmail = triggerLink.data("email");
			var UserBirthDate = triggerLink.data("birthdate");
			var UserPhone = triggerLink.data("phone");
			var UserType = triggerLink.data("type");
			var UserCardType = triggerLink.data("cardtype");
			var UserCardNo = triggerLink.data("cardno");
			
			if(UserID == ""){
				$('#UserFRMModalTitle').text('เพิ่มกลุ่มผู้ใชังานระบบ');
				$('#FRM_UserPassword').prop('required',true);
				$('#FRM_UserPasswordRequire').text('');				
				$('#FRM_UserPassword2').prop('required',true);
				$('#FRM_UserPassword2Require').text('');				
			}else{
				$('#UserFRMModalTitle').text('แก้ไขกลุ่มผู้ใชังานระบบ');
				$('#FRM_UserPassword').prop('required',false);
				$('#FRM_UserPasswordRequire').text('');				
				$('#FRM_UserPassword2').prop('required',false);
				$('#FRM_UserPassword2Require').text('');				
			}
									
			$('#FRM_UserID').val(UserID);
			$('#FRM_UserFullName').val(UserFullName);
			$('#FRM_UserSchoolID').val(UserSchoolID);
			$('#FRM_UserGroupID').val(UserGroupID);
			$('#FRM_UserEmail').val(UserEmail);
			$('#FRM_UserBirthDate').val(UserBirthDate);
			$('#FRM_UserPhone').val(UserPhone);
			$('#FRM_UserType').val(UserType);
			$('#FRM_UserCardType').val(UserCardType);
			$('#FRM_UserCardNo').val(UserCardNo);
			
		});

		$('#btn-activate-user-success').click(function () {
			$("#ActivateUserSuccessFRMModal").hide();
			$('.modal-backdrop').hide();
			window.location.href = '<?php echo base_url();?>Admin/Registers/' + $("#FilterSchoolID").val();	
		})
		
    });

	function Get_UserGroups(UserSchoolID){
		var	ret	= null;		
		var	data = {
				'UGSchoolID': UserSchoolID
			};
							
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/UserGroup/Get_UserGroups',
				data: data,
				method: 'POST',
				dataType: 'JSON',
				cache: false,
				async: false,
				success: function (data) {
					//console.log(JSON.stringify(data));
					 if(data != null){
						//JSON.stringify(data)
						ret = data
					 }
				}
			})
			.done(function () {
			});	
		return ret;		
	}

	function activate_user(){
		
        var data_activate = {
			'UserID': $('#FRM_UserID').val()
		};

		$.ajax({
			url: '<?php echo base_url(); ?>index.php/Register/ActivatedByAdmin',
			data: data_activate,
			dataType: 'JSON',
			method: 'POST',
			cache: false,
			async: false,
			success: function (data) {
			}
		})

		$("#UserFRMModal").hide();		
		$('#ActivateUserName').text($('#FRM_UserName').val());
		$("#ActivateUserSuccessFRMModal").toggle();					
		
	}

	function delete_record(){
		
            var deldata = {
                'UserID': $('#DEL_UserID').val()
            };

            $.ajax({
                url: '<?php echo base_url(); ?>index.php/Register/Delete',
                data: deldata,
                dataType: 'JSON',
                method: 'POST',
                cache: false,
                async: false,
                success: function (data) {
                }
            })
                    .done(function () {
                    });

            location.reload();
			
	}

</script> 