<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weather Report</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
            li {
				font-weight: bold;
				color: #5B5151!important;
				text-align: left;
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           <div class="content">
                <div class="title m-b-md">
                    Weather Report
                </div>

                <div class="links">
					<form method="post" action="/weather">
						{{ csrf_field() }}
						<input type="text" name="city" placeholder="City" required />
						<button>Check</button>
					</form>
                </div>
                <div>
					@if(empty($data['error']))
						<h3>Weather Report For: {{$data['location']['name']}},{{$data['location']['country']}} as at {{$data['current']['observation_time']}}</h3>
						<ul>
							<li>Weather Descriptions: <strong>{{$data['current']['weather_descriptions'][0]}}</strong></li>
							<li>Temperature: <strong>{{$data['current']['temperature']}} ℃ </strong></li>
							<li>Wind Speed: <strong>{{$data['current']['wind_speed']}} </strong></li>
							<li>Wind Degree: <strong>{{$data['current']['wind_degree']}} </strong></li>
							<li>humidity: <strong>{{$data['current']['humidity']}} </strong></li>
						</ul>
					@else
						<h4>Please try another city!</h4>
					@endif
                </div>
            </div>
        </div>
    </body>
</html>
