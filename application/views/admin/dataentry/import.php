<div class='header ui-widget-header'>
    <?php eT("Import responses from a deactivated survey table"); ?>
</div>
<?php echo CHtml::form('', 'post', array('class'=>'form30', 'id'=>'importresponses'));?>
    <ul>
        <li>
            <label><?php eT("Target survey ID:"); ?></label>
            <span id='spansurveyid'><?php echo $surveyid; ?><input type='hidden' value='$surveyid' name='sid'></span>
        </li>
        <li>
            <label for='oldtable'>
                <?php eT("Source table:"); ?>
            </label>
            <select id='oldtable' name='oldtable'>
                <?php echo $optionElements; ?>
            </select>
        </li>
        <li>
            <label for='importtimings'>
                <?php eT("Import also timings (if exist):"); ?>
            </label>
            <select name='importtimings' id='importtimings'>
                <option value='Y' selected='selected'><?php eT("Yes"); ?></option>
                <option value='N'><?php eT("No"); ?></option>
            </select>
        </li>
    </ul>
    <p>
        <input type='submit' value='<?php eT("Import Responses"); ?>' onclick='if ($("#oldtable").val()=="") alert("<?php eT("You need to select a table.","js"); ?>"); return ($("#oldtable").val()!="" && confirm("<?php eT("Are you sure?","js"); ?>"));'>&nbsp;
        <input type='hidden' name='subaction' value='import'><br /><br /></p>
    <div class='messagebox ui-corner-all'><div class='warningheader'><?php echo gT("Warning").'</div>'.gT("You can import all old responses with the same amount of columns as in your active survey. YOU have to make sure, that this responses corresponds to the questions in your active survey."); ?>
    </div>

    </form>
<br />
