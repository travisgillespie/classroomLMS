<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>



<div id="footer">Copyright <?php echo date("Y"); ?>, GenEdNet</div>
	</body>
</html>


<?php
  // 5. Close database connection
  if (isset($connection)){
	  mysqli_close($connection); 
  }
?>