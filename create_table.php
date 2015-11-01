<html>
<head>
<title>Creating MySQL Tables</title>
</head>
<body>
<?php
$dbhost = 'mysql1.freehosting.com';
$dbuser = 'natecl_master';
$dbpass = '{Contr4c}';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )//content, context, user, deadline, importance, submission_date
{
  die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully<br />';
$sql = "CREATE TABLE taskstack( ".
	"tid MEDIUMINT NOT NULL AUTO_INCREMENT, ".
	"deadline VARCHAR(30) NOT NULL, ".
	"importance VARCHAR(30) NOT NULL, ".
	"submission_date VARCHAR(30) NOT NULL, ".
	"context TINYTEXT NOT NULL, ".
	"user TINYTEXT NOT NULL, ".
	"content TEXT NOT NULL, ".
	"PRIMARY KEY ( tid )); ";
mysql_select_db( 'pajaronico_ad' );
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not create table: ' . mysql_error());
}
echo "Table created successfully\n";
mysql_close($conn);
?>
</body>
</html>