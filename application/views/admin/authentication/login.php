<?php
echo CHtml::form(array('admin/authentication/sa/login'), 'post', array('id'=>'loginform', 'name'=>'loginform'));

?>
    <div class='messagebox ui-corner-all'>
        <div class='header ui-widget-header'><?php echo $summary; ?></div>
        <br />
        <ul style='width: 500px; margin-left: auto; margin-right: auto'>
            <li><label for='user'><?php eT("Username"); ?></label>
                <input name='user' id='user' type='text' size='40' maxlength='40' value='' /></li>
            <li><label for='password'><?php eT("Password"); ?></label>
                <input name='password' id='password' type='password' size='40' maxlength='40' /></li>
            <li><label for='loginlang'><?php eT("Language"); ?></label>
                <select id='loginlang' name='loginlang'>
                    <option value="default" selected="selected"><?php eT('Default'); ?></option>
                    <?php
                    $x = 0;
                    App()->loadHelper('surveytranslator');
                    foreach (getLanguageDataRestricted(true) as $sLangKey => $aLanguage)
                    {
                        //The following conditional statements select the browser language in the language drop down box and echoes the other options.
                        echo CHtml::tag('option', array(
                            'value' => $sLangKey
                        ), $aLanguage['nativedescription'] . " - " . $aLanguage['description']);
                    }
                    ?>
                </select>
            </li>
        </ul>
    <p><input type='hidden' name='action' value='login' />
        <input class='action' type='submit' value='<?php eT("Login"); ?>' /><br />&nbsp;
        <br/>
        <?php
        if (Yii::app()->getConfig("display_user_password_in_email") === true)
        {
            ?>
            <a href='<?php echo $this->createUrl("admin/authentication/sa/forgotpassword"); ?>'><?php eT("Forgot your password?"); ?></a><br />&nbsp;
            <?php
        }
        ?>
    </p><br />
    </div></form>
<script type='text/javascript'>
    document.getElementById('user').focus();
</script>