<?php
    $advanced = array();
    $basic = array();
    foreach ($attributes as $name => $setting)
    {
        if ($setting['localized'] && !$setting['advanced'])
        {
            $basic[$name] = $setting;
        }
        elseif ($setting['localized'] && $setting['advanced'])
        {
            $advanced[$name] = $setting;
        }
    }

    $id = "localized-$language";
    $idbasic = "basic" . isset($language) ? $language : '';
    $idadvanced = "advanced" . isset($language) ? $language : '';
    $class[] = "localized";

    // Decide if we need basic / advanced tab.
    $out = '';
    if (!empty($basic) && !empty($advanced))
    {
        $class[] = "tabs";
        $tabs[] = CHtml::link(CHtml::tag('span', array(), gT('Basic settings')), "#$idbasic");
        $tabs[] = CHtml::link(CHtml::tag('span', array(), gT('Advanced settings')), "#$idadvanced");
        $out .= CHtml::openTag('ul');
        foreach ($tabs as $tab)
        {
            $out .= CHtml::tag('li', array(), $tab);


        }
        $out.= CHtml::closeTag('ul');
    }
    echo CHtml::openTag('div', array(
        'id' => $id,
        'class' => explode(' ', $class)
    ));
    echo $out;

    $this->renderPartial('/questions/settingsblock', array(
        'id' => $idbasic,
        'settings' => $basic,
        'language' => $language,
        'form' => $form,
        'PluginSettings' => $PluginSettings
    ));
    $this->renderPartial('/questions/settingsblock', array(
        'id' => $idadvanced,
        'settings' => $advanced,
        'language' => $language,
        'form' => $form,
        'PluginSettings' => $PluginSettings
    ));
    echo CHtml::closeTag('div');
?>
