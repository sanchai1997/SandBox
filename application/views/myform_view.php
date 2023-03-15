<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>form</title>

	
</head>
<body>

<form action="<?php echo site_url('form/showform'); ?>" method="post">
    name : <input type="text" name="name" required placeholder="name">
    <br>
    lname : <input type="text" name="lname" required placeholder="lname">
    <br>
    <button type="submit">save</button>

</form>

</body>
</html>