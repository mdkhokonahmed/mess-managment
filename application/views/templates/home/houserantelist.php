<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main">

  <!-- Header -->

 <header class="w3-container" style="padding-top:22px">
     <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding w3-pink">House-Rant</button>
     <a href="<?php echo base_url();?>Houserant/houserantelist" class="w3-bar-item w3-button w3-padding w3-pink">Refresh</a>
         <?php 
          $msg = $this->session->flashdata('msg');
           if (isset($msg)) {
            echo $msg;
           }
         ?>
        <div class="w3-right">
    <form action="<?php echo base_url();?>Houserant/houserantsearch" method="post">
    <input type="text" name="curentdate" placeholder="Place Current Date" id="datepicker-8">
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
          <form class="w3-container w3-card-4" action="<?php echo base_url();?>Houserant/save_house_rant" method="post">
           <p>     
        <label class="w3-text-red"><b>Current Date</b></label>
        <input class="w3-input w3-border" name="curdates" type="text" placeholder="House Current Date" id="datepicker-7"></p> 
          <p>     
        <label class="w3-text-red"><b>House Rant Tk</b></label>
        <input class="w3-input w3-border" name="houserantetk" type="text" placeholder="House Rant Taka"></p>
        <label class="w3-text-red"><b>B.Sallary</b></label>
        <input class="w3-input w3-border" name="bsallary" type="text" placeholder="Enter The Sallary"></p>

        <label class="w3-text-red"><b>Net Bill Tk</b></label>
        <input class="w3-input w3-border" name="netbill" type="number" placeholder="Enter The Net Bill Amount"></p>

        <label class="w3-text-red"><b>Dis Bill Tk</b></label>
        <input class="w3-input w3-border" name="disbill" type="number" placeholder="Enter The Dis Bill Tk"></p>
        <label class="w3-text-red"><b>Total Member</b></label>
        <input class="w3-input w3-border" name="totalmember" type="number" placeholder="Enter The Total Member"></p>
        
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
        <th>House Rant Tk</th>
        <th>B.Sallary</th>
        <th>Net Bill Tk</th>
        <th>Dis Bill Tk</th>
        <th>Total Member</th>
        <th>Total Taka</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php 
        $count=1;
       $housetotaltk = 0;
       $bsallary = 0;
       $netbill = 0;
       $disbill = 0;
       $totlpermatha = NULL;
       $permatha = NULL;
       $sum = NULL;
       foreach ($houserantes as $result){
       $housetotaltk =  $result->houserantetk+$housetotaltk;
       $bsallary = $result->bsallary + $bsallary;
       $netbill = $result->netbill + $netbill;
       $disbill = $result->disbill + $disbill;
       $sum = $housetotaltk+$bsallary+$netbill+$disbill;
       $totlpermatha = $result->totalmember;
       $permatha = $sum / $totlpermatha;
     ?>
    <tr>
     <td><?php echo $count++;?></td>
     <td><?php echo  $result->curdates;?></td>
     <td><?php echo $result->houserantetk;?></td>
     <td><?php echo $result->bsallary;?></td>
     <td><?php echo $result->netbill;?></td>
     <td><?php echo $result->disbill;?></td>
     <td><?php echo $result->totalmember;?></td>
     <td><?php echo $sum;?></td>
    <td>
    <a href="<?php echo base_url();?>Houserant/edithouserant/<?php echo $result->houseid;?>">Edit</a>
    <a onclick="return confirm('Are You Sure To Delete')" href="<?php echo base_url();?>Houserant/deleted_houserant/<?php echo $result->houseid;?>">Delete</a>
    </td>
    </tr>
    <?php }  ?>
     </tbody>
      <tr>
        <th>Total House Rant=</th>
        <th><?php echo  $sum;?></th>
        <th>Per Head Tk=</th>
        <th><?php echo $permatha;?></th>
      </tr>
  </table>