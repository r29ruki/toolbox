<?php
/*
Plugin Name: Setlist Template
Plugin URI: http://www.example.com/plugin
Description: セットリスト用HTMLのテンプレート for ジェン通
Author: R.K
Version: 1.1
Author URI: http://www.example.com
*/
function set_template($custom_fields, $label, $guid, $m) {
    $my_custom_field = $custom_fields['name']; // 'name' というキーを持つカスタムフィールドの値を取得
    $jen_tmp = $custom_fields['jen']; // 'jen' というキーを持つカスタムフィールドの値を取得
	
	$jen_arr = preg_split("/[,;]/", $jen_tmp[$m],3);
	$add_arr = preg_split("/\//", $jen_arr[1],3);
    
    $my_custom_field_j = $jen_arr[0];
    
    if ($my_custom_field[$m]) {
        if($m == 0){
            ?>
            <tr><th></th>
            <th></th>
            <th><b>Main Kit</b></th>
            <th><b>Snare</b></th>
            <th><b>Additional</b></th>
            </tr>
            <?php
        }
        if($my_custom_field[$m] == 'en'){
            ?>
            <tr>
				<th colspan="5">ENCORE</th>
            </tr>
            <?php
        }
        else{
        ?>
            <tr><th>M<?php printf("%02d",$m + 1); ?></th><td>
            <?php 
                    $song_guid = get_guid_by_title($my_custom_field[$m]);
                    if(isset($song_guid)){
                        printf('<a href="%s">%s</a>',$song_guid,$my_custom_field[$m]);
                    }
                    else{
                        echo $my_custom_field[$m];
                    }
                    //echo $my_custom_field[$m]; 
                    ?>
            </td>
            <?php 
            	print_equipment_value($jen_arr[2],'','',$guid,$label);
            	print_equipment_value($jen_arr[0],'','',$guid,$label);
				print_equipment_value($add_arr[0],$add_arr[1],$add_arr[2],$guid,$label);
            	
            ?>
            </tr>
<?php
        }
    }
    
}
function set_en_template($custom_fields, $label, $guid, $m, $en) {
    $my_custom_field = $custom_fields['name']; // 'name' というキーを持つカスタムフィールドの値を取得
    $jen_tmp = $custom_fields['jen']; // 'jen' というキーを持つカスタムフィールドの値を取得
    
	$jen_arr = preg_split("/[,;]/", $jen_tmp[$m],3);
	$add_arr = preg_split("/\//", $jen_arr[1],3);
    
    $my_custom_field_j = $jen_arr[0];
    
    if ($my_custom_field[$m]) {
        ?>
        <tr><th>EN<?php printf("%01d",$en + 1); ?></th><td>
                <?php 
                $song_guid = get_guid_by_title($my_custom_field[$m]);
                if(isset($song_guid)){
                    printf('<a href="%s">%s</a>',$song_guid,$my_custom_field[$m]);
                }
                else{
                    echo $my_custom_field[$m];
                }
                //echo $my_custom_field[$m]; 
                ?>
            </td>
            <?php 
            print_equipment_value($jen_arr[2],'','',$guid,$label);
			print_equipment_value($jen_arr[0],'','',$guid,$label);
			print_equipment_value($add_arr[0],$add_arr[1],$add_arr[2],$guid,$label);
            ?>
            </tr>
        <?php
    }
    
}

function set_template_support($custom_fields, $label, $guid, $m) {
    $my_custom_field = $custom_fields['name']; // 'name' というキーを持つカスタムフィールドの値を取得
    //サポートメンバーが増えたら変数を増やそう！
    $sun_tmp = $custom_fields['sunny']; 
    $seb_tmp = $custom_fields['sebu']; 
    $kob_tmp = $custom_fields['koba']; 
    $ura_tmp = $custom_fields['ura']; 
    
    $sun_arr = preg_split("/[,;]/", $sun_tmp[$m],4);
    $seb_arr = preg_split("/[,;]/", $seb_tmp[$m],3);
    $kob_arr = preg_split("/[,;]/", $kob_tmp[$m],3);
    $ura_arr = preg_split("/[,;]/", $ura_tmp[$m],3);
    
    $my_custom_field_sunny1 = $sun_arr[0];
    $my_custom_field_sunny2 = $sun_arr[1];
    $my_custom_field_sunny3 = $sun_arr[2];
    $my_custom_field_sunny4 = $sun_arr[3];
    $my_custom_field_sebu1 = $seb_arr[0]; 
    $my_custom_field_sebu2 = $seb_arr[1]; 
    $my_custom_field_sebu3 = $seb_arr[2]; 
    $my_custom_field_koba1 = $kob_arr[0]; 
    $my_custom_field_koba2 = $kob_arr[1]; 
    $my_custom_field_koba3 = $kob_arr[2]; 
    $my_custom_field_ura1 = $ura_arr[0]; 
    $my_custom_field_ura2 = $ura_arr[1]; 
    $my_custom_field_ura3 = $ura_arr[2]; 
    
    if ($my_custom_field[$m]) {
        //最大使用楽器数を確認
        $sun_column = get_column_num($sun_tmp);
        $seb_column = get_column_num($seb_tmp);
        $kob_column = get_column_num($kob_tmp);
        $ura_column = get_column_num($ura_tmp);
        
        if($m == 0){
            ?>
            <tr><th></th>
                <?php 
                //サポートメンバーが増えたら変数を増やそう！
                if($sun_column > 0 || $seb_column > 0 || $kob_column > 0 || $ura_column > 0) printf('<th><b>SONG</b></th>');
                if($sun_column > 0) printf('<th><b>SUNNY</b></th>');
                if($sun_column > 1) printf('<th><b>SUNNY2</b></th>');
                if($sun_column > 2) printf('<th><b>SUNNY3</b></th>');
                if($sun_column > 3) printf('<th><b>SUNNY4</b></th>');
                if($seb_column > 0) printf('<th><b>Sebu</b></th>');
                if($seb_column > 1) printf('<th><b>Sebu2</b></th>');
                if($seb_column > 2) printf('<th><b>Sebu3</b></th>');
                if($kob_column > 0) printf('<th><b>Kobayashi</b></th>');
                if($kob_column > 1) printf('<th><b>Kobayashi2</b></th>');
                if($kob_column > 2) printf('<th><b>Kobayashi3</b></th>');
                if($ura_column > 0) printf('<th><b>Ura</b></th>');
                if($ura_column > 1) printf('<th><b>Ura2</b></th>');
                if($ura_column > 2) printf('<th><b>Ura3</b></th>');
                ?>
            </tr>
            <?php
        }
        if($my_custom_field[$m] == 'en'){
            ?>
            <tr><th colspan=<?php printf("%d",$sun_column + $seb_column + $kob_column + $ura_column + 2); ?> >ENCORE</th>
            </tr>
            <?php
        }
        else{
            ?>
            <tr><th>M<?php printf("%02d",$m + 1); ?></th>
                <td>
                    <?php 
                    echo $my_custom_field[$m]; 
                    ?>
                </td>
                <?php
                //サポートメンバーが増えたら変数を増やそう！
                if($sun_column > 0) print_equipment_value($my_custom_field_sunny1,'','',$guid,$label);
                if($sun_column > 1) print_equipment_value($my_custom_field_sunny2,'','',$guid,$label);
                if($sun_column > 2) print_equipment_value($my_custom_field_sunny3,'','',$guid,$label);
                if($sun_column > 3) print_equipment_value($my_custom_field_sunny4,'','',$guid,$label);
                if($seb_column > 0) print_equipment_value($my_custom_field_sebu1,'','',$guid,$label);
                if($seb_column > 1) print_equipment_value($my_custom_field_sebu2,'','',$guid,$label);
                if($seb_column > 2) print_equipment_value($my_custom_field_sebu3,'','',$guid,$label);
                if($kob_column > 0) print_equipment_value($my_custom_field_koba1,'','',$guid,$label);
                if($kob_column > 1) print_equipment_value($my_custom_field_koba2,'','',$guid,$label);
                if($kob_column > 2) print_equipment_value($my_custom_field_koba3,'','',$guid,$label);
                if($ura_column > 0) print_equipment_value($my_custom_field_ura1,'','',$guid,$label);
                if($ura_column > 1) print_equipment_value($my_custom_field_ura2,'','',$guid,$label);
                if($ura_column > 2) print_equipment_value($my_custom_field_ura3,'','',$guid,$label);
                ?>
            </tr>
            <?php
        }
    }
    
}

function set_en_template_support($custom_fields, $label, $guid, $m, $en) {
    $my_custom_field = $custom_fields['name']; // 'name' というキーを持つカスタムフィールドの値を取得
    //サポートメンバーが増えたら変数を増やそう！
    $sun_tmp = $custom_fields['sunny']; 
    $seb_tmp = $custom_fields['sebu']; 
    $kob_tmp = $custom_fields['koba']; 
    $ura_tmp = $custom_fields['ura']; 
    
    $sun_arr = preg_split("/[,;]/", $sun_tmp[$m],4);
    $seb_arr = preg_split("/[,;]/", $seb_tmp[$m],3);
    $kob_arr = preg_split("/[,;]/", $kob_tmp[$m],3);
    $ura_arr = preg_split("/[,;]/", $ura_tmp[$m],3);
    
    $my_custom_field_sunny1 = $sun_arr[0];
    $my_custom_field_sunny2 = $sun_arr[1];
    $my_custom_field_sunny3 = $sun_arr[2];
    $my_custom_field_sunny4 = $sun_arr[3];
    $my_custom_field_sebu1 = $seb_arr[0]; 
    $my_custom_field_sebu2 = $seb_arr[1]; 
    $my_custom_field_sebu3 = $seb_arr[2]; 
    $my_custom_field_koba1 = $kob_arr[0]; 
    $my_custom_field_koba2 = $kob_arr[1]; 
    $my_custom_field_koba3 = $kob_arr[2]; 
    $my_custom_field_ura1 = $ura_arr[0]; 
    $my_custom_field_ura2 = $ura_arr[1]; 
    $my_custom_field_ura3 = $ura_arr[2]; 
    
    //最大使用楽器数を確認
    $sun_column = get_column_num($sun_tmp);
    $seb_column = get_column_num($seb_tmp);
    $kob_column = get_column_num($kob_tmp);
    $ura_column = get_column_num($ura_tmp);
    
    if ($my_custom_field[$m]) {
        ?>
        <tr><th>EN<?php printf("%02d",$en + 1); ?></th>
            <td>
                <?php 
                echo $my_custom_field[$m]; 
                ?>
            </td>
            <?php
            //サポートメンバーが増えたら変数を増やそう！
            if($sun_column > 0) print_equipment_value($my_custom_field_sunny1,'','',$guid,$label);
            if($sun_column > 1) print_equipment_value($my_custom_field_sunny2,'','',$guid,$label);
            if($sun_column > 2) print_equipment_value($my_custom_field_sunny3,'','',$guid,$label);
            if($sun_column > 3) print_equipment_value($my_custom_field_sunny4,'','',$guid,$label);
            if($seb_column > 0) print_equipment_value($my_custom_field_sebu1,'','',$guid,$label);
            if($seb_column > 1) print_equipment_value($my_custom_field_sebu2,'','',$guid,$label);
            if($seb_column > 2) print_equipment_value($my_custom_field_sebu3,'','',$guid,$label);
            if($kob_column > 0) print_equipment_value($my_custom_field_koba1,'','',$guid,$label);
            if($kob_column > 1) print_equipment_value($my_custom_field_koba2,'','',$guid,$label);
            if($kob_column > 2) print_equipment_value($my_custom_field_koba3,'','',$guid,$label);
            if($ura_column > 0) print_equipment_value($my_custom_field_ura1,'','',$guid,$label);
            if($ura_column > 1) print_equipment_value($my_custom_field_ura2,'','',$guid,$label);
            if($ura_column > 2) print_equipment_value($my_custom_field_ura3,'','',$guid,$label);
            ?>
        </tr>
        <?php
    }
    
}

function is_set_eq($custom_fields) {
    $isSetEq = 0;
    foreach ($custom_fields as $key => $value){
        //printf('key = %d,$custom_fields[$key] = %s<br>',$key,$custom_fields[$key]);
        if($custom_fields[$key] != '') $isSetEq = 1;
    }
    //printf('isSetEq = %d<br>',$isSetEq);
    return $isSetEq;
}

function get_column_num($custom_fields) {
    $column_num = -1;
    foreach ($custom_fields as $key => $value){
        $tmp_arr = preg_split("/[,;]/", $custom_fields[$key]);
        $tmp_column = 0;
        foreach($tmp_arr as $num => $val){
            if($val != '') $tmp_column++;
        }
        //printf('key = %d,$custom_fields[$key] = %s,num = %d<br>',$key,$custom_fields[$key],$tmp_column);
        if($tmp_column > $column_num) $column_num = $tmp_column;
    }
    //printf('isSetEq = %d<br>',$isSetEq);
    return $column_num;
}

function is_set_support($custom_fields) {
    
    $isSetSupport = 0;
    $s1_column = 0;
    $s2_column = 0;
    $s3_column = 0;
    $s4_column = 0;
    
    //サポートメンバーが増えたら変数を増やそう！
    $s1_tmp = $custom_fields['sunny']; 
    $s2_tmp = $custom_fields['sebu']; 
    $s3_tmp = $custom_fields['koba']; 
    $s4_tmp = $custom_fields['ura']; 
    
    //サポートメンバーが増えたら変数を増やそう！
    if(isset($s1_tmp)) $s1_column = get_column_num($s1_tmp);
    if(isset($s2_tmp)) $s2_column = get_column_num($s2_tmp);
    if(isset($s3_tmp)) $s3_column = get_column_num($s3_tmp);
    if(isset($s4_tmp)) $s4_column = get_column_num($s4_tmp);
    
    if($s1_column > 0 || $s2_column > 0 || $s3_column > 0 || $s4_column > 0) $isSetSupport = 1;
    
    return $isSetSupport;
}

function print_equipment_value($value,$value2 = '',$value3 = '', $guid,$label) {
    printf('<td>');
    //$label_id = array_search($value,$label);
    $label_id = 0;
    $label_id2 = 0;
    $label_id3 = 0;
    foreach($label as $key => $v){
        if (strpos($value, $v) !== false) $label_id = $key;
        if (strpos($value2, $v) !== false) $label_id2 = $key;
        if (strpos($value3, $v) !== false) $label_id3 = $key;
    }
    
    $pattern = '/' . preg_quote($label[$label_id], '/') . '/';
    $pattern2 = '/' . preg_quote($label[$label_id2], '/') . '/';
    $pattern3 = '/' . preg_quote($label[$label_id3], '/') . '/';

    if($value3 != ''){
        //1,2,3の機材がある場合
        if($value2 != ''){
            //if (($value == $label[$label_id]) && ($value2 == $label[$label_id2]) && ($value3 == $label[$label_id3])) {
            if (preg_match($pattern,$value) && preg_match($pattern2,$value2) && preg_match($pattern3,$value3)) {
                printf('<a href="%s">%s</a> / <a href="%s">%s</a> / <a href="%s">%s</a>',$guid[$label_id3],$value3,$guid[$label_id],$value,$guid[$label_id2],$value2);
            }
            //else if (($value == $label[$label_id]) && ($value3 == $label[$label_id3])) {
            else if (preg_match($pattern,$value) && preg_match($pattern3,$value3)) {
                printf('<a href="%s">%s</a> / <a href="%s">%s</a> / %s',$guid[$label_id3],$value3,$guid[$label_id],$value,$value2);
            }
            else if (preg_match($pattern,$value) && preg_match($pattern2,$value2)) {
                printf('%s / <a href="%s">%s</a> / <a href="%s">%s</a>',$value3,$guid[$label_id],$value,$guid[$label_id2],$value2);
            }
            else if (preg_match($pattern2,$value2) && preg_match($pattern3,$value3)) {
                printf('<a href="%s">%s</a> / %s / <a href="%s">%s</a>',$guid[$label_id3],$value3,$value,$guid[$label_id2],$value2);
            }
            else if(preg_match($pattern,$value)){
                printf('%s / <a href="%s">%s</a> / %s',$value3,$guid[$label_id],$value,$value2);
            }
            else if(preg_match($pattern2,$value2)){
                printf('%s / %s / <a href="%s">%s</a>',$value3,$value,$guid[$label_id2],$value2);
            }
            else if(preg_match($pattern3,$value3)){
                printf('<a href="%s">%s</a> / %s / %s',$guid[$label_id3],$value3,$value,$value2);
            }
            else{
                printf('%s / %s / %s',$value3,$value,$value2);
            }
        }
        else{
            //1,3の機材がある場合
            //if (($value == $label[$label_id]) && ($value3 == $label[$label_id3])) {
            if (preg_match($pattern,$value) && preg_match($pattern3,$value3)) {
                printf('<a href="%s">%s</a> / <a href="%s">%s</a><!-- pattern1&3 -->',$guid[$label_id3],$value3,$guid[$label_id],$value);
                //printf('<!-- pattern = %s , value = %s , pattern3 = %s , value3 = %s -->',$pattern,$value,$pattern3,$value3);
            }
            //else if($value3 == $label[$label_id3]){
            else if (preg_match($pattern3,$value3)) {
                printf('<a href="%s">%s</a> / %s<!-- pattern3 -->',$guid[$label_id3],$value3,$value);
                //printf('<!-- pattern = %s , value = %s , pattern3 = %s , value3 = %s -->',$pattern,$value,$pattern3,$value3);
            }
            //else if($value == $label[$label_id]){
            else if(preg_match($pattern,$value)){
                printf('%s / <a href="%s">%s</a><!-- pattern1 -->',$value3,$guid[$label_id],$value);
                //printf('<!-- pattern = %s , value = %s , pattern3 = %s , val3 = %s -->',$pattern,$value,$pattern3,$val3);
            }
            else{
                printf('%s / %s',$value3,$value);
            }
        }
    }
    else if($value2 != ''){
        //1,2の機材がある場合
        if (preg_match($pattern,$value) && preg_match($pattern2,$value2)) {
            printf('<a href="%s">%s</a> / <a href="%s">%s</a>',$guid[$label_id],$value,$guid[$label_id2],$value2);
        }
        else if(preg_match($pattern,$value)){
            printf('<a href="%s">%s</a> / %s',$guid[$label_id],$value,$value2);
        }
        else{
            printf('%s / %s',$value,$value2);
        }
    }
    else if(preg_match($pattern,$value)){
        //機材が1つのみの場合
        printf('<a href="%s">%s</a>',$guid[$label_id],$value);
    }
    else{
        printf('%s',$value);
    }
    printf('</td>');
}

function set_equipment_usage($results) {
    $useshow_arr=array();
    $use_eqs='';
    foreach($results as $row) {
        $show_name = $row->show_name."(".substr($row->show_date,0,4).")";
        //$use_eqs=array('t1'=>$row->tahara_eq1,'s1'=>$row->sakurai_eq1,'n1'=>$row->nakagawa_eq1,'j1'=>$row->jen_eq1,'j2'=>$row->jen_eq2);
        if(isset($row->tahara_eq1)) $use_eqs=$row->tahara_eq1;
        if(isset($row->sakurai_eq1)) $use_eqs=$row->sakurai_eq1;
        if(isset($row->nakagawa_eq1)) $use_eqs=$row->nakagawa_eq1;
        if(isset($row->jen_eq1)) $use_eqs=$row->jen_eq1;
        if(isset($row->jen_eq2)) $use_eqs=$row->jen_eq2;
        
        if(!isset($useshow_arr[$show_name]) && isset($use_eqs)){
            //配列に曲名キーが無い場合は配列に公演名を新規追加
            $useshow_arr[$show_name] = array($use_eqs);
            //echo "<br>";
            //print_r($useshow_arr);
            //echo "<br>";
        }
        else if(!in_array($use_eqs, $useshow_arr[$show_name]) && $use_eqs!=""){
            //配列に曲名キーがある場合は配列に公演名をarraypushして追加
            array_push($useshow_arr[$show_name],$use_eqs);
            //echo "<br>";
            //print_r($useshow_arr);
            //echo "<br>";
        }
    }
    return $useshow_arr;
}

function show_equipment_usage($useshow_arr,$show) {
    $i=0;
    echo "<td>";
    foreach($useshow_arr[$show] as $key => $value) {
        if($i > 3){
            echo " / and more... ";
            break;
        }
        else if($i != 0){
            echo " / ";
        }
        if($value!=""){
            $guid = get_eq_guid($value);
            //printf("<!-- guid = %s -->",$guid);
            if($guid != ""){
                printf('<a href="%s">%s</a>',$guid,$value);
            }else{
                echo $value;
            }
            $i++;
        }
    }
    if($i == 0) echo "-";
    echo "</td>";
}


function get_eq_guid($value){
	global $wpdb; 
	$query = "SELECT p.ID, p.post_title, p.guid, p.post_status, m.meta_key, m.meta_value FROM wp_posts p INNER JOIN wp_postmeta m ON p.ID = m.post_id WHERE p.post_status = 'publish' AND m.meta_key = 'label' AND (m.meta_value = '".$value."' OR p.post_title = '".$value."') UNION SELECT p.ID, p.post_title, p.guid, p.post_status, m.meta_key, m.meta_value FROM wp_3posts p INNER JOIN wp_3postmeta m ON p.ID = m.post_id WHERE p.post_status = 'publish' AND m.meta_key = 'label' AND (m.meta_value = '".$value."' OR p.post_title = '".$value."')";
	$results = $wpdb->get_results($wpdb->prepare($query,$value1_id,ARRAY_A));
	foreach($results as $row) {
		$result_guid = $row->guid;
	}
	return $result_guid;
}

function get_guid_by_title($value){
    global $wpdb; 
    $query = "SELECT p.ID, p.post_title, p.guid, p.post_status, t.term_taxonomy_id FROM wp_posts p INNER JOIN wp_term_relationships t ON p.ID = t.object_id WHERE p.post_status = 'publish' AND t.term_taxonomy_id = '185' AND p.post_title = BINARY '".$value."'";
    $results = $wpdb->get_results($wpdb->prepare($query,$value1_id,ARRAY_A));
    foreach($results as $row) {
        $result_guid = $row->guid;
    }
    return $result_guid;
}

function get_jentoolguid_by_title($value){
    global $wpdb; 
    $query = "SELECT guid FROM wp_3posts WHERE post_title = BINARY '".$value."' AND post_status = 'publish'";
    $results = $wpdb->get_results($wpdb->prepare($query,$value1_id,ARRAY_A));
    foreach($results as $row) {
        $result_guid = $row->guid;
    }
    return $result_guid;
}

function get_guid_by_id($value){
    global $wpdb; 
    $query = "SELECT ID, post_title, guid FROM `wp_3posts` WHERE ID = '".$value."' AND post_status = 'publish'";
    $results = $wpdb->get_results($wpdb->prepare($query,$value1_id,ARRAY_A));
	//jentool側のDBに記事IDが存在しない場合はTOOLBOX側のDBで検索
	if($results[0]==""){
		$query = "SELECT ID, post_title, guid FROM `wp_posts` WHERE ID = '".$value."' AND post_status = 'publish'";
		$results = $wpdb->get_results($wpdb->prepare($query,$value1_id,ARRAY_A));
	}
	foreach($results as $row) {
		$result_guid = $row->guid;
    }
    return $result_guid;
}

function get_guid_by_label($value){
    global $wpdb; 
    $query = "SELECT p.ID, p.post_title, p.guid, p.post_status, m.meta_key, m.meta_value FROM wp_3posts p INNER JOIN wp_3postmeta m ON p.ID = m.post_id WHERE p.post_status = 'publish' AND m.meta_value ='".$value."'";
    $results = $wpdb->get_results($wpdb->prepare($query,$value1_id,ARRAY_A));
    foreach($results as $row) {
        $result_guid = $row->guid;
    }
    return $result_guid;
}

?>