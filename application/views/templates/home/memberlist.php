<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main">

  <!-- Header -->
 <header class="w3-container" style="padding-top:22px">
     <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding w3-pink">Add-Member</button>
     <a href="<?php echo base_url();?>Messmember/memberlist" class="w3-bar-item w3-button w3-padding w3-pink">Refresh</a>
      

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
          
          <form class="w3-container w3-card-4" action="<?php echo base_url();?>Messmember/save_member" method="post"> 
          <p>     
        <label class="w3-text-red"><b>First Name</b></label>
        <input class="w3-input w3-border" name="firstName" type="text" placeholder="Enter The First Name" value="<?php echo set_value('firstName'); ?>"> </p>

           <span style="color:blue">
          <?php echo form_error('firstName'); ?>
        </span>
       
        <p>      
        <label class="w3-text-red"><b>Last Name</b></label>
        <input class="w3-input w3-border" name="lastName" type="text" placeholder="Enter The Last Name" value="<?php echo set_value('lastName'); ?>"></p>

         <span style="color:blue">
          <?php echo form_error('lastName'); ?>
        </span>
        <p>      
        <label class="w3-text-red"><b>Email</b></label>
        <input class="w3-input w3-border" name="email" type="text" placeholder="Enter The Email"value="<?php echo set_value('email'); ?>"></p>
        <span style="color:blue">
          <?php echo form_error('email'); ?>
        </span>
        <p>      
        <label class="w3-text-red"><b>Cell</b></label>
        <input class="w3-input w3-border" name="cellNumber" type="number" placeholder="Enter The Cell Number" value="<?php echo set_value('cellNumber'); ?>"></p>
        <span style="color:blue">
          <?php echo form_error('cellNumber'); ?>
        </span>
         <p>      
        <label class="w3-text-red"><b>Address</b></label>
        <textarea class="w3-input w3-border" name="address"><?php echo set_value('address'); ?></textarea>
        </p>
        <span style="color:blue">
          <?php echo form_error('address'); ?>
        </span>
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
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Cell</th>
        <th>Address</th>
       
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php 
        $count=1;
       
       foreach ($showmembers as $result){
        
     ?>
    <tr>
     <td><?php echo $count++;?></td>
      <td><?php echo $result->firstName;?></td>
      <td><?php echo $result->lastName;?></td>
      <td><?php echo $result->email;?></td>
      <td><?php echo $result->cellNumber;?></td>
      <td><?php echo $result->address;?></td>
      
      <td><a href="<?php echo base_url();?>Messmember/editmember/<?php echo $result->memberid;?>">Edit</a>
      <a onclick="return confirm('Are You Sure To Delete')" href="<?php echo base_url();?>Messmember/deleted/<?php echo $result->memberid;?>">Delete</a></td>
    </tr>
    <?php }  ?>
     </tbody>
      
  </table>

  
  