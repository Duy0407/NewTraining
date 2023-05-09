

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <base href="{{ asset("") }}">
    <link rel="stylesheet" href="assets/css/new.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="right"></div>
        <div class="left">
          <div class="header">
            <h2 class="animation a1">Đăng ký Tài Khoản Miễn Phí</h2>
            
          </div>
          <form class="form" action="{{route('getRegister')}}" method="POST">
            @csrf
            <div class="fig animation a2">
              <input type="text" name="name" class="form-field checkInput" placeholder="User Name">
              {!! ShowError($errors, 'name') !!}
            </div>
            <div class="fig animation a3">
              <input type="email" name="email" class="form-field" placeholder="Email Address" oninput="space(this)">
              {!! ShowError($errors, 'email') !!}
            </div>
            <div class="fig animation a4">
              <input type="password" name="password" class="form-field" placeholder="Password" oninput="space(this)">
              {!! ShowError($errors, 'password') !!}
            </div>
            <p class="animation a5">
                <a href="{{route('register')}}">Đăng nhập</a>
            </p>
            <button type="submit" class="animation a6">Đăng ký</button> 
          </form>
          <button title="Continue with Google account" class="btn_google animation a7">
              <i class="fa-brands fa-google fa-beat" style="color: #ff0505;"></i>
          </button>  
        </div>
    </div>

<script src="assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="assets/js/new.js"></script>
</body>
</html>