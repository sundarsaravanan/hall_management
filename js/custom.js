

function GetXmlHttpObject()
{
    if (window.XMLHttpRequest)
    {
       return new XMLHttpRequest();
    }
    if (window.ActiveXObject)
    {
       return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}



function checkperiod(e){
  var x=e.getAttribute("periodid");
  var action=e.getAttribute("perform");
  var hall=e.getAttribute("hall");

var xmlhttp=GetXmlHttpObject();

if (xmlhttp==null)
 {
       alert ("Your browser does not support AJAX!");
       return;
 }
var url=action;
var parameters="period="+x+"&hall="+hall;

//alert(parameters);
xmlhttp.onreadystatechange=function(){
if (xmlhttp.readyState==4 && xmlhttp.status == 200)
{
}

}


xmlhttp.open("POST",url,true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", parameters .length);
xmlhttp.setRequestHeader("Connection", "close");
xmlhttp.send(parameters);

window.location="table.php";

}

function staff_per() {
  window.location.assign("staff_per.php")
}
