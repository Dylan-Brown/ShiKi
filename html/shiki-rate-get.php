<?php
//echo "<strong>This page is the php to connect to the AWS server.<br></strong>";

// connect to the databse
function dbConnect() {
	$db = new mysqli("shiki.cp2brcfro0u7.us-west-2.rds.amazonaws.com", "shiki_master", "mypassword", "shiki");
	if($db->connect_errno > 0){
		// echo "<strong>Unable to connect to database</strong>";
	    die('Unable to connect to database [' . $db->connect_error . ']');
	} else {
		// echo "<strong>Connected to db: $db->host_info<br><br></strong>";
	}
	return $db;
}

// find a random tag to rate
$tags = Array('summer','winter', 'fall', 'spring', 'belowten', 'tentothirty', 'thirtytofifty', 'fiftytoseventy', 'seventytoninety', 'aboveninety', 'casual', 'business', 'party');
$tag = $tags[array_rand($tags, 1)];

// query the database
$sql = <<<SQL
	SELECT *
    FROM `recommendations`
    WHERE `$tag` = 1
SQL;
$db = dbConnect();
$result = $db->query($sql);

$urls_s = $tag . ',';
if(!$result){
	// there was an error or no results
    die('There was an error running the query [' . $db->error . ']');
} else {
	// successful; generate the return string
	foreach ($result as $item) {
		$urls_s = $urls_s . $item['url'] . ',';
	}	
}

// echo the results
echo $urls_s;

?>
