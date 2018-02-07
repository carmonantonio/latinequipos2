<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12">
    <div class="portlet light portlet-fit portlet-form ">
      <div class="portlet-title">
        <div class="caption">
          <h3><span class="caption-subject sbold uppercase"><strong>Edit Seller</strong></span></h3>
        </div>
      </div>
      <form action="<?php echo site_url("admin/seller/update/".$seller_by_en->seller_id); ?>" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
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
		  <div class="row">
			<div class="col-md-6">
			<div class="form-group">
            <label class="control-label col-md-3">Name <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input type="text" name="name_en" data-required="1" class="form-control" value="<?php echo $seller_by_en->name; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Email <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input name="email_en" type="text" class="form-control" value="<?php echo $seller_by_en->email; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Phone Number <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input type="text" name="phone_number_en" data-required="1" class="form-control" value="<?php echo $seller_by_en->phone_number; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Address <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input type="text" name="address_en" data-required="1" class="form-control" value="<?php echo $seller_by_en->address; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Occupation <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input type="text" name="occupation_en" data-required="1" class="form-control" value="<?php echo $seller_by_en->occupation; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Description <span class="required"> * </span> </label>
            <div class="col-md-6">
              <textarea name="description_en" data-required="1" class="form-control" ><?php echo $seller_by_en->description; ?></textarea>
            </div>
          </div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
            <label class="control-label col-md-3">Nombre <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input type="text" name="name_es" data-required="1" class="form-control" value="<?php echo $seller_by_es->name; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Email <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input name="email_es" type="text" class="form-control" value="<?php echo $seller_by_es->email; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Número de teléfono <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input type="text" name="phone_number_es" data-required="1" class="form-control" value="<?php echo $seller_by_es->phone_number; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Dirección <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input type="text" name="address_es" data-required="1" class="form-control" value="<?php echo $seller_by_es->address; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Ocupación <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input type="text" name="occupation_es" data-required="1" class="form-control" value="<?php echo $seller_by_es->occupation; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Descripción <span class="required"> * </span> </label>
            <div class="col-md-6">
              <textarea name="description_es" data-required="1" class="form-control" ><?php echo $seller_by_es->description; ?></textarea>
            </div>
          </div>
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
