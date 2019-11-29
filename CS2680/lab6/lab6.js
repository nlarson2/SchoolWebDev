alert("NICKOLAS LARSON");
var firstNum = prompt("Insert a number", '1');
var secNum = prompt("Insert second number",'1');
var product = firstNum * secNum; 
//document.write("<h2>The product of " + firstNum + " * " + secNum + " is " + product + ". </h2>");
var elm_rslt = document.getElementById("result");
elm_rslt.innerHTML = "The product of " + firstNum + " * " + secNum + " is " + product + ".";
