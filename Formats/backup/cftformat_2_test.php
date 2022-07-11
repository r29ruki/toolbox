<?php 
 global $wpdb;

 show_text_2("コパー","https://toolboxdev.wp.xdomain.jp/?p=22");

 $value1_id =19;
 $db_table = 'wp_posts';
//SQL文
 //$query = "SELECT * FROM wp_posts WHERE id = %d";
 $query = "SELECT p.ID, p.post_title, p.guid, p.post_status, m.meta_key, m.meta_value FROM wp_posts p INNER JOIN wp_postmeta m ON p.ID = m.post_id WHERE p.post_status = 'publish' AND m.meta_key = 'label'";
//SQLクエリを連想配列で取得
 $results = $wpdb->get_results($wpdb->prepare($query,$value1_id,ARRAY_A));
 $i=0;
 foreach($results as $row) {
   $ID[$i] = $row->ID;
   $label[$i] = $row->meta_value;
   $guid[$i] = $row->guid;
?>
<br>
<?php
  echo $ID[$i];
?>
<br>
<?php
  echo $label[$i];
?>
<br>
<?php
  echo $guid[$i];
  show_text_2($label[$i],$guid[$i]);
  $i++;
 }
?>