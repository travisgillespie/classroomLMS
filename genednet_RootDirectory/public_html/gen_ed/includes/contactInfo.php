<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<!-- Main Page Display -->
<?php if($current_menuBar['menu_name'] === "Announcements") { ?>
<h1>Travis Gillespie</h1>

<?php // if !logged in m6 or m8 then display this image... else if logged in display a rotating slideshow of images  ?>

<?php if ((!logged_in_student_m6()) && ((!logged_in_student_m8()))) { ?>
	<img src="" alt="" width="288" height="383" />
	<br/>
	<?php echo "&nbsp;Standing in front of Kendall Mountain, <br/>&nbsp;Silverton, CO" ; ?>


<?php } else { ?>

	<?php // if !logged in m6 or m8 then display this image... else if logged in display a rotating slideshow of images  ?>
	
	
<?php require_once("../includes/slider.php") ; ?>
	
	
<?php } ?>

<h3>Email: <label class="email"> <a href="mailto:admin@email.com?subject=">admin@email.com</a></label></h3>

<h3>My Schedule</h3>

<pre>1st	Math 8
<br/>2nd	Math 8
<br/>3rd	PLC
<br/>4th	Off 
<br/>5th	Math 6 
<br/>6th	Math 8
<br/>7th	Math 6
<br/>8th	Wildcat Time 
</pre>
<br/>

<h3>Tutoring Times</h3>
<pre>Math 6
- Tuesday - Thursday: 11:13-11:43 (A-Lunch). 
- If additional time is needed please contact me.


Math 8
-  Tuesday & Thursday: 8:00 - 8:20am.
-  By appointment only.
</pre>
<?php } ?>