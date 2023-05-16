  <main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>บริหารจัดการและกำหนดสิทธิกลุ่มผู้ใชังานระบบ</h1>
                <nav>
                    <ol class="breadcrumb">
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
						<input type="hidden" id="FilterSchoolID" name="FilterSchoolID" value="">
						</h5>
                    </div>
                    <div class="col">
                        <h5 style="float: right; padding: 15px;" class="card-title">
							<button type="button" class="btn btn-success" data-bs-toggle="modal" data-id="" data-name="" data-isadmin="0" data-schoolid="<?=$DefaultSchoolID?>" data-bs-target="#UserGroupFRMModal"><i class=" bi bi-person-plus"></i> เพิ่มข้อมูล</button>
						</h5>
                    </div>
                </div>
                <table class="table table-borderless datatable table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: left;" scope="col" width="76%">ชื่อกลุ่มผู้ใช้งาน</th>
                            <th style="text-align: left;" scope="col" width="12%">กำหนดสิทธิ์</th>
                            <th style="text-align: center;" scope="col" width="12%">ปฏิบัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($UserGroups as $UserGroup) {
                        ?>
                            <tr>
                                <td><?= $UserGroup['UGName']?></td>
                                <td style="text-align: center;">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-groupid="<?= $UserGroup['UGID']; ?>"  data-name="<?= $UserGroup['UGName']; ?>" data-schoolname="<?= $UserGroup['SchoolNameThai']; ?>" data-bs-target="#GroupRightFRMModal"><i class="bi bi-card-list"></i></button>								
                                </td>
                                <td style="text-align: center;">
									<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-id="<?= $UserGroup['UGID']; ?>" data-name="<?= $UserGroup['UGName']; ?>" data-isadmin="<?= $UserGroup['UGIsAdmin']; ?>" data-schoolid="<?= $UserGroup['UGSchoolID']; ?>" data-bs-target="#UserGroupFRMModal"><i class=" bi bi-pencil-square"></i></button>
									 <?php if($UserGroup['UGIsDefault'] <> "1"){?>
                                    &nbsp;
									<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-id="<?= $UserGroup['UGID']; ?>" data-name="<?= $UserGroup['UGName']; ?>"  data-bs-target="<?php if($UserGroup['Member_Count'] > 0){echo '#NotDeleteUserGroupFRMModal';}else{echo '#DeleteUserGroupFRMModal';}?>"><i class=" bi bi-trash"></i></button>
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

	<div class="modal inmodal"  id="UserGroupFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UserGroupFRMModalTitle">เพิ่มกลุ่มผู้ใชังานระบบ</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
					<form class="row g-3" action="#" method="POST" name="UserGroupForm" id="UserGroupForm">
						<input type="hidden" id="FRM_UGID" name="FRM_UGID">
						<input type="hidden" id="FRM_UGSchoolID" name="FRM_UGSchoolID" value="">
						<input type="hidden" id="FRM_UGIsAdmin" name="FRM_UGIsAdmin" value="0">
						<div class="col-md-12">
							<div class="form-floating">
							<input type="text" class="form-control" id="FRM_UGName" name="FRM_UGName" placeholder="Your Name" required>
							<label for="floatingName">ชื่อกลุ่มผู้ใช้งาน<font color="red"> *</font></label>
							</div>					
						</div>	
						<div class="col-md-12 justify-content-between">
							<button type="button" class="btn btn-danger"  style="float: left;" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> ยกเลิกข้อมูล</button>
							<button type="submit" id="btn-save-usergroup" name="btn-save-usergroup" class="btn btn-primary" style="float: right;"><i class=" bi bi-save"></i> บันทึกข้อมูล</button>					
						</div>											
					</form>
                </div>
            </div>
        </div>
    </div>

	<div class="modal inmodal" id="GroupRightFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document"  style="height: 90%;">
            <div class="modal-content" style="height: 90%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="UserGroupFRMModalTitle">กำหนดสิทธิ์กลุ่มผู้ใชังาน ( <font color="blue"><data id="EditTitle"></data></font> )</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body" style="max-height: calc(100% - 100px);overflow-y: hidden;">
					<form class="row g-3" action="#" method="POST" name="GroupRightsForm" id="GroupRightsForm">
						<input type="hidden" id="FRM_UR_GroupID" name="FRM_UR_GroupID">
						<div class="col-md-12">
							<table class="table table-borderless table-hover table-rights-fixed">
								<thead>
									<tr>
										<th style="text-align: left;" scope="col" width="5%">#</th>
										<th style="text-align: left;" scope="col" width="70%">หน้าที่ในระบบ</th>
										<th style="text-align: left;" scope="col" width="6%">อ่าน</th>
										<th style="text-align: left;" scope="col" width="6%">เพิ่ม</th>
										<th style="text-align: left;" scope="col" width="6%">แก้ไข</th>
										<th style="text-align: left;" scope="col" width="6%">ลบ</th>
										<th style="text-align: left;" scope="col" width="1%"></th>
									</tr>
									<tr>
										<th style="text-align: left;" scope="col" width="5%"></th>
										<th style="text-align: left;" scope="col" width="68.3%"></th>
										<th style="text-align: left;" scope="col" width="6%"><input type="checkbox" id="Read_All" class="form-check-input" style="width: 1.5rem; height: 1.5rem;top:0.5rem;" value="1" ></th>
										<th style="text-align: left;" scope="col" width="6%"><input type="checkbox" id="Add_All" class="form-check-input" style="width: 1.5rem; height: 1.5rem;top:0.5rem;" value="1" ></th>
										<th style="text-align: left;" scope="col" width="6%"><input type="checkbox" id="Edit_All" class="form-check-input" style="width: 1.5rem; height: 1.5rem;top:0.5rem;" value="1" ></th>
										<th style="text-align: left;" scope="col" width="6%"><input type="checkbox" id="Delete_All" class="form-check-input" style="width: 1.5rem; height: 1.5rem;top:0.5rem;" value="1" ></th>
										<th style="text-align: left;" scope="col" width="1%"></th>
									</tr>										
								</thead>
								<tbody>
								<?php
								$No = 1;
								foreach($Rights as $Right){
								?>
																
									<tr>
										<th style="text-align: left;" scope="col" width="5%"><?=$No?></th>
										<th style="text-align: left;" scope="col" width="71%"><?=$Right['Right_Name']?></th>
										<th style="text-align: left;" scope="col" width="6%">
											<div class="form-check">
											  <input class="form-check-input" style="width: 1.5rem; height: 1.5rem;top:0.5rem;" type="checkbox" id="Read_<?=$Right['Right_Code']?>" value="1" >
											</div>																				
										</th>
										<th style="text-align: left;" scope="col" width="6%">
											<div class="form-check">
											  <input class="form-check-input" style="width: 1.5rem; height: 1.5rem;top:0.5rem;" type="checkbox" id="Add_<?=$Right['Right_Code']?>" value="1" >
											</div>																				
										</th>
										<th style="text-align: left;" scope="col" width="6%">
											<div class="form-check">
											  <input class="form-check-input" style="width: 1.5rem; height: 1.5rem;top:0.5rem;" type="checkbox" id="Edit_<?=$Right['Right_Code']?>" value="1" >
											</div>																				
										</th>
										<th style="text-align: left;" scope="col" width="6%">
											<div class="form-check">
											  <input class="form-check-input" style="width: 1.5rem; height: 1.5rem;top:0.5rem;" type="checkbox" id="Delete_<?=$Right['Right_Code']?>" value="1" >
											</div>																				
										</th>
									</tr>
								<?php
									$No++;
								}
								?>
								</tbody>
							</table>
						</div>						
						<div class="col-md-12">
							<div class="row">
							</div>						
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-10">
								<button type="button" class="btn btn-danger"  style="float: left;" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> ยกเลิกข้อมูล</button>
								<button type="button" id="btn-save-groupright" name="btn-save-groupright" class="btn btn-primary" style="float: right;" data-bs-dismiss="modal"><i class=" bi bi-save"></i> บันทึกข้อมูล</button>					
								</div>
								<div class="col-md-1"></div>
							</div>
						</div>											
					</form>
                </div>
            </div>
        </div>
    </div>
  
	<div class="modal fade"  id="DeleteUserGroupFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูล</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
					<input type="hidden" id="DEL_UGID">
                </div>
                <div class="modal-body">
                    <h6>
                        <center>คุณต้องการลบข้อมูล <font color="red"><data id="DEL_UGName"></data></font> ใช่หรือไหม ?</center>
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> ยกเลิกข้อมูล</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="delete_record()"><i class="bi bi-person-dash"></i> ลบ</button>
                </div>
            </div>
        </div>
    </div>
	
	<div class="modal fade"  id="NotDeleteUserGroupFRMModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ไม่สามารถลบข้อมูลได้</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
					<input type="hidden" id="DEL_UGID">
                </div>
                <div class="modal-body">
                    <h6>
                        <center><font color="red">เนื่องจากมีสมาชิกสังกัดกลุ่ม</font></center>
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> รับทราบ</button>
                </div>
            </div>
        </div>
    </div>	

<!-- End Form Modal -->

	
<!-- page script -->
<script>

    $(document).ready(function(){	

		$("#UserGroupFRMModal").on('show.bs.modal', function (e) {
			var triggerLink = $(e.relatedTarget);
			var UGID = triggerLink.data("id");
			var UGName = triggerLink.data("name");
			var UGIsAdmin = triggerLink.data("isadmin");
			var UGSchoolID = triggerLink.data("schoolid");
			
			if(UGID == "0"){
				$('#UserGroupFRMModalTitle').text('เพิ่มกลุ่มผู้ใชังานระบบ');
			}else{
				$('#UserGroupFRMModalTitle').text('แก้ไขกลุ่มผู้ใชังานระบบ');
			}
			
			$('#FRM_UGID').val(UGID);
			$('#FRM_UGName').val(UGName);			
			$('#FRM_UGIsAdmin').val(UGIsAdmin);
			
			
			$('#FRM_UGSchoolID').val(UGSchoolID);
			
		});

		$("#GroupRightFRMModal").on('show.bs.modal', function (e) {
			var triggerLink = $(e.relatedTarget);
			var UGID = triggerLink.data("id");
			var UGName = triggerLink.data("name");
			var SchoolName = triggerLink.data("schoolname");
			var UR_GroupID = triggerLink.data("groupid");
			
			$('#EditTitle').text(SchoolName + ' < ' + UGName + ' >');
			$('#FRM_UR_GroupID').val(UR_GroupID);
			
			USR_GROUPRIGHTS = JSON.parse(GET_USR_GROUPRIGHTS(UR_GroupID));
			console.log(USR_GROUPRIGHTS);
			
			if(USR_GROUPRIGHTS.length > 0){
			
				for (var i=0; i<USR_GROUPRIGHTS.length; i++) {
					console.log(USR_GROUPRIGHTS[i]);
					$('#Read_'+USR_GROUPRIGHTS[i].UR_Code).prop('checked', USR_GROUPRIGHTS[i].UR_Read === "1" ? true : false);
					$('#Add_'+USR_GROUPRIGHTS[i].UR_Code).prop('checked', USR_GROUPRIGHTS[i].UR_Add === "1" ? true : false);
					$('#Edit_'+USR_GROUPRIGHTS[i].UR_Code).prop('checked', USR_GROUPRIGHTS[i].UR_Edit === "1" ? true : false);
					$('#Delete_'+USR_GROUPRIGHTS[i].UR_Code).prop('checked', USR_GROUPRIGHTS[i].UR_Delete === "1" ? true : false);
				}
			}else{
				var	ret	= null;		
				var	data = {
						'UR_GroupID': UR_GroupID
					};
									
					$.ajax({
						url: '<?php echo base_url(); ?>index.php/GroupRight/Insert_GROUPRIGHTS',
						data: data,
						method: 'POST',
						dataType: 'JSON',
						cache: false,
						async: false,
						success: function (data) {
							//console.log(JSON.stringify(data));
							 if(data != null){
								//JSON.stringify(data)
								ret = JSON.stringify(data)
							 }
						}
					})
					.done(function () {
					});	
				return ret;				
			}
		});

		$("#DeleteUserGroupFRMModal").on('show.bs.modal', function (e) {
			var triggerLink = $(e.relatedTarget);
			var UGID = triggerLink.data("id");
			var UGName = triggerLink.data("name");
						
			$('#DEL_UGID').val(UGID);
			$('#DEL_UGName').text(UGName);
			
		});

        $('#UserGroupForm').submit(function(e){ 
									
			if($("#FRM_UGID").val() != ''){
				action = 'edit';
			}else{
				action = 'insert';
			}			
			
            e.preventDefault(); 
                $.ajax({
					url:'<?php echo base_url();?>index.php/UserGroup/'+action,
                    type:"post",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
						if(data=='บันทึกข้อมูลเรียบร้อยแล้ว'){
							window.location.href = '<?php echo base_url();?>Admin/UserGroups/<?=$DefaultSchoolID?>';						
						}else{
							//$("#btn-save-usergroup").notify(data, {position: "left midden", className: "error"});			
						}
					}
				});
        });

        $("#btn-save-groupright").click(function () {
			var inputElems = document.getElementsByTagName("input");
						
			var data_checkbox = [];			
			for (var i=0; i<inputElems.length; i++) {
				if (inputElems[i].type === "checkbox" && inputElems[i].id != "FRM_UGIsAdmin" && inputElems[i].id != "Read_All" 
				&& inputElems[i].id != "Add_All" && inputElems[i].id != "Edit_All" && inputElems[i].id != "Delete_All"){
					Name = inputElems[i].id;
					Name = Name.split("_");
					
					if(Name[0] == "Read"){					
						data_checkbox.push({
									'UR_GroupID': $('#FRM_UR_GroupID').val(), 
									'UR_Code':  Name[1],
									'UR_Read': inputElems[i].checked === true ? 1 : 0
								});
					}

					if(Name[0] == "Add"){					
						data_checkbox.push({
									'UR_GroupID': $('#FRM_UR_GroupID').val(), 
									'UR_Code':  Name[1],
									'UR_Add': inputElems[i].checked === true ? 1 : 0
								});
					}

					if(Name[0] == "Edit"){					
						data_checkbox.push({
									'UR_GroupID': $('#FRM_UR_GroupID').val(), 
									'UR_Code':  Name[1],
									'UR_Edit': inputElems[i].checked === true ? 1 : 0
								});
					}

					if(Name[0] == "Delete"){					
						data_checkbox.push({
									'UR_GroupID': $('#FRM_UR_GroupID').val(), 
									'UR_Code':  Name[1],
									'UR_delete': inputElems[i].checked === true ? 1 : 0
								});
					}

				}
			}

			var data_update = {
								'UR_GroupID': $('#FRM_UR_GroupID').val(),
								'data_checkbox': data_checkbox
							};
			
			$.ajax({
				url:'<?php echo base_url();?>index.php/GroupRight/Updates',
                data: data_update,
                dataType: 'JSON',
                method: 'POST',
                cache: false,
                async: false,
				success: function(data){
					// if(data=='บันทึกข้อมูลเรียบร้อยแล้ว'){
					// }else{
					// }
				}				
			});

			//window.location.href = '<?php echo base_url();?>Admin/UserGroups/<?=$DefaultSchoolID?>';	
			
        });

		$("#Read_All").change(function () {
			var inputElems = document.getElementsByTagName("input");
			
			for (var i=0; i<inputElems.length; i++) {
				if (inputElems[i].type === "checkbox" && inputElems[i].id != "FRM_UGIsAdmin"){
					Name = inputElems[i].id;
					Name = Name.split("_");
					
					if(Name[0] == "Read"){					
							inputElems[i].checked = $("#Read_All").prop('checked');
					}

				}
			}			
		});

		$("#Add_All").change(function () {
			var inputElems = document.getElementsByTagName("input");
			
			for (var i=0; i<inputElems.length; i++) {
				if (inputElems[i].type === "checkbox" && inputElems[i].id != "FRM_UGIsAdmin"){
					Name = inputElems[i].id;
					Name = Name.split("_");
					
					if(Name[0] == "Add"){					

						inputElems[i].checked = $("#Add_All").prop('checked');
						
					}

				}
			}
		});

		$("#Edit_All").change(function () {
			var inputElems = document.getElementsByTagName("input");
			
			for (var i=0; i<inputElems.length; i++) {
				if (inputElems[i].type === "checkbox" && inputElems[i].id != "FRM_UGIsAdmin"){
					Name = inputElems[i].id;
					Name = Name.split("_");
					
					if(Name[0] == "Edit"){					

						inputElems[i].checked = $("#Edit_All").prop('checked');
						
					}

				}
			}
		});

		$("#Delete_All").change(function () {
			var inputElems = document.getElementsByTagName("input");
			
			for (var i=0; i<inputElems.length; i++) {
				if (inputElems[i].type === "checkbox" && inputElems[i].id != "FRM_UGIsAdmin"){
					Name = inputElems[i].id;
					Name = Name.split("_");
					
					if(Name[0] == "Delete"){					

						inputElems[i].checked = $("#Delete_All").prop('checked');
						
					}

				}
			}
		});


		$("#FilterSchoolID").change(function () {
			window.location.href = '<?php echo base_url();?>Admin/UserGroups/' + $("#FilterSchoolID").val();	
		});
		
    });


	function GET_USR_GROUPRIGHTS(UR_GroupID){
		var	ret	= null;		
		var	data = {
				'UR_GroupID': UR_GroupID
			};
							
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/GroupRight/GET_GROUPRIGHTS',
				data: data,
				method: 'POST',
				dataType: 'JSON',
				cache: false,
				async: false,
				success: function (data) {
					//console.log(JSON.stringify(data));
					 if(data != null){
						//JSON.stringify(data)
						ret = JSON.stringify(data)
					 }
				}
			})
			.done(function () {
			});	
		return ret;			
	}

	function delete_record(){
		
            var deldata = {
                'UGID': $('#DEL_UGID').val()
            };

            $.ajax({
                url: '<?php echo base_url(); ?>index.php/UserGroup/Delete',
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

			window.location.href = '<?php echo base_url();?>Admin/UserGroups/<?=$DefaultSchoolID?>';	
			
	}

</script> 