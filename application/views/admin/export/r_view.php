<div class='header ui-widget-header'><?php eT("Export result data to R");?></div>
<?php echo CHtml::form(array('admin/export/sa/exportr/sid/'.$surveyid), 'post', array('id'=>'exportr'));?>
    <input type='hidden' name='sid' value='<?php echo $surveyid;?>' />
    <input type='hidden' name='action' value='exportr' />
<ul>
    <li><label for='completionstate'><?php eT("Data selection:");?></label><select id='completionstate' name='completionstate' onchange='this.form.submit();'>
            <option value='complete' <?php echo$selecthide;?>><?php eT("Completed responses only");?></option>
            <option value='all' <?php echo$selectshow;?>><?php eT("All responses");?></option>
            <option value='incomplete' <?php echo$selectinc;?>><?php eT("Incomplete responses only");?></option>
        </select>
    </li>
    <li><label for='dlstructure'><?php eT("Step 1:");?></label><input type='submit' name='dlstructure' id='dlstructure' value='<?php eT("Export R syntax file");?>'/></li>
    <li><label for='dldata'/><?php eT("Step 2:");?></label><input type='submit' name='dldata' id='dldata' value='<?php eT("Export .csv data file");?>'/></li></ul>
</form>

<p><div class='messagebox ui-corner-all'><div class='header ui-widget-header'><?php eT("Instructions for the impatient");?></div>
    <br/><ol style='margin:0 auto; font-size:8pt;'>
        <li><?php eT("Download the data and the syntax file.");?></li>
        <li><?php eT("Save both of them on the R working directory (use getwd() and setwd() on the R command window to get and set it)");?></li>
        <li><?php echo sprintf(gT("digit:       source(\"%s\", encoding = \"UTF-8\")        on the R command window"), $filename);?></li>
    </ol><br />
    <?php eT("Your data should be imported now, the data.frame is named \"data\", the variable.labels are attributes of data (\"attributes(data)\$variable.labels\"), like for foreign:read.spss.");?>
</div>