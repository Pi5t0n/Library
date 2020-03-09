function showCartGuestCookie(type){
   var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            generateCartCookie(myObj,type);
        }
    };
    if(type=="session"){
        //alert("session");
        xmlhttp.open("GET", "../DataBase/db_add_book_cart_session.php", true);
        xmlhttp.send();
    }else if(type=="cookie"){
        //alert("cookie");
        xmlhttp.open("GET", "../DataBase/db_add_book_cart_cookie.php", true);
        xmlhttp.send();
    }
   
}

function generateCartCookie(myObj,type){
   
     var sectionTitle=document.createElement("H2"); //Title
        if(type=="session"){
            sectionTitle.innerHTML="Your Cart (Session)!";
        }else if(type=="cookie"){
            sectionTitle.innerHTML="Your Cart (Cookie)!";
        }
     var cartTable=document.createElement("TABLE"); //Table for cart shopping
        cartTable.setAttribute("class","table table-dark");
     var cartTableHeader=document.createElement("TR");//TR for header
     var THQuantiy=document.createElement("TH");//Label for quantity, only one
        THQuantiy.innerHTML="Number of elements";
     var THProduct=document.createElement("TH");//Label for Product, only one
        THProduct.innerHTML="Book Title"
     var THPrice=document.createElement("TH");//Label for Price, only one
        THPrice.innerHTML="Unit Price (€)";
    /*var THActions=document.createElement("TH");//Label for Price, only one
        THActions.innerHTML="Elements Actions";*/

    cartTableHeader.appendChild(THQuantiy);
    cartTableHeader.appendChild(THProduct);
    cartTableHeader.appendChild(THPrice);
    //cartTableHeader.appendChild(THActions);
    cartTable.appendChild(cartTableHeader);
    
    
     //var numBooksBought=myObj.length;
     //var numBooksBought=Object.keys(myObj).length;
    var TotalPrice=0;
    
     Object.keys(myObj).forEach(function(key){
        //var containerFormDiv=document.createElement("DIV"); //Div in Form that contains all inputs
        //containerFormDiv.setAttribute("class","inputs-cart");
        var newRowCart = document.createElement("TR");//TR for new element
         
        var TDQuantiy = document.createElement("TD");//New TD for quantity
        TDQuantiy.innerHTML=myObj[key].quantity;
                
        var TDProduct = document.createElement("TD");//New TD for Product
        TDProduct.innerHTML=myObj[key].title;
         
        var TDDate = document.createElement("TD");//New TD for Price
        TDDate.innerHTML=myObj[key].unit_price;
        TotalPrice=TotalPrice+parseFloat(myObj[key].unit_price)*parseInt(myObj[key].quantity);
         
        var TDActions = document.createElement("TD");//New TD for Price
        var TDActionsForm=document.createElement("FORM");
            TDActionsForm.setAttribute("method","post");
            TDActionsForm.setAttribute("action","");
         
         newRowCart.appendChild(TDQuantiy);
         newRowCart.appendChild(TDProduct);
         newRowCart.appendChild(TDDate);
         //newRowCart.appendChild(TDActions);
         
         cartTable.appendChild(newRowCart);
     })
    
    document.getElementById("cartSection").appendChild(sectionTitle);
    document.getElementById("cartSection").appendChild(cartTable);
    
}