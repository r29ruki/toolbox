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
$query = "SELECT post_id, show_date, show_name, song_name FROM wp_setlist WHERE tahara_eq1 = '".$label."' OR tahara_eq2 = '".$label."' OR sakurai_eq1 = '".$label."' OR sakurai_eq2 = '".$label."' OR nakagawa_eq1 = '".$label."' OR nakagawa_eq2 = '".$label."' OR jen_eq1 = '".$label."' OR jen_eq2 = '".$label."' OR jen_eq3 = '".$label."' UNION SELECT post_id, show_date, show_name, song_name FROM wp_3setlist WHERE tahara_eq1 = '".$label."' OR tahara_eq2 = '".$label."' OR sakurai_eq1 = '".$label."' OR sakurai_eq2 = '".$label."' OR nakagawa_eq1 = '".$label."' OR nakagawa_eq2 = '".$label."' OR jen_eq1 = '".$label."' OR jen_eq2 = '".$label."' OR jen_eq3 = '".$label."'";
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
        $showname = $row->show_name."(".substr($row->show_date,0,4).")";
        $ref_guid = get_guid_by_id($row->post_id);
        if($ref_guid!=""){
            $showname_val= "<a href=".$ref_guid.">".$row->show_name."</a>(".substr($row->show_date,0,4).")";
        }
        else{
            $showname_val=$showname;
        }
        
        if(!isset($usesong_arr[$row->song_name][$showname])){
            //配列に曲名キーが無い場合は配列に公演名を新規追加
            $usesong_arr[$row->song_name][$showname] = $showname_val;
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
                        <th></th>
                        <th><b>INFO</b></th>
                    </tr>
                    <?php
                    $i=0;
                    foreach($usesong_arr as $key => $show) {
                        $song_guid = get_guid_by_title($key);
                        if(isset($song_guid)){
                            printf('<tr><td><a href="%s">%s</a></td><td>',$song_guid,$key);
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