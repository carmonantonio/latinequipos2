<script src="<?php echo base_url(); ?>assets/web/plugins/jquery.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/web/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/autocomplete/jquery.smart_autocomplete.js"></script>

 



<script type="text/javascript">
$(document).ready(function(e) { 
    $("#basic_autocomplete_field").smartAutoComplete({source: <?php echo $json_data; ?>}); 
});




/*$(function(){
	//$("#basic_autocomplete_field").smartAutoComplete({source: <?php echo $json_data; ?>});
	$("#basic_autocomplete_field").smartAutoComplete({source: ['Apple', 'Banana', 'Orange', 'Mango']});
});*/

</script>









