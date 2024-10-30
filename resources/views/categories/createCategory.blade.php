<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>register</title>
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
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    padding: 40px;
    width: 300px;
  }
  h2 {
    color: white;
    text-align: center;
    margin-bottom: 30px;
  }
  input[type="text"], input[type="email"], input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 20px;
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
</style>
</head>
<body>
  <div class="card">
    <h2>Criar Categoria</h2>
    <form action="{{ route('CreateCategory') }}" method="post">
      @csrf
      <input type="text" id="title" name="title" placeholder="Titulo"
                    value="{{ old('title') }}" required>
      @error('title') <span>{{ $message }}</span> @enderror
      <input type="text" id="description" name="description" placeholder="Descrição"
                    value="{{ old('description') }}" required>
      @error('description') <span>{{ $message }}</span> @enderror

      <input type="submit" value="Registrar">
    </form>
  </div>
</body>
</html>
