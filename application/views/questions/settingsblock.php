<div id="<?php echo $id; ?>" class="settings">
        <ul>
        <?php
            foreach ($settings as $name => $setting)
            {
               $setting['language'] = $language;
               echo CHtml::tag('div', array('class' => 'control-group'), $PluginSettings->renderSetting($name, $setting, $form, true));
            }
        ?>
        </ul>
</div>