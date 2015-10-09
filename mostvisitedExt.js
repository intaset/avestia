var xmlhttp;
function loadXMLDoc(url,cfunc)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=cfunc;
xmlhttp.open("GET",url,true);
xmlhttp.send();
}
function mostVisitedExt()
{
loadXMLDoc('mostvisitedExt.txt',function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var txt=xmlhttp.responseText;
    
    
    var res = txt.split('"');

var one = res[0].split(" - ");
var two = res[1].split(" - ");
var three = res[2].split(" - ");
var four = res[3].split(" - ");
var five = res[4].split(" - ");
var six = res[5].split(" - ");
var seven = res[6].split(" - ");
var eight = res[7].split(" - ");
var nine = res[8].split(" - ");
var ten = res[9].split(" - ");


var authorsOne = res[11];
var authorsTwo = res[13];
var authorsThree = res[15];
var authorsFour = res[17];
var authorsFive = res[19];
var authorsSix = res[21];
var authorsSeven = res[23];
var authorsEight = res[25];
var authorsNine = res[27];
var authorsTen = res[29];


document.getElementById("mostVisitedExt").innerHTML =
"<ul class='jrecent'><a href="+res[10]+" class='body-link'>"+one[0]+"</a><p class='body'>" + 
authorsOne + "</p></ul>" + 
"<ul class='jrecent'><a href="+res[12]+" class='body-link'>"+two[0]+"</a><p class='body'>" +  
authorsTwo + "</p></ul>" + 
"<ul class='jrecent'><a href="+res[14]+" class='body-link'>"+three[0]+"</a><p class='body'>" + 
authorsThree + "</p></ul>" +
"<ul class='jrecent'><a href="+res[16]+" class='body-link'>"+four[0]+"</a><p class='body'>" + 
authorsFour + "</p></ul>" +
"<ul class='jrecent'><a href="+res[18]+" class='body-link'>"+five[0]+"</a><p class='body'>" + 
authorsFive + "</p></ul>" +
"<ul class='jrecent'><a href="+res[20]+" class='body-link'>"+six[0]+"</a><p class='body'>" + 
authorsSix + "</p></ul>" +
"<ul class='jrecent'><a href="+res[22]+" class='body-link'>"+seven[0]+"</a><p class='body'>" + 
authorsSeven + "</p></ul>" +
"<ul class='jrecent'><a href="+res[24]+" class='body-link'>"+eight[0]+"</a><p class='body'>" + 
authorsEight + "</p></ul>" +
"<ul class='jrecent'><a href="+res[26]+" class='body-link'>"+nine[0]+"</a><p class='body'>" + 
authorsNine + "</p></ul>" +
"<ul class='jrecent'><a href="+res[28]+" class='body-link'>"+ten[0]+"</a><p class='body'>" + 
authorsTen + "</p></ul>";

    }
  });
}