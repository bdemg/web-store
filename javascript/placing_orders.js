function placeOrder(productId, quantity){
	
	//if the cookie exists
	if (document.cookie && document.cookie != "" && read_cookie("B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley")){
	
		var shopping_trolley = read_cookie("B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley");
		
		if(JSON.stringify(shopping_trolley).includes("{\"id\":" + productId)){
			
			increaseItemQuantity(shopping_trolley, quantity, productId);
		}else{
		
			addNewItem(shopping_trolley, quantity, productId);
		}	
	}else{
		
		createTrolley(productId, quantity);
	}
	
	alert("Producto añadido al carrito");
}

function createTrolley(productId, quantity){
	
	var shopping_trolley = new Array();
		
	var boughtItem = { "id" : productId, "quantity" : quantity};
	shopping_trolley.push(boughtItem);
		
	bake_cookie("B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley", shopping_trolley);
}
		
function increaseItemQuantity(shopping_trolley, addedQuantity, productId){

	for( var i = 0 ; i < shopping_trolley.length ; i++ ){
			
		if(shopping_trolley[i].id == productId){
				
			shopping_trolley[i].quantity = shopping_trolley[i].quantity + addedQuantity;
			i = shopping_trolley.length;
		}
	}
			
	bake_cookie("B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley", shopping_trolley);
}

function addNewItem(shopping_trolley, quantity, productId){
	
	shopping_trolley.push( { "id" : productId, "quantity" : quantity } );
	bake_cookie("B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley", shopping_trolley);
}

function updateTrolleyItemCount(){
	
	var itemCount = read_cookie("B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley").length;
	
	if(itemCount){
		
		document.forma.btn_carrito.value="Carrito (" + itemCount + ")";
	}else{
		
		document.forma.btn_carrito.value="Carrito (0)";
	}
}