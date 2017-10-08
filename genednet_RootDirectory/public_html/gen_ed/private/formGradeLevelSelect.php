<form method="post">
		<label for="colorCL" value="<?php echo $_POST['quantity'] ?>"> </label>
                        <!-- Chapter Selection Menu -->
                                                	
                      
                      
                      
                        	
                        	<select name="gradeLevel" id="chapterMenu" type="submit" onchange=this.form.submit()>
                        	<?php if(isset($_POST['gradeLevel'])){?>
							<option  seleceted value="<?php echo htmlspecialchars($_POST['gradeLevel']) ; ?>"><?php echo htmlspecialchars($_POST['gradeLevel']) ; ?></option>
							<?php }else{ ?>
							
							<?php } ?>

							<option value=""></option>
                            <option value="m6">m6</option>
                            <option value="m7">m7</option>
                            <option value="m8">m8</option>
                            <option value="algebra1">algebra i</option>
                            <option value="algebra2">algebra ii</option>
                            <option value="geometry">geometry</option>
                            <option value="preCalculus">pre-calculus</option>
                            <option value="calculus">calculus</option>
                        </select>   
                    
                       <?php // <input type="submit" name="select" id="select" value="Select"> ?>
	</form>
<h4>
<?php
if (!isset($_POST['gradeLevel'])){
	echo " all grade levels";
}elseif ($_POST['gradeLevel'] === m6){
	echo " {$_POST['gradeLevel']} class files";
}elseif ($_POST['gradeLevel'] === m8){
	echo " {$_POST['gradeLevel']} class files";
}elseif ($_POST['chapter'] === wu){
	echo " warm up files";
}elseif ($_POST['chapter'] === "test" . " " . "reviews"){
	echo " test review files";
}elseif ($_POST['assType'] === tests){
	echo " chapter tests";
}elseif ($_POST['chapter'] == 1){
	echo " chapter {$_POST['chapter']} files";
}else{
	echo "sorry there aren't any files to display";
}
?>
</h4>