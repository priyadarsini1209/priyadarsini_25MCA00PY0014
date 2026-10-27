<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Weather Application</title>

    <style>

        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            background: linear-gradient(
                135deg,
                #4facfe,
                #00f2fe
            );
        }

        .container {
            width: 450px;
            max-width: 90%;

            background: white;

            padding: 30px;

            border-radius: 15px;

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);

            text-align: center;
        }

        h1 {
            color: #123c69;
        }

        .search {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        input {
            flex: 1;

            padding: 12px;

            border: 1px solid #ccc;

            border-radius: 6px;

            font-size: 16px;
        }

        button {
            padding: 12px 18px;

            border: none;

            border-radius: 6px;

            background: #123c69;

            color: white;

            cursor: pointer;
        }

        button:hover {
            background: #1d70a2;
        }

        #loading {
            display: none;
            margin-top: 20px;
            color: #555;
        }

        #weather {
            display: none;

            margin-top: 25px;

            padding: 20px;

            background: #f1f8ff;

            border-radius: 10px;
        }

        #weather h2 {
            color: #123c69;
        }

        .item {
            font-size: 18px;
            padding: 8px;
        }

        #error {
            display: none;
            color: red;
            margin-top: 20px;
        }

    </style>

</head>

<body>


<div class="container">

    <h1>Weather Application</h1>


    <div class="search">

        <input
            type="text"
            id="city"
            placeholder="Enter city name"
        >

        <button onclick="getWeather()">
            Search
        </button>

    </div>


    <div id="loading">
        Loading...
    </div>


    <div id="error">
        Unable to fetch weather data.
    </div>


    <div id="weather">

        <h2 id="cityName"></h2>

        <div class="item">
            🌡 Temperature:
            <span id="temperature"></span> °C
        </div>

        <div class="item">
            ☁ Condition:
            <span id="condition"></span>
        </div>

        <div class="item">
            💧 Humidity:
            <span id="humidity"></span> %
        </div>

        <div class="item">
            💨 Wind Speed:
            <span id="wind"></span> km/h
        </div>

    </div>

</div>


<script>

function getWeather() {

    // Get city entered by user

    let city =
        document.getElementById("city").value.trim();


    // Check empty input

    if (city === "") {

        alert("Please enter a city");

        return;
    }


    // Show loading

    document.getElementById("loading")
        .style.display = "block";

    document.getElementById("weather")
        .style.display = "none";

    document.getElementById("error")
        .style.display = "none";


    // AJAX request using fetch()

    fetch(
        "weather.php?city="
        + encodeURIComponent(city)
    )


    // Convert response into JSON

    .then(function(response) {

        return response.json();

    })


    // Receive JSON data

    .then(function(data) {

        console.log(data);


        // Hide loading

        document.getElementById("loading")
            .style.display = "none";


        // Display data

        document.getElementById("cityName")
            .textContent = data.city;

        document.getElementById("temperature")
            .textContent = data.temperature;

        document.getElementById("condition")
            .textContent = data.condition;

        document.getElementById("humidity")
            .textContent = data.humidity;

        document.getElementById("wind")
            .textContent = data.wind_speed;


        // Show weather information

        document.getElementById("weather")
            .style.display = "block";

    })


    // Handle errors

    .catch(function(error) {

        console.log(error);

        document.getElementById("loading")
            .style.display = "none";

        document.getElementById("error")
            .style.display = "block";

    });

}

</script>


</body>

</html>
