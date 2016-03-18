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

      console.log(temp);

      console.log(currently);


      var weatherData = createDomElement({
        tagName: 'h2',
        attributes: {
          id: 'weatherData'
        },
        content: temp + currently
      });
      document.getElementById("weatherContainer").appendChild(weatherData);
      //$("#weather").html(html);

    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }

  });




});
