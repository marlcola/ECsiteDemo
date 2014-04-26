
$(function() {

    /***************************************************************************
     * 
     * 変数
     * 
     **************************************************************************/

    // フッタセレクタ
    var $footer = $('#footer');
    // ボディセレクタ
    var $body = $('body');
    // ボタンセレクタをセット
    var $pageTopButton = $('#page-top');
    
    var $carouselItem = $('#item-carousel > .carousel-inner');

    // フッタ表示フラグ
    var showFooterFlug = false;
    // ボタン表示フラグ
    var showTopButtonFlug = false;

    //画面下位置を取得
    var bottomPos = $(document).height() - $(window).height();





    /***************************************************************************
     * 
     * 初期設定
     * 
     **************************************************************************/

    // フッタの表示位置を確保
    $body.css("margin-bottom", ($footer.height() + 10) + 'px');
    
    // カルーセル画像を中央に配置
    $carouselItem.find('img').css('margin-left', ($carouselItem.width() - 400)/2 + 'px');
    
    // ボタンの表示位置を調整
    $pageTopButton.css('bottom', '-100px');

    // ウィンドウより小さかったら開く
    openFooter();

    // slideを画面右外へ配置
    $footer.css('bottom', -$footer.height() + 'px');

    /***************************************************************************
     * 
     * イベント
     * 
     **************************************************************************/

    /****************************
     * スクロール
     ****************************/
    $(window).scroll(function() {
        openFooter();
        movePageTop();
    });

    /****************************
     * "閉じる"ボタンのクリック
     ***************************/
    $('#close').click(function() {
        $footer.hide();
    });

    /****************************
     * トップボタンのクリック
     ***************************/
    $pageTopButton.click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });

    /***************************
     * ウィンドウリサイズ
     **************************/
    $(window).resize(function() {
        // ウィンドウ幅を更新
        winWidth = $body.outerWidth(true);
        // スクロール位置の更新
        bottomPos = $(document).height() - $(window).height() * 1.1;
    });

    /**************************
     * ログインモーダルボタン
     *************************/
    $('#OuterLoginFormSubmit').click(function() {
        $('#InnerLoginFormSubmit').click();
    });

    /*************************
     * 
     ************************/
    $('input:checkbox:checked').parent().button('toggle');
    
    /*************************
     * カテゴリボタンのフラッシュ
     ************************/
    $('#CategoryButtonFlash').click(function() {
        $('input:checkbox:checked').parent().button('toggle');
    });

    /***************************************************************************
     * 
     * ファンクション
     *
     **************************************************************************/

    /****************************
     * フッターを開く
     * @returns {undefined}
     ****************************/
    function openFooter() {
        // スクロール位置の更新
        bottomPos = $(document).height() - $(window).height() * 1.1;

        // スクロールトップが、フッタ表示スクロール位置を超えた場合
        if ($(this).scrollTop() >= bottomPos) {
            // フッタが表示していない場合
            if (showFooterFlug === false) {
                // フッタ表示フラグをオン
                showFooterFlug = true;
                // フッタを右からアニメーションで表示
                $footer.stop().animate({'bottom': '0px'}, 200);
            }
        } else {
            // フッタが表示している場合
            if (showFooterFlug) {
                // フッタ表示フラグをオフ
                showFooterFlug = false;
                // フッタを右にアニメーションで非表示
                $footer.stop().animate({'bottom': -$footer.height() + 'px'}, 200);
            }
        }
    }

    function movePageTop() {
        // スクロールトップが100以上なら
        if ($(this).scrollTop() > 100) {
            // ボタンが表示していないなら
            if (showTopButtonFlug === false) {
                // ボタン表示フラグをオン
                showTopButtonFlug = true;
                // アニメーションでボタンの表示
                $pageTopButton.stop().animate({'bottom': '20px'}, 200);
            }
        } else {
            // ボタンが表示しているなら
            if (showTopButtonFlug) {
                // ボタン表示フラグをオフ
                showTopButtonFlug = false;
                // アニメーションでボタンを非表示
                $pageTopButton.stop().animate({'bottom': '-100px'}, 200);
            }
        }
    }
});