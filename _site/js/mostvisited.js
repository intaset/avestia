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
function mostVisited()
{
loadXMLDoc('mostvisited.txt',function()
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

var authorsOne = res[6];
var authorsTwo = res[8];
var authorsThree = res[10];
var authorsFour = res[12];
var authorsFive = res[14];


document.getElementById("mostVisited").innerHTML =
"<a href="+res[5]+">"+one[0]+"</a>" + "<br>" + 
authorsOne + "<br><div class='border'></div>" + 
"<a href="+res[7]+">"+two[0]+"</a>" + "<br>" +  
authorsTwo + "<br><div class='border'></div>" + 
"<a href="+res[9]+">"+three[0]+"</a>" + "<br>" + 
authorsThree + "<br><div class='border'></div>" + 
"<a href="+res[11]+">"+four[0]+"</a>" + "<br>" + 
authorsFour + "<br><div class='border'></div>" + 
"<a href="+res[13]+">"+five[0]+"</a>" + "<br>" + 
authorsFive;

    }
  });
}