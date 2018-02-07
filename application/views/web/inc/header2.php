<?php

$main_categories = load_main_cat();
$seg1 = $this->uri->segment('1');
$seg2 = $this->uri->segment('2');
$seg3 = $this->uri->segment('3');


?>
<style>
.logo-mobile-responsive1 {
	display: none;
}
.dropdown-menu {
	top: 65% !important;
}
.flag_image {
	padding-right: 10%;
}
</style>
</head><body class="c-layout-header-fixed c-layout-header-6-topbar">
<!-- BEGIN: LAYOUT/HEADERS/HEADER-2 --> 
<!-- BEGIN: HEADER 2 -->

<header class="c-layout-header c-layout-header-6 c-navbar-fluid" data-minimize-offset="80">
  <div class="c-topbar" style="padding:0px !important; margin-top:-10px;">
    <div class="container" align="center"> <img src="<?php
	$image = load_top_ad();
	$image = $image->picture;
	 echo site_url('assets/admin/img/ads/'.$image); ?>" alt="Adevertisement" style="width:65%;" class="c-desktop-logo-inverse"> 
      <div class="container logo-mobile-responsive1" style="margin-top:5%"> <img src="<?php echo site_url(); ?>assets/web/base/img/layout/logos/logo-3.png" alt="Latinequips" class="c-desktop-logo-inverse logo-mobile-responsive" /> </div>
      <div class="c-brand">
        <button class="c-topbar-toggler" type="button"> <i class="fa fa-ellipsis-v"></i> </button>
        <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu"> <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span> </button>
      </div>
    </div>
  </div>
  <div class="c-navbar" style="background-color:#2f353b !important;">
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
        <nav class="c-mega-menu c-pull-right c-mega-menu-light c-mega-menu-light-mobile c-fonts-uppercase c-fonts-bold" style="width:105% !important;">
          <ul class="nav navbar-nav c-theme-nav">
            <li class="c-menu-type-classic"> <a href="<?php echo site_url(); ?>" class="c-link dropdown-toggle" style="padding:8px 25px 12px 2px !important"><img src="<?php echo site_url(); ?>assets/web/base/img/layout/logos/logo-3_w.png" width="150" alt="Latinequips" class="c-desktop-logo-inverse"> </a> </li>
            <li class="<?php if(($seg1=="" && $seg2==FALSE) OR ($seg1=="home" && $seg2==FALSE)){echo 'c-active'; } ?>"> <a href="<?php echo site_url(); ?>" class="c-link dropdown-toggle"><?php echo $this->lang->line("home"); ?> <span class="c-arrow c-toggler"></span> </a> </li>
            <li class="c-menu-type-classic <?php if($seg1=="category" || ($seg1=='home' && $seg2=='search') || ($seg1=='home' && $seg2=='search_by_cat')){echo 'c-active'; } ?>" > <a role="button" data-toggle="dropdown" data-target="<?php echo site_url("category"); ?>" href="<?php echo site_url("category"); ?>" class="c-link dropdown-toggle"> <?php echo $this->lang->line("categories"); ?> <span class="caret"></span> </a>
              <ul class="dropdown-menu multi-level <?php if(($seg2=='search_by_cat' || $seg2=='search') && $seg3==TRUE){echo 'c-active';} ?>" role="menu" aria-labelledby="dropdownMenu" style="width:250px">
                <?php if($main_categories->num_rows()>0){ ?>
                <?php foreach($main_categories->result() as $cat): ?>
                <li class="dropdown-submenu <?php if($seg3===$cat->id){echo 'c-active';} ?>"> <a tabindex="-1" href="<?php echo site_url("home/search_by_cat/".$cat->id); ?>"><?php echo $cat->category_name; ?></a>
                  <ul class="dropdown-menu <?php if($seg2=='search' && $seg3==TRUE){echo 'c-active';} ?>" style="width:250px">
                    <?php
				  	$sub_cat = load_parent_cat($cat->id);
					if($sub_cat->num_rows()>0){
					foreach($sub_cat->result() as $sub):
				  ?>
                    <li class="dropdown-submenu <?php if($seg3===$sub->id){echo 'c-active';} ?>"> <a href="<?php echo site_url("home/search/".$sub->id); ?>"><?php echo $sub->category_name; ?></a> </li>
                    <?php endforeach; } ?>
                  </ul>
                </li>
                <?php endforeach; } ?>
              </ul>
            </li>
            <li class="c-menu-type-classic <?php if($seg1=="products"){echo 'c-active'; } ?>"> <a href="<?php echo site_url("products"); ?>" class="c-link dropdown-toggle"><?php echo $this->lang->line("all_products"); ?><span class="c-arrow c-toggler"></span> </a> </li>
            <!--<li class="c-menu-type-classic"> <a href="javascript:;" class="c-link dropdown-toggle">Offers and Services <span class="c-arrow c-toggler"></span> </a> </li>--> 
            <!--<li class="c-menu-type-classic"> <a href="<?php //echo site_url("need_help"); ?>" class="c-link dropdown-toggle">Need Help?<span class="c-arrow c-toggler"></span> </a> </li>-->
            <li class="c-menu-type-classic <?php if($seg1=="news"){echo 'c-active'; } ?>"> <a href="<?php echo site_url("news"); ?>" class="c-link dropdown-toggle"><?php echo $this->lang->line("news"); ?><span class="c-arrow c-toggler"></span> </a> </li>
            <li class="c-menu-type-classic <?php if($seg1=="request_quote"){echo 'c-active'; } ?>"> <a href="<?php echo site_url("request_quote"); ?>" class="c-link dropdown-toggle"><?php echo $this->lang->line("request_a_quote"); ?><span class="c-arrow c-toggler"></span> </a> </li>
            <li class="c-menu-type-classic" style="float:right;"> <a role="button" data-toggle="dropdown" href="javascript:;" class="c-link dropdown-toggle"> 
            
            <?php if($this->session->userdata("language")=="english"){ ?>
            <img src="<?php echo site_url(); ?>/assets/web/img/flags/english.png" width="35" class="flag_image" />English
            <?php }else if($this->session->userdata("language")=="spanish"){ ?>
            <img src="<?php echo site_url(); ?>/assets/web/img/flags/spanish.png" width="35" class="flag_image" />Spanish
            <?php }else if($this->session->userdata("language")=="portuguese"){ ?>
            <img src="<?php echo site_url(); ?>/assets/web/img/flags/portuguese.png" width="35" class="flag_image" />Portuguese
            <?php }else{ ?>
            <img src="<?php echo site_url(); ?>/assets/web/img/flags/english.png" width="35" class="flag_image" />English
            <?php } ?>
             <span class="caret"></span> </a>
              <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu" style="width:50px" >
              
                <li class="dropdown-submenu"> <a href="<?php echo site_url("home/language_change/?lang=english"); ?>" style="padding:8px 10px !important;"> <img src="<?php echo site_url(); ?>/assets/web/img/flags/english.png" width="35" class="flag_image" />English </a> </li>
                <li class="dropdown-submenu"> <a href="<?php echo site_url("home/language_change/?lang=spanish"); ?>" style="padding:8px 10px !important;"> <img src="<?php echo site_url(); ?>/assets/web/img/flags/spanish.png" width="35" class="flag_image" />Spanish </a> </li>
               <!--  <li class="dropdown-submenu"> <a href="<?php echo site_url("home/language_change/?lang=portuguese"); ?>" style="padding:8px 10px !important;"> <img src="<?php echo site_url(); ?>/assets/web/img/flags/portuguese.png" width="35" class="flag_image" />Portuguese </a> </li> -->
              </ul>
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
