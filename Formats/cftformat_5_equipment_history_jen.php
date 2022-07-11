<?php
//ジェン通メインセット履歴用Format
$custom_fields = get_post_custom();
?>

<table class="table_A history">
  <tbody>
  <tr>
    <th class='fixed01'></th>
    <?php
    foreach($custom_fields['show'] as $key => $value){
      ?>
      <th class='fixed02'><?php echo $custom_fields['year'][$key]; ?></th>
      <?php
    }
    ?>
  </tr>
  <tr>
    <th class='fixed02'><b>Show</b></th>
    <?php
    foreach($custom_fields['show'] as $key => $value){
      $guid = get_jentoolguid_by_title($custom_fields['show'][$key]);
      if($guid!=""){
        ?>
        <td><?php echo"<a href=".get_jentoolguid_by_title($custom_fields['show'][$key]).">".$custom_fields['show'][$key]."</a>"; ?></td>
        <?php
      }
      else {
        ?>
        <td><?php echo $custom_fields['show'][$key]; ?></td>
        <?php
      }
    }
    ?>
  </tr>
  <tr>
    <th class='fixed02'><b>Main Kit</b></th>
    <?php
    foreach($custom_fields['show'] as $key => $value){
      ?>
      <td><?php echo $custom_fields['main_kit'][$key]; ?></td>
      <?php
    }
    ?>
  </tr>
  <tr>
    <th class='fixed02'><b>Stick</b></th>
    <?php
    foreach($custom_fields['show'] as $key => $value){
      ?>
      <td><?php echo $custom_fields['stick'][$key]; ?></td>
      <?php
    }
    ?>
  </tr>
  <tr>
    <th class='fixed02'><b>Pedal</b></th>
    <?php
    foreach($custom_fields['show'] as $key => $value){
      ?>
      <td><?php echo $custom_fields['pedal'][$key]; ?></td>
      <?php
    }
    ?>
  </tr>
  <tr>
    <th class='fixed02'><b>HHPedal</b></th>
    <?php
    foreach($custom_fields['show'] as $key => $value){
      ?>
      <td><?php echo $custom_fields['hhpedal'][$key]; ?></td>
      <?php
    }
    ?>
  </tr>
  <tr>
    <th class='fixed02'><b>HH</b></th>
    <?php
    foreach($custom_fields['show'] as $key => $value){
      ?>
      <td><?php echo $custom_fields['hh'][$key]; ?></td>
      <?php
    }
    ?>
  </tr>
  <tr>
    <th class='fixed02'><b>Crash#1</b></th>
    <?php
    foreach($custom_fields['show'] as $key => $value){
      ?>
      <td><?php echo $custom_fields['crash1'][$key]; ?></td>
      <?php
    }
    ?>
  </tr>
  <tr>
    <th class='fixed02'><b>Crash#2</b></th>
    <?php
    foreach($custom_fields['show'] as $key => $value){
      ?>
      <td><?php echo $custom_fields['crash2'][$key]; ?></td>
      <?php
    }
    ?>
  </tr>
  <tr>
    <th class='fixed02'><b>Crash#3</b></th>
    <?php
    foreach($custom_fields['show'] as $key => $value){
      ?>
      <td><?php echo $custom_fields['crash3'][$key]; ?></td>
      <?php
    }
    ?>
  </tr>
  <tr>
    <th class='fixed02'><b>Ride</b></th>
    <?php
    foreach($custom_fields['show'] as $key => $value){
      ?>
      <td><?php echo $custom_fields['ride'][$key]; ?></td>
      <?php
    }
    ?>
  </tr>
  <tr>
    <th class='fixed02'><b>Additional</b></th>
    <?php
    foreach($custom_fields['show'] as $key => $value){
      ?>
      <td><?php echo $custom_fields['additional'][$key]; ?></td>
      <?php
    }
    ?>
  </tr>
  </tbody>
</table>
