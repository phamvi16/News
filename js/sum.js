$(".add_to_cart_button").click(function() {
    var button = $(this);
    var id = button.attr("data-product_id");
    var quantity = button.attr("data-quantity");
    var name = $(this).parent().parent().find('a')[0].innerHTML;
    var price = $(this).parent().parent().find('ins').text();

    var item = {
        id: id,
        name: name,
        quantity: quantity,
        price: price
    };
    var shoppingCartItems;
    
    if(sessionStorage["cart-items"] != null) {
        var exits = false;
        shoppingCartItems = JSON.parse(sessionStorage["cart-items"].toString());       
        $.each(shoppingCartItems,function(index,value){
            if(value.name == item.name) {
                value.quantity++;
                exits = true;
                return false;
            }
        })    
        if(!exits) {
            shoppingCartItems.push(item);
        }   
    }
    else 
    {
        shoppingCartItems = new Array(item);
    }
    
    sessionStorage["cart-items"] = JSON.stringify(shoppingCartItems);
    console.log(JSON.parse(sessionStorage["cart-items"].toString()));
})	
function tinh()
{
        
    var dongia = document.getElementById("dongia");
    var soluong = document.getElementById("soluong");
    var result = document.getElementById("result");
 	var tong = dongia.value * soluong.value;			
    if (!isNaN(tong))
        {
            result.value = tong;
        }
}