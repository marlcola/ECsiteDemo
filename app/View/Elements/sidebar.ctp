<!--サイドバー-->
<div id="sidebar" class='panel panel-default' data-spy="affix">
    <div class="panel-heading">
        <h3 class="panel-title">検索フォーム</h3>
    </div>

    <div class="panel-body">
        <?php
        // フォームタグを生成
        echo $this->Form->create('MItem', array(
            'action' => 'index',
            'role' => 'form'
        ));
        ?>

        <!--商品名の検索フォーム-->

        <?php
        // 表品名の入力フォーム
        echo $this->Form->input('MItem.item_name', array(
            'div' => array(
                'class' => 'form-group'
            ),
            'class' => 'form-control',
            'id' => 'input-item',
            'placeholder' => '商品名など',
            'label' => array('for' => 'input-item', 'text' => 'キーワード')
        ));
        ?>

        <!--/商品名の検索フォーム-->

        <!--カテゴリのチェックボックス-->
        <div class="form-group">
            <label id="input-category" class="control-label">カテゴリ</label>            
            <div id="input-category">
                <div class="btn-group" data-toggle='buttons'>
                    <!--管楽器のチェックボックス-->
                    <label for="MItemCategoryKan" class="btn btn-primary">
                        <?php echo $this->Form->checkbox('MItem.category.kan', array('hiddenField' => FALSE, 'value' => 1)); ?>管楽器
                    </label>
                    <!--弦楽器のチェックボックス-->
                    <label for="MItemCategoryGen" class="btn btn-primary">
                        <?php echo $this->Form->checkbox('MItem.category.gen', array('hiddenField' => FALSE, 'value' => 2)); ?>弦楽器
                    </label>
                    <!--打楽器のチェックボックス-->
                    <label for="MItemCategoryDa" class="btn btn-primary">
                        <?php echo $this->Form->checkbox('MItem.category.da', array('hiddenField' => FALSE, 'value' => 3)); ?>打楽器
                    </label>
                </div>  
                
                <label id="CategoryButtonFlash" class="btn btn-primary">
                    <span class="glyphicon glyphicon-flash"></span>
                </label>
            </div>
        </div>
        <!--/カテゴリのチェックボックス-->

        <!--サブミットボタン-->
        <div class="form-group">
            <?php echo $this->Form->end(array('label' => '検索', 'class' => 'btn btn-primary btn-block', 'div' => FALSE)); ?>
        </div>
        <!--/サブミットボタン-->    
    </div>


</div>
<!--/サイドバー-->