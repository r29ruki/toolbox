<?php 
//TOOLBOX楽器使用履歴Format
global $wpdb;
$post_title = get_the_title();
//echo $post_title."<br>";
if(strpos($post_title,"TAHARA")){
  $target="tahara_eq1";
  //echo $target."<br>";
}
else if(strpos($post_title,"SAKURAI")){
  $target="sakurai_eq1";
  //echo $target."<br>";
}
else if(strpos($post_title,"NAKAGAWA")){
  $target="nakagawa_eq1";
  //echo $target."<br>";
}
else{
  echo "NOT FOUND.";
}

$query_eqhistory ="SELECT DISTINCT show_date, ".$target." FROM wp_setlist WHERE ".$target."!='' AND ".$target."!='-' AND ".$target." NOT LIKE '%？%' AND ".$target." NOT LIKE '%?%' ORDER BY show_date";
$results_eqhistory = $wpdb->get_results($wpdb->prepare($query_eqhistory,$value1_id,ARRAY_A));
$eqhistory_arr = array();

foreach($results_eqhistory as $row){
  $year = substr($row->show_date,0,4);
  $eq = $row->$target;
  //echo $year."/".$eq."<br>";
  if(!isset($eqhistory_arr[$eq])){
    //配列に年キーが無い場合は配列に機材名を新規追加
    $eqhistory_arr[$eq] = array($year);
  }
  else if(!in_array($year, $eqhistory_arr[$eq])){
    //配列に年キーがある場合は配列に機材名をarraypushして追加
    array_push($eqhistory_arr[$eq],$year);
  }
}

//print_r($eqhistory_arr);

$cur_year = date('Y');
$eqs = array_keys($eqhistory_arr);
?>
<table class="table_A history">
  <tbody>
  <tr>
    <th class='fixed01'></th>
    <?php
    for($y=1994;$y<=$cur_year;$y++){
      echo "<th class='fixed02'><b>".$y."</b></th>";
    }
    ?>
  </tr>
  <?php
  foreach($eqs as $row => $value) {
    //print_r($value);
    $value_guid = get_guid_by_label($value);
    if($value_guid!=""){
      echo "<tr><td class='fixed02'><a href='".$value_guid."'>".$value."</a></th>";
    }
    else {
      echo "<tr><td class='fixed02'>".$value."</th>";
    }
    $i = 0;
    for($y=1994;$y<=$cur_year;$y++){
      if(isset($eqhistory_arr[$value][$i])){
        if($eqhistory_arr[$value][$i]==$y){
          echo "<td class='data' ><b>●</b></td>";
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
