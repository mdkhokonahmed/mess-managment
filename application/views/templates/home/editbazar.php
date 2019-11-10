<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main">

  <!-- Header -->

 <header class="w3-container" style="padding-top:22px">
     <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding w3-pink">Update-Bazar</button>
     <a href="<?php echo base_url();?>Bazar/memberbazarlist" class="w3-bar-item w3-button w3-padding w3-pink">Refresh</a>
     <a href="<?php echo base_url();?>Bazar/allbazarlist" class="w3-bar-item w3-button w3-padding w3-pink">All-Bazar</a>
         <?php 
          $msg = $this->session->flashdata('msg');
           if (isset($msg)) {
            echo $msg;
           }
         ?>
  <div id="id01" class="w3-modal w3-animate-zoom">
    <div class="w3-modal-content">
      <header class="w3-container w3-pink"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
      </header>
      <div class="w3-container">
          <form class="w3-container w3-card-4" action="<?php echo base_url();?>Bazar/update_member_bazar" method="post"> 
          <p>     
        <label class="w3-text-red"><b>Full Name</b></label>
        <input type="hidden" name="membzrid" value="<?php echo $memberbyid->membzrid;?>">
        <input class="w3-input w3-border" name="fullname" type="text" value="<?php echo $memberbyid->fullname;?>"></p>
        
        <p>
        <input class="w3-btn w3-blue" type="reset" name="Cln" value="Clncel">
        <input class="w3-btn w3-pink" type="submit" name="submit" value="Update">
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
        <th>Full Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php 
        $count=1;
       
       foreach ($showallbazars as $result){
        
     ?>
    <tr>
     <td><?php echo $count++;?></td>
      <td>
      <?php echo $result->fullname;?>
       <br>
       <a href="<?php echo base_url();?>Bazar/singlebazarlist/<?php echo $result->membzrid;?>">View</a> 
      </td>
    </tr>
    <?php }  ?>
     </tbody>
      
  </table>