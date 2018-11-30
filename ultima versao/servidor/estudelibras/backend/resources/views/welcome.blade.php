<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                       <!-- <a href="{{ url('/home') }}">Home</a>-->
                    @else
                        <!--<a href="{{ route('login') }}">Login</a>-->

                        @if (Route::has('register'))
                        <!--    <a href="{{ route('register') }}">Register</a>-->
                        @endif
                    @endauth
                </div>
            @endif
            <!-- IMPROVISADO -->
            <?php             
                $url = '/index.php';
                for($i=0;$i<=7;$i++)                    
                    if(isset(explode('/', Request::url())[$i]))
                        if( explode('/', Request::url())[$i] == 'index.php')                           
                            $url = '';                        
            ?>
            
            <div class="content">
                <div class="title m-b-md">
                    LIBRAKIDS
                </div>
                <P>Trabalho de Conclusão de curso</P>                
                    <div class="links">             
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ URL::to($url.'/home') }}">Home</a>
                        @else
                            <a href="{{ URL::to($url.'/login') }}">Login</a>
                        @endauth
                        <br>   
                        
                        <a href="http://localhost/estudelibras/backend/public/apk/libras_kids.apk"><img src="http://localhost/estudelibras/backend/public/apk/apk.png" alt="Download do apk" width="100" height="100"></a>                        
                    </div>
                    @endif
            </div>
        </div>
    </body>
</html>
