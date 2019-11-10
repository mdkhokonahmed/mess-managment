<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<title><?php echo $title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url();?>asset/w3main.css">
<link href="<?php echo base_url();?>asset/jquery.css" rel="stylesheet">
<script src = "<?php echo base_url();?>asset/js/jquery.js"></script>
<script src = "<?php echo base_url();?>asset/js/jqueryui.js"></script>
  <script>
         $(function() {
            $( "#datepicker-8" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: false
            });
            $( "#datepicker-9" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: true
            });
            $( "#datepicker-7" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: true
            });
         });
      </script>
<body>

  <div class="w3-bar w3-red">
    <a href="<?php echo base_url();?>SupperAdmin/index" class="w3-bar-item w3-button">Home</a>
    <div class="w3-dropdown-hover">
      <button class="w3-button">Member</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="<?php echo base_url();?>Messmember/memberlist" class="w3-bar-item w3-button">Memberlist</a>
      </div>
    </div>

    <div class="w3-dropdown-hover">
      <button class="w3-button">Bazar</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="<?php echo base_url();?>Bazar/memberbazarlist" class="w3-bar-item w3-button">Bazarlist</a>
      </div>
    </div>
     <div class="w3-dropdown-hover">
      <button class="w3-button">Mill</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="<?php echo base_url();?>Mile/milelist" class="w3-bar-item w3-button">Milelist</a>
      </div>
    </div>
     <div class="w3-dropdown-hover">
      <button class="w3-button">House Rant</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="<?php echo base_url();?>Houserant/houserantelist" class="w3-bar-item w3-button">Bazarlist</a>
      </div>
    </div>
     <div class="w3-dropdown-hover">
      <button class="w3-button">Member Rant</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="<?php echo base_url();?>Memberrant/memberrantlist" class="w3-bar-item w3-button">Member Rant</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button">Logout</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="<?php echo base_url();?>SupperAdmin/logout" class="w3-bar-item w3-button">Logout</a>
      </div>
    </div>
  </div>
    
</body>
</html>
