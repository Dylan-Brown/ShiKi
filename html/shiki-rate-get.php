<?php
echo "<strong>This page is the php to connect to the AWS server.<br></strong>";

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

// find a random tag to rate
$tags = Array('summer','winter', 'fall', 'spring', 'belowten', 'tentothirty', 'fiftytoseventy', 'seventytoninety', 'aboveninety', 'casual', 'business', 'party');
$tag = $tags[array_rand($tags, 1)];
echo 'selected tag is:' . $tag . '<br>';

// form the query
$sql = <<<SQL
	SELECT *
    FROM `recommendations`
    WHERE `$tag` = 1
SQL;
echo 'sql tag is:' . $sql . '<br>';

// query the database
$result = $db->query($sql);
$urls = [];
array_push($urls, $tag);
if(!$result){
	echo "<strong>There was an error running the query: $db->error<br></strong>";
    die('There was an error running the query [' . $db->error . ']');
} else {
	// successful; gather the results
	foreach ($result as $item) {
		array_push($urls, $item['url']);
	}
}


// TODO: Pass the results back to the javascript

/*
// print the results
foreach ($urls as $url) {
	echo 'result is: ' . $url . '<br>';
}
*/


?>
