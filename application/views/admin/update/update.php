<?php
echo '<div class="header ui-widget-header">'.gT('Welcome to the ComfortUpdate').'</div><div class="updater-background"><br />';
echo gT('The LimeSurvey ComfortUpdate is an easy procedure to quickly update to the latest version of LimeSurvey.').'<br /><br />';
echo gT('The following steps will be done by this update:').'<br /><ul>';
echo '<li>'.gT('Your LimeSurvey installation is checked if the update can be run successfully.').'</li>';
echo '<li>'.gT('Your DB and any changed files will be backed up.').'</li>';
echo '<li>'.gT('New files will be downloaded and installed.').'</li>';
echo '<li>'.gT('If necessary the database will be updated.').'</li></ul><br>';
echo '<h3>'.gT('Checking basic requirements...').'</h3>';
if ($updatekey==''){
    eT('You need an update key to run the ComfortUpdate. During the beta test of this update feature the key "LIMESURVEYUPDATE" can be used.');?>
    <br /><br />
    <?php echo CHtml::form(array("admin/update/sa/index/subaction/keyupdate"), 'post', array('id'=>'keyupdate')); ?>
    <label for='updatekey'><?php eT('Please enter a valid update-key:');?> </label>
    <input id="updatekey" name="updatekey" type="text" value="LIMESURVEYUPDATE" /> <input type="submit" value="<?php eT('Save update key')?>" /></form>
    <?php
}
else
{
    echo "<ul><li class='successtitle'>".gT('Update key: Valid')."</li>";

    if (!is_writable($tempdir))
    {
        echo  "<li class='errortitle'>".sprintf(gT("Tempdir %s is not writable"),$tempdir)."<li>";
        $error=true;
    }
    if (!is_writable(Yii::app()->basePath.'config/version.php'))
    {
        echo  "<li class='errortitle'>".sprintf(gT("Version file is not writable (%s). Please set according file permissions."),Yii::app()->basePath.'config/version.php')."</li>";
        $error=true;
    }
    echo '</ul><br><h3>'.gT('Change log').'</h3>';

    if($httperror=="") {
        echo '<textarea class="updater-changelog" readonly="readonly">'.htmlspecialchars($changelog['changelog']).'</textarea>';
    }
    else {
        print($httperror);
    }

    if ($error)
    {
        echo '<br /><br />'.gT('When checking your installation we found one or more problems. Please check for any error messages above and fix these before you can proceed.');
        echo "<p><button onclick=\"window.open('".Yii::app()->getController()->createUrl("admin/update/sa/index/")."', '_top')\"";
        echo ">".gT('Check again')."</button></p>";
    }
    else
    {
        echo '<br /><br />'.gT('Everything looks alright. Please proceed to the next step.');
        echo "<p><button onclick=\"window.open('".Yii::app()->getController()->createUrl("admin/update/sa/step2/")."', '_top')\"";
        if ($updatekey==''){    echo "disabled='disabled'"; }
        echo ">".sprintf(gT('Proceed to step %s'),'2')."</button></p>";
    }
    echo '</div>';    
}
?>
