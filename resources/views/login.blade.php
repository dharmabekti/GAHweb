<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Grand Atma Hotel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="{{ asset('template/login/css/style.css') }}">  
  <link rel="stylesheet" type="text/css" href="{{ asset('template/sweetalert/dist/sweetalert.css') }}">
</head>

<body>
<div class="container">
  <div class="info">
    <h1>Grand Atma Hotel</h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
  <form action = "{{ route('login.auth') }}" method="post" class="login-form">
  {{ csrf_field() }}
    <input type="text" placeholder="username" name="username" />
    <input type="password" placeholder="password" name="password" />
    <button>login</button>
    <!-- <p class="message">Not registered? <a href="#">Create an account</a></p> -->
  </form>
</div>
<video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
  <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4"/>
</video>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
  <script src="{{ asset('template/sweetalert/sweetalert.js') }}"></script>
  @include('sweet::alert')

</body>
</html>
