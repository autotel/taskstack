<style>
	
	.item,.BDE{
		float:left;
		width:120px;
		background-color:rgba(0xff,0xff,0xcc,0.3);
		padding:3px;
		margin:3px;
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		overflow:hidden;
	}
	.item{
		z-index:2;
		float:left;
	}
    .item:hover{
		z-index:7;
		-webkit-box-shadow: 0px 0px 7px 0px #FFF;
		-moz-box-shadow: 0px 0px 7px 0px #FFF;
		box-shadow: 0px 0px 5px 7px #FFF;
		opacity:1;
		margin-left:2px;
		margin-right:-2px;
	}
	#adder{
		width:64;
		height:64;
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		z-index:4;
		text-align:center;
		padding-top:10;
		overflow:hidden;
		position:fixed; 
		right:0; 
		top:50%;
		background-color:#AAA;
	}
	#adder:hover{
		background-color:#f00;
	}
	#windowsContainer{
		z-index:5;
		position:absolute;
		top:0;
		left:0;
	}
	#windowy,#windowbde{
		background-color:rgba(255,255,204,0.5);
		float:left;
		left:10%; 
		/*width:300px;*/
		padding:3px;
		margin:3px;
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		overflow:hidden;
	}
	
	
	
	h1,h2,h3,h4{
		font-family:arial; margin-top:0;
	}
	a{
		text-decoration:none;
		color:#234567;
	}
	a:hover{
		color:#FF0000;
	}
	.im5{
		background-color:#DDDDFF;
	}
	.im3{
		background-color:#5555FF;
	}
	.im1{
		background-color:#FF5555;
	}
	.contexts{
		float:left; top:0px; height:100%; border: solid 1px black; min-width:132px;
	}
	.ready{
		opacity:.5;
	}
	.daymark{
		height:32px; margin:0; padding:0; position:absolute;
		//pointer-events: none;
	}
	.daymark:hover{
		background-color:#CCC;
	}
	body{
		padding:0; margin:0;
	}
</style>

<body>
<div id="all" style="overflow:scroll; width:100%; padding:0; margin:0; position:absolute; height:100%;">
	<? 

	date_default_timezone_set("America/Santiago");

	$today = date("Y-m-d H:i:s");//pendiente: cambiar a unix

	//echo "<p style=\"position:absolute\">system date is $today</p>";


	include("common_funcs_php.php");
	$extraclass="";
	worDB();
	$sql = "SELECT tid, content, context, user, deadline, importance, submission_date, status
		FROM taskstack
		WHERE context='lectura' OR context='peliculas' OR context='entretencion' OR context='BDE'";
	mysql_select_db($db);
	$retval = mysql_query( $sql, $conn );
	$printarray=array();
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}else{
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
			$ddiff= floatval(datediff($today,$row["deadline"], "\$d"));
			//$ddiff+=1;
			$extraclass="";
			if($today.""===$row['deadline'])
				$extraclass=" today";
			if($tomorrow.""===$row['deadline'])
				$extraclass=" tomorrow";
			if("ready"===$row['status'])
				$extraclass.=" ready";
			$extraclass.=" im".$row['importance'];
			$printarray[$row['importance']."x".$row['deadline']."x".$row['tid']]='<div data-datediff="'.$ddiff.'" data-tid="'.$row['tid'].'" data-context="'.$row['context'].'" class="item '.$extraclass.'">'.
			"<b>{$row['context']}</b><BR>".
			"{$row['content']}<br><a class=\"ajax\" href=\"{$_SERVER['self']}input.php?actionload=true&tid={$row['tid']}\">edit</a>";
			if($row['status']==="ready"){
				$printarray[$row['importance']."x".$row['deadline']."x".$row['tid']].="".
					" | <a class=\"ajax\" href=\"{$_SERVER['self']}postExec.php?action=remove&tid={$row['tid']}\">remove</a>";
			}else{
				$printarray[$row['importance']."x".$row['deadline']."x".$row['tid']].="".
					" | <a class=\"ajax\" href=\"{$_SERVER['self']}postExec.php?action=setready&tid={$row['tid']}\">ready</a>";
			}
			if($row['deadline']!==""){
				$printarray[$row['importance']."x".$row['deadline']."x".$row['tid']].=" | {$row['deadline']}".
				" <a class=\"ajax\" href=\"{$_SERVER['self']}postExec.php?action=onedayless&tid={$row['tid']}\">/\</a>".
				" | <a class=\"ajax\" href=\"{$_SERVER['self']}postExec.php?action=onedaymore&tid={$row['tid']}\">\/</a>";
			}
			$printarray[$row['importance']."x".$row['deadline']."x".$row['tid']].='</div>';
		}
		ksort($printarray,SORT_STRING );
		foreach($printarray as $key => $item){
			echo $item;
		}
	}
	mysql_close();


	//codigo jquery que pone las divs today en el medio, las before_today arriba, y las demas abajo, para que haya una idea de que las tareas van avanzando.}
	//hacer un formulario accesible desde el fono, para poder anotarn ideas apenas se ocurren
	//hacer columnas: una para cada context, que se puedan administrar (posicion de cu)
	//alinear verticalmente segun fechas para saber cuando una fecha esta copada
	?>

	<div id="container" style=" top: 0; left:0; width:200%; height:100%;">
	</div>
	<div id="windowsContainer"></div>
<a class="ajax" href="input.php"><div id="adder" style=""><h1>+</h1></div></a>
</div>
</body>
<script src="/../masonry.pkgd.min.js"></script>
<script src="/../jquery-1.11.0.min.js"></script>
<script src="ajaxClassAppend.js"></script>
<script>
	var contexts=[""];
	var todayy=7;
	var dayheight=72;
	//var containerWidth=0;
	todayy=dayheight*(todayy-1);
	$("document").ready(function(){
		
/* 		$("#windowsContainer").append('<div id="windowbde" height:300></div>'); */
		$("#windowsContainer").append('<div id="windowy" height:300></div>');
		$("#windowy").fadeOut();
		$(".item").each(function(){
			$(this).html($(this).html().replace(/(?:|^[^"]|^)(?:(?:https?\:\/\/)|(?:www\.)){1,2}((?:[0-9a-zA-Z\/]*).[\w]{2,4})\/?([^\0-\32 <]*)/g,"<a href=\"$&\" title=\"$2\">$1</a>"));
		});
		$("#container").css("width",contexts.length*$(".contexts").width());
		

	});
</script>