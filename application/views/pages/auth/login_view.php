<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Sarabun' rel='stylesheet'>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">      
  
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">  
  
    <title>SandBox Education</title>

</head>

<style>
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
    }
    .h-custom {
    height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
    .h-custom {
    height: 100%;
    }
    }
</style>

<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
		<center>
        <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" width="60%" height="60%">
		</center>
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

		<form action="<?php echo base_url(); ?>index.php/login" id="logForm" method="post" class="row g-3 needs-validation">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">บัญชีผู้ใช้งาน</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="username" autocomplete="off" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">รหัสผ่าน</label>
                      <input type="password" name="password" class="form-control" id="password" autocomplete="off" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
						<div class="row">
					  <div class="col-6">
						  <div class="form-check">
							<input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
							<label class="form-check-label" for="rememberMe">Remember me</label>
						  </div>
                      </div>
					  <div class="col-6">
							<label class="form-label" for="rememberMe"><a href="#!" class="text-body">ลืมรหัสผ่าน</a></label>
                      </div>					  
						</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit"  name="submit">ลงชื่อใช้งาน</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">ยังไม่เป็นสมาชิก ? <a href="pages-register.html">ลงทะเบียนสมาชิก</a></p>
                    </div>
                        <?php if (isset($show_error) && $show_error == true) { ?>
                            <br>
                            <div class="alert alert-danger alert-dismissable">
                                <i class="icon fa fa-warning"></i> บัญชีผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง!
                            </div>
                        <?php } ?>					
                  </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2023. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</section>
</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>