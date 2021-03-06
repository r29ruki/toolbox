<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="EQUIPMENT | Mr.Children 使用楽器・機材のデータベース。非公式ファンサイト。" />
        <title>EQUIPMENT | TOOLBOX | Mr.Children 使用楽器・機材のデータベース。非公式ファンサイト。</title>
        
        <link href="https://mrchildren.tools/wp-content/themes/toolbox/css/style.css" rel="stylesheet">
        <link href="https://mrchildren.tools/wp-content/themes/toolbox/css/jquery.bxslider.css" rel="stylesheet">
    </head>
    
    <body>
        <div id="loader"><div><img src="https://mrchildren.tools/wp-content/themes/toolbox/img/loader.gif" alt="now loading..."></div></div>
        
        <header>
            <div class="inner cf">
                <h1>EQUIPMENT | TOOLBOX | Mr.Children 使用楽器・機材のデータベース。非公式ファンサイト。</h1>
                <p><a href="https://mrchildren.tools"><strong>TOOLBOX</strong>Mr.Children's Music Equipment Detabase</a></p>
                
                <label class="toggle" for="open">
                    <span class="navBtn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </label>
                <input id="open" type="checkbox">
                <div id="navBg"></div>
                
                <nav>
                    <ul class="cf">
                        <li><a href="https://mrchildren.tools">HOME<span>ホーム</span></a></li>
                        <li><a href="https://mrchildren.tools/equipment/">EQUIPMENT<span>楽器・機材</span></a>
                        <ul>
                            <li><a href="https://mrchildren.tools/archive/sakurai/">SAKURAI's</a></li>
                            <li><a href="https://mrchildren.tools/archive/tahara/">TAHARA's</a></li>
                            <li><a href="https://mrchildren.tools/archive/nakagawa/">NAKAGAWA's</a></li>
                            <li><a href="https://jen.mrchildren.tools/" target="_blank" rel="noopener noreferrer">JEN's</a></li>
                            <li><a href="https://mrchildren.tools/archive/kouguchi/">KOUGUCHI's</a></li>
                        </ul>
                        </li>
                        <li><a href="#">DATA<span>その他データ</span></a>
                        <ul>
                            <li><a href="https://mrchildren.tools">ANALYTICS (TBD)</a></li>
                            <li><a href="https://mrchildren.tools/live/">LIVE</a></li>
                            <li><a href="https://mrchildren.tools/archive/media/">MEDIA</a></li>
                            <li><a href="https://mrchildren.tools/archive/songs/">SONGS</a></li>
                        </ul>
                        </li>
                        <li><a href="#">COMMUNITY<span>交流</span></a>
                        <ul>
                            <li><a href="/bbs_live/yybbs.cgi">LIVE BOARD</a></li>
                            <li><a href="https://mrchildren.tools/archive/blog/">BLOG</a></li>
                            <li><a href="https://twilog.org/TOOLBOX_M" target="_blank" rel="noopener noreferrer">Twilog</a></li>
                        </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <section class="wrapper">
            <h2>管理者用投稿マニュアル</h2>
            
            <div class="inner cf">
                <ul id="pankuzu">
                    <li><a href="https://mrchildren.tools/">TOOLBOX HOME</a></li>
                    <li>管理者用投稿マニュアル</li>
                </ul>
                
                <div id="main">
                    <div class="post">
                        <h4>記事の新規投稿</h4>
                        
                        <p>楽器情報、ブログ等の投稿は、以下の手順で管理画面から行います。</p>
                        
                        <p>■管理画面ログインURL<br>
                            <a href="https://mrchildren.tools/wp-login.php" target="_blank">https://mrchildren.tools/wp-login.php</a><br>
                        <small>※ID・PWは、別途送付</small></p>
                        
                        <p>ログイン後、管理画面左のメニューから「投稿→新規追加」をクリック。</p>
                        
                        <p><img src="img/pic01.jpg" alt="画面キャプチャ"></p>
                        
                        <p>■機材情報の場合</p>
                        <p>①タイトルを入力<br>
                            ②本文を入力<br>
                            ③掲載カテゴリを選択<br>
                            ④FinishとMakerを選択・入力<br>
                            ⑤記事に関連する語句（タグ）を入力し<br>
                            ⑥「パーマリンク」が表示されたら「編集」ボタンを押して「post」と入力<sup>※</sup><br>
                        ⑦最後に「公開」ボタンをクリックしてください。</p>
                        
                        <p class="fs80">※パーマリンクは、タイトルの入力内容に応じて自動で「post-〇〇〇」と割り当てられますが、タイトルが英数字の場合、そのまま英数字が小文字で反映されてしまうので、手動で「post」と打ち直してください。「post」と入れると、「post-100」のように自動で連番になります。</p>
                        
                        <p><img src="img/pic02.jpg" alt="画面キャプチャ"></p>
                    </div>
                    
                    <div class="post">
                        <h4>ネタバレ投稿</h4>
                        
                        <p>ネタバレの内容を含める場合は、下記のソースコードをコピペして、投稿文内に記述してください。<br>
                        これを記述する事により、クリックで表示・非表示できるエリアが作成できます。</p>
                        
                        <h5>ソースコード</h5>
                        
                        <pre>
<code>&lt;dl class="netabare"&gt;
&lt;dt&gt;続きを読む（ネタバレ含む）&lt;/dt&gt;
&lt;dd&gt;
&lt;p&gt;ここに本文を書く&lt;/p&gt;
&lt;p&gt;ここに本文を書く&lt;/p&gt;
&lt;/dd&gt;
&lt;/dl&gt;</code>
</pre>
                        
                        <h5 class="mt30">実際の表示</h5>
                        
                        <dl class="netabare">
                            <dt>続きを読む（ネタバレ含む）</dt>
                            <dd>
                            <p>ここに本文を書く</p>
                            <p>ここに本文を書く</p>
                            </dd>
                        </dl>
                    </div>
                </div>
                
                <div id="side">
                    <ul class="sbnr">
                        <li><a href="http://toolbox.moo.jp/archive/extra/">EXTRA</a></li>
                        <li><a href="http://toolbox.moo.jp/notfound/">NOT FOUND</a></li>
                        <li class="tw"><a href="https://twitter.com/TOOLBOX_M" target="_blank"><img src="http://toolbox.moo.jp/wp/wp-content/themes/toolbox/img/tw.png"></a></li>
                    </ul>
                    
                    <form role="search" method="get" id="searchform" action="http://toolbox.moo.jp/" >
                        <input type="search" value="" name="s" id="s" placeholder="例：Fender"> <input type="submit" value="検索">
                    </form>
                    
                    <br>
                    
                <div class="tw"><a class="twitter-timeline" data-height="500" data-theme="light" href="https://twitter.com/TOOLBOX_M?ref_src=twsrc%5Etfw">Tweets by TOOLBOX_M</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></div></div>
            </div>
        </div>
    </section>
    
        
        <div class="pagetop"><a href="#"><img src="https://mrchildren.tools/wp-content/themes/toolbox/img/pagetop.png" alt="ページトップへ"></a></div>
        
        <footer>
            <ul class="cf">
                <li><a href="https://mrchildren.tools">HOME</a></li>
                <li><a href="https://mrchildren.tools/equipment/">EQUIPMENT</a></li>
                <li><a href="#">ANALYTICS (TBD)</a></li>
                <li><a href="https://mrchildren.tools/live/">LIVE</a></li>
                <li><a href="https://mrchildren.tools/archive/song/">SONGS</a></li>
                <li><a href="https://mrchildren.tools/archive/blog/">BLOG</a></li>
                <li><a href="/bbs_live/yybbs.cgi">LIVE BOARD</a></li>
                <li><a href="https://mrchildren.tools/archive/extra/">EXTRA</a></li>
                <li><a href="https://mrchildren.tools/notfound/">NOT FOUND</a></li>
            </ul>
            
            <p>&copy; TOOLBOX / Taira</p>
        </footer>
        
        <script src="https://mrchildren.tools/wp-content/themes/toolbox/js/jquery-1.11.1.min.js"></script>
        <script src="https://mrchildren.tools/wp-content/themes/toolbox/js/script.js"></script>
        <script src="https://mrchildren.tools/wp-content/themes/toolbox/js/ga.js"></script>
        <script src="https://mrchildren.tools/wp-content/themes/toolbox/js/jquery.bxslider.js"></script>
        <script>
            $(function(){
            $('.bxslider').bxSlider({
            mode: 'fade',
            auto:true,
            });
            });
        </script>
    </body>
</html>

