





<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN VALIDATION STATES-->
    <div class="portlet light portlet-fit portlet-form ">
      <div class="portlet-title">
        <div class="caption">
          <h3><span class="caption-subject sbold uppercase"><strong>Update Videos</strong></span></h3>
        </div>
      </div>
      <div class="portlet-body"> 
        <!-- BEGIN FORM-->
        <form action="<?php echo site_url("admin/dashboard/update_video"); ?>" id="form_sample_1" class="form-horizontal" method="post">
          <div class="form-body">
            <div class="alert alert-danger display-hide">
              <button class="close" data-close="alert"></button>
              You have some form errors. Please check below. </div>
            <div class="alert alert-success display-hide">
              <button class="close" data-close="alert"></button>
              Your form validation is successful! </div>
            <?php if($this->session->flashdata('updated_success')){ ?>
            <div class="alert alert-success" align="center">
              <button class="close" data-close="alert"></button>
              <?php echo $this->session->flashdata('updated_success'); ?> </div>
            <?php } ?>
            <?php if($this->session->flashdata('already_exists')){ ?>
            <div class="alert alert-danger" align="center">
              <button class="close" data-close="alert"></button>
              <?php echo $this->session->flashdata('already_exists'); ?> </div>
            <?php } ?>
            <?php if($this->session->flashdata('error_occur')){ ?>
            <div class="alert alert-danger" align="center">
              <button class="close" data-close="alert"></button>
              <?php echo $this->session->flashdata('error_occur'); ?> </div>
            <?php } ?>
            <div class="form-group">
              <label class="control-label col-md-3">Link 1 <span class="required"> * </span> </label>
              <div class="col-md-4">
                <input type="text" name="link_1" data-required="1" class="form-control" value="<?php echo $videos->link_1; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Link 2 <span class="required"> * </span> </label>
              <div class="col-md-4">
                <input name="link_2" type="text" class="form-control" value="<?php echo $videos->link_2; ?>" />
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
<?php include(APPPATH."views/admin/inc/footer2.php"); ?>

