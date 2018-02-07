<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN VALIDATION STATES-->
    <div class="portlet light portlet-fit portlet-form ">
      <div class="portlet-title">
        <div class="caption">
          <h3><span class="caption-subject sbold uppercase"><strong>About Us Page</strong></span></h3>
        </div>
      </div>
      <div class="portlet-body"> 
        <!-- BEGIN FORM-->
        <?php if($this->session->flashdata('added_success')){ ?>
        <div class="alert alert-success" align="center">
          <button class="close" data-close="alert"></button>
          <?php echo $this->session->flashdata('added_success'); ?> </div>
        <?php } ?>
        <form action="<?php echo site_url("about_us/update"); ?>" id="form_sample_1" class="form-horizontal" method="post">
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-2">Add Page Title </label>
              <div class="col-md-8">
                <input name="title" type="text" class="form-control" value="<?php if(!empty($page->title)){echo $page->title;} ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2">Add Main Paragraph </label>
              <div class="col-md-8">
                <textarea name="paragraph" data-required="1" class="form-control" rows="5" ><?php if(!empty($page->paragraph)){echo $page->paragraph;} ?>
</textarea>
              </div>
            </div>
            <div id="ab_row">
              <?php
				$row = json_decode($page->description);
				/*echo "<pre>"; print_r($row); exit;*/
				if($row!=FALSE){
				foreach($row as $key => $val){
			?>
              <div class="form-group" id="row_ab_<?php echo $key; ?>" >
                <div class="col-md-offset-2 col-md-7">
                  <textarea name="description[<?php echo $key; ?>]" data-required="1" class="form-control" rows="5" ><?php echo $val; ?></textarea>
                </div>
                <div class="col-md-1">
                  <button type="button" class="btn btn-sm btn-danger" onclick="delete_ab_row(<?php echo $key; ?>)" >Delete</button>
                </div>
              </div>
              
              <?php }} ?>
            </div>
            <?php
            $quantity =	json_decode($page->description);
			if(!empty($quantity)){ 
				$numbering = count((array)$quantity);
				$numbering = $numbering;
			}else{
				$numbering = "0";
			}
			?>
            <input type="hidden" value="<?php echo $numbering; ?>" name="counter" />
            <div class="form-group">
              <div class="col-md-10" align="right">
                <input type="hidden" id="counter" />
                <button type="button" class="btn btn-primary" onClick="add_row()">Add new row</button>
              </div>
            </div>
          </div>
          <div class="form-actions">
            <div class="row">
              <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn green">Submit</button>
                <a href="<?php echo site_url("admin"); ?>" class="btn grey-salsa btn-outline">Cancel</a> </div>
            </div>
          </div>
        </form>
        <!-- END FORM--> 
      </div>
    </div>
    <!-- END VALIDATION STATES--> 
  </div>
</div>
<?php include(APPPATH."views/admin/inc/footer1.php"); ?>
<script type="text/javascript">

function add_row(){
	var counter = $("input[name='counter']").val();
	var counter = parseInt(counter)+1;
	$.post("<?php echo site_url("about_us/add_row"); ?>", {counter:counter}).done(function(data){
		$("#ab_row").append(data);
		$("#row_ab_"+counter).slideDown(500);
	});
	$("input[name='counter']").val(counter);
}

function delete_ab_row(row){
	$("#row_ab_"+row).slideUp(500, function(){
		$("#row_ab_"+row).remove();
	});
	
	
}

</script>
<?php include(APPPATH."views/admin/inc/footer2.php"); ?>
