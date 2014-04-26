<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
// $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeDescription = __d('cake_dev', 'CakePHP の練習');
?>
<?php echo $this->Html->docType(); ?>
<html>
    <!--ヘッダ-->
    <head>
        <?php echo $this->Html->charset(); ?>
        <!--タイトル-->
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        // アイコン
        echo $this->Html->meta('icon');
        // CakePHP の初期CSS
        //echo $this->Html->css('cake.generic');
        
        // ベースとなるCSS
        // echo $this->Html->css('base');
        echo $this->Html->css('base', null, array('inline' => FALSE));
        
        // 外部ファイルとスクリプトの読み込み(HtmlHelper)
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <!--/ヘッダ-->

    <!--ボディ-->
    <body>
        <!--外枠-->
        <div id="wrap">

            <!--コンテナ-->
            <div id="container">

                <!--コンテンツヘッダ-->
                <div id="header">
                    <!--CakePHPサイトへのリンク
                    <h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
                    -->
                </div>
                <!--/コンテンツヘッダ-->

                <!--コンテンツボディ-->
                <div id="content">

                    <!--セッションメッセージ表示域-->
                    <?php echo $this->Session->flash(); ?>

                    <!--コンテンツ表示域-->
                    <?php echo $this->fetch('content'); ?>

                    <!--サイドバー表示域-->
                    <?php echo $this->element('sidebar'); ?>

                </div>
                <!--/コンテンツボディ-->

                <!--コンテンツフッタ-->
                <div id="footer">
                    <!--CakePHPサイトへの画像リンク
                    <?php
                    echo $this->Html->link(
                            $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)
                    );
                    ?>
                    -->
                </div>
                <!--/コンテンツフッタ-->

            </div>
            <!--/コンテナ-->

            <!--SQLダンプのエレメント-->
            <?php echo $this->element('sql_dump'); ?>

        </div>
    </body>
    <!--/ボディ-->
</html>
