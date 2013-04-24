
<?php
    echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal'));
    $i = 0;
    foreach ($renderedQuestions as $renderedQuestion)
    {
        echo CHtml::tag('div', array(
            'class' => 'question',
            'id' => "question$i"), $renderedQuestion);
        $i++;
    }
    echo CHtml::endForm();
?>