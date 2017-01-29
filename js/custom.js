function staff_per() {
  window.location.assign("staff_per.php")
}
function edit() {
  window.location.assign("lab.php")
}
function call_home() {
  window.location.assign("lab.php")
}
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

function bas(name1){
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

function basi(ar,halln,name1){
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
var a=localStorage.getItem('dateval');
 a=a.concat(" ");
 a=a.concat(time_ref[i]);
 a=new Date(a);
 a=a.getTime();


if(a<b | b+7200000>a){
  document.getElementById(butname).disabled = true;
  document.getElementById(butname).style = "opacity:0.5;";

}

    if(ar[i]=='0'){
      document.getElementById(butname).className="box";
      document.getElementById(butname).innerHTML="Free";
      document.getElementById(butname).setAttribute("perform", "book_period.php");
      document.getElementById(butname).setAttribute("time_ref", time_ref[i]);
      document.getElementById(butname).setAttribute("hall",halln);
      document.getElementById(butname).setAttribute("periodid",periodid);

    }
    else if(ar[i]=='2'){
      document.getElementById(butname).className="blue";
      document.getElementById(butname).innerHTML="<span class='glyphicon glyphicon-object-align-bottom' aria-hidden='true'></span>";
      document.getElementById(butname).disabled = true;
      document.getElementById(butname).setAttribute("time_ref", time_ref[i]);
      document.getElementById(butname).setAttribute("periodid",periodid);

    }
    else if(ar[i]==name1){
      document.getElementById(butname).className="green";
      document.getElementById(butname).innerHTML="<span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>";
      document.getElementById(butname).setAttribute("perform", "cancel_period.php");
      document.getElementById(butname).setAttribute("time_ref",time_ref[i]);
      document.getElementById(butname).setAttribute("hall",halln);
      document.getElementById(butname).setAttribute("periodid",periodid);

    }

    else{
      document.getElementById(butname).className="red";
      document.getElementById(butname).innerHTML="<span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>";
      document.getElementById(butname).disabled = true;
      document.getElementById(butname).setAttribute("time_ref",time_ref[i]);
      document.getElementById(butname).setAttribute("periodid",periodid);
      document.getElementById(butname).setAttribute("title","Booked by "+ar[i]);

    }



}
  }
}

function bas_lab(){
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
        basi1(myArr,day_ref[k]);
      }
  }

  xmlhttp.open("GET",url,false);
  xmlhttp.send(null);
  }
}

function basi1(arr,dayn){

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

function checkperiod(e,dayn){

  var x=e.getAttribute("periodid");
  var action=e.getAttribute("perform");
  var hall=e.getAttribute("hall");
  var id=e.getAttribute("id");
  if(action=="book_lab.php")
  {
    perop1(id,dayn);
    e.className="blue";
    e.innerHTML="<span class='glyphicon glyphicon-object-align-bottom' aria-hidden='true'></span>";
    e.setAttribute("perform", "cancel_lab.php");

  }
  else{
  perop1(id,dayn);
    e.className="box";
    e.innerHTML="Free";
    e.setAttribute("perform", "book_lab.php");

  }
}
function perop1(y,dayn){
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
function checkperiod1(e){


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
    perop(id,"0");
    e.className="green";
    e.innerHTML="<span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>";
    e.setAttribute("perform", "cancel_period.php");
  }
  if(room){
    perop(id,room);
    e.className="green";
    e.innerHTML="<span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>";
    e.setAttribute("perform", "cancel_period.php");
  }

  }
  else{
    perop(id);
    e.className="box";
    e.innerHTML="Free";
    e.setAttribute("perform", "book_period.php");

  }
}
function perop(y,roo){
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

var code,subname,year,section;

function home_form()
{

  code=document.getElementById("code").value;
var type_sel = document.getElementsByName("year");
for(var i = 0; i < type_sel.length; i++) {
		   if(type_sel[i].checked == true) {
		     	year = type_sel[i].value;
		   }
		 }
var type_sel = document.getElementsByName("section");

     		for(var i = 0; i < type_sel.length; i++) {
     		   if(type_sel[i].checked == true) {
     		      section = type_sel[i].value;
     		   }
     		 }
if(code){
    if(year){
      if(section){
        if (xmlhttp==null)
        {
              alert ("Your browser does not support AJAX!");
              return;
        }
        var url="set.php";
        url=url+"?code="+code+"&year="+year+"&section="+section;
        url=url+"&sid="+Math.random();
        xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status == 200)
        {
        }
        }
        xmlhttp.open("GET",url,true);
        xmlhttp.send(null);


        window.location="table.php";

      }
      }

  }
  else{
      alert("Enter all details");
  }



}

function datestore1(){
  var de=document.getElementById("datepicker").value;
  var sp=de.split("-");
  var d=sp[1]+"-"+sp[0]+"-"+sp[2];
  localStorage.setItem('dateval',d);
}


function update(){
  var pass=document.getElementById("pass_t").value;

  var conf=document.getElementById("conpass_t").value;

if(pass){

  if(conf){

    if(pass==conf ){
      if (xmlhttp==null)
       {
             alert ("Your browser does not support AJAX!");
             return;
       }
      var url="update.php";
      var parameters="pass="+pass+"&conf="+conf;
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
      alert("Updated Successfully");
      window.location="home.php";
      }
      else{
        alert("Passwords do not match");
      }
    }
  }
}



function bas2(name1){
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
        basi2(myArr,hall_ref[k],name1);
        }
  }


  xmlhttp.open("GET",url,false);
  xmlhttp.send(null);
  }


}

function basi2(ar,halln,name1){
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

function remarks(n) {
             if (xmlhttp==null)
              {
                    alert ("Your browser does not support AJAX!");
                    return;
              }
          var url="remarks.php";
          url=url+"?name="+n;
          xmlhttp.onreadystatechange=function(){
              if (xmlhttp.readyState==4 && xmlhttp.status == 200)
                {
                  var arr=JSON.parse(xmlhttp.responseText);
                  getRemarks(arr,n);
                }
          }
          xmlhttp.open("GET",url,true);
          xmlhttp.send(null);

}

function getRemarks(a) {
        for (var i=0;i<a.length;i++){
                var x=prompt("Remarks for '" +a[i][3]+ "' used on '"+a[i][1]+"' at '"+ a[i][2]+ "' period for '" +a[i][5]+"' year ' "+ a[i][6] +"' section");
                if(x){
                var url="remarksUpdate.php";
                url=url+"?remarks="+x+"&id="+a[i][0];
                xmlhttp.onreadystatechange=function(){
                    if (xmlhttp.readyState==4 && xmlhttp.status == 200)
                      {

                      }
                }
                xmlhttp.open("GET",url,true);
                xmlhttp.send(null);
        }
        }
}
