<?php include(APPPATH."views/web/inc/header1.php"); ?>
<style>

.table thead tr th{
	font-size:14px;
	text-align:center;
}

.table tbody tr{
	text-align:center;
	font-size:12px
}

</style>
<?php include(APPPATH."views/web/inc/header2.php"); ?>

<div class="c-layout-page">
  <div class="container">
    <?php include(APPPATH."views/web/inc/side_menu.php"); ?>
    <div class="c-layout-sidebar-content ">
      <?php include(APPPATH."views/web/inc/top_search.php"); ?>
      <div class="c-margin-t-30"></div>
      <div class="row">
        <div class="col-md-12">
          <div class="c-shop-result-filter-1 clearfix form-inline">
            <div class="c-filter">
              <label class="control-label c-font-16">Sort&nbsp;By:</label>
              <select class="form-control c-square c-theme c-input" onchange="filter_search($(this).val())">
                <option label="search by filter"></option>
                <option value="asc">Name (A - Z)</option>
                <option value="viewed">Most Viewed</option>
              </select>
            </div>
          </div>
          <div class="c-margin-t-20"></div>
          <div id="load_more">
          <?php if($products->num_rows()>0){ ?>
          <?php foreach($products->result() as $product){ ?>
          <div class="row c-margin-b-40" style="border-bottom:1px solid #CCC">
            <div class="c-content-product-2 c-bg-white">
              <div class="col-md-3">
              <a href="<?php echo site_url("home/search_ad/".$product->id); ?>">
                <div class="c-content-overlay">
					<?php
                    $picture = (object)json_decode($product->pictures);
					//print_r($picture);
					if(!empty((array)$picture)){
						
						foreach($picture as $picture){
                    ?>
                    <img src="<?php echo base_url("assets/web/uploads/products/".$picture); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height: 150px;width:174px;"  />
                    <?php break; }}else{ ?>
                    <img src="<?php echo base_url("assets/web/uploads/noimage.jpg"); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height: 150px; width:174px"  />
                    <?php } ?>
                </div>
                </a>
              </div>
              <div class="col-md-9">
                <div class="c-info-list">
                  <h3 class="c-title c-font-bold c-font-22 c-font-dark"> <a class="c-theme-link" href="shop-product-details.html"><?php echo $product->name; ?></a> </h3>
                  <a href="<?php echo site_url("home/search_ad/".$product->id); ?>" class="btn c-theme-btn c-btn-circle"><p style="margin:0px !important;font-size:12px;">View Detail</p></a>
                  <p class="c-desc c-font-16 c-font-thin">
                  <table class="table">
                    <thead>
                    <tr>
                      <th>Category</th>
                      <th>Brand/Model</th>
                      <th>Construction Year</th>
                      <th>Location</th>
                      <th>Country</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                    <td><?php echo $product->category_name; ?></td>
                    <td><?php echo $product->model; ?></td>
                    <td><?php echo $product->year; ?></td>
                    <td><?php echo $product->seller_address; ?></td>
                    <td><?php echo $product->country; ?></td>
                    </tr>
                    
                    </tbody>
                  </table>
                  </p>
                </div>
                <div> </div>
              </div>
            </div>
          </div>
          <?php } ?>
          </div>
          <div class="c-margin-t-20"></div>
          <input type="hidden" value="<?php echo $counter; ?>" name="counter" />
          <div align="center"><a href="javascript:;" class="btn btn-dark c-btn-circle" id="load_btn" style="border:1px solid" onclick="load_more()" >Load More...</a><img src="<?php echo site_url("assets/loader.gif"); ?>" width="100" id="loader" style="display:none" /></div>
          <?php }else{ ?>
          <div class="col-md-12" align="center"><em>No Record Found</em></div>
          <?php } ?>
          <!--<ul class="c-content-pagination c-square c-theme pull-right">
            <li class="c-prev"> <a href="#"> <i class="fa fa-angle-left"></i> </a> </li>
            <li> <a href="#">1</a> </li>
            <li class="c-active"> <a href="#">2</a> </li>
            <li> <a href="#">3</a> </li>
            <li> <a href="#">4</a> </li>
            <li class="c-next"> <a href="#"> <i class="fa fa-angle-right"></i> </a> </li>
          </ul>-->
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(APPPATH."views/web/inc/footer1.php"); ?>
<script type="text/javascript">

function load_more(){
	$("#load_btn").css("display","none");
	$("#loader").css("display","inherit");
	var counter_val = $("input[name=counter]").val();
	var counter = parseInt(counter_val)+10;
	$.post("<?php echo site_url("products/load_more"); ?>",{counter:counter}).done(function(data){
		$("#load_more").append(data);
		$("#load_btn").css("display","inline");
		$("#loader").css("display","none");
	});
	$("input[name=counter]").val(counter);
}

function filter_search(val){
	$.post("<?php echo site_url("products/filter_search"); ?>",{val:val}).done(function(data){
		$("#load_more").html(data);
		$("#load_btn").fadeOut();
	});
}

</script>
<?php include(APPPATH."views/web/inc/footer2.php"); ?>
