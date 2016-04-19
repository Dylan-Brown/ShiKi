<?php
echo "<strong>Page: Search the database.<br></strong>";

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

// query the database
// TODO: GET THE ACTUAL REQUESTED TAGS
$sql = <<<SQL
	SELECT *
    FROM `recommendations`
    WHERE `summer` = 0
SQL;
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


?>
