<?php
if (!empty($post->post_password)) {
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) return;
}
?>
	
<?php if ($comments) : ?>

<!--h3 id="comments"><?php comments_number('コメントはありません', 'コメント１件', 'コメント%件');?></h3-->

<ul class="commentlist">
<?php foreach ($comments as $comment) : ?>
<li id="comment-<?php comment_ID() ?>">
<?php echo get_avatar( $comment, 32 ); ?><?php printf('<cite>%s</cite>　', get_comment_author_link()); ?>
<?php if ($comment->comment_approved == '0') : ?>
<strong>あなたのコメントは認証待ちです。</strong>
<?php endif; ?>
<span><?php echo get_comment_time('Y年m月d日 G:i'); ?></span><?php edit_comment_link('編集する',' | ',''); ?>
<?php comment_text() ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf('コメントを書くには<a href="%s">ログイン</a>が必要です', get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<h5>コメントを残す</h5>

<?php if ( $user_ID ) : ?>
<?php printf('<a href="%1$s">%2$s</a>としてログインしています', get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="このユーザーからログアウトする">ログアウト &raquo;</a>
<?php else : ?>
<label for="author">お名前：<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>"><span><?php if ($req) echo "（必須）"; ?></span></label>
<label for="email">E-mail：<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>"><span><?php if ($req) echo "（必須／非公開）"; ?></span></label>
<!--
<label for="url">ホームページURL</label><br />
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /><br />
-->
<?php endif; ?>

<textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea>
<p class="alignC"><input name="submit" type="submit" id="submit" tabindex="5" value="コメントを送信する" class="submit"></p>
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; ?>
<?php endif; ?>
