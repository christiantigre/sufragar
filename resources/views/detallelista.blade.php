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
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>



  <!-- Styles -->
  <style>
  
  .full-height {
    /*height: 100vh;*/
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
    width: 150px !important;
    height: 150px !important;
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

  /*
Code snippet by maridlcrmn for Bootsnipp.com
Follow me on Twitter @maridlcrmn
Image credits: unsplash.com, uifaces.com/authorized
Image placeholders: placemi.com
*/


#t-cards {
    padding-top: 80px;
    padding-bottom: 80px;
    background-color: #345;    
}

/********************************/
/*          Panel cards         */
/********************************/
.panel.panel-card {
    position: relative;
    height: 241px;
    border: none;
    overflow: hidden;
}
.panel.panel-card .panel-heading {
    position: relative;
    z-index: 2;
    height: 120px;
    border-bottom-color: #fff;
    overflow: hidden;
    
    -webkit-transition: height 600ms ease-in-out;
            transition: height 600ms ease-in-out;
}
.panel.panel-card .panel-heading img {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 1;
    width: 120%;
    
    -webkit-transform: translate3d(-50%,-50%,0);
            transform: translate3d(-50%,-50%,0);
}
.panel.panel-card .panel-heading button {
    position: absolute;
    top: 10px;
    right: 15px;
    z-index: 3;
}
.panel.panel-card .panel-figure {
    position: absolute;
    top: auto;
    left: 50%;
    z-index: 3;
    width: 70px;
    height: 70px;
    background-color: #fff;
    border-radius: 50%;
    opacity: 1;
    -webkit-box-shadow: 0 0 0 3px #fff;
            box-shadow: 0 0 0 3px #fff;
    
    -webkit-transform: translate3d(-50%,-50%,0);
            transform: translate3d(-50%,-50%,0);
    
    -webkit-transition: opacity 400ms ease-in-out;
            transition: opacity 400ms ease-in-out;
}

.panel.panel-card .panel-body {
    padding-top: 40px;
    padding-bottom: 20px;

    -webkit-transition: padding 400ms ease-in-out;
            transition: padding 400ms ease-in-out;
} 

.panel.panel-card .panel-thumbnails {
    padding: 0 15px 20px;
}
.panel-thumbnails .thumbnail {
    width: 60px;
    max-width: 100%;
    margin: 0 auto;
    background-color: #fff;
} 


.panel.panel-card:hover .panel-heading {
    height: 55px;
    
    -webkit-transition: height 400ms ease-in-out;
            transition: height 400ms ease-in-out;
}
.panel.panel-card:hover .panel-figure {
    opacity: 0;
    
    -webkit-transition: opacity 400ms ease-in-out;
            transition: opacity 400ms ease-in-out;
}
.panel.panel-card:hover .panel-body {
    padding-top: 20px;
    
    -webkit-transition: padding 400ms ease-in-out;
            transition: padding 400ms ease-in-out;
}

</style>
</head>
<body style="background-color: #345;">
  <center>
<h1 style="color: white;"> 
VOTO ELECTRONICO
</h1>
  </center>

@if ($errors->any())
      <ul class="alert alert-danger">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  @endif

<form method="POST" action="{{ url('/votolista') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}






<div class="container" style="background-color: #345; color: white">

  <div class="btn-toolbar" role="toolbar">
  <div class="btn-group">
    <button class="btn btn-success" type="submit">
      <span class="glyphicon glyphicon-ok"></span>
      <strong> VOTAR</strong>
    </button>
 
    
 
  </div>
</div>

  <h3 style="    margin-right: 450px;">
      LISTA #  : {{ $lista->lista_numero }}
    </h3> 
      {{ $lista->nombre }} <br>
      {{ $lista->descripcion }} <br>
</div>
 

  <section id="t-cards">
    
       
    <div class="container">

        <div class="row">


          @foreach($integrantes as $item)
                     <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="{{ asset($lista->logo) }}" />
                    </div>
                    <div class="panel-figure">
                        <img class="img-responsive img-circle" src="{{ asset($item->foto) }}" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="#">
                          {{ $item->nombre_alumno }}
                          {{ $item->apellido_alumno }}
                          <br>
                            {{ $item->Curso->curso }} {{ $item->Paralelo->paralelo }} 
                        </a></h4>
                        <small>{{ $item->Cargo->cargo_lista }}</small>
                    </div>
                    
                </div>   
        </div>
               @endforeach

             

      </div>
    </div>
</section>

  <div class="flex-center position-ref full-height">
    <div class="top-right links">            
      <h3>ESTUDIANTE</h3> <strong> {{ $codigo_estudiante }} </strong>
    </div>

    <div class="content">
      <div class="title m-b-md">
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <p>
              

              

              <input type="hidden" name="numero_cedula" id="numero_cedula" value="{{ $codigo_estudiante }}">
              <input type="hidden" name="lista_id" id="lista_id" value="{{ $lista->id }}">

             </p>
           </div>
         </div>
       </div>

     </div>
   </div>

   
   </form>

 </body>
 </html>