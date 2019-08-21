<?php if ($sExport == "") { ?>

<form action="" name="ewpagerform" id="ewpagerform">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <?php
if (@$nTotalRecs > 0 && @$nStartRec) {

	?>
    <div class="custompagin">
      <div class="dataTables_info fleft ">
        <div class="pagination-panel">
          <table border="0" cellspacing="0" cellpadding="0" class="ewTableControls">
            <tr>
              <td><span class="phpmaker"> <?php echo @$LS['Page'] ?>&nbsp;</span></td>
              <?php if (@$nStartRec == 1) { ?>
              <td><img src="<?php echo base_url(); ?>assets/images/firstdisab.gif" alt=" <?php echo @$LS['PagerFirst'] ?>" border="0"></td>
              <?php } else { ?>
              <td><a href="<?php echo $urlbase_paginacion; ?>/start-1<?php echo @$postfix_pagination; ?>"><img src="<?php echo base_url(); ?>assets/images/first.gif" alt=" <?php echo @$LS['PagerFirst'] ?>"  border="0"></a></td>
              <?php } ?>
              <?php if (@$PrevStart == @$nStartRec) { ?>
              <td><img src="<?php echo base_url(); ?>assets/images/prevdisab.gif" alt=" <?php echo @$LS['PagerPrevious'] ?>"  border="0"></td>
              <?php } else { ?>
              <td><a href="<?php echo $urlbase_paginacion; ?>/start-<?php echo $PrevStart; ?><?php echo @$postfix_pagination; ?>"><img src="<?php echo base_url(); ?>assets/images/prev.gif" alt=" <?php echo @$LS['PagerPrevious'] ?>"  border="0"></a></td>
              <?php } ?>
              <td><input type="text" name="pageno" value="<?php echo intval(@(@$nStartRec-1)/@$nDisplayRecs+1); ?>" size="4" class="pagination-panel-input form-control input-mini input-inline input-sm"></td>
              <?php if (@$NextStart == @$nStartRec) { ?>
              <td><img src="<?php echo base_url(); ?>assets/images/nextdisab.gif" alt=" <?php echo @$LS['PagerNext'] ?>"  border="0"></td>
              <?php } else { ?>
              <td><a href="<?php echo $urlbase_paginacion; ?>/start-<?php echo $NextStart; ?><?php echo @$postfix_pagination; ?>"><img src="<?php echo base_url(); ?>assets/images/next.gif" alt=" <?php echo @$LS['PagerNext'] ?>"  border="0"></a></td>
              <?php  } ?>
              <?php if (@$LastStart == @$nStartRec) { ?>
              <td><img src="<?php echo base_url(); ?>assets/images/lastdisab.gif" alt=" <?php echo @$LS['PagerLast'] ?>"  border="0"></td>
              <?php } else { ?>
              <td><a href="<?php echo $urlbase_paginacion; ?>/start-<?php echo $LastStart; ?><?php echo @$postfix_pagination; ?>"><img src="<?php echo base_url(); ?>assets/images/last.gif" alt=" <?php echo @$LS['PagerLast'] ?>"  border="0"></a></td>
              <?php } ?>
              <td><span class="phpmaker">&nbsp; <?php echo @$LS['Of'] ?> <?php echo intval(($nTotalRecs-1)/$nDisplayRecs+1);?></span></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="dataTables_info fleft custompinfo"> <span class="seperator">|</span> <span class="phpmaker"> <?php echo @$LS['Record'] ?> <?php echo @$nStartRec; ?> <?php echo @$LS['To'] ?> <?php echo @$nStopRec; ?> <?php echo @$LS['Of'] ?> <?php echo @$nTotalRecs; ?></span> </div>
      <div class="dataTables_info fleft customrecperpage"> <span class="seperator">|</span> <span class="phpmaker"> <?php echo @$LS['RecordsPerPage'] ?>&nbsp;
        <select name="RecPerPage" onChange="window.location.href='<?php echo $urlbase_paginacion; ?>/start-1/recperpage-'+this.value+'<?php echo @$postfix_pagination; ?>';" class="form-control input-xsmall input-sm input-inline">
          <option value="10"<?php if ($nDisplayRecs == 10) { echo " selected";  }?>>10</option>
          <option value="20"<?php if ($nDisplayRecs == 20) { echo " selected";  }?>>20</option>
          <option value="50"<?php if ($nDisplayRecs == 50) { echo " selected";  }?>>50</option>
          <option value="100"<?php if ($nDisplayRecs == 100) { echo " selected";  }?>>100</option>
          <option value="ALL"<?php if (@$original_recperpage == "ALL") { echo " selected";  }?>> <?php echo @$LS['AllRecords'] ?></option>
        </select>
        </span> </div>
      <?php } else { ?>
      <div class="note note-info note-bordered">
        <p> <?php echo @$LS['NoRecord']; ?></p>
      </div>
      <?php } ?>
    </div>
    </div>
    <div class="col-md-4 col-sm-12"></div>
  </div>
  </div>
</form>
<?php } ?>
