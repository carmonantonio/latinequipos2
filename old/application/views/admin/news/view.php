<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<style>
.buttons-copy {
	display: none !important;
}
.buttons-csv {
	display: none !important;
}
.buttons-collection {
	display: none !important;
}
</style>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12">
	<?php if($this->session->flashdata('deleted_success')){ ?>
    <div class="alert alert-danger" align="center">
      <button class="close" data-close="alert"></button>
      <?php echo $this->session->flashdata('deleted_success'); ?> </div>
    <?php } ?>
    <div class="portlet light ">
      <div class="portlet-title">
        <div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase">Buttons</span> </div>
        <div class="tools"> </div>
      </div>
      <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="sample_1">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Seller</th>
              <th>Category</th>
              <th>Posting Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if($news->num_rows()>0){ ?>
            <?php foreach($news->result() as $news){ ?>
            <tr>
              <td width="10"><?php echo $news->id; ?></td>
              <td width="15"><?php echo $news->date; ?></td>
              <td width="35"><?php echo $news->title; ?></td>
              <td width="35"><?php echo $news->description; ?></td>
              <td width="5"><img src="<?php echo base_url("assets/web/uploads/news/".$news->image); ?>" style="width:35%"></td>
              <td width="5"><a href="<?php echo site_url("admin/news/getads/".$news->id); ?>" class="btn btn-fit-height green dropdown-toggle">Edit</a><a href="<?php echo site_url("admin/news/delete/".$news->id); ?>" class="btn btn-fit-height red dropdown-toggle">Delete</a></td>
            </tr>
            <?php }} ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include(APPPATH."views/admin/inc/footer1.php"); ?>
<?php include(APPPATH."views/admin/inc/footer2.php"); ?>
