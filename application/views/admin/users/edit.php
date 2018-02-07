<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN VALIDATION STATES-->
    <div class="portlet light portlet-fit portlet-form ">
      <div class="portlet-title">
        <div class="caption">
          <h3><span class="caption-subject sbold uppercase"><strong>Edit User</strong></span></h3>
        </div>
      </div>
      <div class="portlet-body"> 
        <!-- BEGIN FORM-->
        <form action="<?php echo site_url("admin/users/update/".$getuser->id); ?>" id="form_sample_1" class="form-horizontal" method="post">
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
              <label class="control-label col-md-3">Name <span class="required"> * </span> </label>
              <div class="col-md-4">
                <input type="text" name="full_name" data-required="1" class="form-control" value="<?php echo $getuser->full_name; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Email <span class="required"> * </span> </label>
              <div class="col-md-4">
                <input name="email" type="text" class="form-control" value="<?php echo $getuser->email; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Role <span class="required"> * </span> </label>
              <div class="col-md-4">
                <select class="form-control" name="role">
                  <option value="">select....</option>
                  <option value="Admin" <?php if($getuser->role=="Admin"){echo "selected";} ?>>Admin</option>
                  <option value="User" <?php if($getuser->role=="User"){echo "selected";} ?>>User</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">New Password <span class="required"> * </span> </label>
              <div class="col-md-4">
                <input name="password" type="password" class="form-control" />
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
