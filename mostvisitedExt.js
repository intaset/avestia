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
    
    
    var res = txt.split(' - ');

/*var one = res[0].split(" - ");
var two = res[1].split(" - ");
var three = res[2].split(" - ");
var four = res[3].split(" - ");
var five = res[4].split(" - ");

var authorsOne = res[6];
var authorsTwo = res[8];
var authorsThree = res[10];
var authorsFour = res[12];
var authorsFive = res[14];
*/

document.getElementById("mostVisitedExt").innerHTML =
"<ul class='jrecent'><div class='jname'><p class='body'>"+res[0]+"</p></div><div class='jcontent'><a href=http://"+res[0]+".avestia.com"+res[20]+" class='body-link' target='_blank'>"+res[1]+"</a><p class='body'>" + res[21] + "</p></div></ul>" 

+ 

"<ul class='jrecent'><div class='jname'><p class='body'>"+res[2]+"</p></div><div class='jcontent'><a href=http://"+res[2]+".avestia.com"+res[22]+" class='body-link' target='_blank'>"+res[3]+"</a><p class='body'>" + res[23] + "</p></div></ul>" 

+ 

"<ul class='jrecent'><div class='jname'><p class='body'>"+res[4]+"</p></div><div class='jcontent'><a href=http://"+res[4]+".avestia.com"+res[24]+" class='body-link' target='_blank'>"+res[5]+"</a><p class='body'>" + res[25] + "</p></div></ul>" 

+ 

"<ul class='jrecent'><div class='jname'><p class='body'>"+res[6]+"</p></div><div class='jcontent'><a href=http://"+res[6]+".avestia.com"+res[26]+" class='body-link' target='_blank'>"+res[7]+"</a><p class='body'>" + res[27] + "</p></div></ul>" 

+ 

"<ul class='jrecent'><div class='jname'><p class='body'>"+res[8]+"</p></div><div class='jcontent'><a href=http://"+res[8]+".avestia.com"+res[28]+" class='body-link' target='_blank'>"+res[9]+"</a><p class='body'>" + res[29] + "</p></div></ul>" 

+ 

"<ul class='jrecent'><div class='jname'><p class='body'>"+res[10]+"</p></div><div class='jcontent'><a href=http://"+res[10]+".avestia.com"+res[30]+" class='body-link' target='_blank'>"+res[11]+"</a><p class='body'>" + res[31] + "</p></div></ul>" 

+ 

"<ul class='jrecent'><div class='jname'><p class='body'>"+res[12]+"</p></div><div class='jcontent'><a href=http://"+res[12]+".avestia.com"+res[32]+" class='body-link' target='_blank'>"+res[13]+"</a><p class='body'>" + res[33] + "</p></div></ul>" 

+ 

"<ul class='jrecent'><div class='jname'><p class='body'>"+res[14]+"</p></div><div class='jcontent'><a href=http://"+res[14]+".avestia.com"+res[34]+" class='body-link' target='_blank'>"+res[15]+"</a><p class='body'>" + res[35] + "</p></div></ul>" 

+ 

"<ul class='jrecent'><div class='jname'><p class='body'>"+res[16]+"</p></div><div class='jcontent'><a href=http://"+res[16]+".avestia.com"+res[36]+" class='body-link' target='_blank'>"+res[17]+"</a><p class='body'>" + res[37] + "</p></div></ul>"

+ 

"<ul class='jrecent'><div class='jname'><p class='body'>"+res[18]+"</p></div><div class='jcontent'><a href=http://"+res[18]+".avestia.com"+res[38]+" class='body-link' target='_blank'>"+res[19]+"</a><p class='body'>" + res[39] + "</p></div></ul>";

    }
  });
}