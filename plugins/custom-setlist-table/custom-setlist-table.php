<?php
/*
Plugin Name: Custom Setlist Table
Plugin URI: 
Description: カスタムフィールドの値をオリジナルのテーブル（DB）に保存する
Author: R.K
Version: 2.2
Author URI: 
*/
class CustomSetlistTable {
    //プラグインのテーブル名
    var $table_name;
    
    public function __construct()
    {
        global $wpdb;
        // 接頭辞（wp_）を付けてテーブル名を設定
        $this->table_name = $wpdb->prefix . 'setlist';
        // プラグイン有効化したとき実行
        register_activation_hook (__FILE__, array($this, 'cmt_activate'));
        // カスタムフィールドの作成
        add_action( 'add_meta_boxes', array($this, 'ex_metabox'));
        add_action ('save_post', array($this, 'save_meta'));
		//add_action ('wp_insert_post ', array($this, 'save_meta'));
		add_action ('delete_post', array($this, 'dalete_meta'));
		add_action ('publish_to_trash', array($this, 'trash_meta'));
		add_action ('draft_to_trash', array($this, 'trash_meta'));
		add_action ('feature_to_trash', array($this, 'trash_meta'));
    }
    
    function cmt_activate() {
        global $wpdb;
        
        $cmt_db_version = '1.0';
        $installed_ver = get_option( 'cmt_meta_version' );
        // テーブルのバージョンが違ったら作成
        if( $installed_ver != $cmt_db_version ) {
            $sql = "CREATE TABLE " . $this->table_name . " (
          set_id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
          post_id bigint(20) UNSIGNED DEFAULT '0' NOT NULL,
          show_date date,
          show_name text,
          show_venue text,
          song_num int(11),
          song_name text,
          tahara_eq1 text,
          tahara_eq2 text,
          sakurai_eq1 text,
          sakurai_eq2 text,
          nakagawa_eq1 text,
          nakagawa_eq2 text,
          jen_eq1 text,
          jen_eq2 text,
          jen_eq3 text,
          sunny_eq1 text,
          sunny_eq2 text,
          sunny_eq3 text,
          sunny_eq4 text,
          sebu_eq1 text,
          sebu_eq2 text,
          sebu_eq3 text,
          koba_eq1 text,
          koba_eq2 text,
          koba_eq3 text,
          ura_eq1 text,
          ura_eq2 text,
          ura_eq3 text,
          kouguchi_eq1 text,
          kouguchi_eq2 text,
          UNIQUE KEY set_id (set_id)
        )
        CHARACTER SET 'utf8';";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
            update_option('cmt_meta_version', $cmt_db_version);
        }
    }
    
    function ex_metabox( $post ) {
        add_meta_box( 
        'exmeta_sectionid',
        '公演情報',
        array($this, 'ex_meta_html'),
        'post'
        );
    }
    function ex_meta_html () {
        wp_nonce_field( plugin_basename( __FILE__ ), $this->table_name );
        global $post;
        global $wpdb;
        
        $get_meta = $wpdb->get_results(
        $wpdb->prepare( "SELECT * FROM
        ".$this->table_name. " WHERE
        post_id = %d", $post->ID
        )
        );
        $get_meta = isset($get_meta[0]) ? $get_meta[0] : null;
        $show_name = isset($get_meta->show_name) ? $get_meta->show_name : null;
        $show_date = isset($get_meta->show_date) ? $get_meta->show_date : null;
        $show_venue = isset($get_meta->show_venue) ? $get_meta->show_venue : null;
        ?>
        <div>
            <table>
                <tr>
                    <th>公演名</th>
                    <td><input name="show_name" value="<?php echo $show_name ?>" /></td>
                    <th>日付</th>
                    <td><input name="show_date" value="<?php echo $show_date ?>" /></td>
                    <th>会場</th>
                    <td><input name="show_venue" value="<?php echo $show_venue ?>" /></td>
                </tr>
            </table>
        </div>
        <?php
    }
    
    function save_meta($post_id) {
        //$temp_show_name = $_POST['show_name'];
        //$temp_show_date = $_POST['show_date'];
        $temp_show_name = isset($_POST['show_name']) ? $_POST['show_name'] : null;
        $temp_show_date = isset($_POST['show_date']) ? $_POST['show_date'] : null;
        $temp_show_venue = isset($_POST['show_venue']) ? $_POST['show_venue'] : null;
        
        //printf("<br>show_name = %s<br>show_date = %s<br>",$temp_show_name,$temp_show_date);
        //print_r($_POST);
        //echo 'This request contained ' . count( $_POST ) . ' POST vars, ' . count( $_GET ) . ' GET vars, and ' . count( $_COOKIE ) . ' Cookies.'; 
        //if (!isset($_POST[$this->table_name])) printf("not set table_name"); return; 
        if (!isset($_POST[$this->table_name])) return; 
        
        //if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) printf("DOING AUTOSAVE"); return;
        //if ( !wp_verify_nonce( $_POST[$this->table_name], plugin_basename( __FILE__ ) ) ) printf("nonce not verified"); return;
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if ( !wp_verify_nonce( $_POST[$this->table_name], plugin_basename( __FILE__ ) ) ) return;
        
        global $wpdb;
        global $post;
        
        //リビジョンを残さない
        //if ($post->ID != $post_id) printf("wrong post_id"); return;
        if ($post->ID != $post_id) return;
        
        //キー情報、BPM情報のいずれかが入っていれば楽曲情報投稿として自動リンク追加して処理終了
        if((post_custom('KEY') != "") || (post_custom('BPM') != "")){
            $autolink_table = "wp_seo_automated_link_building";
            $wplink_table = "wp_links";
            $post_title = get_the_title();
            $permalink = get_permalink();
            //printf("insert keywords and permalink<br>");
            //print_r($keyword_arr);
            
            if(post_custom('user') == "admin"){
                //adminフラグが入っている投稿の場合、wp_linksにリンク情報を追加
                $get_id = $wpdb->get_var(
                    $wpdb->prepare( "SELECT link_id FROM ". $wplink_table ." WHERE 
                            link_url = %s OR link_name = %s", $permalink, $post_title)
                );

                $keywords = ''.$post_title.'　';
                $keyword_arr = array(
                'link_name' => $keywords,
                'link_url' => $permalink,
                'link_visible' => "Y",
                'link_owner' => 1
                );

                //レコードがなかったら新規追加あったら更新
                if (isset($get_id)) {
                    $wpdb->update( $wplink_table, $keyword_arr, array('link_id' => $get_id));
                    //デバッグ用
                    //printf("<br><br>updating post...<br><br>");
                    //echo "<br>";
                } else {
                    $wpdb->insert( $wplink_table, $keyword_arr);
                    //デバッグ用
                    //printf("<br><br>inserting post...<br><br>");
                }
                $wpdb->show_errors();

                //automated_link_building側にレコードがある場合はDELETE
                $get_del_id = $wpdb->get_var(
                    $wpdb->prepare( "SELECT id FROM
                        ". $autolink_table ." WHERE 
                        url = %s OR title = %s", $permalink, $post_title)
                );
                if (isset($get_del_id)) {
                    $wpdb->delete( $autolink_table, array('id' => $get_del_id));
                    //デバッグ用
                    //printf("<br><br>deleting post...<br><br>");
                    //echo "<br>";
                }
                $wpdb->show_errors();
            }
            else{
                $get_id = $wpdb->get_var(
                    $wpdb->prepare( "SELECT id FROM
                        ". $autolink_table ." WHERE 
                        url = %s OR title = %s", $permalink, $post_title)
                );
                //print_r($song_name[$i]);
                //print_r($get_id);

                $keywords = '["'.$post_title.'"]';
                $keyword_arr = array(
                'title' => $post_title,
                'keywords' => $keywords,
                'url' => $permalink,
                'num' => 1
                );

                //レコードがなかったら新規追加あったら更新
                if (isset($get_id)) {
                    $wpdb->update( $autolink_table, $keyword_arr, array('id' => $get_id));
                    //デバッグ用
                    //if ($i == 0) print_r($_POST);
                    //printf("<br><br>updating post...<br><br>");
                    //echo "<br>";
                } else {
                    $wpdb->insert( $autolink_table, $keyword_arr);
                    //デバッグ用
                    //if ($i == 0) print_r($_POST);
                    //printf("<br><br>inserting post...<br><br>");
                }
                $wpdb->show_errors();
                //wp_links側にレコードがある場合はDELETE
                $get_del_id = $wpdb->get_var(
                    $wpdb->prepare( "SELECT link_id FROM ". $wplink_table ." WHERE 
                            link_url = %s OR link_name = %s", $permalink, $post_title)
                );
                if (isset($get_del_id)) {
                    $wpdb->delete( $wplink_table, array('link_id' => $get_del_id));
                    //デバッグ用
                    //printf("<br><br>deleting post...<br><br>");
                    //echo "<br>";
                }
                $wpdb->show_errors();
            }

            return;
        }
        
        if(!isset($temp_show_name)&&!isset($temp_show_date)&&!isset($temp_show_venue)) return; //公演情報がすべて存在しない場合は処理終了
        
        $song_name = $_POST['smart-custom-fields']['name']; // 'name' というキーを持つカスタムフィールドの値を取得
        $t_tmp = $_POST['smart-custom-fields']['tahara']; // 'tahara' というキーを持つカスタムフィールドの値を取得
        $s_tmp = $_POST['smart-custom-fields']['sakurai']; // 'sakurai' というキーを持つカスタムフィールドの値を取得
        $n_tmp = $_POST['smart-custom-fields']['nakagawa']; // 'nakagawa' というキーを持つカスタムフィールドの値を取得
        $j_tmp = $_POST['smart-custom-fields']['jen']; // 'jen' というキーを持つカスタムフィールドの値を取得
        $sun_tmp = $_POST['smart-custom-fields']['sunny']; 
        $seb_tmp = $_POST['smart-custom-fields']['sebu']; 
        $kob_tmp = $_POST['smart-custom-fields']['koba']; 
        $ura_tmp = $_POST['smart-custom-fields']['ura']; 
        $kog_tmp = $_POST['smart-custom-fields']['kogu']; 
        
        $i = 0;
        $sup_key = -1;
        $prev_key = 0;
        //曲名の配列に要素が存在する分だけループ
        foreach( $song_name as $key => $value ){
            if($key - $prev_key == 1){
                $sup_key++;
            }
            else{
                $sup_key = $sup_key + ($key - $prev_key +1);
            }
            $prev_key = $key;
            
            //2種類以上楽器を使用していた場合に分割して保存する
            $t_arr = preg_split("/[,;]/", $t_tmp[$key],2);
            $s_arr = preg_split("/[,;]/", $s_tmp[$key],2);
            $n_arr = preg_split("/[,;]/", $n_tmp[$key],2);
            $j_arr = preg_split("/[,;]/", $j_tmp[$key],3);
            $sun_arr = preg_split("/[,;]/", $sun_tmp[$sup_key],4);
            $seb_arr = preg_split("/[,;]/", $seb_tmp[$sup_key],3);
            $kob_arr = preg_split("/[,;]/", $kob_tmp[$sup_key],3);
            $ura_arr = preg_split("/[,;]/", $ura_tmp[$sup_key],3);
            $kog_arr = preg_split("/[,;]/", $kog_tmp[$sup_key],2);
            
            //保存するために配列にする
            $set_arr = array(
            'show_name' => $temp_show_name,
            'show_venue' => $temp_show_venue,
            'song_num' => $i,
            //'song_name' => $song_name[$key],
            'song_name' => $value,
            'tahara_eq1' => $t_arr[0],
            'sakurai_eq1' => $s_arr[0],
            'nakagawa_eq1' => $n_arr[0],
            'jen_eq1' => $j_arr[0],
            'tahara_eq2' => $t_arr[1],
            'sakurai_eq2' => $s_arr[1],
            'nakagawa_eq2' => $n_arr[1],
            'jen_eq2' => $j_arr[1],
            'jen_eq3' => $j_arr[2],
            'sunny_eq1' => $sun_arr[0],
            'sunny_eq2' => $sun_arr[1],
            'sunny_eq3' => $sun_arr[2],
            'sunny_eq4' => $sun_arr[3],
            'sebu_eq1' => $seb_arr[0],
            'sebu_eq2' => $seb_arr[1],
            'sebu_eq3' => $seb_arr[2],
            'koba_eq1' => $kob_arr[0],
            'koba_eq2' => $kob_arr[1],
            'koba_eq3' => $kob_arr[2],
            'ura_eq1' => $ura_arr[0],
            'ura_eq2' => $ura_arr[1],
            'ura_eq3' => $ura_arr[2],
            'kouguchi_eq1' => $kog_arr[0],
            'kouguchi_eq2' => $kog_arr[1],
            'show_date' => $temp_show_date
            );
            
            //1行目の曲名が空欄の場合は削除
            if($i == 0){
                $get_meta = $wpdb->get_results(
                $wpdb->prepare( "SELECT * FROM
                ".$this->table_name. " WHERE
                post_id = %d", $post->ID
                        )
                );
                $get_meta = isset($get_meta[0]) ? $get_meta[0] : null;
                $set_id = isset($get_meta->song_name) ? $get_meta->set_id : null;
                if($set_id){
                    $wpdb->delete( $this->table_name, array( 'set_id' => $set_id ));
                }
            }
            //$get_id = 0;
            $get_id = $wpdb->get_var(
            $wpdb->prepare( "SELECT set_id FROM
                    ". $this->table_name ." WHERE 
                    post_id = %d AND song_num = %d", $post_id, $i)
            );
            //print_r($song_name[$i]);
            //print_r($get_id);
            //レコードがなかったら新規追加あったら更新
            if ($get_id) {
                $wpdb->update( $this->table_name, $set_arr, array('set_id' => $get_id));
                //デバッグ用
                //log_it($_POST);
                //log_it('The value for ' . $custom_field . ' is ' . $_POST[$custom_field]);
                //if ($i == 0) print_r($_POST);
                //printf("<br><br>updating post...%d<br><br>",$i);
                //echo "update KEY=".$key."/id=".$i."/sunny1=".$sun_eq1[$key]."<br>";
                //print_r($set_arr);
                //echo "<br>";
                //$tmp = fopen(dirname(__file__).'/my_logs.txt', "a+"); fwrite($tmp,"\r\n\r\n".$_POST);fclose($tmp);
            } else {
                $set_arr['post_id'] = $post_id;
                $wpdb->insert( $this->table_name, $set_arr);
                //デバッグ用
                //log_it($_POST);
                //log_it('The value for ' . $custom_field . ' is ' . $_POST[$custom_field]);
                //if ($i == 0) print_r($_POST);
                //printf("<br><br>inserting post...%d<br><br>",$i);
                //echo "insert KEY=".$key."/id=".$i."/sunny1=".$sun_eq1[$key]."<br>";
                //$tmp = fopen(dirname(__file__).'/my_logs.txt', "a+"); fwrite($tmp,"\r\n\r\n".$_POST);fclose($tmp);
            }
            $wpdb->show_errors();
            $i++;
        }
		//foreachから抜けても次の曲idが存在していた場合はDelete
        $get_nextid = 0;
        $get_nextid = $wpdb->get_var(
            $wpdb->prepare( "SELECT set_id FROM ". $this->table_name ." WHERE post_id = %d AND song_num = %d", $post_id, $i)
        );
		$i++;
        while($get_nextid > 0){
            $wpdb->delete( $this->table_name, array('set_id' => $get_nextid));
			$get_nextid = $wpdb->get_var(
				$wpdb->prepare( "SELECT set_id FROM ". $this->table_name ." WHERE post_id = %d AND song_num = %d", $post_id, $i)
			);
			$i++;
        }
	}
	
	function trash_meta($post_obj) {
		global $wpdb;
		$post_id = $post_obj->ID;
		$wpdb->query( $wpdb->prepare( "DELETE FROM $this->table_name WHERE post_id = %d", $post_id) );
	}
	
	function dalete_meta($post_id) {
		global $wpdb;
		$wpdb->query( $wpdb->prepare( "DELETE FROM $this->table_name WHERE post_id = %d", $post_id) );
	}
	
    function get_meta($post_id) {
        if (!is_numeric($post_id)) return;
        global $wpdb;
        $get_meta = $wpdb->get_results(
        $wpdb->prepare( "SELECT * FROM
        ".$this->table_name. " WHERE
        post_id = %d", $post_id
        )
        );
        return isset($get_meta[0]) ? $get_meta[0] : null;
    }
    
}
$exmeta = new CustomSetlistTable;
?>