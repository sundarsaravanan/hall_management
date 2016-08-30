function staff_per() {
  window.location.assign("staff_per.php")
}

function edit() {
  window.location.assign("lab.php")
}


var xmlhttp;
xmlhttp=GetXmlHttpObject();
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

var hall_ref=["d1hall","oldcse","newcse","movable"];
var time_ref=["08:30","09:00","09:50","11:00","11:50","13:30","14:20","15:10","16:00"];


function basi(ar,halln,name1){
  if(ar=="-1"){
    for(var i=0;i<9;i++){
      var butname=halln.concat(i);

        document.getElementById(butname).className="box";
        document.getElementById(butname).innerHTML="-";
        document.getElementById(butname).disabled = true;

  }
}else{

  for(var i=0;i<9;i++){
    var butname=halln.concat(i);
    var periodid="period".concat(i);
    if(ar[i+2]=='0'){
      document.getElementById(butname).className="box";
      document.getElementById(butname).innerHTML="Free";
      document.getElementById(butname).setAttribute("perform", "book_period.php");
      document.getElementById(butname).setAttribute("time_ref", time_ref[i]);
      document.getElementById(butname).setAttribute("hall",halln);
      document.getElementById(butname).setAttribute("periodid",periodid);

    }
    else if(ar[i+2]=='1'){
      document.getElementById(butname).className="blue";
      document.getElementById(butname).innerHTML="Lab Hour";
      document.getElementById(butname).disabled = true;
      document.getElementById(butname).setAttribute("time_ref", time_ref[i]);
      document.getElementById(butname).setAttribute("periodid",periodid);

    }
else if(ar[i+2]==name1){
  document.getElementById(butname).className="green";
  document.getElementById(butname).innerHTML="Allotted";
  document.getElementById(butname).setAttribute("perform", "cancel_period.php");
  document.getElementById(butname).setAttribute("time_ref",time_ref[i]);
  document.getElementById(butname).setAttribute("hall",halln);
  document.getElementById(butname).setAttribute("periodid",periodid);

}

    else{
      document.getElementById(butname).className="red";
      document.getElementById(butname).innerHTML="Booked by <br>"+ar[i+2];
      document.getElementById(butname).disabled = true;
      document.getElementById(butname).setAttribute("time_ref",time_ref[i]);
      document.getElementById(butname).setAttribute("periodid",periodid);

    }


  }
}
}


function bas(name1)
{
  for(var k=0;k<4;k++){

      if (xmlhttp==null)
      {
            alert ("Your browser does not support AJAX!");
            return;
      }
var url="sample.php";
url=url+"?q="+hall_ref[k];
xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status == 200)
      {
        var myArr = JSON.parse(xmlhttp.responseText);
        basi(myArr,hall_ref[k],name1);
      }
}


xmlhttp.open("GET",url,false);
xmlhttp.send(null);
}
}






function checkperiod(e){
  var x=e.getAttribute("periodid");
  var action=e.getAttribute("perform");
  var hall=e.getAttribute("row_name");

var xmlhttp=GetXmlHttpObject();

if (xmlhttp==null)
 {
       alert ("Your browser does not support AJAX!");
       return;
 }
var url=action;
var parameters="period="+x+"&row_name="+hall;
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

window.location="lab.php";

}



function checkperiod1(e){


  var x=e.getAttribute("periodid");
  var action=e.getAttribute("perform");
  var hall=e.getAttribute("hall");
  var id=e.getAttribute("id");
  if(action=="book_period.php")
  {
    perop(id);
    e.className="green";
    e.innerHTML="Allotted";
    e.setAttribute("perform", "cancel_period.php");

  }
  else{
    perop(id);
    e.className="box";
    e.innerHTML="Free";
    e.setAttribute("perform", "book_period.php");

  }
}


function perop(y){
  var e=document.getElementById(y);
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


}
