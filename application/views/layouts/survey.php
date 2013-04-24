<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <?php 
        
        /* @var $cs CClientScript */
        Yii::app()->getComponent('bootstrap');
        $cs=Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('bootstrap');
        ?>
        <title>Limesurvey</title>
    </head>
    <body>
        <?php $this->widget('ext.FlashMessage.FlashMessage'); ?>
        <div id="content" class="span12">
        <?php echo $content; ?>
        </div>
        <div id="ajaxprogress" title="Ajax request in progress" style="text-align: center; display: none">
            <img src="<?php echo Yii::app()->getConfig('adminstyleurl');?>/images/ajax-loader.gif"/>
        </div>
    </body>

</html>
