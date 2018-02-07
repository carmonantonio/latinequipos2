<?php include(APPPATH."views/web/inc/header1.php"); ?>

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
        
        
        
        
        
        
        
        <div class="c-content-box c-size-md c-bg-white" style="margin:5% 0%">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 wow animated fadeInLeft">
                            <!-- Begin: Title 1 component -->
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">About us</h3>
                                <div class="c-line-left c-theme-bg"></div>
                            </div>
                            <!-- End-->
                            <p style="text-align:justify">LatinEquipos is a new website with the idea to create a second hand market place to match supply and demand of construction equipment in Latin America. LatinEquipos is the first website who focuses specifically on the Latin-American used equipment market. </p>
                            <p style="text-align:justify">LatinEquipos is the first website in Latin America specialized in buying, selling and renting used machines. On LatinEquipos you can find all kinds of products from Drainage, Drilling, Demolition, Dredging, Geotechnical, Piling, Oil Spill and recycling. The machines on LatinEquipos website are located throughout Latin America and can conveniently be transported to your location of need. LatinEquipos works together with American and European manufacturers in order to provide you with used equipment!</p>
                            <p style="text-align:justify">You want to put up your machine on LatinEquipos? Press here_______.</p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/MISC/ABOUT-1 -->
            <!-- BEGIN: CONTENT/TESTIMONIALS/TESTIMONIALS-2 -->
            <div class="c-content-box c-size-lg c-bg-white">
                <div class="container">
                    <!-- Begin: testimonials 1 component -->
                    <div class="c-content-testimonials-1 c-option-2 wow animated fadeIn" data-slider="owl" data-single-item="true" data-auto-play="8000">
                        <!-- Begin: Title 1 component -->
                        <div class="c-content-title-1">
                            <h3 class="c-center c-font-uppercase c-font-bold">Our Satisfied Customers</h3>
                            <div class="c-line-center c-theme-bg"></div>
                        </div>
                        <!-- End-->
                        <!-- Begin: Owlcarousel -->
                        <div class="owl-carousel owl-theme c-theme wow animated fadeInUp">
                            <div class="item">
                                <div class="c-testimonial">
                                    <p> “JANGO is an international, privately held company that specializes in the start-up, promotion and operation of multiple online marketplaces” </p>
                                    <h3>
                                        <span class="c-name c-theme">John Snow</span>, CEO, Mockingbird </h3>
                                </div>
                            </div>
                            <div class="item">
                                <div class="c-testimonial">
                                    <p> “After co-founding the company in 2006 the group launched JANGO, the first digital marketplace which focused on rich multimedia web content” </p>
                                    <h3>
                                        <span class="c-name c-theme">Arya Stark</span>, CFO, Valar Dohaeris </h3>
                                </div>
                            </div>
                            <div class="item">
                                <div class="c-testimonial">
                                    <p> “It was the smoothest implementation process I have ever been through with JANGO’s process and schedule.” </p>
                                    <h3>
                                        <span class="c-name c-theme">Arya Stark</span>, CFO, Valar Dohaeris </h3>
                                </div>
                            </div>
                            <div class="item">
                                <div class="c-testimonial">
                                    <p> “A system change is always stressful and JANGO did a great job of staying positive, helpful, and patient with us.” </p>
                                    <h3>
                                        <span class="c-name c-theme">Arya Stark</span>, CFO, Valar Dohaeris </h3>
                                </div>
                            </div>
                        </div>
                        <!-- End-->
                    </div>
                    <!-- End-->
                </div>
            </div>
            <!-- END: CONTENT/TESTIMONIALS/TESTIMONIALS-2 -->
            <!-- END: PAGE CONTENT -->
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!--<div class="row" style="padding:5% 0%">
          <div class="container">
            <div class="c-content-box c-size-md c-bg-white"> 
              <!-- Begin: Title 1 component --
              <div class="c-content-title-1" align="center">
                <h3 class="c-font-uppercase c-font-bold"><?php //echo $page->title; ?></h3>
                <div class="c-line-left c-theme-bg"></div>
              </div>
              <!-- End--
              <p><?php //if(!empty($page->paragraph)){ echo $page->paragraph; } ?></p>
              	<?php //if(!empty($page->description)){
					//$page1 = json_decode($page->description);
				?>
  	            <?php //foreach($page1 as $des){ ?>
              		<p><?php //echo $des; ?></p>
              	<?php //}} ?>
            </div>
          </div>
        </div>-->
      </div>
    </div>
  </div>
</div>
<?php include(APPPATH."views/web/subscribe.php"); ?>
<?php include(APPPATH."views/web/about_text.php"); ?>
<?php include(APPPATH."views/web/inc/footer1.php"); ?>
<?php include(APPPATH."views/web/inc/footer2.php"); ?>
