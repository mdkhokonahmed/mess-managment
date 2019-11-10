<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <br>
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
       foreach ($search as $result){
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