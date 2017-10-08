<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/download_csv.php"); ?>
<?php require_once("../includes/download_csvSkyward.php"); ?>

<div id="contentBackground">
<div id="content">
<?php include("../includes/layouts/header.php"); ?>
<div class="page"> <!-- start page layout-->
	<?php if ($current_page) { ?>
		<h2><?php echo htmlentities($current_page["menu_name"]); ?></h2>
		<?php echo $current_page["content"]; ?>
	<?php } ?>
		<br />
		<br />	
<!-- INCLUDE CONTACT INFO -->
<div id="contactInfo">
<?php include("../includes/contactInfo.php"); ?>
</div> <!-- end of mainDisplay-->

<!-- INCLUDE MINI DISPLAY -->

<?php include("miniDisplay.php"); ?>

<!-- INCLUDE MAIN DISPLAY -->
<?php include("mainDisplay.php"); ?>

</div><!-- end of div class page-->
<?php include("../includes/layouts/footer.php"); ?>
</div><!-- end of div content -->
</div><!-- end of div contentBackground -->