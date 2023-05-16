  <main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-12">
                <h1>กำหนดนโยบายการคุ้มครองข้อมูลส่วนบุคคล (Personal Data Protection Policy)</h1>
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
              <h5 class="card-title"></h5>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">รายละเอียด :</label>
                  <div class="col-sm-7">
					<form id="privacy_policyform" action="config/update" method="post">
						<div class="col-sm-12">
							<input id="x" name="x" type="hidden" class="form-control" value="privacy_policy">		
							<textarea  id="y" name="y"  class="form-control" style="height: 500px"><?= $privacy_policy ?></textarea>								
						</div>	
					</form>	
                  </div>
                  <div class="col-sm-2">
					<button type="submit" id="btn-save-privacy_policy" name="btn-save-privacy_policy" class="btn btn-primary">บันทึก</button>
                  </div>				  
                </div>	
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">นโยบายฉบับเต็ม  :</label>
					<div class="col-md-9">
						<div class="form-group">
							<div class="row logo d-flex align-items-center">
								<a href="<?php echo base_url(); ?>assets/docs/privacy_policy_full.pdf" target="_blank">นโยบายฉบับเต็ม</a>
							</div>
							<div class="row">
								<form id="privacy_policy_fullform" action="upload" method="post" enctype="multipart/form-data">
									<div class="col-md-3 form-group">		
										<input type="file" id="privacy_policy_full_file" name="privacy_policy_full_file">
									</div>	
									<div class="col-md-9 form-group">
										<button type="submit" id="btn-save-privacy_policy_full" name="btn-save-privacy_policy_full" class="btn btn-primary">Upload</button>
									</div>
								</form>
							</div>										
						</div>
					</div>				  
                </div>					
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">แบบฟอร์มคำร้องขอใช้สิทธิ  :</label>
					<div class="col-md-9">
						<div class="form-group">
							<div class="row logo d-flex align-items-center">
								<a href="<?php echo base_url(); ?>assets/docs/privacy_policy_form.pdf" target="_blank">แบบฟอร์ม</a>
							</div>
							<div class="row">
								<form id="privacy_policy_formform" action="upload" method="post" enctype="multipart/form-data">
									<div class="col-md-3">		
										<input type="file" id="privacy_policy_form_file" name="privacy_policy_form_file">
									</div>	
									<div class="col-md-9">
										<button type="submit" id="btn-save-privacy_policy_form" name="btn-save-privacy_policy_form" class="btn btn-primary">Upload</button>
									</div>
								</form>
							</div>										
						</div>
					</div>				  
                </div>	
            </div>

        </div>
    </div><!-- End Recent Sales -->

  </main><!-- End #main -->
  
<!-- page script -->
<script>
    $(document).ready(function(){
        $('#privacy_policy_fullform').submit(function(e){
            e.preventDefault(); 
                $.ajax({
                    url:'<?php echo base_url();?>index.php/config/upload_privacy_policy_full',
                    type:"post",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
						if(data=='อัพโหลดไฟล์เรียบร้อยแล้ว'){
							window.location.href = '<?php echo base_url();?>Admin/PrivacyPolicy';			
							//document.getElementById("logoimage").src='<?php echo base_url(); ?>assets/img/uploads/logo.png?time=' + new Date();
							//$("#logofile").val('');
						}else{
							window.location.href = '<?php echo base_url();?>Admin/PrivacyPolicy';		
							//$("#logofile").val('');
						}
					}
                });
            });		
			
        $('#privacy_policy_formform').submit(function(e){
            e.preventDefault(); 
                $.ajax({
                    url:'<?php echo base_url();?>index.php/config/upload_privacy_policy_form',
                    type:"post",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
						if(data=='อัพโหลดไฟล์เรียบร้อยแล้ว'){
							window.location.href = '<?php echo base_url();?>Admin/PrivacyPolicy';			
							//document.getElementById("logoimage").src='<?php echo base_url(); ?>assets/img/uploads/logo.png?time=' + new Date();
							//$("#logofile").val('');
						}else{
							window.location.href = '<?php echo base_url();?>Admin/PrivacyPolicy';		
							//$("#logofile").val('');
						}
					}
                });
            });	
			
    });		

    $('#btn-save-privacy_policy').click(function() {
        $("#privacy_policyform").attr("action", "<?php echo base_url(); ?>index.php/config/update");
        $.post($("#privacy_policyform").attr("action"), $("#privacy_policyform :input").serializeArray(), function(info) {
			if(info=='บันทึกข้อมูลเรียบร้อยแล้ว'){
				window.location.href = '<?php echo base_url();?>Admin/PrivacyPolicy';		
			}else{
				window.location.href = '<?php echo base_url();?>Admin/PrivacyPolicy';		
				//$("#btn-save-organize_name_thai").notify(info, {position: "left midden", className: "error"});			
			}
        });
    });
	
</script>  

