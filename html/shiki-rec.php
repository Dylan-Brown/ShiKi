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
// echo "<strong>ECHOING REQUEST:<br></strong>";
// echo "<strong>$q<br></strong>";

if ($q !== "") {
    $q = strtolower($q);
    $strlen=strlen($q);  
    
    // get the invidual values
    $nums = str_split($q);
    $url = substr($q, 14, $strlen);
    $summer = (int) $nums[0];
	$winter = (int) $nums[1];
	$fall = (int) $nums[2];
	$spring = (int) $nums[3];
	$belowten = (int) $nums[4];
	$tentothirty = (int) $nums[5];
	$thirtytofifty = (int) $nums[6];
	$fiftytoseventy = (int) $nums[7];
	$seventytoninety = (int) $nums[8];
	$aboveninety = (int) $nums[9];
	$casual = (int) $nums[10];
	$business = (int) $nums[11];
	$party = (int) $nums[12];
	
// make the request
$sql = <<<SQL
    INSERT INTO recommendations
    VALUES ('$url', $summer, $winter, $fall, $spring, $belowten, $tentothirty, $thirtytofifty, $fiftytoseventy, $seventytoninety, $aboveninety, $casual, $business, $party, 0.000, 0);
SQL;

// echo "<strong>$sql<br></strong>";

// confirm success of request
$result = $db->query($sql);
if(!$result){
	echo "<strong>There was an error running the query: $db->error<br></strong>";
    die('There was an error running the query [' . $db->error . ']');
} else {
	echo "<strong>Successful query!<br></strong>";
}
	
}

header("Location: shiki-home.html");
exit;

?>
