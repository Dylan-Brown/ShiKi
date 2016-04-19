<?php
echo "<strong>Page: Send in a recommendation to the database.<br></strong>";

// connect to the databse
function dbConnect() {
	$db = new mysqli("shiki.cp2brcfro0u7.us-west-2.rds.amazonaws.com", "shiki_master", "mypassword", "shiki");
	
	if($db->connect_errno > 0){
		echo "<strong>Unable to connect to database</strong>";
	    die('Unable to connect to database [' . $db->connect_error . ']');
	} else {
		echo "<strong>Connected to db: $db->host_info<br><br></strong>";
	}
	return $db;
}

// our database
$db = dbConnect();

/*$sql = <<<SQL
    USE shiki
    INSERT INTO recommendations (url, summer, winter, fall, spring, belowten, tentothirty, thirtytofifty, fiftytoseventy, seventytoninety, aboveninety, casual, business,  party,  avg_rating, num_ratings)
    VALUES ( ...  , 0.000, 0)
SQL;*/


?>
