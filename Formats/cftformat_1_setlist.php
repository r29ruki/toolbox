<?php
//SQLで楽器一覧を取得しておく
global $wpdb;
$post_id = get_the_ID();
$get_meta = $wpdb->get_results(
$wpdb->prepare( "SELECT * FROM wp_setlist WHERE post_id = %d", $post_id));
$get_meta = isset($get_meta[0]) ? $get_meta[0] : null;
$show_name = isset($get_meta->show_name) ? $get_meta->show_name : null;
$show_date = isset($get_meta->show_date) ? $get_meta->show_date : null;
$show_venue = isset($get_meta->show_venue) ? $get_meta->show_venue : null;
if(isset($show_venue) && isset($show_date)){
?>
<p>
    Venue：<?php echo $show_venue; ?><br>
    Date：<?php echo $show_date; ?>
</p>
<?
}
//DB一つの場合
//$query = "SELECT p.ID, p.post_title, p.guid, p.post_status, m.meta_key, m.meta_value FROM wp_posts p INNER JOIN wp_postmeta m ON p.ID = m.post_id WHERE p.post_status = 'publish' AND m.meta_key = 'label'";
//DBが二つの場合
$query = "SELECT p.ID, p.post_title, p.guid, p.post_status, m.meta_key, m.meta_value FROM wp_posts p INNER JOIN wp_postmeta m ON p.ID = m.post_id WHERE p.post_status = 'publish' AND m.meta_key = 'label' UNION SELECT p.ID, p.post_title, p.guid, p.post_status, m.meta_key, m.meta_value FROM wp_3posts p INNER JOIN wp_3postmeta m ON p.ID = m.post_id WHERE p.post_status = 'publish' AND m.meta_key = 'label'";
$results = $wpdb->get_results($wpdb->prepare($query,$value1_id,ARRAY_A));
$i=0;
//print_r($results);
foreach($results as $row) {
    $ID[$i] = $row->ID;
    $label[$i] = $row->meta_value;
    $guid[$i] = $row->guid;
    $i++;
}
$custom_fields = get_post_custom();
?>
<table class="table_A live">
    <tbody>
    <?php 
    //for($m=0; $m<$i; $m++){
    $isEncore=false;
    $en=0;
    foreach($custom_fields['name'] as $key => $value){
        if($value == 'en'){
            $isEncore=true;
            set_template($custom_fields, $label, $guid, $key);
        }
        else if($isEncore){
            set_en_template($custom_fields, $label, $guid, $key, $en);
            $en++;
        }
        else{
            set_template($custom_fields, $label, $guid, $key);
        }
    }
    ?>
    </tbody>
</table>
<?php
$isSetSupport = is_set_support($custom_fields);
//printf('isSetSupport = %d<br>',$isSetSupport);
if($isSetSupport == 1){
    ?>
    <!--[su_spoiler title="サポートメンバー" icon="plus-square-1"]-->
    <br>
    <dl class="netabare">
        <dt>サポートメンバー</dt>
        <dd>
    <table class="table_A live">
        <tbody>
        <?php 
        $isEncore=false;
        $en=0;
        foreach($custom_fields['name'] as $key => $value){
            if($value == 'en'){
                $isEncore=true;
                set_template_support($custom_fields, $label, $guid, $key);
            }
            else if($isEncore){
                set_en_template_support($custom_fields, $label, $guid, $key, $en);
                $en++;
            }
            else{
                set_template_support($custom_fields, $label, $guid, $key);
            }
        }
        ?>
        </tbody>
    </table>
        </dd>
    </dl>
    <br>
    <!--[/su_spoiler]-->
    <?php
}
?>