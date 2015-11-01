<? 
//error_reporting(E_ALL);

	date_default_timezone_set("America/Santiago");

	$today = date("Y-m-d H:i:s");//pendiente: cambiar a unix

	//echo "<p style=\"position:absolute\">system date is $today</p>";

	
	include("common_funcs_php.php");
	if($_GET['action']==="setready"){
		worDB();
		$tid=$_GET['tid'];
		if($tid!=""){//-1 task id for new tasks that have been not created.
			$sql = "UPDATE taskstack
			SET status='ready'
			WHERE tid = '{$_GET['tid']}'";
			mysql_select_db($db);
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('<div class="phpmessage"><span class=\"naranjo\">[!]</span> couldnt set ready: ' . mysql_error().'</div>');
			}else{
				echo "<div class=\"phpmessage\"><span class=\"naranjo\"><<</span> task #{$_GET['tid']} has been marked as ready <a class=\"ajax\" href=\"postExec.php?action=remove&tid={$_GET['tid']} \">[delete]</a></div>";
				echo "<div id=action>{$_GET['action']}</div>";
			}
		}else{

			$sql = "INSERT INTO taskstack ".
			"(content, context, user, deadline, importance, foolows, submission_date, status) ".
			"VALUES ".
			"('$content', '$context', '$user', '$deadline', '$importance', '$foolows', '$submission_date', '$status')";
			mysql_select_db($db);
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('<div class="phpmessage"><span class=\"naranjo\">[!]</span> Could not insert data: ' . mysql_error().'</div>');
			}else{
				echo "<div class=\"phpmessage\"><span class=\"naranjo\"><<</span> created task </div>";
				echo "<div id=action>{$_GET['action']}</div>";
			}
			$tid=mysql_insert_id();
			echo $tid;
		}
		

		mysql_close($conn);
	}else if($_GET['action']==="status"){
		worDB();
		$tid=$_GET['tid'];
		$setto=$_GET['to'];
		if($tid!=""){
			$sql = "UPDATE taskstack
			SET status='{$setto}'
			WHERE tid = '{$_GET['tid']}'";
			mysql_select_db($db);
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die("<div class=\"phpmessage\"><span class=\"naranjo\">[!]</span> couldnt set {$_GET['action']} $setto: " . mysql_error()."</div>");
			}else{
				echo "<div class=\"phpmessage\"><span class=\"naranjo\"><<</span> task #{$_GET['tid']} {$_GET['action']} has been set $setto <a class=\"ajax\" href=\"postExec.php?action=remove&tid={$_GET['tid']} \">[delete]</a></div>";
				echo "<div id=action>{$_GET['action']}_{$_GET['to']}</div>";
			}
		}else{

			$sql = "INSERT INTO taskstack ".
			"(content, context, user, deadline, importance, foolows, submission_date, status) ".
			"VALUES ".
			"('$content', '$context', '$user', '$deadline', '$importance', '$foolows', '$submission_date', '$status')";
			mysql_select_db($db);
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('<div class="phpmessage"><span class=\"naranjo\">[!]</span> Could not insert data: ' . mysql_error().'</div>');
			}else{
				echo "<div class=\"phpmessage\"><span class=\"naranjo\"><<</span> created task </div>";
				echo "<div id=action>{$_GET['action']}</div>";
			}
			$tid=mysql_insert_id();
			echo $tid;
		}
		

		mysql_close($conn);
	}else if($_GET['action']==="save"){
		worDB();
		$tid=$_GET['tid'];
		$content=$_GET['content'];
		$context=$_GET['context'];
		$user=$_GET['user'];
		$deadline=$_GET['deadline'];
		$importance=$_GET['importance'];
		$foolows=$_GET['foolows'];
		$submission_date=$_GET['submission_date'];
		$status="not ready";
		if($tid!="-1"){//-1 task id for new tasks that have been not created.
			$sql = "UPDATE taskstack
			SET content='$content', context='$context',user='$user',deadline='$deadline',importance='$importance',foolows='$foolows',submission_date='$submission_date',status='$status'
			WHERE tid = '{$_GET['tid']}'";
			mysql_select_db($db);
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('<div class="phpmessage"><span class=\"naranjo\">[!]</span> Could not delete data: ' . mysql_error().'</div>');
			}else{
				echo "<div class=\"phpmessage\"><span class=\"naranjo\"><<</span> updated previous version of task #{$_GET['tid']}</div>";
			}
		}else{

			$sql = "INSERT INTO taskstack ".
			"(content, context, user, deadline, importance, foolows, submission_date, status) ".
			"VALUES ".
			"('$content', '$context', '$user', '$deadline', '$importance', '$foolows', '$submission_date', '$status')";
			mysql_select_db($db);
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('<div class="phpmessage"><span class=\"naranjo\">[!]</span> Could not insert data: ' . mysql_error().'</div>');
			}else{
				echo "<div class=\"phpmessage\"><span class=\"naranjo\"><<</span> created task </div>";
				echo "<div id=action>{$_GET['action']}</div>";
			}
			$tid=mysql_insert_id();
			echo $tid;
		}
		/*
		if ($conn->query($sql) === TRUE) {
		$last_id = $conn->insert_id;
		echo "New record created successfully. Last inserted ID is: " . $last_id;
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
			echo "<div class=\"phpmessage\"><span class=\"naranjo\"><<</span> Entered data successfully\n</div>";
			mysql_close($conn);

		}*/

		mysql_close($conn);
	}else if($_GET['action']==="remove"){
		worDB();
		if($tid!="-1"){//-1 task id for new tasks that have been not created.
			$sql = "DELETE FROM taskstack
				WHERE tid = '{$_GET['tid']}'";
			mysql_select_db($db);
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('<div class="phpmessage"><span class=\"naranjo\">[!]</span> Could not delete data: ' . mysql_error().'</div>');
			}else{
				echo "<div class=\"phpmessage\"><span class=\"naranjo\"><<</span> Deleted task #{$_GET['tid']}</div>";
				echo "<div id=action>{$_GET['action']}</div>";
			}
		}
		mysql_close($conn);
	}else if(($_GET['action']==="onedaymore"||$_GET['action']==="onedayless")&&$_GET['tid']!=="-1"){
		worDB();
		$sum;
		if($_GET['action']==="onedaymore"){
			$sum=86400;
		}else{
			$sum=-86400;
		}
		$sql = "SELECT tid, deadline
			FROM taskstack
			WHERE tid='{$_GET['tid']}'";
		mysql_select_db($db);
		$retval = mysql_query( $sql, $conn );
		$printarray=array();
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}else{
			while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
				$tid=$_GET['tid'];
				echo $deadline."->";
				$deadline = date('Y-m-d H:i:s', intval(strtotime($row['deadline']))+$sum);
				//$deadline=time('Y-m-d H:i:s',$deadline);
				echo $deadline."->";
			}
		}
		$sql = "UPDATE taskstack
			SET deadline='$deadline'
			WHERE tid = '{$_GET['tid']}'";
			mysql_select_db($db);
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('<div class="phpmessage"><span class=\"naranjo\">[!]</span> couldnt set ready: ' . mysql_error().'</div>');
			}else{
				echo "<div class=\"phpmessage\"><span class=\"naranjo\"><<</span> task #{$_GET['tid']} has been marked as ready</div>";
				echo "<div id=action>{$_GET['action']}</div>";
			}
		mysql_close();
	}else if(($_GET['actionload']==="true"&&$_GET['tid']!=="-1")|$_GET['action']==="create"){
		worDB();
		if($_GET['action']==="create"){
			$tid=$_GET['tid'];
			$content=$_GET['content'];
			$context=$_GET['context'];
			$user=$_GET['user'];
			$deadline=$_GET['deadline'];
			$importance=$_GET['importance'];
			$submission_date=$_GET['submission_date'];
			$status=$_GET['status'];
		}else{
			$sql = "SELECT tid, content, context, user, deadline, importance, submission_date, status
				FROM taskstack
				WHERE tid='{$_GET['tid']}'";
			mysql_select_db($db);
			$retval = mysql_query( $sql, $conn );
			$printarray=array();
			if(! $retval )
			{
				die('Could not get data: ' . mysql_error());
			}else{
				while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
					$tid=$row['tid'];
					$content=$row['content'];
					$context=$row['context'];
					$user=$row['user'];
					$deadline=$row['deadline'];
					$importance=$row['importance'];
					$submission_date=$row['submission_date'];
					$status=$row['status'];
				}
				ksort($printarray,SORT_STRING );
				foreach($printarray as $key => $item){
					echo $key.$item;
				}
			}
				mysql_close();
		}
		}

	 if($_GET['cancel']==="cancel"){
		 echo "<div id=action>{$_GET['action']}</div>";
	 }
	


	//codigo jquery que pone las divs today en el medio, las before_today arriba, y las demas abajo, para que haya una idea de que las tareas van avanzando.}
	//hacer un formulario accesible desde el fono, para poder anotarn ideas apenas se ocurren
	//hacer columnas: una para cada context, que se puedan administrar (posicion de cu)
	//alinear verticalmente segun fechas para saber cuando una fecha esta copada
	?>
<script src="ajaxClassAppend.js"></script>
<a href="index.php">[refresh]</a>