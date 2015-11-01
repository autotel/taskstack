	/*function windowLoad(what){
		$("#windowy").fadeIn();
		$("#windowy").html("<h1>one second, please...</h1>");
		//callerdom.animate({opacity:.2});
		var response;
		console.log(">> request "+what);
		$.ajax({
			type: "GET",
			url: what,
			async: true,
			success: function(text) {
				response = text;
				console.log("<< response =" + text);
				$("#windowy").html(response+" <a id=\"closeW\">[close]</a>");//.on("click",function(){ location.reload();});
				$("#closeW").click(function(){$("#windowy").fadeOut();});
			},
			error: function(){
				$("#windowy").html("Something went wrong with the ajax call; sorry. Could be a good idea to try again or <a id=\"closeW\">[close]</a>");
				//callerdom.animate({opacity:1}).html("error; retry?");
				$("#closeW").click(function(){$("#windowy").fadeOut();});
			}

		});
	}*/
	 
