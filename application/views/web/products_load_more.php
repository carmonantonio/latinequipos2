<?php //echo "<pre>"; print_r($products->result()); exit; ?>
		<?php if($products->num_rows()>0){ ?>
          <?php foreach($products->result() as $product){ ?>
          
          <div class="col-md-4 col-sm-6 c-margin-b-20">
                            <div class="c-content-product-2 c-bg-white" style="min-height:350px;max-height:350px;">
                                <div class="c-content-overlay">
                                    <div class="c-overlay-wrapper">
                                        <div class="c-overlay-content">
                                            <a href="<?php echo site_url("home/search_ad/".$product->id); ?>" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square"><?php echo $this->lang->line("explore");?></a>
                                        </div>
                                    </div>
                                    
                                    <?php
				  $picture = (object)json_decode($product->pictures);
					if(!empty((array)$picture)){
					foreach($picture as $picture){ ?>
                  <img src="<?php echo base_url("assets/web/uploads/products/".$picture); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height: 275px;width:275px;"  />
				  	<?php break;
					}}else{ ?>
                    <img src="<?php echo base_url("assets/web/uploads/noimage.jpg"); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height: 275px; width:275px"  />
                    <?php } ?>
                                    
                                    
                                    
                                    
                                    
                                </div>
                                <div class="c-info" style="padding: 10px 6px !important;">
                                <?php if($product->selling_price=="0"){ $price = "Price On Request"; }else{ $price = $product->selling_price ?>
                                <p class="c-title c-font-16 c-font-slim" style="font-size:14px;">
								<?php //echo substr($product->name, 0, 15).'....';
								echo "<strong>".substr($product->name, 0, 35)."</strong><br>";
								echo $product->category_name."<br>";
								echo $price;
								?>
                                </p>
                                    <!--<p class="c-title c-font-12 c-font-slim"><?php //echo $product->category_name." - ".$product->model." - ".$product->year." - ".$price; ?></p>-->
                                    <p class="c-title c-font-12 c-font-slim"><?php ; } ?></p>
                                </div>
                            </div>
                        </div>
          
          
          
          
          <!--<div class="row c-margin-b-40" style="border-bottom:1px solid #CCC">
            <div class="c-content-product-2 c-bg-white">
              <div class="col-md-3">
              <a href="<?php //echo site_url("home/search_ad/".$product->id); ?>">
                <div class="c-content-overlay">
                  <?php
				  /*$picture = (object)json_decode($product->pictures);
					if(!empty((array)$picture)){
					foreach($picture as $picture){*/ ?>
                  <img src="<?php //echo base_url("assets/web/uploads/products/".$picture); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height: 150px;width:174px;"  />
				  	<?php //break;
					//}}else{ ?>
                    <img src="<?php //echo base_url("assets/web/uploads/noimage.jpg"); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height: 150px; width:174px"  />
                    <?php //} ?>
                </div>
                </a>
              </div>
              <div class="col-md-9">
                <div class="c-info-list">
                  <h3 class="c-title c-font-bold c-font-22 c-font-dark"> <a class="c-theme-link" href="shop-product-details.html"><?php //echo $product->name; ?></a> </h3>
                  <a href="<?php //echo site_url("home/search_ad/".$product->id); ?>" class="btn c-theme-btn c-btn-circle"><p style="margin:0px !important;font-size:12px;">View Detail</p></a>
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
                    <td><?php //echo $product->category_name; ?></td>
                    <td><?php //echo $product->model; ?></td>
                    <td><?php //echo $product->year; ?></td>
                    <td><?php //echo $product->seller_address; ?></td>
                    <td><?php //echo $product->country; ?></td>
                    </tr>
                    
                    </tbody>
                  </table>
                  </p>
                </div>
                <div> </div>
              </div>
            </div>
          </div>-->
          <?php }} ?>