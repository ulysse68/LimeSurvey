<script type="text/javascript">
    var redUrl = "<?php echo Yii::app()->createUrl("/admin/participants/displayParticipants"); ?>";
    var copyUrl = "<?php echo Yii::app()->createUrl("/admin/participants/addToCentral"); ?>";
    var surveyId = "<?php echo Yii::app()->request->getQuery('sid'); ?>";

    /* LANGUAGE */
    var attributesMappedText = "<?php eT("There are no unmapped attributes") ?>";
    var mustPairAttributeText= "<?php eT("You have to pair it with one attribute of the token table") ?>";
    var onlyOneAttributeMappedText="<?php eT("Only one central attribute is mapped with token attribute") ?>";
    var cannotAcceptTokenAttributesText="<?php eT("This list cannot accept token attributes.") ?>";
    var addElementBelowText="<?php eT("You have to add the element below the list") ?>";

</script>
</head>
<body>
    <div class='header ui-widget-header'>
        <strong>
            <?php eT("Map your token attributes to an existing participant attribute or create a new one"); ?>
        </strong>
    </div>

    <div id="tokenattribute">
        <div class="heading"><?php eT("Unmapped token attributes") ?></div>
            <ul id="tokenatt">
            <?php
            if (!empty($tokenattribute))
            {
                foreach ($tokenattribute as $key => $value)
                {
                    echo "<li title='".gT("Drag this attribute to another column to map it to the central participants database")."' id='t_" . $value . "' name=\"$key\">" . $key . "</li>"; //Passing attribute description as name of the attribute
                }
            }
            ?>
            </ul>

        </div>
        <div id="newcreated"><div class="heading"><?php eT("Participant attributes to create") ?></div>
            <ul class="newcreate" id="sortable" style ="height: 40px">
            </ul>
        </div>
        <div id="centralattribute"><div class="heading"><?php eT("Existing participant attributes")?></div><br />
            <ul class="centralatt">
                <?php
                if (!empty($attribute))
                {
                    foreach ($attribute as $key => $value)
                    {
                        echo "<li id='c_" . $key . "' name='c_" . $key . "' >" . $value . "</li>";
                    }
                }
                ?>
            </ul>
            <?php if (!empty($attribute)) { ?>
            <div class='explanation'>
                <input type='checkbox' id='overwriteman' name='overwriteman' /> <label for='overwriteman'><?php eT("Overwrite existing attribute values if a participant already exists?") ?></label>
                <br /><input type='checkbox' id='createautomap' name='createautomap' /> <label for='createautomap'><?php eT("Make these mappings automatic in future") ?></label><br />&nbsp;
            </div>
            <?php } else { ?>
            <br />&nbsp;
            <?php }
            if(!empty($alreadymappedattributename)) {
                ?>
                <div class='heading'><?php eT("Pre-mapped attributes") ?></div><br />
                <ul class="notsortable">
                <?php
                foreach ($alreadymappedattributename as $key => $value)
                {
                    echo "<li title='".gT("This attribute is automatically mapped")."' id='' name='$value' >" . $alreadymappedattdescription[$value] . "</li>";
                }
                ?>
                </ul>
                <div class='explanation'>
                    <input type='checkbox' id='overwrite' name='overwrite' /> <label for='overwrite'><?php eT("Overwrite existing attribute values if a participant already exists?") ?></label>
                </div>
                <?php
            }
            ?>
        </div>
    <p>
        <input type="button" name="goback" onclick="history.back();" id="back" value="<?php eT('Back')?>" />
        <input type='button' name='reset' onClick='window.location.reload();' id='reset' value="<?php eT('Reset') ?>" />
        <input type="button" name="attmap" id="attmap" value="Continue" />
    </p>
    <?php
    $ajaxloader = array(
        'src' => Yii::app()->getConfig('adminimageurl') . '/ajax-loader.gif',
        'alt' => 'Ajax Loader',
        'title' => 'Ajax Loader'
    );
    ?>
    <div id="processing" title="<?php eT("Processing...") ?>" style="display:none">
<?php echo CHtml::image($ajaxloader['src'], $ajaxloader['alt']); ?>
    </div>
</body>
</html>
