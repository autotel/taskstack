<meta name="viewport" content="width=device-width, initial-scale=1">
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
		/*max-height:240px;*/
	}
	.item{
		
		z-index:2;

	}
	.tostack {
		position: absolute;
		right: -30;
		bottom: -20;
		transform: rotate(-45deg);
		box-shadow: -0px -5px 5px #FFF;
		background-color: #FFF;
		width: 70px;
		height: 40px;
		text-align: right;
		opacity: 0.5;
	}
	.tostack:hover{
		opacity:0.9;
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
		z-index:10;
		position:absolute;
		top:0;
		left:0;
	}
	#windowy,#windowbde{
		background-color:rgba(255,255,204,0.9);
		position:fixed;
		
		/*width:300px;*/
		padding:3px;
		margin:3px;
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		overflow:hidden;
		z-index:12;
	}
	
	/*.item:hover{
		z-index:7;
		-webkit-box-shadow: 0px 0px 7px 0px #FFF;
		-moz-box-shadow: 0px 0px 7px 0px #FFF;
		box-shadow: 0px 0px 5px 7px #FFF;
		opacity:1;
		/*margin-left:15px;*/
	}*/
	
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
	.onstack{
		width:252;
	}
	
	body{
		padding:0; margin:0;
	}
</style>
<meta name="viewport" content="width=400">
<body>

	<? 
	$display=$_GET['display'];
	
	date_default_timezone_set("America/Santiago");

	$today = date("Y-m-d H:i:s");//pendiente: cambiar a unix

	//echo "<p style=\"position:absolute\">system date is $today</p>";


	include("common_funcs_php.php");
	$extraclass="";
	worDB();
	if($display==""){
		$sql = 'SELECT tid, content, context, user, deadline, importance, submission_date, status
		FROM taskstack';

	}else{
		$sql = "SELECT tid, content, context, user, deadline, importance, submission_date, status
		FROM taskstack
		WHERE context='$display'";
		echo("<h1>Filter: $display <sup>[<a href=\"./\">X</a>]</h1></sup>");
	}
	?>
<div id="container" style="width:100%; padding:0; margin:0; position:absolute;">
	<?
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
			if("onstack"===$row['status'])
				$extraclass.=" onstack";
			$extraclass.=" im".$row['importance'];
			$printarray[$row['importance']."x".$row['deadline']."x".$row['tid']]='<div data-datediff="'.$ddiff.'" data-tid="'.$row['tid'].'" data-context="'.$row['context'].'" class="item '.$extraclass.'">'.
			"<b><a href=index.php?display={$row['context']}>{$row['context']}</a></b><BR>".
			"{$row['content']}<br><span class=\"ajax\" data-target=\"#windowy\" data-href=\"{$_SERVER['self']}input.php?actionload=true&tid={$row['tid']}\">edit</span>";
			if($row['status']==="ready"){
				$printarray[$row['importance']."x".$row['deadline']."x".$row['tid']].="".
					" | <span data-action=\"delete\" class=\"ajax\" data-target=\"#windowy\" data-href=\"{$_SERVER['self']}postExec.php?action=remove&tid={$row['tid']}\">remove</span>";
			}else{
				$printarray[$row['importance']."x".$row['deadline']."x".$row['tid']].="".
					" | <span data-action=\"setready\" class=\"ajax\" data-target=\"#windowy\" data-href=\"{$_SERVER['self']}postExec.php?action=setready&tid={$row['tid']}\">ready</span>";
				if($row['status']==="onstack"){
					$printarray[$row['importance']."x".$row['deadline']."x".$row['tid']].="".
					"<span data-action=\"setoffstack\" class=\"ajax tostack\" data-target=\"#windowy\" data-href=\"{$_SERVER['self']}postExec.php?action=status&to=pendant&tid={$row['tid']}\">off</span>";
				}else{
					$printarray[$row['importance']."x".$row['deadline']."x".$row['tid']].="".
					"<span data-action=\"setonstack\" class=\"ajax tostack\" data-target=\"#windowy\" data-href=\"{$_SERVER['self']}postExec.php?action=status&to=onstack&tid={$row['tid']}\">on</span>";
				}
			}
			if($row['deadline']!==""){
				$printarray[$row['importance']."x".$row['deadline']."x".$row['tid']].=" | {$row['deadline']}".
				" <span class=\"ajax\" data-target=\"this\" data-href=\"{$_SERVER['self']}postExec.php?action=onedayless&tid={$row['tid']}\">/\</span>".
				" | <span class=\"ajax\" data-target=\"this\" data-href=\"{$_SERVER['self']}postExec.php?action=onedaymore&tid={$row['tid']}\">\/</span>";
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

	
	<div id="windowsContainer"></div>
	<div id="windowy"></div>
<span class="ajax" data-target=#windowy data-href="input.php"><div id="adder" style=""><h1>+</h1></div></span>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="masonry.pkgd.min.js"></script>
<script>

	var contexts=[""];
	$("document").ready(function(){
		/*$(document).append('<input type="text" autofocus id="flashfind">find</input>');
		$("#flashfind").on("change",function(){
			window.find($("#flashfind").val());
		});*/
		$("#windowy").fadeOut();
		function refreshappends(){
			$(".ajax").each(function(){
				$(this).on("click",function(){ 
					console.log("click"); 
					windowLoad($(this)); 
				}).css("cursor","hand");
				if(!$(this).data("appended")){
					$(this).data("appended",true);
				}
			});
		}
		function windowLoad(dis){
			el=$(dis.data("target"));
			//action=dis.data("action");
			if(el=="this"){
				el=dis;
			}else if(el=="#windowy"){
				el=$(el);
				$("#windowy").fadeIn();
				$("#windowy").html("<h1>one second, please...</h1>");
			}else{
				el=$(el);
			}

			var url=dis.data("href");
			console.log("called ajaxload returnint "+url+" to "+dis.data("target"));
			//console.log(el)
			$.ajax({
				url: url,
			}).done(function(data) {
				console.log('load ready');
				console.log({data:data});
				el.html(data);
				el.css("display","block");
				action=el.children("#action").text();
				console.log("action:"+action);
				
				if(action=="status_onstack"){
					dis.parent().addClass("onstack");
					 $container.masonry('layout');
				}else if(action=="status_pendant"){
					dis.parent().removeClass("onstack");
					dis.parent().removeClass("ready");
					 $container.masonry('layout');
				}else if(action=="setready"){
					dis.parent().addClass("ready");
					$container.masonry('layout');
				}else if(action=="remove"){
					dis.parent().detach();
					$container.masonry('layout');
				}
			});
			
		}
		
		$(".item").each(function(){
			$(this).html($(this).html().replace(/(?:|^[^"]|^)(?:(?:https?\:\/\/)|(?:www\.)){1,2}((?:[0-9a-zA-Z\/]*).[\w]{2,4})\/?([^\0-\32 <]*)/g,"<a data-target=\"this\" href=\"$&\" title=\"$2\">$1</a>"));

			/*if($(this).data("context")==="BDE"){
				var ttinxof=contexts.indexOf($(this).data("context"));
				if(ttinxof==-1){
					contexts[contexts.length]=$(this).data("context");
					
				}
				$(this).addClass("BDE").removeClass("item").css({"float":"left"});
				$(this).appendTo("#windowbde");
			}else{*/
				//unduplicateadd context
				var ttinxof=contexts.indexOf($(this).data("context"));
				if(ttinxof==-1){
					contexts[contexts.length]=$(this).data("context");
				}
				//$(this).css({"z-index":3, "position":"absolute", "left":ppx});
				//$(this).animate({"top":ypos+todayy});
			//}

		});


		var $container = $('#container');
		$container.masonry({
			itemSelector: '.item',
			columnWidth: 132,
		});
		refreshappends();


	});
</script>