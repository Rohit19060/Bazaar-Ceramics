//building enlarged image after getting the number of image
function imageenlarge(x) {
	var rows = 4;
	var columns = 5;
	document.writeln("<div class=\"Enlargeimage\"><table>");
	//building table with rows and columns as image
	for (var row = 0; row < rows; row++) {
		document.writeln("<tr>");
		for (var col = 0; col < columns; col++) {
			document.writeln("<td>");
			document.writeln("<img src='../images/bcpot00" + (x) + "_r" + (row + 1) + "_c" + (col + 1) + ".jpg'");
			document.writeln("</td>");
		}
		document.writeln("</tr>");
	}
	document.writeln("</table></div>");
}

// for creating item images and sending data that can be used for members order page
function thumbenlarge(id, x, p, d) {
	var rows = 4;
	var columns = 5;
	// creating link that have get objects
	document.writeln("<a href=\"members_order.php?desx=" + (id) + "&image=" + (x) + "&price=" + (p) + "&description=" + (d) + "\" target=\"openWindow()\"><div class=\"thumbnail\"><table class=\"thumbtable\">");
	for (var row = 0; row < rows; row++) {
		document.writeln("<tr class\"slicedimgtr\">");
		for (var col = 0; col < columns; col++) {
			document.writeln("<td>");
			document.writeln("<img class=\"slicedimgtd\" src='../images/bcpot00" + (x) + "_r" + (row + 1) + "_c" + (col + 1) + ".jpg' width=25px height=25px");
			document.writeln("</td>");
		}
		document.writeln("</tr>");
	}
	document.writeln("</table><div><h4>" + (d) + "</h4><span> </span><h4> $" + (p) + "</h4></div></div></a>  ");
}

// for slideshow & borders 
function showDivs(n) {
	var i;
	var pics = document.getElementsByClassName("pics");
	var thumbdiv = document.getElementsByClassName("thumb");
	if (n < 1) {
		slideIndex = pics.length
	}
	if (n > pics.length) {
		slideIndex = 1
	}
	for (i = 0; i < pics.length; i++) {
		// using display style none to hide images
		pics[i].style.display = "none";
		thumbdiv[i].setAttribute("style", "");
	}
	// setting display as block for image that need to be shown
	pics[slideIndex - 1].style.display = "block";
	thumbdiv[slideIndex - 1].setAttribute("style", "box-shadow: 0 4px 8px 0 rgb(0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px white solid;");
}

//function for opening new tab by closing if same tab already available
function openWindow() {
	if (thiswindow) {
		thiswindow.close();
	}
	var thiswindow = window.open("", thisIsTheWindow);
	return thiswindow;
}
