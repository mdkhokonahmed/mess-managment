<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main">

  <!-- Header -->

 <header class="w3-container" style="padding-top:22px">
     <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding w3-pink">Single-Mile</button>
     <a href="<?php echo base_url();?>Mile/milelist" class="w3-bar-item w3-button w3-padding w3-pink">Refresh</a>
         <?php 
          $msg = $this->session->flashdata('msg');
           if (isset($msg)) {
            echo $msg;
           }
         ?>
      <div class="w3-right">
    <form action="<?php echo base_url();?>Mile/singlemilemember" method="post">
    <input type="text" name="curenstdate" placeholder="Place Start Current Date" id="datepicker-8">
    <input type="text" name="enddates" placeholder="Place End Current Date" id="datepicker-7">
    <input type="submit" name="btn" value="Search">
  </form>
  </div>

  <div id="id01" class="w3-modal w3-animate-zoom">
    <div class="w3-modal-content">
      <header class="w3-container w3-pink"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
      </header>
      <div class="w3-container">
          <form class="w3-container w3-card-4" action="<?php echo base_url();?>Mile/save_single_mile" method="post"> 
          <p>    
          <input type="hidden" name="mile" value="<?php echo $totalparmile->mile;?>"> 
        <label class="w3-text-red"><b>Full Name</b></label>
        <input class="w3-input w3-border" name="milefullnmae" type="text" value="<?php echo $totalparmile->milefullnmae;?>" readonly=""></p>
          <p>     
        <label class="w3-text-red"><b>Date</b></label>
        <input class="w3-input w3-border" name="miledate" type="text" placeholder="Month/date/Year" id="datepicker-9"></p>
        <p>     
        <label class="w3-text-red"><b>Mile</b></label>
        <input class="w3-input w3-border" name="parmile" type="text" placeholder="Enter The Parmile"></p>
        <p>
        <input class="w3-btn w3-blue" type="reset" name="Cln" value="Clncel">
        <input class="w3-btn w3-pink" type="submit" name="submit" value="Save">
        </p>
      </form>
      </div>
    </div>
  </div>
  </header>

  <table class="w3-table-all">
    <thead>
      <tr class="w3-blue">
        <th>Sl</th>
        <th>Date</th>
        <th>Full Name</th>
        <th>Mile</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php 
        $count=1;
       $totalmile = 0;
       foreach ($singleparmilebyid as $result){
        $totalmile = $result->parmile + $totalmile;
     ?>
    <tr>
     <td><?php echo $count++;?></td>
    <td><?php echo $result->miledate;?></td>
    <td><?php echo $result->milefullnmae;?></td>
    <td><?php echo $result->parmile;?></td>
    <td>
    <a href="<?php echo base_url();?>Mile/EditSingle/<?php echo $result->single_mileid;?>">Edit</a>
    <a onclick="return confirm('Are You Sure To Delete')" href="<?php echo base_url();?>Mile/deleted_single/<?php echo $result->single_mileid;?>">Delete</a>
    </td>
    </tr>
    <?php }  ?>
     </tbody>

      <tr>
        <th colspan="3" class="w3-center">Par Mile=</th>
        <th><?php echo $totalmile;?></th>
      </tr>
      
  </table>