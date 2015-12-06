<?php

/*Andrew Johnson, Databases Oregon State University
This code was largely from Justin Wolfords lecture on PHP and HTML from http://classes.engr.oregonstate.edu/eecs/winter2013/cs275-400/vlogger.php?video=RealCodingHTMLProject and
https://oregonstate.adobeconnect.com/_a827349107/p2ql0wxir68/?launcher=false&fcsContent=true&pbMode=normal

Changes were made as necessary for the specific operations peformed, but basic code syntax was taken from those lectures. 
*/


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
			<td>Spouse of chosen actor</td>
		</tr>
		<tr>
			<td>Actor</td>
			<td>Spouse</td>
		</tr>
		


<?php

if(!($stmt = $mysqli->prepare("SELECT a.fname, a.lname, s.fname, s.lname FROM actor a INNER JOIN actor_marriage am ON a.actor_id=am.aid INNER JOIN spouse s ON s.spouse_id=am.sid WHERE a.actor_id=?;"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("i",$_POST['actorSpouseLookInfo']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($afname, $alname, $sfname, $slname)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $afname . $alname . "\n</td>\n<td>\n" . $sfname . $slname . "\n</td>\n</tr>";
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

