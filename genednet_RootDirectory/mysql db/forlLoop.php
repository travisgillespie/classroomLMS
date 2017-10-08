<?php echo " ``, ``, ``, ``, ``, ``, ``, ``, ``, ``, ``, ``, " ; ?>
<?php for ($i =1; $i <= 100; $i++){ ?>
<br><?php echo " `response$i` varchar(30) NOT NULL, " ; ?>
<br><?php echo "`result$i` varchar(2) NOT NULL," ; ?>

<?php } ?>


<?php for ($i =1; $i <= 100; $i++){ ?>
<br><?php echo "$" . "query .= \"result$i = ";?>
'{$result<?php echo "$i" ; ?>
}', ";

<?php } ?>


