function placeOrder(productId, quantity){
	
	//if the cookie exists
	if (document.cookie && document.cookie != ""){
	
		var shopping_trolley = read_cookie("shopping_trolley");
		
		if(JSON.stringify(shopping_trolley).includes("{\"id\":" + productId)){
			
			increaseItemQuantity(shopping_trolley, quantity, productId);
		}else{
		
			addNewItem(shopping_trolley, quantity, productId);
		}	
	}else{
		
		createTrolley(productId, quantity);
	}
	
	alert(JSON.stringify(read_cookie("shopping_trolley")));
}

function createTrolley(productId, quantity){
	
	var shopping_trolley = new Array();
		
	var boughtItem = { "id" : productId, "quantity" : quantity};
	shopping_trolley.push(boughtItem);
		
	bake_cookie("shopping_trolley", shopping_trolley);
}
		
function increaseItemQuantity(shopping_trolley, addedQuantity, productId){

	for( var i = 0 ; i < shopping_trolley.length ; i++ ){
			
		if(shopping_trolley[i].id == productId){
				
			shopping_trolley[i].quantity = shopping_trolley[i].quantity + addedQuantity;
			i = shopping_trolley.length;
		}
	}
			
	bake_cookie("shopping_trolley", shopping_trolley);
}

function addNewItem(shopping_trolley, quantity, productId){
	
	shopping_trolley.push( { "id" : productId, "quantity" : quantity } );
	bake_cookie("shopping_trolley", shopping_trolley);
}