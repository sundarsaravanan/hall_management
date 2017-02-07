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



function loadAvailability(name1){
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
        availInner(myArr,hall_ref[k],name1);
        }
  }


  xmlhttp.open("GET",url,false);
  xmlhttp.send(null);
  }


}

function availInner(ar,halln,name1){
  var b=new Date();
 b=b.getTime();
  if(ar=="-1"){
    for(var i=0;i<9;i++){
      var butname=halln.concat(i);
        document.getElementById(butname).className="box";
        document.getElementById(butname).disabled = true;

    }
  }else{
  for(var i=0;i<9;i++){
    var butname=halln.concat(i);
    var periodid=per[i];


    if(ar[i]=='0'){
      document.getElementById(butname).className="box";
      document.getElementById(butname).innerHTML="Free";
      document.getElementById(butname).disabled = true;

    }
    else if(ar[i]=='2'){
      document.getElementById(butname).className="blue";
      document.getElementById(butname).innerHTML="<span class='glyphicon glyphicon-object-align-bottom' aria-hidden='true'></span>";
      document.getElementById(butname).disabled = true;

    }
    else if(ar[i]==name1){
      document.getElementById(butname).className="green";
      document.getElementById(butname).innerHTML="<span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>";
      document.getElementById(butname).disabled = true;

    }

    else{
      document.getElementById(butname).className="red";
      document.getElementById(butname).innerHTML="<span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>";
      document.getElementById(butname).disabled = true;
      document.getElementById(butname).setAttribute("title","Booked by "+ar[i]);


    }



}
  }
}

function availCheck(e){


  var x=e.getAttribute("periodid");
  var action=e.getAttribute("perform");
  var hall=e.getAttribute("hall");
  var id=e.getAttribute("id");

  if(action=="book_period.php")
  {

    if(hall=="movable"){
    var room=prompt("Enter Hall Number");
  }
  else{
    availOp(id,"0");
    e.className="green";
    e.innerHTML="<span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>";
    e.setAttribute("perform", "cancel_period.php");
  }
  if(room){
    availOp(id,room);
    e.className="green";
    e.innerHTML="<span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>";
    e.setAttribute("perform", "cancel_period.php");
  }

  }
  else{
    availOp(id);
    e.className="box";
    e.innerHTML="Free";
    e.setAttribute("perform", "book_period.php");

  }
}
function availOp(y,roo){
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
  var parameters="period="+x+"&hall="+hall+"&room="+roo;
  xmlhttp.onreadystatechange=function(){
  if (xmlhttp.readyState==4 && xmlhttp.status == 200)
  {
    var re=xmlhttp.responseText;
    if(re=="same"){
      e.className="red";
      e.innerHTML="<span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>";
      e.disabled = true;
      alert("It was booked by another staff at same time.");
      }
    if(action=="book_period.php"){
            alert("Booked Successfully");
    }
    if(action=="cancel_period.php"){
            alert("Cancelled");
    }
    }
  }


  xmlhttp.open("POST",url,true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.setRequestHeader("Content-length", parameters .length);
  xmlhttp.setRequestHeader("Connection", "close");
  xmlhttp.send(parameters);

}
