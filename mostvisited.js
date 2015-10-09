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

var authorsOne = res[6];
var authorsTwo = res[8];
var authorsThree = res[10];


document.getElementById("mostVisited").innerHTML =
"<a href="+res[5]+" class='body-link'>"+one[0]+"</a><p class='body'>" + 
authorsOne + "</p>" + 
"<a href="+res[7]+" class='body-link'>"+two[0]+"</a><p class='body'>" +  
authorsTwo + "</p>" + 
"<a href="+res[9]+" class='body-link'>"+three[0]+"</a><p class='body'>" + 
authorsThree + "</p>";

    }
  });
}