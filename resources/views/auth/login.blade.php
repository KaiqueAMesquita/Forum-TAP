<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #585858;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  .card {
    background-color: #272727;
    border-radius: 8px;
    box-shadow: 0px 0px 10px 0px rgba(39, 39, 39, 0.1);
    padding: 40px;
    width: 250px;
    height: 350px;
  }
  h2 {
    color: white;
    text-align: center;
    margin-bottom: 30px;
  }
  input[type="email"], input[type="password"] {
    width: calc(100% - 20px);
    height: 15px;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ffffff;
    border-radius: 4px;
  }
  input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4d57ea;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #0f0c54;
  }
  .register{
    font-size: 9pt;
    text-decoration: none;
    color: #fff;
  }
  .register:hover{
    color: #090029;
  }
</style>
</head>
<body>
  <div class="card">
    <h2>Login</h2>
    <form  action="{{ route('login') }}" method="post">
      @csrf
      <input type="email" id="email" name="email" placeholder="E-mail"
                    value="{{ old('email') }}" required>
      @error('email') <span>{{ $message }}</span> @enderror
      <input type="password" id="password" name="password" placeholder="Senha"
                    required>
      @error('password') <span>{{ $message }}</span> @enderror
      <input type="submit" value="Logar">
    </form>
    <a class="register" href="{{route('register')}}">
         Ainda não tem conta no Forum?
      </a>
</body>

</script>
</html>
