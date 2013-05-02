<div class="header ui-widget-header"><?php eT("Set User Rights");?></div>
<div id="tabs">
    <ul>
        <?php foreach($users as $user) { ?>
        <li><a href="#setuserright-<?php echo $user['uid']; ?>"><?php echo htmlspecialchars(sanitize_user($user['users_name']));?></a></li>
        <?php } ?>
    </ul>
<?php // Fill an array for label string
$RightText=array(
    'superadmin'=>array('label'=>gT("Super-Administrator"),'information'=>gT("Give all other rights, user have complete access to LimeSurvey except give Super-Administrator right")),
    'configurator'=>array('label'=>gT("Configurator"),'information'=>gT("Give access to global settings.")),
    'manage_survey'=>array('label'=>gT("Manage survey"),'information'=>gT("Give complete administration rights to all survey, except survey creation and change owner of survey.")),
    'create_survey'=>array('label'=>gT("Create survey"),'information'=>gT("Allow user to create survey. This user are the owner of the survey created ")),
    'participant_panel'=>array('label'=>gT("Participant panel"),'information'=>gT("Access and administration of the participant panel.")),
    'create_user'=>array('label'=>gT("Create user"),'information'=>gT("User can create new user.")),
    'delete_user'=>array('label'=>gT("Delete user"),'information'=>gT("User can delete the user he create.")),
    'manage_template'=>array('label'=>gT("Use all/manage templates"),'information'=>gT("User can manage template: modify, create or delete template.")),
    'manage_label'=>array('label'=>gT("Manage labels"),'information'=>gT("User can manage all label sets:  modify, create or delete label sets.")),
    'copy_model'=>array('label'=>gT("Copy survey model"),'information'=>gT("User can copy all survey model. The user need right to create survey to copy model.")),
    'manage_model'=>array('label'=>gT("Manage survey model"),'information'=>gT("Give complete administration rights to all survey model.")),
);
?>
    <?php foreach($users as $user) { ?>
        <div id="setuserright-<?php echo $user['uid'];?>">
        <?php echo CHtml::form(array("admin/user/sa/userrights"), 'post', array('name'=>'moduserrightsform', 'id'=>'moduserrightsform','class'=>'form44')); ?>
            <ul>
            <?php foreach($allowedRights as $userright){
                if($userright=='superadmin')
                {
                    $labelclass=" warning warningtitle";
                    $inputclass=" superadmin";
                }
                elseif($userright=='create_survey')
                {
                    $labelclass="";
                    $inputclass=" with-superadmin with-copy_model";
                }
                else
                {
                    $labelclass="";
                    $inputclass=" with-superadmin";
                }
                ?>
                <li>
                    <label for='<?php echo $userright; ?>' class='<?php echo $labelclass; ?>' title='<?php echo $RightText[$userright]['information']; ?>'><?php echo $RightText[$userright]['label']; ?></label>
                    <?php echo CHtml::checkBox($userright,$user[$userright],array('value'=>$userright,'class'=>"checkboxbtn {$inputclass}")); ?>
                </li>
            <?php } ?>
            </ul>
            <p>
                
                <input class="standardbtn" type='submit' value='<?php eT("Save Now");?>' />
                <input type='hidden' name='action' value='userrights' />
                <input type='hidden' name='uid' value='<?php echo $user['uid'];?>' />
            </p>
            <?php echo CHtml::endForm();?>
        </div>
    <?php } ?>
</div>
