
function showCart(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            //document.getElementById("cartSection").innerHTML = myObj[2].book_ID;
            //document.getElementById("cartSection").innerHTML = myObj.length;
            generateCart(myObj);
        }
    };
    xmlhttp.open("GET", "../DataBase/db_show_cart.php", true);
    xmlhttp.send();
}
function generateCart(myObj){
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
    var THActions=document.createElement("TH");//Label for Price, only one
        THActions.innerHTML="Elements Actions";

    cartTableHeader.appendChild(THQuantiy);
    cartTableHeader.appendChild(THProduct);
    cartTableHeader.appendChild(THPrice);
    cartTableHeader.appendChild(THActions);
    cartTable.appendChild(cartTableHeader);
    
    
     var numBooksBought=myObj.length;
     var TotalPrice=0;
    
     for ( var i=0; i < numBooksBought; i++) { 
        //var containerFormDiv=document.createElement("DIV"); //Div in Form that contains all inputs
        //containerFormDiv.setAttribute("class","inputs-cart");
        var newRowCart = document.createElement("TR");//TR for new element
         
        var TDQuantiy = document.createElement("TD");//New TD for quantity
        TDQuantiy.innerHTML=myObj[i].qty_book;
                
        var TDProduct = document.createElement("TD");//New TD for Product
        TDProduct.innerHTML=myObj[i].title;
         
        var TDDate = document.createElement("TD");//New TD for Price
        TDDate.innerHTML=myObj[i].unit_price;
        TotalPrice=TotalPrice+parseFloat(myObj[i].unit_price)*parseInt(myObj[i].qty_book);
         
        var TDActions = document.createElement("TD");//New TD for Price
        var TDActionsForm=document.createElement("FORM");
            TDActionsForm.setAttribute("method","post");
            TDActionsForm.setAttribute("action","");
        var buttonAddBook=document.createElement("button");
                    buttonAddBook.setAttribute("type","submit");
                    buttonAddBook.setAttribute("name","book_to_cart");
                    buttonAddBook.setAttribute("value",myObj[i].book_ID);
                    buttonAddBook.innerHTML="One More!"
                var buttonRestBook=document.createElement("button");
                    buttonRestBook.setAttribute("type","submit");
                    buttonRestBook.setAttribute("name","book_out_cart");
                    buttonRestBook.setAttribute("value",myObj[i].book_ID);
                    buttonRestBook.innerHTML="Rest One!"
                var buttonRowDelete=document.createElement("button");
                    buttonRowDelete.setAttribute("type","submit");
                    buttonRowDelete.setAttribute("name","row_delete_cart");
                    buttonRowDelete.setAttribute("value",myObj[i].book_ID);
                    buttonRowDelete.innerHTML="Delete Entry!"
         TDActionsForm.appendChild(buttonAddBook);
         TDActionsForm.appendChild(buttonRestBook);
         TDActionsForm.appendChild(buttonRowDelete);
         TDActions.appendChild(TDActionsForm);
         
         newRowCart.appendChild(TDQuantiy);
         newRowCart.appendChild(TDProduct);
         newRowCart.appendChild(TDDate);
         newRowCart.appendChild(TDActions);
         
         cartTable.appendChild(newRowCart);
     }
    
    document.getElementById("cartSection").appendChild(sectionTitle);
    
    if(numBooksBought>0){//If to know if I have to calculate the total.
        var TotalRow = document.createElement("TR");//TR for new element
        var TDTotalLabel=document.createElement("TD");//TD that will containt the total
        var TDTotalValue=document.createElement("TD");
        
        TDTotalLabel.innerHTML="Total:";
        TDTotalValue.innerHTML=""+TotalPrice+"€";
        
        var buttonBuyAll=document.createElement("button");
            buttonBuyAll.setAttribute("type","submit");
            buttonBuyAll.setAttribute("name","buy_all");
            buttonBuyAll.setAttribute("onclick","buybooks()");
            buttonBuyAll.setAttribute("value",myObj[0].member_ID);
            buttonBuyAll.innerHTML="Buy books!"
        
        TotalRow.appendChild(TDTotalLabel);
        TotalRow.appendChild(TDTotalValue);
        TotalRow.appendChild(buttonBuyAll);
        
        cartTable.appendChild(TotalRow);
        
        document.getElementById("cartSection").appendChild(cartTable);
    }    
}
function buybooks(){
    var xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //var myObj = JSON.parse(this.responseText);
            //alert("Thanks for your bought!");
            //alert(myObj.length);
            alert("All bought!");
            location.reload();
            //document.getElementById("cartSection").innerHTML = myObj[2].book_ID;
            //document.getElementById("cartSection").innerHTML = myObj.length;
        }
    };
    xmlhttp2.open("GET", "../DataBase/db_set_order.php", true);
    xmlhttp2.send();
}