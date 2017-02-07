var xmlhttp;
xmlhttp=GetXmlHttpObject();
function GetXmlHttpObject(){
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
var hall_ref=["d1hall","newcse","oldcse1","oldcse2"];
var time_ref=["08:30:00","09:00:00","09:50:00","11:00:00","11:50:00","13:30:00","14:20:00","15:10:00","16:00:00"];
var day_ref=["monday","tuesday","wednesday","thursday","friday","saturday"];
var per=["test","I","II","III","IV","V","VI","VII","spcl"];


function loadLab(){
  for(var k=0;k<6;k++){

      if (xmlhttp==null)
      {
            alert ("Your browser does not support AJAX!");
            return;
      }
      var url="sample1.php";
      url=url+"?q="+day_ref[k];
     xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status == 200)
      {
        var myArr = JSON.parse(xmlhttp.responseText);
        labInner(myArr,day_ref[k]);
      }
  }

  xmlhttp.open("GET",url,false);
  xmlhttp.send(null);
  }
}

function labInner(arr,dayn){

  if(arr=="-1"){
    for(var i=0;i<9;i++){
      var butname=dayn.concat(i);

        document.getElementById(butname).className="box";
        document.getElementById(butname).disabled = true;

  }
  }else{

  for(var i=0;i<9;i++){
    var butname=dayn.concat(i);
    var periodid="period".concat(i);
    if(arr[i+2]==0){
      document.getElementById(butname).innerHTML="Free";
      document.getElementById(butname).setAttribute("perform", "book_lab.php");
      document.getElementById(butname).setAttribute("periodid",periodid);

    }
    else {
      document.getElementById(butname).className="blue";
      document.getElementById(butname).innerHTML="<span class='glyphicon glyphicon-object-align-bottom' aria-hidden='true'></span>";
      document.getElementById(butname).setAttribute("perform", "cancel_lab.php");
      document.getElementById(butname).setAttribute("periodid",periodid);

      }
    }
  }
}

function labCheck(e,dayn){

  var x=e.getAttribute("periodid");
  var action=e.getAttribute("perform");
  var hall=e.getAttribute("hall");
  var id=e.getAttribute("id");
  if(action=="book_lab.php")
  {
    labOp(id,dayn);
    e.className="blue";
    e.innerHTML="<span class='glyphicon glyphicon-object-align-bottom' aria-hidden='true'></span>";
    e.setAttribute("perform", "cancel_lab.php");

  }
  else{
  labOp(id,dayn);
    e.className="box";
    e.innerHTML="Free";
    e.setAttribute("perform", "book_lab.php");

  }
}
function labOp(y,dayn){
  var e=document.getElementById(y);
  var x=e.getAttribute("periodid");
  var action=e.getAttribute("perform");
  var xmlhttp=GetXmlHttpObject();

  if (xmlhttp==null)
   {
         alert ("Your browser does not support AJAX!");
         return;
   }
  var url=action;
  var parameters="dayn="+dayn+"&period="+x;
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
