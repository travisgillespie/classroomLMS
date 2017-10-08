<?php
	for ($i = 1; $i <= $_POST['questions']; $i++) { 
	echo "<br>";
	echo "<br>";  
	echo "$i) "; 
?>

	<?php
	//dropdown menu
	echo "<br>"; 
	echo "Question $i: ";
			if(isset($_POST["questionType$i"])) { ?>
				<?php $questionType = $_POST["questionType$i"]; ?>
				<?php require("admin_createDropdownQuestions.php") ; ?>
	<?php } else if (isset($_POST['questionTypeTop'])) { ?>
				<?php $questionType = $_POST['questionTypeTop']; ?>
				<?php require("admin_createDropdownQuestions.php") ; ?>
	<?php } ?>

	<?php if ($questionType === 'fr'){ ?>
		<?php //answer ?>
		<?php echo "Answer{$i}a: " ?>
		<input type="" style="border-radius: 20px;" name='<?php echo  "A{$i}a"; ?>' value="<?php echo htmlspecialchars($_POST['A{$i}a']); ?>"  />
		<?php echo "&nbsp"?>

		<?php echo "Answer{$i}b: " ?>
		<input type="" style="border-radius: 20px;" name='<?php echo  "A{$i}b"; ?>' value="<?php echo htmlspecialchars($_POST['A{$i}b']); ?>"  />
		<?php echo "<br>"; ?>
	<?php } else { ?>
        <?php echo "Answer{$i}a: " ?>
        <select name="mcResponseA" id="chapter" type="submit" onchange=this.form.submit()>
			<?php if(isset($_POST['mcResponseA'])){?>
				<option  seleceted value="<?php echo $_POST['mcResponseA'] ; ?>"><?php echo $_POST['mcResponseA'] ; ?></option>
			<?php } ?>	
			<option value=""></option>	
			<option value="a">a</option>
			<option value="b">b</option>
			<option value="c">c</option>
			<option value="d">d</option>
			<option value="idk">idk</option>
		</select>

		<?php echo "Answer{$i}b: " ?>
        <select name="mcResponseB" id="chapter" type="submit" onchange=this.form.submit()>
			<?php if(isset($_POST['mcResponseB'])){?>
				<option  seleceted value="<?php echo $_POST['mcResponseB'] ; ?>"><?php echo $_POST['mcResponseB'] ; ?></option>
			<?php } ?>	
			<option value=""></option>	
			<option value="a">a</option>
			<option value="b">b</option>
			<option value="c">c</option>
			<option value="d">d</option>
			<option value="idk">idk</option>
		</select>
	<?php } ?> 
<?php } ?>