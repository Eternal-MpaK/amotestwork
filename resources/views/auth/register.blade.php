<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 400px; margin: 50px auto; padding: 0 20px; }
        input { width: 100%; padding: 8px; margin: 5px 0 15px; box-sizing: border-box; }
        button { padding: 10px 16px; background: #007bff; color: #fff; border: none; cursor: pointer; }
        .error { color: #dc3545; font-size: 0.9em; margin-top: -10px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Регистрация</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Имя</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <p class="error">{{ $message }}</p> @enderror

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <p class="error">{{ $message }}</p> @enderror

        <label>Пароль</label>
        <input type="password" name="password" required>
        @error('password') <p class="error">{{ $message }}</p> @enderror

        <label>Подтвердите пароль</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Создать аккаунт</button>
    </form>
    <p>Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
</body>
</html>
