<?php
echo "<strong>Page: Send in a recommendation to the database.<br></strong>";

// connect to the databse
function dbConnect() {
	$db = new mysqli("shiki.cp2brcfro0u7.us-west-2.rds.amazonaws.com", "shiki_master", "mypassword", "shiki");
	if($db->connect_errno > 0){
	    die('Unable to connect to database [' . $db->connect_error . ']');
	}
	return $db;
}

function calcNewRating($oldRating, $numRates, $newRating) {
	$numerator  = $oldRating * $numRates + $newRating;
	$denominator = $numRates + 1;
	$f = $numerator / $denominator;
	return $f;	
}

// our database
$db = dbConnect();

// get the javascript variables
$q = $_REQUEST["q"]; 

// divide the variables by comma  "url,rating,url,rating..." and get the tag
$array_temp = explode(',',$q);
$templen=count($array_temp) / 2;  
$tag = $array_temp[count($array_temp) - 1];

// get the urls and their ratings
$urls = [];
$ratings = [];
for ($i = 0; $i <= $templen; $i++) {
	if ($i % 2 == 0) {
		// rating
		array_push($ratings, $array_temp[$i]);
	} else {
		// url
		array_push($urls, $array_temp[$i]);
	}
} 

// print the ratings for each url
$where = '';
for ($i = 0; $i <= count($urls) - 2; $i++) {
	$where = $where . "url='$urls[$i]', ";
} 
$d = count($urls) - 1;
$where = $where . "url='$urls[$d]'";

// form the query to find the related urls
$sql_1 = <<<SQL
	SELECT *
    FROM `recommendations`
    WHERE $where
SQL;

echo $sql_1 . '<div>';

$updatedUrls = [];
$updatedRate = [];

// query the database
$result = $db->query($sql_1);
if(!$result){
	die('There was an error running the query [' . $db->error . ']');
} else {
		
	// calculate the new averages
	foreach ($result as $row) {
		echo "<strong>iterate.... $tag<br></strong>";
		$n = 0;
		$o = 0;
		if (strcmp($tag, 'summer') == 0) {
			echo "<strong>In summer!<br></strong>";
			$n = (int) $row['summer_num'];
			$o = floatval($row['summer_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'summer_avg=' . $newAvg . ', summer_num=' . $n_n);
			
		} else if (strcmp($tag, 'winter') == 0) {
			$n = (int) $row['winter_num'];
			$o = floatval($row['winter_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'winter_avg=' . $newAvg . ', winter_num=' . $n_n);
			
		} else if (strcmp($tag, 'fall') == 0) {
			$n = (int) $row['fall_num'];
			$o = floatval($row['fall_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'fall_avg=' . $newAvg . ', fall_num=' . $n_n);
			
		} else if (strcmp($tag, 'spring') == 0) {
			$n = (int) $row['spring_num'];
			$o = floatval($row['spring_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'spring_avg=' . $newAvg . ', spring_num=' . $n_n);
			
		} else if ($tag == 'belowten') {
			$n = (int) $row['belowten_num'];
			$o = floatval($row['belowten_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'belowten_avg=' . $newAvg . ', belowten_num=' . $n_n);
			
		} else if (strcmp($tag, 'tentothirty') == 0) {
			$n = (int) $row['tentothirty_num'];
			$o = floatval($row['tentothirty_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'tentothirty_avg=' . $newAvg . ', tentothirty_num=' . $n_n);
			
		} else if (strcmp($tag, 'thirtytofifty') == 0) {
			$n = (int) $row['thirtytofifty_num'];
			$o = floatval($row['thirtytofifty_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'thirtytofifty_avg=' . $newAvg . ', thirtytofifty_num=' . $n_n);
			
		} else if (strcmp($tag, 'fiftytoseventy') == 0) {
			$n = (int) $row['fiftytoseventy_num'];
			$o = floatval($row['fiftytoseventy_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'fiftytoseventy_avg=' . $newAvg . ', fiftytoseventy_num=' . $n_n);
			
		} else if (strcmp($tag, 'seventytoninety') == 0) {
			$n = (int) $row['seventytoninety_num'];
			$o = floatval($row['seventytoninety_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'seventytoninety_avg=' . $newAvg . ', seventytoninety_num=' . $n_n);
			
		} else if (strcmp($tag, 'aboveninety') == 0) {
			$n = (int) $row['aboveninety_num'];
			$o = floatval($row['aboveninety_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'aboveninety_avg=' . $newAvg . ', aboveninety_num=' . $n_n);
			
		} else if (strcmp($tag, 'casual') == 0) {
			$n = (int) $row['casual_num'];
			$o = floatval($row['casual_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'casual_avg=' . $newAvg . ', casual_num=' . $n_n);
			
		} else if (strcmp($tag, 'business') == 0) {
			$n = (int) $row['business_num'];
			$o = floatval($row['business_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'business_avg=' . $newAvg . ', business_num=' . $n_n);
			
		} else if (strcmp($tag, 'party') == 0) {
			$n = (int) $row['party_num'];
			$o = floatval($row['party_avg']);
			$n_n = $n + 1;
			$key = array_search($row['url'], $ratings);
			$r = $ratings[$key];
			$newAvg = calcNewRating($o, $n, $r);
			array_push($updatedUrls, $row['url']);
			array_push($updatedRate, 'party_avg=' . $newAvg . ', party_num=' . $n_n);
			
		}
		
		// update the values in the databases
		for ($i = 0; $i < count($updatedUrls); $i++) {
			$sql = <<<SQL
				UPDATE recommendations
				SET $updatedRate[$i]
				WHERE url='$updatedUrls[$i]';
SQL;
			echo 'sql is ' . $sql . '<div>';
			$result = $db->query($sql);
			if (!$result) {  
				die('There was an error running the query [' . $db->error . ']');
			}
			// values updated; done
		}		
	}
	
}

?>
