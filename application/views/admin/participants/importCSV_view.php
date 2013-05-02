<div class='header ui-widget-header'>
    <strong><?php eT("Import CSV"); ?> </strong>
</div>
<?php echo CHtml::form(array("admin/participants/sa/attributeMapCSV"), 'post', array('id'=>'addsurvey','class'=>'form44', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')); ?>
    <ul>
        <li>
            <label for="the_file" id="fileupload">
                <?php eT("Choose the file to upload:"); ?>
            </label>
            <input type="file" name="the_file" />
        </li>
        <li>
            <label for="characterset" id="characterset">
                <?php eT("Character set of file:"); ?>
            </label>
            <?php
            $encodingsarray = array("armscii8" => gT("ARMSCII-8 Armenian")
                , "ascii" => gT("US ASCII")
                , "auto" => gT("Automatic")
                , "big5" => gT("Big5 Traditional Chinese")
                , "binary" => gT("Binary pseudo charset")
                , "cp1250" => gT("Windows Central European")
                , "cp1251" => gT("Windows Cyrillic")
                , "cp1256" => gT("Windows Arabic")
                , "cp1257" => gT("Windows Baltic")
                , "cp850" => gT("DOS West European")
                , "cp852" => gT("DOS Central European")
                , "cp866" => gT("DOS Russian")
                , "cp932" => gT("SJIS for Windows Japanese")
                , "dec8" => gT("DEC West European")
                , "eucjpms" => gT("UJIS for Windows Japanese")
                , "euckr" => gT("EUC-KR Korean")
                , "gb2312" => gT("GB2312 Simplified Chinese")
                , "gbk" => gT("GBK Simplified Chinese")
                , "geostd8" => gT("GEOSTD8 Georgian")
                , "greek" => gT("ISO 8859-7 Greek")
                , "hebrew" => gT("ISO 8859-8 Hebrew")
                , "hp8" => gT("HP West European")
                , "keybcs2" => gT("DOS Kamenicky Czech-Slovak")
                , "koi8r" => gT("KOI8-R Relcom Russian")
                , "koi8u" => gT("KOI8-U Ukrainian")
                , "latin1" => gT("cp1252 West European")
                , "latin2" => gT("ISO 8859-2 Central European")
                , "latin5" => gT("ISO 8859-9 Turkish")
                , "latin7" => gT("ISO 8859-13 Baltic")
                , "macce" => gT("Mac Central European")
                , "macroman" => gT("Mac West European")
                , "sjis" => gT("Shift-JIS Japanese")
                , "swe7" => gT("7bit Swedish")
                , "tis620" => gT("TIS620 Thai")
                , "ucs2" => gT("UCS-2 Unicode")
                , "ujis" => gT("EUC-JP Japanese")
                , "utf8" => gT("UTF-8 Unicode"));
            ?>
            <select name="characterset">
                <option value="auto" selected="selected">Automatic</option>
                <?php
                $encodingsarray_keys = array_keys($encodingsarray);
                $i = 0;
                foreach ($encodingsarray as $encoding):
                    ?>
                    <option value="<?php echo ($encodingsarray_keys[$i++]); ?>"><?php echo $encoding; ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </li>
        <li>
            <label for="seperatorused" id="seperatorused">
                <?php eT("Seperator used:"); ?>
            </label>
            <?php
            $seperatorused = array("comma" => gT("Comma")
                , "semicolon" => gT("Semicolon"));
            ?>

            <select name="seperatorused">
                <option value="auto" selected="selected"><?php eT("(Autodetect)"); ?></option>
                <?php
                $seperatorused_keys = array_keys($seperatorused);
                $i = 0;
                foreach ($seperatorused as $seperator):
                    ?>
                    <option value="<?php echo ($seperatorused_keys[$i++]); ?>"><?php echo $seperator; ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </li>
        <li>
            <label for ="filter" id="filter">
                <?php
                eT("Filter blank email addresses:");
                ?>
            </label>
            <input type="checkbox" name="filterbea" value="accept" checked="checked"/></li>
        </li>
        <li>
            <p><input type="submit" value="upload" /></p>
        </li>
    </ul>
</form>
<div class="messagebox ui-corner-all">
    <div class="header ui-widget-header">
        <?php gT("CSV input format") ?>
    </div>
    <p>
        <?php eT("File should be a standard CSV (comma delimited) file with optional double quotes around values (default for OpenOffice and Excel). The first line must contain the field names. The fields can be in any order."); ?>
    </p>
    <span style="font-weight:bold;">Mandatory fields:</span> firstname, lastname, email    <br/>
    <span style="font-weight:bold;">Optional fields:</span> blacklist,language
</div>