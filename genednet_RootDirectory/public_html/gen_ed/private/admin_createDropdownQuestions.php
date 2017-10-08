<?php //////////////////// DROPDOWN FR or MC//////////////// ?>
<?php echo "&nbsp"?>
<?php echo "type: "?>
	<select name=<?php echo ${'questionType' . $i} ; ?> id="chapter" type="submit" onchange=this.form.submit()>
	<option  seleceted value="<?php echo '$questionType' ; ?>"><?php echo "$questionType" ; ?></option>
	<option value=""></option>	
	<option value="fr">fr</option>
	<option value="mc">mc</option>
</select>