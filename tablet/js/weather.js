$(document).ready(function() {
  $.simpleWeather({
    location: 'Rotterdam, NL',
    woeid: '',
    unit: 'c',
    success: function(weather) {
      var temp = weather.temp;
      var city = weather.city;
      var region = weather.region;
      var currently = weather.currently;

      $.ajax({
        url: 'pokemon.php?weather=' + currently + '&temperature=' + temp,
        success: function(data) {
          //console.log(data);
          //console.log("ajax call gelukt")
        }
      });


      var weatherData = createDomElement({
        tagName: 'h2',
        attributes: {
          id: 'weatherData'
        },
        content: temp + "C. " + currently
      });
      document.getElementById("weatherContainer").appendChild(weatherData);
      //$("#weather").html(html);

    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }


  });
});
