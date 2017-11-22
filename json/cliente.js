function draw_values(pedidos){
	var suma = 0;
	var dx = "<h1>Total pedidos:"+ (new Date())+"</h1>";
	for(var i=0;i<pedidos.length;i++){
		var pedido = pedidos[i];
		suma += parseFloat(pedido.valor);
	}
	dx += "\n<h2>"+suma+"</h2>";
	document.getElementById("salida").innerHTML = dx;
	

}

function timer(){
	var http_request = new XMLHttpRequest();
	http_request.open("GET", "http://192.168.100.174/pedidos/", true);
	http_request.responseType = "json";
	var html = "";
	http_request.onreadystatechange = function () {
		var done = 4, ok = 200;
		if (http_request.readyState === done && http_request.status === ok) {
			draw_values(http_request.response);
			
		}
	};
	http_request.send(null);
	setTimeout(timer, 2000);
}
function init(){
	timer();
}
