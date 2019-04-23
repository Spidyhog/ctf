function redirectPage () {
	var n = document.getElementById("puzzle").value
	if(n=="Nehru") {
		window.location.href=""+document.getElementById("puzzle").value+".html"
	}
	else {
		alert('wrong')
	}
}
