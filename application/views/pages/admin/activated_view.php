  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-3">
        </div>		
        <div class="col-lg-6">
          <div class="row">
			<div class="card recent-sales overflow-auto">
				<div class="card-body">
				<h4 class="card-title"></h4>
					<div class="row mb-3">	
						<?=$message?>
					</div>			  
				</div>
			</div>
          </div>
        </div>
        <div class="col-lg-3">
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  
<!-- page script -->
<script>
    $(document).ready(function(){
		$('body').toggleClass("toggle-sidebar");
		
		$('#btn-next').click(function () {
			window.location.href = '<?php echo base_url();?>Main';									
		})
		
    });	
	
</script>  