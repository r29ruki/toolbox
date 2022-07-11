<?php 
global $wpdb;
$query_eqhistory ="SELECT DISTINCT show_date, jen_eq1 FROM wp_3setlist WHERE jen_eq1!='' AND jen_eq1!='-' AND jen_eq1 NOT LIKE '%？%' ORDER BY show_date";
$results_eqhistory = $wpdb->get_results($wpdb->prepare($query_eqhistory,$value1_id,ARRAY_A));
$eqhistory_arr = array();

foreach($results_eqhistory as $row){
  $year = substr($row->show_date,0,4);
  $snare = $row->jen_eq1;
  //echo $year."/".$snare."<br>";
  if(!isset($eqhistory_arr[$snare])){
    //配列に年キーが無い場合は配列に機材名を新規追加
    $eqhistory_arr[$snare] = array($year);
  }
  else if(!in_array($year, $eqhistory_arr[$snare])){
    //配列に年キーがある場合は配列に機材名をarraypushして追加
    array_push($eqhistory_arr[$snare],$year);
  }
}

//print_r($eqhistory_arr);

$cur_year = date('Y');
$snares = array_keys($eqhistory_arr);
?>
<table class="table_A history">
  <tbody>
  <tr>
    <th class='fixed01'></th>
    <?php
    for($y=1999;$y<=$cur_year;$y++){
      echo "<th class='fixed02'><b>".$y."</b></th>";
    }
    ?>
  </tr>
  <?php
  foreach($snares as $row => $value) {
    //print_r($value);
    $value_guid = get_guid_by_label($value);
    if($value_guid!=""){
      echo "<tr><td class='fixed02'><a href='".$value_guid."'>".$value."</a></th>";
    }
    else {
      echo "<tr><td class='fixed02'>".$value."</th>";
    }
    $i = 0;
    for($y=1999;$y<=$cur_year;$y++){
      if(isset($eqhistory_arr[$value][$i])){
        if($eqhistory_arr[$value][$i]==$y){
          echo "<td color=red ><b>●</b></td>";
          $i++;
        }
        else {
          echo "<td></td>";
        }
      }
      else {
        echo "<td></td>";
      }
    }
    echo "</tr>";
    /*
    foreach($eqhistory_arr[$value]['year'] as $key){
        echo "　　　　Year = ".$eqhistory_arr[$value]['year'][$i]."<br>";
        $i++;
    }
    */
  }
  ?>
  </tbody>
</table>
