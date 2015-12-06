<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","wolfordj-db","jC39X2rJKFt9prbp","wolfordj-db");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
<div>
	<table>
		<tr>
			<td>Films for particular Actor</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>Film</td>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT a.fname, a.lname, f.title FROM actor a INNER JOIN film_actor fa ON a.actor_id = fa.aid INNER JOIN film f ON fa.fid=f.film_id WHERE a.actor_id = ?;"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("i",$_POST['actorFilterInfo']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($afname, $alname, $ftitle)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $afname . $alname . "\n</td>\n<td>\n" . $ftitle . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

</body>
</html>

	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
<div>
<a href="http://web.engr.oregonstate.edu/~johnsan7/movieSpouseDB.php">Back to database display</a>
</div>

</body>
</html>

