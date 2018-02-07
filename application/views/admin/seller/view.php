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
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th>Occupation</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if($seller->num_rows()>0){ ?>
            <?php foreach($seller->result() as $seller){ ?>
            <tr>
              <td><?php echo $seller->name; ?></td>
              <td><?php echo $seller->email; ?></td>
              <td><?php echo $seller->phone_number; ?></td>
              <td><?php echo $seller->address; ?></td>
              <td><?php echo $seller->occupation; ?></td>
              <td><?php echo $seller->description; ?></td>
              <td>
                <a href="<?php echo site_url("admin/seller/getseller/".$seller->id); ?>" class="btn btn-fit-height green dropdown-toggle">Edit</a>
                <a href="<?php echo site_url("admin/seller/deleteseller/".$seller->id); ?>" class="btn btn-fit-height red dropdown-toggle">Delete</a></td>
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
