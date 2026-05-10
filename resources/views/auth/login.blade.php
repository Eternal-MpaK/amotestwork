<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 400px; margin: 50px auto; padding: 0 20px; }
        input { width: 100%; padding: 8px; margin: 5px 0 15px; box-sizing: border-box; }
        button { padding: 10px 16px; background: #28a745; color: #fff; border: none; cursor: pointer; }
        .error { color: #dc3545; font-size: 0.9em; margin-top: -10px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Вход</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <p class="error">{{ $message }}</p> @enderror

        <label>Пароль</label>
        <input type="password" name="password" required>

        <label><input type="checkbox" name="remember" style="width:auto; margin:0;"> Запомнить меня</label>
        <br><br>
        <button type="submit">Войти</button>
    </form>
    <p>Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
</body>
</html>
