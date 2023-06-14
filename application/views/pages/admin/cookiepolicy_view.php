  <main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-12">
                <h1>กำหนดนโยบายคุกกี้ (Cookie Policy)</h1>
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
                  <label for="inputText" class="col-sm-2 col-form-label">รายละเอียด :</label>
                  <div class="col-sm-8">
					<form id="cookie_policyform" action="config/update" method="post">
						<div class="col-sm-12">
							<input id="x" name="x" type="hidden" class="form-control" value="cookie_policy">		
							<textarea  id="y" name="y"  class="form-control" style="height: 500px"><?= $cookie_policy ?></textarea>								
						</div>	
					</form>	
                  </div>
                  <div class="col-sm-2">
					<button type="submit" id="btn-save-cookie_policy" name="btn-save-cookie_policy" class="btn btn-primary">บันทึก</button>
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

    $('#btn-save-cookie_policy').click(function() {
        $("#cookie_policyform").attr("action", "<?php echo base_url(); ?>index.php/config/update");
        $.post($("#cookie_policyform").attr("action"), $("#cookie_policyform :input").serializeArray(), function(info) {
			if(info=='บันทึกข้อมูลเรียบร้อยแล้ว'){
				window.location.href = '<?php echo base_url();?>Admin/CookiePolicy';		
			}else{
				window.location.href = '<?php echo base_url();?>Admin/CookiePolicy';		
				//$("#btn-save-organize_name_thai").notify(info, {position: "left midden", className: "error"});			
			}
        });
    });
	
</script>  