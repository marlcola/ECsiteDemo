
<div class="page-header">
    <h2>ユーザ情報</h2>
</div>

<div class="container">
    <?php echo $this->element('user_info', array('MCustomerAction' => 'edit')); ?>
    <div class="col-sm-3">
        <?php
        echo $this->Html->link('退会', array('controller' => 'MCustomer', 'action' => 'delete'), array(
            'class' => 'btn btn-primary btn-block',
            'role' => 'buttun',
        ));
        ?>
    </div>

</div>


