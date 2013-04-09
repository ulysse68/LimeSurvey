<div class="span6 offset3">
<table class="table">
<?php
foreach($group->attributes as $key => $value)
{
    echo CHtml::openTag('tr');
    echo CHtml::tag('td', array(), $group->getAttributeLabel($key));
    echo CHtml::tag('td', array(), $value);
    echo CHtml::closeTag('tr');
}
    

?>
</table>
</div>