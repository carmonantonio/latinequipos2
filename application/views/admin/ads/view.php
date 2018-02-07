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
            <?php if($ads->num_rows()>0){ ?>
            <?php foreach($ads->result() as $ads){ ?>
            <tr>
              <td><?php echo $ads->id; ?></td>
              <td><?php echo $ads->name; ?></td>
              <td><?php echo $ads->seller_name; ?></td>
              <td><?php echo $ads->category_name; ?></td>
              <td><?php echo $ads->ad_posting_date; ?></td>
              <td><a href="<?php echo site_url("admin/ads/getads/".$ads->id); ?>" class="btn btn-fit-height green dropdown-toggle">Edit</a><a href="<?php echo site_url("admin/ads/delete/".$ads->id); ?>" class="btn btn-fit-height red dropdown-toggle">Delete</a></td>
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
