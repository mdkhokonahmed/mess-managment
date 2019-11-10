<br>
<table class="w3-table-all">
    <thead>
      <tr class="w3-blue">
        <th>Sl</th>
        <th>Date</th>
        <th>Full Name</th>
        <th>Mile</th>
      </tr>
    </thead>
    <tbody>
     <?php 
        $count=1;
       $totalmile = 0;
       foreach ($totalmiles as $result){
        $totalmile = $result->parmile + $totalmile;
     ?>
    <tr>
     <td><?php echo $count++;?></td>
    <td><?php echo $result->miledate;?></td>
    <td><?php echo $result->milefullnmae;?></td>
    <td><?php echo $result->parmile;?></td>
     </td>
    </tr>
    <?php }  ?>
     </tbody>

      <tr>
        <th colspan="3" class="w3-center">Total Mile=</th>
        <th><?php echo $totalmile;?></th>
      </tr>
  </table>