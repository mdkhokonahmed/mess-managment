<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main">

  <!-- Header -->

 <header class="w3-container" style="padding-top:22px">
     <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding w3-pink">Update-Single-Bazar</button>
     <a href="<?php echo base_url();?>Bazar/memberbazarlist" class="w3-bar-item w3-button w3-padding w3-pink">Refresh</a>
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
          <form class="w3-container w3-card-4" action="<?php echo base_url();?>Bazar/updated_single_bazar" method="post"> 
          <p>     
        <label class="w3-text-red"><b>Full Name</b></label>
         <input type="hidden" name="singid" value="<?php echo $singbyId->singid;?>">
        <input type="hidden" name="membzrid" value="<?php echo $singbyId->membzrid;?>">
        <input class="w3-input w3-border" name="fullname" type="text" value="<?php echo $singbyId->fullname;?>" readonly=""></p>
        <label class="w3-text-red"><b>Date</b></label>
        <input class="w3-input w3-border" name="curdate" type="text" value="<?php echo $singbyId->curdate;?>" id="datepicker-8"></p>

        <label class="w3-text-red"><b>Total TK</b></label>
        <input class="w3-input w3-border" name="totaltk" type="number" value="<?php echo $singbyId->totaltk;?>"></p>

        <label class="w3-text-red"><b>Total Mill</b></label>
        <input class="w3-input w3-border" name="totalmill" type="number" value="<?php echo $singbyId->totalmill;?>"></p>
        
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
        <th>Date</th>
        <th>Full Name</th>
        <th>Total Tk</th>
        <th>Total Mill</th>
        <th>Mill Rate</th>
      </tr>
    </thead>
    <tbody>
     <?php 
        $count=1;
        $total = 0;
        $totalmill = 0;
       $millrate = NULL;
       foreach ($showallbazarlists as $result){
        $total = $result->totaltk + $total;
        $totalmill = $result->totalmill + $totalmill;
        $millrate = $total / $totalmill;
     ?>
    <tr>

    <td><?php echo $count++;?></td>
    <td><?php echo $result->curdate;?></td>
    <td><?php echo $result->fullname;?></td>
    <td><?php echo $result->totaltk;?></td>
    <td><?php echo $result->totalmill;?></td>
    <td><?php echo $millrate;?></td>
    </tr>
    <?php }  ?>
     </tbody>
      <tr>
       <th colspan="3" class="w3-center">Total Tk= </th>
        <th><?php echo $total;?></th>
      <th>Mill= <?php echo $totalmill;?></th>
      </tr>
  </table>

 