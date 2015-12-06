<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","johnsan7-db","3wuxL63reR1llxBe","johnsan7-db");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
<div>
	<table>
		<tr>
			<td>Religions shared by actors, spouses, and directors</td>
		</tr>
		<tr>
			<td>Religion Name</td>
			<td>Actor</td>
			<td>Director</td>
			<td>Spouse</td>
		</tr>
		


<?php

if(!($stmt = $mysqli->prepare("SELECT  r.name, a.fname, a.lname, s.fname, s.lname, d.fname, d.lname FROM religion_actor ra 
INNER JOIN religion_director rd ON ra.rid=rd.rid INNER JOIN religion_spouse rs ON rd.rid=rs.rid INNER JOIN actor a ON ra.aid=a.actor_id INNER JOIN spouse s ON s.spouse_id=rs.sid INNER JOIN director d ON rd.did=d.director_id INNER JOIN religion r ON r.religion_id=rd.rid WHERE r.religion_id=?
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("i",$_POST['religionFilterInfo']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($relName, $afname, $alname, $sfname, $slname, $dfname, $dlname)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $relName . "\n</td>\n<td>\n" . $afname . ' ' . $alname . "\n</td>\n<td>\n" . $dfname . ' ' . $dlname . "\n</td>\n<td>\n" . $sfname . ' ' . $slname . "\n</td>\n</tr>";
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

