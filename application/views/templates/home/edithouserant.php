<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main">

  <!-- Header -->

 <header class="w3-container" style="padding-top:22px">
     <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding w3-pink">Update-House-Rant</button>
     <a href="<?php echo base_url();?>Houserant/houserantelist" class="w3-bar-item w3-button w3-padding w3-pink">Refresh</a>
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
          <form class="w3-container w3-card-4" action="<?php echo base_url();?>Houserant/update_house_rant" method="post"> 
          <p>     
        <label class="w3-text-red"><b>House Rant Tk</b></label>
        <input type="hidden" name="houseid" value="<?php echo $houseids->houseid;?>">
        <input class="w3-input w3-border" name="houserantetk" type="text" value="<?php echo $houseids->houserantetk;?>"></p>
        <label class="w3-text-red"><b>B.Sallary</b></label>
        <input class="w3-input w3-border" name="bsallary" type="text" value="<?php echo $houseids->bsallary;?>"></p>

        <label class="w3-text-red"><b>Net Bill Tk</b></label>
        <input class="w3-input w3-border" name="netbill" type="number" value="<?php echo $houseids->netbill;?>"></p>

        <label class="w3-text-red"><b>Dis Bill Tk</b></label>
        <input class="w3-input w3-border" name="disbill" type="number" value="<?php echo $houseids->disbill;?>"></p>
        <label class="w3-text-red"><b>Total Member</b></label>
        <input class="w3-input w3-border" name="totalmember" type="number" value="<?php echo $houseids->totalmember;?>"></p>
        
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
        <th>House Rant Tk</th>
        <th>B.Sallary</th>
        <th>Net Bill Tk</th>
        <th>Dis Bill Tk</th>
        <th>Total Member</th>
        <th>Total Taka</th>
       
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
     <td><?php echo $result->houserantetk;?></td>
     <td><?php echo $result->bsallary;?></td>
     <td><?php echo $result->netbill;?></td>
     <td><?php echo $result->disbill;?></td>
     <td><?php echo $result->totalmember;?></td>
     <td></td>
    
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