//ローダー
$(document).ready(function () {
  $(window).load(function () {
    $("#loader").fadeOut(500, "linear")
  });
});


//ネタバレ投稿用アコーディオン
$(function(){
	$(".netabare dt").on("click", function() {
	$(this).next().slideToggle();
	});
});


//ハンバーガーメニュー
jQuery(document).ready(function(){
	jQuery('.navBtn').on('click', function(){
	jQuery(this).toggleClass('active');
});


// #で始まるアンカーをクリックした場合に処理
	 $(function(){
		 $('a[href^=#]').click(function() {
				// スクロールの速度
				var speed = 500; // ミリ秒
				// アンカーの値取得
				var href= $(this).attr("href");
				// 移動先を取得
				var target = $(href == "#" || href == "" ? 'html' : href);
				// 移動先を数値で取得
				var position = target.offset().top;
				// スムーススクロール
				$('body,html').animate({scrollTop:position}, speed, 'swing');
				return false;
		 });
	});
});


// ページトップへ
$(document).ready(function() {
	var pagetop = $('.pagetop');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			pagetop.fadeIn();
		} else {
			pagetop.fadeOut();
			}
		});
		pagetop.click(function () {
			$('body, html').animate({ scrollTop: 0 }, 500);
			return false;
	});
});


//タブメニュー
$(function() {
	//クリックしたときのファンクションをまとめて指定
	$('.tabMenu > li').click(function() {

		//.index()を使いクリックされたタブが何番目かを調べ、
		//indexという変数に代入します。
		var index = $('.tabMenu > li').index(this);

		//コンテンツを一度すべて非表示にし、
		$('.tabContents > div').css('display','none');

		//クリックされたタブと同じ順番のコンテンツを表示します。
		$('.tabContents > div').eq(index).fadeIn().css('display','block');

		//一度タブについているクラスselectを消し、
		$('.tabMenu > li').removeClass('select');

		//クリックされたタブのみにクラスselectをつけます。
		$(this).addClass('select')
	});
});

//他ページからタブに直接リンクできるタブメニュー追記
$(function() {
	//location.hashで#以下を取得 変数hashに格納
		var hash = location.hash;	
		//hashの中に#tab～が存在するか調べる。
		hash = (hash.match(/^#tab\d+$/) || [])[0];
	   
		 //hashに要素が存在する場合、hashで取得した文字列（#tab2,#tab3等）から#より後を取得(tab2,tab3)	
		if($(hash).length){
		var tabname = hash.slice(1) ;
		} else{
		// 要素が存在しなければtabnameにtab1を代入する
		var tabname = "tab1";}
		//コンテンツを一度すべて非表示にし、
		$('.tabContents > div').css('display','none');

		//一度タブについているクラスselectを消し、
		$('.tabMenu > li').removeClass('select');

		var tabno = $('.tabMenu li#' + tabname).index();
		
		//クリックされたタブと同じ順番のコンテンツを表示します。
		$('.tabContents > div').eq(tabno).fadeIn();
		
		//クリックされたタブのみにクラスselectをつけます。
		$('.tabMenu > li').eq(tabno).addClass('select')
});