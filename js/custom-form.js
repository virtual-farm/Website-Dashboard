let _ = (elem) => {
	return document.getElementById(elem);
}
let toastr = {
	success:(x,y=0,z=0)=>{
		alert(x);
	},
	error:(x,y=0,z=0)=> {
		alert(x);
	}
}
try {
	document.getElementById("login-form").onsubmit = (event) => {
		event.preventDefault();
		let formdata = new FormData(document.getElementById("login-form"));
		formdata.append("login", encodeURIComponent(btoa(new Date().toString())));
		var xhttp;
		if (XMLHttpRequest) {
			xhttp = new XMLHttpRequest();
		}
		else {
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = ()=>{
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				let data = JSON.parse(xhttp.responseText);
				if (data.status == "success") {
					window.location.replace("./dashboard/");
				}
				else {
					toastr.error(data.message, "Failed", {progressBar:true});
				}
			}
		}
		xhttp.open("POST", "config.php", true);
		xhttp.send(formdata);
	}

	document.getElementById("registration-form").onsubmit = (event) => {
		event.preventDefault();
		let formdata = new FormData(document.getElementById("registration-form"));
		formdata.append("signup", encodeURIComponent(btoa(new Date().toString())));
		var xhttp;
		if (XMLHttpRequest) {
			xhttp = new XMLHttpRequest();
		}
		else {
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = ()=>{
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				let data = JSON.parse(xhttp.responseText);
				if (data.status == "success") {
					window.location.replace("./dashboard/");
				}
				else {
					toastr.error(data.message, "Failed", {progressBar:true});
				}
			}
		}
		xhttp.open("POST", "config.php", true);
		xhttp.send(formdata);
	}
}
catch (error) {

}

let getnotification = (x)=> {
	var xhttp;
	if (XMLHttpRequest) {
		xhttp = new XMLHttpRequest();
	}
	else {
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = ()=>{
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			$("#notification-data").html(xhttp.responseText);
			$("#notification-modal").modal("show");
		}
	}
	xhttp.open("GET", "../config.php?_fetch_notification="+x+"&_token_="+new Date().toString(), true);
	xhttp.send();
}