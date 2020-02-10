
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
     var cartForm=document.createElement("FORM"); //Form for cart shopping
     var containerParamDiv=document.createElement("DIV");//Div that contains title of params
        containerParamDiv.setAttribute("class","params-cart");
     var labelQuantiy=document.createElement("LABEL");//Label for quantity, only one
        labelQuantiy.innerHTML="Number of elements"
     var labelProduct=document.createElement("LABEL");//Label for Product, only one
        labelProduct.innerHTML="Book Title"
     var labelPrice=document.createElement("LABEL");//Label for Price, only one
        labelPrice.innerHTML="Unit Price (€)"
     var containerTotalDiv=document.createElement("DIV");//Div to calculate the total
     
    containerParamDiv.appendChild(labelQuantiy);
    containerParamDiv.appendChild(labelProduct);
    containerParamDiv.appendChild(labelPrice);
    
    
     var numBooksBought=myObj.length;
     var TotalPrice=0;
    
     for ( var i=0; i < numBooksBought; i++) { 
        var containerFormDiv=document.createElement("DIV"); //Div in Form that contains all inputs
        containerFormDiv.setAttribute("class","inputs-cart");
        var inputQuantiy = document.createElement("input");//New input for quantity
        inputQuantiy.value=myObj[i].qty_book;
        var addrestBooksForm=document.createElement("form");
            addrestBooksForm.setAttribute("method","post");
            addrestBooksForm.setAttribute("action","");
                var buttonAddBook=document.createElement("button");
                    buttonAddBook.setAttribute("type","submit");
                    buttonAddBook.setAttribute("name","book_to_cart");
                    buttonAddBook.setAttribute("value",myObj[i].book_ID);
                var buttonRestBook=document.createElement("button");
                    buttonRestBook.setAttribute("type","submit");
                    buttonRestBook.setAttribute("name","book_out_cart");
                    buttonRestBook.setAttribute("value",myObj[i].book_ID);
                var buttonRowDelete=document.createElement("button");
                    buttonRowDelete.setAttribute("type","submit");
                    buttonRowDelete.setAttribute("name","row_delete_cart");
                    buttonRowDelete.setAttribute("value",myObj[i].book_ID);
        var inputProduct = document.createElement("input");//New input for Product
        inputProduct.value=myObj[i].title;
        var inputDate = document.createElement("input");//New input for Price
        inputDate.value=myObj[i].unit_price;
            TotalPrice=TotalPrice+parseFloat(myObj[i].unit_price)*parseInt(myObj[i].qty_book);
        containerFormDiv.appendChild(inputQuantiy);
        buttonAddBook.innerHTML="One More!"
        buttonRestBook.innerHTML="Rest One!"
        buttonRowDelete.innerHTML="Delete Entry!"
        addrestBooksForm.appendChild(buttonAddBook);
        addrestBooksForm.appendChild(buttonRestBook);
        addrestBooksForm.appendChild(buttonRowDelete);
        containerFormDiv.appendChild(addrestBooksForm);
        containerFormDiv.appendChild(inputProduct);
        containerFormDiv.appendChild(inputDate);
        cartForm.appendChild(containerFormDiv);
     }
    
    document.getElementById("cartSection").appendChild(sectionTitle);
    document.getElementById("cartSection").appendChild(containerParamDiv);
    document.getElementById("cartSection").appendChild(cartForm);
    if(numBooksBought>0){//If to know if I have to calculate the total.
        var containerTotal=document.createElement("DIV");//Div that will containt the total
        var totalValue=document.createElement("P");
        totalValue.innerHTML="Total: "+TotalPrice+"€";
        var buttonCalculateTotal=document.createElement("button");
            buttonCalculateTotal.setAttribute("type","submit");
            buttonCalculateTotal.setAttribute("name","buy_all");
            buttonCalculateTotal.setAttribute("onclick","buybooks()");
            buttonCalculateTotal.setAttribute("value",myObj[0].member_ID);
            buttonCalculateTotal.innerHTML="Buy books!"
        containerTotal.appendChild(totalValue);
        containerTotal.appendChild(buttonCalculateTotal);
        document.getElementById("cartSection").appendChild(containerTotal);
    }    
}
function buybooks(){
    var xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //var myObj = JSON.parse(this.responseText);
            //alert("Thanks for your bought!");
            //alert(myObj.length);
            alert(this.responseText);
            //document.getElementById("cartSection").innerHTML = myObj[2].book_ID;
            //document.getElementById("cartSection").innerHTML = myObj.length;
        }
    };
    xmlhttp2.open("GET", "../DataBase/db_set_order.php", true);
    xmlhttp2.send();
}