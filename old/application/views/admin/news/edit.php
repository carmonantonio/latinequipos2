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
      <form action="<?php echo site_url("admin/news/update/".$news->id); ?>" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
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
            <label class="control-label col-md-3">Date</label>
            <div class="col-md-4">
              <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="<?php  echo date("m/d/Y", strtotime($news->date)); ?>" name="date"  />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Title <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="title" data-required="1" class="form-control" required="required" value="<?php echo $news->title; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Description <span class="required"> * </span> </label>
            <div class="col-md-4">
              <textarea  name="description" data-required="1" class="form-control" required="required" ><?php echo $news->description; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile1"  class="control-label col-md-3">Upload Image</label>
            <div class="col-md-4">
              <input type="file" id="exampleInputFile2" name="userfile" >
            </div>
            <div class="col-md-4">
            <img src="<?php echo base_url("assets/web/uploads/news/".$news->image); ?>" style="width:50%">
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
