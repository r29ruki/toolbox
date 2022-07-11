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
$query = "SELECT show_date, show_name, song_name FROM wp_tst_setlist WHERE tahara_eq1 = '".$label."' OR tahara_eq2 = '".$label."' OR sakurai_eq1 = '".$label."' OR sakurai_eq2 = '".$label."' OR nakagawa_eq1 = '".$label."' OR nakagawa_eq2 = '".$label."' OR jen_eq1 = '".$label."' OR jen_eq2 = '".$label."' OR jen_eq3 = '".$label."'";
//SQLクエリを連想配列で取得
$results = $wpdb->get_results($wpdb->prepare($query,$value1_id,ARRAY_A));
$i=0;
?>
<dl class="netabare">
    <dt>使用楽曲情報</dt>
    <dd>
<?php
foreach($results as $row) {
   $show_date[$i] = $row->show_date;
   $show_name[$i] = $row->show_name;
   $song_name[$i] = $row->song_name;
   echo $song_name[$i]." / ".$show_name[$i]." / ".$show_date[$i];
   $i++;
?>
<br>
<?
}
if(!$results){
    echo "データなし<br>";
}
?>
    </dd>
</dl>