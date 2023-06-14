  <main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>บริหารจัดการบัญชีผู้ใชัระบบ</h1>
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
                        <h5 style="float: right; padding: 15px;" class="card-title">
							<button type="button" class="btn btn-success" data-bs-toggle="modal" data-id="" data-name="" data-groupid="0" data-schoolid="<?=$DefaultSchoolID?>" data-email="" data-phone="" data-cardtype="" data-cardno="" data-bs-target="#UserFRMModal"><i class=" bi bi-person-plus"></i> เพิ่มข้อมูล</button>
						</h5>							
                    </div>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th style="text-align: left;" scope="col">บัญชีผู้ใช้งาน</th>
                            <th style="text-align: left;" scope="col">ชื่อ นามสกุล</th>
                            <th style="text-align: left;" scope="col">สังกัดหน่วยงาน</th>
                            <th style="text-align: left;" scope="col">กลุ่มผู้ใช้งาน</th>
                            <th style="text-align: center;" scope="col">ปฏิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($Users as $User) {
                        ?>
                            <tr>
                                <td><?= $User['UserName']; ?></td>
                                <td><?= $User['UserFullName']; ?></td>
                                <td><?= $User['SchoolNameThai']; ?></td>
                                <td><?= $User['UserGroupName']; ?></td>
                                <td style="text-align: center;">
									<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-id="<?= $User['UserID']; ?>" data-name="<?= $User['UserFullName']; ?>" data-groupid="<?= $User['UserGroupID']; ?>" data-schoolid="<?= $User['UserSchoolID']; ?>" data-email="<?= $User['UserEmail']; ?>" data-birthdate="<?= $User['UserBirthDate']; ?>" data-phone="<?= $User['UserPhone']; ?>" data-type="<?= $User['UserType']; ?>" data-cardtype="<?= $User['UserCardType']; ?>" data-cardno="<?= $User['UserCardNo']; ?>" data-bs-target="#UserFRMModal"><i class=" bi bi-pencil-square"></i></button>
									<?php if($User['UserName'] <> "admin"){?>
                                    &nbsp;
									<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-id="<?= $User['UserID']; ?>" data-name="<?= $User['UserFullName']; ?>" data-bs-target="#DeleteUserFRMModal" ><i class=" bi bi-trash"></i></button>
									<?php }?>
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
                    <h5 class="modal-title" id="UserGroupFRMModalTitle">เพิ่มผู้ใชังานระบบ</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
					<form class="row g-3" action="#" method="POST" name="UserForm" id="UserForm">
						<input type="hidden" id="FRM_UserID" name="FRM_UserID">
						<input type="hidden" id="FRM_UserBirthDate" name="FRM_UserBirthDate">
						<input type="hidden" id="FRM_UserType" name="FRM_UserType">
						<div class="col-md-12">
						  <div class="form-floating">
							<select class="form-select" aria-label="Default select example" id="FRM_UserSchoolID" name="FRM_UserSchoolID" required>
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
							<label >หน่วยงาน<font color="red"> *</font></label>
						  </div>
						</div>	
						<div class="col-md-12">
							<div class="form-floating">
							<input type="text" class="form-control" id="FRM_UserFullName" name="FRM_UserFullName" required>
							<label for="floatingName">ชื่อ นามสกุล<font color="red"> *</font></label>
							</div>					
						</div>	
						<div class="col-md-6">
						  <div class="form-floating">
							<input type="email" class="form-control" id="FRM_UserEmail" name="FRM_UserEmail" required>
							<label >อีเมล์<font color="red"> *</font></label>
						  </div>
						</div>
						<div class="col-md-6">
						  <div class="form-floating">
							<input type="text" class="form-control" id="FRM_UserPhone" name="FRM_UserPhone" required>
							<label >โทรศัพท์<font color="red"> *</font></label>
						  </div>
						</div>	
						<div class="col-md-6">
						  <div class="form-floating">
							<input id="user_change_password" name="user_change_password" type="hidden" value="N">   									
							<input type="password" class="form-control" id="FRM_UserPassword" name="FRM_UserPassword" required>
							<label >รหัสผ่านใหม่<font color="red"><data id="FRM_UserPasswordRequire"> *</data></font></label>
						  </div>
						</div>	
						<div class="col-md-6">
						  <div class="form-floating">
							<input type="password" class="form-control" id="FRM_UserPassword2" name="FRM_UserPassword2" required>
							<label >ยืนยันรหัสผ่านใหม่<font color="red"><data id="FRM_UserPassword2Require"> *</data></font></label>
						  </div>
						</div>	
						
						<div class="col-md-4">
						  <div class="form-floating">
							<select class="form-select" aria-label="Default select example" id="FRM_UserCardType" name="FRM_UserCardType" required>
								<option selected value="">กรุณาเลือก</option>
								<option value="StudentID">บัตรประจำตัวนักเรียน</option>
								<option value="CardID">บัตรประจำตัวประชาชน</option>
								<option value="Passport">หนังสือเดินทาง</option>
							</select>
							<label >ประเภทบัตร<font color="red"> *</font></label>
						  </div>
						</div>	
						<div class="col-md-8">
						  <div class="form-floating">
							<input type="FRM_UserCardNo" class="form-control" id="FRM_UserCardNo" name="FRM_UserCardNo" required>
							<label >หมายเลขบัตร<font color="red"> *</font></label>
						  </div>
						</div>						
						<div class="col-md-12">
						  <div class="form-floating">
							<select class="form-select" aria-label="Default select example" id="FRM_UserGroupID" name="FRM_UserGroupID" required>
							  <option selected value="">เลื่อกกลุ่มผู้ใช้</option>
								<?php
								foreach($UserGroups as $UserGroup){
								?>
								<option value="<?=$UserGroup['UGID'];?>"><?=$UserGroup['UGName'];?></option>
								<?php
								}
								?>							  
							</select>
							<label >กลุ่มผู้ใช้งาน<font color="red"> *</font></label>
						  </div>
						</div>
						<div class="col-md-12">
							<div class="row">
							</div>						
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-10">
									<button type="button" class="btn btn-danger"  style="float: left;" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> ยกเลิกข้อมูล</button>
									<button type="submit" id="btn-save-user" name="btn-save-user" class="btn btn-primary" style="float: right;"><i class=" bi bi-save"></i> บันทึกข้อมูล</button>					
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
	
<!-- End Form Modal -->	

<!-- page script -->
<script>

    $(document).ready(function(){	

		$("#FilterSchoolID").change(function () {
			window.location.href = '<?php echo base_url();?>Admin/Users/' + $("#FilterSchoolID").val();	
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

		$('#FRM_UserPassword').keypress(function(){
			$('#user_change_password').val('Y');
			$('#FRM_UserPassword').prop('required',true);
			$('#FRM_UserPasswordRequire').text(' *');							
			$('#FRM_UserPassword2').prop('required',true);
			$('#FRM_UserPassword2Require').text(' *');							
        });	

        $('#UserForm').submit(function(e){ 
														
			if($("#FRM_UserID").val() == ''){
				action = 'insert';
				
				if($('#FRM_UserPassword').val() != $('#FRM_UserPassword2').val()){
					Alert('กรุณายืนยันพาสเวิร์ดให้เหมือนกับพาสเวิร์ด');
					return false;					
				}					
				
			}else{
				action = 'edit';
				
				//if($('#user_change_password').val() == "Y"){
					
					if($('#FRM_UserPassword').val() != $('#FRM_UserPassword2').val()){
						Alert('กรุณายืนยันพาสเวิร์ดให้เหมือนกับพาสเวิร์ด');
						return false;					
					}
				//}
								
			}			
			
            e.preventDefault(); 
                $.ajax({
					url:'<?php echo base_url();?>index.php/User/'+action,
                    type:"post",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
						if(data=='บันทึกข้อมูลเรียบร้อยแล้ว'){
							window.location.href = '<?php echo base_url();?>Admin/Users/<?=$DefaultSchoolID?>';						
						}else{
							//$("#btn-save-usergroup").notify(data, {position: "left midden", className: "error"});			
						}
					}
				});
        });
		
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

	function delete_record(){
		
            var deldata = {
                'UserID': $('#DEL_UserID').val()
            };

            $.ajax({
                url: '<?php echo base_url(); ?>index.php/User/Delete',
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