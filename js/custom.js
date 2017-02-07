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

function datestore1(){
var from = $("#datepicker").val().split("-");
var f = new Date(from[2], from[1] - 1, from[0]);
  localStorage.setItem('dateval',String(f));
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
