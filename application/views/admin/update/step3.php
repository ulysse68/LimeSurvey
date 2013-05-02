<div class="header ui-widget-header"><?php sprintf(gT('ComfortUpdate step %s'),'3'); ?></div><div class="updater-background">
<h3><?php eT('Creating DB & file backup')?></h3><br>
<?php
if (!isset( Yii::app()->session['updateinfo']))
{
    eT('On requesting the update information from limesurvey.org there has been an error:').'<br />';

    if ($updateinfo['error']==1)
    {
        eT('Your update key is invalid and was removed. ').'<br />';
    }
    else
    eT('On requesting the update information from limesurvey.org there has been an error:').'<br />';
}


eT('Creating file backup... ').'<br />';

    echo "<span class='successtitle'>".gT('File backup created:').' '.htmlspecialchars($sFilesArchive).'</span><br /><br />';

if ($databasetype=='mysql' || $databasetype=='mysqli')
{
        eT('Creating database backup... ').'<br />';
        echo "<span class='successtitle'>".gT('DB backup created:')." ".htmlspecialchars($sSQLArchive).'</span><br /><br />';
    }
    else
    {
        echo "<span class='warningtitle'>".gT('No DB backup created:').'<br />'.gT('Database backup functionality is currently not available for your database type. Before proceeding please backup your database using a backup tool!').'</span><br /><br />';
    }

    eT('Please check any problems above and then proceed to the final step.');
    echo "<p><button onclick=\"window.open('".Yii::app()->getController()->createUrl("admin/update/sa/step4/")."', '_top')\" ";
    echo ">".sprintf(gT('Proceed to step %s'),'4')."</button></p>";
    echo '</div>';

?>
