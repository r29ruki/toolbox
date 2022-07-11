#!/usr/local/bin/perl

#┌─────────────────────────────────
#│ YY-BOARD : admin.cgi - 2015/04/12
#│ copyright (c) KentWeb, 1997-2015
#│ http://www.kent-web.com/
#└─────────────────────────────────


# モジュール宣言
use strict;
use CGI::Carp qw(fatalsToBrowser);
use vars qw(%in %cf);
use lib "./lib";
use CGI::Session;
use Digest::SHA::PurePerl qw(sha256_base64);

# 設定ファイル認識
require "./init.cgi";
my %cf = set_init();

# データ受理
my %in = parse_form();

# 認証
check_passwd();

# 管理モード
admin_art();

#-----------------------------------------------------------
#  記事管理
#-----------------------------------------------------------
sub admin_art {
	# 修正フォーム
	if ($in{job} eq "edit" && $in{no}) {
		
		my @log;
		open(DAT,"$cf{datadir}/log.cgi") or err_msg("open err: $cf{datadir}/log.cgi");
		my $top = <DAT>;
		while (<DAT>) {
			my ($no,$reno,$date,$name,$eml,$sub,$com,$url,$host,$pw,$col,$ico) = split(/<>/);

			if ($in{no} == $no) {
				@log = ($name,$eml,$sub,$com,$url,$col,$ico);
				last;
			}
		}
		close(DAT);
		
		if (@log == 0) { err_msg("該当記事は存在しません"); }
		
		# 修正フォーム
		edit_form(@log);
	
	# 修正実行
	} elsif ($in{job} eq "edit2") {
		
		# 入力値補正
		if ($in{url} eq 'http://') { $in{url} = ''; }
		$in{sub} ||= '無題';
		
		# アイコン
		my @icon;
		foreach (@{$cf{icon}}) {
			my ($ico,$nam) = split(/,/);
			push(@icon,$ico);
		}
		
		# データオープン
		my @data;
		open(DAT,"+< $cf{datadir}/log.cgi") or err_msg("open err: $cf{datadir}/log.cgi");
		eval "flock(DAT, 2);";
		my $top = <DAT>;
		while (<DAT>) {
			my ($no,$reno,$date,$name,$eml,$sub,$com,$url,$host,$pw,$col,$ico) = split(/<>/);

			if ($no == $in{no}) {
				$_ = "$no<>$reno<>$date<>$in{name}<>$in{email}<>$in{sub}<>$in{comment}<>$in{url}<>$host<>$pw<>$in{color}<>$icon[$in{icon}]<>\n";
			}
			push(@data,$_);
		}
		
		# 更新
		unshift(@data,$top);
		seek(DAT, 0, 0);
		print DAT @data;
		truncate(DAT, tell(DAT));
		close(DAT);

	# 削除処理
	} elsif ($in{job} eq "dele" && $in{no}) {

		# データオープン
		my @data;
		open(DAT,"+< $cf{datadir}/log.cgi") or err_msg("open err: $cf{datadir}/log.cgi");
		eval "flock(DAT, 2);";
		my $top = <DAT>;
		while (<DAT>) {
			my ($no,$reno,$date,$name,$eml,$sub,$com,$url,$host,$pw,$col,$ico) = split(/<>/);

			# 親/子削除
			next if ($in{no} == $no or $in{no} == $reno);
			
			push(@data,$_);
		}

		# 更新
		unshift(@data,$top);
		seek(DAT, 0, 0);
		print DAT @data;
		truncate(DAT, tell(DAT));
		close(DAT);
	}

	# 管理を表示
	header("管理画面");
	print <<EOM;
<div align="right">
<form action="$cf{bbs_cgi}">
<input type="submit" value="&lt; 掲示板" />
</form>
</div>
<div class="ttl">■ 管理モード</div>
<form action="$cf{admin_cgi}" method="post">
<input type="hidden" name="pass" value="$in{pass}" />
<p>処理を選択して送信ボタンを押してください。</p>
処理：
<select name="job">
<option value="edit">編集</option>
<option value="dele">削除</option>
</select>
<input type="submit" value="送信する" />
EOM

	open(IN,"$cf{datadir}/log.cgi") or err_msg("open err: $cf{datadir}/log.cgi");
	my $top = <IN>;
	while (<IN>) {
		my ($no,$reno,$date,$name,$eml,$sub,$com,$url,$host,$pw,$col,$ico) = split(/<>/);
		$name = qq|<a href="mailto:$eml">$name</a>| if ($eml);

		if (!$reno) {
			print qq|<div class="main">|;
		} else {
			print qq|<div class="sub">|;
		}

		print qq|<input type="radio" name="no" value="$no" />[$no]\n|;
		print qq|<b class="sub">$sub</b> 名前：<b>$name</b> 日時：$date [$host]\n|;
		print qq|<div class="com">| . cut_str($com) . qq|</div>\n|;
		print qq|</div>\n|;
	}
	close(IN);

	print <<EOM;
</form>
</body>
</html>
EOM
	exit;
}

#-----------------------------------------------------------
#  修正フォーム
#-----------------------------------------------------------
sub edit_form {
	my ($name,$eml,$sub,$com,$url,$col,$ico) = @_;
	$com =~ s|<br( /)?>|\n|g;
	$url ||= 'http://';

	my @col = split(/\s+/,$cf{colors});
	my $color;
	foreach (0 .. $#col) {
		if ($col == $_) {
			$color .= qq|<input type="radio" name="color" value="$_" checked="checked" />|;
		} else {
			$color .= qq|<input type="radio" name="color" value="$_" />|;
		}
		$color .= qq|<span style="color:$col[$_]">■</span>\n|;
	}
	my $op_icon;
	foreach (0 .. $#{$cf{icon}}) {
		my ($fnam,$nam) = split(/,/, $cf{icon}->[$_]);
		if ($fnam eq $ico) {
			$op_icon .= qq|<option value="$_" selected="selected">$nam</option>\n|;
		} else {
			$op_icon .= qq|<option value="$_">$nam</option>\n|;
		}
	}

	header("管理モード &gt; 修正フォーム");
	print <<EOM;
<form action="$cf{admin_cgi}" method="post">
<input type="hidden" name="pass" value="$in{pass}" />
<input type="submit" value="&lt; 戻る" />
</form>
<div class="ttl">■ 編集フォーム</div>
<p>▼変更する部分のみ修正して送信ボタンを押して下さい。</p>
<form action="$cf{admin_cgi}" method="post">
<input type="hidden" name="pass" value="$in{pass}" />
<input type="hidden" name="job" value="edit2" />
<input type="hidden" name="no" value="$in{no}" />
<table class="fmtbl">
<tr>
	<th>名前</th>
	<td><input type="text" name="name" value="$name" size="30" /></td>
</tr><tr>
	<th>E-mail</th>
	<td><input type="text" name="email" value="$eml" size="30" /></td>
</tr><tr>
	<th>件名</th>
	<td><input type="text" name="sub" value="$sub" size="40" /></td>
</tr><tr>
	<th>コメント</th>
	<td><textarea name="comment" cols="50" rows="6">$com</textarea></td>
</tr><tr>
	<th>URL</th>
	<td><input type="text" name="url" value="$url" size="40" /></td>
</tr><tr>
	<th>アイコン</th>
	<td>
		<select name="icon">
		$op_icon
		</select>
	</td>
</tr><tr>
	<th>文字色</th>
	<td>$color</td>
</tr>
</table>
<input type="submit" value="送信する" />
</form>
</body>
</html>
EOM
	exit;
}

#-----------------------------------------------------------
#  パスワード認証
#-----------------------------------------------------------
sub check_passwd {
	# パスワードが未入力の場合は入力フォーム画面
	if ($in{pass} eq "") {
		enter_form();

	# パスワード認証
	} elsif ($in{pass} ne $cf{password}) {
		err_msg("認証できません");
	}
}

#-----------------------------------------------------------
#  入室画面
#-----------------------------------------------------------
sub enter_form {
	header("入室画面");
	print <<EOM;
<div align="center">
<form action="$cf{admin_cgi}" method="post">
<table class="enter">
<tr>
	<td height="40">
		<fieldset><legend>管理パスワード入力</legend>
		<div class="passwd">
			<input type="password" name="pass" size="26" />
			<input type="submit" value=" 認証 " />
		</div>
		</fieldset>
	</td>
</tr>
</table>
</form>
<script type="text/javascript">
<!--
self.document.forms[0].pass.focus();
//-->
</script>
</div>
</body>
</html>
EOM
	exit;
}

#-----------------------------------------------------------
#  HTMLヘッダー
#-----------------------------------------------------------
sub header {
	my $ttl = shift;

	print <<EOM;
Content-type: text/html; charset=utf-8

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-style-type" content="text/css" />
<style type="text/css">
<!--
body { font-size:80%; font-family: Verdana,"MS PGothic","Osaka",Arial,sans-serif; }
.red { color:red; }
.grn { color:green; }
table.fmtbl { margin:1em 0; border-collapse:collapse; }
table.fmtbl th, table.fmtbl td { padding:5px; border:1px solid #666; }
table.fmtbl th { background:#ccc; }
b.sub { color:green; }
div.com { margin-left:2em; font-size:12px; color:#804000; }
div.ttl { border-bottom:1px solid #004080; color:#004080; padding:5px; margin:8px 0; font-weight:bold; }
div.main { border-top:1px dotted #000; padding:6px; margin-top:6px; }
div.sub { margin-left:3em; padding:6px; }
.ta-c { text-align:center; }
table.enter { width:380px; margin-top:50px; }
div.passwd { margin:2em; text-align:center; }
-->
</style>
<title>$ttl</title>
</head>
<body>
EOM
}

#-----------------------------------------------------------
#  エラー画面
#-----------------------------------------------------------
sub err_msg {
	my $err = shift;

	header("ERROR");
	print <<EOM;
<div class="ta-c">
<hr width="350" />
<h3>ERROR!</h3>
<p class="red">$err</p>
<hr width="350" />
</div>
</body>
</html>
EOM
	exit;
}

#-----------------------------------------------------------
#  文字カット for UTF-8
#-----------------------------------------------------------
sub cut_str {
	my ($str,$all) = @_;
	$str =~ s|<br( /)?>||g;
	
	my $i = 0;
	my ($ret,$flg);
	while ($str =~ /([\x00-\x7f]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})/gx) {
		$i++;
		$ret .= $1;
		if ($i >= $all) {
			$flg++;
			last if ($i >= 40);
		}
	}
	$ret .= '...' if ($flg);
	
	return $ret;
}


