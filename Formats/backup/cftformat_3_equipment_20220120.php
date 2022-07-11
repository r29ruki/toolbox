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
$query = "SELECT show_date, show_name, song_name FROM wp_setlist WHERE tahara_eq1 = '".$label."' OR tahara_eq2 = '".$label."' OR sakurai_eq1 = '".$label."' OR sakurai_eq2 = '".$label."' OR nakagawa_eq1 = '".$label."' OR nakagawa_eq2 = '".$label."' OR jen_eq1 = '".$label."' OR jen_eq2 = '".$label."' OR jen_eq3 = '".$label."' UNION SELECT show_date, show_name, song_name FROM wp_3setlist WHERE tahara_eq1 = '".$label."' OR tahara_eq2 = '".$label."' OR sakurai_eq1 = '".$label."' OR sakurai_eq2 = '".$label."' OR nakagawa_eq1 = '".$label."' OR nakagawa_eq2 = '".$label."' OR jen_eq1 = '".$label."' OR jen_eq2 = '".$label."' OR jen_eq3 = '".$label."'";
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
        if(count($usesong_arr) > 14 ){
            $isclose = true;
            ?>
            <div class="grad-wrap">
                <input id="trigger1" class="grad-trigger" type="checkbox">
                <label class="grad-btn" for="trigger1">全て見る▼</label>
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
                        /*
                if($i == 19){
            ?>
            </tbody>
        </table>
        <br>
        <dl class="netabare"><dt>もっと見る</dt><dd><br>
        <table class="table_A live">
            <tbody>
            <tr>
                <th><b>SONG</b></th>
                <th><b>Info</b></th>
            </tr>
            <?php     
                    $isclose = true;
                }
                */
                        echo "<tr><td>".$key."</td><td>";
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