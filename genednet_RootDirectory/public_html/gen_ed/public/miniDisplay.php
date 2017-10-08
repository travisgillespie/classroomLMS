<!-- Calendar -->
<?php if($current_menuBar['menu_name'] === "Announcements") { ?>
<div id="miniDisplay"> 
	<?php echo '<iframe id="weeklyCalendar" '?> 
	<?php echo 'src="' ?>
	<?php echo $current_menuBar['include']; ?>
	<?php echo 'style=" border-width:0" frameborder="0" scrolling="no">' ?>
	<?php echo '</iframe>' ?>
</div> <!-- end of miniDisplay-->
	
<!-- Assignments m6 -->
<?php } elseif ($current_page['menu_name'] === "Math 6"){ ?>
<div id="miniDisplayCourseFront"> 
<div id="miniDisplayCourse"> 
	<?php include("../private/m6.php") ; ?>
</div> <!-- end of miniDisplayCourse-->
</div> <!-- end of miniDisplayCourseFront-->
<!-- Assignments m8 -->
<?php } elseif ($current_page['menu_name'] === "Math 8"){ ?>
<div id="miniDisplayCourseFront"> 
<div id="miniDisplayCourse"> 
	<?php include("../private/m8.php") ; ?>
</div> <!-- end of miniDisplayCourse-->
</div> <!-- end of miniDisplayCourseFront-->

<!-- Assignments Admin -->
<?php } elseif ($current_page['menu_name'] === "admin_files"){ ?>
<div id="miniDisplayCourseFront"> 
<div id="miniDisplayCourse">
	<?php echo "Grade Level:"; ?>
	<?php include("../private/formGradeLevelSelect.php"); ?>
	<?php include("../private/admin_files.php") ; ?>
</div> <!-- end of miniDisplayCourse-->
</div> <!-- end of miniDisplayCourseFront-->



<!-- Personal Stats -->
<?php } elseif ($current_page['menu_name'] === "Stats"){ ?>
<div id="miniDisplayStats">
<div id="statsLinks"> 
<?php if (isset($_POST['submit'])){?>
		<?php // set($_POST['submit'], null); ?>
		<?php include("../private/personalStatsCreate.php");
		//	}elseif (POST ISSET for completed assignments{
		//include Personal Stats 
	echo "select a completed assignment to view your stats";	

	}elseif(isset($_POST['findAssignmentResults'])){
		include("../private/personalStatsRead.php") ;
	}else{
	echo "&nbsp";
	echo "select a completed assignment to view your stats";
	} ?>
</div>
</div> <!-- end of miniDisplayStats-->

<!-- Admin page -->
<?php } elseif ($current_page['menu_name'] === "admin_grades"){ ?>
<div id="miniDisplayAdmin">
<div id="statsLinks"> 
	<?php include("../private/form_adminGrades.php") ; ?>
</div>
</div> <!-- end of miniDisplayAdmin-->

<?php } elseif ($current_page['menu_name'] === "admin_files50"){ ?>
<div id="miniDisplayAdmin">
<div id="statsLinks"> 
	<?php include("../private/form_adminFiles50.php") ; ?>
</div>
</div> <!-- end of miniDisplayFiles50-->
	
<?php } elseif ($current_menuBar['menu_name'] === "Resources"){ ?>
<div id="miniDisplayResources"> 
<div id="contentBackground">
<div class="topBlockLogin"></div><div class="topBlockLogin"></div><div class="topBlockLogin"></div><div class="topBlockLogin"></div>
	<?php echo "<h2><p>&nbspSelect a link from the drop-down menu</p></h2>" ?>
</div> <!-- end of miniDisplayResources-->

<?php } elseif ($current_page['menu_name'] === "Videos"){ ?>
<div id="miniDisplayVideos"> 
	<?php //include("../public/videos.php"); ?>
	<?php require_once("redirectVideos.php"); ?>
</div> <!-- end of miniDisplayVideos-->	
	
<?php } elseif ($current_page['menu_name'] === "Links"){ ?>
<div id="miniDisplayLinks"> 
	<?php include("../public/links.php"); ?>
</div> <!-- end of miniDisplayLinks-->
	
<?php } elseif ($current_page['menu_name'] === "Xcode"){ ?>
<div id="miniDisplayXcode">
<div id="contentBackground">
<div class="topBlockLogin"></div><div class="topBlockLogin"></div><div class="topBlockLogin"></div><div class="topBlockLogin"></div>
	<?php echo "<h2><p>&nbsp;You need Level 3 documentation or higher to access this site</p></h2>" ?>
</div> <!-- end of miniDisplayXcode-->

<?php } elseif ($current_menuBar['menu_name'] === "About Me"){ ?>
<div id="miniDisplayAboutMe"> 
	<?php include("aboutMeMini.php") ; ?>
</div> <!-- end of miniDisplayAboutMe-->

<?php } elseif ($current_menuBar['menu_name'] === "WRMS Campus"){ ?>

	<?php require_once("redirectWRMS.php"); ?>

<?php } else { ?>
	<?php redirect_to("index.php?menuBar=1"); ?>

<?php } ?>