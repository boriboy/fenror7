<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                /* font-family: 'Raleway', sans-serif; */
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

            ul {
                list-style-type: none;
                margin: 5;
                padding: 0;
                overflow: hidden;
            }

            ul > li {
                float: left;
            }

            .links {
                margin: auto;
                width: 50%;
            }

        </style>

        <script src="/js/bootstrap.js"></script>

        <script>
            // creates humanoid via ajax
            function createHumanoid() {
                $.post('/humanoid/create', $('#humanoid-create-form').serializeArray())
            }

            function updateLatestHumanoid(name, date) {
                $('#latest-humanoid').html(`${name} at ${date}`)
            }
        </script>

        <!-- attach pusher listeners -->
        <script>
            Echo.channel('humanoid')
                .listen('HumanoidCreatedEvent', (e) => {
                    console.log('received pusher event', e)
                    updateLatestHumanoid(e.humanoid.name, e.humanoid.created_at)
                });
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

                <br>
                <br>
                <br>

                <div>
                    <h2>Latest created humanoid (pusher data):</h2>
                    <div id="latest-humanoid"></div>
                </div>

                <br>
                <br>
                <br>

                <div id="humanoid-list" >
                    <h2>humanoids table</h2>
                    <div style="margin: auto;width: 50%;border: 3px solid green;padding: 10px;">
                        <table style="margin: auto">
                            @foreach($paginated as $user)
                                <tr>
                                    <th>{{$paginated->firstItem() + $loop->index}}</th>
                                    <th>{{$user->name}}</th>
                                    <th>{{$user->species}}</th>
                                    <th>{{$user->created_at}}</th>
                                </tr>
                            @endforeach
                        </table>
                        <div class="links">
                            {{$paginated->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </body>
</html>
