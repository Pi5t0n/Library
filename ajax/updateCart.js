function updateUserCart(){
    //alert(localStorage.length);
    document.getElementById("login_register").style.visibility = "hidden";
        document.getElementById("login_register").style.marginBottom = "0vh";
        document.getElementById("login_register").style.marginTop = "0vh";
    
    var xmlhttp = new XMLHttpRequest();
    if(localStorage.length>0){
        for(i=0; i<localStorage.length; i++){
            xmlhttp.open('GET', '../DataBase/db_guest_to_user_cart.php?values='+localStorage.key(i)+','+localStorage.getItem(localStorage.key(i)), false);
            xmlhttp.send(null);            
            if (xmlhttp.status === 200) {
             alert(xmlhttp.responseText);
            }
        }
    }
    localStorage.clear();
}