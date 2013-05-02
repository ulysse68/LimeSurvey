<?php echo CHtml::form(array("admin/export/sa/vvexport/surveyid/{$surveyid}/subaction/export"), 'post', array('id'=>'vvexport'));?>

    <div class='header ui-widget-header'><?php eT("Export a VV survey file");?></div>
    <ul>
        <li>
            <label for='sid'><?php eT("Export survey");?>:</label>
            <input type='text' size='10' value='<?php echo $surveyid;?>' id='sid' name='sid' readonly='readonly' />
        </li>
        <li>
            <label for='completionstate'><?php eT("Export");?>:</label>
            <select name='completionstate' id='completionstate'>
                <option value='complete' <?php echo $selecthide;?>><?php eT("Completed responses only");?></option>
                <option value='all' <?php echo $selectshow;?>><?php eT("All responses");?></option>
                <option value='incomplete' <?php echo $selectinc;?>><?php eT("Incomplete responses only");?></option>
            </select>
        </li>
        <li>
            <label for='extension'><?php eT("File extension");?>: </label>
            <input type='text' id='extension' name='extension' size='3' value='csv' /><span style='font-size: 7pt'>*</span>
        </li>
    </ul>
    <p><input type='submit' value='<?php eT("Export results");?>' />&nbsp;
    <input type='hidden' name='subaction' value='export' />
</form>

<p><span style='font-size: 7pt'>* <?php eT("For easy opening in MS Excel, change the extension to 'tab' or 'txt'");?></span><br />