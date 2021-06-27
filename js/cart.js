$(".add_to_cart_button").click(addItemToCart);

$(document).on("click","input[class='minus']", function(e){
    addOrRemoveItem(e, this, -1);
});

$(document).on("click","input[class='plus']", function(e){
    addOrRemoveItem(e, this, 1);
});

function addItemToCart() {
    // debugger
    var button = $(this);
    var id = button.attr("data-product_id");
    var quantity = button.attr("data-quantity");

    var name = $(this).parent().parent().find('a')[0].innerHTML;
    var price = $(this).parent().parent().find('ins').text();
    var img = $(this).parent().parent().find('img')[0].src
    var item = {
        id: id,
        name: name,
        quantity: quantity,
        price: price,
        img: img
    };
    var shoppingCartItems;
    
// tìm xem sản phẩm tồn tại hay chưa để thêm vài giỏ hàng

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
    window.location.href = "cart.html";
};


function loadCartItem() {
    var actionCart = $(".shop_table.cart > tbody > tr:first").html();
    var totalAmount = 0;
    if (sessionStorage["cart-items"] != null) {
        $(".shop_table.cart > tbody > tr:first").html("");
        shoppingCartItems = JSON.parse(sessionStorage["cart-items"].toString());

        $.each(shoppingCartItems, function (index, item) {
            var htmlstring = "";
            htmlstring += "<tr class='cart_item'>";
            htmlstring += '<td class="product-remove"><a title="Remove this item" class="remove" onclick="RemoveCart(\'' + item.name + '\')" href="#">×</a></td>';
            htmlstring += " <td class='product-thumbnail'> <img width='145' height='145'    class='shop_thumbnail' src='" + item.img + "'> </td>";
            htmlstring += " <td class='product-name'>" + item.name + "</td>";
            htmlstring += " <td class='product-price'>" + item.price + "</td>";
            htmlstring += " <td class='product-quantity'>";
            htmlstring += "<div class='quantity buttons_added'> <input type='button' class='minus' value='-' name='minus'>"
            htmlstring += "<input type='number' size='10' class='input-text qty text'  value='" + item.quantity + "'min='0' step='1'> <input type='button' class='plus' value='+'></div>";

            // var total = parseFloat(item.price.substring(1, item.price.length - 1)) * parseFloat(item.quantity);
            var total = parseFloat(item.price.replace(/\D+/g, '')) * parseFloat(item.quantity);
            var totalFormated = total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            htmlstring += " <td class='product-subtotal'> <span class='amount'>" + totalFormated + "</span></td>";
            totalAmount += total;
            htmlstring += "</tr>";
            // $("#shop_table_cart > tbody:last").append(htmlstring);
            $(".shop_table.cart > tbody").append(htmlstring);
        })
        $(".shop_table.cart > tbody").append(actionCart);
    }

    var totalAmountFormated = totalAmount.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
    $("#cart-subtotal-amount").text(totalAmountFormated);
    $("#cart-total-amount").text(totalAmountFormated);
    $("#cart-amount-1").text(totalAmountFormated);
    $("#cart-amount-2").text(totalAmountFormated);

}
// xoa khoi gio hang 
function RemoveCart(data) {
    shoppingCartItems = JSON.parse(sessionStorage["cart-items"].toString());
    shoppingCartItems = shoppingCartItems.filter(function (item) {
        return item.name !== data
    })
    sessionStorage["cart-items"] = JSON.stringify(shoppingCartItems);

    window.location.reload();
};
// tawng giamr sl
function addOrRemoveItem(e, vm, val){
    e.preventDefault();

    var $this = $(vm);
    var $qtyElement = $this.closest('div').find('input')[1];

    if ($qtyElement != null) {
        var value = parseInt($qtyElement.value);
        value = value + val;
        if (value < 1) {
            value = 1;
        }
        $qtyElement.value = value;
    }
    reCalculateAmount($this, value, val)
};

function reCalculateAmount(vm, val, delta) {
    var priceElement = vm.parent().parent().parent().find('td')[3].innerHTML;
    var price = parseInt(priceElement.replace(/\D+/g, ''));
    var newSubAmount = price * val;
    var newSubAmountFormated = newSubAmount.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
    vm.parent().parent().parent().find('td')[5].children[0].innerHTML = newSubAmountFormated;
    
    var totalAmount = $("#cart-subtotal-amount").text().replace(/\D+/g, '');
    var newTotalAmount = parseInt(totalAmount) + (delta * price)
    var newTotalAmountFormated = newTotalAmount.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
    
    $("#cart-subtotal-amount").text(newTotalAmountFormated);
    $("#cart-total-amount").text(newTotalAmountFormated);

    shoppingCartItems = JSON.parse(sessionStorage["cart-items"].toString());
    var itemName = vm.parent().parent().parent().find('td')[2].innerHTML;
    $.each(shoppingCartItems, function (index, item) {
        if (item.name == itemName) {
            item.quantity = val;
            return true;
        }
    })
    sessionStorage["cart-items"] = JSON.stringify(shoppingCartItems);
}