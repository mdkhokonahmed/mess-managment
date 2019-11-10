<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin-Login</title>
	 <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/w3main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/main.css">
</head>
<body>

  <div class="login-form">
    <div class="w3-row">
   		
   		<div class="w3-col s6">
   		<div class="w3-red w3-center">
		  <h1 class="w3-opacity">
		  <b>Place Login</b></h1>
		 
		</div>
	
   <form id="order_form" class="w3-container" action="<?php echo base_url();?>Admin/dashboard" method="post">
	  <p>      
	  <label class="w3-text-red"><b>Email</b></label>
	  <input class="w3-input w3-border" name="email" type="email" placeholder="Enter Your Email Address">
		
	  </p>
	  <p>      
	  <label class="w3-text-red"><b>password</b></label>
	  <input class="w3-input w3-border" name="password" type="password" placeholder="Enter Your Password">
		
	  </p>
	  <p>      
	  <input type="submit" name="submit" value="Login" class="w3-button w3-red" ></p>
	</form>
	  <div class="w3-blue w3-center">
		  <h4 class="w3-opacity">
		  <b>Open Source mess version(3.1.6)</b></h4>
		 
		</div>
   		</div>
   </div>
  	 <?php
        $msg = $this->session->userdata('msg');
        if (isset($msg)) {
            echo $msg;
          $this->session->unset_userdata('msg'); 
        }
     ?>
	 </div>

	 
	   
</body>
</html>
