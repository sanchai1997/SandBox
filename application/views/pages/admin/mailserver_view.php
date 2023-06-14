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

    <!-- Recent Sales -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title"></h5>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Mail Server :</label>
                  <div class="col-sm-8">
					<form id="mail_serverform" action="config/update" method="post">
						<div class="col-sm-12">
							<input id="x" name="x" type="hidden" class="form-control" value="mail_server">								
							<input id="y" name="y" type="text" class="form-control" value="<?= $mail_server ?>" required>								
						</div>	
					</form>	
                  </div>
                  <div class="col-sm-2">
					<button type="submit" id="btn-save-mail_server" name="btn-save-mail_server" class="btn btn-primary">บันทึก</button>
                  </div>				  
                </div>			  
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Port :</label>
                  <div class="col-sm-8">
					<form id="mail_portform" action="config/update" method="post">
						<div class="col-sm-12">
							<input id="x" name="x" type="hidden" class="form-control" value="mail_port">								
							<input id="y" name="y" type="text" class="form-control" value="<?= $mail_port ?>" required>								
						</div>	
					</form>	
                  </div>
                  <div class="col-sm-2">
					<button type="submit" id="btn-save-mail_port" name="btn-save-mail_port" class="btn btn-primary">บันทึก</button>
                  </div>				  
                </div>			  
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">User name :</label>
                  <div class="col-sm-8">
					<form id="mail_usernameform" action="config/update" method="post">
						<div class="col-sm-12">
							<input id="x" name="x" type="hidden" class="form-control" value="mail_username">								
							<input id="y" name="y" type="text" class="form-control" value="<?= $mail_username ?>" required>								
						</div>	
					</form>	
                  </div>
                  <div class="col-sm-2">
					<button type="submit" id="btn-save-mail_username" name="btn-save-mail_username" class="btn btn-primary">บันทึก</button>
                  </div>				  
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Password :</label>
                  <div class="col-sm-8">
					<form id="mail_passwordform" action="config/update" method="post">
						<div class="col-sm-12">
							<input id="x" name="x" type="hidden" class="form-control" value="mail_password">								
							<input id="y" name="y" type="text" class="form-control" value="<?= $mail_password ?>" required>								
						</div>	
					</form>	
                  </div>
                  <div class="col-sm-2">
					<button type="submit" id="btn-save-mail_password" name="btn-save-mail_password" class="btn btn-primary">บันทึก</button>
                  </div>				  
                </div>

            </div>

        </div>
    </div><!-- End Recent Sales -->

  </main><!-- End #main -->
  
<!-- page script -->
<script>
    $(document).ready(function(){
		
    });	

    $('#btn-save-mail_server').click(function() {
        $("#mail_serverform").attr("action", "<?php echo base_url(); ?>index.php/config/update");
        $.post($("#mail_serverform").attr("action"), $("#mail_serverform :input").serializeArray(), function(info) {
			if(info=='บันทึกข้อมูลเรียบร้อยแล้ว'){
				window.location.href = '<?php echo base_url();?>Admin/MailServer';		
			}else{
				window.location.href = '<?php echo base_url();?>Admin/MailServer';		
				//$("#btn-save-organize_name_thai").notify(info, {position: "left midden", className: "error"});			
			}
        });
    });
	
    $('#btn-save-mail_port').click(function() {
        $("#mail_portform").attr("action", "<?php echo base_url(); ?>index.php/config/update");
        $.post($("#mail_portform").attr("action"), $("#mail_portform :input").serializeArray(), function(info) {
			if(info=='บันทึกข้อมูลเรียบร้อยแล้ว'){
				window.location.href = '<?php echo base_url();?>Admin/MailServer';		
			}else{
				window.location.href = '<?php echo base_url();?>Admin/MailServer';		
				//$("#btn-save-organize_name_eng").notify(info, {position: "left midden", className: "error"});			
			}
        });
    });	

    $('#btn-save-mail_username').click(function() {
        $("#mail_usernameform").attr("action", "<?php echo base_url(); ?>index.php/config/update");
        $.post($("#mail_usernameform").attr("action"), $("#mail_usernameform :input").serializeArray(), function(info) {
			if(info=='บันทึกข้อมูลเรียบร้อยแล้ว'){
				window.location.href = '<?php echo base_url();?>Admin/MailServer';		
			}else{
				window.location.href = '<?php echo base_url();?>Admin/MailServer';		
				//$("#btn-save-system_footer").notify(info, {position: "left midden", className: "error"});			
			}
        });
    });

    $('#btn-save-mail_password').click(function() {
        $("#mail_passwordform").attr("action", "<?php echo base_url(); ?>index.php/config/update");
        $.post($("#mail_passwordform").attr("action"), $("#mail_passwordform :input").serializeArray(), function(info) {
			if(info=='บันทึกข้อมูลเรียบร้อยแล้ว'){
				window.location.href = '<?php echo base_url();?>Admin/MailServer';		
			}else{
				window.location.href = '<?php echo base_url();?>Admin/MailServer';		
				//$("#btn-save-system_footer").notify(info, {position: "left midden", className: "error"});			
			}
        });
    });
	
</script>  