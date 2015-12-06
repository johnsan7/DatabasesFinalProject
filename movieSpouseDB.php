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
<link rel="stylesheet" type="text/css" href="style.css">
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

		<p><input type="submit" value="Add Actor"/></p>
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

<br>

<div class="separatorDiv">" "</div>

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

		<p><input type="submit" value="Add Spouse" /></p>
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

<br>

<div class="separatorDiv">" "</div>

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

		<p><input type="submit" value="Add Director" /></p>
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


<br>

<div class="separatorDiv">" "</div>
	

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

		<p><input type="submit" value="Add Film" /></p>
	</form>
</div>


<!-- This deletes the Film -->

<div>
	<form method="post" action="deleteFilm.php">
		<fieldset>
			<legend>Delete Film</legend>
				<select name="filmInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT film_id, title FROM film"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($fid, $ftitle)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $fid . ' "> ' . $fid . ' ' . $ftitle .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		<input type="submit" value="Delete Film" />
	</form>
</div>

<br>

<div class="separatorDiv">" "</div>



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

<!--Form to add religions to religion table-->

<div>
	<form method="post" action="addreligion.php"> 

		<fieldset>
			<legend>Name and Founding Date</legend>
			<p>Religion Name: <input type="text" name="rname" /></p>
			<p>Founding Date: <input type="date" name="rfdate" /></p>
		</fieldset>
		
		<p><input type="submit"  value="Add Religion" /></p>
	</form>
</div>



<!-- This deletes the Religion -->

<div>
	<form method="post" action="deleteReligion.php">
		<fieldset>
			<legend>Delete Religion</legend>
				<select name="religionInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT religion_id, name FROM religion"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($rid, $rname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $rid . ' "> ' . $rid . ' ' . $rname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		<input type="submit" value="Delete Religion" />
	</form>

<br>

<div class="separatorDiv">" "</div>


<!-- This draws the current film/actor relationships in a table-->

<div>
	<table>
		<tr>
			<td>Actors paired with films</td>
		</tr>
		<tr>
			<th>Actor Name</th>
			<th>Film Name</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT a.fname, a.lname, f.title  FROM film_actor fa INNER JOIN film f ON f.film_id = fa.fid INNER JOIN actor a ON fa.aid=a.actor_id;
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}


if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($fname, $lname, $title)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $fname . $lname . "\n</td>\n<td>\n" . $title . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

<br>
<!--Add to film_actor table, two selects and for 1 post-->

<div>
	<form method="post" action="actor_film.php">
		<fieldset>
			<legend>Actor to pair with film</legend>
				<select name="actorInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT actor_id, fname, lname FROM actor"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($aid, $afname, $alname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $aid . ' "> ' . $aid . ' ' . $afname . ' ' . $alname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
				<fieldset>
			<legend>Film to pair with actor</legend>
				<select name="filmInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT film_id, title FROM film"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($fid, $ftitle)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $fid . ' "> ' . $fid . ' ' . $ftitle .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		
		<input type="submit" value="Add Actor to Film" />
	</form>
</div>


<br>
<!--Remove film actor relationship-->

<p>Remove Actor from film</p>
<div>
	<form method="post" action="remove_actor_film.php">
		<fieldset>
			<legend>Actor to remove from film</legend>
				<select name="actorFilmRemoveInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT actor_id, fname, lname FROM actor"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($afrid, $arfname, $arlname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $afrid . ' "> ' . $arfrid . ' ' . $arfname . ' ' . $arlname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
				<fieldset>
			<legend>Film to remove actor from </legend>
				<select name="filmRemoveActorInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT film_id, title FROM film"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($fraid, $fratitle)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $fraid . ' "> ' . $fraid . ' ' . $fratitle .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		
		<input type="submit" value="Remove Actor from Film" />
	</form>
</div>

<br>

<div class="separatorDiv">" "</div>

<!-- This draws the current film_director relationships in a table-->
<br>

<div>
	<table>
		<tr>
			<td>Directors paired with films</td>
		</tr>
		<tr>
			<th>Director Name</th>
			<th>Film Name</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT d.fname, d.lname, f.title  FROM film_director fd INNER JOIN film f ON f.film_id = fd.fid INNER JOIN director d ON fd.did=d.director_id;
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}


if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($dfname, $dlname, $title)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $dfname . $dlname . "\n</td>\n<td>\n" . $title . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

<br>

<!--Add to film_director table, two selects and for 1 post-->

<div>
	<form method="post" action="director_film.php">
		<fieldset>
			<legend>Director to pair with film</legend>
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
					 echo '<option value=" ' . $did . ' "> ' . $did . ' ' . $dfname . ' ' . $dlname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
				<fieldset>
			<legend>Film to pair with director</legend>
				<select name="filmInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT film_id, title FROM film"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($fid, $ftitle)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $fid . ' "> ' . $fid . ' ' . $ftitle .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		
		<input type="submit" value="Add Director to film" />
	</form>
</div>

<br>



<br>

<!--Remove director film relationship-->

<p>Remove Director from film</p>

<div>
	<form method="post" action="remove_director_film.php">
		<fieldset>
			<legend>Film to remove director from </legend>
				<select name="filmRemoveDirectorInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT film_id, title FROM film"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($frdid, $frdtitle)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $frdid . ' "> ' . $frdid . ' ' . $frdtitle .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		
		<input type="submit" value="Remove Director from Film" />
	</form>
</div>

<br>

<div class="separatorDiv">" "</div>



<!-- This draws the current actor marriage relationships in a table-->
<br>

<div>
	<table>
		<tr>
			<td>Marriages between Actors and Spouses</td>
		</tr>
		<tr>
			<th>Actor Name</th>
			<th>Spouse Name</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT a.fname, a.lname, s.fname, s.lname  FROM actor_marriage am INNER JOIN actor a ON a.actor_id = am.aid INNER JOIN spouse s ON am.sid=s.spouse_id;
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
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

<br>

<!--Add to actor_marriage table, two selects and for 1 post-->

<div>
	<form method="post" action="actor_marriage.php">
		<fieldset>
			<legend>Actor to pair with spouse</legend>
				<select name="actorInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT actor_id, fname, lname FROM actor"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($aid, $afname, $alname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $aid . ' "> ' . $aid . ' ' . $afname . ' ' . $alname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
				<fieldset>
			<legend>Spouse to pair with actor</legend>
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
					 echo '<option value=" ' . $sid . ' "> ' . $sid . ' ' . $sfname . $slname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		
		<input type="submit" value="Add Marriage" />
	</form>
</div>

<br>

<p>Remove Marriage relationship</p>

<div>
	<form method="post" action="remove_marriage.php">
		<fieldset>
			<legend>Actor paired with marriage to dissolve</legend>
				<select name="actorDivorceInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT actor_id, fname, lname FROM actor"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($rmaid, $rmafname, $rmalname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $rmaid . ' "> ' . $rmaid . ' ' . $rmafname . ' ' . $rmalname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		
		<input type="submit" value="Dissolve Marriage" />
	</form>
</div>

<br>

<div class="separatorDiv">" "</div>



<br>

<div class="separatorDiv">" "</div>


<!-- This draws the current actor religion relationships in a table-->
<br>

<div>
	<table>
		<tr>
			<td>Actors and Religions</td>
		</tr>
		<tr>
			<th>Actor Name</th>
			<th>Religion Name</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT a.fname, a.lname, r.name  FROM religion_actor ar INNER JOIN actor a ON a.actor_id = ar.aid INNER JOIN religion r ON ar.rid=r.religion_id;
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}


if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($afname, $alname, $rname)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $afname . $alname . "\n</td>\n<td>\n" . $rname . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

<br>


<!--Add to religion_actor table, two selects and for 1 post-->

<div>
	<form method="post" action="religion_actor.php">
		<fieldset>
			<legend>Actor to pair with Religion</legend>
				<select name="actorInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT actor_id, fname, lname FROM actor"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($aid, $afname, $alname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $aid . ' "> ' . $aid . ' ' . $afname . ' ' . $alname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
				<fieldset>
			<legend>Religion to pair with actor</legend>
				<select name="religionInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT religion_id, name FROM religion"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($rid, $name)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $rid . ' "> ' . $rid . ' ' . $name  .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		
		<input type="submit" value="Assign Actor Religion" />
	</form>
</div>

<br>

<!-- This removes Actor religion -->

<p>Remove Actor religion</p>

<div>
	<form method="post" action="remove_actor_religion.php">
		<fieldset>
			<legend>Actor to drop religion for</legend>
				<select name="actorReligDropInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT actor_id, fname, lname FROM actor"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($arraid, $arrfname, $arrlname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $arraid . ' "> ' . $arraid . ' ' . $arrfname . ' ' . $arrlname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		
		<input type="submit" value="Remove Religion" />
	</form>
</div>

<br>

<div class="separatorDiv">" "</div>

<!-- This draws the current director religion relationships in a table-->
<br>

<div>
	<table>
		<tr>
			<td>Directors and Religions</td>
		</tr>
		<tr>
			<th>Director Name</th>
			<th>Religion Name</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT d.fname, d.lname, r.name  FROM religion_director rd INNER JOIN director d ON d.director_id = rd.did INNER JOIN religion r ON rd.rid=r.religion_id;
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}


if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($afname, $alname, $rname)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $afname . $alname . "\n</td>\n<td>\n" . $rname . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

<br>


<!--Add to director table, two selects and for 1 post-->

<div>
	<form method="post" action="director_religion.php">
		<fieldset>
			<legend>Director to pair with religion</legend>
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
					 echo '<option value=" ' . $did . ' "> ' . $did . ' ' . $dfname . ' ' . $dlname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
				<fieldset>
			<legend>Religion to pair with Director</legend>
				<select name="religionInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT religion_id, name FROM religion"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($rid, $name)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $rid . ' "> ' . $rid . ' ' . $name  .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		
		<input type="submit" value="Assign Director Religion" />
	</form>
</div>

<br>

<!-- This removes Director religion -->

<p>Remove Director religion</p>

<div>
	<form method="post" action="remove_director_religion.php">
		<fieldset>
			<legend>Director to remove religion from</legend>
				<select name="directorReligionDeleteInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT director_id, fname, lname FROM director"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($rrdid, $rrdfname, $rrdlname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $rrdid . ' "> ' . $rrdid . ' ' . $rrdfname . ' ' . $rrdlname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		
		<input type="submit" value="Remove Religion" />
	</form>
</div>

<br>

<div class="separatorDiv">" "</div>

<!-- This draws the current spouse religion relationships in a table-->
<br>

<div>
	<table>
		<tr>
			<td>Spouses and Religions</td>
		</tr>
		<tr>
			<th>Spouse Name</th>
			<th>Religion Name</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT s.fname, s.lname, r.name  FROM religion_spouse rs INNER JOIN spouse s ON s.spouse_id = rs.sid INNER JOIN religion r ON rs.rid=r.religion_id;
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}


if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($afname, $alname, $rname)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $afname . $alname . "\n</td>\n<td>\n" . $rname . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

<br>


<!--Add to Spouse Religion table, two selects and for 1 post-->

<div>
	<form method="post" action="spouse_religion.php">
		<fieldset>
			<legend>Spouse to pair with religion</legend>
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
					 echo '<option value=" ' . $sid . ' "> ' . $sid . ' ' . $sfname . $slname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
				<fieldset>
			<legend>Religion to pair with Spouse</legend>
				<select name="religionInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT religion_id, name FROM religion"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($rid, $name)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $rid . ' "> ' . $rid . ' ' . $name  .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		
		<input type="submit" value="Assign Spouse Religion" />
	</form>
</div>

<br>




<!-- This removes Spouse religion -->

<p>Remove Spouse religion</p>

<div>
	<form method="post" action="remove_spouse_religion.php">
		<fieldset>
			<legend>Spouse to remove religion from</legend>
				<select name="spouseRemoveReligionInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT spouse_id, fname, lname FROM spouse"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($srrid, $srrfname, $srrlname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $srrid . ' "> ' . $srrid . ' ' . $srrfname . $srrlname .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		
		<input type="submit" value="Remove Religion" />
	</form>
</div>

<br>















<div class="separatorDiv">" "</div>

<!--This filter will show movies with a particular actor-->


<p>Filter films for a particular actor</p>

<div>
	<form method="post" action="actorFilmFilter.php">
		<fieldset>
			<legend>Filter By Actor</legend>
				<select name="actorFilterInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT actor_id, fname, lname FROM actor"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($filteraid, $afname, $alname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $filteraid . ' "> ' . $filteraid . ' ' . $afname . ' ' . $alname .  '</option>\n';
					}
					$stmt->close();
					?>
				</select>
		</fieldset>
		<input type="submit" value="Show Films for Actor" />
	</form>
</div>

<br>

<div class="separatorDiv">" "</div>

<!--This filter will show the actors, spouses, and directors who share the religion selected-->


<p>Find what Actors, Spouses, and Directors share a particular religion. Only returns results if all three entities have that religion </p>

<div>
	<form method="post" action="shared_religions.php">
		<fieldset>
			<legend>Religion to get report of directors, spouses, and actors </legend>
				<select name="religionFilterInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT religion_id, name FROM religion"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($shrid, $name)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $shrid . ' "> ' . $shrid . ' ' . $name  .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		<input type="submit" value="Show spouses,actors, and directors that all share chosen religion" />
	</form>
</div>

<br>

<div class="separatorDiv">" "</div>

<!--This filter will show the films for the chosen actor-->


<p>Find what Actors are working on a particular film </p>

<div>
	<form method="post" action="actors_on_film.php">
		<fieldset>
			<legend>Film to get actors for.</legend>
				<select name="filmActorInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT film_id, title FROM film"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($faid, $ftitle)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $faid . ' "> ' . $faid . ' ' . $ftitle .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		<input type="submit" value="Show Actors working on Film" />
	</form>
</div>


<br>

<div class="separatorDiv">" "</div>


<!--This filter will show the spouse for the chosen actor-->


<p>Get the spouse married to a particular actor. </p>

<div>
	<form method="post" action="actor_spouse_lookup.php">
		<fieldset>
			<legend>Actor you would like to find spouse for</legend>
				<select name="actorSpouseLookInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT actor_id, fname, lname FROM actor"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($asfid, $afname, $alname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $asfid . ' "> ' . $asfid . ' ' . $afname . ' ' . $alname .   '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		<input type="submit" value="Show spouse" />
	</form>
</div>



<!--This filter will show the films for the chosen director-->

<br>

<div class="separatorDiv">" "</div>

<p>Find what Director is working on a particular film </p>

<div>
	<form method="post" action="directors_on_film.php">
		<fieldset>
			<legend>Film to get actors for.</legend>
				<select name="filmDirectorInfo">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT film_id, title FROM film"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($fdid, $fdtitle)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" ' . $fdid . ' "> ' . $fdid . ' ' . $fdtitle .  '</option>\n';
					}
					$stmt->close();


					?>
				</select>
		</fieldset>
		<input type="submit" value="Show Films for Director" />
	</form>
</div>







</body>
</html>













































































