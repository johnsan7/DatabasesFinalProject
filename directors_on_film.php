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
			<td>Films for particular Director</td>
		</tr>
		<tr>
			<td>
			Director</td>
			<td>Film</td>
		</tr>
		


<?php

if(!($stmt = $mysqli->prepare("SELECT d.fname, d.lname, f.title FROM director d INNER JOIN film_director fd ON fd.did=d.director_id INNER JOIN film f ON f.film_id=fd.fid WHERE f.film_id= ?"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("i",$_POST['filmDirectorInfo']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($dfname, $dlname, $ftitle)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $dfname . $dlname . "\n</td>\n<td>\n" . $ftitle . "\n</td>\n</tr>";
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

