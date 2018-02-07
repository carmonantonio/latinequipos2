<option label="Select Parent Category"></option>
<?php if($parent_cat->num_rows() > 0){ ?>
<?php foreach($parent_cat->result() as $parent_cat){ ?>
<option value="<?php echo $parent_cat->id; ?>"><?php echo $parent_cat->category_name; ?></option>
<?php }} ?>
