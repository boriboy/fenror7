<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
        </style>
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

        <script>
            // creates humanoid via ajax
            function createHumanoid() {
                console.log('in func')
                $.post('/humanoid/create', $('#humanoid-create-form').serializeArray(), res => {
                    console.log('humanoid create response', res)
                })
            }

        </script>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Humanoid Laboratory
                </div>

                <div>
                    <form id="humanoid-create-form">
                        <input type="text" name="name" placeholder="name" />
                        <select name="species">
                            <option value="kree">kree</option>
                            <option value="kryptonian">kryptonian</option>
                            <option value="mermanus">mermanus</option>
                            <option value="olympian">olympian</option>
                            <option value="human">human</option>
                            <option value="skrull">skrull</option>
                        </select>
                        {{ csrf_field() }}
                        <br>
                        <button type="button" onclick="createHumanoid()">Create Humanoid</button>
                    </form>
                </div>
            </div>
        </div>


    </body>
</html>
