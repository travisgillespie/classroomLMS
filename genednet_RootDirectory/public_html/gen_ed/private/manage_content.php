<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>		
<?php find_selected_page(); ?>

<div id="main">
	<!-- navigation float on top-->
	<div id="navigation">
	<br />
	<a href="admin.php">&laquo; Main menu</a><br />
		<!-- change all class names from menuBars to menuBar... on all php files and css stylesheet -->
		<?php echo navigation($current_menuBar, $current_page); ?>
		<br />
		<a href="new_menuBar.php">+ Add a Menu Name</a>
	</div>
	
	<!-- page align center-->
	<div id="page">
		<?php echo message(); ?>
		<?php if ($current_menuBar) { ?>
			<h2>Manage Menu Bar</h2>
		Menu name: <?php echo htmlentities($current_menuBar["menu_name"]); ?><br />
		Position: <?php echo $current_menuBar["position"]; ?><br />
		Visible: <?php echo $current_menuBar["visible"] == 1 ? 'yes' : 'no'; ?><br />
		<br />
		
		<a href="edit_menuBar.php?menuBar=<?php echo urlencode($current_menuBar["id"]); ?>">Edit Menubar</a>
		
		<div style="margin-top: 2em; border-top: 1px solid #000000;">
			<h3>Pages in this Menubar:</h3>
			<ul>
			<?php 
			$menuBar_page = find_page_for_menuBar($current_menuBar["id"]);
				while($page = mysqli_fetch_assoc($menuBar_page)) {
					echo "<li>";
					$safe_page_id = urlencode($page["id"]);
					echo "<a href=\"manage_content.php?page={$safe_page_id}\">";
					echo htmlentities($page["menu_name"]);
					echo "</a>";
					echo "</li>";
				}
			?>
			</ul>
			<br />
			+ <a href="new_page.php?menuBar=<?php echo urlencode($current_menuBar["id"]); ?>">Add a new page to this Menubar</a>
		</div>		
		
		<?php } elseif ($current_page) { ?>
			<h2>Manage Page</h2>
		Menu name: <?php echo htmlentities($current_page["menu_name"]); ?><br />
		Position: <?php echo $current_page["position"]; ?><br />
		Visible: <?php echo $current_page["visible"] == 1 ? 'yes' : 'no'; ?><br />
		Content:<br />
		<div class="view-content">
			 <?php echo htmlentities($current_page["content"]); ?>
			 
		</div>
		<br />
		<a href="edit_page.php?page=<?php echo urlencode($current_page["id"]); ?>">Edit Page</a>
		
		<?php } else { ?>
			Please select a menuBar or a page.
		<?php }?>		
	</div>
</div>
	
<?php include("../includes/layouts/footer.php"); ?>