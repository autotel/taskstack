<?
//defaults for if not loading (most of cases)
$loaded=false;
$submission_date=date("Y-m-d H:i:s");
$tid="-1";
$context="BDE";
include("common_funcs_php.php");

 if(($_GET['actionload']==="true"&&$_GET['tid']!=="-1")){
	worDB();
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
			$loaded=true;
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
?>

<title>stack de ideas</title>
<body width="800px">
<form method="GET" action="postExec.php">
	<div id="d_tid" class="formitem" style="visibility:hidden; display:none">
		<input id="f_tid" type="text" name="tid" value="<? echo $tid; ?>"></input>
	</div>
	<div id="d_importance" class="formitem">
		<br>this:<select id="f_importance" name="importance">
		<? if ($loaded){ ?><option value="<? echo $importance ?>">no change (<? echo $importance ?>)</option><? } ?>
		<option value="5">not important</option>
		<option value="3">vital, can be postpounded</option>
		<option value="1">vital, with due date</option>
	</select>
	</div>
	<div id="d_context" class="formitem">
		<br>for: <input id="f_context" type="text" name="context" value="<? echo $context ?>"></input>
	</div>
	<div id="d_deadline" class="formitem">
		<br>before: <input id="f_deadline" type="text" name="deadline" value="<? echo $deadline ?>"></input>
	</div>
	<div id="d_content" class="formitem">
		<br>do: <br><textarea id="f_content" cols="20" rows="5" name="content" ><? echo $content ?></textarea>
	</div>
	<div id="d_sdate" class="formitem">
		<br>today is: <input id="f_sdate" type="text" name="submission_date" value="<? echo $submission_date ?>"></input>
	</div>
	<div id="d_buttons" class="formitem">
		<br><input id="f_save" type="submit" value="save" name="action"></input>
		<? if ($loaded){ ?><input id="f_remove" type="submit" value="remove" name="action"></input><? } ?>
		<input id="f_cancel" type="submit" value="cancel" name="cancel"></input>
	</div>
</form>
</body>
<script src="/../jquery-1.11.0.min.js"></script>
<script>
	$(document).ready(function(){
		<? if (!$loaded){ echo'$("#d_deadline").fadeOut();'; } ?>
		$("#f_importance").on("change",function(){
			if($(this).val()=="5"){
				$("#d_deadline").fadeOut();
			}else{
				
				$("#f_deadline").fadeIn();

			}
		});
	});
</script>