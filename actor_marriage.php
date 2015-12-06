<!--This adds a film/director relationship in the film_director table-->
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
if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	
if(!($stmt = $mysqli->prepare("INSERT INTO actor_marriage (aid,sid) VALUES (?,?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("ii",$_POST['actorInfo'],$_POST['spouseInfo'] ))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Inserted " . $stmt->affected_rows . " row with actor spouse relationship.";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
<div>
<a href="http://web.engr.oregonstate.edu/~johnsan7/movieSpouseDB.php">Back to database display</a>
</div>

</body>
</html>