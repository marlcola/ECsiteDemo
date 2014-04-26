
<div class="page-header">
    <h2><?php echo AuthComponent::user("name"); ?>さんのカート</h2>
</div>

<?php echo $this->Session->flash('cart'); ?>

<div class="container">
    <?php if (!is_null($cart_list = $this->Session->read('cart'))) : ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>個数</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($cart_list as $key => $value) : ?>
                    <?php $total += ($value['num'] + 1) * $value['price']; ?>
                    <tr>
                        <td><?php echo $this->Html->image("EG/" . $value['image'], array('width' => 50, 'height' => 50)); ?><br /></td>
                        <td><?php echo h($value['item_name']); ?></td>
                        <td>&yen;<?php echo h($value['price']); ?></td>
                        <td><?php echo h($value['num'] + 1); ?></td>
                        <td><?php echo $this->Html->link('商品詳細へ', array('controller' => 'MItems', 'action' => 'view', $value['item_code'])); ?></td>
                        <td><?php echo $this->Html->link('削除', array('controller' => 'DPurchases', 'action' => 'cart_delete', $key)); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>小計</td>
                    <td></td>
                    <td>&yen;<?php echo h($total); ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    <?php else : ?>
        <div class="well well-lg">
            <h4>カートは空です</h4>

        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-offset-7 col-sm-5">
            <div class="col-sm-6">
                <?php
                echo $this->Html->link('カートを空にする', array(
                    'controller' => 'DPurchases',
                    'action' => 'cart_reset'
                        ), array(
                    'class' => 'btn btn-primary',
                ));
                ?>
            </div>
            <div class="col-sm-6">
                <?php echo $this->Html->link('購入する', array('controller' => 'DPurchases', 'action' => 'purchase'), array('class' => 'btn btn-primary btn-block')); ?>
            </div>
        </div>
    </div>

    <!--フォームタグを追加-->

</div>

