<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite('resources/css/auth/auth.css')
</head>

<body>
    <form action="{{ route('register.store') }}" method="POST" class="form--login">
        @csrf
        <div class="form__title">
            Register
        </div>
        <div class="form__input">
            <input type="text" name="name" id="name" placeholder=" "
                @error('name') 
                class="alert"
            @enderror>
            <label for="text">Name</label>
        </div>
        <div class="form__input">
            <input type="text" name="email" id="email" placeholder=" "
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
            <label for="password">Password </label>

        </div>
        <div class="form__input">
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder=" ">
            <label for="password">Confirm Password</label>
        </div>
        <button class="form__button">Enviar</button>

        @if ($errors->any())
            <div class="form__error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red; margin-top:5px; ">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form__info">
            <a href="{{ route('login') }}">¿Ya tienes una cuenta?</a>
        </div>


    </form>

</body>

</html>
