<?php if($current_menuBar['menu_name'] === "Announcements") { ?> 
	<div class="topBlock"></div>

<?php } elseif($current_menuBar['menu_name'] === "Assignments") { ?> 
	<div class="topBlockAssignments"></div>

<?php } elseif ($current_page['menu_name'] === "Math 6"){ ?>
	<div class="topBlockAssignments"></div>
	
<?php } elseif ($current_page['menu_name'] === "Math 8"){ ?>
	<div class="topBlockAssignments"></div>

<?php } elseif ($current_page['menu_name'] === "admin_files"){ ?>
	<div class="topBlockAssignments"></div>
	
<?php } elseif ($current_page['menu_name'] === "Stats"){ ?>
	<div class="topBlockAssignments"></div>

<?php } elseif ($current_page['menu_name'] === "admin_grades"){ ?>
	<div class="topBlockAssignments"></div>

<?php } elseif ($current_page['menu_name'] === "admin_files50"){ ?>
	<div class="topBlockAssignments"></div>

<?php } elseif ($current_menuBar['menu_name'] === "Resources"){ ?>
	<div class="topBlockResources"></div>
	
<?php } elseif ($current_page['menu_name'] === "Videos"){ ?>
	<div class="topBlockResources"></div>
	
<?php } elseif ($current_page['menu_name'] === "Links"){ ?>
	<div class="topBlockResources"></div>
	
<?php } elseif ($current_page['menu_name'] === "Xcode"){ ?>
	<div class="topBlockResources"></div>

<?php } elseif ($current_menuBar['menu_name'] === "About Me"){ ?>
	<div class="topBlock"></div>
<?php } ?>