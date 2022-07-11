<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

<?php 
//楽曲ページ用機材リストFormat
global $wpdb;
$song_name = get_the_title();  // 現在の投稿のタイトルを取得
//echo "song_name=".$song_name."=>".bin2hex($song_name)."<br>";
//謎のシングルクォーテーションが入っている場合には置換
$song_name = hex2bin(str_replace("2623383231373b","e28099",bin2hex($song_name)));
//echo "<br>song_name_replaced=".$song_name."=>".bin2hex($song_name)."<br>";

//SQLクエリを連想配列で取得
$query_t1 = "SELECT p.post_status, s.post_id, s.show_name, s.show_date, s.tahara_eq1, s.tahara_eq2 FROM wp_posts p INNER JOIN wp_setlist s ON p.ID = s.post_id WHERE p.post_status = 'publish' AND s.song_name = BINARY '".$song_name."' ORDER BY show_date";
$query_s1 = "SELECT p.post_status, s.post_id, s.show_name, s.show_date, s.sakurai_eq1 FROM wp_posts p INNER JOIN wp_setlist s ON p.ID = s.post_id WHERE p.post_status = 'publish' AND s.song_name = BINARY '".$song_name."' ORDER BY show_date";
$query_n1 = "SELECT p.post_status, s.post_id, s.show_name, s.show_date, s.nakagawa_eq1 FROM wp_posts p INNER JOIN wp_setlist s ON p.ID = s.post_id WHERE p.post_status = 'publish' AND s.song_name = BINARY '".$song_name."' ORDER BY show_date";
$query_j1 = "SELECT p.post_status, s.post_id, s.show_name, s.show_date, s.jen_eq1, s.jen_eq2 FROM wp_posts p INNER JOIN wp_setlist s ON p.ID = s.post_id WHERE p.post_status = 'publish' AND s.song_name = BINARY '".$song_name."' UNION SELECT p.post_status, s.post_id, s.show_name, s.show_date, s.jen_eq1, s.jen_eq2 FROM wp_3posts p INNER JOIN wp_3setlist s ON p.ID = s.post_id WHERE p.post_status = 'publish' AND s.song_name = BINARY '".$song_name."' ORDER BY show_date";
$query_j2 = "SELECT p.post_status, s.post_id, s.show_name, s.show_date, s.jen_eq2 FROM wp_3posts p INNER JOIN wp_3setlist s ON p.ID = s.post_id WHERE p.post_status = 'publish' AND s.song_name = BINARY '".$song_name."' ORDER BY show_date";
$results_t1 = $wpdb->get_results($wpdb->prepare($query_t1,$value1_id,ARRAY_A));
$results_s1 = $wpdb->get_results($wpdb->prepare($query_s1,$value1_id,ARRAY_A));
$results_n1 = $wpdb->get_results($wpdb->prepare($query_n1,$value1_id,ARRAY_A));
$results_j1 = $wpdb->get_results($wpdb->prepare($query_j1,$value1_id,ARRAY_A));
$results_j2 = $wpdb->get_results($wpdb->prepare($query_j2,$value1_id,ARRAY_A));

if(!isset($results_t1) && !isset($results_s1) && !isset($results_n1) && !isset($results_j1) && !isset($results_j2)){
    echo "データなし<br>";
}
else{
    ?>
    <p><br /></p>
    <h5><b>使用機材</b></h5>
    <?php
    $useshow_arr_t1 = set_equipment_usage($results_t1);
    $useshow_arr_s1 = set_equipment_usage($results_s1);
    $useshow_arr_n1 = set_equipment_usage($results_n1);
    $useshow_arr_j1 = set_equipment_usage($results_j1);
    $useshow_arr_j2 = set_equipment_usage($results_j2);
    //print_r(count($useshow_arr_t1));
    //print_r($useshow_arr_s1);
    //print_r($useshow_arr_n1);
    //print_r($useshow_arr_j1);
    //print_r($useshow_arr_j2);
    
    if(count($useshow_arr_t1)>0 || count($useshow_arr_s1)>0 || count($useshow_arr_n1)>0 || count($useshow_arr_j1)>0 || count($useshow_arr_j2)>0){
        $isclose = false;
        if(count($useshow_arr_t1)>10 || count($useshow_arr_s1)>10 || count($useshow_arr_n1)>10 || count($useshow_arr_j1)>10 || count($useshow_arr_j2)>10){
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
                        <th><b>SHOW INFO</b></th>
                        <th><b>TAHARA's</b></th>
                        <th><b>SAKURAI's</b></th>
                        <th><b>NAKAGAWA's</b></th>
                        <th><b>JEN's</b></th>
                    </tr>
                    <?php
                    
                    if(count($useshow_arr_t1)>0){
                        foreach($useshow_arr_t1 as $show => $raw) {
                            echo "<tr><td>".$useshow_arr_t1[$show]['name']."</td>";
                            //echo "<tr><td>".$show."</td>";
                            show_equipment_usage($useshow_arr_t1,$show);
                            show_equipment_usage($useshow_arr_s1,$show);
                            show_equipment_usage($useshow_arr_n1,$show);
                            show_equipment_usage($useshow_arr_j1,$show);
                            echo "</tr>";
                        }
                    }
                    else if(count($useshow_arr_s1)>0){
                        foreach($useshow_arr_s1 as $show => $raw) {
                            echo "<tr><td>".$useshow_arr_s1[$show]['name']."</td>";
                            show_equipment_usage($useshow_arr_t1,$show);
                            show_equipment_usage($useshow_arr_s1,$show);
                            show_equipment_usage($useshow_arr_n1,$show);
                            show_equipment_usage($useshow_arr_j1,$show);
                            echo "</tr>";
                        }
                    }
                    else if(count($useshow_arr_n1)>0){
                        foreach($useshow_arr_n1 as $show => $raw) {
                            echo "<tr><td>".$useshow_arr_n1[$show]['name']."</td>";
                            show_equipment_usage($useshow_arr_t1,$show);
                            show_equipment_usage($useshow_arr_s1,$show);
                            show_equipment_usage($useshow_arr_n1,$show);
                            show_equipment_usage($useshow_arr_j1,$show);
                            echo "</tr>";
                        }
                    }
                    if(count($useshow_arr_j1)>0){
                        foreach($useshow_arr_j1 as $show => $raw) {
                            if(!isset($useshow_arr_t1[$show]['name'])){
                                echo "<tr><td>".$useshow_arr_j1[$show]['name']."</td>";
                                show_equipment_usage($useshow_arr_t1,$show);
                                show_equipment_usage($useshow_arr_s1,$show);
                                show_equipment_usage($useshow_arr_n1,$show);
                                show_equipment_usage($useshow_arr_j1,$show);
                                echo "</tr>";
                            }
                        }
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