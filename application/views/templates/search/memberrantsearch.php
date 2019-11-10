<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	</br>
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