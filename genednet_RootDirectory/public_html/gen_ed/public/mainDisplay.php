<!-- Calendar -->
<?php if($current_menuBar['menu_name'] === "Announcements") { ?>
<div id="mainDisplay">
	<?php echo "<h3> Class Materials</h3> The following materials are not required,<br/> but may be beneficial." ?>
	<p><a href="http://www.amazon.com/Five-Star-Wirebound-5-Subject-72079/dp/B003O2RXP6">- College Rule Spiral Notebook (3 or 5 subject) </a></p>
	<p><a href="http://www.amazon.com/BIC-Brite-Assorted-Colors-5-Pack/dp/B000Q5ZGIA/ref=sr_1_1?s=office-products&ie=UTF8&qid=1377404801&sr=1-1&keywords=highlighters">- Highlighters (2-3 different colors)</a></p>
	<p><a href="http://www.amazon.com/BIC-4-Color-Ballpoint-Retractable-Assorted/dp/B004E2TKDI/ref=sr_1_6?s=office-products&ie=UTF8&qid=1377404514&sr=1-6&keywords=bic+multicolor+pen">- Red and Blue pens</a></p>
	
	<?php echo "<h3> Course Syllabus</h3>" ?>
	<p><a href="../private/uploadFiles/course%20syllabus_m6.pdf" target="_blank">- Math 6</a></p>
	<p><a href="../private/uploadFiles/course%20syllabus_m8.pdf" target="_blank">- Math 8</a></p>
</div> <!-- end of mainDisplay-->

<!-- Calendar m6 -->
<?php } elseif($current_page['menu_name'] === "Math 6") { ?>
	<div id="mainDisplayCalendar">
	<?php echo '<iframe id="classCalendar" '?> 
	<?php echo 'src="' ?>
	<?php echo $current_page['include']; ?>
	<?php echo 'style=" border-width:0" frameborder="0" scrolling="no">' ?>
	<?php echo '</iframe>' ?>
	</div> <!-- end of mainDisplayCalendar-->

<!-- Calendar m8 -->
<?php } elseif($current_page['menu_name'] === "Math 8") { ?> 
	<div id="mainDisplayCalendar">
	<?php echo '<iframe id="classCalendar" '?> 
	<?php echo 'src="' ?>
	<?php echo $current_page['include']; ?>
	<?php echo 'style=" border-width:0" frameborder="0" scrolling="no">' ?>
	<?php echo '</iframe>' ?>
	</div> <!-- end of mainDisplayCalendar-->
	
<!-- Calendar Admin -->
<?php } elseif($current_page['menu_name'] === "admin_files") { ?>
	<div id="mainDisplayCalendar">
	<?php include("../private/admin_calendars.php") ; ?>
	</div> <!-- end of mainDisplayCalendar-->
	
<!-- Personal Stats -->
<?php } elseif ($current_page['menu_name'] === "Stats"){ ?>
<div id="mainDisplayStats">
	<div id="statsLinks"> 
	<?php include("../private/personalStatsCompletedAssignments.php") ; ?>
	</div>	
</div> <!-- end of mainDisplayStats-->

<!-- Personal Stats -->
<?php } elseif ($current_page['menu_name'] === "admin_grades"){ ?>
<div id="mainDisplayAdmin">
	<div id="statsLinks">
	<?php include("../private/admin_grades.php") ; ?>
	</div>	
</div> <!-- end of mainDisplayStats-->

<!-- CRUD Files50  -->
<?php } elseif ($current_page['menu_name'] === "admin_files50"){ ?>
<div id="mainDisplayAdmin">
	<div id="statsLinks">
	<?php include("../private/admin_files50.php") ; ?>
	</div>	
</div> <!-- end of mainDisplayFiles50-->
	
<!-- Video Player -->
<?php } elseif($current_page['menu_name'] === "Videos") { ?>
	<div id="mainDisplayVideos">
	</div> <!-- end of mainDisplayVideos-->
<?php } elseif($current_page['menu_name'] === "Links") { ?>
	<div id="mainDisplayLinks">
	<?php // echo "<p>Sorry there seems to be a problem</p>" ?>
	</div> <!-- end of mainDisplayLinks-->
<?php } elseif ($current_page['menu_name'] === "Xcode"){ ?>
	<div id="mainDisplayXcode">
	</div> <!-- end of mainDisplayVideos-->
		<div id="mainDisplayXcode">
	</div> <!-- end of mainDisplayVideos-->
<?php } elseif ($current_menuBar['menu_name'] === "About Me"){ ?>
	<div id="mainDisplayAboutMe">
	<?php include("aboutMeMain.php") ; ?>
	</div> <!-- end of mainDisplayAboutMe-->

		
<?php } else { ?>
	<?php echo "<p>Sorry there seems to be a problem</p>" ?>
<?php } ?>