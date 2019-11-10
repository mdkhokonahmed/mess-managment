<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main">

  <!-- Header -->

 <header class="w3-container" style="padding-top:22px">
     <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding w3-pink">Member-Rant</button>
     <a href="<?php echo base_url();?>Memberrant/memberrantlist" class="w3-bar-item w3-button w3-padding w3-pink">Refresh</a>
         <?php 
          $msg = $this->session->flashdata('msg');
           if (isset($msg)) {
            echo $msg;
           }
         ?>
        <div class="w3-right">
    <form action="<?php echo base_url();?>Memberrant/memberrantsearch" method="post">
    <input type="text" name="curentdate" placeholder="Place Current Date" id="datepicker-8">
    <select name="memberrantser" style="height: 28px">
      <option>Select Name</option>
       <?php foreach ($memberrantlist as $showdata) { ?>
      <option value="<?php echo $showdata->memrantid;?>"><?php echo $showdata->fullname;?></option>
      <?php } ?>
    </select>
    <input type="submit" name="btn" value="Search">
  </form>

  <div id="id01" class="w3-modal w3-animate-zoom">
    <div class="w3-modal-content">
      <header class="w3-container w3-pink"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
      </header>
      <div class="w3-container">
          <form class="w3-container w3-card-4" action="<?php echo base_url();?>Memberrant/save_memberrant" method="post">
          <p>     
        <label class="w3-text-red"><b>Curent Date</b></label>
        <input class="w3-input w3-border" name="curmbrdate" type="text" placeholder="MM/DD/Year" id="datepicker-7"></p>
        <p> 
          <p>     
        <label class="w3-text-red"><b>Full Name</b></label>
        <input class="w3-input w3-border" name="fullname" type="text" placeholder="Enter Your Name"></p>
        <p>
        <label class="w3-text-red"><b>Member House Rant</b></label>
        <input class="w3-input w3-border" name="memberhouserant" type="text" placeholder="Enter The House Rant Amount"></p>
        <p>
        <label class="w3-text-red"><b>Member Bazar Amount</b></label>
        <input class="w3-input w3-border" name="memberbazartk" type="text" placeholder="Enter The Bazar Amount"></p>
        <p>
        <label class="w3-text-red"><b>Member Mile</b></label>
        <input class="w3-input w3-border" name="membermile" type="text" placeholder="Enter The Total Mill"></p>
        <p>
        <label class="w3-text-red"><b>Mile Rate</b></label>
        <input class="w3-input w3-border" name="milerate" type="text" placeholder="Enter The Total Mill"></p>
        
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
        <th>Name</th>
        <th>Member House Rant</th>
        <th>Member Bazar Tk</th>
        <th>Member Mill</th>
        <th>Mile Rate</th>
        <th>Total Mile Cost</th>
        <th>DR/CR</th>
        <th>Total Rant</th>
        <th>Action</th>
      </tr>
    </thead>
<tbody>
     <?php 
        $count=1;
        $milecost = NULL;
        $memberbazar = NULL;
        $drct = NULL;
        $houserant = NULL;
        $total = 0;
       foreach ($memberrantlist as $result){
        $milecost = $result->membermile*$result->milerate;
        $memberbazar = $result->memberbazartk;
        $houserant = $result->memberhouserant;
        $drct = $memberbazar-$milecost;
        if ($houserant > $drct) {
         $total = $houserant-$drct;
        }
     ?>
    <tr>

    <td><?php echo $count++;?></td>
    <td><?php echo$result->curmbrdate;?></td>
    <td><?php echo $result->fullname;?></td>
    <td><?php echo $result->memberhouserant;?></td>
    <td><?php echo $result->memberbazartk;?></td>
    <td><?php echo $result->membermile;?></td>
    <td><?php echo $result->milerate;?></td>
    <td><?php echo $milecost;?></td>
    <td><?php echo $drct;?></td>
    <td><?php echo $total;?></td>
     <td>
       <a href="<?php echo base_url();?>Memberrant/editmemberrant/<?php echo $result->memrantid;?>">Edit</a>
       <a onclick="return confirm('Are Youe Sure To Delete')" href="<?php echo base_url();?>Memberrant/Deletedmember/<?php echo $result->memrantid;?>">Delete</a>
   
     </td>
    </tr>
    <?php }  ?>
     </tbody>
      
  </table>