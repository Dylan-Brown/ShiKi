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

// default variables 
$url = "";
$summer = 0;
$winter = 0;
$fall = 0;
$spring = 0;
$belowten = 0;
$tentothirty = 0;
$thirtytofifty = 0;
$fiftytoseventy = 0;
$seventytoninety = 0;
$aboveninety = 0;
$casual = 0;
$business = 0;
$party = 0;

// our database
$db = dbConnect();

// get the javascript variables
$q = $_REQUEST["q"];
echo "<strong>ECHOING REQUEST:<br></strong>";
echo "<strong>$q<br></strong>";

if ($q !== "") {
    $q = strtolower($q);
    $strlen=strlen($q);
    
    // TODO: Values not correctly gotten, please make sure printing right
    
    // get the invidual values
    $url = substr($q, 14, $strlen);
    $summer = (int) substr($q, 0, 1);
	$winter = (int) substr($q, 1, 2);
	$fall = (int) substr($q, 2, 3);
	$spring = (int) substr($q, 3, 4);
	$belowten = (int) substr($q, 4, 5);
	$tentothirty = (int) substr($q, 5, 6);
	$thirtytofifty = (int) substr($q, 6, 7);
	$fiftytoseventy = (int) substr($q, 7, 8);
	$seventytoninety = (int) substr($q, 8, 9);
	$aboveninety = (int) substr($q, 9, 10);
	$casual = (int) substr($q, 10, 11);
	$business = (int) substr($q, 11, 12);
	$party = (int) substr($q, 12, 13);
}


// make the request
$sql = <<<SQL
    USE shiki
    INSERT INTO recommendations (url, summer, winter, fall, spring, belowten, tentothirty, thirtytofifty, fiftytoseventy, seventytoninety, aboveninety, casual, business,  party,  avg_rating, num_ratings)
    VALUES ($url, $summer, $winter, $fall, $spring, $belowten, $tentothirty, $thirtytofifty, $fiftytoseventy, $seventytoninety, $aboveninety, $casual, $business, $party, 0.000, 0)
SQL;

echo "<strong>$sql<br></strong>";
/*
// confirm success of request
$result = $db->query($sql);
if(!$result){
	echo "<strong>There was an error running the query: $db->error<br></strong>";
    die('There was an error running the query [' . $db->error . ']');
} else {
	echo "<strong>Successful query!<br></strong>";
}
*/
?>
