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

// get the javascript variables
// $q = $_REQUEST["q"];

$q = ['fake_url', '4'];

// divide the variables by comma  
// style : url, rating, url, rating.... 
$array_temp = explode(',', $q);
$templen=strlen($array_temp);  

$urls = [];
$ratings = [];

$j = 0;
for ($i = 0; $i <= $templen; $i++) {
	if ($i % 2 == 0) {
		// rating
		$ratings[$j] = $array_temp[$i];
		$j = $j + 1;
	} else {
		// url
		$urls[$j] = $array_temp[$i];
	}
} 

for ($i = 0; $i < strlen($urls); $i++) {
	echo 'rating is ' . $ratings[$i] . ' for URL ' . $urls[$i] . '<br>';
} 



//print_r($myArray);

/*$sql = <<<SQL
    USE shiki
    INSERT INTO recommendations (url, summer, winter, fall, spring, belowten, tentothirty, thirtytofifty, fiftytoseventy, seventytoninety, aboveninety, casual, business,  party,  avg_rating, num_ratings)
    VALUES ( ...  , 0.000, 0)
SQL;*/

// 

?>
