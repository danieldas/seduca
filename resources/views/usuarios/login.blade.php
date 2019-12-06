<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">


  <title>Login</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style2.css" rel="stylesheet">
  <link href="css/style-responsive2.css" rel="stylesheet" />


</head>

<body class="login-img3-body" style="background: url({!! asset('img/fondoLogin2.jpg') !!}) no-repeat fixed center" >

  <div class="login-form" >
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>

        @if(session('mensaje'))
      <div class="alert alert-success">
        {{ session('mensaje') }}
      </div>
      @endif

      @if($errors->has('login'))
      <div class="alert alert-danger">
        {{ $errors->first('login') }}
      </div>
      @endif
        {!! Form::open(['route' => 'usuarios.logear']) !!}
  
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_profile"></i></span>
            {!! Form::text('Cuenta', null, ['class' => 'form-control',  'placeholder' => 'Cuenta']) !!}
          </div>

          <div class="input-group">
            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            {!! Form::password('password', ['class' => 'form-control',  'placeholder' => 'Password']) !!}
          </div>

          <button class="btn btn-primary btn-lg btn-block" type="submit">Ingresar</button>

        {!! Form::close() !!}

      </div>

    <div class="text-right">
      <div class="credits">
      <center>
          &#169 Copyright Seduca
          </center> 
          <br>
        </div>
      </div>
  </div>


</body>

</html>
