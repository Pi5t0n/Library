function showCartGuest(){
    keys = Object.keys(localStorage),
    numGestValues = keys.length;
    //alert(numGestValues);
    //alert(numGestValues);
    generateCartGuest(numGestValues);
}

function saveBookLocalStorage(bookID){
    var qty=1;
    if(localStorage.getItem(bookID)!=null){
        qty=parseInt(localStorage.getItem(bookID));
        qty+=1;
        localStorage.setItem(bookID,qty);
    }else localStorage.setItem(bookID,qty);
    
   
   // alert(localStorage.key(0));

}

function generateCartGuest(numGestValues){
     var sectionTitle=document.createElement("H2"); //Title
        sectionTitle.innerHTML="Your Cart!"
     var cartTable=document.createElement("TABLE"); //Table for cart shopping
        cartTable.setAttribute("class","table table-dark")
     var cartTableHeader=document.createElement("TR");//TR for header
     var THQuantiy=document.createElement("TH");//Label for quantity, only one
        THQuantiy.innerHTML="Number of elements"
     var THProduct=document.createElement("TH");//Label for Product, only one
        THProduct.innerHTML="Book Title"
     var THPrice=document.createElement("TH");//Label for Price, only one
        THPrice.innerHTML="Unit Price (€)";

    cartTableHeader.appendChild(THQuantiy);
    cartTableHeader.appendChild(THProduct);
    cartTableHeader.appendChild(THPrice);
    cartTable.appendChild(cartTableHeader);
    
    
     var TotalPrice=0;
     var xmlhttp = new XMLHttpRequest();
    
     for ( var i=0; i < numGestValues; i++) { 
        var myObj=getBookInfo(localStorage.key(i));
        //var myObj2=returnedValue;
        //alert(myObj[0].title+" "+myObj[0].author);
        //alert(myObj.title+" "+myObj.author);
        
         
        var newRowCart = document.createElement("TR");//TR for new element
         
        var TDQuantiy = document.createElement("TD");//New TD for quantity
        TDQuantiy.innerHTML=localStorage.getItem(localStorage.key(i));
                
        var TDProduct = document.createElement("TD");//New TD for Product
        //TDProduct.innerHTML=myObj[0].title;
        TDProduct.innerHTML=myObj.title;
         
        var TDDate = document.createElement("TD");//New TD for Price
        //TDDate.innerHTML=myObj[0].unit_price;
        TDDate.innerHTML=myObj.unit_price;
        //TotalPrice=TotalPrice+parseFloat(myObj[0].unit_price)*parseInt(localStorage.getItem(localStorage.key(i)));
        TotalPrice=TotalPrice+parseFloat(myObj.unit_price)*parseInt(localStorage.getItem(localStorage.key(i)));
         
        var TDActions = document.createElement("TD");//New TD for Price
         
         newRowCart.appendChild(TDQuantiy);
         newRowCart.appendChild(TDProduct);
         newRowCart.appendChild(TDDate);
         newRowCart.appendChild(TDActions);
         
         cartTable.appendChild(newRowCart);
         returnedValue=null;
     }
    
    if(numGestValues>0){//If to know if I have to calculate the total.
        var TotalRow = document.createElement("TR");//TR for new element
        var TDTotalLabel=document.createElement("TD");//TD that will containt the total
        var TDTotalValue=document.createElement("TD");
        
        TDTotalLabel.innerHTML="Total:";
        TDTotalValue.innerHTML=""+TotalPrice+"€";
        
        TotalRow.appendChild(TDTotalLabel);
        TotalRow.appendChild(TDTotalValue);
                
        cartTable.appendChild(TotalRow);
        
        document.getElementById("cartSection").appendChild(sectionTitle);
        document.getElementById("cartSection").appendChild(cartTable);
    } 
}
    
    
    function getBookInfo(book_ID){    
        /*var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myObj= JSON.parse(this.responseText);
                //JSON.parse(this.responseText);
                //callBackFunction(myObj);
                return myObj;
            }
        };
        xmlhttp.open("GET", "../DataBase/db_add_book_cart_localstorage.php?book_id=" + book_ID, false);
        xmlhttp.send();*/
        var request = new XMLHttpRequest();
        request.open('GET', '../DataBase/db_add_book_cart_localstorage.php?book_id=' + book_ID, false);  // `false` makes the request synchronous
        request.send(null);

        if (request.status === 200) {
            //alert(request.responseText);
            return JSON.parse(request.responseText);
        }
    }


