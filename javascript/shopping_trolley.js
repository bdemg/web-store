var item_image = new Array();
item_image[0] = "imagenes/bolitas_de_nuez.png";
item_image[1] = "imagenes/brownie.jpg";
item_image[2] = "imagenes/cupcake.jpg";
item_image[3] = "imagenes/pay_limon.jpg";

var item_name = new Array();
item_name[0] = "Bolitas de Nuez";
item_name[1] = "Brownie";
item_name[2] = "Cupcake";
item_name[3] = "Pay de Lim&oacute;n";

var item_price = new Array();
item_price[0] = 12.00;
item_price[1] = 25.00;
item_price[2] = 20.00;
item_price[3] = 10.00;

var FIXED_SHIPPING_COST = 20.00

function displayShoppingTrolley(item_number){
	
	var shoppingTrolley = document.getElementById("shopping_trolley");
	var totals = document.getElementById("shopping_totals");
	var buttons = document.getElementById("buttons");
	
	if (item_number.length < 1){
		
		totals.innerHTML = "<h4>No hay elementos en el carrito. Agrega algunos utilizando <a href=\"catalogo.html\">el cat&aacute;logo</h4>";
		
	}else{
		
		var total = 0;
		for (i = 0; i < item_number.length; i++){
			
			var row = shoppingTrolley.insertRow(i);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			
			cell1.innerHTML = "<img src="+ item_image[item_number[i].id] +" width=\"50\" height=\"50\" border=\"1\">";
			cell2.innerHTML = "<b>" + item_name[item_number[i].id] + "</b>"+"";
			cell3.innerHTML = "<i>cantidad: " + item_number[i].quantity + " pieza(s)</i>";
			cell4.innerHTML = "<i>subtotal: $" + item_price[item_number[i].id] * item_number[i].quantity + "</i>";
			cell5.innerHTML = "<input type=\"checkbox\" name=\"orderboxes\" value=" + JSON.stringify(item_number[i]) + ">";
			total = total + item_price[item_number[i].id] * item_number[i].quantity;
		}
		
		
		totals.innerHTML = totals.innerHTML + "<p>Precio de env&iacute;o: $20 </p>";
		totals.innerHTML = totals.innerHTML + "<p>Total - $" + (total + FIXED_SHIPPING_COST) + "</p>";
		
		buttons.innerHTML = "<p><input type=\"submit\" name=\"comprar\" value=\"Comprar\"> &nbsp; <input type=\"button\" name=\"eliminar_seleccionados\" value=\"Eliminar Seleccionados\"> &nbsp; <input type=\"button\" name=\"eliminar_todo\" value=\"Vaciar Carrito\"> </p>"
	}
}

function comprarCarrito(){
	bake_cookie("B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley", new Array());
	window.location = "catalogo.php";
}

function vaciarCarrito(){
	bake_cookie("B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley", new Array());
	window.location = "carrito.php";
}

function remove(){
	var new_cookie_raw_data = new Array();
	
	if (document.orderform.orderboxes.length){
	
		for (i = 0; i < document.orderform.orderboxes.length; i++){
		
			if (document.orderform.orderboxes[i].checked == false){
				new_cookie_raw_data.push(JSON.parse(document.orderform.orderboxes[i].value));
			}
		}
	} else{
		if(document.orderform.orderboxes.checked == false){
		
			new_cookie_raw_data.push(JSON.parse(document.orderform.orderboxes[i].value));
		}
	}
		
	bake_cookie("B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley", new_cookie_raw_data);

	window.location = "carrito.php";
}