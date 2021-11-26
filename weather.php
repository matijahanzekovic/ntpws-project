<?php
    $apiKey = "959fc57a771d0ea70f53efc2ea1c18ac";
    $cityId = "3186886";
    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    curl_close($ch);
    $data = json_decode($response);
    $currentTime = time();

    print '
        <div class="container mb-4">
            <h2>' . $data->name . ' Weather Status</h2>
            <div class="time">
                <div><b>Day and time:</b> ' . date("l g:i a", $currentTime) . '</div>
                <div><b>Date:</b> ' . date("jS F, Y",$currentTime) . '</div>
                <div><b>Weather description:</b>  ' . ucwords($data->weather[0]->description) . '</div>
            </div>
            <div class="weather-forecast">
                <img style="width:150px"
                    src="http://openweathermap.org/img/w/' . $data->weather[0]->icon . '.png"
                    class="weather-icon" /><b>Max:</b> '. $data->main->temp_max . ' °C<span style="margin-left:2rem"
                    class="min-temperature"> <b>Min:</b> ' . $data->main->temp_min . ' °C</span>
            </div>
            <div class="time">
                <div><b>Humidity:</b>  ' . $data->main->humidity . ' %</div>
                <div><b>Wind:</b> ' . $data->wind->speed . ' km/h</div>
            </div>
        </div>
    ';
?>