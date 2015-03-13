
function hideDiv(elementID){
	document.getElementById(elementID).style.display = "none";
}

function showDiv(elementToShow,elementToHide1,elementToHide2){
	document.getElementById(elementToShow).style.display = "block";
	document.getElementById(elementToHide1).style.display = "none";
	document.getElementById(elementToHide2).style.display = "none";
}
