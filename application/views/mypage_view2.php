<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	
</head>
<body>

<h1 class="text-danger">mypage 2</h1>
<a href="<?php echo site_url('hello/index2') ?>">to hello fn index2</a>
<?php echo br(3); ?>
<a href="<?php echo site_url('Welcome') ?>">to wellcome</a>
<?php echo br(3); ?>
<a href="<?php echo site_url('Mypage') ?>">to Mypage</a>
<?php echo br(3); ?>
<a href="<?php echo site_url('Mypage/page2') ?>">to Mypage2</a>
<?php echo br(2); ?>
<img src="<?php echo base_url('img'); ?>/12.jpg" alt="" width="300px">
</body>
</body>
</html>