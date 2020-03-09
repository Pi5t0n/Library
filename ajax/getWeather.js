//var key=zAmnmW7zwGx6FxEekfC5mnNoPkIW7H1A; 
//curl -X GET "http://dataservice.accuweather.com/locations/v1/search?apikey=zAmnmW7zwGx6FxEekfC5mnNoPkIW7H1A&q=Ma%C3%B3"
function weatherForm(){
     var sectionTitle=document.createElement("H2"); //Title
        sectionTitle.innerHTML="Search Weather";
     //var formCity=document.createElement("form");
     var labelCity=document.createElement("label");
        labelCity.setAttribute("for","city");
        labelCity.innerHTML="Introduce city name: ";
     var inputCity=document.createElement("input");
        inputCity.setAttribute("id","cityName");
        inputCity.setAttribute("type","text");
    var buttonShowCityWeather=document.createElement("button");
            buttonShowCityWeather.setAttribute("type","submit");
            buttonShowCityWeather.setAttribute("name","city_weather");
            buttonShowCityWeather.setAttribute("onclick","getCityCode()");
            buttonShowCityWeather.innerHTML="Show Weather!"
    
    document.getElementById("weatherSection").appendChild(sectionTitle);
    document.getElementById("weatherSection").appendChild(labelCity);
    document.getElementById("weatherSection").appendChild(inputCity);
    document.getElementById("weatherSection").appendChild(buttonShowCityWeather);
}

function getCityCode(){
    var cityName=document.getElementById("cityName").value;
    
    fetch('https://dataservice.accuweather.com/locations/v1/search?apikey=zAmnmW7zwGx6FxEekfC5mnNoPkIW7H1A&q='+cityName)
        .then(function(response) {
            return response.json();
    })
        .then(function(cityInfoJson) {
            //console.log(myJson);
            getCityWeatherInfo(cityInfoJson);
    });   
}

function getCityWeatherInfo(cityInfoJson){
    var cityCodeVal=cityInfoJson[0].Key;
    //alert(cityCodeVal);
    fetch('https://dataservice.accuweather.com/currentconditions/v1/'+cityCodeVal+'?apikey=zAmnmW7zwGx6FxEekfC5mnNoPkIW7H1A&language=es-ES')
        .then(function(response) {
            return response.json();
    })
        .then(function(cityInfoJson) {
            console.log(cityInfoJson);
            showInfo(cityInfoJson);
    });
}
function showInfo(cityInfoJson){
    var weatherText=cityInfoJson[0].WeatherText;
    var temperature=cityInfoJson[0].Temperature.Metric.Value;
    var temperatureUnit=cityInfoJson[0].Temperature.Metric.Unit;
    
    var weatherP=document.createElement("P");
        weatherP.innerHTML="<b>State: </b>"+weatherText+"<b> Temperature: </b>"+temperature+" º"+temperatureUnit;
    
    document.getElementById("weatherSection").appendChild(weatherP);
    
}