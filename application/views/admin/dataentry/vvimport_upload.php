<br />
<div class='messagebox'>
   <div class='header'><?php eT("Import a VV response data file"); ?></div>
        <div class='successtitle'><?php eT("Success"); ?></div>
                <?php eT("File upload succeeded."); ?><br /><br />
                <?php eT("Reading file.."); ?><br />
                <?php if($noid == 'noid' && $insertstyle == 'renumber') { ?>
                    <br />
                        <p style="color: #ff0000;">
                            <i>
                                <strong>
                                    <?php eT("Important Note:"); ?>
                                    <br />
                                    <?php eT("Do NOT refresh this page, as this will import the file again and produce duplicates"); ?>
                                </strong>
                            </i>
                        </p>
                    <br /><br />
                <?php } ?>
               <?php echo gT("Total records imported:") . ' '  . $importcount; ?>
               <br /> <br />
               [<a href='<?php echo $this->createUrl("/admin/responses/sa/index/surveyid/{$surveyid}"); ?>'><?php eT("Browse responses"); ?></a>]
</div>
<br />&nbsp;
