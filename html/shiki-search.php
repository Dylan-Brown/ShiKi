<?php
//echo "<strong>PHP: Search the database.<br></strong>";

// connect to the databse
function dbConnect() {
	$db = new mysqli("shiki.cp2brcfro0u7.us-west-2.rds.amazonaws.com", "shiki_master", "mypassword", "shiki");
	if($db->connect_errno > 0){
	    die('Unable to connect to database [' . $db->connect_error . ']');
	}
	return $db;
}

// our database
$db = dbConnect();

// get the javascript variables
$q = $_REQUEST["q"];

if ($q != "") {
	$nums = str_split($q);
	
	$vals = [];
	$names = [];
	if ((int) $nums[0] == 1) {
		array_push($names, 'summer');
	}
	if ((int) $nums[1] == 1) {
		array_push($names, 'winter');
	} 
	if ((int) $nums[2] == 1) {
		array_push($names, 'fall');
	} 
	if ((int) $nums[3] == 1) {
		array_push($names, 'spring');
	} 
	if ((int) $nums[4] == 1) {
		array_push($names, 'belowten');
	} 	
	if ((int) $nums[5] == 1) {
		array_push($names, 'tentothirty');
	} 
	if ((int) $nums[6] == 1) {
		array_push($names, 'thirtytofifty');
	} 
	if ((int) $nums[7] == 1) {
		array_push($names, 'fiftytoseventy');
	} 
	if ((int) $nums[8] == 1) {
		array_push($names, 'seventytoninety');
	} 
	if ((int) $nums[9] == 1) {
		array_push($names, 'aboveninety');
	} 
	if ((int) $nums[10] == 1) {
		array_push($names, 'casual');
	} 
	if ((int) $nums[11] == 1) {
		array_push($names, 'business');
	} 
	if ((int) $nums[12] == 1) {
		array_push($names, 'party');
	} 
	
	// create where clause of sql
	$where = "";
	$c = count($names);
	for ($i = 0; $i <= $c - 2; $i++) {
		$where = $where . "$names[$i]=1 AND ";
	}
	$d = $c-1;
	$where = $where . "$names[$d]=1";
	
	// query the database
	$sql = <<<SQL
		SELECT *
		FROM recommendations
		WHERE $where
SQL;

	$result = $db->query($sql);
	if (!$result) {
		// no results or a query with the error
		die('There was an error running the query [' . $db->error . ']');
	} else {
		// there are results; put into the array (or string)
		$urls = [];
		$urls_s = "";
		foreach ($result as $item) {
			// echo $item['url'] . '<div><div>';
			$urls_s = $urls_s . $item['url'] . ',';
			array_push($urls, $item['url']);
		}
		
		// TODO: Pass results to display search result
		echo $urls_s;
	}
	
}

?>
