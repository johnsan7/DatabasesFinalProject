<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","johnsan7-db","3wuxL63reR1llxBe","johnsan7-db");
if($mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
<div>
	<table>
		<tr>
			<td>Actor Information</td>
		</tr>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Date of Birth</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT actor.fname, actor.lname, actor.bdate  FROM actor"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}


if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($fname, $lname, $bdate)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $fname . "\n</td>\n<td>\n" . $lname . "\n</td>\n<td>\n" . $bdate . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

<div>
	<form method="post" action="addactor.php"> 

		<fieldset>
			<legend>Name</legend>
			<p>First Name: <input type="text" name="fname" /></p>
			<p>Last Name: <input type="text" name="lname" /></p>
		</fieldset>

		<fieldset>
			<legend>Birthdate yyyy-mm-dd</legend>
			<p>Birthdate: <input type="date" name="bdate" /></p>
		</fieldset>

		<p><input type="submit" /></p>
	</form>
</div>

<!-- This deletes the actor -->

<div>
	<form method="post" action="deleteActor.php">
		<fieldset>
			<legend>Delete Actor</legend>
				<select name="actorInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT actor_id, fname, lname FROM actor"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($id, $afname, $alname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $id . ' "> ' . $id . ' ' . $afname . ' ' . $alname .   '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		<input type="submit" value="Delete Actor" />
	</form>
</div>

<!-- This shows the spouse info -->

<p> Spouse Information:</p>

<div>
	<table>
		<tr>
			<td>Spouse:</td>
		</tr>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Date of Birth</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT spouse.fname, spouse.lname, spouse.bdate  FROM spouse"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($sfname, $slname, $sbdate)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $sfname . "\n</td>\n<td>\n" . $slname . "\n</td>\n<td>\n" . $sbdate . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

<!--Form to add spouse to spouse table-->

<div>
	<form method="post" action="addspouse.php"> 

		<fieldset>
			<legend>Name</legend>
			<p>First Name: <input type="text" name="fname" /></p>
			<p>Last Name: <input type="text" name="lname" /></p>
		</fieldset>

		<fieldset>
			<legend>Birthdate yyyy-mm-dd</legend>
			<p>Birthdate: <input type="date" name="bdate" /></p>
		</fieldset>

		<p><input type="submit" /></p>
	</form>
</div>

<!-- This deletes the spouse -->

<div>
	<form method="post" action="deleteSpouse.php">
		<fieldset>
			<legend>Delete Spouse</legend>
				<select name="spouseInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT spouse_id, fname, lname FROM spouse"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($sid, $sfname, $slname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $sid . ' "> ' . $sid . ' ' . $sfname . ' ' . $slname .   '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		<input type="submit" value="Delete Spouse" />
	</form>
</div>

<p> Director Information:</p>

<div>
	<table>
		<tr>
			<td>Director:</td>
		</tr>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Date of Birth</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT director.fname, director.lname, director.bdate  FROM director"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($dfname, $dlname, $dbdate)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $dfname . "\n</td>\n<td>\n" . $dlname . "\n</td>\n<td>\n" . $dbdate . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

<!--Form to add director to director table-->

<div>
	<form method="post" action="adddirector.php"> 

		<fieldset>
			<legend>Name</legend>
			<p>First Name: <input type="text" name="fname" /></p>
			<p>Last Name: <input type="text" name="lname" /></p>
		</fieldset>

		<fieldset>
			<legend>Birthdate yyyy-mm-dd</legend>
			<p>Birthdate: <input type="date" name="bdate" /></p>
		</fieldset>

		<p><input type="submit" /></p>
	</form>
</div>


<!-- This deletes the Director -->

<div>
	<form method="post" action="deleteDirector.php">
		<fieldset>
			<legend>Delete Director</legend>
				<select name="directorInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT director_id, fname, lname FROM director"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($did, $dfname, $dlname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $did . ' "> ' . $did . ' ' . $dfname . ' ' . $dlname .   '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		<input type="submit" value="Delete Director" />
	</form>
</div>




<!--Film Information-->

<p> Film Information:</p>

<div>
	<table>
		<tr>
			<td>Film:</td>
		</tr>
		<tr>
			<th>Film Title</th>
			<th>Budget</th>
			<th>Expected Release Date</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT film.title, film.budget, film.exp_release  FROM film"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($ftitle, $fbudge, $freld)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $ftitle . "\n</td>\n<td>\n" . $fbudge . "\n</td>\n<td>\n" . $freld . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

<!--Form to add films to film table-->

<div>
	<form method="post" action="addfilm.php"> 

		<fieldset>
			<legend>Title and Budget</legend>
			<p>Film Title: <input type="text" name="ftitle" /></p>
			<p>Budget: <input type="number" name="fbudget" /></p>
		</fieldset>

		<fieldset>
			<legend>Expected Release Date</legend>
			<p>Release Date: <input type="date" name="freldate" /></p>
		</fieldset>

		<p><input type="submit" /></p>
	</form>
</div>





<!--Religion Information-->

<p> Religion Information:</p>

<div>
	<table>
		<tr>
			<td>Religion:</td>
		</tr>
		<tr>
			<th>Name</th>
			<th>Founding Date:</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT religion.name, religion.foundingDate FROM religion"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($rname, $rfdate)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $rname . "\n</td>\n<td>\n" . $rfdate . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

<!--Form to add films to film table-->

<div>
	<form method="post" action="addreligion.php"> 

		<fieldset>
			<legend>Name and Founding Date</legend>
			<p>Film Title: <input type="text" name="rname" /></p>
			<p>Budget: <input type="date" name="rfdate" /></p>
		</fieldset>
		
		<p><input type="submit" /></p>
	</form>
</div>




</body>
</html>














































































<!--
<div>
	<form method="post" action="filter.php">
		<fieldset>
			<legend>Filter By Planet</legend>
				<select name="Homeworld">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT id, name FROM bsg_planets"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}

					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($id, $pname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" '. $id . ' "> ' . $pname . '</option>\n';
					}
					$stmt->close();
					?>
				</select>
		</fieldset>
		<input type="submit" value="Run Filter" />
	</form>
</div>

<div>
	<form method="post" action="HTMLexample.html">
		<fieldset>
			<legend>Planet Name</legend>
			<p>Planet Name: <input type="text" name="PName" /></p>
		</fieldset>
		<fieldset>
			<legend>Planet Populations</legend>
			<p>Planet Population: <input type="text" name="PPopulation" /></p>
		</fieldset>
		<fieldset>
			<legend>Laguage</legend>
			<p>Official Language: <input type="text" name="PLanguage" /></p>
		</fieldset>
		<input type="submit" name="add" value="Add Planet" />
		<input type="submit" name="update" value="Update Planet" />
	</form>
</div>
-->

<!-- This is the planet naming code that he had, he also had it wrapped in php tags but that didn't work for me with this comment


if(!($stmt = $mysqli->prepare("SELECT id, name FROM bsg_planets"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($id, $pname)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $id . ' "> ' . $pname . '</option>\n';
}
$stmt->close();


-->