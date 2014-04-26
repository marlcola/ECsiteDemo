<!--ドキュメントタイプ-->
<?php echo $this->Html->docType(); ?>

<html>
    <!--ヘッダ-->
    <head>
        <!--エンコード設定-->
        <!--app/config/core.php の app.encoding がデフォルト値-->
        <?php echo $this->Html->charset(); ?>

        <!--タイトル-->
        <title>
            <?php echo $title_for_layout; ?>
        </title>

        <?php
        // ファビコン
        // echo $this->Html->meta('icon');
        echo $this->Html->meta('favicon.ico', '/ECsite/favicon.ico', array('type' => 'icon', 'inline' => FALSE));

        // jQuery JavaScript
        echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array('inline' => FALSE));

        // Twitter Bootstrap JavaScript
        echo $this->Html->script('bootstrap', array('inline' => FALSE));
        // Twitter Bootstrap CSS
        echo $this->Html->css('bootstrap', null, array('inline' => FALSE));

        // 追加JavaScript
        echo $this->Html->script('original', array('inline' => FALSE));
        // 追加CSS
        echo $this->Html->css('original', null, array('inline' => FALSE));


        // 外部ファイルとスクリプトの読み込み(HtmlHelper)
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <!--/ヘッダ-->

    <!--ボディ-->
    <body>
        
        <?php echo $this->element('login_modal'); ?>
        
        <!--ナビゲーションバー-->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">ECサイト DEMO</a>
                </div>
                
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php echo $this->element('customer_info'); ?>  
                    </ul>
                    
                    <?php echo $this->element('navbar_login'); ?>
                </div>             
            </div>
        </nav>
        <!--/ナビゲーションバー-->
        
        
        
        <!--コンテンツ-->
        <div id="contents" class="container">

            <!--セッションメッセージ表示域-->
            <?php echo $this->Session->flash(); ?>

            <div class="row">
                <!-- サイドバー表示域 -->
                <div class="col-sm-3">
                    <?php echo $this->element('sidebar'); ?>
                </div>
                
                <div class="col-sm-9">
                    <!-- コンテンツ表示域 -->
                    <?php echo $this->fetch('content'); ?>
                    <!-- /コンテンツ表示域 -->
                </div>
                
            </div>
        </div>
        <!-- /コンテンツ -->

        <!--フッター-->
        <div id="footer">
            <div id="slide">
                <div id="slide-in">
                    <h3>Footer</h3>
                    <p>Copyright &copy; 2008 oh yeah !! All Rights Reserved.</p>
                    <p id="close"><a>閉じる</a></p>
                </div>
            </div>
        </div>
        <!-- /フッター -->

        <!-- トップボタン -->
        <p id="page-top"><a href="#">PAGE TOP</a></p>

    </body>
    <!--/ボディ-->
</html>
