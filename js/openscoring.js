$(function() {
	$(".login").click(login);
	var p=window.location.search.replace(/.*[?&]p=([^&]*)(&|$).*/,"$1")
	afterRender((p?p:"main"))
})

function login() {
	send("login","checklogin",{logintype:$(this).attr("id"),inputUser:$("#inputUser").val(),inputPassword:$("#inputPassword").val(),rememberMe:$("#rememberMe").val(),p:$("#p").val()},"shared");
}
function checklogin(json) {
//  	console.log(json)
	if(!json.warning) {
		showMessage(json.welcome);
		insertTemplate(json)
// 		get_template(json.page,{loggedin:true},"admin");
		$("#logoutMenuItem").collapse('show');
	}
}
function send(page,f,d,place) {
	if(typeof(place)=="undefined") var place="frontend";
	if(typeof(d)=="undefined") var d={};
// 	alert(page+f+place)
	d.ajax=1;
	console.log("./"+place+"/"+page+".php");
	$.ajax({
		url: "./"+place+"/"+page+".php",
		data: d,
		type: "POST",
		dataType : "json",
		cache: false,
		success: function( json ) {
			if(json.log) console.log(json.log);
			if(json.warning) {if(json.warning!=""){ showWarning(json.warning,6000); console.log("Warning!"); }}
			if(f) window[f](json); 
		},
		error: function( xhr, status, errorThrown ) {
			alert( "Sorry, there was a problem!" );
			console.log( "Error: " + errorThrown );
			console.log( "Status: " + status );
			console.dir( xhr );
		}
	});
}
function get_template(template,data,f) {
	if(typeof(data)=="undefined") data={}
	data.template=template
//   	console.log(data)
	$.ajax({url:"shared/templates.php",data:data,type:"POST",dataType:"json",cache:false,
		success:function(json) {
			insertTemplate(json)
			if(typeof(f)!="undefined")
				window[f](json)
		},
		error: function( xhr, status, errorThrown ) {
			alert( "Sorry, there was a problem!" );
			console.log( "Error: " + errorThrown );
			console.log( "Status: " + status );
			console.dir( xhr );
		}

	});
}
function insertTemplate(json) {
  	console.log("inserting template");
   	console.log(json);
	$("#contentdiv").html(json.template);
	afterRender(json.template)
}
function admin() {
		//Nothing here...
}
// // // // // 
// After Rendering functions
function afterRender(p) {
	console.log(p)
	if(!p) return
	switch (p) {
		case "main":
			$(".scoreTask").click(function () {get_template("scoring",{taskId:$(this).data("taskId")})});
		break;
	}
}

// // // // // 
// Dialogs
function showWarning(txt,time) {
	if(typeof(time)=="undefined") var time=3000
	$(".OpenScoringWarning").html(txt)
	$(".OpenScoringWarning").show().delay(time).fadeOut()
}
function showMessage(txt,time) {
	if(typeof(time)=="undefined") var time=3000
	$(".OpenScoringMessage").html(txt)
	$(".OpenScoringMessage").show().delay(time).fadeOut()
}
