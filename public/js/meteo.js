var callback = function(data){
    var NomVille = document.getElementById("Nomville").innerHTML = data.name +" ("+ data.sys.country+")";
    var CodeIcone = data.weather[0].icon;
    var Icone = document.getElementById("icone").src = "http://openweathermap.org/img/wn/"+CodeIcone+"@2x.png";
    var Temps = document.getElementById("Temps").innerHTML =  data.weather[0].description;
    var TempActuelle = document.getElementById("TempActuelle").innerHTML = parseInt(data.main.temp) +" °C";
    var TempMin = document.getElementById("TempMin").innerHTML = "Temperature Minimal : "+ parseInt(data.main.temp_min) +" °C";
    var TempMax = document.getElementById("TempMax").innerHTML = "Temperature Maximum : "+ parseInt(data.main.temp_max) +" °C";
    var Vent = document.getElementById("Vent").innerHTML = "Vent : "+ data.wind.speed +" m/s";
    var Humidite = document.getElementById("Humidite").innerHTML = "Humidité : "+ data.main.humidity +" %";

    
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