<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12">
    <div class="portlet light portlet-fit portlet-form ">
      <div class="portlet-title">
        <div class="caption">
          <h3><span class="caption-subject sbold uppercase"><strong>Add New Seller</strong></span></h3>
        </div>
      </div>
      <form action="<?php echo site_url("admin/seller/insert"); ?>" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-body">
          <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            You have some form errors. Please check below. </div>
          <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button>
            Your form validation is successful! </div>
          <?php if($this->session->flashdata('added_success')){ ?>
          <div class="alert alert-success" align="center">
            <button class="close" data-close="alert"></button>
            <?php echo $this->session->flashdata('added_success'); ?> </div>
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
              <input type="text" name="name" data-required="1" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Email <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input name="email" type="text" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Phone Number <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="phone_number" data-required="1" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Address <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="address" data-required="1" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Occupation <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="occupation" data-required="1" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Description <span class="required"> * </span> </label>
            <div class="col-md-4">
              <textarea name="description" data-required="1" class="form-control" ></textarea>
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
</div>
<?php include(APPPATH."views/admin/inc/footer1.php"); ?>
<?php include(APPPATH."views/admin/inc/footer2.php"); ?>
