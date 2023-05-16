  <main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-6">
                <h1>กำหนดข้อมูลพื้นฐานระบบ</h1>
                <nav>
                    <ol class="breadcrumb">
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- End Page Title -->
    <?php if (!empty($_SESSION['success'])) { ?>
        <script>
            setTimeout(function() {
                document.getElementById('myAlert').remove();
            }, 2000); // นับถอยหลังให้แสดง 5 วินาที (5000 มิลลิวินาที)
        </script>
        <div style="position: relative;">
            <div class="alert alert-success" id="myAlert" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1;">
                <strong>
                    <?php
                    echo '<i class="bi bi-clipboard2-check"></i> ' . $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </strong>

            </div>
        </div>
    <?php } ?>
    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title"></h5>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อหน่วยงาน (ไทย) :</label>
                  <div class="col-sm-8">
					<form id="organize_name_thaiform" action="config/update" method="post">
						<div class="col-sm-12">
							<input id="x" name="x" type="hidden" class="form-control" value="organize_name_thai">								
							<input id="y" name="y" type="text" class="form-control" value="<?= $organize_name_thai ?>" required>								
						</div>	
					</form>	
                  </div>
                  <div class="col-sm-2">
					<button type="submit" id="btn-save-organize_name_thai" name="btn-save-organize_name_thai" class="btn btn-primary">บันทึก</button>
                  </div>				  
                </div>			  
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ชื่อหน่วยงาน (Eng) :</label>
                  <div class="col-sm-8">
					<form id="organize_name_engform" action="config/update" method="post">
						<div class="col-sm-12">
							<input id="x" name="x" type="hidden" class="form-control" value="organize_name_eng">								
							<input id="y" name="y" type="text" class="form-control" value="<?= $organize_name_eng ?>" required>								
						</div>	
					</form>	
                  </div>
                  <div class="col-sm-2">
					<button type="submit" id="btn-save-organize_name_eng" name="btn-save-organize_name_eng" class="btn btn-primary">บันทึก</button>
                  </div>				  
                </div>			  
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">โลโก้  :</label>
					<div class="col-md-10">
						<div class="form-group">
							<div class="row logo d-flex align-items-center">
								<img id="logoimage" src="<?php echo base_url(); ?>assets/img/uploads/logo.png" width="300px" height="125px">
							</div>
							<div class="row">
								<form id="logoform" action="upload" method="post" enctype="multipart/form-data">
									<div class="col-md-3">		
										<input type="file" id="logofile" name="logofile">
									</div>	
									<div class="col-md-9">
										<button type="submit" id="btn-save-upload" name="btn-save-upload" class="btn btn-primary">Upload</button>
									</div>
								</form>
							</div>										
						</div>
					</div>				  
                </div>			  
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ข้อมูลส่วน footer :</label>
                  <div class="col-sm-8">
					<form id="system_footerform" action="config/update" method="post">
						<div class="col-sm-12">
							<input id="x" name="x" type="hidden" class="form-control" value="system_footer">								
							<input id="y" name="y" type="text" class="form-control" value="<?= $system_footer ?>" required>								
						</div>	
					</form>	
                  </div>
                  <div class="col-sm-2">
					<button type="submit" id="btn-save-system_footer" name="btn-save-system_footer" class="btn btn-primary">บันทึก</button>
                  </div>				  
                </div>

            </div>

        </div>
    </div><!-- End Recent Sales -->

  </main><!-- End #main -->
  
<!-- page script -->
<script>
    $(document).ready(function(){
        $('#logoform').submit(function(e){
            e.preventDefault(); 
                $.ajax({
                    url:'<?php echo base_url();?>index.php/config/upload',
                    type:"post",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
						if(data=='อัพโหลดไฟล์เรียบร้อยแล้ว'){
							window.location.href = '<?php echo base_url();?>Admin/ConfigSystem';			
							//document.getElementById("logoimage").src='<?php echo base_url(); ?>assets/img/uploads/logo.png?time=' + new Date();
							//$("#logofile").val('');
						}else{
							window.location.href = '<?php echo base_url();?>Admin/ConfigSystem';		
							//$("#logofile").val('');
						}
					}
                });
            });		
    });	

    $('#btn-save-organize_name_thai').click(function() {
        $("#organize_name_thaiform").attr("action", "<?php echo base_url(); ?>index.php/config/update");
        $.post($("#organize_name_thaiform").attr("action"), $("#organize_name_thaiform :input").serializeArray(), function(info) {
			if(info=='บันทึกข้อมูลเรียบร้อยแล้ว'){
				window.location.href = '<?php echo base_url();?>Admin/ConfigSystem';		
			}else{
				window.location.href = '<?php echo base_url();?>Admin/ConfigSystem';		
				//$("#btn-save-organize_name_thai").notify(info, {position: "left midden", className: "error"});			
			}
        });
    });
	
    $('#btn-save-organize_name_eng').click(function() {
        $("#organize_name_engform").attr("action", "<?php echo base_url(); ?>index.php/config/update");
        $.post($("#organize_name_engform").attr("action"), $("#organize_name_engform :input").serializeArray(), function(info) {
			if(info=='บันทึกข้อมูลเรียบร้อยแล้ว'){
				window.location.href = '<?php echo base_url();?>Admin/ConfigSystem';		
			}else{
				window.location.href = '<?php echo base_url();?>Admin/ConfigSystem';		
				//$("#btn-save-organize_name_eng").notify(info, {position: "left midden", className: "error"});			
			}
        });
    });	

    $('#btn-save-system_footer').click(function() {
        $("#system_footerform").attr("action", "<?php echo base_url(); ?>index.php/config/update");
        $.post($("#system_footerform").attr("action"), $("#system_footerform :input").serializeArray(), function(info) {
			if(info=='บันทึกข้อมูลเรียบร้อยแล้ว'){
				window.location.href = '<?php echo base_url();?>Admin/ConfigSystem';		
			}else{
				window.location.href = '<?php echo base_url();?>Admin/ConfigSystem';		
				//$("#btn-save-system_footer").notify(info, {position: "left midden", className: "error"});			
			}
        });
    });

	
</script>  