<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN VALIDATION STATES-->
    <div class="portlet light portlet-fit portlet-form ">
      <div class="portlet-title">
        <div class="caption">
          <h3><span class="caption-subject sbold uppercase"><strong>News</strong></span></h3>
        </div>
      </div>
      <!-- BEGIN FORM-->
      <form action="<?php echo site_url("admin/news/insert"); ?>" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
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
		  <div class="col-md-6" >
		  <h3> Enter in English</h3>
         
          <div class="form-group">
            <label class="control-label col-md-3">Title <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input type="text" name="title_en" data-required="1" class="form-control" required="required" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Description <span class="required"> * </span> </label>
            <div class="col-md-6">
              <textarea name="description_en" data-required="1" class="form-control" required="required" ></textarea>
            </div>
          </div>
		  </div>
		  <div class="col-md-6" >
		  <h3> Entrar en español</h3>
		  <!--<div class="form-group">
            <label class="control-label col-md-3">Fecha</label>
            <div class="col-md-6">
              <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" name="date_es" />
            </div>
          </div>-->
          <div class="form-group">
            <label class="control-label col-md-3">Título <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input type="text" name="title_es" data-required="1" class="form-control" required="required" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Descripción <span class="required"> * </span> </label>
            <div class="col-md-6">
              <textarea name="description_es" data-required="1" class="form-control" required="required" ></textarea>
            </div>
          </div>
		  </div>
		   <div class="form-group">
            <label class="control-label col-md-3">Date</label>
            <div class="col-md-6">
              <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" name="date_en" />
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile1"  class="control-label col-md-3">Upload Image</label>
            <div class="col-md-4">
              <input type="file" id="exampleInputFile2" name="userfile" >
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
    <!-- END VALIDATION STATES--> 
  </div>
</div>
<?php include(APPPATH."views/admin/inc/footer1.php"); ?>
<?php include(APPPATH."views/admin/inc/footer2.php"); ?>
