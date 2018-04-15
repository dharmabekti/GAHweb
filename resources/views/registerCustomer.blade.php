<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Register Grand Atma Hotel</title>
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
    <h1>Daftar Akun Customer</h1>
  </div>
</div>
<div class="form">
  <form action = "{{ route('login.daftar') }}" method="post" class="login-form">
  {{ csrf_field() }}
    <input type="text" placeholder="Username" name="username" required />
    <input type="password" placeholder="Password" name="password" required  />
    <input type="password" placeholder="Konfirmasi Password" name="konfirmasi" required  />
    <button>Daftar</button>
    <p class="message"><a href="{{ route('login.home') }}">Login</a></p>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
  <script src="{{ asset('template/sweetalert/sweetalert.js') }}"></script>
  @include('sweet::alert')

</body>
</html>
