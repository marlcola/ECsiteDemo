<!-- 右側ボックス-->
<div id="rightbox">
    <div id="main">
        <div id="main2">
            
            <!-- メインボックス-->
            <div id="mainbox" class="clearfix">
                <!--コンテンツタイトル-->
                <h2>商品一覧</h2>
                <!-- リスト-->
                <div class="list clearfix">

                    <!--商品リスト項目-->
                    <?php foreach ($mItems as $mItem) { ?>

                        <dl class="products">
                            <dt>
                            <a href="DPurchaseDetailsController.php">
                                <img src="../img/thumb/<?php echo $mItem['MItem']['image']; ?>" alt="" /><br />
                                <?php echo $mItem['MItem']['item_name']; ?>
                            </a>
                            </dt>
                            <dd>&yen;<?php echo $mItem['MItem']['price']; ?></dd>
                        </dl>
                    
                    <?php } ?>
                    <!--/商品リスト項目-->

                </div>
                <!-- /リスト-->

                <!-- コンテンツフッタ -->
                <div id="footer">
                    <p class="copy">Copyright &copy; 2008 oh yeah !! All Rights Reserved.</p>
                </div>
                <!-- /コンテンツフッタ -->

            </div>
            <!-- /メインボックス-->
        </div>
    </div>
</div>

