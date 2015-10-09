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


var authorsOne = res[6];
var authorsTwo = res[8];
var authorsThree = res[10];
var authorsFour = res[12];
var authorsFive = res[14];
var authorsSix = res[16];
var authorsSeven = res[18];
var authorsEight = res[20];
var authorsNine = res[22];
var authorsTen = res[24];


document.getElementById("mostVisitedExt").innerHTML =
"<ul class='jrecent'><a href="+res[5]+" class='body-link'>"+one[0]+"</a><p class='body'>" + 
authorsOne + "</p></ul>" + 
"<ul class='jrecent'><a href="+res[7]+" class='body-link'>"+two[0]+"</a><p class='body'>" +  
authorsTwo + "</p></ul>" + 
"<ul class='jrecent'><a href="+res[9]+" class='body-link'>"+three[0]+"</a><p class='body'>" + 
authorsThree + "</p></ul>" +
"<ul class='jrecent'><a href="+res[11]+" class='body-link'>"+four[0]+"</a><p class='body'>" + 
authorsFour + "</p></ul>" +
"<ul class='jrecent'><a href="+res[13]+" class='body-link'>"+five[0]+"</a><p class='body'>" + 
authorsFive + "</p></ul>" +
"<ul class='jrecent'><a href="+res[15]+" class='body-link'>"+six[0]+"</a><p class='body'>" + 
authorsSix + "</p></ul>" +
"<ul class='jrecent'><a href="+res[17]+" class='body-link'>"+seven[0]+"</a><p class='body'>" + 
authorsSeven + "</p></ul>" +
"<ul class='jrecent'><a href="+res[19]+" class='body-link'>"+eight[0]+"</a><p class='body'>" + 
authorsEight + "</p></ul>" +
"<ul class='jrecent'><a href="+res[21]+" class='body-link'>"+nine[0]+"</a><p class='body'>" + 
authorsNine + "</p></ul>" +
"<ul class='jrecent'><a href="+res[23]+" class='body-link'>"+ten[0]+"</a><p class='body'>" + 
authorsTen + "</p></ul>";

    }
  });
}