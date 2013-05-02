<div id='copy'>
    <?php echo CHtml::form(array('admin/survey/sa/copy'), 'post', array('id'=>'copysurveyform', 'name'=>'copysurveyform', 'class'=>'form30')); ?>
        <ul>
            <li><label for='copysurveylist'><?php eT("Select survey to copy:"); ?> </label>
                <select id='copysurveylist' name='copysurveylist' required="required">
                    <?php echo getSurveyList(false); ?> </select> <span class='annotation'><?php echo gT("Required"); ?> </span></li>
            <li><label for='copysurveyname'><?php echo gT("New survey title:"); ?> </label>
                <input type='text' id='copysurveyname' size='82' maxlength='200' name='copysurveyname' value='' required="required" />
                <span class='annotation'><?php echo gT("Required"); ?> </span></li>
            <li><label for='copysurveytranslinksfields'><?php echo gT("Convert resource links and INSERTANS fields?"); ?> </label>
                <input id='copysurveytranslinksfields' name="copysurveytranslinksfields" type="checkbox" checked='checked'/></li>
            <li><label for='copysurveyexcludequotas'><?php eT("Exclude quotas?"); ?></label>
                <input id='copysurveyexcludequotas' name="copysurveyexcludequotas" type="checkbox" /></li>
            <li><label for='copysurveyexcludepermissions'><?php echo gT("Exclude survey permissions?"); ?> </label>
                <input id='copysurveyexcludepermissions' name="copysurveyexcludepermissions" type="checkbox"/></li>
            <li><label for='copysurveyexcludeanswers'><?php echo gT("Exclude answers?"); ?> </label>
                <input id='copysurveyexcludeanswers' name="copysurveyexcludeanswers" type="checkbox" /></li>
            <li><label for='copysurveyresetconditions'><?php echo gT("Reset conditions/relevance?"); ?></label>
                <input id='copysurveyresetconditions' name="copysurveyresetconditions" type="checkbox" /></li>
        </ul>
        <p><input type='submit' value='<?php eT("Copy survey"); ?>' />
            <?php if (isset($surveyid)) echo '<input type="hidden" name="sid" value="' . $surveyid . '" />'; ?>
            <input type='hidden' name='action' value='copysurvey' /></p>
    </form>
    <?php if(count($aModelList)) { ?>
        <div class="header ui-widget-header"><?php eT('Survey model') ?></div>
        <?php echo CHtml::form(array('admin/survey/sa/copy'), 'post', array('id'=>'copymodelsurveyform', 'name'=>'copysurveyform', 'class'=>'form30')); ?>
            <ul>
                <li><label for='copysurveymodellist'><?php eT("Select survey model to copy:"); ?> </label>
                    <?php  echo CHtml::dropDownList('copysurveylist',"",CHtml::listData($aModelList,'sid','surveyls_title'),array('empty' => gT("Please choose...")),array('id'=>'copysurveymodellist')); ?>
                    <span class='annotation'><?php echo gT("Required"); ?> </span></li>
                <li><label for='copysurveyname'><?php echo gT("New survey title:"); ?> </label>
                    <?php echo CHtml::textField('copysurveyname','',array('id'=>'copysurveymodelname','size'=>'82','maxlength'=>'200','required'=>"required")); ?>
                    <span class='annotation'><?php echo gT("Required"); ?> </span></li>
            <p>
                <?php echo CHtml::submitButton(gT('Copy survey model')); ?>
                <?php echo CHtml::hiddenField('copysurveytranslinksfields','on',array('id'=>'modeltranslinksfields')); ?>
                <?php echo CHtml::hiddenField('action','copysurvey'); ?></p>
                
        <?php echo CHtml::endForm() ?>
    <?php } ?>
</div>
