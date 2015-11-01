<?
$dbhost = 'your host';
$dbuser = 'your user';
$dbpass = 'your password';
$db = 'your database name';

function worDB(){
	global $dbhost;
	global $dbuser;
	global $dbpass;
	global $conn;
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  die('<li>Could not connect: ' . mysql_error());
	}
}
function datediff($datea, $dateb, $in){
		//format: YYYY-MM-DD
		$datea=strtotime($datea);
		$dateb=strtotime($dateb);
		if($datea==0|$dateb==0){
			return 0;
		}
		//86400 seconds in a day
		$diff= $dateb-$datea;
		//echo floatval($diff)."->";
		if($in==="\$w"){
			$diff=$diff/604800;
		}
		if($in==="\$d"){
			$diff=floatval($diff) / 86400;
		}
		if($in==="\$h"){
			$diff=$diff/3600;
		}
		if($in==="\$m"){
			$diff=$diff/60;
		}
		return $diff;
	}
?>