<div class="load_request_quote_left" style="margin-top:0%;">
          <table class="table">
            <thead>
            </thead>
            <tbody>
              <?php if(!empty($ad_detail_request->model)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("model"); ?>: </strong><?php echo $ad_detail_request->model; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->year)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("year_of_manufacturing"); ?>: </strong><?php echo $ad_detail_request->year; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->serial_number)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("serial_number"); ?>: </strong><?php echo $ad_detail_request->serial_number; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->hours)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("hours"); ?>: </strong><?php echo $ad_detail_request->hours; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->refurbished)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("refurbished"); ?>: </strong><?php echo $ad_detail_request->refurbished; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->weight)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("weight"); ?>: </strong><?php echo $ad_detail_request->weight; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->engine)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("engine"); ?>: </strong><?php echo $ad_detail_request->engine; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->accessories)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("engine"); ?>: </strong><?php echo $ad_detail_request->accessories; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->keyword)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("keywords"); ?>: </strong><?php
                                    	if($ad_detail_request->keyword){ 
											$keywords = explode(",", $ad_detail_request->keyword);
												foreach($keywords as $key => $val){
									?>
                  <a href="<?php echo site_url("home/search?keyword=".$val); ?>"><?php echo $val; ?></a>,
                  <?php
												}
										}else{ echo "N/A"; }
										
										
										
									?></td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>