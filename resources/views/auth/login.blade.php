<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/auth/auth.css')
</head>

<body>
    <form action="{{ route('login.login') }}" method="POST" class="form--login">
        @csrf
        <div class="form__title">
            Login
        </div>
        <div class="form__input">
            <input type="email" name="email" id="email" placeholder=" "
                @error('email')
                class="alert"
            @enderror>
            <label for="text">Email</label>
        </div>

        <div class="form__input">
            <input type="password" name="password" id="password" placeholder=" "
                @error('password')
                class="alert"
            @enderror>
            <label for="password">Password</label>
        </div>

        <button class="form__button">Enviar</button>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red; margin-top:5px;">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        

        <div class="form__info">
            <a href="{{ route('register') }}">¿No tienes una cuenta?</a>
        </div>


    </form>

</body>

</html>
