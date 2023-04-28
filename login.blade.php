<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://kit.fontawesome.com/cc1d8ebad0.js" crossorigin="anonymous"></script>
  <style>
    * {
      box-sizing: border-box;
    }
    
    body {
      background-color: #f2f2f2;
      font-family: "Segoe UI", sans-serif;
    }
    
    .login-page {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    
    .form {
      background-color: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }
    
    .logo {
      display: block;
      margin: 0 auto;
      max-width: 150px;
      width: 100%;
    }
    
    h1 {
      font-size: 28px;
      margin-top: 20px;
      margin-bottom: 40px;
      text-align: center;
    }
    
    .form input[type="text"],
    .form input[type="password"] {
      border: none;
      padding: 10px;
      margin: 10px 0px;
      width: 100%;
      border-radius: 5px;
      background-color: #f2f2f2;
    }
    
    .form button {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px;
      margin-top: 20px;
      width: 100%;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
    .form button:hover {
      background-color: #3e8e41;
    }
    
    .message {
      margin-top: 30px;
      font-size: 14px;
      text-align: center;
      color: #4CAF50;
    }
    
    .message a {
      color: #4CAF50;
      text-decoration: none;
    }
    
    @media screen and (max-width: 480px) {
      .form {
        padding: 20px;
      }
      
      .logo {
        max-width: 100px;
      }
      
      h1 {
        font-size: 24px;
        margin-top: 10px;
        margin-bottom: 30px;
      }
    }
    
  </style>
</head>
<body>
	<div class="login-page">
		<div class="form">
			<i class="fa-solid fa-right-to-bracket fa-beat-fade fa-lg"></i>
			<h1>Login</h1>
      @if (session('error'))
          <b>Opps!</b> {{session('error')}}
      @endif
			<form action=" {{ route('actionlogin') }}" method="post">
        @csrf
				<input type="text" placeholder="Username" value="{{ Session::get('username')}}" name="username" ="">
          @if($errors->has('username'))
            <span style="font-size: 12px; color:red;">{{ $errors->first('username') }}</span>
          @endif
          
				<input type="password" placeholder="Password" name="password" >
          @if ($errors->has('password'))
              <span style="font-size: 12px; color:red;">{{ $errors->first('password')}}</span>
          @endif

				<button type="submit" value = "submit" >Log In</button>
				<p class="message">Silahkan Login Dulu!</p>
			</form>
		</div>
	</div>
</body>
</html>
