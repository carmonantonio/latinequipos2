<div class="c-content-box c-size-md " style="background-color:#e12734">
  <div class="container">
    <div class="c-content-bar-3">
      <div class="row" align="center">
	  
        <div class="col-md-offset-3 col-md-6">
          <h3 class="c-font-uppercase c-font-bold" style="color:white;font-size:28px"><?php echo $this->lang->line("subscribe_newsletter"); ?></h3>
          <div class="c-content-v-center" style="height: 90px;">
            <div class="c-wrapper">
              <div class="c-body">
                  <div class="input-group input-group-lg c-square">
                    <input type="text" class="form-control c-square c-font-grey-3 c-border-grey c-theme" placeholder="<?php echo $this->lang->line("your_email_here"); ?>" name="email" />
                    <span class="input-group-btn">
                    <button class="btn c-theme-btn c-theme-border c-btn-square c-btn-uppercase c-font-16" type="button" onClick="subscribe()"><?php echo $this->lang->line("subscribe"); ?></button>
                    </span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

function subscribe(){
	var email = $("input[name='email']").val();
	
	var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        alert("Not a valid e-mail address");
        return false;
    }else{
		$.post("<?php echo site_url("home/subscribe"); ?>", {email:email}).done(function(data){
			alert(data);
		});
	}
}



</script>