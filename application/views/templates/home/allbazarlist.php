<br>

<a href="<?php echo base_url();?>Bazar/memberbazarlist" class="w3-bar-item w3-button w3-padding w3-pink">Back</a>
<form action="<?php echo base_url();?>Bazar/allbazarsearch" method="post">
  <input type="text" name="startdate" placeholder="Place search Start Date" id="datepicker-8">
  <input type="text" name="enddate" placeholder="Place search End Date" id="datepicker-9">
  <input type="submit" name="btn" value="Search">
</form>
<table class="w3-table-all" >
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
       foreach ($showallbazarslist as $result){
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
    <td></td>
    </tr>
    <?php }  ?>
     </tbody>
      <tr>
       <th colspan="3" class="w3-center">Total Tk= </th>
        <th><?php echo $total;?></th>
      <th>Mill= <?php echo $totalmill;?></th>
      <th>Mill Rate= <?php echo $millrate;?></th>
      </tr>
  </table>
  <script>
         $(function() {
            $( "#datepicker-8" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: false
            });
            $( "#datepicker-9" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: true
            });
         });
      </script>