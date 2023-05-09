

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <base href="{{ asset("") }}">
    <link rel="stylesheet" href="assets/css/new.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
      <div class="left">
        <div class="header">
          <h2 class="animation a1">Đăng nhập vào web</h2>
          <!-- <h4 class="animation a2">Log in to your account using email and password</h4> -->
        </div>
        <form class="form" action="{{route('getLogin')}}" method="POST">
            @csrf
            <div class="fig animation a3">
            <input type="email" name="email" class="form-field animation a3" placeholder="Email Address">
            <!-- <input type="text" name="name" class="form-field " placeholder="User Name"> -->
          </div>
          <div class="fig animation a4">
            <input type="password" name="password" class="form-field" placeholder="Password">
          </div>
          <p class="animation a5"><a href="{{route('register')}}">Đăng ký</a></p>
          <button type="submit" class="animation a6">LOGIN</button> 
        </form>
        <button title="Continue with Google account" class="btn_google animation a7">
            <i class="fa-brands fa-google fa-beat" style="color: #ff0505;"></i>
        </button>  
      </div>
      <div class="right"></div>
    </div>

<script src="assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="assets/js/new.js"></script>
</body>
</html>