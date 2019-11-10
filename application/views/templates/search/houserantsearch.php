</br>
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