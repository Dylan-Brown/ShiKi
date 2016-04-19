$host='shiki.cp2brcfro0u7.us-west-2.rds.amazonaws.com:3306'; // Host name

$username='shiki_master'; // Mysql username

$password='mypassword'; // Mysql password

$db_name='shiki'; // Database nam



$mysqli = new mysqli($host, $username, $password, $db_name);



/* check connection */

if (mysqli_connect_errno()) {

    $error = "Connect failed: %s".str(mysqli_connect_error());

    echo $error;

    exit();

} else {

echo "Hello World. I'm connected to the Database";

}

error_reporting(0);
