<?php include(APPPATH."views/web/inc/header1.php"); ?>
<style>
.custom-counter {
	margin-left: 0;
	padding-right: 7%;
	list-style-type: none;
}
.custom-counter li {
	counter-increment: step-counter;
	border-top: 1px solid;
	border-top-color: #ee7d11;
	margin-top: 3%;
	text-align: justify;
}
.custom-counter li::before {
	content: counter(step-counter);
	margin-right: 5px;
	font-size: 100%;
	background-color: #ee7d11;
	color: white;
	font-weight: bold;
	padding: 3px 23px;
	border-radius: 3px;
}
</style>
<?php include(APPPATH."views/web/inc/header2.php"); ?>
<div class="c-layout-page">
  <div class="container">
    <div class="c-content-box c-size-lg c-no-padding c-overflow-hide c-bg-white">
      <div class="c-content-product-3 c-bs-grid-reset-space">
        <div class="row" style="margin-top:5%">
          <div class="col-md-12 col-sm-12">
            <form action="<?php echo site_url("home/search"); ?>" method="post">
              <div class="row">
                <div class="col-md-12">
                  <div class="input-group">
                    <div class="input-group-btn search-panel">
                      <button type="button" class="btn c-theme-btn dropdown-toggle" data-toggle="dropdown" > <span id="search_concept">Whole Site</span> </button>
                    </div>
                    <input type="text" class="form-control" name="search_string" placeholder="Search">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </span> </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row" style="padding:5% 0%">
          <div class="container">
            <div class="c-content-box c-size-md c-bg-white"> 
              <!-- Begin: Title 1 component -->
              <div class="c-content-title-1" align="center">
                <h3 class="c-font-uppercase c-font-bold"><?php echo $page->title; ?></h3>
                <div class="c-line-left c-theme-bg"></div>
              </div>
              <!-- End-->
              <p><?php echo $page->paragraph; ?></p>
              <ol class="custom-counter">
              	
                <?php
				$tc = json_decode($page->tc);
				foreach($tc as $tc){
				?>
                <li><?php echo $tc; ?></li>
                <?php } ?>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(APPPATH."views/web/inc/footer1.php"); ?>
<?php include(APPPATH."views/web/inc/footer2.php"); ?>
