<!--商品カルーセル-->
<div id="item-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php for ($i = 0; $i < count($mItems); $i++) : ?>
            <?php if ($i === 0) : ?>
                <li data-target="#item-carousel" data-slide-to="<?php echo $i; ?>" class="active"></li>
            <?php else : ?>
                <li data-target="#item-carousel" data-slide-to="<?php echo $i; ?>"></li>
            <?php endif; ?>

        <?php endfor; ?>
    </ol>

    <div class="carousel-inner">
        <?php $firstMItem = array_shift($mItems); ?>
        <div class="item active">
            <?php echo $this->Html->image('EG/' . $firstMItem['MItem']['image'], array('alt' => $firstMItem['MItem']['item_name'])); ?>
            <div class="carousel-caption"></div>
        </div>
        <?php foreach ($mItems as $mItem) : ?>
            <div class="item">
                <?php echo $this->Html->image("EG/" . $mItem['MItem']['image'], array('alt' => $mItem['MItem']['item_name'])); ?>
                <div class="carousel-caption"></div>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="#item-carousel" class="left carousel-control" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a href="#item-carousel" class="right carousel-control" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<!--/商品カルーセル-->

<!-- リスト -->
<div class="container">
    <!--リストヘッダ-->
    <div class="page-header">
        <h2 id="item_list">商品一覧</h2>
    </div>

    <div id="products" class="row">

        <!--商品リスト項目-->
        <?php foreach ($mItems as $mItem) : ?>
            <div class="col-sm-3">
                <dl class="product">
                    <dt>
                    <a href="/ECsite/MItems/view/<?php echo $mItem['MItem']['item_code']; ?>">
                        <?php echo $this->Html->image("thumb/" . $mItem['MItem']['image']) ?><br />
                        <span><?php echo $mItem['MItem']['item_name']; ?></span>
                    </a>
                    </dt>
                    <dd>&yen;<?php echo $mItem['MItem']['price']; ?></dd>
                </dl>
            </div>
        <?php endforeach; ?>
        <!-- /商品リスト項目 -->
    </div>

</div>
<!--  /リスト -->

