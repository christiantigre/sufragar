<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico') }}"/>


  <title>sufEdu</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

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
  .btn-sq-lg {
    width: 180px !important;
    height: auto !important;
  }
  .btn-sq {
    width: 100px !important;
    height: 100px !important;
    font-size: 10px;
  }
  .btn-sq-sm {
    width: 50px !important;
    height: 50px !important;
    font-size: 10px;
  }
  .btn-sq-xs {
    width: 25px !important;
    height: 25px !important;
    padding:2px;
  }
</style>
</head>
<body>
  <div class="flex-center position-ref full-height">
    <div class="top-right links">            
      <h3>ESTUDIANTE</h3> <strong> {{ $codigo_estudiante }} </strong>
    </div>

    <div class="content">
      <div class="title m-b-md">
      </div>

      <div class="container">

        @include('flash::message')

        @if ($errors->any())
      <ul class="alert alert-danger">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  @endif

  

              
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <p>

              @foreach($listas as $item)            

              
                <a href="{{ url('/getvotolista', [$item->id, $codigo_estudiante]) }}" class="btn btn-sq-lg btn-default"  >

                        <img src="{{ asset('public/'.$item->logo) }}" style="max-width: 100px; min-width: 100px" />

                  <!--<i class="fa fa-laptop fa-5x"></i>-->
                  <br/>
                  <strong> {{ $item->presidente }} </strong>
                  <br>
                  <strong> Lista # {{ $item->lista_numero }}</strong><br/>
                  <strong> {{ $item->nombre }}</strong>
                  </a>      

               @endforeach
               
               <a href="{{ url('/votonulo', $codigo_estudiante) }}" class="btn btn-sq-lg btn-default">
                <i class="fa fa-close fa-5x"></i>
                  <br/>
                    <strong> Nulo</strong>
                  </a>   

             </p>
           </div>
         </div>

         



          

       </div>

     </div>
   </div>
<!-- If using flash()->important() or flash()->overlay(), you'll need to pull in the JS for Twitter Bootstrap. -->
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