// JavaScript function that will display a confirm box listing all of the values of the input fields. At the bottom of the confirm box there should be a message that asks the user if the information is correct. If the information is correct then the confirm box is accepted with no further action. If the user selects cancel then the function that clears the Quantity and Total Price values should be called.
var errors = false;

// input item name function for a disabled form input
function itemname(d) {
	document.write("<input type=\"text\" name=\"thisName\" id=\"thisName\" value=\"" + (d) + "\" disabled>");
}

// input item price function for a disabled form input
function itemprice(p) {
	document.write("<input type=\"text\" name=\"thisPrice\" id=\"thisPrice\" value=\"" + (p) + "\" disabled>");
}

// checking Quantity on key press and update submit button based on quantity
function submitdis() {
	var Quantity = document.getElementById("thisQty").value;
	if (Quantity > 0 && Quantity != "" && Quantity % 1 == 0 && !Quantity.endsWith(".")) {
		document.getElementById("submitButton").disabled = false;
		calculateTotal();
	} else {
		document.getElementById("submitButton").disabled = true;
		document.getElementById('thisTotal').value = "00";
	}
}

// after submit popup menu that contain all the submmitted info
function showFormDetailsById() {
	var showThisForm = "You have ordered the following items\n\n";
	showThisForm += "Item: ";
	showThisForm += document.getElementById("thisName").value + "\n";
	showThisForm += "Qty: ";
	showThisForm += document.getElementById("thisQty").value + "\n";
	showThisForm += "Price: ";
	showThisForm += document.getElementById("thisPrice").value + "\n";
	showThisForm += "Total: ";
	showThisForm += document.getElementById("thisTotal").value + "\n";
	showThisForm += "\nIs this correct?";
	var val = confirm(showThisForm);
	if (val == true) {
		alert("Thank You for Your Order!");
		return true;
	}
	else {
		document.getElementById("submitButton").disabled = true;
		clearvalue();
		return false;
	}
}

//javascript function to clear value...
function clearvalue() {
	document.getElementById('thisQty').value = "";
	document.getElementById('thisTotal').value = "00";
}

//Javascript function to check errors and calulate total....
function checkOrder(theQty) {
	var errors = false;
	calculateTotal()
	var errorMsge = "";
	//var isItNum = isNaN(theQty);
	//alert(isItNum);
	if (isNaN(theQty)) {
		errors = true;
		errorMsge += "Quantity must be a number!\n";
	}
	if (theQty < 0) {
		errors = true;
		errorMsge += "Quantity cannot be a negative!\n";
	}
	if (parseInt(theQty) === 0) {
		errors = true;
		errorMsge += "Quantity cannot be a zero!\n";
	}
	if (theQty === null || theQty === "" || theQty === " ") {
		errors = true;
		errorMsge += "Quantity cannot be a blank!\n";
	}
	if (errors) {
		alert(errorMsge);
	}
	return errors;
}

//Javascript function to calculate total....
function calculateTotal() {

	var a = document.getElementById("thisQty").value;
	var b = document.getElementById("thisPrice").value;
	if (a == "" || a == " ") {
		document.getElementById("thisTotal").value = 00;
	} else {
		
	document.getElementById("thisTotal").value = +parseFloat(a) * parseFloat(b);
	}
	
}


