<br>
<a href="<?php echo base_url();?>Mile/milelist" class="w3-bar-item w3-button w3-padding w3-pink">Back</a>
    <div class="w3-right">
    <form action="<?php echo base_url();?>Mile/totalmilesearch" method="post">
  <input type="text" name="curentdate" placeholder="Place Start Current Date" id="datepicker-8">
  <input type="text" name="endcurentdate" placeholder="Place End Current Date" id="datepicker-9">
  <input type="submit" name="btn" value="Search">
  </form>
  </div>
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