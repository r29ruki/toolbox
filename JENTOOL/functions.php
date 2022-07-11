<?php
register_sidebar(array(
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));


#概要（抜粋）の省略文字
function my_excerpt_length($length) {
	if( in_category( array('16','3','4','5') ) ){
		return 35;
	}
	else{
		return 250;
	}
}
add_filter('excerpt_length', 'my_excerpt_length');

function my_excerpt_more($post) {
	return '<a href="'. get_permalink($post->ID) . '">' . '…more' . '</a>';
}
add_filter('excerpt_more', 'my_excerpt_more');


#カテゴリ別記事数の数字にもリンクをつける
add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\d+)\)/',' ($1)</a>',$output);
  return $output;
}

#カスタムフィールドの内容も検索結果に含める
function custom_search($search, $wp_query) {
	global $wpdb;

	if (!$wp_query->is_search)
			return $search;
	if (!isset($wp_query->query_vars))
			return $search;

	$search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
	if ( count($search_words) > 0 ) {
			$search = '';
			$search .= "AND post_type = 'post'";
			foreach ( $search_words as $word ) {
					if ( !empty($word) ) {
							$search_word = '%' . esc_sql( $word ) . '%';
							$search .= " AND (
								 {$wpdb->posts}.post_title LIKE '{$search_word}'
								OR {$wpdb->posts}.post_content LIKE '{$search_word}'
								OR {$wpdb->posts}.ID IN (
								SELECT distinct post_id
								FROM {$wpdb->postmeta}
								WHERE meta_value LIKE '{$search_word}'
								)
							) ";
						
					}
			}
	}
	return $search;
}
add_filter('posts_search','custom_search', 10, 2);


#投稿名を自動で設定
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

#(追加)不要なメタボックスを削除
function my_remove_meta_boxes() {
    remove_meta_box('postcustom', 'post', 'normal'); // カスタムフィールド
    remove_meta_box('postimagediv', 'post', 'normal'); // アイキャッチ
    remove_meta_box('trackbacksdiv', 'post', 'normal'); // トラックバック
}
add_action('admin_menu', 'my_remove_meta_boxes');

#hook_suffixの表示
function current_pagehook(){
	global $hook_suffix;
	if( !current_user_can( 'manage_options') ) return;
	echo '<div class="updated"><p>hook_suffix : ' . $hook_suffix . '</p></div>';
}
add_action('admin_notices', 'current_pagehook');

#(追加)投稿記事の定型文設定
add_filter( 'default_content', 'my_editor_content' );
function my_editor_content( $content ) {
if (empty($content)) {
	return "<!-- コメントで囲われた部分は投稿前に消すこと -->\n<!-- 機材情報投稿の場合 -->\n<!-- ここに本文を記載 -->\n[cft format=3]\n<!-- 「カスタムフィールドテンプレート」に必要情報等を入れる -->\n\n<!-- セットリスト投稿の場合 -->\n[cft format=1]\n<!-- 補足情報等ある場合はここに本文を記載 -->\n\n<!-- アルバム・シングル情報投稿の場合 -->\nRelease:\n<!-- 型番情報 -->\n<!-- ジャケット画像 -->\n<h5>収録楽曲</h5>\n<!-- 補足情報等ある場合はここに本文を記載 -->\n\n\n<!-- ネタバレ投稿コピペ用 -->
<dl class='netabare'>
<dt>続きを読む（ネタバレ含む）</dt>
<dd>
ここに本文を書く
ここに本文を書く
</dd>
</dl>";
	} else {
		return $content;
	}
}
?>
