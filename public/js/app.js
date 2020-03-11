// window.onload = (e) => {
//     appelAPI();
//     appelMAP();
// }


var callback = function(data){
    document.getElementById("Nomville").innerHTML = data.name +" ("+ data.sys.country+")";
    var CodeIcone = data.weather[0].icon;
    document.getElementById("icone").src = "http://openweathermap.org/img/wn/"+CodeIcone+"@2x.png";
    document.getElementById("Temps").innerHTML =  data.weather[0].description;
    document.getElementById("TempActuelle").innerHTML = parseInt(data.main.temp) +" °C";
    document.getElementById("TempMin").innerHTML = "Temperature Minimal : "+ parseInt(data.main.temp_min) +" °C";
    document.getElementById("TempMax").innerHTML = "Temperature Maximum : "+ parseInt(data.main.temp_max) +" °C";
    document.getElementById("Vent").innerHTML = "Vent : "+ data.wind.speed +" m/s";
    document.getElementById("Humidite").innerHTML = "Humidité : "+ data.main.humidity +" %";
}

function appelAPI() {
    var url="http://api.openweathermap.org/data/2.5/weather?id=3024086&lang=fr&units=metric&appid=d695dc8608907f5d9601f10601968d84";

    $.get(url,callback).done(function(){

    })
    .fail(function(){
        alert("error");
    })
    .always(function(){

    });
}

function appelMAP(){
    mapboxgl.accessToken = 'pk.eyJ1IjoiZWx2aXRocmF4IiwiYSI6ImNrN24wbXZzZDBpaXQzZXFtNWVtemI3eG8ifQ.pU9AKk45ihuKz_jhULUIzg';
    var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/dark-v10',
    zoom: 13,
    center: [5.59, 48.76]
    });

    var popup = new mapboxgl.Popup({ offset:15 })
    .setText('Mairie de Commercy')
    .setHTML(`<div class="card" style="width: 15rem;">
    <img class="card-img-top" src="/images/mairie.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="font-weight:bold;">Mairie de Commercy</h5>
      <p class="card-text" style="font-weight:bold;font-size:16px ;">Horaire d'ouverture</p>
      <p class="card-text" style="font-size:14px ;">Lundi-Vendredi : 8h-12/14-16h</p>
      <p class="card-text" style="font-size:14px ;">Samedi : 9h-12h</p>
      
    </div>
  </div>`)

    var marker = new mapboxgl.Marker({
        draggable: true
        })
        .setLngLat([5.592350, 48.763900])
        .setPopup(popup)
        .addTo(map);
         
        function onDragEnd() {
        var lngLat = marker.getLngLat();
        coordinates.style.display = 'block';
        coordinates.innerHTML =
        'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
        }
         
        marker.on('dragend', onDragEnd);
    
    var layerList = document.getElementById('menu');
    var inputs = layerList.getElementsByTagName('input');
    
    function switchLayer(layer) {
    var layerId = layer.target.id;
    map.setStyle('mapbox://styles/mapbox/' + layerId);
    }
    
    for (var i = 0; i < inputs.length; i++) {
    inputs[i].onclick = switchLayer;
    }

}


