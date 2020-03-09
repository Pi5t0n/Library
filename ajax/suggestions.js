function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      alert(this.responseText);
      //myObj=JSON.parse(this.responseText);
      //alert(Object.keys(myObj).length);
      var sugg="";
      fObject.keys(myObj).forEach(function(key){
          sugg=sugg+myObj[key].author+"<br>";
      })
      document.getElementById("livesearch").innerHTML=sugg;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","../DataBase/db_suggestion.php?q="+str,true);
  xmlhttp.send();
}