<?php

$main_categories = load_main_cat();

?>
<style>
.logo-mobile-responsive1 {
	display: none;
}
</style>
</head><body class="c-layout-header-fixed c-layout-header-6-topbar">
<!-- BEGIN: LAYOUT/HEADERS/HEADER-2 --> 
<!-- BEGIN: HEADER 2 -->

<header class="c-layout-header c-layout-header-6 c-navbar-fluid" data-minimize-offset="80">
  <div class="c-topbar" style="padding:0px !important; margin-top:-10px;">
    <div class="container" align="center"> <!--<img src="<?php //echo site_url(); ?>assets/web/img/ads/ad.jpg" alt="Adevertisement" style="width:100%" class="c-desktop-logo-inverse"> -->
      <div class="container logo-mobile-responsive1" style="margin-top:5%"> <img src="<?php echo site_url(); ?>assets/web/base/img/layout/logos/logo-3.jpeg" alt="Latinequips" class="c-desktop-logo-inverse logo-mobile-responsive" /> </div>
      <div class="c-brand">
        <button class="c-topbar-toggler" type="button"> <i class="fa fa-ellipsis-v"></i> </button>
        <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu"> <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span> </button>
      </div>
    </div>
  </div>
  <div class="c-navbar" style="background-color:#ee7d11 !important;">
    <div class="container" > 
      <!-- BEGIN: BRAND -->
      <div class="c-navbar-wrapper clearfix"> 
        <!-- END: BRAND --> 
        <!-- BEGIN: QUICK SEARCH --> 
        
        <!-- END: QUICK SEARCH --> 
        <!-- BEGIN: HOR NAV --> 
        <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU --> 
        <!-- BEGIN: MEGA MENU --> 
        <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
        <nav class="c-mega-menu c-pull-right c-mega-menu-light c-mega-menu-light-mobile c-fonts-uppercase c-fonts-bold">
          <ul class="nav navbar-nav c-theme-nav">
            <li class="c-menu-type-classic"> <a href="<?php echo site_url(); ?>" class="c-link dropdown-toggle" style="padding:12px 25px 12px 25px !important"><img src="<?php echo site_url(); ?>assets/web/base/img/layout/logos/logo-3.jpeg" alt="Latinequips" class="c-desktop-logo-inverse"> </a> </li>
            <li class="c-active"> <a href="<?php echo site_url(); ?>" class="c-link dropdown-toggle">Home <span class="c-arrow c-toggler"></span> </a> </li>
            <li class="c-menu-type-classic" >
            <a role="button" data-toggle="dropdown" data-target="<?php echo site_url("category"); ?>" href="<?php echo site_url("category"); ?>" class="c-link dropdown-toggle">
                Categories <span class="caret"></span>
            </a>
    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu" style="width:250px">
              <?php if($main_categories->num_rows()>0){ ?>
              <?php foreach($main_categories->result() as $cat): ?>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="<?php echo site_url("home/search_by_cat/".$cat->id); ?>"><?php echo $cat->category_name; ?></a>
                <ul class="dropdown-menu" style="width:250px">
                  <?php
				  	$sub_cat = load_parent_cat($cat->id);
					if($sub_cat->num_rows()>0){
					foreach($sub_cat->result() as $sub):
				  ?>
                  <li class="dropdown-submenu">
                    <a href="<?php echo site_url("home/search/".$sub->id); ?>"><?php echo $sub->category_name; ?></a>
                    <ul class="dropdown-menu" style="width:250px">
                        <?php
                        	$ads1 = load_ad($sub->id);
							if($ads1->num_rows()>0){
							foreach($ads1->result() as $ad):
						?>
                        <li><a href="<?php echo site_url("home/search_ad/".$ad->id); ?>"><?php echo $ad->name; ?></a></li>
                        <?php endforeach; } ?>
                    </ul>
                  </li>
                  <?php endforeach; } ?>
                </ul>
              </li>
              <?php endforeach; } ?>
              
            </ul>
        </li>
        <li class="c-menu-type-classic"> <a href="<?php echo site_url("products"); ?>" class="c-link dropdown-toggle">All Products<span class="c-arrow c-toggler"></span> </a> </li>
            <!--<li class="c-menu-type-classic"> <a href="javascript:;" class="c-link dropdown-toggle">Offers and Services <span class="c-arrow c-toggler"></span> </a> </li>--> 
            <!--<li class="c-menu-type-classic"> <a href="<?php //echo site_url("need_help"); ?>" class="c-link dropdown-toggle">Need Help?<span class="c-arrow c-toggler"></span> </a> </li>-->
            <li class="c-menu-type-classic"> <a href="<?php echo site_url("news"); ?>" class="c-link dropdown-toggle">News<span class="c-arrow c-toggler"></span> </a> </li>
            <li class="c-menu-type-classic"> <a href="<?php echo site_url("request_quote"); ?>" class="c-link dropdown-toggle">Request a Quote<span class="c-arrow c-toggler"></span> </a> </li>
            
            <li class="c-menu-type-classic" style="float:right;margin-top:2% !important;">
              <div id="google_translate_element"></div>
            </li>
          </ul>
        </nav>
        
        <!-- END: MEGA MENU --> 
        <!-- END: LAYOUT/HEADERS/MEGA-MENU --> 
        <!-- END: HOR NAV --> 
      </div>
      <!-- BEGIN: LAYOUT/HEADERS/QUICK-CART --> 
      <!-- BEGIN: CART MENU --> 
      
      <!-- END: CART MENU --> 
      <!-- END: LAYOUT/HEADERS/QUICK-CART --> 
    </div>
  </div>
</header>
