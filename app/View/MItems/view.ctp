
<div class="page-header">
    <h2>商品詳細</h2>
</div>

<div class="jumbotron">
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <dl>
                <dt>
                <!--商品名-->
                <h3><?php echo $mItem['MItem']['item_name']; ?></h3>
                <!--商品画像-->
                <?php echo $this->Html->image('EG/' . $mItem['MItem']['image']) ?>
                </dt>
                <dd>
                    <!--商品説明-->
                    <p><?php echo $mItem['MItem']['detail']; ?></p>
                    <!--商品価格-->
                    <p>価格：<strong>&yen;<?php echo $mItem['MItem']['price']; ?></strong></p>
                </dd>
            </dl>
        </div>
    </div>

</div>


<!--フォームの生成-->
<?php
echo $this->Form->create('DPurchase', array(
    'action' => 'cart_add',
    'class' => 'form-horizontal',
    'role' => 'form'
        )
);
?>

<!--隠し要素群-->
<!--商品コードだけ渡して、コントローラで商品情報をよびだしてもいいかもしれない-->
<?php echo $this->Form->hidden('item_code', array('value' => $mItem['MItem']['item_code'])); ?>
<?php echo $this->Form->hidden('item_name', array('value' => $mItem['MItem']['item_name'])); ?>
<?php echo $this->Form->hidden('price', array('value' => $mItem['MItem']['price'])); ?>
<?php echo $this->Form->hidden('image', array('value' => $mItem['MItem']['image'])); ?>

<!--商品個数のセレクトボックス-->
<!--最初の空白を削除したい-->
<div class="col-sm-offset-6 col-sm-6">
    <div class="form-group col-sm-8">
        <label for="DPurchaseNum" class="col-sm-6 control-label">個数 : </label>
        <div class="col-sm-6">
            <?php
            echo $this->Form->select('num', array(1, 2, 3, 4, 5), array(
                'empty' => FALSE,
                'class' => 'form-control'
                    )
            );
            ?>
        </div>
    </div>

    <?php
    echo $this->Form->end(array(
        'class' => 'btn btn-primary',
        'div' => array(
            'class' => 'col-sm-4'
        ),
        'label' => 'カートに入れる'
            )
    );
    ?>
</div>


<div class="container col-sm-offset-8 col-sm-4">
    <a href="/ECsite/MItems/index" class="btn btn-primary btn-block" alt="商品一覧へ">商品一覧へ</a>
</div>


