<form method="post">
		<label for="colorCL" value="<?php echo $_POST['quantity'] ?>">Concept: </label>
                        <!-- alt Selection Menu -->
                        <select name="alt" id="altMenu" type="submit">
                        	<option seleceted value="All">all</option>
                            <option value="variables">intro to algebra</option>
                            <option value="exponents">graphing equations and functions</option>
                            <option value="3">multi-step equations</option>
                            <option value="4">collecting and displaying data</option>
                            <option value="5">number systems, patterns, and tools</option>
                            <option value="6">decimals</option>
                            <option value="7">fractions</option>
                            <option value="8">proportions</option>
                            <option value="9">probability </option>
                            <option value="10">geometric relationships</option>
                            <option value="11">measurement and geometry</option>
                            <option value="12">area and volume </option>
                        </select>   
                    
                        <input type="submit" name="select" id="select" value="Select">
	</form>
<h4>



<?php
if (!isset($_POST['alt'])){
	echo " All class videos";
}elseif ($_POST['alt'] === All){
	echo "videos on {$_POST['alt']}";
}elseif ($_POST['alt'] !== All){
	echo "videos on {$_POST['alt']}";
}else{
	echo "sorry files can't be found";
}
?>
</h4>