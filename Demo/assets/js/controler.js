function findPorters(latLng) {
	var data = {action: 'findPorters', location:latLng};
	var markerArray = [];

	$.getJSON('http://192.168.6.167:8888/Instahack/porter_server.php?action=getList',function(data) {
		$.each(data, function (key, val) {
			// console.log(val.location);
			markerArray.push(val.location);
		});

		var map = new google.maps.Map(document.getElementById('map'), {
		  center: latLng,
		  zoom: 14
		});

		var center = map.getCenter();


		var marker = new google.maps.Marker({
		    position: latLng,
		    map: map,
		    title: 'Available Porters'
		 });
		
		google.maps.event.addListenerOnce(map, 'idle', function() {
		    google.maps.event.trigger(map, 'resize');
		  map.setCenter(center);
		});

		var circle = new google.maps.Circle({
		  map: map,
		  radius: 1200,    // 10 miles in metres
		  fillOpacity: 0.3,
		  strokeOpacity: 0.3,
		  strokeColor: '#5394F1',
		  fillColor: '#5394F1'
		});
		circle.bindTo('center', marker, 'position');

		for (var i = markerArray.length - 1; i >= 0; i--) {
			console.log(markerArray[i]);
			latLng = {lat: markerArray[i][0], lng: markerArray[i][1]};
			var marker = new google.maps.Marker({
			    position: latLng,
			    map: map,
			    title: 'Available Porters'
			});
		}
	});	
}