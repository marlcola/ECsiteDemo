<!DOCTYPE html>

<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>Testレイアウト</title>
        <?php
        //echo $this->Html->css('cake.generic');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </body>
</html>