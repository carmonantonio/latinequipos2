
<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN VALIDATION STATES-->
    <div class="portlet light portlet-fit portlet-form ">
      <div class="portlet-title">
        <div class="caption">
          <h3><span class="caption-subject sbold uppercase"><strong>Terms and Conditions Page</strong></span></h3>
        </div>
      </div>
      <div class="portlet-body"> 
        <!-- BEGIN FORM-->
        <?php if($this->session->flashdata('added_success')){ ?>
            <div class="alert alert-success" align="center">
              <button class="close" data-close="alert"></button>
              <?php echo $this->session->flashdata('added_success'); ?> </div>
            <?php } ?>
        <form action="<?php echo site_url("terms_conditions/update"); ?>" id="form_sample_1" class="form-horizontal" method="post">
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
                <textarea name="paragraph" data-required="1" class="form-control" rows="5" ><?php echo $page->paragraph; ?></textarea>
              </div>
            </div>
            
            <div id="tc_row">
            
            <?php
            
			if(!empty($page->tc)){
				$tc = json_decode($page->tc);
				
				
				foreach($tc as $key => $value){
					
			?>
            <div class="form-group" id="new_row_<?php echo $key; ?>">
              <div class="col-md-offset-2 col-md-7">
                <textarea name="tc[<?php echo $key; ?>]" data-required="1" class="form-control" rows="5" ><?php echo $value; ?></textarea>
              </div>
              <div class="col-md-1">
               <button type="button" class="btn btn-sm btn-danger" onClick="delete_row(<?php echo $key; ?>)">Delete</button>
              </div>
            </div>
            <?php }} ?>
            
            
            </div>
            <?php
			  	$quantity = json_decode($page->tc);
				$numbering = count($quantity);
			  ?>
            <div class="form-group">
              <div class="col-md-10" align="right">
              
                <input type="hidden" id="counter" value="<?php echo $numbering; ?>" />
                <button type="button" class="btn btn-primary" onClick="add_row()">Add new terms & condition</button>
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
	var cc = $("#counter").val();
	var counter = parseInt(cc)+1; 
	$.post("<?php echo site_url("terms_conditions/add_row"); ?>",{counter:counter}).done(function(data){
		$("#tc_row").append(data);
	});
	$("#counter").val(counter);
}

function delete_row(rowid){
	$("#new_row_"+rowid).remove();
}

</script>
<?php include(APPPATH."views/admin/inc/footer2.php"); ?>
