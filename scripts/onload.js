// for members order that will get the info from url and build item image as table
window.onload = function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id = urlParams.get('desx');
    const x = urlParams.get('image');
    const price = urlParams.get('price');
    const des = urlParams.get('description');
    var rows = 4;
    var columns = 5;
    var myarray = new Array(rows);
    for (i = 0; i < rows; i++) {
        myarray[i] = new Array(columns)
    }
    //Image Objects Preloading
    for (var row = 0; row < rows; row++) {
        for (var col = 0; col < columns; col++) {
             //using image object
            myarray[row][col] = new Image();
            myarray[row][col].src = "../images/bcpot00" + (x) + "_r" + (row + 1) + "_c" + (col + 1) + ".jpg";
        }
    }
    // adding sliced images together in table
    var div = document.createElement("div");
    div.classList.add("Enlargeimage")
    var table = document.createElement('table');
    div.appendChild(table)
    document.getElementById("slicedimage").appendChild(div);
     // adding slicedimage in div
    for (var row = 0; row < rows; row++) {
        var tr = document.createElement("tr")
        for (var col = 0; col < columns; col++) {
            var td = document.createElement("td");
            td.innerHTML = "<img src=" + myarray[row][col].src + ">";
            tr.appendChild(td);
            table.appendChild(tr);
        }
    }
    // add page header 
    document.getElementById("itemdes").innerHTML = "<h2 id='des'>" + des + "</h2>";
    document.getElementById("hiddenid").innerHTML = "<input type=\"hidden\" name=\"thisid\" id=\"thisid\" value=\"" + id + "\" readonly>";
    // input form Item description
    document.getElementById("inputdes").innerHTML = "<input type=\"text\" name=\"thisName\" id=\"thisName\" value=\"" + des + "\" readonly>"
    // input form Price
    document.getElementById("inputprice").innerHTML = "<input type=\"text\" name=\"thisPrice\" id=\"thisPrice\" value=\"" + price + "\" readonly>"
}
