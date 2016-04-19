<?php
echo "<strong>PHP: Search the database.<br></strong>";

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


// get the javascript variables
$q = $_REQUEST["q"];

if ($q != "") {
	$nums = str_split($q);
	
	$vals = [];
	$names = [];
	
	if ($nums[0] == 1) {
		array_push($names, 'summer');
	}
	if ($nums[1] == 1) {
		array_push($names, 'winter');
	} 
	if ($nums[2] == 1) {
		array_push($names, 'fall');
	} 
	if ($nums[3] == 1) {
		array_push($names, 'spring');
	} 
	if ($nums[4] == 1) {
		array_push($names, 'belowten');
	} 	
	if ($nums[5] == 1) {
		array_push($names, 'tentothirty');
	} 
	if ($nums[6] == 1) {
		array_push($names, 'thirtytofifty');
	} 
	if ($nums[7] == 1) {
		array_push($names, 'fiftytoseventy');
	} 
	if ($nums[8] == 1) {
		array_push($names, 'seventytoninety');
	} 
	if ($nums[9] == 1) {
		array_push($names, 'aboveninety');
	} 
	if ($nums[10] == 1) {
		array_push($names, 'casual');
	} 
	if ($nums[11] == 1) {
		array_push($names, 'business');
	} 
	if ($nums[12] == 1) {
		array_push($names, 'party');
	} 
	
	// create where clause of sql
	$where = "";
	$c = count($names);
	for ($i = 1; $i <= $c - 1; $i++) {
		$where = $where . "'$names[$i]'=1, " 
	}
	$d = $c-1;
	$where = $where . "'$names[$d]'=1";
	
	// query the database
	$sql = <<<SQL
		SELECT *
		FROM `recommendations`
		WHERE $where
SQL;
	if (!$result) {
		// no results or a query with the error
		echo "<strong>There was an error running the query: $db->error<br></strong>";
		die('There was an error running the query [' . $db->error . ']');
	} else {
		// there are results; put into the array (or string)
		$urls = [];
		$urls_s = "";
		foreach ($_result as $item_s) {
			foreach ($item_s as $item) {
				$urls_s = $urls_s . $item['url'];
				array_push($urls, $item['url']);
			}
		}
		
		// TODO: Pass results to display search result
		
	}
	
}

/*

$result = $db->query($sql);
if(!$result){
	echo "<strong>There was an error running the query: $db->error<br></strong>";
    die('There was an error running the query [' . $db->error . ']');
}

// print each of the array keys and their values
function printRow($r) {
	foreach (array_keys($r) as $k) {
		echo $k . ': ' . $r[$k] . '<br />';
	}
}

// print each row
while($row = $result->fetch_assoc()){
	echo '<br>';
    printRow($row);
}
* */


?>
