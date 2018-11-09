<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>sufEdu</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Styles -->
        <style>
            
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
    </head>
    <body>
        <div class="container">


        @include('flash::message')

        <div class="row">
            
        

        <div class="col-lg-6 col-md-6">
            <center>
                <img src="{{ asset('public/like.jpg') }}" style="margin-top: 130px !important;; max-width: 350px; min-width: auto" />
            </center>
        </div>

        <div class="flex-center position-ref full-height col-lg-6 col-md-6">
            {{--
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
                --}}
                <div class="top-right links" style="width: 400px;
    border: 1px solid #ccc;
    padding: 15px;
    ">
                <div class="card-header" >
    <h1 style="font-weight: 400;
    line-height: 1.2;">        
Ingreso al sistema
    </h1>
</div>
                <form action="{{ url('/ingreso') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <label class="control-label" style="color: black;
font-weight: bold;
display: block;
width: 150px;
float: left;">
                    Código estudiante
                </label>
                    <input type="text" name="cod_estudiante" required="required" class="form-control" value="" placeholder="" style="display: block;
    width: 94%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;">
                </div>
                
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <center>
                            
                        <button type="submit"
                                class="btn btn-primary btn-block btn-flat" style="margin-top: 15px;">Ingresar</button>

                        </center>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
                </div>

            <div class="content">
                <!--
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            -->
            </div>
        </div>
</div>
</div>

        <script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>

  <script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
  </script>

    </body>
</html>
