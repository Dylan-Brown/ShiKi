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

// sort an array by a specific single key
function aasort (&$array, $key) {
    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    $array=$ret;
}

// sort an array by a specific single key
function multisort (&$array, $keys) {
    /*$sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    $array=$ret;*/
}

// our database
$db = dbConnect();

// get the javascript variables
$q = $_REQUEST["q"];
$numtags = 0;

if ($q != "") {
	$nums = str_split($q);
	
	$vals = [];
	$names = [];
	if ((int) $nums[0] == 1) {
		array_push($names, 'summer');
		$numtags = $numtags + 1;
	}
	if ((int) $nums[1] == 1) {
		array_push($names, 'winter');
		$numtags = $numtags + 1;
	} 
	if ((int) $nums[2] == 1) {
		array_push($names, 'fall');
		$numtags = $numtags + 1;
	} 
	if ((int) $nums[3] == 1) {
		array_push($names, 'spring');
		$numtags = $numtags + 1;
	} 
	if ((int) $nums[4] == 1) {
		array_push($names, 'belowten');
		$numtags = $numtags + 1;
	} 	
	if ((int) $nums[5] == 1) {
		array_push($names, 'tentothirty');
		$numtags = $numtags + 1;
	} 
	if ((int) $nums[6] == 1) {
		array_push($names, 'thirtytofifty');
		$numtags = $numtags + 1;
	} 
	if ((int) $nums[7] == 1) {
		array_push($names, 'fiftytoseventy');
		$numtags = $numtags + 1;
	} 
	if ((int) $nums[8] == 1) {
		array_push($names, 'seventytoninety');
		$numtags = $numtags + 1;
	} 
	if ((int) $nums[9] == 1) {
		array_push($names, 'aboveninety');
		$numtags = $numtags + 1;
	} 
	if ((int) $nums[10] == 1) {
		array_push($names, 'casual');
		$numtags = $numtags + 1;
	} 
	if ((int) $nums[11] == 1) {
		array_push($names, 'business');
		$numtags = $numtags + 1;
	} 
	if ((int) $nums[12] == 1) {
		array_push($names, 'party');
		$numtags = $numtags + 1;
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
		// there are results; sort and put into the array (or string)
		if ($numtags === 1) {
			aasort($result, $names[0]);
		} else if ($numtags >= 1) {
			multisort($result, $names);			
		}
		
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
