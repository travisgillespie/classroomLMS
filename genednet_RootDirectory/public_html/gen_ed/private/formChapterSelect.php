<form method="post">
		<label for="colorCL" value="<?php echo $_POST['quantity'] ?>"> </label>
                        <!-- Chapter Selection Menu -->
                                                	
                      
                      
                      
                        	
                        	<select name="chapter" id="chapterMenu" type="submit" onchange=this.form.submit()>
                        	<?php if(isset($_POST['chapter'])){?>
							<option  seleceted value="<?php echo htmlspecialchars($_POST['chapter']) ; ?>"><?php echo htmlspecialchars($_POST['chapter']) ; ?></option>
							<?php }else{ ?>
							
							<?php } ?>

							<option value="all">all</option>
							<option value="gauge">gauges</option>
                        	<option value="lc">learning checks</option>
                        	<option value="test reviews">test reviews</option>
                            <option value="tests">tests</option>
                            <option value="wu">warm ups</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                        </select>   
                    
                       <?php // <input type="submit" name="select" id="select" value="Select"> ?>
	</form>	
<h4>
<?php
if (!isset($_POST['chapter'])){
	echo " all class files";
}elseif ($_POST['chapter'] === all){
	echo " {$_POST['chapter']} class files";
}elseif ($_POST['chapter'] === lc){
	echo " learning check files";
}elseif ($_POST['chapter'] === gauge){
	echo " gauge files";
}elseif ($_POST['chapter'] === wu){
	echo " warm up files";
}elseif ($_POST['chapter'] === "test" . " " . "reviews"){
	echo " test review files";
}elseif ($_POST['assType'] === tests){
	echo " chapter tests";
}elseif ($_POST['chapter'] == $_POST['chapter']){
	echo " chapter {$_POST['chapter']} files";
}else{
	echo "sorry there aren't any files to display";
}
?>
</h4>