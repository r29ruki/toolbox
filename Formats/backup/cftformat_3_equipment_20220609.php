<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<?php 
global $wpdb;
$custom_fields = get_post_custom();  // 指定した投稿のすべてのカスタムフィールド情報を取得
$label_tmp = $custom_fields['label']; // 'label' というキーを持つカスタムフィールドの値を取得
if($label_tmp == null){
    $label = "no_equip_data";
}else{
    $label = $label_tmp[0];
}

//echo $label;

//SQL文
//$query = "SELECT show_date, show_name, song_name FROM wp_setlist WHERE tahara_eq1 = '".$label."' OR tahara_eq2 = '".$label."' OR sakurai_eq1 = '".$label."' OR sakurai_eq2 = '".$label."' OR nakagawa_eq1 = '".$label."' OR nakagawa_eq2 = '".$label."' OR jen_eq1 = '".$label."' OR jen_eq2 = '".$label."' OR jen_eq3 = '".$label."'";
//DBが二つの場合
$query = "SELECT post_id, show_date, show_name, song_name FROM wp_setlist WHERE tahara_eq1 = '".$label."' OR tahara_eq2 = '".$label."' OR sakurai_eq1 = '".$label."' OR sakurai_eq2 = '".$label."' OR nakagawa_eq1 = '".$label."' OR nakagawa_eq2 = '".$label."' OR jen_eq1 = '".$label."' OR jen_eq2 LIKE '%".$label."%' OR jen_eq3 = '".$label."' UNION SELECT post_id, show_date, show_name, song_name FROM wp_3setlist WHERE tahara_eq1 = '".$label."' OR tahara_eq2 = '".$label."' OR sakurai_eq1 = '".$label."' OR sakurai_eq2 = '".$label."' OR nakagawa_eq1 = '".$label."' OR nakagawa_eq2 = '".$label."' OR jen_eq1 = '".$label."' OR jen_eq2 LIKE '%".$label."%' OR jen_eq3 = '".$label."'";
//SQLクエリを連想配列で取得
$results = $wpdb->get_results($wpdb->prepare($query,$value1_id,ARRAY_A));

?>
<p><br /></p>
<h5><b>使用楽曲リスト</b></h5>
<?php

if(!isset($results)){
    echo "データなし<br>";
}
else{
    foreach($results as $row) {
        //$showname = $row->show_name."(".substr($row->show_date,0,4).")";
        $showname = "<a href=".get_guid_by_id($row->post_id).">".$row->show_name."</a>(".substr($row->show_date,0,4).")";
        
        if(!isset($usesong_arr[$row->song_name])){
            //配列に曲名キーが無い場合は配列に公演名を新規追加
            $usesong_arr[$row->song_name] = array($showname);
            //echo "<br>";
            //print_r($usesong_arr);
            //echo "<br>";
        }
        else if(!in_array($showname, $usesong_arr[$row->song_name])){
            //配列に曲名キーがある場合は配列に公演名をarraypushして追加
            array_push($usesong_arr[$row->song_name],$showname);
            //echo "<br>";
            //print_r($usesong_arr);
            //echo "<br>";
        }
    }
    
    $isclose = false;
    if(isset($usesong_arr)){
        if(count($usesong_arr) > 10 ){
            $isclose = true;
            ?>
            <div class="grad-wrap">
                <input id="trigger1" class="grad-trigger" type="checkbox">
                <label class="grad-btn" for="trigger1"><span class="fa fa-chevron-down"></span></label>
                <div class="grad-item">
                    <?php 
                }
                ?>
                <table class="table_A live">
                    <tbody>
                    <tr>
                        <th><b>SONG</b></th>
                        <th><b>Info</b></th>
                    </tr>
                    <?php
                    $i=0;
                    foreach($usesong_arr as $key => $show) {
                        //echo "key=".$key."=>".bin2hex($key)."<br>";
                        //謎のシングルクォーテーションが入っている場合には置換
                        //$key = hex2bin(str_replace("e28099","2623383231373b",bin2hex($key)));
                        //echo "key=".$key."=>".bin2hex($key)."<br>";
                        $song_guid = get_guid_by_title($key);
                        if(isset($song_guid)){
                            printf('<tr><td><a href="%s" rel="noopener" target="_blank">%s</a></td><td>',$song_guid,$key);
                        }
                        else{
                            echo "<tr><td>".$key."</td><td>";
                        }
                        
                        //echo "<tr><td>".$key."</td><td>";
                        $count = 0;
                        foreach($show as $k => $value){
                            if($count > 2){
                                echo " / and more... ";
                                break;
                            }
                            else if($count != 0){
                                echo " / ";
                            }
                            echo $value;
                            $count++;
                        }
                        echo "</td></tr>";
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
                <?php
                if($isclose == true){
                    echo '</div></div>';
                    echo '<!-- isclose true -->';
                }
                ?>
                
                <?php
            }
            else{
                echo "データなし<br>";
            }
        }
        ?>
        <br>