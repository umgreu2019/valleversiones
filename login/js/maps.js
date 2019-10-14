function initMap(){
	const ubicacion = new Localizacion(()=>{

		const myLatLng ={lat: 14.5547917,lng: -91.6817881}

		const myLatLng1 = new google.maps.LatLng(ubicacion.latitude,ubicacion.longitude);
		
		

		var texto = '<h6 class="text-dark">COMERCIALIZADORA FRAMASA</h6>'+'<div class="row col-md-12"><div class="col-md-6"><p class="text-warning">11 Calle,<br> Boulevard Centenario<br> Retalhuleu</p></div> <div class="col-md-6"><img alt="" class="img-responsive" src="img2/log2.png"/></div></div>'
	

		const option={
			center:	myLatLng,
			zoom: 18,
			mapTypeId: 'hybrid',
			heading: 90,
		    tilt: 45
		}
		

		var map = document.getElementById('map');

		const mapa = new google.maps.Map(map,option);

		function rotate90() {
		var heading = map.getHeading() || 0;
		map.setHeading(heading + 90);
		}
		
		function autoRotate() {
		// Determine if we're showing aerial imagery.
		if (map.getTilt() !== 0) {
		window.setInterval(rotate90, 3000);
		}
		}

		const marcador1 = new google.maps.Marker({
			position:myLatLng1,
			map:mapa,
			title:"tu ubicacion"
		});

		const marcador = new google.maps.Marker({
			position:myLatLng,
			map:mapa,
			title:"COMERCIALIZADORA FRAMASA"
		});	

		var informacion = new google.maps.InfoWindow({
			content: texto
		});

		marcador.addListener('click',function(){
			informacion.open(mapa,marcador);
		});	


		// var objConfigDr= {
		// 	map:mapa
		// }

		/*var objConfigDs= {
			origin: myLatLng1,
			destination: myLatLng,
			travelMode: google.maps.TravelMode.DRIVING
		}*/

		// var ds = new google.maps.DirectionsService();
		// var dr = new google.maps.DirectionsRenderer(objConfigDr);
		
		// ds.route(objConfigDs,fnRutear);

		// function fnRutear(resultados, status){
		// 	if(status=='OK'){
		// 		dr.setDirections(resultados);
		// 	}else{
		// 		alert('Error: '+status);
		// 	}
		// }
	})
}