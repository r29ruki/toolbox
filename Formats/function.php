#不要なメタボックスを削除
function my_remove_meta_boxes() {
    remove_meta_box('postcustom', 'post', 'normal'); // カスタムフィールド
    remove_meta_box('postimagediv', 'post', 'normal'); // アイキャッチ
    remove_meta_box('trackbacksdiv', 'post', 'normal'); // トラックバック
}
add_action('admin_menu', 'my_remove_meta_boxes');

#投稿記事の定型文設定
add_filter( 'default_content', 'my_editor_content' );
function my_editor_content( $content ) {
	if (empty($content)) {
		return "<!-- コメントで囲われた部分は投稿前に消すこと -->\n<!-- 機材情報投稿の場合 -->\n<!-- ここに本文を記載 -->\n[su_spoiler title='使用楽曲' icon='plus-square-1']\n[cft format=3]\n[/su_spoiler]\n<!-- 「カスタムフィールドテンプレート」に必要情報等を入れる -->\n\n<!-- セットリスト投稿の場合 -->\n[cft format=1]\n<!-- 補足情報等ある場合はここに本文を記載 -->\n";
	} else {
		return $content;
	}
}

#投稿記事の定型文設定
add_filter( 'default_content', 'my_editor_content' );
function my_editor_content( $content ) {
if (empty($content)) {
	return "<!-- コメントで囲われた部分は投稿前に消すこと -->\n<!-- 機材情報投稿の場合 -->\n<!-- ここに本文を記載 -->\n[cft format=3]\n<!-- 「カスタムフィールドテンプレート」に必要情報等を入れる -->\n\n<!-- セットリスト投稿の場合 -->\n[cft format=1]\n<!-- 補足情報等ある場合はここに本文を記載 -->\n";
	} else {
		return $content;
	}
}

